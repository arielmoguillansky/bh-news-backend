<?php
  include "./database/db.php";
  include "./coolFunctions.php";
  include "./partials/header.php";

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
  if(isset($_GET['delete_article_id'])) {
    $articleId = $_GET['delete_article_id'];
    $query = "DELETE FROM articles WHERE id = $articleId";
    $result = mysqli_query($connection, $query);
    if(!$result) {
      die("query failed".mysqli_error($connection));
    }
  }
  $query = "SELECT * FROM users";
  $result = mysqli_query($connection, $query);
  $articles_query = "
  SELECT p.id, p.text, p.linked_article, p.title, p.publish_date, p.category_id, p.country, c.cat_name as category
  FROM articles p
  LEFT JOIN categories c ON c.id = p.category_id";
  $articles_result = mysqli_query($connection, $articles_query);
?>

    <div class="main">
      <div class="articlesTable">
        <h2 class="title">Lista de noticias</h2>
        <table class="styled-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Título</th>
              <th>Texto</th>
              <th>Categoría</th>
              <th>País</th>
              <th>Enlace</th>
              <th>Fecha de publicación</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php  
              while($row = mysqli_fetch_assoc($articles_result)) {
                $articleId = $row['id'];
                $articleCatId = $row['category_id'];
                $articleText = $row['text'];
                $articleTitle = $row['title'];
                $articleCountry = $row['country'];
                $articlePublishedDate = $row['publish_date'];
                $articleLinks = $row['linked_article'];
                $articleCategory = $row['category'];
            ?>
                <tr onMouseOver="rowActive(this);" onMouseOut="rowInactive(this);">
                <td><?php echo $articleId; ?></td>
                <td><?php echo $articleTitle; ?></td>
                <td><?php echo $articleText; ?></td>
                <td><?php echo $articleCategory; ?></td>
                <td><?php echo $articleCountry; ?></td>
                <td><?php echo $articleLinks; ?></td>
                <td><?php echo $articlePublishedDate; ?></td>
                <td><a class="action"  href="article_edition.php?edit_article_id=<?php echo $articleId;?>">editar</a></td>
                <td><span class="action" onClick='showModal(<?php echo $articleId?>, "<?php echo $articleTitle?>", false);'>eliminar</span></td>
                </tr>
            <?php }?>
          </tbody>
        </table>
        <a class="addBtn" href="article_creation.php">+ Agregar Artículo</a>
      </div>
      <div class="modal" style="display:none;">
        <div class="modalContent" >
          <span>¿Está seguro que desea eliminar a <strong></strong> de la lista?</span>
          <div>
            <button class="confirm" onClick="deleteUser();">Eliminar</button>  
            <button class="cancel" onCLick="closeModal()">Cancelar</button>
          </div>
        </div>  
      </div>
      <div class="articleModal" style="display:none;">
        <div class="modalContent" >
          <span>¿Está seguro que desea eliminar a <strong></strong> de la lista?</span>
          <div>
            <button class="confirm" onClick="deleteArticle();">Eliminar</button>  
            <button class="cancel" onCLick="closeArticleModal()">Cancelar</button>
          </div>
        </div>  
      </div>
    </div>
  </body>
  <?php include "./partials/footer.php";?>
  