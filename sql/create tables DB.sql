--'products' Table 

 
CREATE TABLE IF NOT EXISTS products 
(
item_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
item_name VARCHAR(20) NOT NULL,
item_desc VARCHAR(200) NOT NULL,
item_img VARCHAR(20) NOT NULL,
item_price DECIMAL(4,2) NOT NULL,
PRIMARY KEY (item_id)
);


--'users' Table


CREATE TABLE IF NOT EXISTS users 
(
user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
first_name VARCHAR(20) NOT NULL,
last_name VARCHAR(40) NOT NULL,
email VARCHAR(60) NOT NULL,
pass VARCHAR(40) NOT NULL,
reg_date DATETIME NOT NULL,
PRIMARY KEY (user_id),
UNIQUE (email)
);


--'orders' Table 

 
CREATE TABLE IF NOT EXISTS orders
 (
  order_id int(10) unsigned NOT NULL AUTO_INCREMENT,
  user_id int(10) unsigned NOT NULL,
  total decimal(8,2) NOT NULL,
  order_date datetime NOT NULL,
  PRIMARY KEY (order_id)
)  ;


--'order_contents' Table 

 
CREATE TABLE IF NOT EXISTS order_contents 
(
  content_id int(10) unsigned NOT NULL AUTO_INCREMENT,
  order_id int(10) unsigned NOT NULL,
  item_id int(10) unsigned NOT NULL,
  quantity int(10) unsigned NOT NULL DEFAULT '1',
  price decimal(8,2) NOT NULL,
  PRIMARY KEY (content_id)
)  ;


ALTER TABLE orders
ADD CONSTRAINT fk_user_order FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE order_contents
ADD CONSTRAINT fk_order_content FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT fk_product_content FOREIGN KEY (item_id) REFERENCES products(item_id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE products
ADD COLUMN category VARCHAR(50) NOT NULL AFTER item_price;
ALTER TABLE products
MODIFY COLUMN item_price DECIMAL(10,2) NOT NULL;

