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

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $order_id = $_GET['order_id'];

    $sql = "SELECT * FROM orders WHERE order_id = '$order_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='order-details'>
                    <p><strong>Order ID:</strong> " . $row['order_id'] . "</p>
                    <p><strong>Customer Name:</strong> " . $row['customer_name'] . "</p>
                    <p><strong>Item Name:</strong> " . $row['item_name'] . "</p>
                    <p><strong>Quantity:</strong> " . $row['quantity'] . "</p>
                    <p><strong>Total Price:</strong> $" . $row['total_price'] . "</p>
                  </div>";
        }
    } else {
        echo "No order found with that ID.";
    }
}

$conn->close();
?>
