$(document).ready(function() {

	let type_navbar = $("#type_navbar").val();

	if(type_navbar == ""){
		$("#index").addClass("active");
	}else{
		$("#"+type_navbar).addClass("active");
	}

	load_table();

	$('[data-toggle="tooltip"]').tooltip();

});

$(document).on('click','.up',function(e){
	e.preventDefault();
	window.open('https://api.whatsapp.com/send?phone=525576965971&text=Necesito%20asistencia%20técnica', '_blank');

});



$(document).on('click','.signature',function(e){
	e.preventDefault();
	let id = $(this).attr("id_route");
    swal({
    	html:true,
      	title: "¿Ha recibido su pedido con el numero #"+id+"?",
      	text: "",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonClass: "btn-danger",
      	confirmButtonText: "SI",
      	confirmButtonClass: "btn-confirm",
      	cancelButtonText: "NO",
      	closeOnConfirm: false,
      	showLoaderOnConfirm: true
    }, function () {
      	setTimeout(function () {
      		$.get("modal_signature/"+id,function(result){
				if(result.status){
					//location.href = result.url;
	      	    	swal({
	        			html:true,
				  		title: "Exito",
				  		text: "Su pedido ha sido firmado, gracias por confirmar de recibido",
				  		type: "success",
				  		confirmButtonClass: "btn-confirm",
				  		confirmButtonText: "Listo"
				  	});
				  	$(".form-group-"+id).html("<a href='"+result.url+"' download='documento_recibido'>Descargar archivo</a>");
				}else{
					swal({
	        			html:true,
				  		title: "Error",
				  		text: "Ocurrio un problema, reportelo al área de sistemas",
				  		type: "error",
				  		confirmButtonClass: "btn-confirm",
				  		confirmButtonText: "Entiendo"
				  	});
				}
			});
    	}, 2000);

    });
});


$(document).on('click','.dropdown-item',function(e) {
	$(".collapse").removeClass("show");
	$(".nav-link-collapse").addClass("collapsed");
});

$(document).on('change','.get-button',function(e) {
	$(".button-container").removeClass("d-none");

});


function get_bootstrap_select(){
	$('.provider-select').select2({
        theme: 'bootstrap4',
        placeholder: "SELECCIONE UN PROVEDOR",
    });

	$('.product-select').select2({
        theme: 'bootstrap4',
        placeholder: "SELECCIONE UN PRODUCTO",
    });

    $('.customer-select').select2({
        theme: 'bootstrap4',
        placeholder: "SELECCIONE UN CLIENTE",
    });

    $('.delivery-select').select2({
        theme: 'bootstrap4',
        placeholder: "SELECCIONE UN ENVIO",
    });
    

    $(".select2").css("width","100%");
    $(".select2").css("margin","0px");
}


$(document).on('click','.session-close',function(e) {
    e.preventDefault();
    window.location="session_close";
});

$(document).on('change','.search_quantity',function(e) {
    let id = $(this).val();
    let url = $(this).attr("url");
    if(id != ""){
    	$.get(url+"/"+id,function(result){
    		$(".quantity").html(result.QUANTITY);
    		$(".quantity").attr("value",result.QUANTITY);
    		$(".data-quantity").removeClass("d-none");
    		$(".text-quantity").val("");
    	});
    }
});

$(document).on('change','.get-last-point',function(e) {
    let id = $(this).val();
    let url = $(this).attr("url");
    if(id != ""){
    	$.get(url+"/"+id,function(result){
    		$(".point_a").val(result.POINT_B);
    		$(".delivery-data").removeClass("d-none");
    	});
    }
});

$(document).on('keyup','.text-quantity',function (e) {
	let val_origin = $(".quantity").attr("value");
	$(".quantity").html(val_origin);
});

