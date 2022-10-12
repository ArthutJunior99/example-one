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

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="home" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
    <a href="shoppingList" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Lists</a>
    <a href="profile" class="w3-bar-item w3-button w3-padding-large w3-white">profile</a>
  </div>
</div>
<header class="w3-container w3-red w3-center" style="padding:25px 10px">
  <h1 class="w3-margin w3-jumbo">Profile</h1>
</header>

<div class="card">

  <div class="container">
  <h1><b>{{Auth::user()->id}}: {{Auth::user()->email}}</b></h1><br>
  <button class="w3-button w3-green w3-padding-large w3-large w3-margin-top"><a href="edit_acc/{{$id}}">EDIT</a></button>
  <button class="w3-button w3-red w3-padding-large w3-large w3-margin-top"><a href="delete/{{$id}}">DELETE</button>
  </div>
</div>
<button class="w3-button w3-black w3-padding-large w3-large w3-margin-top"><a href="signout">Logout

</a></button>

</body>
</html>
