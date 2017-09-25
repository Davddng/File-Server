<?php
include 'database.php';

$sort = $_POST['sort'];
// $page = $_POST['page'];
$dir = $_POST['dir'];

//$files = array_filter($_FILES['upload']['name']); something like that to be used before processing files.
// Count # of uploaded files in array
$total = count($_FILES['uploads']['name']);

// Loop through each file
for($i=0; $i<$total; $i++) {
  //Get the temp file path
  $tmpFilePath = $_FILES['uploads']['tmp_name'][$i];

  $fileExt = strtolower(pathinfo($_FILES['uploads']['name'][$i], PATHINFO_EXTENSION));
  $fileType = "file";

  if($fileExt == "png" || $fileExt == "jpeg" || $fileExt == "jpg" || $fileExt == "gif" || $fileExt == "bmp"){
    $fileType = "image";
  }elseif($fileExt == "aif" || $fileExt == "iff" || $fileExt == "m3u" || $fileExt == "m4a" || $fileExt == "mid" || $fileExt == "mp3" || $fileExt == "flac" || $fileExt == "wav" || $fileExt == "wma"){
    $fileType = "audio";
  }elseif($fileExt == "mp4" || $fileExt == "3gp" || $fileExt == "avi" || $fileExt == "flv" || $fileExt == "m4v" || $fileExt == "mov" || $fileExt == "mpg" || $fileExt == "wmv"){
    $fileType = "video";
  }else{
    $fileType = "file";
  }

  //Make sure we have a filepath
  if ($tmpFilePath != ""){
    //Setup our new file path
      $cleanFilename = str_replace("%20"," ",$_FILES['uploads']["name"][$i]);
      $newFilename = $dir.'/'.$cleanFilename;

    $newFilename = checkFile($newFilename);
    if(pathinfo($newFilename, PATHINFO_EXTENSION) == ""){
      $newFilename .= ".file";
    }
    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilename)) {
      //Handle other code here
      addToDatabase($newFilename, $fileType);
      header('Location: file.php?dir='.$dir.'&sort='.$sort);

    }else{
      echo("ERROR UPLOAD FAIL<br>");
      echo('<a href="file.php?dir='.$dir.'&sort='.$sort.'">Click here to go back</a>');
    }
  }else{
    echo("ERROR EMPTY FILE PATH<br>");
    echo('<a href="file.php?dir='.$dir.'&sort='.$sort.'">Click here to go back</a>');
  }
}



?>