$(document).on('blur','.text-quantity',function (e) {
	let val = $(this).val();
	let total = Number($(".quantity").html());
	let container = $(this).closest(".input-container");
	container.find(".input-error-message").remove()
	if(val > total){
		container.append("<label class='input-error-message'>*La cantidad es mayor a la disponible<label>");
	}else{
		let result = total - val;
		$(".quantity").html(result);
	}

});

$(document).on('change','.search_address',function(e) {
    let id = $(this).val();
    let url = $(this).attr("url");
   	if(id != ""){
   		$.get(url+"/"+id,function(result){
   			$(".text-address").val(result.ADDRESS);
   			let container = $(".location-container");
   			$(".location").removeClass("d-none");
   			
   			let center = $(".point_a").val();
   			var market_1 = $(".point_a").val();

   			$(".point-a").html(center);
   			$(".point-b").html(result.ADDRESS);

   			let product_id = $(".product-select").val();
   			if(product_id != ""){
   				$(".send").removeAttr("disabled");
   			}

   			showLocation(center,market_1,result.ADDRESS,container);
   		});
   	}
});

$(document).on('change','.get-routes-detail',function(e) {
    let id = $(this).val();
    let url = $(this).attr("url");
   	if(id != ""){
   		$.get(url+"/"+id,function(result){
   			let map = result[0].POINT_A;
   			let img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+map+"&zoom=5&size=800x800";

   			let colors = ["blue","green","red","orange","yellow","blue","purple","black","brown","gray"];

   			let letters = ["A","B","C","D","E","F","G","H","I","J","K"];

   			let count = 0;

   			let address = "";


   			result.forEach(function(data){
   				img_url = img_url + "&markers=color:"+colors[count]+"%7Clabel:"+letters[count]+"%7C"+data.POINT_A;
   				address = address + "<i class='fas fa-map-marked'></i> Punto "+letters[count]+": <span style='color:"+colors[count]+"'>"+data.POINT_A+"</span><br>";
   				count++;
			});

			img_url = img_url + "&markers=color:"+colors[count]+"%7Clabel:"+letters[count]+"%7C"+result[count - 1].POINT_B;
   			address = address + "<i class='fas fa-map-marked'></i> Punto "+letters[count]+": <span style='color:"+colors[count]+"'>"+result[count - 1].POINT_B+"</span><br>";

			img_url = img_url + "&key=AIzaSyAa8HeLH2lQMbPeOiMlM9D1VxZ7pbGQq8o";
			//img_url = img_url + "&key=AIzaSyD-7Doc6MF_l48xiJOjDDwYkRFCiselgpY";

			
	
    		$(".routes-detail-container").html("<img src ='"+img_url+"'>");
    		$(".detail").html("<div style='text-align:justify; font-weight: bold'>"+address+"</div>");

   			$(".routes-detail").removeClass("d-none");
   			$(".routes-detail-container").animate({
				scrollTop: '150px',
				scrollLeft: '150px'
			}, 300);
   		});
   	}
});

$(document).on('change','.get-location',function(e) {

	let array_coord = {0:{"lat":21.025147,"lng":-101.2753898},
						1:{"lat":25.6490376,"lng":-100.4431823},
						2:{"lat":20.6739383,"lng":-103.4054537},
						3:{"lat":17.6013563,"lng":-101.2171708},
						4:{"lat":19.0401963,"lng":-98.2630057}

					}

	let num = Math.round(Math.random()*4);

		
	var coord = {lat:array_coord[num]["lat"],lng:array_coord[num]["lng"]};
    var map = new google.maps.Map(document.getElementById('location-container'),{
      zoom: 5,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    });

    $(".location-container").removeClass("d-none");


});

