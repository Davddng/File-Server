<?php

function addToDatabase($dir, $type){
include 'initializeSQL.php';

  $name = explode("/", $dir);

  $name = $name[sizeof($name)-1];

  if(getID($dir) != ""){
    continue;
  }

  $sql = "INSERT INTO uploadedfiles (NAME, DIR, TYPE, TIMESTMP) ".
   "VALUES ('".
   mysqli_real_escape_string($connection, $name)."', '".
   mysqli_real_escape_string($connection, $dir)."', '".
   mysqli_real_escape_string($connection, $type)."', '".
    mysqli_real_escape_string($connection, filemtime($dir))."');";
  //  mysqli_real_escape_string($connection, 3)."');";


  // $sql = "SELECT DIR, TYPE FROM uploadedfiles;";
  //
  $result = mysqli_query($connection, $sql);
  // $row = mysqli_fetch_row($result);

  // echo($row[0]);

  // $fileExt = pathinfo("omg.txt", PATHINFO_EXTENSION);
  // echo($fileExt);

   // echo($sql);

mysqli_close($connection);
}


function deleteFromDatabase($dir){
include 'initializeSQL.php';

  $sql = "DELETE FROM uploadedfiles WHERE ID=".getID($dir).";";
  mysqli_query($connection, $sql);

mysqli_close($connection);
}

function changeDir($dir, $targetDir){
  include 'initializeSQL.php';
  $id = getID($dir);

  $targetDir = checkfile($targetDir);

  $sql = "UPDATE uploadedfiles SET DIR = '".$targetDir."' WHERE ID = ".$id;
  mysqli_query($connection, $sql);
  rename($dir, $targetDir);

  mysqli_close($connection);
}

function checkIfExists($dir){
  if(getID($dir) == ""){
    return false;
  }else{
    return true;
  }
}

function checkfile($dir){

  if(checkIfExists($dir)){
    $nameExplode = explode(".", $dir);
    return checkfile($nameExplode[0]." -Copy.".$nameExplode[1]);
  }else{
    return $dir;
  }

}

function getID($dir){
include 'initializeSQL.php';

  $sql = "SELECT ID FROM uploadedfiles WHERE DIR= '".$dir."'";

  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_row($result);

  return $row[0];

mysqli_close($connection);
}

?>
