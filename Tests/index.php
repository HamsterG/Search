<?php
  include 'header.php';
 ?>

<form action="search.php" method="POST">
  <input type="text" name="search" placeholder="Search...">
  <input type="submit" name="submit-search">
</form>

<h1>Front page</h1>
<h2>All articals</h2>
<div class="artical-container">
  <?php
      $sql = "SELECT * FROM article";
      $result = mysqli_query($conn, $sql);
      $queryResults = mysql_num_rows($result);

      if($queryResults > 0) {
        while($row = mysqli_fetch_assoc($result)){
          echo "<div>
            <h3>".$row['a_title']."</h3>
            <p>".$row['a_text']."</p>
            <p>".$row['a_date']."</p>
            <p>".$row['a_auther']."</p>
              </div>";
        }

      }
   ?>
</div>
  </body>
</html>
