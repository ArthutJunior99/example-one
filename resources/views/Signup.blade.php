<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>signup</title>
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
    <div class="header">
        <h2>Signup</h2>
        <h2>Enter personal details</h2>
            </div>
            @if( session()->get('msg'))
            <div class="alert alert-succes alert-dismissable fade show" role="alert">
                {{ session()->get('msg')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        <form action='{{url('create-account')}}' method='post'> {{ csrf_field()}}
        <div class="input-group">
  		<label>Enter E-mail</label>
  		<input type="text" name="email" id="email" >
  	</div>
      <div class="input-group">
  		<label>Enter password</label>
  		<input type="password" name="pass" id="pass" >
  	</div>
      <div class="input-group">
  		<button type="submit" class="btn" name="login_user">signup</button>
  	</div>
            <label>
            <label>Already have an account?<a href="Login">login here</a></label><br>
            </label><br>
        </form>

        </form>

    </body>
    </html>
