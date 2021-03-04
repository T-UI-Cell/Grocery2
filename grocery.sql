DROP TABLE products;

CREATE TABLE products(
	iname VARCHAR(255),
	cost DECIMAL(5,2),
	company VARCHAR(255),
	department VARCHAR(255),
	quantity INT,
	id INT(5)NOT NULL primary key auto_increment
);

-- insert commands
INSERT INTO products (iname, cost, company, department, quantity
	)VALUES('Hot Dogs', 3.99, 'Oscar Meyer', 'Meat',50);
	
INSERT INTO products (iname, cost, company, department, quantity
	)VALUES('Rice Krispies', 6.99, 'Kellog''s', 'Cereal',45);

INSERT INTO products (iname, cost, company, department, quantity
	)VALUES('Bananas', 1.49, 'Dole', 'Produce', 105);
	
INSERT INTO products (iname, cost, company, department, quantity
	)VALUES('Mtn. Dew', 9.49, 'Pepsi', 'Drinks', 88);
	
INSERT INTO products (iname, cost, company, department, quantity
	)VALUES('Rasberries', 3.49, 'Dole', 'Produce', 165);
	
INSERT INTO products (iname, cost, company, department, quantity
	)VALUES('Nacho Cheese', 2.49, 'Doritos', 'Cheese', 205);
	
INSERT INTO products (iname, cost, company, department, quantity
	)VALUES('Water', 4.99, 'Dasani', 'Drinks', 115);
	
INSERT INTO products (iname, cost, company, department, quantity
	)VALUES('Water', 3.99, 'Aquafina', 'Drinks', 105);
	
INSERT INTO products (iname, cost, company, department, quantity
	)VALUES('Ribeye', 14.99, 'Steak', 'Meat', 205);

INSERT INTO products (iname, cost, company, department, quantity
	)VALUES('Macaroni', 2.99, 'Velveeta', 'Grocery', 15);
	
INSERT INTO products (iname, cost, company, department, quantity
	)VALUES('Water', 4.99, 'Dasani', 'Drinks', 115);
	
INSERT INTO products (iname, cost, company, department, quantity
	)VALUES('Pickles', 3.95, 'Kosher', 'Grocery', 217);
	
INSERT INTO products (iname, cost, company, department, quantity
	)VALUES('Dr Pepper', 4.99, 'Dr Pepper', 'Drinks', 46);
INSERT INTO products (iname, cost, company, department, quantity
	)VALUES('Brocolli', 2.91, 'ProduceSale', 'Produce', 35);
	
INSERT INTO products (iname, cost, company, department, quantity
	)VALUES('Pepsi', 2.99, 'Pepsi', 'Drinks', 153);
INSERT INTO products (iname, cost, company, department, quantity
	)VALUES('Rice Kripsies', 4.99, 'Kellog', 'Cereal', 27);
	
	
	

