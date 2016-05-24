<?php

function getEventos(){
	global $post;
	$nonce = $_GET['nonce'];
	$eventos=obtenerEventosPorMesyAno($_GET['month'],$_GET['year'],$_GET['lastDay']);
	if ( ! wp_verify_nonce( $nonce, 'myajax-post-comment-nonce' ) )
		die ( 'No estas Autorizado');
	header('Content-type: application/json');
	echo json_encode($eventos);
	die();
};
function obtenerEventosPorMesyAno($month,$year,$lastDay){

	$formato = 'Y-m-d';
	$fechaInicial=$year.$month.'01';
	$fechaFinal=$year.$month.$lastDay;
	$args = array (
		'post_type' => 'eventosgszp',
		'meta_query' => array(
			array(
				'key'		=> 'fecha_del_evento',
				'compare'	=> 'BETWEEN',
				'value'		=> array($fechaInicial,$fechaFinal),
				),
			),
		);
	// return $args;

	$eventos_query = new WP_Query( $args );
	$eventos=[];
	// The Loop
	if ( $eventos_query->have_posts() ) {
		while ( $eventos_query->have_posts() ) {
			$eventos_query->the_post();
			$fecha=get_field('fecha_del_evento',false,false);
			$date = new DateTime($fecha);

			$eventos[]=['fecha'=>$date->format('d'),'titulo'=>get_the_title(),'link'=>get_permalink()];
		}
	} else {
	// no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();

	return $eventos;
};
function sendEmail(){
	$url='https://www.google.com/recaptcha/api/siteverify';
	$secret='6LdB6h4TAAAAACo3gSeaKbcFCRfe3HYHYmZKU9K1';
	// get_theme_mod('api_recaptcha');
	$response=$_POST['data']['g-recaptcha-response'];
	$nombre=$_POST['data']['nombre'];
	$rut=$_POST['data']['rut'];
	$telefono=$_POST['data']['telefono'];
	$email=$_POST['data']['email'];
	$mensaje=$_POST['data']['mensaje'];
	if ($nombre === '') { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Ingrese Su Nombre';
		echo $respuesta;
		die();
	}
	if ($rut === '') { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Ingrese Su Rut';
		echo $respuesta;
		die();
	}
	if ($telefono === '') { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Ingrese Su Telefono';
		echo $respuesta;
		die();
	}
	if ($email === '') { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Ingrese Su Email';
		echo $respuesta;
		die();
	}
	if ($mensaje === '') { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Ingrese Su Mensaje';
		echo $respuesta;
		die();
	}
	$data=compact('secret','response');
	// var_dump($data);
	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data)
			)
		);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	$jsonResult=json_decode($result);
	if ($jsonResult->success === FALSE) { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Captcha Erroneo';
		echo $respuesta;
		die();
	}
	$emailTo=get_theme_mod('email_to');
	$subject="{$nombre} les Contacta desde la Web";
	$mensajeEmail="<p><b>La persona de nombre:</b>{$nombre}</p><p><b>RUT:</b>{$rut}</p><p><b>telefono:</b>{$telefono}</p><p><b>email:</b><a href='mailto:{$email}'>{$email}</a></p><p><b>dejo este mensaje en la web:</b></p><p> {$mensaje}</p> ";
	wp_mail($emailTo,$subject,$mensajeEmail);
	die();
}
add_action('wp_ajax_getEventos', 'getEventos');
add_action('wp_ajax_nopriv_getEventos', 'getEventos');
add_action('wp_ajax_sendEmail', 'sendEmail');
add_action('wp_ajax_nopriv_sendEmail', 'sendEmail');