<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bg-blur.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" href="/css/bootstrap.css">
	<title>Formulario para gerar avaliação</title>

<script>

    

 $(document).ready(function() {
    var clicked = 0;

    $("#buscar").click(function(e) {                
        e.preventDefault();
        e.stopPropagation();
        
     //make sure default click event happens
        

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
            console.log(response);

            
        }

    });
        $(this).attr('disabled', 'disabled');
        setTimeout(enableButton, 60000);
        return true;
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
</script>
</head>
<body>
	<div class="container">    
        <div id="questaobox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Gerar Avaliação</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <form id="provaform" class="form-group" role="form" method="post" action="gerar/salvar">
							
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
							
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
	                            <select class="form-control" name="disciplina" id="disciplina_id">
									@foreach($professor->disciplinas as $disciplinas)
	  									<option value="{{$disciplinas->id}}">{{$disciplinas->nome}}</option>
									@endforeach
								</select>
								
							</div>

							<div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
                                <select class="form-control" id="nivel">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select>
                            </div>


                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                <select multiple class="form-control"  name ="turmas[]">
                                    @foreach($professor->disciplinas as $disciplina)    
                                        @foreach($disciplina->turmas as $turma)
                                            <option value="{{$turma->id}}">{{$turma->nome}} - {{$disciplina->nome}}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                        <textarea id="questao-area" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>

                                        
                         				<form id = "frmbuscar" action="" method="GET">
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden" value="{{$disciplinas->id}}"> 
                                            <input id = "buscar" type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
                                        </form>
                                         


										<form action="" method="GET">
											<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
											<input type="submit" id="substituir" value="Substituir Questao" class="form-control">
										</form>



										<form action="gerar/salvar" method="post" >
											<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
											<input form="provaform" type="submit" id="salvar" value="Salvar Questao" class="form-control">
										</form>
		   


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
                                <div style="margin-top:10px" class="form-group">
                                                                    
                                    <div class="col-sm-12 controls">
                                    	<input type="submit" value="Salvar"  class="btn btn-success">
                                    </div>
                                </div>
                            </form> 
                        </div>                     
                    </div>  
        </div>
    </div>	
                                        
                                        <a href="#"><span class="glyphicon glyphicon-refresh" aria-hidden="true" onclick="buscar()"></span></a>
                                        
</body>
</html>