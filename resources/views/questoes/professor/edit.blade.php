@extends('templates.professor.template')
    @section('head')
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/formularios.css">
	<title>Formulario de Questões</title>

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Lato');

body, html{
  height: 100%;
  background: #222222;
    font-family: 'Lato', sans-serif;
}

.container{
  display: block;
  position: relative;
  margin: 40px auto;
  height: auto;
  width: 500px;
  padding: 10px;
}

h2 {
    color: #AAAAAA;
}

.container ul{
  list-style: none;
  display: inline;
  margin: 0;
  padding: 0;
    overflow: auto;
}

ul li{
  color: #AAAAAA;
  display: inline;
  position: relative;
  float: left;
  width: 100%;
  height: 45px;
}

ul li input[type=radio]{
  position: absolute;
  visibility: hidden;
}

ul li label{
  display: block;
  position: relative;
  font-weight: 300;
  font-size: 1.35em;
  padding: 12px 12px 12px 80px;
  margin: 5px auto;
  height: 10px;
  z-index: 9;
  cursor: pointer;
  -webkit-transition: all 0.25s linear;
}

ul li:hover label{
    color: #FFFFFF;
}

ul li .check{
  display: block;
  position: absolute;
  border: 5px solid #AAAAAA;
  border-radius: 100%;
  height: 25px;
  width: 25px;
  top: 30px;
  left: 20px;
    z-index: 5;
    transition: border .25s linear;
    -webkit-transition: border .25s linear;
}

ul li:hover .check {
  border: 5px solid #FFFFFF;
}

ul li .check::before {
  display: block;
  position: absolute;
    content: '';
  border-radius: 100%;
  height: 15px;
  width: 15px;
  top: 5px;
    left: 5px;
  margin: auto;
    transition: background 0.25s linear;
    -webkit-transition: background 0.25s linear;
}

input[type=radio]:checked ~ .check {
  border: 5px solid #2c3e50;
}

input[type=radio]:checked ~ .check::before{
  background: #2c3e50;
}

input[type=radio]:checked ~ label{
  color: #2c3e50;
}

.signature {
    margin: 10px auto;
    padding: 10px 0;
    width: 100%;
}

.signature p{
    text-align: center;
    font-family: Helvetica, Arial, Sans-Serif;
    font-size: 0.85em;
    color: #AAAAAA;
}

.signature .much-heart{
    display: inline-block;
    position: relative;
    margin: 0 4px;
    height: 10px;
    width: 10px;
    background: #AC1D3F;
    border-radius: 4px;
    -ms-transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
}

.signature .much-heart::before, 
.signature .much-heart::after {
      display: block;
  content: '';
  position: absolute;
  margin: auto;
  height: 10px;
  width: 10px;
  border-radius: 5px;
  background: #AC1D3F;
  top: -4px;
}

.signature .much-heart::after {
    bottom: 0;
    top: auto;
    left: -4px;
}

.signature a {
    color: #AAAAAA;
    text-decoration: none;
    font-weight: bold;
}


/* Styles for alert... 
by the way it is so weird when you look at your code a couple of years after you wrote it XD */

.alert {
    box-sizing: border-box;
    background-color: #0DFF92;
    width: 100%;
    position: relative; 
    top: 0;
    left: 0;
    z-index: 300;
    padding: 20px 40px;
    color: #333;
}

.alert h2 {
    font-size: 22px;
    color: #232323;
    margin-top: 0;
}

.alert p {
    line-height: 1.6em;
    font-size:18px;
}

