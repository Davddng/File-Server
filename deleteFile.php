<!-- <p id="test" testAttr="test"></p> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<?php
include 'database.php';

  if(!isset($_GET['delDir']) || !isset($_GET['dir']) || !isset($_GET['sort']) || !isset($_GET['page'])){
    echo("ERROR NO DIR");
  }else{
    // echo($_GET['delDir']."<br>");
    // echo($_GET['dir']."<br>");
    // echo($_GET['sort']."<br>");
    // echo($_GET['page']);

    if(pathinfo($_GET['delDir'], PATHINFO_EXTENSION) == ""){

      rmdir(substr($_GET['delDir'], 13));
      deleteFromDatabase($_GET['delDir']);

      header("Location: file.php?dir=".$_GET['dir']."&sort=".$_GET['sort']."&page=".$_GET['page']."&del=true");

    }else{

      unlink($_GET['delDir']);
      deleteFromDatabase($_GET['delDir']);

      header("Location: file.php?dir=".$_GET['dir']."&sort=".$_GET['sort']."&page=".$_GET['page']."&del=true");

    }
  }

?>


<!-- <script>

console.log($("#test").attr("testAttr"));

</script> -->
