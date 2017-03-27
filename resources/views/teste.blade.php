<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
  <title>BDQ - Avaliação Online / Página inicial Administrativa</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/global.css">
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
</head>
<body ng-app="BlankApp" ng-cloak>

  <br>
  <br>
  <br>

<div id="questaobox10"  class="mainbox col-md-9 col-md-offset-2 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info" flex="50">
        <div class="panel-heading">
            <div class="panel-title">Selecione a dificuldade da questão</div>
        </div> 
    </div>
    <div style="padding-left: 16px;">
            <label class="radio-inline">
                <input type="radio" name="nivelq10_id" value="1" id="nivelq10_id" checked="true"> Facil<br>
            </label>
            <label class="radio-inline">
                <input type="radio" name="nivelq10_id" value="2" id="nivelq10_id"> Moderada<br>
            </label>
            <label class="radio-inline">
                <input type="radio" name="nivelq10_id" value="3" id="nivelq10_id"> Dificil<br>
            </label>
            <label class="radio-inline">
                <input type="radio" name="nivelq10_id" value="4" id="nivelq10_id"> Muito dificil<br>
            </label>
        <input id = "disciplina_id" name="disciplina_id" type="hidden">
    </div>
    <div layout="row" layout-margin>
        <input  id="questao10_id" type="hidden" name="questao10_id[]">
        <textarea id="questao-area10" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required  flex="50"></textarea>

        <div layout="column" layout-margin flex="50">
        <div id="a10">
            <input  name = "a" id="alternativaA10" type="text" class="form-control" name="questao" placeholder="Alternativa A"></textarea>
        </div>
        <div id="b10">
            <input  name = "b" id="alternativaB10" type="text" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
        </div>
        <div id="c10">
            <input  name = "c" id="alternativaC10" type="text" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
        </div>
        <div id="d10">
            <input  name = "d" id="alternativaD10" type="text" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
        </div>
        <div id="e10">
            <input  name = "e" id="alternativaE10" type="text" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
        </div>
    <input id = "buscar10" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block" style="margin-top: 10px;">
            <div class="input-group">
                <i>Deseja alterar a quantidade de pontos?
                    <input type="radio" name="opq10" value="1"> Sim
                    <input type="radio" name="opq10" value="2" checked="true"> Não
                </i>
                <div>
                    <input  class="form-control" type="text" name="q10_pontos" id="q10_pontos" style="text-align: right;" readonly="true" />
                </div>
            </div>
    </div>
</div>









  <br>
  <br>
  <br>  
  <br>
  <br>
  <br>  
  <br>
  <br>
  <br>  
  <br>
  <br>
  <br>  
  <br>
  <br>
  <br>  <br>
  <br>
  <br>  <br>
  <br>
  <br>
<div class="container">    
        <div id="questaobox10"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Questão 10</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                            
                            <div class="panel panel-info " >
                                <div class="panel-heading">
                                    <div class="panel-title">Selecione a dificuldade da questão</div>
                                </div> 
                            </div>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i></i>

                                
                                <label class="radio-inline">
                                    <input type="radio" name="nivelq10_id" value="1" id="nivelq10_id" checked="true"> Facil<br>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nivelq10_id" value="2" id="nivelq10_id"> Moderada<br>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nivelq10_id" value="3" id="nivelq10_id"> Dificil<br>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nivelq10_id" value="4" id="nivelq10_id"> Muito dificil<br>
                                </label>
                                <!-- <select class="form-control" id="nivel">
                                    <option value="1">Facil</option>
                                    <option value="2">Moderada</option>
                                    <option value="3">Dificil</option>
                                    <option value="4">Muito dificil</option>
                                </select> -->
                                </span>
                            </div>
                           
                            <div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i>Deseja alterar a quantidade de pontos?
                                            <input type="radio" name="opq10" value="1"> Sim
                                            <input type="radio" name="opq10" value="2" checked="true"> Não
                                        </i>
                                    </span>
                                    <div class="col-md-8">
                                        <input  class="form-control" type="text" name="q10_pontos" id="q10_pontos" style="text-align: right;" readonly="true" />
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>

                            <textarea  id="questao10_id" type="textarea" value="" rows="1" class="form-control" name="questao10_id[]"  style="display: none;"></textarea>
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span  data-toggle="tooltip" title="Questão da avaliação" class="input-group-addon"><i class="glyphicon glyphicon-book" ></i></span>
                                        <textarea id="questao-area10" type="textarea" value="" rows="10" class="form-control" name="questao" placeholder="Questão" required  ></textarea>

                                        
                                        
                                            <input id = "disciplina_id" name="disciplina_id" type="hidden"> 
                                            <input id = "buscar10" type="submit" name="buscar-questao" value="Buscar Questao" class="btn btn-primary btn-lg btn-block">
                                        
                                         


                            </div>
                          
                            <div id="a10">
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "a" id="alternativaA10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa A"></textarea>

                            </div>
                            </div>
                            <div id="b10">
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "b" id="alternativaB10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa B"></textarea>
                            </div>
                            </div>
                            <div id="c10">
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "c" id="alternativaC10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa C"></textarea>
                            </div>
                            </div>
                            <div id="d10">
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "d" id="alternativaD10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa D"></textarea>
                            </div>
                            </div>
                            <div id="e10">
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></i>                                               
                                        <textarea  name = "e" id="alternativaE10" type="textarea" value="" rows="2" class="form-control" name="questao" placeholder="Alternativa E"></textarea>
                            </div>
                            </div>
                       </div>                     
                    </div>  
    
        </div>

    </div>                 
                    </div>















  <!-- Angular Material requires Angular.js Libraries -->
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>

  <!-- Angular Material Library -->
  <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
  
  <!-- Your application bootstrap  -->
  <script type="text/javascript">    

    angular.module('BlankApp', ['ngMaterial']);
  </script>
  
</body>
</html>


