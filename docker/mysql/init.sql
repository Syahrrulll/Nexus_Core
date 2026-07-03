CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    item VARCHAR(200) NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO orders (customer_name, item, quantity, price) VALUES
('Alice', 'Laptop', 1, 1500.00),
('Bob', 'Smartphone', 2, 999.99),
('Charlie', 'Headphones', 1, 199.99),
('Diana', 'Monitor', 2, 250.00),
('Eve', 'Keyboard', 1, 79.99);