.alert a {
    color: #232323;
    font-weight: bold;
}
    </style>
    @stop
    @section('titulo')
            <i class="fa fa-book" title="Edit"></i>
            ALTERAR QUESTÃO
    @stop
    @section('content')
	<div class="container" style="width: 100%">



                @if(!empty($errors->all()))
                    @foreach($errors->all() as $error)
                        <ul>
                            <li style="color: red"> {{$error}}</li>
                        </ul>
                    @endforeach
                @endif              
                <fieldset>
                    <legend>
                        Formulário de Alteração
                    </legend>
                    <div class="col-md-12">
                        <div class="row">
                            <form id="questaoform" class="form-horizontal" role="form" method="post" action="/professor/questao/alterada">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input name="trace" type="hidden" value="web">
                                <input name="id" type="hidden" value="{{$questao->id}}">
                                <div class="col-md-6">
                                    <div class="panel panel-info " >
                                        <div class="panel-heading">
                                            <div class="panel-title"><strong style="word-spacing: 5px;">Selecione uma Disciplina</strong></div>
                                        </div> 
                                    </div>
                                    <div style="margin-bottom: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                                        <select class="form-control" name="disciplina_id">
                                          <option value="{{$questao->disciplina->id}}">{{$questao->disciplina->nome}}</option>
                                        </select>   
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-primary " >
                                        <div class="panel-heading">
                                            <div class="panel-title"><strong style="word-spacing: 5px;">Escolha um nível de dificuldade.</strong></div>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <ul>
                                          <li>
                                            <input type="radio" id="f-option" name="nivel" value="1" {{$questao->nivel=='1' ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="f-option">Facil</label>
                                            
                                            <div class="check"></div>
                                          </li>
                                          
                                          <li>
                                            <input type="radio" id="s-option" name="nivel" value="2"  {{$questao->nivel=='2' ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="s-option">Moderada</label>
                                            
                                            <div class="check"><div class="inside"></div></div>
                                          </li>
                                          
                                          <li>
                                            <input type="radio" id="t-option" name="nivel" value="3" {{$questao->nivel=='3' ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="t-option">Dificil</label>
                                            
                                            <div class="check"><div class="inside"></div></div>
                                          </li>

                                          <li>
                                            <input type="radio" id="z-option" name="nivel" value="4" {{$questao->nivel=='4' ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="z-option">Muito dificil</label>
                                            
                                            <div class="check"><div class="inside"></div></div>
                                          </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div style="margin: 0; padding: 0;" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                        <textarea required id="questao-area" type="textarea" rows="10" class="form-control" name="questao" placeholder="Questão" >{{$questao->questao}}</textarea>
                                    </div>
                                </div>
                                </br></br>
                                <div class="col-md-6">
                                    <div class="panel panel-warning "  style="margin-top: 25px;">
                                        <div class="panel-heading">
                                            <div class="panel-title"><strong style="word-spacing: 5px;">Digite as alternativas da questão.</strong></div>
                                        </div> 
                                    </div>
                                    <div class="input-group" style="margin-top: 25px;">
                                        <span class="input-group-addon" id="basic-addon1">A</span>
                                            <input required id="questao-alternativa-a" type="text" class="form-control" name="alternativaA" placeholder="Alternativa A" value="{{$questao->alternativaA}}">
                                    </div>

                                    <div class="input-group" style="margin-top: 25px;">
                                        <span class="input-group-addon" id="basic-addon1">B</span>  
                                            <input required id="questao-alternativa-b" type="text" class="form-control" name="alternativaB" placeholder="Alternativa B" value="{{$questao->alternativaB}}">
                                    </div>

                                    <div class="input-group" style="margin-top: 25px;">
                                        <span class="input-group-addon" id="basic-addon1">C</span>
                                            <input required id="questao-alternativa-c" type="text" class="form-control" name="alternativaC" placeholder="Alternativa C" value="{{$questao->alternativaC}}">
                                    </div>

                                    <div class="input-group" style="margin-top: 25px;">
                                        <span class="input-group-addon" id="basic-addon1">D</span>                                              
                                            <input required id="questao-alternativa-d" type="text" class="form-control" name="alternativaD" placeholder="Alternativa D" value="{{$questao->alternativaD}}">
                                    </div>

                                    <div class="input-group" style="margin-top: 25px;">
                                        <span class="input-group-addon" id="basic-addon1">E</span>                                              
                                            <input required id="questao-alternativa-e" type="text" class="form-control" name="alternativaE" placeholder="Alternativa E" value="{{$questao->alternativaE}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-primary" >
                                    <div class="panel-heading">
                                        <div class="panel-title" style="text-align: center;">Selecione a alternativa correta</div>
                                    </div>
                                    <div class="panel-body">
                                         <div style="margin-bottom: 15px; border-style: ridge; border-radius: 8px; border-color: #ecf0f1; opacity: 4px; text-align: center; vertical-align: middle;" class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-alert"></i></span>
                                            <input type="radio" name="correta" value="a" {{$questao->correta=='a' ? 'checked='.'"'.'checked'.'"' : '' }}> A
                                            <input type="radio" name="correta" value="b" {{$questao->correta=='b' ? 'checked='.'"'.'checked'.'"' : '' }}> B
                                            <input type="radio" name="correta" value="c" {{$questao->correta=='c' ? 'checked='.'"'.'checked'.'"' : '' }} > C
                                            <input type="radio" name="correta" value="d" {{$questao->correta=='d' ? 'checked='.'"'.'checked'.'"' : '' }}> D
                                            <input type="radio" name="correta" value="e" {{$questao->correta=='e' ? 'checked='.'"'.'checked'.'"' : '' }}> E
                                        </div>                                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="margin-top:50px" class="form-group">                             
                                    <div class="col-md-12">
                                        <input type="submit" value="Salvar"  class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </fieldset>
    @stop