<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <title>Login</title>

        <link rel="stylesheet" type="text/css" href="/resources/css/app.css"></link>
        <style>
                * {
            margin: 0px;
            padding: 0px;
            }
            body {
                font-size: 120%;
                background: #F8F8FF;
            }

            .header {
                width: 30%;
                margin: 50px auto 0px;
                color: white;
                background: maroon;
                text-align: center;
                border: 1px solid #B0C4DE;
                border-bottom: none;
                border-radius: 10px 10px 0px 0px;
                padding: 20px;
            }
            form, .content {
                width: 30%;
                margin: 0px auto;
                padding: 20px;
                border: 1px solid #B0C4DE;
                background: white;
                border-radius: 0px 0px 10px 10px;
            }
            .input-group {
                margin: 10px 0px 10px 0px;
            }
            .input-group label {
                display: block;
                text-align: left;
                margin: 3px;
            }
            .input-group input {
                height: 30px;
                width: 93%;
                padding: 5px 10px;
                font-size: 16px;
                border-radius: 5px;
                border: 1px solid gray;
            }
            .btn {
                padding: 10px;
                font-size: 15px;
                color: white;
                background: maroon;
                border: none;
                border-radius: 5px;
            }
            .error {
                width: 92%;
                margin: 0px auto;
                padding: 10px;
                border: 1px solid #a94442;
                color: #a94442;
                background: #f2dede;
                border-radius: 5px;
                text-align: left;
            }
            .success {
                color: #3c763d;
                background: #dff0d8;
                border: 1px solid #3c763d;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
       <!-- @if( session()->get('msg'))
            <div class="alert alert-succes alert-dismissable fade show" role="alert">
                {{ session()->get('msg')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif-->

     <div class="header">
        <h1>Shopping List Login</h1>
    </div>
    <!--
        <form action='checkAcc' method='post'>
        <div class="input-group">
  		<label>Enter email</label>
  		<input type="text" name="in_email" >
  	</div>
      <div class="input-group">
  		<label>Enter Passsword</label>
  		<input type="password" name="in_pass" >
  	</div>
      <div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
            <label>
                Don't have an account? <a href="signup">Signup</a>
            </label><br>
        </form>-->
        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                            <br>
                                    <label>
                                        Don't have an account? <a href="/">Signup</a>
                                    </label><br>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Signin</button>
                            </div>
                        </form>

    </body>
    </html>
