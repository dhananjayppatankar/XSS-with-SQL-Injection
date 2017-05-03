<!DOCTYPE html>
<meta charset='UTF-8'>
<head>

<style>
<?php include "style.css"; ?>
</style>
</head>
<body bgcolor="lightgrey">  


<!--displays credit card details--> 
<div align="center">
<img src="creditcard.jpg" alt="CreditCard" style="width:304px;height:228px;" />
<p> Name : Mr.B.Parker </p>
<p> Credit Card : xxx-xxx-1234-3333-3333 </p>
<p > Expiary Date : 01-20-2020 </p>
<p> CVV : 333 </p>
<p> Credit Type : Visa </p>
</div>

<!--Textbox for Comments here I try writing the script code like <script>alert("XSS")</script> .. But alert does not pop up on screen--> 
<div align="center">
<form action= "index.php" method = "get">
<!--<h3> Please add comments to suggest any changes to the account </h3> -->
<input type="text" name ="search" row="50" cols="1000" placeholder="Type Keyword" /> <br>
<br>
<input type ="submit"  value="Search" />
</form>
</div>
<p align="center">
<?php
if(isset($_GET["search"]))
{
    echo "The results of your search for: ".$_GET["search"];
    echo "<br /><br /> <i>Sorry No Results Found! </i>";
}
?>
</p>
<h1><a href="index1.php">Click here to goto Comment Page !!! </a>   </h1> 



</body>
</html>
 <?php
     session_start();
     //when user is logged in with session
     if (isset($_SESSION['username'])) {
  // echo $_SESSION['username']  . " Session <a href='logout.php'>logout</a>";
       }else if(isset($_COOKIE['username'])){ //when user is logged with cookies
     // echo $_COOKIE['username']  . " cookie <a href='logout.php'>logout</a>";
      }else{ //when user is not loggedin
  header("Location: login.php");
        exit();
    }
    ?> 