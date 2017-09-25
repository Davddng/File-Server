<?php
// echoImageDirs();
function echoImageDirs(){
  include 'initializeSQL.php';

    $sql = "SELECT DIR FROM uploadedfiles WHERE TYPE = 'image' ORDER BY RAND() LIMIT 5";
    $result = mysqli_query($connection, $sql);
    // $row = mysqli_fetch_row($result);
    $jsonArr = array();

    while($row = mysqli_fetch_row($result)){
      array_push($jsonArr,
        array(
          "dir" => $row[0],
        )
      );
      // echo($row[0]);
    }

    echo(json_encode($jsonArr));

  mysqli_close($connection);
}
?>
