<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "thesis");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch listings
$sql = "SELECT * FROM listings WHERE status = 'pending'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Listings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #b4c4ce;
        }
        .header {
            background-color: black;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        .tabs {
            display: flex;
            justify-content: center;
            background-color: #ddd;
            padding: 10px;
        }
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            margin: 0 10px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .tab.active {
            background-color: #333;
            color: white;
        }
        .listing-container {
            display: none;
            background-color: white;
            width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .listing-container img {
            width: 200px;
            height: 150px;
            object-fit: cover;
            margin-top: 10px;
        }
        .back{
            fill: gray;
            position: absolute;
            top: 0px;
            display: flex;
            background-color: transparent;
            padding: 16px;
            cursor: pointer;
            width: 30px;
        }
        .back:hover{
            fill: black;
            background-color:rgba(244, 244, 245, 0.69);
        }
        .back:active {
            transform: translateY(2px);
        }
    </style>
    <script>
        function showTab(tabName) {
            document.querySelectorAll('.listing-container').forEach(container => {
                container.style.display = 'none';
            });
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            document.querySelectorAll('.' + tabName).forEach(container => {
                container.style.display = 'block';
            });
            document.getElementById(tabName + '-tab').classList.add('active');
        }
    </script>
</head>
<body>

<div class="header">         
    <a href="javascript:history.back()" class="back">
        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"><path d="M275.84-454.87 497.9-233.08q7.18 7.49 7.39 17.53.22 10.04-7.6 17.75-7.82 7.72-17.69 7.82-9.87.11-17.69-7.71L201.87-458.13q-4.89-4.9-7-10.21-2.1-5.32-2.1-11.69 0-6.38 2.1-11.66 2.11-5.28 7-10.18l260.44-260.44q7.23-7.23 17.34-7.42 10.12-.19 18.04 7.42 7.82 7.93 7.82 17.85 0 9.92-7.82 17.49L275.84-505.13h479.03q10.87 0 18 7.14Q780-490.86 780-480q0 10.87-7.13 18-7.13 7.13-18 7.13H275.84Z"/></svg>
    </a>
    BUY
</div>

<div class="tabs">
    <div id="car-tab" class="tab active" onclick="showTab('car')">Cars</div>
    <div id="land-tab" class="tab" onclick="showTab('land')">Land</div>
    <div id="house-tab" class="tab" onclick="showTab('house')">Houses</div>
</div>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $itemType = htmlspecialchars($row["item_type"]);
        echo "<div class='listing-container $itemType' style='display: none;'>";
        if (!empty($row["image"])) {
            echo "<img src='uploads/" . htmlspecialchars($row["image"]) . "' alt='Item Image'>";
        }
        echo "<h3>" . htmlspecialchars($row["title"]) . "</h3>";
        echo "<p><strong>Type:</strong> " . $itemType . "</p>";
        echo "<p><strong>Description:</strong> " . htmlspecialchars($row["description"]) . "</p>";
        echo "<p><strong>Price:</strong> $" . htmlspecialchars($row["price"]) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No listings available.</p>";
}
$conn->close();
?>

<script>
    // Show the default tab (Cars)
    showTab('car');
</script>

</body>
</html>
