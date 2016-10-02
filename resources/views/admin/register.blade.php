<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">	
	<title>Registro de Adm</title>
</head>
<body>
   <div class="container">    
        <div id="registerbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Cadastro de Administrador</div>
                    </div>     

                    <<!-- div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form class="form-horizontal" role="form" method="post" action=""> -->
							





                            {!!Form::open(array('url' => 'adm', 'method' => 'post'))!!}

                                {!!Form::label('name','Nome:')!!}

                                {{ Form::text('name', '', array('class'=>'form-control', 'placeholder'=>'Nome')) }}

                                {!!Form::label('email','Email:')!!}

                                {{ Form::text('email', '', array('class'=>'form-control', 'placeholder'=>'Email')) }}

                                {!!Form::label('password','Password:')!!}

                                {{ Form::password('password', '', array('class'=>'form-control', 'placeholder'=>'Password')) }}


                                {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
                            
                            {!!Form::close()!!}




							<!-- <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="register-username" type="text" class="form-control" name="name" placeholder="Nome">                                        
                                    </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input id="register-email" type="text" class="form-control" name="email" placeholder="E-mail">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="register-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>

                                <div style="margin-top:10px" class="form-group">
                                                                    
                                    <div class="col-sm-12 controls">
                                    	<input type="submit"   class="btn btn-success">
                                    </div> -->
                                </div>
                            </form> 
                        </div>                     
                    </div>  
        </div>
    </div>	
    
</body>
</html>