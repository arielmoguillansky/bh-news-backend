<?php
    include "../database/db.php";
    include "../coolFunctions.php";
    include "../partials/header.php";

    session_start();
    isLoggedIn();
    if(isset($_GET['edit_user_id'])) {      
      $userId = $_GET['edit_user_id'];
      if($userId) {
        $user = mysqli_query($connection, getUserById($userId));
        while($row = mysqli_fetch_assoc($user)) {
          $userFirstName = $row['user_name'];
          $userEmail = $row['email'];
        }
        if(!$user) {
          die("query failed".mysqli_error($connection));
        }
      }
    }
  if(isset($_POST['submit'])) {
    $userFirstName = mysqli_real_escape_string($connection, $_POST['firstName']);
    $userEmail = mysqli_real_escape_string($connection, $_POST['email']);
    $query = "UPDATE users set 
      user_name = '{$userFirstName}', 
      email = '{$userEmail}'
      WHERE id = $userId
    ";
    $result = mysqli_query($connection, $query);
    if(!$result) {
      die("query failed".mysqli_error($connection));
    }
  }
?>
  <div class="main">
    <h2>Formulario de edición</h2>
    <div class="form loginForm">
    <?php
          if($result) {
        ?>
          <div>Se han actualizado los datos con éxito</div>
          <a href="users.php">Volver</a>
        <?php
          } else {
        ?>
      <form action="" method="post">
        <div class="formGroup">
          <label>Email *
            <input onBlur="inputEmailValidation(this);" type="text" placeholder="e.g:nombre@mail.com" name="email" value="<?php echo $userEmail;?>">
            <span class="errorMsg validationEmailMsg" style="display: none;">Formato inválido de email</span>
          </label>
        </div>
        <div class="formGroup">
          <label>Nombre *
            <input type="text" placeholder="e.g:Juan" name="firstName" value="<?php echo $userFirstName;?>">
          </label>
        </div>
        <input class="submitBtn" type="submit" name="submit" value="Grabar">
        <span class="successMsg"><?php echo $successMsg;?></span>
        <a href="users.php">Cancelar</a>
      </form>
      <?php
          }
        ?>
    </div>
  </div>
</body>
</html>