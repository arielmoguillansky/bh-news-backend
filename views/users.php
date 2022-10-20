<?php
  include "../database/db.php";
  include "../coolFunctions.php";
  include "../partials/header.php";

  $query = "SELECT * FROM users";
  $result = mysqli_query($connection, $query);

?>

    <div class="main">
      <div class="usersTable">
        <h2 class="title">Lista de usuarios</h2>
        <table class="styled-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Email</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php  
              while($row = mysqli_fetch_assoc($result)) {
                $userId = $row['id'];
                $userFirstName = $row['user_name'];
                $email = $row['email'];
                $creationDate = $row['creation_date'];
                $userAge = $row['age'];
            ?>
                <tr onMouseOver="rowActive(this);" onMouseOut="rowInactive(this);">
                <td><?php echo $userId; ?></td>
                <td><?php echo $userFirstName; ?></td>
                <td><?php echo $email; ?></td>
                <td><a class="action"  href="user_edition.php?edit_user_id=<?php echo $userId;?>">editar</a></td>
                <td><span class="action" onClick='showModal(<?php echo $userId?>, "<?php echo $userFirstName?>");'>eliminar</span></td>
                </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
      <div class="modal" style="display:none;">
        <div class="modalContent" >
          <span>¿Está seguro que desea eliminar a <strong></strong> de la lista?</span>
          <div>
            <button class="confirm" onClick="deleteUser();">Eliminar</button>  
            <button class="cancel">Cancelar</button>
          </div>
        </div>  
      </div>
    </div>
  <?php include "../partials/footer.php";?>
  