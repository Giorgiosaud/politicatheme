jQuery(document).ready(function($) {

  $('.widgetcalendario').Zpcalendar({
    weekDaysShort:['D','L','M','X','J','V','S']
  });
  $('#FormularioDeContacto').submit(function(event) {
   event.preventDefault();
   $('.EnviarEmail').addClass('disabled').attr('disabled','disabled');

   $.post(Zonapro.url, {data:$(this).closest('form').serializeObject(),action:'sendEmail'}, function(data, textStatus, xhr) {
    swal("Correo Enviado", "Muchas Gracias Pronto lo contactaremos", "success");
    console.info(data);
    $('.EnviarEmail').removeClass('disabled').removeAttr("disabled");

  }).fail(function(data){
    swal("Error En Formulario", data.responseText, "warning");
    $('.EnviarEmail').removeClass('disabled').removeAttr("disabled");  
  });
});
  $('#mailchimpSubscription').submit(function(event) {
   event.preventDefault();
   $email=$('.Subscription__Form input[name="email"]').val();
   console.log(isEmail($email));
   return false;
 });
  $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
  });
  $.fn.animateRotate = function(angle, duration, easing, complete) {
    var args = $.speed(duration, easing, complete);
    var step = args.step;
    return this.each(function(i, e) {
      args.complete = $.proxy(args.complete, e);
      args.step = function(now) {
        $.style(e, 'transform', 'rotate(' + now + 'deg)');
        if (step) return step.apply(e, arguments);
      };

      $({deg: 0}).animate({deg: angle}, args);
    });
  };
  $(".dropdown-menu > li > a.trigger").on("click",function(e){
    var current=$(this).next();
    var grandparent=$(this).parent().parent();
    if($(this).hasClass('left-caret')||$(this).hasClass('right-caret'))
      $(this).toggleClass('right-caret left-caret');
    grandparent.find('.left-caret').not(this).toggleClass('right-caret left-caret');
    grandparent.find(".sub-menu:visible").not(current).hide();
    current.toggle();
    e.stopPropagation();
  });
  $(".dropdown-menu > li > a:not(.trigger)").on("click",function(){
    var root=$(this).closest('.dropdown');
    root.find('.left-caret').toggleClass('right-caret left-caret');
    root.find('.sub-menu:visible').hide();
  });
  $('.active').parents('.dropdown,.dropdown-submenu').addClass('active');
  $('.menuInferior__Padre__Titulo').click(function(){

    var hijos=$(this).siblings('.menuInferior__Hijos'),
    check=hijos.is(":hidden");
    if(check === true){
      $(this).addClass('active').find('.glyphicon').animateRotate(90,'slow');
    }
    else{
      $(this).removeClass('active').find('.glyphicon').animateRotate(0,'slow');
    }
    $(this).siblings('.menuInferior__Hijos').slideToggle('slow');

  });
  resizeTriangleonEstudio();


});
$( window ).load(function() {
  resizeTriangleonEstudio();
});
$(window).resize(function() {
 resizeTriangleonEstudio();
});
function resizeTriangleonEstudio(){
  $('.Estudio__Triangulo').each(function(index, el) {
    var encabezadoWidth=($(el).siblings('.Estudio__Encabezado').height())/2;

    $(el).css('border-width',encabezadoWidth);
  });
}