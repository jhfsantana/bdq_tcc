
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

 $(document).ready(function() {
    var clicked = 0;

    var res = {
        loader : $('<div />', { class: 'loader'}),
        container: $('#questao1')
    }


    
    $("#buscar").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
        var nivel_selecionado = $('input[name="nivel"]:checked').val();


      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivel_id" : nivel_selecionado, "professor_id" : $('#prof').val()},
        dataType: "JSON",   //expect html to be returned                
        
        beforesend: function(){
            res.container.append(res.loader);
        },
        success: function(response){
            res.container.find(res.loader).remove() ;
            var questao = "questao"
            var alternativaA = "alternativaA"
            var alternativaB = "alternativaB"
            var alternativaC = "alternativaC"
            var alternativaD = "alternativaD"
            var alternativaE = "alternativaE"
            $("#questao-area").html(JSON.stringify(response[questao]));
            $("#alternativaA").html(JSON.stringify(response[alternativaA]));
            $("#alternativaB").html(JSON.stringify(response[alternativaB]));
            $("#alternativaC").html(JSON.stringify(response[alternativaC]));
            $("#alternativaD").html(JSON.stringify(response[alternativaD]));
            $("#alternativaE").html(JSON.stringify(response[alternativaE]));
            var questao_id = "id"
            $("#questao_id").html(JSON.stringify(response[questao_id]));

            console.log(response);

            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});

 $(document).ready(function() {
        var clique = 0;

    $("#substituir").click(function(e) {   
        clique++;             
        e.preventDefault();
        e.stopPropagation();
      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivel_id" : $('#nivel').val(), "professor_id" : $('#prof').val()},
        dataType: "JSON",   //expect html to be returned                
        success: function(response){
                           
            var questao = "questao"
            var alternativaA = "alternativaA"
            var alternativaB = "alternativaB"
            var alternativaC = "alternativaC"
            var alternativaD = "alternativaD"
            var alternativaE = "alternativaE"
            $("#questao-area").html(JSON.stringify(response[questao]));
            $("#alternativaA").html(JSON.stringify(response[alternativaA]));
            $("#alternativaB").html(JSON.stringify(response[alternativaB]));
            $("#alternativaC").html(JSON.stringify(response[alternativaC]));
            $("#alternativaD").html(JSON.stringify(response[alternativaD]));
            $("#alternativaE").html(JSON.stringify(response[alternativaE]));
            var questao_id = "id"
            $("#questao_id").html(JSON.stringify(response[questao_id]));
            var disciplina_id = "disciplina_id"
            $("#disciplina_id").html(JSON.stringify(response[disciplina_id]));

            console.log(response);
         
                return false;
          
        }

    });
        if(clique == 3){
            $(this).attr('disabled', 'disabled');
            alert("Você já substituiu " +clique+" vezes)!");
            setTimeout(enableButton, 60000);
            return true;
        }
});
});


/*$(document).ready(function() {
*/    $("#avaliacaoform").click(function(e) {                

        
        var formData = $(this).serialize();
      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "gerar/salvar",
        data:  formData,
        dataType: "JSON",   //expect html to be returned                
        success: function(response){
            console.log(response);
        }

        });
    });
/*});
*/

$(document).ready(function() {
    $("#provaform").click(function(e) {                
        
        e.preventDefault();
        e.stopPropagation();
        
        var formData = $(this).serialize();
      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "gerar/adicionar",
        data:  formData,
        dataType: "JSON",   //expect html to be returned                
        success: function(response){
            console.log(response);
        }

        });
    });
});


