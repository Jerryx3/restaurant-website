<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $customer_name = $_POST['customer_name'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $total_price = $_POST['total_price'];

    $sql = "INSERT INTO orders (order_id, customer_name, item_name, quantity, total_price)
    VALUES ('$order_id', '$customer_name', '$item_name', '$quantity', '$total_price')";

    if ($conn->query($sql) === TRUE) {
        echo "New order recorded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
