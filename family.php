<?php
    session_start();
    if (!isset($_SESSION["email"]))
    {
        header("Location: loginpage.php");
    }
    else
    {                
        $database = new mysqli("localhost", "prv474", "parv1311", "prv474");
        if ($database->connect_error){
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

        if(isset($_POST["submittedform1"]) && $_POST["submittedform1"])
        {
            $familyname = trim($_POST["createdfamily"]);

            $q = "INSERT INTO families (family_name) VALUES ('$familyname')";
            $result = $database->query($q); 
        }
        else if(isset($_POST["submittedform2"]) && $_POST["submittedform2"])
        {
            $family_result = $_POST["fam_list"];
            
            $query1 = "SELECT family_id FROM families WHERE family_name = '$family_result'";
            $result1 = $database->query($query1);
            $r1 = $result1->fetch_array();
            $fid = $r1[0];

            $email = $_SESSION["email"];
            $query2 = "SELECT uid FROM users WHERE email = '$email'";
            $result2 = $database->query($query2);
            $r2 = $result2->fetch_array();
            $uid = $r2[0];
                
            $query3 = "UPDATE users SET family_id = '$fid' WHERE uid = '$uid'";
            $result3 = $database->query($query3);


        }
    }
?>

<!DOCTYPE html>
<html>
  
  <head>
          <title>
              Family 
          </title>

        <link rel="stylesheet" href="grocery_style.css"> 
        <script src="https://kit.fontawesome.com/ad7b08ba49.js" crossorigin="anonymous"></script>
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
            margin-bottom: 20px;
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
        <div style="background-color: #77d3ab;">
          <h1>EASYWAY GROCERY
           <a style="float: right; margin-right: 40px;"  href="http://www2.cs.uregina.ca/~prv474/Assignment_5/post_grocery.php">Post</a>
           <a  style="float: right; margin-right: 20px;" href="http://www2.cs.uregina.ca/~prv474/Assignment_5/grocery_list.php">List</a>
           <a style="float: right; margin-right: 60px;" href="http://www2.cs.uregina.ca/~prv474/Assignment_5/loginpage.php">Logout</a>
           </h1>
        </div>

        <div class="family-boxstyle">
            <h4 class="h-styling">Username: <?=$onlineUsername?></h4>
            <h4 class="h-styling">FamilyName: <?=$onlineFamilyName?></h4>
        </div>
     
        <div class="box-stylegrocery">
            <div class="heading">
                <p><i class="fas fa-user-friends"></i> Create Family </p>
                <!-- create form -->
                <form method="post" action="family.php">
                    <input type="hidden" name="submittedform1" value="1"/>
                    <input type="text"  size="30" name="createdfamily"  placeholder="Family name"><br>
                    <input type="submit" value="Create">
                </form>
            </div>
        </div>

        <div class="box-stylegroceryf">
            <div class="heading">
                <p><i class="fas fa-users"></i> Join Family </p><br>
            <!-- join form -->
            <form method="post" action="family.php">
                <input type="hidden" name="submittedform2" value="1"/>
                <!-- <label for="family">Choose a Family:</label> -->
                <?php
                    $x = "SELECT family_name FROM families ORDER BY family_name";
                    $y = $database->query($x);
                    echo "<select name='fam_list'>";
                    while ($r = $y->fetch_array()) {
                        echo "<option value='".$r['family_name']."'>".$r['family_name']."</option>";
                    }
                    echo "</select>";

                    $database->close();
                ?>
                <br><br>
                <input type="submit" value="Join">
            </form>
            </div>
        </div>
    </div>
    </body>
</html>