$(document).on('change','.get-routes',function(e) {
    let id = $(this).val();
    let url = $(this).attr("url");
   	if(id != ""){
   		$.get(url+"/"+id,function(result){

   			$(".routes-detail").html("");

   			let url = "";

   			let market_1 = "";

   			let market_2 = "";

   			let count = 1;

   			result.forEach(function(data){
   				img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+data.POINT_A+"&zoom=5&size=800x800";
   				market_1 = "&markers=color:blue%7Clabel:A%7C"+data.POINT_A;
   				market_2 = "&markers=color:green%7Clabel:B%7C"+data.POINT_B;
   				img_url = img_url + market_1 + market_2 + "&key=AIzaSyAa8HeLH2lQMbPeOiMlM9D1VxZ7pbGQq8o";
   				//img_url = img_url + market_1 + market_2 + "&key=AIzaSyD-7Doc6MF_l48xiJOjDDwYkRFCiselgpY";

   				

   				let header = "<div style='font-weight: bold;'>#Ruta "+count+" - Estatus: <span class='status-"+count+"'>"+data.STATUS+"</span></div>";

   				let address = "<div><i class='fas fa-map-marked'></i><span style='font-weight: bold;'> Punto A: <span style='color:blue'>"+data.POINT_A+"</span><br><i class='fas fa-map-marked'></i> Punto B: <span style='color:green'>"+data.POINT_B+"</span></span></div>";

   				let disabled = "";

   				if(data.STATUS == "ENTREGADO"){
   					disabled = "disabled";
   				}

   				let button = "<div style='height:40px;'><button status='"+data.STATUS+"' route_id='"+data.ID+"' type='submit' id='"+count+"' class='btn float-right main_btn route-check route-"+count+"' "+disabled+">Entregado<i style='padding-left:5px;' class='fa fa-send'></i></a></button></div><hr>";

   				$(".routes-detail").append(header+"<div class='routes-detail-container'><img src ='"+img_url+"'></div>"+address+button);

   				$(".routes-detail").addClass("text-justify");
 		    	count++;
			});

			$(".routes-detail-container").animate({
				scrollTop: '150px',
				scrollLeft: '150px'
			}, 300);
   			
   		});
   	}
});

function valitate_routes(id){


	if(id != 1){
		id = id-1;
		let element = $(".route-"+id);
		let status = element.attr("status");

		if(status == "ENTREGADO"){
			return true;
		}else{
			return false;
		}
	}else{
		return true;
	}
	

}

$(document).on('click','.route-check',function(e) {
	e.preventDefault();
	
	let id = $(this).attr("id");
	let route_id = $(this).attr("route_id");
	let status = $(this).attr("status");
	let element = $(this);
	let delivery_id = $(".delivery-select").val();

	if(valitate_routes(id)){
	    swal({
	    	html:true,
	      	title: "¿Esta seguro que desea cambiar el estatus de la ruta: "+id+" a ENTREGADO</b>?",
	      	text: "",
	      	type: "warning",
	      	showCancelButton: true,
	      	cancelButtonClass: "btn-danger",
	      	confirmButtonText: "Confirmar",
	      	confirmButtonClass: "btn-confirm",
	      	cancelButtonText: "Cancelar",
	      	closeOnConfirm: false,
	      	showLoaderOnConfirm: true
	    }, function () {
	      setTimeout(function () {
	      	let url = "update_route/"+route_id+"/"+delivery_id+"/";
	      	$.get(url,function(result){
	      	    if(result.status){
	      	    	swal({
	        			html:true,
				  		title: "Exito",
				  		text: result.message,
				  		type: "success",
				  		confirmButtonClass: "btn-confirm",
				  		confirmButtonText: "Listo"
				  	});
				  	element.attr("disabled","disabled");
				  	element.attr("status","ENTREGADO");
				  	$(".status-"+id).html("ENTREGADO");
	      	    }else{
	        		swal({
	        			html:true,
				  		title: "Error",
				  		text: result.message,
				  		confirmButtonClass: "btn-confirm",
				  		type: "error",
				  		confirmButtonText: "Entiendo"
				  	});
	      	    }
	      	});
	      }, 2000);
	    });
	}else{
		let id_before = id - 1; 
		swal({
			html:true,
	  		title: "Error",
	  		text: "No se puede cambiar estatus a la ruta: "+id+" a ENTREGADO porque la ruta: "+id_before+" no ha sido ENTREGADA",
	  		type: "error",
	  		confirmButtonClass: "btn-confirm",
	  		confirmButtonText: "Entiendo"
	  	});

	}


});

