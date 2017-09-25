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
  margin-top: 5vh;
  margin-bottom: 0px;
  width: 100%;
  padding: 0px;
  border-radius: 8px;
  background: rgba(0,0,0,0.2);
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
  z-index: 100;
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
</style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
          <li><a class="textColor" href="#">Upload</a></li>
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
              <a href="image.php">
                  <div class="jumbotron hov">
                    <p>Pictures</p>
                  </div>
              </a>
            </div>

            <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
              <a href="audio.php">
                  <div class="jumbotron hov">
                    <p>Music</p>
                  </div>
              </a>
            </div>

            <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
              <a href="video.php">
                  <div class="jumbotron hov">
                    <p>Videos</p>
                  </div>
              </a>
            </div>

            <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
              <a href="files.php">
                  <div class="jumbotron hov">
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
              <a href="#">
                  <div class="jumbotron everythingButton hov">
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
            <div class="jumbotron">
                <p class="text-left">Server Statistics</p>
              <p class="text-left" style="margin-bottom: 0px; padding-bottom: 0px;">
              <?php
                $freeSpace = round(disk_free_space("D:")/1000000000, 1);
                $totalSpace = round(disk_total_space("D:")/1000000000, 1);
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






















<!-- Use downloaded version of Bootstrap -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
