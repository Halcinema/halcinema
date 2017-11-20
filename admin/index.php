<?php
include("login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "ダッシュボード";
?>
<!DOCTYPE html>
<?php include("../head.php"); ?>
<body>
    <div id="wrapper">
     <?php include("common.php"); ?>
        <div id="main">
              <h3><a href="add_movie.php">映画追加</a></h3>
        </div>
    </div>
</body>
</html>
