<?php 
include('config.php');
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];
$query = "SELECT * FROM user_db WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>
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
        .container {
            max-width: 360px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            text-align: center;
        }
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #007bff;
            margin-bottom: 10px;
            background-color: black;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
            text-align: left;
        }
        input, select {
            width: 95%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #0056b3;
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
    </style>
</head>
<body>
    <div class="header">User Profile</div>
    <div class="container">
    <a href="javascript:history.back()" class="back">
        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" ><path d="M275.84-454.87 497.9-233.08q7.18 7.49 7.39 17.53.22 10.04-7.6 17.75-7.82 7.72-17.69 7.82-9.87.11-17.69-7.71L201.87-458.13q-4.89-4.9-7-10.21-2.1-5.32-2.1-11.69 0-6.38 2.1-11.66 2.11-5.28 7-10.18l260.44-260.44q7.23-7.23 17.34-7.42 10.12-.19 18.04 7.42 7.82 7.93 7.82 17.85 0 9.92-7.82 17.49L275.84-505.13h479.03q10.87 0 18 7.14Q780-490.86 780-480q0 10.87-7.13 18-7.13 7.13-18 7.13H275.84Z"/></svg>
    </a>

        <form method="POST" action="update.php" enctype="multipart/form-data">
            <img id="preview" class="profile-pic" src="<?php echo !empty($user['profile_pic']) ? $user['profile_pic'] : 'black-profile.png'; ?>" alt="Profile Picture">
            <br>
            <input type="file" id="ProfilePic" name="ProfilePic" accept="image/*" onchange="previewImage(event)">
            <br>
            <!--button type="submit" name="uploadPic" class="btn">Add Profile Picture</button-->
            
            <label for="FullName">Name:</label>
            <input type="text" id="FullName" name="FullName" value="<?php echo $user['firstname'] . ' ' . $user['lastname']; ?>" required readonly>
            
            
            <label for="Birthday">Birthday:</label>
            <input type="date" id="Birthday" name="Birthday" value="<?php echo $user['birthday']; ?>" required readonly>
            
            <label for="Gender">Gender:</label>
            <input type="text" id="Gender" name="Gender" value="<?php echo ucfirst($user['gender']); ?>" readonly>
            
            <label for="Number">Mobile Number:</label>
            <input type="text" id="Number" name="Number" value="<?php echo $user['number']; ?>" required readonly>
            
            <label for="Email">Email:</label>
            <input type="email" id="Email" name="Email" value="<?php echo $user['email']; ?>" required readonly>
            
            <!--button type="button" class="btn">Edit</button-->
        </form>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                document.getElementById('preview').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
