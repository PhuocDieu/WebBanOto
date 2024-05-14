<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "car_shop";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Truy vấn danh sách sản phẩm
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Shop</title>
</head>
<body>
    <h1>Welcome to the Car Shop!</h1>
    
    <ul>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<li><a href="product.php?id=' . $row['id'] . '">' . $row['name'] . ' - $' . $row['price'] . '</a></li>';
            }
        } else {
            echo '<li>No products available</li>';
        }
        ?>
    </ul>
</body>
</html>
