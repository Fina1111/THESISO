<?php
$conn = new mysqli("localhost", "root", "", "marketplace");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['approve'])) {
    $id = $_GET['approve'];

    // Move the post to approved_posts
    $conn->query("INSERT INTO approved_posts (item, price, description) SELECT item, price, description FROM pending_posts WHERE id=$id");
    $conn->query("DELETE FROM pending_posts WHERE id=$id");

    echo "Post approved!";
}

$result = $conn->query("SELECT * FROM pending_posts");

echo "<h2>Pending Posts</h2>";
while ($row = $result->fetch_assoc()) {
    echo "<p>{$row['item']} - {$row['price']} <a href='admin.php?approve={$row['id']}'>Approve</a></p>";
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seller Request</title>
</head>
<body>

   <p>when the seller submit the button it will add request here. If Approved then wil post to Sell.php else message the seller "Your request has been decline due to insufficient reliability of info"</p>
  <script></script>
</body>
</html>