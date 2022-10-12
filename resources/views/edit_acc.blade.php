<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<style>
            .card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 90%;
  margin-left: auto;
  margin-right: auto;
  padding: 50px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
</style>
</head>
<body>
<header class="w3-container w3-red w3-center" style="padding:2px 4px">
  <h1 class="w3-margin w3-jumbo">Edit Profile</h1>
</header>

<div class="card">

  <div class="container">

  <h1><b>{{Auth::user()->id}}:{{Auth::user()->name}} <br>
  Email: {{Auth::user()->email}}</b></h1><br>

  <form action='{{url('updateAccount')}}' method='post'> {{ csrf_field()}}

        <div class="input-group">
        <input type="hidden" name="uid" value="{{Auth::user()->id}}">
        <label>Enter name</label><br>
        <input type="text" name="n_name" ><br>
  		<label>Enter E-mail</label><br>
  		<input type="text" name="n_email"><br>
        <label>Enter password</label>><br>
  		<input type="password" name="n_pass">><br>
          <input class="w3-button w3-blue w3-padding-large w3-large w3-margin-top" type="submit"><br>
  	</div>

</div>

</body>
</html>
