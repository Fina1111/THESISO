<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - RIRI Innovations</title>
    <link rel="stylesheet" href="/THESIS/main.css">
</head>
<body>


    <div class="nav">
        <div class="nav-logo">
            <p><img src="image/RIRI.jpg"  width="40" height="35" alignment="center">  RI-RI Innovation</p> 
        </div>
        
        <button id="slide-open" onclick="openMenu()">
          <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#c9c9c9"><path d="M165.13-254.62q-10.68 0-17.9-7.26-7.23-7.26-7.23-18t7.23-17.86q7.22-7.13 17.9-7.13h629.74q10.68 0 17.9 7.26 7.23 7.26 7.23 18t-7.23 17.87q-7.22 7.12-17.9 7.12H165.13Zm0-200.25q-10.68 0-17.9-7.27-7.23-7.26-7.23-17.99 0-10.74 7.23-17.87 7.22-7.13 17.9-7.13h629.74q10.68 0 17.9 7.27 7.23 7.26 7.23 17.99 0 10.74-7.23 17.87-7.22 7.13-17.9 7.13H165.13Zm0-200.26q-10.68 0-17.9-7.26-7.23-7.26-7.23-18t7.23-17.87q7.22-7.12 17.9-7.12h629.74q10.68 0 17.9 7.26 7.23 7.26 7.23 18t-7.23 17.86q-7.22 7.13-17.9 7.13H165.13Z"/></svg>
        </button>

        <nav id="navbar">
            <ul>
                <li><button id="slide-close" onclick="closeMenu()"> 
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#c9c9c9"><path d="m480-444.62-209.69 209.7q-7.23 7.23-17.5 7.42-10.27.19-17.89-7.42-7.61-7.62-7.61-17.7 0-10.07 7.61-17.69L444.62-480l-209.7-209.69q-7.23-7.23-7.42-17.5-.19-10.27 7.42-17.89 7.62-7.61 17.7-7.61 10.07 0 17.69 7.61L480-515.38l209.69-209.7q7.23-7.23 17.5-7.42 10.27-.19 17.89 7.42 7.61 7.62 7.61 17.7 0 10.07-7.61 17.69L515.38-480l209.7 209.69q7.23 7.23 7.42 17.5.19 10.27-7.42 17.89-7.62 7.61-17.7 7.61-10.07 0-17.69-7.61L480-444.62Z"/></svg>
                </li>
                <li><a href="User.php" class="link">User</a></li>
                <li><a href="Buy.php" class="link">Buy</a></li>
                <li><a href="Sell.php" class="link">Sell</a></li>
                <li><a href="computation.php" class="link">Computation</a></li>
                <li><a href="adminLogin.php" class="link">Admin</a></li>
                <li><a href="index.php" class="link">Log-out</a></li> 
            </ul>
       </nav>
    </div>
    <div class="home-container">
      <p style="font-size: 30px;" font color="white">Welcome to Your Dashboard!</p><br>

      
      <div class="carousel">
        <div class="carousel__item"><img src="image/house.jpg"  width="90%" height="100%" alignment="center">  </div>
        <div class="carousel__item"><img src="image/car.jpg"  width="90%" height="100%" alignment="center"> </div>
        <div class="carousel__item"><img src="image/lot.jpg"  width="90%" height="100%" alignment="center"></div>
      </div>
    </div>

    <script src="/THESIS/main.js"></script> 
</body>
</html>