<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<title>Home Server</title>

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">
<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<?php include 'linkCSS.php'; ?>
<style type="text/css">
.slide0, .slide1, .slide2, .slide3, .slide4{
  background-image: url('images/0.jpg');
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  height: inherit;
}
.slide1{
  background-image: url('images/1.jpg');
}
.slide2{
  background-image: url('images/2.jpg');
}
.slide3{
  background-image: url('images/3.png');
}
.slide4{
  background-image: url('images/4.png');
}
</style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>

<?php include 'getFiles.php'; ?>
<?php include 'background.php'; ?>
<?php
  if(isset($_GET['sort'])){
    $sort = $_GET['sort'];
  }else{
    $sort = "timeSortDsc";
  }

  if(isset($_GET['dir'])){
    if($_GET['dir'] != ''){
      $dir = $_GET['dir'];
    }else{
      $dir = "Uploads";
    }
  }else{
    $dir = "Uploads";
  }

  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }else{
    $page = 0;
  }

  // if(isset($_GET['del'])){
  //   $del = "true";
  // }else{
  //   $del = "false";
  // }

  if(isset($_POST['search'])){
    $search = $_POST['search'];
  }else{
    $search = "";
  }

  if(isset($_POST['searchTerm'])){
    $searchTerm = $_POST['searchTerm'];
  }else{
    $searchTerm = "Advanced Search";
  }

  $dirExplode = explode('/', $dir);
  $currentDir = '';
  $dirPath = '';
  foreach($dirExplode as $i){
    // echo($i);
    // echo("/");
    $dirPath = $dirPath.$currentDir.'/';
    $currentDir = $i;
  }

?>

<div class="container">
  <nav class="navbar navbar-default navbar-fixed-bottom border">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand brandStyle" href="#">Welcome!</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle textColor" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sort By<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href='file.php?dir=<?php echo($dir); ?>&sort=nameSortAsc&page=<?php echo($page); ?>'>Name Asc</a></li>
              <li><a href='file.php?dir=<?php echo($dir); ?>&sort=nameSortDsc&page=<?php echo($page); ?>'>Name Desc</a></li>
              <li role="separator" class="divider"></li>
              <li><a href='file.php?dir=<?php echo($dir); ?>&sort=timeSortAsc&page=<?php echo($page); ?>'>Time Asc</a></li>
              <li><a href='file.php?dir=<?php echo($dir); ?>&sort=timeSortDsc&page=<?php echo($page); ?>'>Time Desc</a></li>
            </ul>
          </li>
          <li id="uploadBtn"><a href="#" class="textColor" role="button" data-toggle="modal" data-target="#uploadModal">Upload</a></li>
          <li id="folderBtn"><a href="#" class="textColor" role="button" data-toggle="modal" data-target="#folderModal">New Folder</a></li>
          <li><a href="#" id="selBtn" onclick="displaySelect()">Select</a></li>
          <li><a href="#" class="textColor" role="button" data-toggle="modal" data-target="#searchModal">Advanced Search</a></li>
        </ul>
        <div class="pull-right search">
          <form action="search.php" method="post" class="navbar-form navbar-right">
            <div class="input-group input-group-sm">
              <input type="text" class="form-control" name="searchTerm" placeholder="Search Files">
              <span class="input-group-btn"><button type="submit" class="btn btn-default">Search</button></span>
            </div>
          </form>
        </div>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>

