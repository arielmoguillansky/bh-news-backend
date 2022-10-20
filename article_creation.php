<?php
    include "./coolFunctions.php";
    include "./partials/header.php";
    session_start();
    isLoggedIn();
    $categories = mysqli_query($connection, getAllCategories());
  if(isset($_POST['submit'])) {
    include "./database/db.php";

    $articleTitle = mysqli_real_escape_string($connection, $_POST['title']);
    $articleText = mysqli_real_escape_string($connection, $_POST['text']);
    $articleCountry = mysqli_real_escape_string($connection, $_POST['country']);
    $articleLink = mysqli_real_escape_string($connection, $_POST['links']);
    $articleCategory = mysqli_real_escape_string($connection, $_POST['category']);

    $query = "INSERT INTO articles(id, title, text, country, category_id, linked_article, publish_date)";
    $query .= "VALUES(null, '$articleTitle', '$articleText', '$articleCountry', '$articleCategory','$articleLink', now())";
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
          <div>Artículo creado con éxito</div>
          <a href="index.php">Volver</a>
        <?php
          } else {
        ?>
        <form action="" method="post">
          <div class="formGroup">
            <label>Título *
              <input type="text" placeholder="Título noticia" name="title"/>
            </label>
          </div>
          <div class="formGroup">
            <label>Texto *
              <textarea type="text" name="text" maxlength="255" rows="6" cols="50"></textarea>
            </label>
          </div>
          <div class="formGroup">
            <label>Enlace a nota *
              <input type="text" name="links"/>
            </label>
          </div>
          <div class="formGroup">
            <label>País *
              <input type="text" placeholder="Argentina" name="country"/>
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
          <input class="submitBtn" type="submit" name="submit" value="Crear Artículo">
          <a href="index.php">Cancelar</a>
        </form>
        <?php
          }
        ?>
      </div>
    </div>
  <?php include "./partials/footer.php";?>