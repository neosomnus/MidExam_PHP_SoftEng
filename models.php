<?php  

require_once 'dbConfig.php';

function insertNewUser($pdo, $firstname, $lastname, $username, $password) {

	$checkUserSql = "SELECT * FROM user_passwords WHERE username = ?";
	$checkUserSqlStmt = $pdo->prepare($checkUserSql);
	$checkUserSqlStmt->execute([$username]);

	if ($checkUserSqlStmt->rowCount() == 0) {

		$sql = "INSERT INTO user_passwords (firstname, lastname, username, password) VALUES(?,?,?,?)";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$firstname, $lastname, $username, $password]);

		if ($executeQuery) {
			$_SESSION['message'] = "User successfully inserted";
			return true;
		}

		else {
			$_SESSION['message'] = "An error occured from the query";
		}

	}
	else {
		$_SESSION['message'] = "User already exists";
	}

	
}

function loginUser($pdo, $firstname, $lastname, $username, $password) {
	$sql = "SELECT * FROM user_passwords WHERE username=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$username]); 

	if ($stmt->rowCount() == 1) {
		$userInfoRow = $stmt->fetch();
        $firstnameFromDB = $userInfoRow['firstname']; 
        $lastnameFromDB = $userInfoRow['lastname']; 
		$usernameFromDB = $userInfoRow['username']; 
		$passwordFromDB = $userInfoRow['password'];

		if ($password == $passwordFromDB) {
            $_SESSION['firstname'] = $firstnameFromDB;
            $_SESSION['lastname'] = $lastnameFromDB;
			$_SESSION['username'] = $usernameFromDB;
			$_SESSION['message'] = "Login successful!";
			return true;
		}

		else {
			$_SESSION['message'] = "Password is invalid, but user exists";
		}
	}

	
	if ($stmt->rowCount() == 0) {
		$_SESSION['message'] = "Username doesn't exist from the database. You may consider registration first";
	}

}

function getAllUsers($pdo) {
	$sql = "SELECT * FROM user_passwords";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}

}

function getUserByID($pdo, $user_id) {
	$sql = "SELECT * FROM user_passwords WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$user_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function getDistributorByID($pdo, $distributor_id) {
	$sql = "SELECT * FROM distributors WHERE distributor_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$distributor_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function insertProductStock($pdo, $product_name, $product_batch, $selling_price, 
	$buying_cost, $create_date, $expire_date) {

	$sql = "INSERT INTO products (product_name, product_batch, selling_price, 
	buying_cost, create_date, expire_date) VALUES(?,?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$product_name, $product_batch, $selling_price, 
									$buying_cost, $create_date, $expire_date]);

	if ($executeQuery) {
		return true;
	}
}

function getAllProductStock($pdo) {
	$sql = "SELECT * FROM products";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

?>