CREATE TABLE admin (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE member (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone INT(10)  NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE staff (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `billing` (
  `id` int(30) NOT NULL PRIMARY KEY,
  `billing_date` date NOT NULL DEFAULT current_timestamp(),
  `member_id` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=pending,1=paid',
  `total_amount` double NOT NULL,
  `amount_payed` double NOT NULL,
  `amount_change` double NOT NULL,
  `invoice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `billing_date`, `member_id`, `status`, `total_amount`, `amount_payed`, `amount_change`, `invoice`) VALUES
(1, '2020-08-23', 2, 1, 9500, 10000, 500, ''),
(2, '2020-08-23', 1, 1, 8500, 10000, 1500, ''),
(3, '2020-09-23', 2, 0, 8000, 0, 0, ''),
(5, '2020-09-01', 1, 0, 6500, 0, 0, '');

CREATE TABLE `bills` (
  `id` int(30) NOT NULL PRIMARY KEY,
  `billing_id` int(30) NOT NULL ,
  `type` tinyint(1) NOT NULL COMMENT '1= block rent, 2= electricity,3=water',
  `reading` int(30) NOT NULL,
  `consumption` int(30) NOT NULL,
  `rate` double NOT NULL,
  `previous_reading` int(30) NOT NULL,
  `previous_consumption` int(30) NOT NULL,
  `amount` double NOT NULL,
  `previous_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `billing_id`, `type`, `reading`, `consumption`, `rate`, `previous_reading`, `previous_consumption`, `amount`, `previous_amount`) VALUES
(1, 1, 1, 0, 0, 5000, 0, 0, 5000, 5000),
(2, 1, 2, 100, 100, 15, 0, 0, 1500, 0),
(3, 1, 3, 300, 300, 10, 0, 0, 3000, 0),
(4, 2, 1, 0, 0, 3000, 0, 0, 3000, 3000),
(5, 2, 2, 300, 300, 15, 0, 0, 4500, 0),
(6, 2, 3, 100, 100, 10, 0, 0, 1000, 0),
(7, 3, 1, 0, 0, 5000, 0, 0, 5000, 5000),
(8, 3, 2, 100, 200, 15, 100, 100, 1500, 1),
(9, 3, 3, 150, 450, 10, 300, 300, 1500, 3),
(13, 5, 1, 0, 0, 3000, 0, 0, 3000, 3000),
(14, 5, 2, 100, 400, 15, 300, 300, 1500, 4),
(15, 5, 3, 200, 300, 10, 100, 100, 2000, 1);

CREATE TABLE registry (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    person_name VARCHAR(50) NOT NULL UNIQUE,
    In_Time VARCHAR(50) NOT NULL UNIQUE,
    Out_Time VARCHAR() NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `announcement` (
 `announcement_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 `announcement_subject` varchar(250) NOT NULL,
 `announcement_text` text NOT NULL,
 `announcement_status` int(1) NOT NULL
);

INSERT INTO `member` (`id`, `name`, `email`, `phone`, `pass`, `address`) VALUES
(1, 'Frederick J Baker\n', 'baker@gmail.com', '7450002145', 'password', '1488 Franklin Street'),
(2, 'Antonio Dominguez', 'antonio@gmail.com', '7854547855', 'password', '3961 Sycamore Lake Road'),
(3, 'Etta H Abner', 'etta@gmail.com', '7012569980', 'password', '3255 Ocello Street'),
(4, 'Jeffrey Wegman', 'wegman@gmail.com', '7012458888', 'password', '2962 Pine Tree Lane'),
(5, 'Benjamin Sanderson', 'benjamin@gmail.com', '7012565800', 'password', '4830 Bell Street'),
(6, 'Eric Webb', 'ericw@gmail.com', '7896541000', 'password', '3485 Stewart Street'),
(7, 'Jonathan Lasalle', 'jonathan@gmail.com', '70145850025', 'password', '3850 Olen Thomas Drive'),
(8, 'Liam Moore', 'liamoore@gmail.com', '7012545555', 'password', '744 Ralph Street'),
(9, 'Will Williams', 'williams@gmail.com', '7696969855', 'password', '7855 Allace Avenue'),
(10, 'Christine Moore', 'moore@gmail.com', '7896500010', 'password', '1458 Bleckstreet'),
(11, 'Timothy Diaz', 'timothy@gmail.com', '7412580020', 'password', '4840 Oakdale Avenue');

INSERT INTO `staff` (`id`, `username`, `email`,`password`) VALUES
(1, 'Baburao', 'baburao@gmail.com', 'password'),
(2, 'Ram', 'ram@gmail.com', 'password');