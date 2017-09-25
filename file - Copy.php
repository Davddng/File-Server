<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<title>Home Server</title>

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<style type="text/css">
.main-text h1, h2, h3, h4, p{
  text-align: center;
  font-family: 'Open Sans Condensed', sans-serif;
  padding-bottom: .4em;
  font-size: 6vh;
}
.main-text p{
  font-size: 5vh;
}
.item{
  height: 100vh;
}
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
.carousel-caption h1{
  font-size: 5.4em;
  font-family: 'Open Sans Condensed', sans-serif;
  padding-bottom: .4em;
}
.carousel-caption p{
  font-size: 2em;
}
.navbar{
  background-color: #F1F1F1;
}
.brandStyle{
  width: 160px;
  margin-bottom: 5px;
  padding-top: 10px;
}
.border{
  width: 90%;
  margin: auto;
  border-style: solid;
  border-width: 1px;
  border-bottom: 0px;
  border-color: black;
  border-radius: 7px 7px 0px 0px;
}
.search{
  width: 200px;
  margin-top: 5px;
}
.icons{
  padding: 0px;
}
.jumbotron{
  color: white;
  margin-top: 4vh;
  margin-bottom: 0px;
  width: 100%;
  padding: 0px;
  border-radius: 8px;
  background: rgba(0,0,0,0.2);
  height: 150px;
}
.hov:hover{
  background: rgba(0,0,0,0.4);
}
.jumbotron p{
  font-family: 'Open Sans Condensed', sans-serif;
  font-size: 50pt;
  font-weight: 100;
  color: white;
}
.header{
  height: 130px;
  padding-left: 40px !important;
  margin: 0px;
}
.header img{
  height: 100%;
  width: 100px;
}
.everythingButton{
  margin-top: 0px;
}
.textColor{
  color: red;
}
.statistics{
  margin-top: 50px;
}
.carouselButton{
  z-index: 2;
  width: 80px;
}
html, body{
  height: 100vh;
  width: 100vw;
  max-width: 100%;
}
.content{
  position: fixed;
  top: 0px;
  left: 0px;
  width: 100vw;
}
.content p{
  font-size: 20pt;
}
.folder{

}
.image{
  background-size: cover;
  background-repeat: no-repeat;
  background-position: 50% 50%;
  padding-left: 0px !important;
}
.image p{
  position: absolute;
  bottom: 0;
  margin-bottom: 0px;
  margin-left: 5px;
  padding-bottom: 0px;
}
.file{
  height: 150px;
  padding: 0px !important;
  z-index: 1000;
}
.file img{
  display: block;
  margin: auto;
  padding-top: 5%;
  max-height: 76%;
  background: rgba(0, 0, 0, 0);
  border: none;
  max-width: 100%;
}
.file p{
  position: absolute;
  bottom: 0;
  margin-bottom: 0px;
  margin-left: 5px;
  padding-bottom: 0px;
}
.arrow{
  margin-top: 2vh;
  height: 70px;
}
.arrow span{
  font-size: 50pt;
}
.arrow p{
  width: 100%;
  padding-right: 40px;
  font-size: 40pt;
}
</style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<?php include 'getFiles.php'; ?>
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

        <a class="navbar-brand brandStyle" href="#">Welcome<br>User!</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="#" class="textColor" role="button" data-toggle="modal" data-target="#myModal">Upload</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle textColor" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Logout</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Forgot Username/Password</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">User Profile</a></li>
              <li><a href="#">Settings</a></li>
            </ul>
          </li>
          <li><a class="textColor" href="#">Advanced Search</a></li>
        </ul>
        <div class="pull-right search">
        <form class="navbar-form navbar-right">
          <div class="input-group input-group-sm">

            <input type="text" class="form-control" placeholder="Search Files">
            <span class="input-group-btn"><button class="btn btn-default">Search</button></span>
          </div>
          </div>
        </form>
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
            <a href='#'><img class="pull-left" id="back" src="siteImages/back.png"></a>
            <h1>
                <?php
                $dirExplode = explode('/', $_GET['dir']);
                $currentDir = '/';
                $dirPath = '';
                foreach($dirExplode as $i){
                  $dirPath = $dirPath.$currentDir;
                  $currentDir = $i;
                }
                if($dirPath != '/'){
                  $dirPath = $dirPath.'/';
                }

                echo($currentDir);
                ?>
            </h1>
            <p>
              <?php echo($dirPath); ?>
            </p>
          </div>
        </div>

        <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
        </div>
      </div>



        <!-- Icons for file access -->
        <div class="row">
        <div class="icons">

          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-">
          </div>

          <?php
            if(isset($_GET['sort'])){
              $sort = $_GET['sort'];
            }else{
              $sort = "timeSortDsc";
            }

            if(isset($_GET['dir'])){
              $dir = $_GET['dir'];
            }else{
              $dir = "testFolder";
            }
          ?>

          <script>

            function imageElement(name, path){
              return
              '<a href="#">'+
                '<div class="jumbotron hov image" style="background-image: url('+path+')\;">'+
                  '<p>'+name+'</p>'+
                '</div>'+
              '</a>';
            }

            function folderElement(name){
              return
              '<a href="#">'+
                '<div class="jumbotron hov file">'+
                  '<img class="folder" src="siteImages/folder.png">'+
                  '<p>'+name+'</p>'+
                '</div>'+
              '</a>';
            }

            function audioElement(name){
              return
              '<a href="#">'+
                '<div class="jumbotron hov file">'+
                  '<img class="folder" src="siteImages/music.png">'+
                  '<p>'+name+'</p>'+
                '</div>'+
              '</a>';
            }

            function videoElement(name){
              return
              '<a href="#">'+
                '<div class="jumbotron hov file">'+
                  '<img class="folder" src="siteImages/video.png">'+
                  '<p>'+name+'</p>'+
                '</div>'+
              '</a>';
            }

            function fileElement(name){
              return
              '<a href="#">'+
                '<div class="jumbotron hov file">'+
                  '<img class="folder" src="siteImages/file.png">'+
                  '<p>'+name+'</p>'+
                '</div>'+
              '</a>';
            }

          </script>

          <script>

            var fileList = JSON.parse('<?php echoList($dir, $sort); ?>');

            var regex = /(?:\.([^.]+))?$/;
            var ext = regex.exec(fileList[0].name)[1];
            if(typeof ext == "undefined"){
              var ext = "undefined";
              console.log("true");
            }else{
              console.log(typeof ext);
            }

            $(document).ready( function(){
                // $("#test").html(fileList[0].name);
                $("#test").html(ext);
              }
            )

          </script>

          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="#">
                <div class="jumbotron hov file">
                  <img class="folder" src="siteImages/folder.png">
                  <p id="test">Folder Name</p>
                </div>
            </a>
          </div>

          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="testFolder/TestFolder2/Anothe testFolder/00YVWAu.jpg">
              <div class="jumbotron hov image" style="background-image: url(testFolder/TestFolder2/Anothe%20testFolder/00YVWAu.jpg);">
                <p>00YVWAu.jpg</p>
              </div>
            </a>
          </div>

          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="#">
                <div class="jumbotron hov file">
                  <img class="folder" src="siteImages/music.png">
                  <p>Audio Title</p>
                </div>
            </a>
          </div>

          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="#">
                <div class="jumbotron hov file">
                  <img class="folder" src="siteImages/video.png">
                  <p>Video Title</p>
                </div>
            </a>
          </div>

          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="#">
                <div class="jumbotron hov file">
                  <img class="folder" src="siteImages/file.png">
                  <p>File Name</p>
                </div>
            </a>
          </div>

          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-">
          </div>

        </div>
      </div>

      <!-- Prev/Next page buttons -->
      <div class="row">
        <div class="icons">

          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-">
          </div>

          <div class="col col-lg-4 col-md-4 col-sm-4 col-xs-">
            <a href="#">
              <div class="jumbotron hov file arrow">
                <span class="glyphicon glyphicon-chevron-left pull-left"></span>
                <p class="text-right">Previous Page</p>
              </div>
            </a>
          </div>

          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-">
          </div>

          <div class="col col-lg-4 col-md-4 col-sm-4 col-xs-">
            <a href="#">
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Files</h4>
      </div>
      <div class="modal-body">

        <form method="post" class="upload" enctype="multipart/form-data">
          <input type="file" id="uploads" name="my_file[]" multiple>
        </form>

        <div id="selectedFiles"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="upload()">Submit</button>
      </div>
    </div>

  </div>
</div>


<script>

  function upload(){
    console.log("test")
    $(".upload").submit();

  }

  var selDiv = "";

  document.addEventListener("DOMContentLoaded", initialize, false);

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



</script>

















<!-- Use downloaded version of Bootstrap -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
