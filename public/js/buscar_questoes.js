
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
        var disciplina_nome = $('#disciplina_id').text().replace(/\s/g, "");

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivel_id" : nivel_selecionado, "professor_id" : $('#prof').val(), "disciplina_nome" : disciplina_nome},
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

             if(response['correta'] === "a")
            {
                
                document.getElementById('alternativaA').style.borderColor="#58BF67";
                document.getElementById('alternativaA').style.borderWidth="medium";

            }
            else
            {
                document.getElementById('alternativaA').style.borderColor="red";
                document.getElementById('alternativaA').style.borderWidth="thin";
            }
            if(response['correta'] === "b")
            {
                document.getElementById('alternativaB').style.borderColor="#58BF67";
                document.getElementById('alternativaB').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaB').style.borderColor="red";
                document.getElementById('alternativaB').style.borderWidth="thin";
            }
            
            if(response['correta'] === "c")
            {
                document.getElementById('alternativaC').style.borderColor="#58BF67";
                document.getElementById('alternativaC').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaC').style.borderColor="red";
                document.getElementById('alternativaC').style.borderWidth="thin";

            }

            if(response['correta'] === "d")
            {
                document.getElementById('alternativaD').style.borderColor="#58BF67";
                document.getElementById('alternativaD').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaD').style.borderColor="red";
                document.getElementById('alternativaD').style.borderWidth="thin";
            }
            if(response['correta'] === "e")
            {
                document.getElementById('alternativaE').style.borderColor="#58BF67";
                document.getElementById('alternativaE').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaE').style.borderColor="red";
                document.getElementById('alternativaE').style.borderWidth="thin";
            }
            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
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
    var disciplina_nome = $('#disciplina_id').text().replace(/\s/g, "");

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq2_id" : nivel_selecionado, "professor_id" : $('#prof').val(),  "disciplina_nome" : disciplina_nome},
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

            if(response['correta'] === "a")
            {
                
                document.getElementById('alternativaA2').style.borderColor="#58BF67";
                document.getElementById('alternativaA2').style.borderWidth="medium";

            }
            else
            {
                document.getElementById('alternativaA2').style.borderColor="red";
                document.getElementById('alternativaA2').style.borderWidth="thin";
            }
            if(response['correta'] === "b")
            {
                document.getElementById('alternativaB2').style.borderColor="#58BF67";
                document.getElementById('alternativaB2').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaB2').style.borderColor="red";
                document.getElementById('alternativaB2').style.borderWidth="thin";
            }
            
            if(response['correta'] === "c")
            {
                document.getElementById('alternativaC2').style.borderColor="#58BF67";
                document.getElementById('alternativaC2').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaC102').style.borderColor="red";
                document.getElementById('alternativaC2').style.borderWidth="thin";

            }

            if(response['correta'] === "d")
            {
                document.getElementById('alternativaD2').style.borderColor="#58BF67";
                document.getElementById('alternativaD2').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaD2').style.borderColor="red";
                document.getElementById('alternativaD2').style.borderWidth="thin";
            }
            if(response['correta'] === "e")
            {
                document.getElementById('alternativaE2').style.borderColor="#58BF67";
                document.getElementById('alternativaE2').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaE2').style.borderColor="red";
                document.getElementById('alternativaE2').style.borderWidth="thin";
            }
            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});


$(document).ready(function() {
    var clicked = 0;
    var disciplina_nome = $('#disciplina_id').text().replace(/\s/g, "");
    $("#buscar3").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
    
    var nivel_selecionado = $('input[name="nivelq3_id"]:checked').val();  

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq3_id" :nivel_selecionado, "disciplina_nome" : disciplina_nome},
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

            if(response['correta'] === "a")
            {
                
                document.getElementById('alternativaA3').style.borderColor="#58BF67";
                document.getElementById('alternativaA3').style.borderWidth="medium";

            }
            else
            {
                document.getElementById('alternativaA3').style.borderColor="red";
                document.getElementById('alternativaA3').style.borderWidth="thin";
            }
            if(response['correta'] === "b")
            {
                document.getElementById('alternativaB3').style.borderColor="#58BF67";
                document.getElementById('alternativaB3').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaB3').style.borderColor="red";
                document.getElementById('alternativaB3').style.borderWidth="thin";
            }
            
            if(response['correta'] === "c")
            {
                document.getElementById('alternativaC3').style.borderColor="#58BF67";
                document.getElementById('alternativaC3').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaC3').style.borderColor="red";
                document.getElementById('alternativaC3').style.borderWidth="thin";

            }

            if(response['correta'] === "d")
            {
                document.getElementById('alternativaD3').style.borderColor="#58BF67";
                document.getElementById('alternativaD3').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaD3').style.borderColor="red";
                document.getElementById('alternativaD3').style.borderWidth="thin";
            }
            if(response['correta'] === "e")
            {
                document.getElementById('alternativaE3').style.borderColor="#58BF67";
                document.getElementById('alternativaE3').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaE3').style.borderColor="red";
                document.getElementById('alternativaE3').style.borderWidth="thin";
            }
            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});

