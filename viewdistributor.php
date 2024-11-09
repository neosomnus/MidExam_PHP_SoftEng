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
	<?php $getDistributorByID = getDistributorByID($pdo, $_GET['distributor_id']); ?>
    <h1>Distributor Name: <?php echo $getDistributorByID['distributor_name']; ?></h1>
    <h1>Distributor Location: <?php echo $getDistributorByID['distributor_location']; ?></h1>
	<h1>Distributor Active: <?php echo $getDistributorByID['distributor_active']; ?></h1>
</body>

</html>