function showLocation(map,market_1,market_2,container) {
    let img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+map+"&zoom=5&size=800x800&markers=color:blue%7Clabel:A%7C"+market_1+"&markers=size:mid%7Ccolor:green%7Clabel:B%7C"+market_2+"&key=AIzaSyAa8HeLH2lQMbPeOiMlM9D1VxZ7pbGQq8o";
    //let img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+map+"&zoom=5&size=800x800&markers=color:blue%7Clabel:A%7C"+market_1+"&markers=size:mid%7Ccolor:green%7Clabel:B%7C"+market_2+"&key=AIzaSyD-7Doc6MF_l48xiJOjDDwYkRFCiselgpY";
    
    container.html("<img src ='"+img_url+"'>");
    container.animate({
		scrollTop: '150px',
		scrollLeft: '150px'
	}, 300);
}

function load_table(){
	if($('.data-table').length > 0){
		table = $('.data-table').DataTable({
    			"order": [],
    			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todas"]]
		});
	}
}

$(document).on('click','.navbar-main',function(e) {
    e.preventDefault();
    let container = $(".main-container");
    let url = $(this).attr("href");
    $.get(url,function(result){
        container.html(result);
        get_bootstrap_select();
        load_table();
    });

});

$(document).on('click','.btn-pay',function(e) {
	e.preventDefault();
	window.location="main";
});

$(document).on('click','.unsubscribe',function(e) {
	e.preventDefault();
	
	let id = $(this).attr("id");
	let customer_id = $(this).attr("customer_id");
    swal({
    	html:true,
      	title: "¿Esta seguro que desea darse de baja</b>?",
      	text: "",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonClass: "btn-danger",
      	confirmButtonText: "Confirmar",
      	confirmButtonClass: "btn-confirm",
      	cancelButtonText: "Cancelar",
      	closeOnConfirm: false,
      	showLoaderOnConfirm: true
    }, function () {
      setTimeout(function () {
      	let url = "unsubscribe/"+id+"/"+customer_id;
      	$.get(url,function(result){
      	    if(result.status){
      	    	swal({
        			html:true,
			  		title: "Exito",
			  		text: result.message,
			  		type: "success",
			  		confirmButtonClass: "btn-confirm btn-unsubscribe",
			  		confirmButtonText: "Listo"
			  	});
      	    }else{
        		swal({
        			html:true,
			  		title: "Error",
			  		text: result.message,
			  		confirmButtonClass: "btn-confirm",
			  		type: "error",
			  		confirmButtonText: "Entiendo"
			  	});
      	    }
      	});
      }, 2000);
    });
});

$(document).on('click','.btn-unsubscribe',function(e) {
    e.preventDefault();
    window.location="session_close";

});

$(document).on('click','.pay',function(e) {
    e.preventDefault();
    let id = $(this).attr("user_id");
    let html = "<div><div>Ingrese numero de tarjeta:</div><input style='width:50px;' type='text' />-<input style='width:50px;' type='text' />-<input style='width:50px;' type='text' />-<input style='width:50px;' type='text' /><div>Ingrese fecha de vencimiento</div><input style='width:60px;' type='text' /><div>Ingrese CVV</div><input style='width:60px;' type='text' /></div>";
    swal({
    	html:true,
      	title: "¿Esta seguro que desea comprar la versión completa</b>?",
      	text: html,
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonClass: "btn-danger",
      	confirmButtonText: "Confirmar",
      	confirmButtonClass: "btn-confirm",
      	cancelButtonText: "Cancelar",
      	closeOnConfirm: false,
      	showLoaderOnConfirm: true
    }, function () {
      setTimeout(function () {
      	
      	let url = "pay/"+id;
      	$.get(url,function(result){
      	    if(result.status){
      	    	swal({
        			html:true,
			  		title: "Exito",
			  		text: result.message,
			  		type: "success",
			  		confirmButtonClass: "btn-confirm btn-pay",
			  		confirmButtonText: "Listo"
			  	});
      	    }else{
        		swal({
        			html:true,
			  		title: "Error",
			  		text: result.message,
			  		confirmButtonClass: "btn-confirm",
			  		type: "error",
			  		confirmButtonText: "Entiendo"
			  	});
      	    }
      	});
      }, 2000);
    });
});

