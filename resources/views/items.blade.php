<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: Tahoma, Verdana, sans-serif}
body{font: size 25px;}
th,td{font-family: Tahoma, Verdana, sans-serif;
    font: size 25px;
    padding: 8px;
  text-align: left;
}
tr:hover {background-color: #D6EEEE;}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}

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


table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}



</style>
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="home" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
    <a href="shoppingList" class="w3-bar-item w3-button w3-padding-large w3-white">Lists</a>
    <a href="profile" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">profile</a>


  </div>
</div>

<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:128px 16px">

  <h1 class="w3-margin w3-jumbo">Items</h1>
 <?php

    foreach($data as $key){
?>
  <input type="hidden" name="lid" value="{{$key->shopping_list_id}}">
 <?php }
 ?>
    <input type="hidden" name="sid" />
      <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top"><a href="/create_items/{{$key->shopping_list_id}}">Create new item</a></button>

</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
</div>
</div>
</div>
<div class="container">
<div class="card">
    <div class="card-body">
            <table style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID.</th>
                        <th>name</th>
                        <th>Quantity Description</th>
                        <th>checked</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $s1=1;

                foreach($data as $key){

                ?>


                    <tr>

                        <td>{{$s1++}}</td>
                        <td>{{$key->id}}</td>
                        <td>{{$key->name}}</td>
                        <td>{{$key->QuantityDescription}}</td>
                        <td><input type="checkbox"  name="checked[]" value="{{$key->checked}}" ></td>
                        <td text-align:right>
                    <button class="w3-button w3-green w3-padding-large w3-large w3-margin-top"><a href="/edit_item/{{$key->id}}">EDIT</a></button>
                    <button class="w3-button w3-red w3-padding-large w3-large w3-margin-top"><a href="/itemdelete/{{$key->id}}">DELETE</button></td>
                    </tr><?php }?>


                </tbody>
            </table>

    </div>
</div>



</body>
</html>

