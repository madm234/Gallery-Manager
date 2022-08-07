<?php
include('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/main_style.css">
    <link rel="stylesheet" href="jquery.flipster.min.css">
    <title>User</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
   <img src="images/logoNew.png" alt="" width=10%>
    
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="main.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="main.php">Gallery</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
        </li>
       
      </ul>
      <span class="navbar-text">
       <b>Welcome! <?php echo $_SESSION['USER_NAME'] ?></b>
      </span>&nbsp;
      </a>
    </div>
  </div>
</nav>
   
