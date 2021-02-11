<?php
include('constants.php');
// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE $databasename";
$db_selected = mysqli_select_db($conn, $databasename);
if (!$db_selected) {
    if(mysqli_query($conn, $sql)){
      echo "Database created successfully. ";
    }
    else {
      echo "Error creating database: " . mysqli_error($conn);
    }
} else {
  echo "Database exists.";
}

$conn = mysqli_connect($servername, $username, $password, $databasename);

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS $pricetable (
item VARCHAR(30) NOT NULL PRIMARY KEY,
fullname VARCHAR(30) NOT NULL,
price1 DECIMAL(5,2) UNSIGNED NOT NULL,
price2 DECIMAL(5,2) UNSIGNED,
quantity1 INT(4) UNSIGNED NOT NULL,
quantity2 INT(4) UNSIGNED NOT NULL,
reg_date TIMESTAMP
)";

/* NOT NULL - Each row must contain a value for that column, null values are not allowed
DEFAULT value - Set a default value that is added when no other value is passed
UNSIGNED - Used for number types, limits the stored data to positive numbers and zero
AUTO INCREMENT - MySQL automatically increases the value of the field by 1 each time a new record is added
PRIMARY KEY - Used to uniquely identify the rows in a table. The column with PRIMARY KEY setting is often an ID number, and is often used with AUTO_INCREMENT
*/

if (mysqli_query($conn, $sql)) {
    echo "Table Price table created successfully. ";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

/* The SQL query must be quoted in PHP
String values inside the SQL query must be quoted
Numeric values must not be quoted
The word NULL must not be quoted*/
$sql = "INSERT IGNORE INTO $pricetable (item, fullname, price1, price2, quantity1, quantity2)
VALUES ('java', 'Just Java', '2.00', NULL, '6', '0');";
$sql .= "INSERT IGNORE INTO $pricetable (item, fullname, price1, price2, quantity1, quantity2)
VALUES ('cafe', 'Cafe au Lait', '2.00', '3.00', '5', '4');";
$sql .= "INSERT IGNORE INTO $pricetable (item, fullname, price1, price2, quantity1, quantity2)
VALUES ('iced', 'Iced Cuppucino', '4.75', '5.75', '4', '2')";

if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully. ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
