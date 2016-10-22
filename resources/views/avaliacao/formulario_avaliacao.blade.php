<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/loading.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

	<link rel="stylesheet" href="/css/bootstrap.css">
	<title>Formulario para gerar avaliação</title>

<script>

    

 $(document).ready(function() {
    var clicked = 0;

    var res = {
        loader : $('<div />', { class: 'loader'}),
        container: $('#questao1')
    }

    $("#buscar").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
        

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivel_id" : $('#nivel').val()},
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
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivel_id" : $('#nivel').val()},
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
        

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq2_id" : $('#nivelq2').val()},
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
        

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq3_id" : $('#nivelq3').val()},
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
        

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq4_id" : $('#nivelq4').val()},
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
        

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq5_id" : $('#nivelq5').val()},
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
        

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq6_id" : $('#nivelq6').val()},
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
        

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq7_id" : $('#nivelq7').val()},
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
        

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq8_id" : $('#nivelq8').val()},
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
        

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq9_id" : $('#nivelq9').val()},
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
        

      $.ajax({    //create an ajax request to load_page.php
        type: "get",
        url: "/avaliacao/{id}/gerar/buscar/",
        data:  { "disciplina_id" : $('#disciplina_id').val(), "nivelq10_id" : $('#nivelq10').val()},
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
  
        $('#questaobox').toggle("slow").hide();
            e.preventDefault();
            e.stopPropagation();
    });
});
</script>
</head>
<body>


<div class="container">    
    <div id="avaliacaobox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Selecione a disciplina para buscar as questões</div>
            </div>     

            <div style="padding-top:30px" class="panel-body" >

                <form id="avaliacaoform" class="form-group" role="form"  method="POST" action="gerar/salvar">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <input name="professor_id" type="hidden" value="{{Auth::user()->id}}"> 
                    <!-- <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                            <select class="form-control" name="disciplina" id="disciplina_id">
                                @foreach($professor->disciplinas as $disciplinas)
                                    <option value="{{$disciplinas->id}}">{{$disciplinas->nome}}</option>
                                @endforeach
                            </select>
                    </div> -->
                    
                    <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                                <select class="form-control" name="disciplina" id="disciplina_id">
                                    @foreach($professor->disciplinas as $disciplinas)
                                        <option value="{{$disciplinas->id}}">{{$disciplinas->nome}}</option>
                                    @endforeach
                                </select>
                                 <input name="professor_id" id="prof" type="hidden" value="{{Auth::user()->id}}"> 
                    </div>
                    <div class="panel panel-warning " >
                        <div class="panel-heading">
                            <div class="panel-title">Para qual turma deseja criar a Avaliação?</div>
                        </div> 
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <select class="form-control"  name ="turma">
                            @foreach($professor->disciplinas as $disciplina)    
                                @foreach($disciplina->turmas as $turma)
                                    <option value="{{$turma->id}}">{{$turma->nome}} - {{$disciplina->nome}}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>



            </div>
        </div>
    </div>
</div>












	<div class="container" id="questao1">    
        <div id="questaobox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 1</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
							
							<div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                <select class="form-control" id="nivel">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select>
                            </div>

                        <textarea form="avaliacaoform" id="questao_id" type="textarea" value="" rows="1" class="form-control" name="questao_id[]" id="questao_id" " style="display: none;"></textarea>

                           <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                        <textarea id="questao-area" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                         				<form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         

											<input name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <input form="provaform" name="professor_id" id="prof" type="hidden" value="{{Auth::user()->id}}">  



							</div>
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                      </div>
                  </div>
             </div>
         </div>

    <div class="container">    
        <div id="questaobox2" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 2</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                <select class="form-control" id="nivelq2">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select>
                            </div>

                        <textarea form="avaliacaoform" id="questao2_id" type="textarea" value="" rows="1" class="form-control" name="questao2_id[]"  style="display: none;" ></textarea>
                        

                             <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                        <textarea id="questao-area2" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar2" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         


                            </div>
							 
 
                        </form>

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA2" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB2" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC2" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD2" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE2" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>

<div class="loader">
    assa
</div>
    <div class="container">    
        <div id="questaobox3" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 3</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                <select class="form-control" id="nivelq3">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select>
                            </div>



                            <textarea form="avaliacaoform" id="questao3_id" type="textarea" value="" rows="1" class="form-control" name="questao3_id[]" style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                        <textarea id="questao-area3" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar3" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         

                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA3" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB3" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC3" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD3" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE3" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>  

    <div class="container">    
        <div id="questaobox4" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 4</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                <select class="form-control" id="nivelq4">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select>
                            </div>



                            <textarea form="avaliacaoform" id="questao4_id" type="textarea" value="" rows="1" class="form-control" name="questao4_id[]"  style="display: none;" ></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                        <textarea id="questao-area4" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar4" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA4" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB4" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC4" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD4" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE4" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>

    <div class="container">    
        <div id="questaobox4" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 5</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                           
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                <select class="form-control" id="nivelq5">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select>
                            </div>


                            <textarea form="avaliacaoform" id="questao5_id" type="textarea" value="" rows="1" class="form-control" name="questao5_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                        <textarea id="questao-area5" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar5" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
  


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA5" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB5" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC5" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD5" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE5" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>  

    <div class="container">    
        <div id="questaobox6" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 6</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                <select class="form-control" id="nivelq6">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select>
                            </div>

                            

                            <textarea form="avaliacaoform" id="questao6_id" type="textarea" value="" rows="1" class="form-control" name="questao6_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                        <textarea id="questao-area6" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar6" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA6" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB6" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC6" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD6" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE6" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>  


    <div class="container">    
        <div id="questaobox7" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 7</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                           
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                <select class="form-control" id="nivelq7">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select>
                            </div>

                           

                            <textarea form="avaliacaoform" id="questao7_id" type="textarea" value="" rows="1" class="form-control" name="questao7_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                        <textarea id="questao-area7" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar7" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA7" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB7" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC7" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD7" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativa7" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>  


    <div class="container">    
        <div id="questaobox8" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 8</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                <select class="form-control" id="nivelq8">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select>
                            </div>

                            

                            <textarea form="avaliacaoform" id="questao8_id" type="textarea" value="" rows="1" class="form-control" name="questao8_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                        <textarea id="questao-area8" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar8" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA8" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB8" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC8" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD8" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE8" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>  


    <div class="container">    
        <div id="questaobox9" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 9</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                        
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                <select class="form-control" id="nivelq9">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select>
                            </div>

                            

                            <textarea form="avaliacaoform" id="questao9_id" type="textarea" value="" rows="1" class="form-control" name="questao9_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                        <textarea id="questao-area9" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar9" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA9" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB9" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC9" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD9" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE9" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                        </div>                     
                    </div>  
        </div>
    </div>  


    <div class="container">    
        <div id="questaobox10" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 10</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                <select class="form-control" id="nivelq10">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select>
                            </div>

                           

                            <textarea form="avaliacaoform" id="questao10_id" type="textarea" value="" rows="1" class="form-control" name="questao10_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                        <textarea id="questao-area10" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                                        <form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar10" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         


                            </div>
                             
 

                                
                            

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "a" id="alternativaA10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "b" id="alternativaB10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "c" id="alternativaC10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "d" id="alternativaD10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea form="provaform" name = "e" id="alternativaE10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                       <div class="col-sm-12 controls">
                        <input type="submit" form="avaliacaoform" value="Criar Avaliação"  class="btn btn-success">
                    </div>    
                       </div>                     
                    </div>  
        </div>
    </div>
</form>
                       
</body>
</html>