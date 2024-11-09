CREATE TABLE user_passwords (
	user_id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    username VARCHAR(50),
	password VARCHAR(50),
	date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create storefront Table
create table storefront (
	fronted_product_id INT AUTO_INCREMENT PRIMARY KEY,
	product_id INT,
	fronted_amount INT,
	created_at DATE
);

-- Create storage Table
create table storage (
	stored_product_id INT AUTO_INCREMENT PRIMARY KEY,
	product_id INT,
	stored_amount INT,
	created_at DATE
);

-- Create products Table
create table products (
	product_id INT AUTO_INCREMENT PRIMARY KEY,
	product_name VARCHAR(50),
	product_batch VARCHAR(50),
	selling_price DECIMAL(5,2),
	buying_cost DECIMAL(5,2),
	create_date DATE,
	expire_date DATE,
	distributor_id INT,
    user_id INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create distributors Table
create table distributors (
	distributor_id INT AUTO_INCREMENT PRIMARY KEY,
	distributor_name VARCHAR(50),
	distributor_location VARCHAR(50),
	distributor_active BOOLEAN
);