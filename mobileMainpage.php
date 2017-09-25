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
<style type="text/css">
.main-text h1, h2, h3, h4, p{
  text-align: center;
  font-family: 'Open Sans Condensed', sans-serif;
  padding-bottom: .4em;
  font-size: 20pt;
}
.main-text p{
  font-size: 10pt;
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
  font-size: 0.54em;
  font-family: 'Open Sans Condensed', sans-serif;
  padding-bottom: .4em;
}
.carousel-caption p{
  font-size: 0.2em;
}
.navbar{
  background-color: #F1F1F1;
}
.brandStyle{
  width: 160px;
  /*margin-bottom: 5px;
  padding-top: 10px;*/
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
  height: 85px;
}
.hov:hover{
  background: rgba(0,0,0,0.4) !important;
}
.jumbotron p{
  font-family: 'Open Sans Condensed', sans-serif;
  font-size: 15pt;
  font-weight: 100;
  color: white;
}
.header{
  height: 150px;
  padding-left: 40px !important;
  margin: 0px;
}
#headH1{
  font-size: 15pt;
}
#headP{
  font-size: 5pt;
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
  margin-top: 0px;
}
.carouselButton{
  z-index: 2;
  width: 20px;
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
  font-size: 15pt;
}

.image{
  background-size: cover;
  background-repeat: no-repeat;
  background-position: 50% 50%;
  padding-left: 0px !important;
  height: 60px;

}
.image p{
  position: absolute;
  bottom: 0;
  margin-bottom: 0px;
  margin-left: 5px;
  padding-bottom: 0px;
  font-size: 7pt;
}
.file{
  height: 60px;
  padding: 0px !important;
  margin-top: 8px;
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
  font-size: 10pt;
}
.arrow{
  margin-top: 2vh;
  height: 30px;
}
.arrow span{
  font-size: 20pt;
}
.arrow p{
  width: 100%;
  padding-right: 40px;
  font-size: 20pt;
}
.modal-body p{
  font-size: 15pt;
  font-weight: bold;
}
.removePadding{
  padding: 0px;
}
.stats{
  height: 150px;
}
</style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>

<?php include 'getFiles.php'; ?>
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
      $dir = "testFolder";
    }
  }else{
    $dir = "testFolder";
  }

  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }else{
    $page = 0;
  }

  if(isset($_GET['del'])){
    $del = "true";
  }else{
    $del = "false";
  }

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

      <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
      </div>

        <div class="col col-lg-10 col-md-10 col-sm-10 col-xs-10 text-center">
          <div class="jumbotron">
            <h1>
                Hey there!
            </h1>
            <p>Your favorite pictures adorn the backdrop</p>
          </div>
        </div>

        <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
        </div>

        <!-- Icons for file access -->
        <div class="icons">
          <div class="row">
            <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
            </div>
            <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
              <a href="Images.php">
                  <div class="jumbotron hov file">
                    <p>Pictures</p>
                  </div>
              </a>
            </div>

            <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
              <a href="Audio.php">
                  <div class="jumbotron hov file">
                    <p>Music</p>
                  </div>
              </a>
            </div>

            <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
              <a href="Videos.php">
                  <div class="jumbotron hov file">
                    <p>Videos</p>
                  </div>
              </a>
            </div>

            <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
              <a href="Files.php">
                  <div class="jumbotron hov file">
                    <p>Files</p>
                  </div>
              </a>
            </div>

            <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
            </div>

          <div class="everything">

            <div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4">
            </div>

            <div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4">
              <a href="File.php">
                  <div class="jumbotron everythingButton hov file">
                    <p>Browse</p>
                  </div>
              </a>
            </div>

            <div class="col col-lg-4 col-md-4 col-sm-4 col-xs-4">
            </div>

          </div>
        </div>
      </div>

      <div class="statistics allign-bottom">

        <div clas="row">

          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
          </div>

          <div class="col col-lg-10 col-md-10 col-sm-10 col-xs-10">
            <div class="jumbotron stats">
                <p class="text-left">Server Statistics</p>
              <p class="text-left" style="margin-bottom: 0px; padding-bottom: 0px;">
              <?php
                $freeSpace = round(disk_free_space("/")/1000000000, 1);
                $totalSpace = round(disk_total_space("/")/1000000000, 1);
                echo("Free Space: ".$freeSpace);
                echo("GB / Total Space: ".$totalSpace."GB");

                $percentage=(($totalSpace-$freeSpace)/$totalSpace)*100;
                $percentage=round($percentage, 1);

                if($percentage < 70){
                  $color="success";
                }elseif ($percentage >= 90) {
                  $color="danger";
                }else {
                  $color="warning";
                }

                echo('
                <div class="progress" style="background: rgba(0,0,0,0.3);">
                  <div class="progress-bar progress-bar-'.$color.'" role="progressbar" style="width: '.$percentage.'%;">
                    '.$percentage.'%
                  </div>
                </div>
                ');
              ?>
            </p>
            </div>
          </div>

          <div class="col col-lg-1 col-md-1 col-sm-1 col-xs-1">
          </div>

        </div>

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


<script>

  function replaceSpaces(path){
    return path.replace(" ", '%20');
  }


  function advancedSearch(){
    console.log("test")
    $("#advancedSearch").submit();

  }

</script>
<!-- Use downloaded version of Bootstrap -->
<script src="js/bootstrap.js"></script>
</body>
</html>
