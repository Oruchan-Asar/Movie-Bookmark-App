<?php
// include database connection file
require_once'connection.php';

if(isset($_POST['insert']))
{
	// Posted Values
	$uname=$_POST['username'];
	$passw=$_POST['password'];
	$emailid=$_POST['email'];
	$regdate=date("Y-m-d H:i:s");
	// Query for Insertion
	$sql="INSERT INTO users(user_name,password,email,reg_date) VALUES(:un,:pass,:eml,:rd)";
	//Prepare Query for Execution
	$query = $dbh->prepare($sql);
	// Bind the parameters
	$query->bindParam(':un',$uname,PDO::PARAM_STR);
	$query->bindParam(':pass',$passw,PDO::PARAM_STR);
	$query->bindParam(':eml',$emailid,PDO::PARAM_STR);
	$query->bindParam(':rd',$regdate,PDO::PARAM_STR);
	// Query Execution
	$query->execute();
	// Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
	{
		// Message for successfull insertion
		//echo "<script>alert('Record inserted successfully');</script>";
		session_start();
		$_SESSION["userid"]=$lastInsertId;
		echo "<script>window.location.href='/../index.php'</script>";
	}
	else
	{
		// Message for unsuccessfull insertion
		echo "<script>alert('Something went wrong. Please try again');</script>";
		echo "<script>window.location.href='/register/register.php'</script>";
	}
}
else if(isset($_POST['login']))
{
	$uname=$_POST['username'];
	$passw=$_POST['password'];
	$sql="SELECT * from users where user_name=:un and password=:pw";
	$query = $dbh->prepare($sql);
	$query->bindParam(':un',$uname,PDO::PARAM_STR);
	$query->bindParam(':pw',$passw,PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	// For serial number initialization
	$cnt=1;
	if($query->rowCount() > 0)
	{
		session_start();
		$_SESSION["userid"] = $results[0]->user_id;
		//echo $_SESSION["userid"];
		echo "<script>window.location.href='/../index.php'</script>";
	}
	else
	{
		echo "<script>alert('Your credentials are wrong. Try again.');</script>";
		echo "<script>window.location.href='/login/login.php'</script>";
	}
}
else if(isset($_GET['fav']))
{
	session_start();
	$userId=$_SESSION["userid"];
	if(isset($userId) && $userId != NULL)
	{
		$index=$_GET["id"];
		$searchValue= $_COOKIE["search"];
		$data = file_get_contents('http://www.omdbapi.com/?apikey=9da15a83&s='.urlencode($searchValue));
		//echo $data;
		$result = (array) json_decode($data,true);
		$regdate=date("Y-m-d H:i:s");
		$listType=$_GET['fav'];
		/*echo $regdate;
		echo $userId;
		echo $listType;
		echo $result["Search"][$index]["Title"];
		echo $result["Search"][$index]["Year"];
		echo $result["Search"][$index]["Type"];
		echo $result["Search"][$index]["Poster"];*/
		$sql="SELECT * from movies where user_id=:ui and listing_type=:lt and movie_name=:mn and movie_year=:my and movie_type=:mt and movie_image=:mi and movie_link=:mol";
		
		//$sql="INSERT INTO movies(user_id,listing_type,movie_name,movie_year,movie_type,movie_image,create_date) VALUES(:ui,:lt,:mn,:my,:mt,:mi,:cd)";
		//Prepare Query for Execution
		$query = $dbh->prepare($sql);
		// Bind the parameters
		$query->bindParam(':ui',$userId,PDO::PARAM_STR);
		$query->bindParam(':lt',$listType,PDO::PARAM_INT);
		$query->bindParam(':mn',$result["Search"][$index]["Title"],PDO::PARAM_STR);
		$query->bindParam(':my',$result["Search"][$index]["Year"],PDO::PARAM_STR);
		$query->bindParam(':mt',$result["Search"][$index]["Type"],PDO::PARAM_STR);
		$query->bindParam(':mi',$result["Search"][$index]["Poster"],PDO::PARAM_STR);
		$query->bindParam(':mol',$result["Search"][$index]["imdbID"],PDO::PARAM_STR);
		//$query->bindParam(':cd',$regdate,PDO::PARAM_STR);
		// Query Execution
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		// For serial number initialization
		$cnt=1;
		if($query->rowCount() > 0)
		{
			echo "<script>alert('Ooops it seems like you have it already. No need to add one more time ... Redirecting...');</script>";
			echo "<script>window.location.href='/../index.php'</script>";
		}
		else
		{
			$sql="INSERT INTO movies(user_id,listing_type,movie_name,movie_year,movie_type,movie_image,create_date,movie_link) VALUES(:ui,:lt,:mn,:my,:mt,:mi,:cd,:mol)";
			$query = $dbh->prepare($sql);
			// Bind the parameters
			$query->bindParam(':ui',$userId,PDO::PARAM_STR);
			$query->bindParam(':lt',$listType,PDO::PARAM_INT);
			$query->bindParam(':mn',$result["Search"][$index]["Title"],PDO::PARAM_STR);
			$query->bindParam(':my',$result["Search"][$index]["Year"],PDO::PARAM_STR);
			$query->bindParam(':mt',$result["Search"][$index]["Type"],PDO::PARAM_STR);
			$query->bindParam(':mi',$result["Search"][$index]["Poster"],PDO::PARAM_STR);
			$query->bindParam(':mol',$result["Search"][$index]["imdbID"],PDO::PARAM_STR);
			$query->bindParam(':cd',$regdate,PDO::PARAM_STR);
			$query->execute();
			// Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
			$lastInsertId = $dbh->lastInsertId();
			if($lastInsertId)
			{
				header("Location: /../index.php");
			}
			else
			{
				echo("Ooops something went wrong... We are directing you to homepage...");
				header("Refresh:3; url=/../index.php");
			}
		}
	}
	else
	{
		echo "<script>alert('You need to log-in to Bookmark or Favourite');</script>";
		echo "<script>window.location.href='login.php'</script>";
	}
}






?>