$(document).ready(function() {
    var clicked = 0;
    var disciplina_nome = $('#disciplina_id').text().replace(/\s/g, "");
    $("#buscar4").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
    
        var nivel_selecionado = $('input[name="nivelq4_id"]:checked').val();  

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq4_id" :nivel_selecionado, "disciplina_nome" : disciplina_nome},
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

            if(response['correta'] === "a")
            {
                
                document.getElementById('alternativaA4').style.borderColor="#58BF67";
                document.getElementById('alternativaA4').style.borderWidth="medium";

            }
            else
            {
                document.getElementById('alternativaA4').style.borderColor="red";
                document.getElementById('alternativaA4').style.borderWidth="thin";
            }
            if(response['correta'] === "b")
            {
                document.getElementById('alternativaB4').style.borderColor="#58BF67";
                document.getElementById('alternativaB4').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaB4').style.borderColor="red";
                document.getElementById('alternativaB4').style.borderWidth="thin";
            }
            
            if(response['correta'] === "c")
            {
                document.getElementById('alternativaC4').style.borderColor="#58BF67";
                document.getElementById('alternativaC4').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaC4').style.borderColor="red";
                document.getElementById('alternativaC4').style.borderWidth="thin";

            }

            if(response['correta'] === "d")
            {
                document.getElementById('alternativaD4').style.borderColor="#58BF67";
                document.getElementById('alternativaD4').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaD4').style.borderColor="red";
                document.getElementById('alternativaD4').style.borderWidth="thin";
            }
            if(response['correta'] === "e")
            {
                document.getElementById('alternativaE4').style.borderColor="#58BF67";
                document.getElementById('alternativaE4').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaE4').style.borderColor="red";
                document.getElementById('alternativaE4').style.borderWidth="thin";
            }

            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});

$(document).ready(function() {
    var clicked = 0;
    var disciplina_nome = $('#disciplina_id').text().replace(/\s/g, "");
    $("#buscar5").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
        
        var nivel_selecionado = $('input[name="nivelq5_id"]:checked').val();  

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq5_id" : nivel_selecionado, "disciplina_nome" : disciplina_nome},
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

            if(response['correta'] === "a")
            {
                
                document.getElementById('alternativaA5').style.borderColor="#58BF67";
                document.getElementById('alternativaA5').style.borderWidth="medium";

            }
            else
            {
                document.getElementById('alternativaA5').style.borderColor="red";
                document.getElementById('alternativaA5').style.borderWidth="thin";
            }
            if(response['correta'] === "b")
            {
                document.getElementById('alternativaB5').style.borderColor="#58BF67";
                document.getElementById('alternativaB5').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaB5').style.borderColor="red";
                document.getElementById('alternativaB5').style.borderWidth="thin";
            }
            
            if(response['correta'] === "c")
            {
                document.getElementById('alternativaC5').style.borderColor="#58BF67";
                document.getElementById('alternativaC5').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaC5').style.borderColor="red";
                document.getElementById('alternativaC5').style.borderWidth="thin";

            }

            if(response['correta'] === "d")
            {
                document.getElementById('alternativaD5').style.borderColor="#58BF67";
                document.getElementById('alternativaD5').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaD5').style.borderColor="red";
                document.getElementById('alternativaD5').style.borderWidth="thin";
            }
            if(response['correta'] === "e")
            {
                document.getElementById('alternativaE5').style.borderColor="#58BF67";
                document.getElementById('alternativaE5').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaE5').style.borderColor="red";
                document.getElementById('alternativaE5').style.borderWidth="thin";
            }
            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});