$(document).on('keypress','.validate-text',function (e) {
	pattern = /["',]/;
	Key_Array = ["Backspace","Delete","ArrowLeft","ArrowRight"];// para firefox
	if ($.inArray(e.key,Key_Array) >= 0) return true;

	return e.key.match(pattern) ? false : true;
});	


$(document).on('keyup','.validate-text',function (e) {
	let form = $(this.form);
	form_validate(form);
});

$(document).on('blur','.validate-text',function() {
	let element = $(this);
	let form = $(this.form);
	let required = element.attr("required");
	let value = element.val();
	let container = element.closest(".input-container");
	if(required == "required" && value == ""){
		container.append( "<label class='input-error-message'>*Dato requerido<label>");
		element.addClass("input-error");
	}
	form_validate(form);
});

$(document).on('focus','.validate-text',function() {
	let element = $(this);
	let form = $(this.form);
	let container = element.closest(".input-container");
	container.find(".input-error-message").remove();
	element.removeClass("input-error");
	form_validate(form);
});

function form_validate(form){
	let empty_value = 0;
	if(form.find(".validate-text").length > 0){
		$(form.find(".validate-text")).each(function(){
			let element = $(this);
			let required = element.attr("required");
			let value = element.val();
			if(required == "required" && value == ""){
				empty_value++;

			}
		});
	}

	if(form.find(".validate-select").length > 0){

		$(form.find(".validate-select")).each(function(){
			let element = $(this);
			let required = element.attr("required");
			let value = element.val();
			if(required == "required" && value == ""){
				empty_value++;
			}
		});
	}

	if(form.find(".validate-file").length > 0){

		$(form.find(".validate-file")).each(function(){
			let element = $(this);
			let required = element.attr("required");
			let value = element.val();
			let ext = value.split(".");
			ext = "."+ext[ext.length - 1];
			let ext_type = element.attr("accept");
			ext_type = ext_type.split(",");
			if(required == "required" && value == ""){
				empty_value++;
			}else if(required == "required" && value != ""){
				if(ext_type.indexOf(ext) === -1){
					let container = element.closest(".input-container");
					container.append( "<label class='input-error-message'>*Extension: ("+ext+") de archivo incorrecta<label>");
					element.addClass("input-error");
					empty_value++;
				}
			}
		});
	}


	if(empty_value == 0){
		form.find(".send").removeAttr("disabled");
		form.find(".delete").removeAttr("disabled");
		form.find(".active").removeAttr("disabled");
	}else{
		form.find(".send").attr("disabled","disabled");
		form.find(".delete").attr("disabled","disabled");
		form.find(".active").attr("disabled","disabled");
	}
}

$(document).on('click','.exit',function(e) {
    e.preventDefault();
    let element = $(this);
    let container = element.closest(".result");
    container.html("");
    container.removeClass("result-error result-success");
});

$(document).on('change','.search_provider',function(e) {
	let id = $(this).val();

	$.get('search_provider/'+id,function(result){
		$(".name").val(result.NAME);
		$(".description").val(result.DESCRIPTION);
		$(".objects-update").removeClass("d-none");
	});
});

$(document).on('change','.search_product',function(e) {
	let id = $(this).val();

	$.get('search_product/'+id,function(result){
		$(".name").val(result.NAME);
		$(".description").val(result.DESCRIPTION);
		$(".quantity").val(result.QUANTITY);
		$(".weight").val(result.WEIGHT);
		$(".provider-select").val(result.PROVIDER_ID).trigger("change");
		$(".objects-update").removeClass("d-none");
	});
});

$(document).on('change','.search_customer',function(e) {
	let id = $(this).val();

	$.get('search_customer/'+id,function(result){
		$(".first_name").val(result.FIRST_NAME);
		$(".last_name").val(result.LAST_NAME);
		$(".phone").val(result.PHONE);
		$(".email").val(result.EMAIL);
		$(".postal_code").val(result.POSTAL_CODE);
		$(".address").val(result.ADDRESS);
		$(".objects-update").removeClass("d-none");
	});
});


function confirm_pass(){

	if($(".validate-pass2").length > 0){
		$(".confirm-pass").remove();
		let container = $(".validate-pass2").closest(".input-container");
		let value = $(".validate-pass2").val();
		let pass = $(".validate-pass").val();
		if(value != pass){
			container.append("<label class='confirm-pass'>*La confirmación de la contraseña debe ser igual a la contraseña<label>");
			return false;
		}else{
			$(".confirm-pass").remove();
			return true;
		}
	}else{
		return true;
	}
}


$(document).on('click','.send',function(e) {
	e.preventDefault();
	let form = $(".form");
	if(confirm_pass()){
		let url = form.attr("action");
		let result = $(".result");
		let formData = new FormData($(form)[0]);
		var close = "<span class='exit'><i class='fa fa-times'></i></span>";
		result.removeClass("result-error result-success result-success result-warning");
		$.ajax({
	        type: "POST",
	        url : url,
	        datatype:'json',
	        data : formData,
	        cache: false,
	        contentType: false,
	        processData: false,
	        beforeSend: function(){
	        	let string = "&nbsp;&nbsp;Espere un momento, procesando datos...";
	        	result.html("<i class='fa fa-spinner fa-pulse'></i><span style='padding-left:5px;'>"+string+"</span>");
	        	result.addClass("result-process");
	        	result.scrollView();
	        },
	        success : function(data){
	        	if(data.status){
	        		let action = url.split("_");
	        		action = action[0];
	        		if(action == "add"){
	        			reset_location();
	        			$(form)[0].reset();
	        			$("select").val("").trigger('change');
	        		}else{
	        			update_select();
	        		}
	        		result.removeClass("result-process");
	        		result.addClass("result-success");
	        		result.html(close+"<i class='fa fa-check-square'></i><span style='padding-left:5px;'>&nbsp;"+data.message+"</span>");
	        	}else{
	        		result.removeClass("result-process");
	        		result.addClass("result-error");
	        		result.html(close+"<i class='fa fa-exclamation-circle'></i><span style='padding-left:5px;'>&nbsp;"+data.message+"</span>");
	        	}
	        },
	        error: function(data, xhr, desc, err) {
	        	result.removeClass("result-process");
	        	result.addClass("result-error");
	        	console.log(data.responseText);
	        	let string = "&nbsp;&nbsp;Error de sistema, intente de nuevo o reportelo al área de sistemas.";
	        	result.html(close+"<i class='fa fa-exclamation-circle'></i><span style='padding-left:5px;'>"+string+"</span>");
			}
	    });
	}


});

//funcion para subir o bajar scroll a mensaje de resultado
$.fn.scrollView = function () {
	return this.each(function () {
		$('html, body').animate({ scrollTop: $(this).offset().top - 150 }, 1000);
	});
}

function reset_location(){
	if($(".quantity").length > 0){
		let quantity = Number($(".quantity").html());


		if(quantity == 0){
			let product_id = $(".product-select").val();
			$(".product-select option[value='"+product_id+"']").remove();
		}
		
	}

	if($(".data-quantity").length > 0){
		$(".data-quantity").addClass("d-none");
	}

	if($(".location").length > 0){
		$(".location").addClass("d-none");
	}
}

function update_select(){
	if($(".update_select").length > 0){
		$(".update_select").select2("destroy");
		$(".update_select option:selected").html($(".name").val());
		get_bootstrap_select();
	}

	if($(".update_select_2").length > 0){
		$(".update_select_2").select2("destroy");
		$(".update_select_2 option:selected").html($(".first_name").val()+" "+$(".last_name").val());
		get_bootstrap_select();
	}
}

$(document).on('change','.validate-select',function (e) {
	let form = $(this.form);
	form_validate(form);
});

$(document).on('click','.delete',function(e) {
	e.preventDefault();
	let form = $(".form");
	let url = form.attr("action");
	let data = $(this).attr("data");
	let object = $("."+data+" option:selected").text();
	let type = $(this).attr("type_delete");
	swal({
		html:true,
	  	title: "¿Esta seguro que desea dar de baja el " + type + ": <b>"+ object +"</b>?",
	  	text: "",
	  	type: "warning",
	  	showCancelButton: true,
	  	cancelButtonClass: "btn-danger",
	  	confirmButtonText: "Confirmar",
	  	confirmButtonClass: "btn-confirm",
	  	cancelButtonText: "Cancelar",
	  	closeOnConfirm: false,
	  	showLoaderOnConfirm: true
	}, function () {
	  setTimeout(function () {
	  	option = $("."+data+" option:selected").val();
	    send_form_alert(form,url,data,option);
	  }, 2000);
	});

});

$(document).on('click','.active',function(e) {
	e.preventDefault();
	let form = $(".form");
	let url = form.attr("action");
	let data = $(this).attr("data");
	let object = $("."+data+" option:selected").text();
	let type = $(this).attr("type_delete");
	swal({
		html:true,
	  	title: "¿Esta seguro que desea Re-activar el " + type + ": <b>"+ object +"</b>?",
	  	text: "",
	  	type: "warning",
	  	showCancelButton: true,
	  	cancelButtonClass: "btn-danger",
	  	confirmButtonText: "Confirmar",
	  	confirmButtonClass: "btn-confirm",
	  	cancelButtonText: "Cancelar",
	  	closeOnConfirm: false,
	  	showLoaderOnConfirm: true
	}, function () {
	  setTimeout(function () {
	  	option = $("."+data+" option:selected").val();
	    send_form_alert(form,url,data,option);
	  }, 2000);
	});

});

function send_form_alert(form,url,object,option){
	let formData = new FormData($(form)[0]);
	$.ajax({
        type: "POST",
        url : url,
        datatype:'json',
        data : formData,
        cache: false,
        contentType: false,
        processData: false,
        success : function(data){
        	if(data.status){
        		swal({
        			html:true,
			  		title: "Exito",
			  		text: data.message,
			  		type: "success",
			  		confirmButtonClass: "btn-confirm",
			  		confirmButtonText: "Listo"
			  	});
        		$("."+object+" option[value='"+option+"']").remove();
        	}else{
        		swal({
        			html:true,
			  		title: "Error",
			  		text: data.message,
			  		confirmButtonClass: "btn-confirm",
			  		type: "error",
			  		confirmButtonText: "Entiendo"
			  	});
        	}
        },
        error: function(data, xhr, desc, err) {
        	let string = "Error de sistema, intente de nuevo o reportelo al área de sistemas.";
        	swal({
        		html:true,
		  		title: "Error",
		  		text: string,
		  		confirmButtonClass: "btn-confirm",
		  		type: "error",
		  		confirmButtonText: "Entiendo"
		  	});
        	console.log(data.responseText);
		}
    });
}