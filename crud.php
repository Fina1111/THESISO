<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD sample</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
        .header {
            background-color: black;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        .back{
        fill: white;
        position: absolute;
        top: 0px;
        display: flex;
        background-color: transparent;
        padding: 16px;
        cursor: pointer;
        width: 60px;
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
<div class="header">         
<a href="javascript:history.back()" class="back">
        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" ><path d="M275.84-454.87 497.9-233.08q7.18 7.49 7.39 17.53.22 10.04-7.6 17.75-7.82 7.72-17.69 7.82-9.87.11-17.69-7.71L201.87-458.13q-4.89-4.9-7-10.21-2.1-5.32-2.1-11.69 0-6.38 2.1-11.66 2.11-5.28 7-10.18l260.44-260.44q7.23-7.23 17.34-7.42 10.12-.19 18.04 7.42 7.82 7.93 7.82 17.85 0 9.92-7.82 17.49L275.84-505.13h479.03q10.87 0 18 7.14Q780-490.86 780-480q0 10.87-7.13 18-7.13 7.13-18 7.13H275.84Z"/></svg>
</a>
     List of Users
</div>
      <!--a class="btn btn-primary" href="signup.php" role="button">New Client</a-->
      <br>

      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Number</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        <thead>
        <tbody>
          <?php
          //connection to database
          include('config.php');
          
          //read all row from data value
          $sql = "SELECT * FROM user_db";
          $result = $conn->query($sql);

          if (!$result) {
            die('Invalid query: '.$conn->error); 
          }

          //read data of each row
          while ($row = $result->fetch_assoc()) {
            echo "        
          <tr>
            <td>$row[id]</td>
            <td>$row[firstname] $row[lastname]</td>
            <td>$row[birthday]</td>
            <td>$row[gender]</td>
            <td>$row[number]</td>
            <td>$row[email]</td>
            <td>$row[created_at]</td>
            <td> 

            <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
           </td>

          </tr>
            ";
          }      
          ?>
            <!--a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a-->



        <tbody>
  </div>
</body>
</html>