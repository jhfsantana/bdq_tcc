<!DOCTYPE html>
<html>
<head>
<script>
</script>

	<link rel="stylesheet" href="/css/bg-blur.css">

	<link rel="stylesheet" href="/css/bootstrap.css">
	<title>Formulario para gerar avaliação</title>
</head>
<body>

	<div class="container">    
        <div id="questaobox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Gerar Avaliação</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            
                        <form id="provaform" class="form-group" role="form" method="post" action="gerar">
							
							<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
							
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
	                            <select class="form-control" name="disciplina">
									@foreach($professor->disciplinas as $disciplinas)
	  									<option value="{{$disciplinas->id}}">{{$disciplinas->nome}}</option>
									@endforeach
								</select>
								
							</div>

							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
	                            <select class="form-control" name="nivel">
	  								<option value="1">Facil</option>
								 	<option value="2">Moderada</option>
								  	<option value="3">Dificil</option>
								  	<option value="4">Muito dificil</option>
								</select>
							</div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                        <textarea id="questao-area" type="textarea" rows="10" class="form-control" name="questao" placeholder="Questão"></textarea>
							
                         
                         				 <form action="" method="post">
											<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
											<input type="submit" name="buscar-questao" value="Buscar Questao" class="form-control">
										</form>


										<form action="" method="post">
											<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
											<input type="submit" name="substituir-questao" value="Substituir Questao" class="form-control">
										</form>



										<form action="" method="post">
											<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
											<input type="submit" name="salvar-questao" value="Salvar Questao" class="form-control">
										</form>
		   


							</div>



							 
 


                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i>										      	  
                                        <input id="questao-alternativa-a" type="text" class="form-control" name="a" placeholder="Alternativa A">
                                        <label><input type="checkbox"  value="a" name="correta"> Alternativa Correta</span></label>
                           	</div>

                           	<div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i>										      	  
                                        <input id="questao-alternativa-b" type="text" class="form-control" name="b" placeholder="Alternativa B">
                                        <label><input type="checkbox"  value="b" name="correta"> Alternativa Correta</span></label>
                           	</div>

                           	<div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i>										      	  
                                        <input id="questao-alternativa-c" type="text" class="form-control" name="c" placeholder="Alternativa C">
                                        <label><input type="checkbox" value="c" name="correta"> Alternativa Correta</span></label>
                           	</div>

                           	<div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i>										      	  
                                        <input id="questao-alternativa-d" type="text" class="form-control" name="d" placeholder="Alternativa D">
                                        <label><input type="checkbox" value="d" name="correta"> Alternativa Correta</span></label>
                           	</div>

                           	<div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i>										      	  
                                        <input id="questao-alternativa-e" type="text" class="form-control" name="e" placeholder="Alternativa E">
                                        <label><input type="checkbox" value="e" name="correta"> Alternativa Correta</span></label>
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

</body>
</html>