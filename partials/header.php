<?php
  include "/bh-cms/database/db.php";
  include "/bh-cms/coolFunctions.php";
  include "head.php";

  session_start();
  isLoggedIn();
  if(isset($_GET['delete_user_id'])) {
    $userId = $_GET['delete_user_id'];
    $query = "DELETE FROM users WHERE id = $userId";
    $result = mysqli_query($connection, $query);
    if(!$result) {
      die("query failed".mysqli_error($connection));
    }
  }
?>
  <body>
    <header>
      <div>
        <a href="views/users.php">Usuarios</a>
        <a href="/bh-cms/index.php">Artículos</a>
      </div>
      <div>
        <h3>Bienvenido <?php echo $_SESSION['userFirstName'];?></h3>
        <a href="/bh-cms/logout.php">Cerrar sesión</a>
      </div>
    </header>
