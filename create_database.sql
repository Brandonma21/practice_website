-- Create the database
CREATE DATABASE wine_booking;

USE wine_booking;

-- Create the 'bookings' table
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    table_number INT NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the 'tables' table
CREATE TABLE tables (
    table_id INT AUTO_INCREMENT PRIMARY KEY,
    table_number INT NOT NULL,
    capacity INT NOT NULL
);

-- Insert static data into the 'tables' table
INSERT INTO tables (table_number, capacity) VALUES
(1, 4),
(2, 4),
(3, 6),
(4, 2),
(5, 4);

-- Create the 'users' table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);