<div class="container-fluid">
  <!-- Carousel slideshow -->
  <div class="row">
    <div id="theCarousel" class="carousel slide" data-ride="carousel">

      <!-- defining the carousel slides -->
      <ol class="carousel-indicators">
        <li data-target="#theCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#theCarousel" data-slide-to="1"></li>
        <li data-target="#theCarousel" data-slide-to="2"></li>
        <li data-target="#theCarousel" data-slide-to="3"></li>
        <li data-target="#theCarousel" data-slide-to="4"></li>
      </ol>

      <div class="carousel-inner"><div class="item active"><div class="slide0"></div></div>


        <div class="item"><div class="slide1"></div></div>
        <div class="item"><div class="slide2"></div></div>
        <div class="item"><div class="slide3"></div></div>
        <div class="item"><div class="slide4"></div></div>

      </div>


    <!-- backwards and forwards buttons! -->

      <a class="left carousel-control carouselButton" href="#theCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control carouselButton" href="#theCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>

    </div>
  </div>
  <div class="container">
    <div class="content">
      <div class="row">

      <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
      </div>

        <div class="col col-lg-10 col-md-10 col-sm-10 col-xs-10 text-center">
          <div class="jumbotron header">
            <script>
              console.log("<?php echo($dir);?>")
            </script>

            <?php

            if($dir != "Uploads"){
              echo("<a href='file.php?dir=".substr($dirPath, 1, strlen($dirPath)-2)."&sort=".$sort."&page=0'>");
            }else{
              echo("<a href='mainpage.php'>");
            }

            echo('<img class="pull-left" id="back" src="siteImages/back.png" alt="back"></a>');

            ?>
            <h1 id="headH1">
                <?php echo($currentDir); ?>
            </h1>
            <p id="headP">
              <?php echo($dir); ?>
            </p>
          </div>
        </div>

        <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
        </div>
      </div>


          <!-- Icons for file access -->
      <div class="row">
        <div class="icons">

          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon0" id="0">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon1" id="1">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon2" id="2">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon3" id="3">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon4" id="4">
          </div>
          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
          </div>

        </div>
      </div>

      <div class="row">
        <div class="icons">

          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon5" id="5">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon6" id="6">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon7" id="7">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon8" id="8">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon9" id="9">
          </div>
          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
          </div>

        </div>
      </div>

      <div class="row">
        <div class="icons">

          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon10" id="10">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon11" id="11">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon12" id="12">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon13" id="13">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon14" id="14">
          </div>
          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
          </div>

        </div>
      </div>

      <div class="row">
        <div class="icons">

          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon15" id="15">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon16" id="16">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon17" id="17">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon18" id="18">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon19" id="19">
          </div>
          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
          </div>

        </div>
      </div>

      <div class="row">
        <div class="icons">

          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon20" id="20">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon21" id="21">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon22" id="22">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon23" id="23">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2 icon24" id="24">
          </div>
          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
          </div>

        </div>
      </div>

      <!-- Prev/Next page buttons -->
      <div class="row">
        <div class="icons">

          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-">
          </div>
<!-- echo(substr($dirPath, 1, strlen($dirPath)-1).$currentDir); -->
          <div class="col col-lg-4 col-md-4 col-sm-4 col-xs-"id="prevPgBtn">
            <a href='file.php?dir=<?php echo($dir); ?>&sort=<?php echo($sort); ?>&page=<?php echo($page-1); ?>'>
              <div class="jumbotron hov file arrow">
                <span class="glyphicon glyphicon-chevron-left pull-left"></span>
                <p class="text-right">Previous Page</p>
              </div>
            </a>
          </div>

          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-">
          </div>

          <div class="col col-lg-4 col-md-4 col-sm-4 col-xs-" id="nextPgBtn">
            <a href='file.php?dir=<?php echo($dir); ?>&sort=<?php echo($sort); ?>&page=<?php echo($page+1); ?>'>
              <div class="jumbotron hov file arrow">
                <span class="glyphicon glyphicon-chevron-right pull-right"></span>
                <p class="text-left">Next Page</p>
              </div>
            </a>
          </div>

          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-">
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="uploadModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Files</h4>
      </div>
      <div class="modal-body">

        <form method="post" action="fileUpload.php" id="upload" enctype="multipart/form-data">
          <input type="file" id="uploads" name="uploads[]" multiple>
          <input type="hidden" name="dir" value="<?php echo($dir); ?>">
          <input type="hidden" name="sort" value="<?php echo($sort); ?>">
          <input type="hidden" name="page" value="<?php echo($page); ?>">
        </form>

        <div id="selectedFiles"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="upload()">Submit</button>
      </div>
    </div>

  </div>
