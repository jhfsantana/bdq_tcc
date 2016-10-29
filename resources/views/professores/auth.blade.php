<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">	
	<title>Login</title>
</head>
<body>

    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2"> 
            @if (count($errors) > 0)
                <div class="alert alert-warning" role="alert-danger" id="formRequest">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif                      
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Área do Professor</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="post" action="">
							
							<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
                            
                           <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-email" type="text" class="form-control" name="email" placeholder="email">
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>

                                <div style="margin-top:10px" class="form-group">
                                                                    
                                    <div class="col-sm-12 controls">
                                    	<input type="submit" value="Login"  class="btn btn-success">
                                    </div>
                                </div>
                            </form> 
                        </div>                     
                    </div>  
        </div>
    </div>	
    

</body>
</html>

