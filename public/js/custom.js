$(function () {




		var myLineChart = null;
		$('#type_movimiento').on('change',function(){
			var val = $(this).val();
			$('#categorie_select').val('');
			if(val == 'add'){
				$('.attr-add').show();
				$('.attr-out').hide();
			}
			if(val == 'out'){
				$('.attr-out').show();
				$('.attr-add').hide();
			}
		});

		$('input[type="date"]').attr('type','date1');
		/**/
 		$( 'input[type="date1"]' ).datepicker({dateFormat:"yy-mm-dd"});
		/**/
		$('#filter_btn').on('click',function(){
			$('.load').show();
			$('.wrapper').css('filter','blur(3px)');
			$.get('/statisjson',{
				'start':$('#start').val(),
				'finish':$('#finish').val()
			}).done(function(res){
			$('.load').hide();
			$('.wrapper').css('filter','blur(0)');
		if(document.getElementById("myChart")){
		myLineChart.destroy();
		var ctx = document.getElementById("myChart").getContext('2d');
		
		var data_add = [];
		var data_out = [];
		var data_labels = [];

			var data = {
				labels: data_labels,
				//*ADD*//
				datasets: [
				{
					label: "My First dataset",
					fillColor: "rgba(220,220,220,0.2)",
					strokeColor: "rgba(220,220,220,1)",
					pointColor: "rgba(220,220,220,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(220,220,220,1)",
					data: data_add
				},
				//*OUT*//
				{
					label: "My Second dataset",
					fillColor: "rgba(151,187,205,0.2)",
					strokeColor: "rgba(151,187,205,1)",
					pointColor: "rgba(151,187,205,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(151,187,205,1)",
					data: data_out
				}
				]
			};
			for(a in res.labels){
				data_labels.push(res.labels[a]);

				data_add.push(res.amounts[res.labels[a]].add);
				data_out.push(res.amounts[res.labels[a]].out);
			}

			myLineChart = new Chart(ctx).Line(data, option); //'Line' defines type of the chart.

		//*---GRAFICA*//			
		}
			});
		});

		$('#accounts').DataTable({
			"order":[[0,"desc"]],
                "dom": "<'row'<'col-sm-10 'f><'col-sm-2  hidden-xs'B>>t<'bottom 'p>",
                //"lengthChange": true,
                "responsive": false,
                buttons: [
					'pdfHtml5',
					'csvHtml5',
                ]
		});
		$('#bitacora').DataTable({
			"order":[[0,"desc"]],
                "dom": "<'row'<'col-sm-10 'f><'col-sm-2  hidden-xs'B>>t<'bottom 'p>",
                //"lengthChange": true,
                "responsive": false,
                buttons: [
					'pdfHtml5',
					'csvHtml5',
                ]
		});


		$('#balance').DataTable({
			"order":[[0,"desc"]],
            "pageLength": 100,
			"dom": "<'row'<'col-sm-10 'f><'col-sm-2  hidden-xs'B>>t<'bottom 'p>",
			//"lengthChange": true,
			"responsive": false,
            buttons: [
                'csvHtml5',
                {
                    extend: 'pdfHtml5',

                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ]
		});

		$('#categories').DataTable({
				"order":[[0,"desc"]],
                "dom": "<'row'<'col-sm-10 'f><'col-sm-2  hidden-xs'B>>t<'bottom 'p>",
                //"lengthChange": true,
                "responsive": false,
                buttons: [
					'pdfHtml5',
					'csvHtml5',
                ]
		});
		$('#permisos').DataTable({
				"order":[[0,"desc"]],
                "dom": "<'row'<'col-sm-10 'f><'col-sm-2  hidden-xs'B>>t<'bottom 'p>",
                //"lengthChange": true,
                "responsive": false,
                 "bPaginate": false,
                 "searching": false,
                buttons: [
					
                ]
		});
		$('#summary').DataTable({
				"order":[[0,"desc"]],
                "dom": "<'row'<'col-sm-10 'f><'col-sm-2  hidden-xs'B>>t<'bottom 'p>",
                //"lengthChange": true,
                "responsive": false,
                buttons: [
					'pdfHtml5',
					'csvHtml5',
                ]
		});
		$('#futuro').DataTable({
				"order":[[1,"asc"]],
                "dom": "<'row'<'col-sm-10 'f><'col-sm-2  hidden-xs'B>>t<'bottom 'p>",
                //"lengthChange": true,
                "responsive": false,
                buttons: [
					'pdfHtml5',
					'csvHtml5',
                ]
		});
		$('#hoy').DataTable({
				"order":[[1,"asc"]],
                "dom": "<'row'<'col-sm-10 'f><'col-sm-2  hidden-xs'B>>t<'bottom 'p>",
                //"lengthChange": true,
                "responsive": false,
                "bPaginate": false,
                buttons: [
					
                ]
		});
		

		$('#attached').DataTable({
				"order":[[0,"desc"]],
                "dom": "<'row'<'col-sm-10 'f><'col-sm-2  hidden-xs'B>>t<'bottom 'p>",
                //"lengthChange": true,
                "responsive": false,
                buttons: [
					'pdfHtml5',
					'csvHtml5',
                ]
			});
		$('#total').DataTable({
				"order":[[0,"desc"]],
                "dom": "<'row'<'col-sm-10'f><'col-sm-2  hidden-xs'B>>t<'bottom 'p>",
                //"lengthChange": true,
                "responsive": false,
                buttons: [
					'pdfHtml5',
					'csvHtml5',
                ]
		});	
		$('#users').DataTable({
			"order":[[0,"desc"]],
                "dom": "<'row'<'col-sm-10 'f><'col-sm-2  hidden-xs'B>>t<'bottom 'p>",
                //"lengthChange": true,
                "responsive": false,
                buttons: [
					'pdfHtml5',
					'csvHtml5',
                ]
		});

		var option = {
			responsive: true,

		};		
		if(document.getElementById("myChart")){
		var ctx = document.getElementById("myChart").getContext('2d');
		$('#myChart')[0].height = 100;
		console.log($('#myChart')[0]);
		console.log(ctx);
		var data_add = [];
		var data_out = [];
		var data_labels = [];
		$.get('/statisjson').done(function(res){
			var data = {
				labels: data_labels,
				//*ADD*//
				datasets: [
				{
					label: "My First dataset",
					fillColor: "rgba(220,220,220,0.2)",
					strokeColor: "rgba(220,220,220,1)",
					pointColor: "rgba(220,220,220,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(220,220,220,1)",
					data: data_add
				},
				//*OUT*//
				{
					label: "My Second dataset",
					fillColor: "rgba(151,187,205,0.2)",
					strokeColor: "rgba(151,187,205,1)",
					pointColor: "rgba(151,187,205,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(151,187,205,1)",
					data: data_out
				}
				]
			};
			for(a in res.labels){
				data_labels.push(res.labels[a]);

				data_add.push(res.amounts[res.labels[a]].add);
				data_out.push(res.amounts[res.labels[a]].out);
			}

			myLineChart = new Chart(ctx).Line(data, option); //'Line' defines type of the chart.
		});
		//*---GRAFICA*//			
		}


		$('#btn_add_attr').on('click',function(){
			$('#list_attr').append('<div class="form-group col-sm-6"><label for="exampleInputPassword1">Nombre</label>\
			            <input required maxlength="200" name="name_[]" type="text" class="form-control" placeholder="descripción de la categoria">\
			            </div>\
			            <div class="form-group col-sm-6">\
			            <label for="exampleInputPassword1">Valor</label>\
			            <input required maxlength="200" name="value_[]" type="text"  class="form-control" placeholder="descripción de la categoria">\
			            <input type="hidden" value="0" name="id[]">\
			            </div>');

		});
		//tours
		$('#btn_add_attr2').on('click',function(){
			$('#list_attr2').append('<div class="form-group col-sm-6"><label for="exampleInputPassword1">Fecha de salida</label>\
			            <input required maxlength="200" name="date[]" type="date" class="form-control" placeholder="Fecha">\
			            </div>\
			            <div class="form-group col-sm-6">\
			            <label for="exampleInputPassword1">precio</label>\
			            <input required maxlength="200" name="price[]" type="text"   data-mask="000,000,000,000,000.00" data-mask-reverse="true"    class="form-control"  placeholder="Precio">\
			            <input type="hidden" value="0" name="id[]">\
			            </div>');
			$('input[type="date"]').attr('type','date1');
		/**/
 		$( 'input[type="date1"]' ).datepicker({dateFormat:"yy-mm-dd"});
		});

	$("#buttonremove").click(function(){
        $("#list_attr2").empty();
    });

    $("#buttonremove").click(function(){
        $("#list_attr").empty();
    });

	$('#categorie_select').on('change',function(){
		var value = $('#categorie_select').val();
		$.get(
				'/categories/attr/'+value
			).done(function(res){
				$('#res_ajax').html('');
				if(res.length<1){
					$('#res_ajax').addClass('hidden');
				}else{
					$('#modal').show();
					$('#res_ajax').removeClass('hidden');
					for(i in res){
						console.log(res[i].name);
						$('#res_ajax').append('<div  class="form-control col-sm-3"><label><input type="radio" name="id_attr" value="'+res[i].id+'" >' +res[i].name+ '</label></div>');
					}					
				}
		});
	});	
$('#closemodal').click(function() {

    $('#modal').hide();
});
$('#closemodal3').click(function() {

    $('#modal').hide();
});

$('#tours_select').on('change',function(){
		var value = $('#tours_select').val();
		$.get('/tours/attr/'+value).done(function(res){

				$('#res_ajax1').html('');
				if(res.length<1){
					$('#res_ajax1').addClass('hidden');
				}else{
					$('#modal1').show();
					$('#res_ajax1').removeClass('hidden');
					for(i in res){
						var d = new Date(res[i].date);
						var n = d.toDateString();
						$('#res_ajax1').append('<div  class="form-control col-sm-3"><label><input type="radio" name="id_attr_tours" value="'+res[i].id+'" >' +n+ '</label></div>');

					}					
				}
		});
	});	
$('#closemodal1').click(function() {

    $('#modal1').hide();
});

$('#closemodal2').click(function() {

    $('#modal1').hide();
});


	


});
$(window).on('load',function(){
	console.log('carga');
	$('.load').hide();
	$('.wrapper').css('filter','blur(0)');
});


///////////////////////////////////////////////////////////////////////////////7
///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////7

 $(function(){
  $('#search-form :input')
    .change(function(){
      var $input = $(this);
      if ($input.val() == 'add')
      {
        $input.removeClass('colorrojo');
        $input.addClass('colorazul');
       
      }
      if($input.val() == 'out')
      {
        $input.removeClass('colorazul');
        $input.addClass('colorrojo');
      }

     
    });
});



  $(document).ready(function() {


    var ori = null;
    var des = null;
    $('#origen').on('change',function(){
      ori = $(this).val();
      if(des==ori){
        $(this).val('');
         alert("Las Cuentas No pueden ser las mismas");
      }
    });
    $('#destino').on('change',function(){
      des = $(this).val();
      if(des==ori){
        $(this).val('');
        alert("Las Cuentas No pueden ser las mismas");
      }
    });




$('#origen').on('change',function(){
    var value = $('#origen').val();
    $.get(
        '/transfer/consul/'+value
      ).done(function(res){
      $('#res_origen').html('');
        if(res.length<1){
          $('#res_origen').addClass('hidden');
        }else{
          $('#res_origen').removeClass('hidden');
          if(res){
           console.log(res);
             if(res<=1000){
                
                    $('#res_origen').append('<label> Saldo Actual: '+res+' $</label><input type="hidden" id="saldo1" value="'+res+'">');
                  }else{
                 console.log( res = formatNumber.new(res)); // retorna "123.456.779,18"
                   $('#res_origen').append('<label> Saldo Actual: '+res+' $</label> <input type="hidden" id="saldo1" value="'+res+'">');
                    }
            // $('#res_origen').append('<input id="saldo1" value="'+res+'">');
            $('#amount').attr('max',res);
          }         
        }

    });
  }); 
  
  $('#destino').on('change',function(){
    var value = $('#destino').val();
    $.get(
        '/transfer/consul/'+value
      ).done(function(res){
      $('#res_destino').html('');
        if(res.length<1){
          $('#res_destino').addClass('hidden');
        }else{
          $('#res_destino').removeClass('hidden');
          if(res){
            console.log(res);
            $('#res_destino').append('<label >'+res+' $</label>');

          }         
        }

    });
  }); 


$("#amount").change(function(){

  var a= $(this).val() ;
  var b=  $("#saldo1").val();

  b = b.replace(",", "");
  a = a.replace(",", "");
  b = parseFloat(b);
  a = parseFloat(a);
  
  if( a > b) {
    alert(b);
    $(this).val('');
  }
});
 

 var formatNumber = {

 separador: ",", // separador para los miles
 sepDecimal: '.', // separador para los decimales
 formatear:function (num){
 num +='';
 
 var splitStr = num.split('.');
 var splitLeft = splitStr[0];
 var splitRight = splitStr.length ? this.sepDecimal + splitStr[1] : '';
 var regx = /(\d+)(\d{3})/;
 while (regx.test(splitLeft)) {
 splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
 }
 return this.simbol + splitLeft +splitRight;
 },
 new:function(num, simbol){
 this.simbol = simbol ||'';
 return this.formatear(num);
 }
}


$.get('/tours/tours/select').done(function(res){
		$('#toursresult').html('');
		var i;
		for(i in res){
			$('#toursresult').append('<li><a href="/tours/ver/'+res[i].id+'">'+res[i].name+'</a></li>');
		}
		

});	
  
});