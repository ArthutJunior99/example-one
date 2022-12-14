<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <head>
        <title>CreateList</title>
 <style>
            .card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
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
  <h1 class="w3-margin w3-jumbo">Update List</h1>
</header>
    <div class="card">
        <div class="container">
     <form action='{{url('updateShopList')}}' method='post'> {{ csrf_field()}}
        <?php foreach($e_data as $key){
        ?>
            <input type="hidden" name="uid" value="{{$key->id}}">
            <input type="hidden" name="uaccount_id" value="{{$key->user_id}}">
            <label for="name">Name</label><br>
            <input type="text" name="uname" value="{{$key->title}}"><br>
            <label for="desc">Description</label><br>
            <input type="text" name="udesc"  value="{{$key->description}}"><br>
            <?php } ?>
            <input class="w3-button w3-blue w3-padding-large w3-large w3-margin-top" type="submit"><br>
        </form>

    </div>
</div>
