<html>
<head>
<title>Login</title>
<style>
<?php include 'style.css'; ?>
</style>
</head>

<body bgcolor="lightblue"> 
    <?php
        //connect to db
        $con = mysqli_connect("localhost","root","","test") or die(mysqli_error());
    ?>

<div>
<h1>Code Injection- Web App</h1>
</div>

<div class="center">
    <form action="login.php" method="post">
        <p>Username :<input type="text" name="username" placeholder="Enter your username"></p>
        <p>Password : <input type="password" name="password" placeholder="Enter your password"></p>
        <input type="checkbox" name="re" id="re" value="on"> <label for="re"> Remember me</label><br>
        <br>
        <p class= button ><input type="submit" name="login" value="Login"  size="100"></p>
    </form>
 </div>   
    <?php
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
             
            if(empty($username) OR empty($password)){
                echo "Fill in all the fields";
                exit();
            }
 
            //check remeber me button is set or not
            if(isset($_POST['re'])){
                $re = "on";
            }else{
                $re = "";
            }
 
            //check username and pass
            $query = mysqli_query($con,"SELECT * FROM `user` WHERE username='$username' AND password='$password'");
 
            if(mysqli_num_rows($query) == 1){
 
                //login the user in
                if($re == "on"){ //remember me checked
                    setcookie("username",$username,time() + (86400  * 10));
                    setcookie("password",$password,time() + (86400 * 10));
                }else{ //remember me not checked
                    session_start();
                    $_SESSION['username'] = $username;
                }
 
                echo "user logedin";
                header("Location: index.php");
                exit();
            }
 
            echo "Invalid username and password";
            exit();
 
        }
    ?>

   


</body>
</html>