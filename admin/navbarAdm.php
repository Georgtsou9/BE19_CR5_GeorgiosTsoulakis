<?php
  
    require_once '../db_connect.php';
    
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["adm"]}";
   

    $result = mysqli_query($connect, $sql);
    

    $row = mysqli_fetch_assoc($result);
  
    $navbarAdm = "
    <nav class='navbar navbar-expand-lg bg-body-tertiary' data-bs-theme='dark'>
      <div class='container-fluid'>
        <a class='navbar-brand' href='dashboard.php'>Animal Adopt</a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNav'>
          <ul class='navbar-nav'>
            <li class='nav-item'>
              <a class='nav-link active' aria-current='page' href='dashboard.php'>Home</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link active' href='create.php'>New Pet</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class='bg-body-tertiary myflex1' data-bs-theme='dark'>
    <div>
        <img src='../login/images/{$row['image']}' alt='user pic' width='40' height='30'>
         <span>{$row['email']}</span>
    </div>
      
    
      <a class='nav-link' href='../login/logout.php?logout'>Logout</a >
    </div>
    
    ";

    