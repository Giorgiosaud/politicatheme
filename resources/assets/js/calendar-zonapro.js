(function( $ ){
	function obtenerTablaDeDias(m,y){
		var actualDay=1,
		firstDay=new Date(y,m,1).getDay(),
		NumberDayOfWeek=0,
		tablaDias='<table><tr>',
		daysPerMonth=[31, (((y%4===0)&&(y%100!==0))||(y%400===0)) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
		while(actualDay<=daysPerMonth[m]){
		var actualDay2=("0" + (actualDay)).slice(-2);

			if(actualDay===1){
				if(firstDay===0){
					tablaDias+='<td class="weekend" data-day="'+actualDay2+'">'+actualDay+'</td>';
				}
				else{
					for (var i = 0; i <= firstDay-1; i++) {
						tablaDias+='<td class="null"></td>';
						NumberDayOfWeek++;
					}
					if(NumberDayOfWeek===6||NumberDayOfWeek===0){
						
						tablaDias+='<td class="weekend" data-day="'+actualDay2+'">'+actualDay+'</td>';
					}
					else{
						tablaDias+='<td data-day="'+actualDay2+'">'+actualDay+'</td>';
					}
					if(NumberDayOfWeek==6){
						tablaDias+='</tr>';
						NumberDayOfWeek=0;
					}
				}
				NumberDayOfWeek++;
				actualDay++;
			}
			else{
				if(NumberDayOfWeek===0){
					tablaDias+='<tr>';
				}
				if(NumberDayOfWeek===6||NumberDayOfWeek===0){

					tablaDias+='<td class="weekend" data-day="'+actualDay2+'">'+actualDay+'</td>';
				}
				else{
					tablaDias+='<td data-day="'+actualDay2+'">'+actualDay+'</td>';
				}
				if(NumberDayOfWeek==6){
					tablaDias+='</tr>';
					NumberDayOfWeek=0;
				}
				else{
					NumberDayOfWeek++;
				}
				actualDay++;
			}
		}
		tablaDias+='</table>';

		return tablaDias;
	}
	function agregarPostAlMes(m,y,ld){
		$.getJSON(Zonapro.url, {nonce: Zonapro.nonce,action:'getEventos',month:m,year:y,lastDay:ld}, function(json, textStatus) {
			for (var i = 0; i < json.length; i++) {
				var evento=json[i];
				console.log(evento);
				$('.MesActual td[data-day="'+evento.fecha+'"]').contents().wrap('<a data-toggle="tooltip" title="'+evento.titulo+'" href="'+evento.link+'"></a>');
			}
			$('[data-toggle="tooltip"]').tooltip();
		});
	}
	function initializer(calendar,date,months,daysShort){
		$(calendar).addClass('Zpcalendar');
		var wrapperHeading=$( "<div />" ).addClass( 'heading').appendTo( calendar ),
		prevButton=$('<span />').addClass('calbut prev').html('\&lang\;').appendTo(wrapperHeading),
		startMonthNumber=date.getMonth(),
		MonthNumber=("0" + (startMonthNumber + 1)).slice(-2),
		startMonthText=months[startMonthNumber],
		year=date.getFullYear(),
		tablaDias=obtenerTablaDeDias(startMonthNumber,year),
		daysPerMonth=[31, (((year%4===0)&&(year%100!==0))||(year%400===0)) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
		var dayMonth=$('<span />').html(startMonthText+' '+year).addClass('MonthYear').appendTo(wrapperHeading);
		var nextButton=$('<span />').addClass('calbut next').html('\&rang\;').appendTo(wrapperHeading);
		var wrapperWeekDays=$( "<table />" ).addClass('weekdays').appendTo( calendar );
		var contenedorDias=$( "<div />" ).addClass('days').appendTo( calendar );
		var diasMesActual=$('<div />').addClass('MesActual').appendTo(contenedorDias);
		$(tablaDias).appendTo(diasMesActual);
		$('.days').height($('.MesActual').height());
		agregarPostAlMes(MonthNumber,year,daysPerMonth[startMonthNumber]);
		diasMesAnterior=$('<div />').addClass('MesTemp').appendTo(contenedorDias);
		$(daysShort).each(function(){
			$('<td />').text(this).appendTo(wrapperWeekDays);
		});
	}
	function changeMonth(date,months){
		var MonthNumber=date.getMonth(),
		MonthText=months[MonthNumber],
		year=date.getFullYear();
		$('.MonthYear').html(MonthText+' '+year);
	}
	function changeDays(date){
		var year=date.getFullYear(),
		MonthNumber=date.getMonth(),
		MonthNumber2=("0" + (date.getMonth() + 1)).slice(-2),
		tablaDiasMes=obtenerTablaDeDias(MonthNumber,year),
		daysPerMonth=[31, (((year%4===0)&&(year%100!==0))||(year%400===0)) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
		$(tablaDiasMes).appendTo($('.MesTemp'));
		$('.MesActual').fadeOut('fast',function(){
			$('.days').height($('.MesTemp').height());
			$('.MesTemp').addClass('MesActual').removeClass('MesTemp');
			diasMesAnterior=$('<div />').addClass('MesTemp').appendTo($('.days'));
			$(this).remove();
		});
		agregarPostAlMes(MonthNumber2,year,daysPerMonth[MonthNumber]);
	}
	$.fn.Zpcalendar = function(options) {
		var settings = $.extend( {}, $.fn.Zpcalendar.defaults, options );

		return this.each(function() {
			
			var that=this,
			date=settings.startDate,
			months=settings.months,
			daysShort=settings.weekDaysShort;
			initializer(this,date,months,daysShort);
			console.log(date);
			$('.prev').on('click',function(){
				date.setMonth(date.getMonth() - 1);
				changeMonth(date,months);
				changeDays(date);
			});
			$('.next').on('click',function(){
				date.setMonth(date.getMonth() + 1);
				changeMonth(date,months);
				changeDays(date);
			});
		});
	};
	$.fn.Zpcalendar.defaults={
		startDate:new Date(),
		months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		weekDays:['Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo'],
		weekDaysShort:['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
		headingOpts : {
			prevButton:{
				class:'calbut prev',
				content:'&lang;'
			},
			nextButton:{
				class:'calbut next',
				content:'&rang;'
			},

		},
	};
})( jQuery );