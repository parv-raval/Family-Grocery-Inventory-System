<?php

    $validate = true;
    $session_email="";

    session_start();
    if (!isset($_SESSION["email"]))
    {
        header("Location: loginpage.php");
    }
     
    else 
    {
                    
        $db = new mysqli("localhost", "prv474", "parv1311", "prv474");
        if ($db->connect_error)
        {
            die ("Connection failed: " . $db->connect_error);
        }
        $session_email = $_SESSION["email"];

        $qu1 = "SELECT user_name, family_id FROM users WHERE email = '$session_email'";
        $r1= $db->query($qu1);
        $row = $r1->fetch_assoc();
        $onlineUsername = $row["user_name"];
        $onlineFid = $row["family_id"];

        $qu2 = "SELECT family_name FROM families WHERE family_id = '$onlineFid'";
        $r2 = $db->query($qu2);
        $row = $r2->fetch_assoc();
        $onlineFamilyName = $row["family_name"];

        $title = "";
        $description = "";
        $quantity = "";
    
        if (isset($_POST["submitted"]) && $_POST["submitted"])
        {
            $title = trim($_POST["posttitle"]);
            $description = trim($_POST["postdescr"]);
            $quantity = trim($_POST["postquantity"]);
                
            $userquery = "SELECT uid FROM users WHERE email = '$session_email'";
            $result = $db->query($userquery);
            $array = $result->fetch_array();
            $userid = $array[0];

            $q1 = "SELECT * FROM posts WHERE post_title='$title'";
            $r1 = $db->query($q1);

            if($r1->num_rows > 0)
            {
                $validate = false;
            }
            else
            {
                if($title == null || $title == "")
                {
                    $validate = false;
                }

                if($description == null || $description == "")
                {
                    $validate = false;
                }
                        
                if($quantity == null || $quantity == "")
                {
                    $validate = false;
                }
            }

            if ($validate == true)
            {   
                echo "is valid";
                $currdate = date("Y-m-d");
                $validque = "INSERT INTO posts (uid, post_title, post_descr, post_quantity, post_date) VALUES ('$userid','$title','$description','$quantity','$currdate')";
                $resultingquery =  $db->query($validque); 

                if ($resultingquery === true)
                {
                    header("Location: grocery_list.php");
                    $db->close();
                    exit();
                }
                else {
                    echo "issue with query";
                }
            }
            else
            {
                    echo "Cannot get the data correctly!";
            }
            $db->close();
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Post grocery
    </title>

    <link rel="stylesheet" href="grocery_style.css"> 
    <script src="https://kit.fontawesome.com/ad7b08ba49.js" crossorigin="anonymous"></script>
    <script type = "text/javascript" src="validatepost.js"></script>
    <style>

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
    }
    input[type=number] {
    
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

    textarea{
    
    outline: none;
    font-size: 12px;
    background-color: #354152;
    color: white ;
    border:black solid 1px;
    margin-top: 20px;
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
    margin-top: 10px;
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
        <div style="background-color: #77d3ab;">
            <h1>EASYWAY GROCERY
             <a style="float: right; margin-right: 40px;"  href="http://www2.cs.uregina.ca/~prv474/Assignment_5/family.php">Family</a>
             <a  style="float: right; margin-right: 20px;" href="http://www2.cs.uregina.ca/~prv474/Assignment_5/grocery_list.php">List</a>
             <a style="float: right; margin-right: 60px;" href="http://www2.cs.uregina.ca/~prv474/Assignment_5/loginpage.php">Logout</a> 
            </h1>
         </div>

         <div class="family-boxstyle">
            <h4 class="h-styling">Username: <?=$onlineUsername?></h4>
            <h4 class="h-styling">FamilyName: <?=$onlineFamilyName?></h4>
        </div>

       <div class="box-postgrocery">
        <div class="heading">
            <p>
                <i class="fas fa-shopping-cart"></i> Post Grocery 
            </p>           
        </div>

    <form id="Post" method = "post" action="post_grocery.php">

        <input type="hidden" name="submitted" value="1"/>

        <input type="text"  size="30" name="posttitle" placeholder="Title"><br>
        <label id="msg_title" class="err_msg"></label><br>

        <textarea  placeholder="Description"  name="postdescr" cols="25" rows="10"></textarea><br>
        <label id="msg_des" class="err_msg"></label><br>

        <input type="number" min="0" max="1000" size="40" name="postquantity" placeholder="Quantity"><br>
        <!-- <label id="msg_title" class="err_msg"></label><br> -->
       
        <input type="submit" value="Post">

    </form>
    <script type="text/javascript" src="post-r.js"></script>

    </div>
</div>
</body>


</html>