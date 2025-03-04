<?php //include('config.php') 

$Firstname  = "";
$Lastname  = "";
$Birthday  = "";
$Gender  = "";
$Number  = "";
$Email  = "";
$Password  = "";


/*
if(isset($_POST['signup'])) {
  $FirstName = $_POST['Firstname'];
  $LastName = $_POST['Lastname'];
  $Birthday = $_POST['Birthday'];
  $Gender = $_POST['Gender'];
  $Number = $_POST['Number'];
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];

  do {
  if ( empty($firstName) || empty($lastName) || empty($birthday) || empty($gender) || empty($number) || empty($email) || empty($password)  ) {
    $errorMsg = "Please fill out the field."; }
  }
}
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form class="container" method='POST'>

      <div id="Sign Up-logo">
      <img src="image/RIRI.jpg" alt="RIRI Innovations Logo" style="width: 60%; height: auto;">
      </div>

      <h3>User</h3>
      <input type="hidden" value="">
      <input type="text" name="Firstname" id="First name" value="<?php echo $Firstname; ?>" placeholder="First name" required>
      <input type="text"  name="Lastname" id="Last name" value="<?php echo $Lastname; ?>"placeholder="Last name" required>
      <div class="bday">
      <label for="Birthday">Birthday</label>
      <input type="date" name="Birthday" id="Birthday" value="<?php echo $Birthday; ?>" required> 
      <select type="text" name="Gender" id="Gender" value="<?php echo $Gender; ?>"  placeholder="Gender" required>
          <option value="">Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
      </select> </div>
      <input type="Number" name="Number" id="Number" value="<?php echo $Number; ?>" placeholder="Mobile number" required>
      <input type="email" name="Email" id="Email" value="<?php echo $Email; ?>" placeholder="Email" required>
      <input type="password" name="Password" id="Password" value="<?php echo $Password; ?>" placeholder="Password" required>


        
        <button type="submit-edit" name="submit">Submit</button> <br><br>
          <a href="crud.php">Cancel</a>

    </form>
    <script src="maawa.js"></script>   
</body>
</html>