$(document).ready(function() {
    var clicked = 0;

    $("#buscar2").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
    var nivel_selecionado = $('input[name="nivelq2_id"]:checked').val();  

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq2_id" : nivel_selecionado, "professor_id" : $('#prof').val()},
        dataType: "JSON",   //expect html to be returned                
        success: function(response){

            var questao = "questao"
            var alternativaA = "alternativaA"
            var alternativaB = "alternativaB"
            var alternativaC = "alternativaC"
            var alternativaD = "alternativaD"
            var alternativaE = "alternativaE"
            var questao2_id = "id"
            $("#questao-area2").html(JSON.stringify(response[questao]));
            $("#questao2_id").html(JSON.stringify(response[questao2_id]));
            $("#alternativaA2").html(JSON.stringify(response[alternativaA]));
            $("#alternativaB2").html(JSON.stringify(response[alternativaB]));
            $("#alternativaC2").html(JSON.stringify(response[alternativaC]));
            $("#alternativaD2").html(JSON.stringify(response[alternativaD]));
            $("#alternativaE2").html(JSON.stringify(response[alternativaE]));

            console.log(response);

            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});


$(document).ready(function() {
    var clicked = 0;

    $("#buscar3").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
    
    var nivel_selecionado = $('input[name="nivelq3_id"]:checked').val();  

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq3_id" :nivel_selecionado},
        dataType: "JSON",   //expect html to be returned                
        success: function(response){

            var questao = "questao"
            var alternativaA = "alternativaA"
            var alternativaB = "alternativaB"
            var alternativaC = "alternativaC"
            var alternativaD = "alternativaD"
            var alternativaE = "alternativaE"
            var questao3_id = "id"
            $("#questao-area3").html(JSON.stringify(response[questao]));
            $("#questao3_id").html(JSON.stringify(response[questao3_id]));
            $("#alternativaA3").html(JSON.stringify(response[alternativaA]));
            $("#alternativaB3").html(JSON.stringify(response[alternativaB]));
            $("#alternativaC3").html(JSON.stringify(response[alternativaC]));
            $("#alternativaD3").html(JSON.stringify(response[alternativaD]));
            $("#alternativaE3").html(JSON.stringify(response[alternativaE]));

            console.log(response);

            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});

$(document).ready(function() {
    var clicked = 0;

    $("#buscar4").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
    
        var nivel_selecionado = $('input[name="nivelq4_id"]:checked').val();  

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq4_id" :nivel_selecionado},
        dataType: "JSON",   //expect html to be returned                
        success: function(response){

            var questao = "questao"
            var alternativaA = "alternativaA"
            var alternativaB = "alternativaB"
            var alternativaC = "alternativaC"
            var alternativaD = "alternativaD"
            var alternativaE = "alternativaE"
            var questao4_id = "id"
            $("#questao-area4").html(JSON.stringify(response[questao]));
            $("#questao4_id").html(JSON.stringify(response[questao4_id]));
            $("#alternativaA4").html(JSON.stringify(response[alternativaA]));
            $("#alternativaB4").html(JSON.stringify(response[alternativaB]));
            $("#alternativaC4").html(JSON.stringify(response[alternativaC]));
            $("#alternativaD4").html(JSON.stringify(response[alternativaD]));
            $("#alternativaE4").html(JSON.stringify(response[alternativaE]));

            console.log(response);

            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});

$(document).ready(function() {
    var clicked = 0;

    $("#buscar5").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
        
        var nivel_selecionado = $('input[name="nivelq5_id"]:checked').val();  

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq5_id" : nivel_selecionado},
        dataType: "JSON",   //expect html to be returned                
        success: function(response){

            var questao = "questao"
            var alternativaA = "alternativaA"
            var alternativaB = "alternativaB"
            var alternativaC = "alternativaC"
            var alternativaD = "alternativaD"
            var alternativaE = "alternativaE"
            var questao5_id = "id"
            $("#questao-area5").html(JSON.stringify(response[questao]));
            $("#questao5_id").html(JSON.stringify(response[questao5_id]));
            $("#alternativaA5").html(JSON.stringify(response[alternativaA]));
            $("#alternativaB5").html(JSON.stringify(response[alternativaB]));
            $("#alternativaC5").html(JSON.stringify(response[alternativaC]));
            $("#alternativaD5").html(JSON.stringify(response[alternativaD]));
            $("#alternativaE5").html(JSON.stringify(response[alternativaE]));

            console.log(response);

            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});

$(document).ready(function() {
    var clicked = 0;

    $("#buscar6").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
        
        var nivel_selecionado = $('input[name="nivelq6_id"]:checked').val();  


      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq6_id" : nivel_selecionado},
        dataType: "JSON",   //expect html to be returned                
        success: function(response){

            var questao = "questao"
            var alternativaA = "alternativaA"
            var alternativaB = "alternativaB"
            var alternativaC = "alternativaC"
            var alternativaD = "alternativaD"
            var alternativaE = "alternativaE"
            var questao6_id = "id"
            $("#questao-area6").html(JSON.stringify(response[questao]));
            $("#questao6_id").html(JSON.stringify(response[questao6_id]));
            $("#alternativaA6").html(JSON.stringify(response[alternativaA]));
            $("#alternativaB6").html(JSON.stringify(response[alternativaB]));
            $("#alternativaC6").html(JSON.stringify(response[alternativaC]));
            $("#alternativaD6").html(JSON.stringify(response[alternativaD]));
            $("#alternativaE6").html(JSON.stringify(response[alternativaE]));

            console.log(response);

            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});

$(document).ready(function() {
    var clicked = 0;

    $("#buscar7").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
    
    var nivel_selecionado = $('input[name="nivelq7_id"]:checked').val();  

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq7_id" : nivel_selecionado},
        dataType: "JSON",   //expect html to be returned                
        success: function(response){

            var questao = "questao"
            var alternativaA = "alternativaA"
            var alternativaB = "alternativaB"
            var alternativaC = "alternativaC"
            var alternativaD = "alternativaD"
            var alternativaE = "alternativaE"
            var questao7_id = "id"
            $("#questao-area7").html(JSON.stringify(response[questao]));
            $("#questao7_id").html(JSON.stringify(response[questao7_id]));
            $("#alternativaA7").html(JSON.stringify(response[alternativaA]));
            $("#alternativaB7").html(JSON.stringify(response[alternativaB]));
            $("#alternativaC7").html(JSON.stringify(response[alternativaC]));
            $("#alternativaD7").html(JSON.stringify(response[alternativaD]));
            $("#alternativaE7").html(JSON.stringify(response[alternativaE]));

            console.log(response);

            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});

$(document).ready(function() {
    var clicked = 0;

    $("#buscar8").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
    
    var nivel_selecionado = $('input[name="nivelq8_id"]:checked').val();  
   

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq8_id" : nivel_selecionado},
        dataType: "JSON",   //expect html to be returned                
        success: function(response){

            var questao = "questao"
            var alternativaA = "alternativaA"
            var alternativaB = "alternativaB"
            var alternativaC = "alternativaC"
            var alternativaD = "alternativaD"
            var alternativaE = "alternativaE"
            var questao8_id = "id"
            $("#questao-area8").html(JSON.stringify(response[questao]));
            $("#questao8_id").html(JSON.stringify(response[questao8_id]));
            $("#alternativaA8").html(JSON.stringify(response[alternativaA]));
            $("#alternativaB8").html(JSON.stringify(response[alternativaB]));
            $("#alternativaC8").html(JSON.stringify(response[alternativaC]));
            $("#alternativaD8").html(JSON.stringify(response[alternativaD]));
            $("#alternativaE8").html(JSON.stringify(response[alternativaE]));

            console.log(response);

            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});

$(document).ready(function() {
    var clicked = 0;

    $("#buscar9").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
    
    var nivel_selecionado = $('input[name="nivelq9_id"]:checked').val();  


      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq9_id" : nivel_selecionado},
        dataType: "JSON",   //expect html to be returned                
        success: function(response){

            var questao = "questao"
            var alternativaA = "alternativaA"
            var alternativaB = "alternativaB"
            var alternativaC = "alternativaC"
            var alternativaD = "alternativaD"
            var alternativaE = "alternativaE"
            var questao9_id = "id"
            $("#questao-area9").html(JSON.stringify(response[questao]));
            $("#questao9_id").html(JSON.stringify(response[questao9_id]));
            $("#alternativaA9").html(JSON.stringify(response[alternativaA]));
            $("#alternativaB9").html(JSON.stringify(response[alternativaB]));
            $("#alternativaC9").html(JSON.stringify(response[alternativaC]));
            $("#alternativaD9").html(JSON.stringify(response[alternativaD]));
            $("#alternativaE9").html(JSON.stringify(response[alternativaE]));

            console.log(response);

            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});

$(document).ready(function() {
    var clicked = 0;

    $("#buscar10").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
    
    var nivel_selecionado = $('input[name="nivelq10_id"]:checked').val();  


      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq10_id" :nivel_selecionado},
        dataType: "JSON",   //expect html to be returned                
        success: function(response){

            var questao = "questao"
            var alternativaA = "alternativaA"
            var alternativaB = "alternativaB"
            var alternativaC = "alternativaC"
            var alternativaD = "alternativaD"
            var alternativaE = "alternativaE"
            var questao10_id = "id"
            $("#questao-area10").html(JSON.stringify(response[questao]));
            $("#questao10_id").html(JSON.stringify(response[questao10_id]));
            $("#alternativaA10").html(JSON.stringify(response[alternativaA]));
            $("#alternativaB10").html(JSON.stringify(response[alternativaB]));
            $("#alternativaC10").html(JSON.stringify(response[alternativaC]));
            $("#alternativaD10").html(JSON.stringify(response[alternativaD]));
            $("#alternativaE10").html(JSON.stringify(response[alternativaE]));

            console.log(response);

            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});

$(document).ready(function() {
    $("#adicionar1").click(function(e) {                
  
        $('#questaobox6').toggle("slow").hide();
            e.preventDefault();
            e.stopPropagation();
    });
});