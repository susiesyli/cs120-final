CREATE TABLE products (
    productid INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    price NUMERIC(8,2) NOT NULL,
    PRIMARY KEY(productid)
);

CREATE TABLE customers (
    customerid INT NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    address_1 VARCHAR(255),
    address_2 VARCHAR(255),
    city VARCHAR(255),
    state VARCHAR(2),
    zip_code INT(5),
    PRIMARY KEY(customerid)
);

CREATE TABLE orders(
    ordered INT NOT NULL,
    customerid INT NOT NULL,
    productid INT NOT NULL,
    artworkid VARCHAR(255) NOT NULL
    quantity INT NOT NULL,
    total_price NUMERIC(8,2),
    order_date DATETIME NOT NULL,
    PRIMARY KEY(oderid),
    FOREIGN KEY(customerid) REFERENCES customers(customerid),
    FOREIGN KEY(productid) REFERENCES products(productid)
);