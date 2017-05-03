//        if($_POST["submit"]=="Post")
        {
            $comm=$_POST["comments"];

            mysql_connect("localhost","root","");
            mysql_select_db("test");

           $s="insert into comments (comment) values ('".$comm."')";

           if(mysql_query($s)){

            echo "Record Saved !!";

           }else
           echo mysql_error();

        }

?>
<?php
        mysqli_connect("localhost","root","","test");

        $query="SELECT * FROM comments";

        $records=mysql_db_query("test", $query);


?>

<?php
    while($com=mysql_fetch_assoc($records)){
 echo "Your Comment is"$com["comment"];
}

?> -->




<!--Writing files to a new text file with this code
    <?php
       // $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        //$txt = $_POST["name"];
       // fwrite($myfile, $txt . "<hr/>" );
        //fclose($myfile);
    ?> 
-->
<!--<div>
<?php
//echo $_POST["name"];
?>
</div> -->
<!--This code displays the session after login--> 
<!--    <?php
   //     session_start();
        //when user is logged in with session
     //   if (isset($_SESSION['username'])) {
      // echo $_SESSION['username']  . " Session <a href='logout.php'>logout</a>";
       // }else if(isset($_COOKIE['username'])){ //when user is logged with cookies
       // echo $_COOKIE['username']  . " cookie <a href='logout.php'>logout</a>";
       // }else{ //when user is not loggedin
       // header("Location: login.php");
       // exit();
    }
    ?>  -->


    .creditcard {
    margin : auto;
    width: 50%;
    height: 50%;
    padding: 10px;
    background-color: white;
    text-align: center;
        
}
.searchbox {
    margin:auto;
    width: 30%;
    height: 50%;
    padding: 10px;
    background-color: white;
    text-align: center;
        
}
