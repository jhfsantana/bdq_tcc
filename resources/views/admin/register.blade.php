@extends('templates.admin.template')
    @section('scripts')
    <link type="text/css" rel="stylesheet" href="/css/global.css" />
    <link type="text/css" rel="stylesheet" href="/css/formularios.css" />
    <meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script>
    function GetRandom()
    {
        var data = new Date().getFullYear()
        var myElement = document.getElementById("matricula")
        myElement.value = "" + data + Math.floor((Math.random() * 100000) + 100)
    }

    

    </script>
    @stop
    @section('content')
    <H2 style="text-align: center;">Cadastro de Administrador</H2>
    @if(!empty($errors->all()))
    <div class="alert alert-danger" role="alert-danger" id="formRequest">
        @foreach($errors->all() as $error)
            <ul>
                <li> {{$error}}</li>
            </ul>
        @endforeach
    </div>
    @endif
        <div class="container">    
            <div id="cadastroadmbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title">Formulário para cadastro de administradores</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >          

                    <form action="/adm" method="post">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <label>
                            Matricula 
                            <button data-toggle="tooltip" title="Gerar Matricula" type="button" id="matriculabuscar" class="btn btn-primary" onclick="GetRandom()" style="margin-bottom: 8px;">
                                <i class="glyphicon glyphicon-refresh" aria-hidden="true" "></i>        
                            </button>
                            <input type="text" id="matricula" name="matricula" class="form-control" placeholder="Matricula">
                        </label>
                        
                        <label>
                            Nome
                            <input type="text" name="name" class="form-control" placeholder="Digite o nome">
                        </label>

                        <label>
                            Sobrenome
                            <input type="text" name="sobrenome" class="form-control" placeholder="Digite o Sobrenome">
                        </label>

                        <label>
                            E-mail
                            <input type="text" name="email" class="form-control" placeholder="Digite o email">
                        </label>

                        <label>
                            Password
                            <input type="password" name="password" class="form-control" placeholder="Digite a senha">
                        </label>
                        <input type="submit" name="salvar" id="salvar" value="Salvar" class="btn btn-success" style="margin-top: 10px">
                    </form>
                </div>
            </div>
        </div>
        </div>
    @stop