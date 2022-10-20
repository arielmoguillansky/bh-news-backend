<?php
    include "./database/db.php";
    include "./coolFunctions.php";
    include "./partials/header.php";
    session_start();
    isLoggedIn();
    if(isset($_GET['edit_article_id'])) {
      $categories = mysqli_query($connection, getAllCategories());
      $articleId = $_GET['edit_article_id'];
      if($articleId) {
        $article = mysqli_query($connection, getArticleById($articleId));
        while($row = mysqli_fetch_assoc($article)) {
          $articleTitle = $row['title'];
          $articleText = $row['text'];
          $articleCountry = $row['country'];
          $articleLink = $row['linked_article'];
          $articleCategory = $row['category_id'];
        }
        if(!$article) {
          die("query failed".mysqli_error($connection));
        }
      }
    }
  if(isset($_POST['submit'])) {
    $articleTitle = mysqli_real_escape_string($connection, $_POST['title']);
    $articleText = mysqli_real_escape_string($connection, $_POST['text']);
    $articleCountry = mysqli_real_escape_string($connection, $_POST['country']);
    $articleLink = mysqli_real_escape_string($connection, $_POST['links']);
    $articleCategory = mysqli_real_escape_string($connection, $_POST['category']);

    $query = "UPDATE articles set 
      title = '{$articleTitle}', 
      text = '{$articleText}', 
      country = '{$articleCountry}', 
      linked_article = '{$articleLink}', 
      category_id = '{$articleCategory}'
      WHERE id = $articleId
    ";
    $result = mysqli_query($connection, $query);
    if(!$result) {
      die("query failed".mysqli_error($connection));
    }
  }
?>

    <div class="main">
      <h2>Formulario de creación</h2>
      <div class="form loginForm">
        <?php
          if($result) {
        ?>
          <div>Artículo editado con éxito</div>
          <a href="index.php">Volver</a>
        <?php
          } else {
        ?>
        <form action="" method="post">
          <div class="formGroup">
            <label>Título *
              <input type="text" placeholder="Título noticia" name="title" value="<?php echo $articleTitle;?>"/>
            </label>
          </div>
          <div class="formGroup">
            <label>Texto *
              <textarea type="text" name="text" maxlength="255" rows="6" cols="50"><?php echo $articleText;?></textarea>
            </label>
          </div>
          <div class="formGroup">
            <label>Enlace a nota *
              <input type="text" name="links" value="<?php echo $articleLink;?>"/>
            </label>
          </div>
          <div class="formGroup">
            <label>País *
              <input type="text" placeholder="Argentina" name="country" value="<?php echo $articleCountry;?>"/>
            </label>
          </div>
          <div class="formGroup">
            <label for="category">Categoría
            <select name="category" id="">
              <?php  
                while($row = mysqli_fetch_assoc($categories)) {
                  $categoryId = $row['id'];
                  $categoryName = $row['cat_name'];
              ?>
                <option value=<?php echo $categoryId;?> <?php if($categoryId === $articleCategory):?> selected <?php endif; ?>><?php echo $categoryName; ?></option>";
              <?php }?>
            </select>
            </label>
          </div>
          <input class="submitBtn" type="submit" name="submit" value="Editar Artículo">
          <a href="index.php">Cancelar</a>
        </form>
        <?php
          }
        ?>
      </div>
    </div>
  <?php include "./partials/footer.php";?>