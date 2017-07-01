$(document).ready(function(){
    
    // --------------------
    //  VARIABLES GLOBALES
    // --------------------
    // var nombre = $("#nombre");
    // var correo = $("#correo");
    // var pais = $(".pais");
    // var comentario = $("textarea");
    // var est_texto = $(".estado_texto");

    // var estado = $(".cambiaEstado .btn");

    // for(var i=0; i<estado.length; i++){
    // 	estado.css("textAlign","center");
    // 	console.log(estado[i]);	
    // 	// console.log(estado[i].text());	
    // }

    var celdas = $(".table");

    for(var i=0; i<celdas.length; i++){
    	celdas.find("th").css("textAlign","center");
    	celdas.css("textAlign","center");
    	celdas.find("td").css("verticalAlign","middle");
    	// console.log(celdas[i]);	
    	// console.log(estado[i].text());	
    }

    

    // estado.on({
    // 	mouseenter:function(){
    //         $(this).css("backgroundColor","#954120");
    //     } ,
    //     mouseleave:function(){
    //         $(this).css("backgroundColor","red");
    //     }
    // });
    
    // --------------------
    //       METODOS
    // --------------------
    // function limpiarCSS(algo){
    //     algo.css("background-color","white");
    //     algo.css("color","black");
    // }
    
	// function limpiarCSS(algo){
	//         algo.css("background-color","white");
	//         algo.css("color","black");
	//     }

    // function valCorreo(c) {
    //     var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    //     return re.test(c);
    // }
    
    // function valNombre(n){
    //     var re = /\w\w\w[^0123456789]/;
    //     return re.test(n);
    // }
    
    
    // --------------------
    //        TEST
    // --------------------
    
    //    $("h1").click(function(){
    //        alert("Algo: "+pais.val());
    //    })
    
    
    // -------------------
    //        START
    // -------------------
    
    // nombre.focus();
    
    
    // nombre.click(function(){
    //     limpiarCSS(nombre);
    // });
    
    // correo.click(function(){
    //     limpiarCSS(correo);
    // });
    
    // pais.click(function(){
    //     limpiarCSS(pais);
    // });
    
    // $('input[name=estado]').click(function(){
    //     est_texto.css("color","black");
    // });
    
    // comentario.click(function(){
    //     limpiarCSS(comentario);
    // });
    
    // // --------------------
    // //   BOTON - LIMPIAR
    // // --------------------
    // $("#limpiar").click(function(){
        
    //     var civil = $('input[name=estado]:checked');
        
    //     nombre.val("");
    //     correo.val("");
    //     pais.val("1");
    //     civil.prop("checked",false);
    //     comentario.val("");
        
    //     limpiarCSS(nombre);
    //     limpiarCSS(correo);
    //     limpiarCSS(pais);
    //     limpiarCSS(est_texto);
    //     limpiarCSS(comentario);
        
    //     nombre.focus();
        
    // });
    
    // // --------------------
    // //   BOTON - ENVIAR
    // // --------------------
    // $("#enviar").click(function(){
    //     var nombre = $("#nombre");
    //     var correo = $("#correo");
    //     var pais = $(".pais");
    //     var civil = $('input[name=estado]:checked');
    //     var comentario = $('textarea');
        
    //     var bandera = false;
        
    //     // VALIDAR CAMPOS VACIOS
    //     if(nombre.val().toString().length <= 0){
    //         bandera = true;
    //         nombre.css("background-color","red");
    //     }
        
    //     if(correo.val().toString().length <= 0){
    //         bandera = true;
    //         correo.css("background-color","red");
    //     }
        
    //     if(pais.val().toString().length == 1){
    //         bandera = true;
    //         pais.css("color","red");
    //     }
        
    //     if($('input[name=estado]:checked').val() === undefined){
    //         bandera = true;
    //         est_texto.css("color","red");
    //     }
        
    //     if(comentario.val().toString().length <= 0){
    //         bandera = true;
    //         comentario.css("background-color","red");
    //     }
        
    //     // MENSAJE DE ALERTA
    //     if(bandera){
    //         alert("Existen campos vacíos..");
    //     }else{
    //         //EXPRESIONES REGULARES
            
    //         var band2 = false;
            
    //         if(valCorreo(correo.val())){
    //             correo.css("color","green");
    //         }else{
    //             correo.css("color","red");
    //             band2 = true;
    //         }
            
    //         if(valNombre(nombre.val())){
    //             nombre.css("color","green");
    //         }else{
    //             nombre.css("color","red");
    //             band2 = true;
    //         }
            
    //         if(valComentario(comentario.val())){
    //             comentario.css("color","green");
    //         }else{
    //             comentario.css("color","red");
    //             band2 = true;
    //         }
            
            
    //         if(band2){
    //             alert("Algún o algunos de tus datos estan incorrectos..");
    //         }
            
    //     }
        
    // });
    
});