$(document).ready(function() {
    var clicked = 0;
    var disciplina_nome = $('#disciplina_id').text().replace(/\s/g, "");
    $("#buscar6").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
        
        var nivel_selecionado = $('input[name="nivelq6_id"]:checked').val();  


      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq6_id" : nivel_selecionado, "disciplina_nome" : disciplina_nome},
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

            if(response['correta'] === "a")
            {
                
                document.getElementById('alternativaA6').style.borderColor="#58BF67";
                document.getElementById('alternativaA6').style.borderWidth="medium";

            }
            else
            {
                document.getElementById('alternativaA6').style.borderColor="red";
                document.getElementById('alternativaA6').style.borderWidth="thin";
            }
            if(response['correta'] === "b")
            {
                document.getElementById('alternativaB6').style.borderColor="#58BF67";
                document.getElementById('alternativaB6').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaB6').style.borderColor="red";
                document.getElementById('alternativaB6').style.borderWidth="thin";
            }
            
            if(response['correta'] === "c")
            {
                document.getElementById('alternativaC6').style.borderColor="#58BF67";
                document.getElementById('alternativaC6').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaC6').style.borderColor="red";
                document.getElementById('alternativaC6').style.borderWidth="thin";

            }

            if(response['correta'] === "d")
            {
                document.getElementById('alternativaD6').style.borderColor="#58BF67";
                document.getElementById('alternativaD6').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaD6').style.borderColor="red";
                document.getElementById('alternativaD6').style.borderWidth="thin";
            }
            if(response['correta'] === "e")
            {
                document.getElementById('alternativaE6').style.borderColor="#58BF67";
                document.getElementById('alternativaE6').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaE6').style.borderColor="red";
                document.getElementById('alternativaE6').style.borderWidth="thin";
            }
            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});

$(document).ready(function() {
    var clicked = 0;
    var disciplina_nome = $('#disciplina_id').text().replace(/\s/g, "");
    $("#buscar7").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
    
    var nivel_selecionado = $('input[name="nivelq7_id"]:checked').val();  

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq7_id" : nivel_selecionado, "disciplina_nome" : disciplina_nome},
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

            if(response['correta'] === "a")
            {
                
                document.getElementById('alternativaA7').style.borderColor="#58BF67";
                document.getElementById('alternativaA7').style.borderWidth="medium";

            }
            else
            {
                document.getElementById('alternativaA7').style.borderColor="red";
                document.getElementById('alternativaA7').style.borderWidth="thin";
            }
            if(response['correta'] === "b")
            {
                document.getElementById('alternativaB7').style.borderColor="#58BF67";
                document.getElementById('alternativaB7').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaB7').style.borderColor="red";
                document.getElementById('alternativaB7').style.borderWidth="thin";
            }
            
            if(response['correta'] === "c")
            {
                document.getElementById('alternativaC7').style.borderColor="#58BF67";
                document.getElementById('alternativaC7').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaC7').style.borderColor="red";
                document.getElementById('alternativaC7').style.borderWidth="thin";

            }

            if(response['correta'] === "d")
            {
                document.getElementById('alternativaD7').style.borderColor="#58BF67";
                document.getElementById('alternativaD7').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaD7').style.borderColor="red";
                document.getElementById('alternativaD7').style.borderWidth="thin";
            }
            if(response['correta'] === "e")
            {
                document.getElementById('alternativaE7').style.borderColor="#58BF67";
                document.getElementById('alternativaE7').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaE7').style.borderColor="red";
                document.getElementById('alternativaE7').style.borderWidth="thin";
            }
            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});

$(document).ready(function() {
    var clicked = 0;
    var disciplina_nome = $('#disciplina_id').text().replace(/\s/g, "");
    $("#buscar8").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
    
    var nivel_selecionado = $('input[name="nivelq8_id"]:checked').val();  
   

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq8_id" : nivel_selecionado, "disciplina_nome" : disciplina_nome},
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

            if(response['correta'] === "a")
            {
                
                document.getElementById('alternativaA8').style.borderColor="#58BF67";
                document.getElementById('alternativaA8').style.borderWidth="medium";

            }
            else
            {
                document.getElementById('alternativaA8').style.borderColor="red";
                document.getElementById('alternativaA8').style.borderWidth="thin";
            }
            if(response['correta'] === "b")
            {
                document.getElementById('alternativaB8').style.borderColor="#58BF67";
                document.getElementById('alternativaB8').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaB8').style.borderColor="red";
                document.getElementById('alternativaB8').style.borderWidth="thin";
            }
            
            if(response['correta'] === "c")
            {
                document.getElementById('alternativaC8').style.borderColor="#58BF67";
                document.getElementById('alternativaC8').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaC8').style.borderColor="red";
                document.getElementById('alternativaC8').style.borderWidth="thin";

            }

            if(response['correta'] === "d")
            {
                document.getElementById('alternativaD8').style.borderColor="#58BF67";
                document.getElementById('alternativaD8').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaD8').style.borderColor="red";
                document.getElementById('alternativaD8').style.borderWidth="thin";
            }
            if(response['correta'] === "e")
            {
                document.getElementById('alternativaE8').style.borderColor="#58BF67";
                document.getElementById('alternativaE8').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaE8').style.borderColor="red";
                document.getElementById('alternativaE8').style.borderWidth="thin";
            }
            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});

