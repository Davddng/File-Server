
<?php

$dir = "testFolder";

function getDirectoryContents($dir){
// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){

    $jsonArr = array();
    $counter = 0;
    while (($file = readdir($dh)) !== false){
      if ($file != "." && $file != ".."){
        $fullDir = $dir."/".$file;
        if(is_dir($fullDir)){
          array_push($jsonArr,
            array(
              "type" => "folder",
              "name" => $file,
              "dir" => $fullDir,
              "time" => filectime($fullDir)
            )
          );
        }else{
          $fullDir = $dir."/".$file;
          array_push($jsonArr,
            array(
              "type" => "file",
              "name" => $file,
              "dir" => $fullDir,
              "time" => filectime($fullDir)
            )
          );
        }

      }
      $counter++;
    }
    closedir($dh);
  }
}

return json_encode($jsonArr);

}

function nameSortAsc($a, $b){
  if($a["type"] == "folder" && $b["type"] == "file"){
    return -1;
  }elseif($a["type"] == "file" && $b["type"] == "folder") {
    return 1;
  }elseif(($a["type"] == "folder" && $b["type"] == "folder") || ($a["type"] == "file" && $b["type"] == "file")){
    return strcasecmp($a["name"], $b["name"]);
  }
}
function nameSortDsc($a, $b){
  if($a["type"] == "folder" && $b["type"] == "file"){
    return -1;
  }elseif($a["type"] == "file" && $b["type"] == "folder") {
    return 1;
  }elseif(($a["type"] == "folder" && $b["type"] == "folder") || ($a["type"] == "file" && $b["type"] == "file")){
    return strcasecmp($b["name"], $a["name"]);
  }
}

function timeSortAsc($a, $b){
  if($a["type"] == "folder" && $b["type"] == "file"){
    return -1;
  }elseif($a["type"] == "file" && $b["type"] == "folder") {
    return 1;
  }elseif(($a["type"] == "folder" && $b["type"] == "folder") || ($a["type"] == "file" && $b["type"] == "file")){
    return strcasecmp($a["time"], $b["time"]);
  }
}
function timeSortDsc($a, $b){
  if($a["type"] == "folder" && $b["type"] == "file"){
    return -1;
  }elseif($a["type"] == "file" && $b["type"] == "folder") {
    return 1;
  }elseif(($a["type"] == "folder" && $b["type"] == "folder") || ($a["type"] == "file" && $b["type"] == "file")){
    return strcasecmp($b["time"], $a["time"]);
  }
}

function returnList($dir, $sortType){
  $JSONString = getDirectoryContents($dir);
  // echo($JSONString."</br>");
  $newArr = json_decode($JSONString, true);

  // echo($newArr[0]["name"]);

  usort($newArr, $sortType);

  return $newArr;
  // echo(json_encode($newArr));
}
function echoList($dir, $sortType){
  // echo('{"files":'json_encode(returnList($dir, $sortType)).'}');
  echo(json_encode(returnList($dir, $sortType)));

}

?>

<?php

 // echo(returnList("testFolder", "timeSortDsc")[5]["name"]);
 // echoList("testFolder", "timeSortDsc");

?>
