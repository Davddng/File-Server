<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<?php

if(isset($_POST['mainpage'])){
  $searchTerm = $_POST['mainpage'];
}else{
  $searchTerm = $_POST['searchTerm'];
}

if(isset($_POST['startDate'])){
  if($_POST['startDate'] != ""){
    $GLOBALS['startDate'] = $_POST['startDate'];
  }else{
    $GLOBALS['startDate'] = "";
  }
}else{
  $GLOBALS['startDate'] = "";
}

if(isset($_POST['endDate'])){
  if($_POST['endDate'] != ""){
    $GLOBALS['endDate'] = $_POST['endDate'];
  }else{
    $GLOBALS['endDate'] = "";
  }
}else{
  $GLOBALS['endDate'] = "";
}

function echoSearch(){
  include 'initializeSQL.php';

    $jsonArr = array();
    // echo($_POST['searchTerm']."<br>");

    // $sql = "SELECT NAME, DIR, TYPE, TIMESTMP FROM uploadedfiles WHERE NAME LIKE ".$_POST['searchTerm'];
    // $sql = "SELECT NAME, DIR, TYPE, TIMESTMP FROM uploadedfiles WHERE NAME LIKE '%".$_POST['searchTerm']."%'";

    $sql = getSql();

    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_row($result)){
      array_push($jsonArr,
        array(
          "name" => $row[0],
          "dir" => $row[1],
          "type" => $row[2],
          "time" => $row[3]
        )
      );
      // echo($row[0]);
    }

  echo(str_replace('"', "'", json_encode($jsonArr)));

  mysqli_close($connection);
}

function getSql(){

  $counter = false;
  $sql = "SELECT NAME, DIR, TYPE, TIMESTMP FROM uploadedfiles WHERE";

  if($_POST['searchTerm'] != ""){

  $sql .= " " . nameSearch();
  $counter = true;
  }

  if($GLOBALS['startDate'] != "" || $GLOBALS['endDate'] != ""){

    if($counter){
      $sql .= " AND ";
    }else{
      $sql .= " ";
      $counter = true;
    }

    $sql .= timeSearch();

  }

  if(isset($_POST['image']) || isset($_POST['audio']) || isset($_POST['video']) || isset($_POST['file'])){

    if($counter){
      $sql .= " AND ";
    }else{
      $sql .= " ";
      $counter = true;
    }

    $sql .= typeSearch();

  }

  return $sql;

}

function nameSearch(){

  return "NAME LIKE '%".$_POST['searchTerm']."%'";

}

function timeSearch(){

  $temp = "";
  $tempCounter = false;

    if($GLOBALS['startDate'] != ""){

      $val = $GLOBALS['startDate'];
      $date = date_create_from_format("m/d/Y g:i A", $val, timezone_open("America/Denver"));
      $val = date_timestamp_get($date);
      // echo($val);

      $temp .= "TIMESTMP > ".$val;
      $tempCounter = true;
    }

    // if(isset($_POST['endDate'])){
    if($GLOBALS['endDate'] != ""){
      // echo($_POST['endDate']);
      if($tempCounter){
        $temp .= " AND ";
      }else{
        $counter = true;
      }
      $val = $GLOBALS['endDate'];
      $date = date_create_from_format("m/d/Y g:i A", $val, timezone_open("America/Denver"));
      $val = date_timestamp_get($date);

      $temp .= "TIMESTMP < ".$val;
    }

  return $temp;

}

function typeSearch(){

  $temp = "(";
  $tempCounter = false;

    if(isset($_POST['image'])){

      $temp .= "TYPE = 'image'";
      $tempCounter = true;
    }

    if(isset($_POST['audio'])){

      if($tempCounter){
        $temp .= " OR ";
      }else{
        $tempCounter = true;
      }

      $temp .= "TYPE = 'audio'";
    }

    if(isset($_POST['video'])){

      if($tempCounter){
        $temp .= " OR ";
      }else{
        $tempCounter = true;
      }

      $temp .= "TYPE = 'video'";
    }

    if(isset($_POST['file'])){

      if($tempCounter){
        $temp .= " OR ";
      }else{
        $tempCounter = true;
      }

      $temp .= "TYPE = 'file'";
    }

  $temp .= ")";
  return $temp;

}
// echoSearch();
?>

<form id="form" action="file.php" method="post">
  <input type="hidden" name="search" value="<?php echoSearch(); ?>">
  <input type="hidden" name="searchTerm" value="<?php echo($searchTerm); ?>">
  <!-- <input type="submit"> -->
</form>

<script>
$(window).on("load", function(){
  $("#form").submit();
});
</script>