</div>

<div id="searchModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Advanced Search</h4>
      </div>
      <div class="modal-body">
        <form id="advancedSearch" action="search.php" method="post">
          <div class="form-group">
            <div class="container-fluid removePadding">
              <p class="pull-left">Search by Time</p>
            </div>
            <div class="container-fluid">
              <div class="row">
                  <div class='input-group date datetimepicker1'>
                      <input type='text' class="form-control" name="startDate" placeholder="Start Date"/>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
              </div>
            </div>
            <br>
            <div class="container-fluid">
              <div class="row">
                <div class='input-group date datetimepicker1'>
                    <input type='text' class="form-control" name="endDate" placeholder="End Date"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>
            </div>
            <hr>
            <div class="container-fluid removePadding">
              <p class="pull-left">Search by Type</p>
            </div>
            <div class="container-fluid removePadding">
              <label class="checkbox-inline"><input type="checkbox" name="image" value="true">Image</label>
              <label class="checkbox-inline"><input type="checkbox" name="audio" value="true">Audio</label>
              <label class="checkbox-inline"><input type="checkbox" name="video" value="true">Video</label>
              <label class="checkbox-inline"><input type="checkbox" name="file" value="true">File</label>
            </div>
            <hr>
            <div class="container-fluid removePadding">
              <p class="pull-left">Search by Term</p>
            </div>
            <div class="container-fluid removePadding">
              <input type="text" class="form-control" name="searchTerm" placeholder="Search Files">
            </div>
          </div>
        </form>

    <script type="text/javascript">
        $(function () {
            $('.datetimepicker1').datetimepicker();
        });
    </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="advancedSearch()">Submit</button>
      </div>
    </div>
  </div>
</div>

<div id="folderModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Folder</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="newFolder.php" id="newFolder">
        <div class="input-group input-group-lg">

          <span class="input-group-addon">Folder Name</span>
          <input type="text" name="folderName" class="form-control" placeholder="New Folder">
          <input type="hidden" name="dir" value="<?php echo($dir); ?>">
          <input type="hidden" name="sort" value="<?php echo($sort); ?>">

        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="newFolder()">Submit</button>
      </div>
    </div>
  </div>
</div>

<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Files</h4>
      </div>
      <div class="modal-body">

        <p>Are you sure you want to delete:</p>
        <div class="fileList">
        </div>

        <form method="post" action="deleteFiles.php" id="deleteFiles">
          <input id="delete" type="hidden" name="fileArr">
          <input type="hidden" name="dir" value='<?php echo($dir);?>'>
          <input type="hidden" name="sort" value='<?php echo($sort);?>'>
          <input type="hidden" name="page" value='<?php echo($page);?>'>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="deleteFiles()">Submit</button>
      </div>
    </div>
  </div>
</div>

<div id="moveModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Move Files</h4>
      </div>


      <div class="modal-body">
        <p>Move Selected Files:</p>
        <div class="fileList">
        </div>

        <form method="post" action="moveFiles.php" id="moveFiles">
          <div class="input-group input-group-lg">
            <span class="input-group-addon">Target Directory</span>
            <input type="text" name="targetDir" class="form-control">
          </div>
          <input id="move" type="hidden" name="fileArr">
          <input type="hidden" name="dir" value='<?php echo($dir);?>'>
          <input type="hidden" name="sort" value='<?php echo($sort);?>'>
          <input type="hidden" name="page" value='<?php echo($page);?>'>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="moveFiles()">Submit</button>
      </div>
    </div>
  </div>
</div>









<script>

function deleteFiles(){
  $("#delete").attr("value", JSON.stringify(selArr));
  $("#deleteFiles").submit();
  // console.log(JSON.stringify(selArr));
}