$(document).ready(function() {
    var clicked = 0;
    var disciplina_nome = $('#disciplina_id').text().replace(/\s/g, "");
    $("#buscar9").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
    
    var nivel_selecionado = $('input[name="nivelq9_id"]:checked').val();  


      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq9_id" : nivel_selecionado, "disciplina_nome" : disciplina_nome},
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

            if(response['correta'] === "a")
            {
                
                document.getElementById('alternativaA9').style.borderColor="#58BF67";
                document.getElementById('alternativaA9').style.borderWidth="medium";

            }
            else
            {
                document.getElementById('alternativaA9').style.borderColor="red";
                document.getElementById('alternativaA9').style.borderWidth="thin";
            }
            if(response['correta'] === "b")
            {
                document.getElementById('alternativaB9').style.borderColor="#58BF67";
                document.getElementById('alternativaB9').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaB9').style.borderColor="red";
                document.getElementById('alternativaB9').style.borderWidth="thin";
            }
            
            if(response['correta'] === "c")
            {
                document.getElementById('alternativaC9').style.borderColor="#58BF67";
                document.getElementById('alternativaC9').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaC9').style.borderColor="red";
                document.getElementById('alternativaC9').style.borderWidth="thin";

            }

            if(response['correta'] === "d")
            {
                document.getElementById('alternativaD9').style.borderColor="#58BF67";
                document.getElementById('alternativaD9').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaD9').style.borderColor="red";
                document.getElementById('alternativaD9').style.borderWidth="thin";
            }
            if(response['correta'] === "e")
            {
                document.getElementById('alternativaE9').style.borderColor="#58BF67";
                document.getElementById('alternativaE9').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaE9').style.borderColor="red";
                document.getElementById('alternativaE9').style.borderWidth="thin";
            }
            
        }

    });
        /*$(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;*/
});
});

$(document).ready(function() {
    var clicked = 0;
    var disciplina_nome = $('#disciplina_id').text().replace(/\s/g, "");
    $("#buscar10").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
    
    var nivel_selecionado = $('input[name="nivelq10_id"]:checked').val();  


      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq10_id" :nivel_selecionado, "disciplina_nome" : disciplina_nome},
        dataType: "JSON",   //expect html to be returned                
        success: function(response){

            $("#questao-area10").html(JSON.stringify(response['questao']));
            $("#questao10_id").html(JSON.stringify(response['id']));
            $("#alternativaA10").html(JSON.stringify(response['alternativaA']));
            $("#alternativaB10").html(JSON.stringify(response['alternativaB']));
            $("#alternativaC10").html(JSON.stringify(response['alternativaC']));
            $("#alternativaD10").html(JSON.stringify(response['alternativaD']));
            $("#alternativaE10").html(JSON.stringify(response['alternativaE']));

            if(response['correta'] === "a")
            {
                
                document.getElementById('alternativaA10').style.borderColor="#58BF67";
                document.getElementById('alternativaA10').style.borderWidth="medium";

            }
            else
            {
                document.getElementById('alternativaA10').style.borderColor="red";
                document.getElementById('alternativaA10').style.borderWidth="thin";
            }
            if(response['correta'] === "b")
            {
                document.getElementById('alternativaB10').style.borderColor="#58BF67";
                document.getElementById('alternativaB10').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaB10').style.borderColor="red";
                document.getElementById('alternativaB10').style.borderWidth="thin";
            }
            
            if(response['correta'] === "c")
            {
                document.getElementById('alternativaC10').style.borderColor="#58BF67";
                document.getElementById('alternativaC10').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaC10').style.borderColor="red";
                document.getElementById('alternativaC10').style.borderWidth="thin";

            }

            if(response['correta'] === "d")
            {
                document.getElementById('alternativaD10').style.borderColor="#58BF67";
                document.getElementById('alternativaD10').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaD10').style.borderColor="red";
                document.getElementById('alternativaD10').style.borderWidth="thin";
            }
            if(response['correta'] === "e")
            {
                document.getElementById('alternativaE10').style.borderColor="#58BF67";
                document.getElementById('alternativaE10').style.borderWidth="medium";
            }
            else
            {
                document.getElementById('alternativaE10').style.borderColor="red";
                document.getElementById('alternativaE10').style.borderWidth="thin";
            }

            
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