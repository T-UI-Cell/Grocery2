DROP TABLE products;
DROP TABLE domain;

CREATE TABLE domain(
	id INT(5)NOT NULL primary key auto_increment,
	iname VARCHAR(255)
);
CREATE TABLE products(
	id INT(5)NOT NULL primary key,
	cost DECIMAL(5,2),
	company VARCHAR(255),
	department VARCHAR(255),
	quantity INT
);

-- insert commands
INSERT INTO domain (iname) VALUES ('Hot Dogs');

INSERT INTO domain (iname) VALUES ('Rice Krispies');

INSERT INTO domain (iname) VALUES ('Bananas');

INSERT INTO domain (iname) VALUES ('Mtn. Dew');

INSERT INTO domain (iname) VALUES ('Rasberries');

INSERT INTO domain (iname) VALUES ('Nacho Cheese');

INSERT INTO domain (iname) VALUES ('Water Dasani 12');

INSERT INTO domain (iname) VALUES ('Water Aquafina');

INSERT INTO domain (iname) VALUES ('Ribeye');

INSERT INTO domain (iname) VALUES ('Macaroni');

INSERT INTO domain (iname) VALUES ('Water Dasani 24');

INSERT INTO domain (iname) VALUES ('Pickles');

INSERT INTO domain (iname) VALUES ('Dr Pepper');

INSERT INTO domain (iname) VALUES ('Brocolli');

INSERT INTO domain (iname) VALUES ('Pepsi');

INSERT INTO domain (iname) VALUES ('Rice Kripsies');


INSERT INTO products (id, cost, company, department, quantity
	)VALUES(1, 3.99, 'Oscar Meyer', 'Meat',50);
	
INSERT INTO products (id, cost, company, department, quantity
	)VALUES(2, 6.99, 'Kellog''s', 'Cereal',45);

INSERT INTO products (id, cost, company, department, quantity
	)VALUES(3, 1.49, 'Dole', 'Produce', 105);
	
INSERT INTO products (id, cost, company, department, quantity
	)VALUES(4, 9.49, 'Pepsi', 'Drinks', 88);
	
INSERT INTO products (id, cost, company, department, quantity
	)VALUES(5, 3.49, 'Dole', 'Produce', 165);
	
INSERT INTO products (id, cost, company, department, quantity
	)VALUES(6, 2.49, 'Doritos', 'Cheese', 205);
	
INSERT INTO products (id, cost, company, department, quantity
	)VALUES(7, 4.99, 'Dasani', 'Drinks', 115);
	
INSERT INTO products (id, cost, company, department, quantity
	)VALUES(8, 3.99, 'Aquafina', 'Drinks', 105);
	
INSERT INTO products (id, cost, company, department, quantity
	)VALUES(9, 14.99, 'Steak', 'Meat', 205);

INSERT INTO products (id, cost, company, department, quantity
	)VALUES(10, 2.99, 'Velveeta', 'Grocery', 15);
	
INSERT INTO products (id, cost, company, department, quantity
	)VALUES(11, 6.99, 'Dasani', 'Drinks', 115);
	
INSERT INTO products (id, cost, company, department, quantity
	)VALUES(12, 3.95, 'Kosher', 'Grocery', 217);
	
INSERT INTO products (id, cost, company, department, quantity
	)VALUES(13, 4.99, 'Dr Pepper', 'Drinks', 46);

INSERT INTO products (id, cost, company, department, quantity
	)VALUES(14, 2.91, 'ProduceSale', 'Produce', 35);
	
INSERT INTO products (id, cost, company, department, quantity
	)VALUES(15, 2.99, 'Pepsi', 'Drinks', 153);

INSERT INTO products (id, cost, company, department, quantity
	)VALUES(16, 4.99, 'Kellog', 'Cereal', 27);