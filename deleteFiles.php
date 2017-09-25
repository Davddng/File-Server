<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<?php

include 'database.php';

  if(!isset($_POST['dir']) || !isset($_POST['sort']) || !isset($_POST['page'])){
    echo("ERROR NO DIR");
  }else{

    if(isset($_POST['fileArr'])){
      //handle file deletion

      $ex2 = json_decode($_POST['fileArr']);
      for($i=0; $i<25; $i++){
        if(isset($ex2[$i]) && $ex2[$i] != ""){
          // echo("<p>".$i.": ".$ex2[$i]."</p>");
          deleteFile($ex2[$i]);
        }
      }

    }else{
      //ERROR

      echo("<p>Something has gone wrong!</p>");
      echo("<a href='mainpage.php'>Return to mainpage</a>");

    }
    header("Location: file.php?dir=".$_POST['dir']."&sort=".$_POST['sort']."&page=".$_POST['page']);
  }

function deleteFile($delDir){

  if(pathinfo($delDir, PATHINFO_EXTENSION) == ""){

    rmdir($delDir);
    deleteFromDatabase($delDir);

  }else{

    unlink($delDir);
    deleteFromDatabase($delDir);

  }

}

?>
