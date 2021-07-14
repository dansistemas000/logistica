
$(document).on('click','.exit',function(e) {
    e.preventDefault();
    let element = $(this);
    let container = element.closest(".result");
    container.html("");
    container.removeClass("result-error result-success");
});





$(document).on('click','.login_btn',function(e) {
	e.preventDefault();
	let form = $(".form_login");
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
        },
        success : function(data){
        	if(data.status){
        		window.location=data.redirect;
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
});