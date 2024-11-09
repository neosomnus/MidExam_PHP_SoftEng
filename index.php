<?php 
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 

if (!isset($_SESSION['username'])) {
	header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
			border:1px solid black;
		}
	</style>
</head>

<body>
	<?php if (isset($_SESSION['message'])) { ?>
		<h1 style="color: red;"><?php echo $_SESSION['message']; ?></h1>
	<?php } unset($_SESSION['message']); ?>



	<?php if (isset($_SESSION['username'])) { ?>
		<h1>Active user: <?php echo $_SESSION['username']; ?></h1>
		<a href="core/handleForms.php?logoutAUser=1">Logout</a>
	<?php } else { echo "<h1>No user logged in</h1>";}?>

	<h4>Action Menu: </h4>
	
	<p><a href="viewemployeelist.php">Employee List</a>: For checking the list of registered employees</p>
	<p><a href="1productstock.php">Product item stocks</a>: For checking and altering the list of product item stocks/p>
	<p><a href="1storefrontstock.php">Storefront stocks</a>: For checking and altering the list of registered employees</p>
	<p><a href="1storagestock.php">Storage stocks</a>: For checking and altering the list of registered employees</p>
	<p><a href="1distributorlist.php">Distributors</a>: For checking and altering the list of registered employees</p>
	
</body>

</html>