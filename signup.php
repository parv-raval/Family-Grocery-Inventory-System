<?php
$validate = true;
$error = "";
$reg_Email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
$reg_Pswd = "/^(?=.*[^a-zA-Z])[a-zA-Z\S]{6,}$/";
$reg_Bday = "/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/";          
$uname = "";
$email = "";
$date = "";
$password = "";
$mypath = "";

if (isset($_POST["submitted"]) && $_POST["submitted"])
{
    $uname = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $date = trim($_POST["date"]);
    $password = trim($_POST["password"]);

    $db = new mysqli("localhost", "prv474", "parv1311", "prv474");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }
    
    $q1 = "SELECT * FROM users WHERE email = '$email'";
    $r1 = $db->query($q1);

    // if the email address is already taken.
    if($r1->num_rows > 0)
    {
        $validate = false;
    }
    else
    {
        if($uname == null || $uname == "")
        {
            $validate = false;
        }

        $emailMatch = preg_match($reg_Email, $email);
        if($email == null || $email == "" || $emailMatch == false)
        {
            $validate = false;
        }
                 
        $pswdLen = strlen($password);
        $pswdMatch = preg_match($reg_Pswd, $password);
        if($password == null || $password == "" || $pswdMatch == false)
        {
            $validate = false;
        }

        $bdayMatch = preg_match($reg_Bday, $date); 
        if($date == null || $date == "" || $bdayMatch == false)
        {
            $validate = false;
        }

        if(isset($_FILES["myfile"]))
        {
            $mypath = "uploads/". $_FILES["myfile"]["name"];

            $myquery = "SELECT * FROM users WHERE avatar = '$mypath'";
            $myresult = $db->query($myquery);

            if($myresult->num_rows > 0)
            {
                echo "Not Success";
                $validate = false;
            }
            else {
                move_uploaded_file($_FILES["myfile"]["tmp_name"], $mypath);
            }
        }
    }

    if($validate == true)
    {
        $dateFormat = date("Y-m-d", strtotime($date));
       
        $q2 = "INSERT INTO users (family_id, email, birth_date, user_pass, user_name, avatar) VALUES (1, '$email', '$dateFormat', '$password', '$uname', '$mypath')";  
        $r2 = $db->query($q2);
        
        if ($r2 === true)
        {
            header("Location: loginpage.php");
            $db->close();
            exit();
        }
    }
    else
    {
        $error = "email address is not available. Signup failed.";
        echo "<p style='color:white;'>$error</p>";
    }
    $db->close();
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>
        SignUp page
    </title>
        
    <link rel="stylesheet" href="grocery_style.css"> 
    <script src="https://kit.fontawesome.com/ad7b08ba49.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="validatesignup.js"> </script>
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

        input[type=date]{
        
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

        input[type=file]{
        
        text-align: center;
        margin-bottom: 20px;
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
        margin-bottom: 40px;
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
  
  <div class="boxstyle1">

    <div class="heading">
      <p>
        <i class="fas fa-user"></i> Sign Up page
      </p>
   
        <form id="SignUp" method="post" action="signup.php" enctype="multipart/form-data">
   
            <input type="hidden" name="submitted" value="1"/>
         <!-- add regex in javascript -->
            <input type="text" name="username" size="30" placeholder="Username"><br>
            <label id="msg_username" class="err_msg"></label><br>

            <input type="text" name="email" size="30" placeholder="Email address"><br>
            <label id="msg_email" class="err_msg"></label><br>

            <input type="date"  name="date" size="20"><br>
            <label id="msg_date" class="err_msg"></label><br>

            <input type="password" name="password" size="20" placeholder="Password"><br>
            <label id="msg_pswd" class="err_msg"></label><br>

            <input type="password"  size="20" placeholder="Confirm Password"><br> 
            <label id="msg_pswdr" class="err_msg"></label><br><br>

            <input type="file"  name="myfile" size="20"><br>
            <label id="msg_file" class="err_msg"></label><br><br>
            
            <input type="submit" value="Sign in">
            
        </form>
    <script type="text/javascript" src="signup-r.js"></script>
    <p>Already a Customer?</p>
    <a href="http://www2.cs.uregina.ca/~prv474/Assignment_5/loginpage.php"><i class="fas fa-sign-in-alt"></i>Login</a>
   </div>
  </div>
</body>

</html>