function moveFiles(){
  $("#move").attr("value", JSON.stringify(selArr));
  $("#moveFiles").submit();
  // console.log(JSON.stringify(selArr));
}

function testfunc(){
  var ex = '[null,"Uploads/IMG_1401.JPG","Uploads/IMG_4477.JPG","Uploads/IMG_4481.JPG",null,null,null,"Uploads/IMG_1606.JPG"]';
  var ex2 = JSON.parse(ex);
  for(i=0; i<25; i++){
    if(typeof ex2[i] != "undefined" && typeof ex2[i] != "object"){
    console.log(i + ":" + ex2[i]);
    }
  }
}

function populateFileLists(){

  var newHTML = "<p>";


  for(i = 0; i < 25; i++){
    if(typeof selArr[i] != "undefined"){
        newHTML += selArr[i] + ", ";
    }
  }
  newHTML += "</p>";
  // console.log(newHTML);
  $(".fileList").html(newHTML);

}


// console.log("<?php echo($dir); ?>");

function replaceSpaces(path){
  return path.replace(/ /g , "%20");
}

function replaceBrackets(path){
  path = path.replace(/\(/g , "\\(");
  return path.replace(/\)/g , "\\)");
}

function restoreSpaces(path){
  return path.replace(/%20/g , " ");
}

  function imageElement(name, path){
    path = replaceSpaces(path);
    return (
    '<a class="img" href="'+path+'">'+
      '<div class="jumbotron hov image" style="background-image: url('+replaceBrackets(path)+')\;">'+
        '<p>'+name+'</p>'+
      '</div>'+
    '</a>'
    );
  }

  function folderElement(name, path){
    path = replaceSpaces(path);
    return (
    '<a class="fol" href="file.php?dir='+path+'">'+
      '<div class="jumbotron hov file">'+
        '<img class="folder" src="siteImages/folder.png">'+
        '<p>'+name+'</p>'+
      '</div>'+
    '</a>'
    );
  }

  function audioElement(name, path){
    path = replaceSpaces(path);
    return (
    '<a class="aud" href="'+path+'">'+
      '<div class="jumbotron hov file">'+
        '<img class="folder" src="siteImages/music.png">'+
        '<p>'+name+'</p>'+
      '</div>'+
    '</a>'
    );
  }

  function videoElement(name, path){
    path = replaceSpaces(path);
    return (
    '<a class="vid" href="'+path+'">'+
      '<div class="jumbotron hov file">'+
        '<img class="folder" src="siteImages/video.png">'+
        '<p>'+name+'</p>'+
      '</div>'+
    '</a>'
    );
  }

  function fileElement(name, path){
    path = replaceSpaces(path);
    return (
    '<a class="fil" href="'+path+'">'+
      '<div class="jumbotron hov file">'+
        '<img class="folder" src="siteImages/file.png">'+
        '<p>'+name+'</p>'+
      '</div>'+
    '</a>'
    );
  }

  if("<?php echo($search); ?>" != ""){
    var fileList = JSON.parse('<?php echo(str_replace("'", '"', $search)); ?>');
    $("#headH1").html('"'+"<?php echo($searchTerm); ?>"+'"');
    $("#headP").html("Search Results");
  }else{
    var fileList = JSON.parse('<?php echoList($dir, $sort); ?>');
  }
  var regex = /(?:\.([^.]+))?$/;
  // var ext = regex.exec(fileList[0].name)[1];
  if(typeof ext == "undefined"){
    var ext = "undefined";
  }
  // console.log("length:")
  // console.log(fileList.length)

  function backgroundReplace(){

    var backgrounds = JSON.parse('<?php echoImageDirs(); ?>');

    for(i=0; i<backgrounds.length; i++){

      var backgroundDir = backgrounds[i].dir;

      $('.slide'+i).attr("style", "background-image: url('"+backgroundDir+"');");

      console.log(backgroundDir);

    }

  }

  $(document).ready( function(){

    backgroundReplace();

    var nextPgDel = false;
    var prevPgDel = false;
      if("<?php echo($page); ?>" == 0){
        var prevPgDel = true;
      }
      // console.log(prevPg);

      var nextPgChk;
    for(i=<?php echo($page*25); ?>, j=0; i<fileList.length&&j<25; i++, j++){
      nextPgChk = j;
      var currentElement = fileList[i];
      var ext = regex.exec(currentElement.name)[1];

      if((typeof ext) != "undefined"){
        ext = ext.toLowerCase();
      }

      if(currentElement.name.length >11){
        var name = currentElement.name.substring(0, 11) + "...";
      }else{
        var name = currentElement.name;
      }

      if(currentElement.type == "folder"){
        $('#'+j).html(folderElement(name, currentElement.dir));
      }else if(ext == "png" || ext == "jpeg" || ext == "jpg" || ext == "gif" || ext == "bmp"){
        $('#'+j).html(imageElement(name, currentElement.dir));
      }else if(ext == "aif" || ext == "iff" || ext == "m3u" || ext == "m4a" || ext == "mid" || ext == "mp3" || ext == "flac" || ext == "wav" || ext == "wma"){
        $('#'+j).html(audioElement(name, currentElement.dir));
      }else if(ext == "mp4" || ext == "3gp" || ext == "avi" || ext == "flv" || ext == "m4v" || ext == "mov" || ext == "mpg" || ext == "wmv"){
        $('#'+j).html(videoElement(name, currentElement.dir));
      }else{
        $('#'+j).html(fileElement(name, currentElement.dir));
      }
    }

    if(nextPgChk != 24){
      nextPgDel = true;
    }

    if(nextPgDel){
      $('#nextPgBtn').html("");
    }

    if(prevPgDel){
      $('#prevPgBtn').html("");
    }

    // console.log(nextPg);

      // $("#test").html(fileList[0].name);
      // $(".1").html(imageElement("testFile", "userFiles/Pictures/testImage.jpg"));
      // console.log("ss");
      // console.log(fileElement("testFile"));
      // console.log("ss");
      // if(echo($del);){
      //   displayDelete();
      // }
    }
  )
  function upload(){
    console.log("test")
    $("#upload").submit();

  }

  function newFolder(){
    console.log("test")
    $("#newFolder").submit();

  }

  function advancedSearch(){
    console.log("test")
    $("#advancedSearch").submit();

  }


  var selDiv = "";

  // document.addEventListener("DOMContentLoaded", initialize, false);
  initialize();

  function initialize() {
      document.querySelector('#uploads').addEventListener('change', handleFileSelect, false);
      selDiv = document.querySelector("#selectedFiles");
  }

  function handleFileSelect(e) {

      if(!e.target.files) return;

      selDiv.innerHTML = "";

      var files = e.target.files;
      for(var i=0; i<files.length; i++) {
          var f = files[i];

          selDiv.innerHTML += f.name + "<br/>";

      }
  }

  var nameArr = [];
  var dirArr = [];

  // function displayDelete(){
  //   var tempName = "ERROR";
  //   var tempDir = "ERROR";
  //
  //   for(i = 0; i < 25; i++){
  //     tempName = "ERROR";
  //     tempDir = "ERROR";
  //     tempDir = $("#"+i+" a").attr("href");
  //     // console.log("test: "+tempDir);
  //     $("#"+i+" a").attr("href", "deleteFile.php?delDir="+tempDir+"&dir=<?php echo($dir); ?>&page=<?php echo($page); ?>&sort=<?php echo($sort); ?>");
  //     tempName = $("#"+i+" p").html();
  //     $("#"+i+" p").html("Delete");
  //     $("#"+i+" p").attr("style", "color: red;");
  //     nameArr[i] = tempName;
  //     dirArr[i] = tempDir;
  //   }
  //
  //
  //   $("#delBtn").attr("onclick", "restoreNames()");
  // }

  function restoreNames(){
    for(i = 0; i < 25; i++){

      $("#"+i+" a").attr("href", dirArr[i]);
      $("#"+i+" p").html(nameArr[i]);
      $("#"+i+" p").attr("style", "");
      // console.log(i);
    }
    $("#selBtn").attr("onclick", "displaySelect()");
    $("#selBtn").html("Select");


    navbarOriginal();
  }

  function displaySelect(){

    var tempName = "ERROR";
    var tempDir = "ERROR";

    for(i = 0; i < 25; i++){
        tempName = "ERROR";
        tempDir = "ERROR";
        tempDir = $("#"+i+" a").attr("href");
        dirArr[i] = tempDir;
        tempName = $("#"+i+" p").html();
        nameArr[i] = tempName;
        // if($("#"+i+" a").attr("class") != "fol"){
        // console.log("test: "+tempDir);
        $("#"+i+" a").attr("href", "#");
        $("#"+i+" a").attr("onclick", "selectElement()");
        $("#"+i+" p").html("Select");
        $("#"+i+" p").attr("style", "color: #4286f4; font-weight: bold;");
      // }else{
      //   continue;
      // }
    }

    $("#selBtn").attr("onclick", "restoreNames()");
    $("#selBtn").html("Cancel");
    selArr = [];


    navbarSelect();
  }

  var selArr = [];

  // selectElement();

  function selectElement(){

    // selArr = [];
    // var par = event.target.parent();
    // console.log(par.attr('id'));
    var id = null;
    var tagname = event.target.tagName.toUpperCase();
    // console.log(tagname);
    if(tagname == "P" || tagname == "IMG"){
      id = event.target.parentElement.parentElement.parentElement.getAttribute('id');
      console.log(id);
    }else{
      id = event.target.parentElement.parentElement.getAttribute('id');
      console.log(id);
    }
    $("#"+id+" p").html('<span class="glyphicon glyphicon-ok"></span>');
    $("#"+id+" p").attr("style", "color: green; font-weight: bold;");
    $("#"+id+" a").attr("onclick", "unselectElement()");

    if($("#"+id+" a").attr("class") == "fol"){
      selArr[id] = restoreSpaces(dirArr[id].substring(13));
    }else{
      selArr[id] = restoreSpaces(dirArr[id]);
    }
  }

  function unselectElement(){

    // selArr = [];
    // var par = event.target.parent();
    // console.log(par.attr('id'));
    var id = null;
    var tagname = event.target.tagName.toUpperCase();
    // console.log(tagname);
    if(tagname == "P" || tagname == "IMG"){
      id = event.target.parentElement.parentElement.parentElement.getAttribute('id');
      console.log(id);
    }else{
      id = event.target.parentElement.parentElement.getAttribute('id');
      console.log(id);
    }
    $("#"+id+" p").html("Select");
    $("#"+id+" p").attr("style", "color: #4286f4; font-weight: bold;");
    $("#"+id+" a").attr("onclick", "selectElement()");

    selArr[id] = null;
  }

  //function for changing navbar to display options for selected elements
  function navbarSelect(){

    $("#uploadBtn").html('<a href="#" class="textColor" role="button" data-toggle="modal" data-target="#deleteModal" onclick="populateFileLists()">Delete</a>');
    $("#folderBtn").html('<a href="#" class="textColor" role="button" data-toggle="modal" data-target="#moveModal" onclick="populateFileLists()">Move</a>');

  }

  //restores changes of navbar change function
  function navbarOriginal(){

    $("#uploadBtn").html('<a href="#" class="textColor" role="button" data-toggle="modal" data-target="#uploadModal">Upload</a>');
    $("#folderBtn").html('<a href="#" class="textColor" role="button" data-toggle="modal" data-target="#folderModal">New Folder</a>');

  }


</script>
<!-- Use downloaded version of Bootstrap -->
<script src="js/bootstrap.js"></script>
</body>
</html>
