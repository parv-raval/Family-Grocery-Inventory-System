<?php
  session_start();
  if (!isset($_SESSION["email"])){
      header("Location: loginpage.php");
  }
  else
  {
    $database = new mysqli("localhost", "prv474", "parv1311", "prv474");
    if ($database->connect_error)
    {
      die ("Connection failed: " . $database->connect_error);
    }

    $session_email = $_SESSION["email"];

    $qu1 = "SELECT user_name, family_id FROM users WHERE email = '$session_email'";
    $r1= $database->query($qu1);
    $row = $r1->fetch_assoc();
    $onlineUsername = $row["user_name"];
    $onlineFid = $row["family_id"];

    $qu2 = "SELECT family_name FROM families WHERE family_id = '$onlineFid'";
    $r2 = $database->query($qu2);
    $row = $r2->fetch_assoc();
    $onlineFamilyName = $row["family_name"];
    
    $q = "SELECT posts.post_title, posts.post_descr, posts.post_quantity, users.avatar, users.user_name, posts.post_id, posts.post_date 
    FROM posts INNER JOIN users ON posts.uid = users.uid ORDER BY post_quantity ASC, post_date DESC";
    $r = $database->query($q);
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>
    Grocery List
  </title>
  <link rel="stylesheet" href="grocery_style.css">
  <script src="https://kit.fontawesome.com/ad7b08ba49.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="validategrocery_list.js"></script>
  <style>
    .list_container {
      display: block;
      padding: 2px 16px;
    }

    button {
      text-align: center;
      padding: 5px;
      width: 100px;
      height: 30px;
      color: white;
      background-color: #77d3ab;
      border-radius: 10px;
      border: 1px black solid;
      outline: none;
      margin-bottom: 30px;
      font-size: 12px;
    }
    input[type=text] {
    
    outline: none;
    font-size: 12px;
    background-color: #354152;
    color: white ;
    padding: 10px;
    border-radius: 10px;
    width: 150px;
    height:10px;
    border:black solid 1px;
    margin-top: 20px;
    pointer-events: none;
}

    button:hover {
      background-color: rgb(56, 121, 129);
    }
</style>
</head>

<body>
  <div class="container">

    <div style="background-color: #77d3ab;">
      <h1>EASYWAY GROCERY
        <a style="float: right; margin-right: 40px;" href="http://www2.cs.uregina.ca/~prv474/Assignment_5/post_grocery.php">Post</a>
        <a style="float: right; margin-right: 20px;" href="http://www2.cs.uregina.ca/~prv474/Assignment_5/family.php">Family</a>
        <a style="float: right; margin-right: 60px;" href="http://www2.cs.uregina.ca/~prv474/Assignment_5/Logout.php">Logout</a>
      </h1>
    </div>

    <div class="family-boxstyle">
            <h4 class="h-styling">Username: <?=$onlineUsername?></h4>
            <h4 class="h-styling">FamilyName: <?=$onlineFamilyName?></h4>
    </div>

    <?while($row = $r->fetch_assoc()){?>  

      <div class="list_boxstyle">
        <div class="heading">
          <p><?=$row["post_title"]?></p>
          <p><?=$row["post_descr"]?><br><input id="counter1" type="text" value="<?=$row["post_quantity"]?>" disabled="disabled"/></p>
          <p><img src="<?=$row["avatar"]?>" alt="User" style="width:10%"><br><?=$row["user_name"]?> published on: <?=$row["post_date"]?></p>
          <p><button>Buy</button> <button>Consume</button> <button>Delete</button></p>
        </div>
      </div>
    <?}
    $database->close();?>

  </div>
  <script type ="text/javascript" src="grocerylist-r.js"></script>
</body>

</html>