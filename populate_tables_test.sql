INSERT INTO products(productid, name, price)
  VALUES (0, 'Test Product', 9.99); 

INSERT INTO customers(customerid, first_name, last_name, email, address_1, address_2, city, state, zip_code)
  VALUES (0, 'Test', 'Customer', 'carter.bartram@tufts.edu', '4019 Boston Ave', NULL, 'Medford', 'MA', 02155);

INSERT INTO orders(orderid, customerid, productid, artworkid, quantity, total_price, order_date)
  VALUES (0, 0, 0, '1979.486.1', 1, 9.99, '2024-11-17 16:26:32.000000');

SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE orders; 
TRUNCATE customers;
TRUNCATE products;
SET FOREIGN_KEY_CHECKS = 1; 
