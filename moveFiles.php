<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<?php

include 'database.php';

  if(!isset($_POST['targetDir'])){
    header("Location: mainpage.php");
  }else{
    $targetDir = $_POST['targetDir'];
    if(substr($targetDir, -1) != "/"){
      $targetDir .= "/";
    }
    if(substr($targetDir, 0, 1) == "/"){
      $targetDir = substr($targetDir, 1, strlen($targetDir)-1);
    }
  }

  if(substr($targetDir, 0, 8) != "Uploads/" || !is_dir($targetDir)){
    echo($targetDir);
    echo("<p>Is an Invalid Target Directory!</p>");
    echo("<a href='file.php?dir=".$_POST["dir"]."&sort=".$_POST["sort"]."&page=".$_POST["page"]."'>Go Back</a>");
  }else{

    if(!isset($_POST['dir']) || !isset($_POST['sort']) || !isset($_POST['page'])){
      echo("ERROR NO DIR");
    }else{

      if(isset($_POST['fileArr'])){

        $ex2 = json_decode($_POST['fileArr']);
        for($i=0; $i<25; $i++){
          if(isset($ex2[$i]) && $ex2[$i] != ""){
            // echo("<p>".$i.": ".$ex2[$i]."</p>");
            $fileName = explode("/", $ex2[$i]);
            $fileName = $fileName[sizeof($fileName)-1];

            echo("Old file: ".$ex2[$i]);
            echo("<br>");
            echo("New file: ".$targetDir.$fileName);
            echo("<br>");

            changeDir($ex2[$i], $targetDir.$fileName);
          }
        }

      header("Location: file.php?dir=".$_POST['dir']."&sort=".$_POST['sort']."&page=".$_POST['page']);
      }else{
        //ERROR

        echo("<p>Something has gone wrong!</p>");
        echo("<a href='mainpage.php'>Return to mainpage</a>");

      }
    }
  }

?>
