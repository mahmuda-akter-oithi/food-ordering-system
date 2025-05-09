# Databases

```SQL
CREATE database `food-ordering-system` ;
```

## Customer

### customers Table Creation - tested

```SQL
CREATE TABLE customers (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(150) NOT NULL,
    name VARCHAR(100) NOT NULL,
    date_of_birth DATE NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL );
```

### customer Registration - tested

```SQL
INSERT INTO customers
(email, password, name, date_of_birth, address, phone)
VALUES
('user1@example.com', 'password1', 'name', 'date_of_birth', 'address', "phone");
```

### customer Login - tested

```SQL
SELECT * FROM customers
WHERE
email = 'user1@example.com' AND password = 'password1';
```

### customer Update Info - skip

```SQL
UPDATE customers
SET address = 'address'
WHERE
id = 'order_id' AND customer_id = 'customer_id';
```

### customer Own info

##

## Restaurant

### restaurants Table Creation - tested

```SQL
CREATE TABLE restaurants (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(150) NOT NULL,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    description TEXT(1000) );

```

### restaurant Registration - tested

```SQL
INSERT INTO restaurants
(email, password, name, address)
VALUES
('user1@example.com', 'password1', 'name', 'address');
```

### restaurant Login - tested

```SQL
SELECT * FROM restaurants
WHERE
email = 'user1@example.com' AND password = 'password1';
```

### restaurant profile - tested

```SQL
SELECT * FROM restaurants
WHERE
id = '$restaurant_id';
```

### restaurant search - tested

```SQL
SELECT * FROM restaurants
WHERE
name LIKE '%$restaurant_name%';
```

### restaurant Profile

### restaurant Update info

##

## Food

### foods Table Creation - tested

```SQL
CREATE TABLE foods (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    restaurant_id int NOT NULL,
    name VARCHAR(100) NOT NULL,
    price INT NOT NULL,
    description TEXT(1000) NOT NULL,
    photo_link VARCHAR(200) NOT NULL);

```

### add Food - tested

```SQL
INSERT INTO foods
(restaurant_id, name, price, description, photo_link)
VALUES
('restaurant_id' ,'food name', 'price', 'description', 'photo_link');
```

### delete food

```SQL
DELETE FROM foods
WHERE
id = `food_id` and restaurant_id = 'restaurant_user_id';
```

### food info - tested

```SQL
SELECT * FROM foods WHERE id = '$food_id';
```

### View restaurant's food - tested

```SQL
SELECT * FROM foods
WHERE
restaurant_id = 'restaurant_id';
```

### search food - tested

```SQL
SELECT * FROM foods
WHERE
name LIKE '%$food_name%' or description LIKE '%$food_name%';
```

### View latest food - tested

```SQL
SELECT * FROM foods
ORDER BY id DESC
LIMIT 10;
```

##

## Orders

### order Table Creation - tested

```SQL
CREATE TABLE orders (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    restaurant_id INT NOT NULL,
    food_id INT NOT NULL,
    food_name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    rate INT NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    order_state INT NOT NULL);
```

### place Order - tested

```SQL
INSERT INTO orders
(customer_id, food_id, restaurant_id, quantity, rate, address, phone order_state)
VALUES
('customer_id', 'food_id', 'restaurant_id', 'quantity', 'rate',  'address', 'phone', 1);
```

### customer updating Order (like payment or cancel)

```SQL
UPDATE orders
SET order_state = 'updated_state'
WHERE
id = 'order_id' AND customer_id = 'customer_id';
```

### restaurant updating Order (like cancel, confirm, delivered, etc)

```SQL
UPDATE orders
SET order_state = 'updated_state'
WHERE
id = 'order_id' AND restaurant_id = 'restaurant_id';
```

### customer view orders - tested

```SQL
SELECT * FROM orders WHERE customer_id = '$customer_id';
```

### restaurant view orders -tested

```SQL
SELECT * FROM orders WHERE restaurant_id = '$restaurant_id';
```