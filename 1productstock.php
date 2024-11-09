<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<?php require_once 'core/handleForms.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<h1>Welcome To the Product Item Stock Management System. Add a new Product Item Stock!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="productName">Product Name</label> 
			<input type="text" name="productName">
		</p>
		<p>
			<label for="productBatch">Product Batch</label> 
			<input type="text" name="productBatch ">
		</p>
		<p>
			<label for="sellingPrice">Selling Price</label> 
			<input type="text" name="sellingPrice">
		</p>
		<p>
			<label for="buyingCost">Buying Cost</label> 
			<input type="text" name="buyingCost">
		</p>
        <p>
			<label for="createDate">Create Date</label> 
			<input type="date" name="createDate">
		</p>
		<p>
			<label for="expireDate">Expire Date</label> 
            <input type="date" name="expireDate">
			<input type="submit" name="insertProductStockBtn">
		</p>
	</form>

	<table style="width:50%; margin-top: 50px;">
        <thead>
            <tr>
	            <th>Product ID</th>
	            <th>Product Name</th>
	            <th>Product Batch</th>
	            <th>Selling Price</th>
	            <th>Buying Cost</th>
	            <th>Create Date</th>
	            <th>Expire Date</th>
	            <th>Distributor ID</th>
                <th>User ID</th>
                <th>Date Added</th>
	            <th>Action</th>
	        </tr>
        </thead>

        <tbody>
            <?php $getAllProductStock = getAllProductStock($pdo); ?>
	        <?php foreach ($getAllProductStock as $row) { ?>
	        <tr>
	  	        <td><?php echo $row['product_id']; ?></td>
	  	        <td><?php echo $row['product_name']; ?></td>
	  	        <td><?php echo $row['product_batch']; ?></td>
	  	        <td><?php echo $row['selling_price']; ?></td>
	  	        <td><?php echo $row['buying_cost']; ?></td>
	  	        <td><?php echo $row['create_date']; ?></td>
	  	        <td><?php echo $row['expire_date']; ?></td>
	  	        <td><?php echo $row['distributor_id']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['date_added']; ?></td>

                <td>
	  		        <a href="editproduct.php?user_id=<?php echo $row['user_id'];?>">Edit</a>
	  		        <a href="deleteproduct.php?user_id=<?php echo $row['user_id'];?>">Delete</a>
	  	        </td>
                <td>
                    <a href="viewdistributor.php?distributor_id=<?php echo $row['distributor_id']; ?>">Distributor</a>
                    <a href="viewuser.php?user_id=<?php echo $row['user_id']; ?>">Exployee</a>
                </td>

	        </tr>
	        <?php } ?>
        </tbody>
	  
	</table>

</body>

</html>