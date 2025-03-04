<!--?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $item = $_POST['itemType'];
    $title = $_POST['itemTitle'];
    $description = $_POST['itemDescription'];
    $price = $_POST['itemPrice'];
    $image = $_POST['itemImage'];
    $status = "pending"; // Default status

    $conn = new mysqli("localhost", "root", "", "thesis"); // Change database details accordingly

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO pending_posts (item, title, description, price, image, status) VALUES ($item, $title, $description, $price, $image, $status)");

    $stmt->bind_param("siss", $item, $title, $desciption, $price, $image, $status);

    if ($stmt->execute()) {
        echo "Request submitted successfully. Waiting for admin approval.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?-->

<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "thesis");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $itemType = $_POST["itemType"];
    $itemTitle = $_POST["itemTitle"];
    $itemDescription = $_POST["itemDescription"];
    $itemPrice = $_POST["itemPrice"];
    $status = $_POST["status"];

    // Handle image upload
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $imageName = basename($_FILES["itemImage"]["name"]);
    $targetFilePath = $targetDir . $imageName;
    move_uploaded_file($_FILES["itemImage"]["tmp_name"], $targetFilePath);

    // Insert data into database
    $sql = "INSERT INTO listings (item_type, title, description, price, image, status)
            VALUES ('$itemType', '$itemTitle', '$itemDescription', '$itemPrice', '$imageName', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Listing submitted successfully! <a href='buy.php'>View Listings</a>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sell</title>
  <style>
    body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
            background-color: #b4c4ce;
        }
     .form-container {
            background-color: #fff;
            padding: 30px 80px ;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 30px;
            max-width: 550px;
            padding:;
        }

        .form-container input,
        .form-container textarea,
        .form-container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            background-color:rgb(37, 50, 71);
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
        }

        .form-container button:hover {
            background-color:rgb(125, 129, 131);
        }
        .back{
        fill: gray;
        position: static;
        display: flex;
        background-color: transparent;
        padding: 1em;
        cursor: pointer;
        border-radius: 50%;
        width: 30px;
        }
        .back:hover{
        fill: black;
        background-color:rgba(244, 244, 245, 0.69);
        }
        .back:active {
        transform: translateY(2px);
        }
        h2 {
            background-color:rgb(22, 32, 48);
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 10px;
        }
  </style>
</head>
<body>
  <div class="form-container">
     <a href="javascript:history.back()" class="back">
        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" ><path d="M275.84-454.87 497.9-233.08q7.18 7.49 7.39 17.53.22 10.04-7.6 17.75-7.82 7.72-17.69 7.82-9.87.11-17.69-7.71L201.87-458.13q-4.89-4.9-7-10.21-2.1-5.32-2.1-11.69 0-6.38 2.1-11.66 2.11-5.28 7-10.18l260.44-260.44q7.23-7.23 17.34-7.42 10.12-.19 18.04 7.42 7.82 7.93 7.82 17.85 0 9.92-7.82 17.49L275.84-505.13h479.03q10.87 0 18 7.14Q780-490.86 780-480q0 10.87-7.13 18-7.13 7.13-18 7.13H275.84Z"/></svg>
    </a>

    <h2>Seller Form</h2>
    <form id="sellerForm" method="POST" action="Sell.php" enctype="multipart/form-data">
        
        <label for="itemType">Item Type:</label>
        <select id="itemType" name="itemType" required>
            <option value="">Select Item Type</option>
            <option value="land">Land</option>
            <option value="house">House</option>
            <option value="car">Car</option>
        </select>

        <label for="itemTitle">Title:</label>
        <input type="text" id="itemTitle" name="itemTitle" placeholder="Enter title for your listing" required>

        <label for="itemDescription">Description:</label>
        <textarea id="itemDescription" name="itemDescription" placeholder="Enter a detailed description" rows="5" required></textarea>

        <label for="itemPrice">Price ($):</label>
        <input type="number" id="itemPrice" name="itemPrice" placeholder="Enter the price" required>

        <label for="itemImage">Upload Image:</label>
        <input type="file" id="itemImage" name="itemImage" accept="image/*" required>

        <input type="hidden" name="status" value="pending">
        <button type="submit" name="submit">Submit Listing</button>
    </form>
</div>
</body>
</html>