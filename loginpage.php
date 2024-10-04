<?php
  session_start();
  if (isset($_SESSION["email"])){
      header("Location: grocery_list.php");
  }
  else
  {
    $validate = true;
    $reg_Email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
    $reg_Pswd = "/^(?=.*[^a-zA-Z])[a-zA-Z\S]{6,}$/";

    $email = "";
    $password = "";
    $error = "";

    if (isset($_POST["submitted"]) && $_POST["submitted"])
    {
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        
        $database = new mysqli("localhost", "prv474", "parv1311", "prv474");
        if ($database->connect_error)
        {
            die ("Connection failed: " . $database->connect_error);
        }

        $q = "SELECT * FROM users WHERE email = '$email' AND user_pass = '$password'";
        
        $r = $database->query($q);
        $row = $r->fetch_assoc();

        if($email != $row["email"] && $password != $row["password"])
        {
            $validate = false;
        }
        else
        {
            $emailMatch = preg_match($reg_Email, $email);
            if($email == null || $email == "" || $emailMatch == false)
            {
                $validate = false;
            }
            
            $pswdLen = strlen($password);
            $passwordMatch = preg_match($reg_Pswd, $password);
            if($password == null || $password == "" || $passwordMatch == false)
            {
                $validate = false;
            }
        }
        
        if($validate == true)
        {
            session_start();
            $_SESSION["email"] = $row["email"];
            header("Location: grocery_list.php");
            $database->close();
            exit();
        }
        else 
        {
            $error = "The email/password combination was incorrect. Login failed.";
            echo  $error;
        }
        $database->close();
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <title>
      Login page
  </title>
  <link rel="stylesheet" href="grocery_style.css"> 
  <script src="https://kit.fontawesome.com/ad7b08ba49.js" crossorigin="anonymous"></script>
  <script type = "text/javascript" src="validatelogin.js"></script>
  <style>
      input[type=text]{
  
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
  }

  input[type=password]{
  
  outline: none;
  font-size: 12px;
  background-color:#354152;
  color: white ;
  padding: 10px;
  border-radius: 10px;
  width: 150px;
  height:10px;
  border:black solid 1px;
  margin-top: 10px;
  }

  input[type=submit]
  {
  text-align:center;
    padding: 10px;
    width: 170px;
    height: 30px;
    color:white;
    background-color: #77d3ab;
    border-radius: 10px;
    border:1px black solid;
    outline: none;
    margin-bottom: 30px;
    font-size: 12px;

  }

  input[type=submit]:hover
  {
      background-color : rgb(56, 121, 129);
      
  }
  </style>

</head>

<body>
  <div class="container">
    <img class="headstyle" src="grocery.png" alt="grocery" width="130" height="60"/>
    <div class="text">
        EASYWAY GROCERY
    </div>

  </div>

<div class="box-style">
  <div class="heading">
    <p>
      <i class="fas fa-sign-in-alt"></i> Log In 
    </p>
    <form id ="Login" method="post" action="loginpage.php">
        <input type="hidden" name="submitted" value="1"/>

        <input type="text" name="email" size="30" placeholder="Email"><br>
        <label id="msg_email" class="err_msg"></label><br>
      
        <input type="password" name="password" size="20" placeholder="Password"><br>
        <label id="msg_pswd" class="err_msg"></label><br><br>

        <input type="submit" value="Login">
      
      </form>

   <script type="text/javascript" src="login-r.js"></script>
   
   <div>
     <p>Are you a New Customer?</p>
     <a href="http://www2.cs.uregina.ca/~prv474/Assignment_5/signup.php"><i class="fas fa-user"></i>Sign Up</a>
   </div>
</div>
</div>
</body>

</html>