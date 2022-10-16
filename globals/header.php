<?php
include "data.php";
$nevigation = data("nevigation", 1, 4);
$serviceMenu = array_column($function->getAllItemswithoutOrder("service_name"), null, "id");

?>
<!doctype html>
<html lang="en-US">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
  <meta http-equiv="Content-Type" content="Content-Type: text/html; charset=utf-8" />
  <title>Welcome RECORD Owner</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all" />
  <link rel="stylesheet" href="css/ionicons.min.css" type="text/css" media="all" />
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all" />
  <link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all" />
  <link rel="stylesheet" href="css/settings.css" type="text/css" media="all" />
  <link rel="stylesheet" href="css/component.css" type="text/css" media="all" />
  <link rel="stylesheet" href="css/slick.css" type="text/css" media="all" />
  <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" media="all" />
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
  <link rel="stylesheet" href="css/custom.css" type="text/css" media="all" />
  <link href="../../fonts.googleapis.com/cssd689.css?family=Merriweather:300,300i,400,400i,700,700i,900,900i%7CMontserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />

  <style>
    a.icon-af {
      color: #fff;
    }
  </style>


</head>

<body>
  <div class="noo-spinner">
    <div class="spinner">
      <div class="child double-bounce1"></div>
      <div class="child double-bounce2"></div>
    </div>
  </div>
  <div id="menu-slideout" class="slideout-menu hidden-md-up">
    <div class="mobile-menu">

    </div>
  </div>
  <div class="site">
    <header id="header" class="header header-desktop header-overlay header-1">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 p-0">
            <div class="header-left"> <a href="/index.php" id="branding_logo">
                <?php if ($nevigation[0]['status']) : ?>
                  <img class="logo" src="record@1357admin/dist/img/<?= $nevigation[0]['name'] ?>" alt="Logo" title="RECORD media" />
                  <img class="logo-alt" src="record@1357admin/dist/img/<?= $nevigation[0]['name'] ?>" alt="Logo" title="RECORD media" /> </a>
            <?php endif; ?>
            </div>
          </div>
          <div class="col-md-9 p-0">
            <div class="header-right">
              <nav id="menu" class="menu menu-primary">
                <ul>
                  <li> <a href="/index.php">Home</a> </li>
                  <li class="dropdown"> <a href="#">ABOUT </a>
                    <ul class="sub-menu">
                      <li><a href="/fest.php"> Fest </a></li>
                      <li><a href="/schedule.php"> Schedule </a></li>
                      <li><a href="/venue.php"> Venue</a></li>
                      <li><a href="/career.php">Career </a></li>
                      <li><a href="/collaboration.php">Collaboration </a></li>
                    </ul>
                  </li>

                  <li> <a href="/submit.php">Submit </a> </li>

                  <li class="dropdown"> <a href="#">Films </a>
                    <ul class="sub-menu">
                      <li><a href="/films-official-selection.php"> Official Selection </a></li>
                      <li><a href="/films-winners.php"> Winners </a></li>
                    </ul>
                  </li>

                  <li> <a href="jury">Jury </a> </li>
                  <!-- about to done -->
                  <li class="dropdown"> <a href="#">Business </a>
                    <ul class="sub-menu">
                      <li><a href="/film-festivals.php"> Film Festivals Submission</a></li>
                      <li><a href="/marketing-and-promotion.php">  Promotion</a></li>
                      <li><a href="/masterclass.php"> Master Class</a></li>
                      <li><a href="/distribution.php"> Networking</a></li>
                      <li><a href="/film-funds.php"> Film Fund</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"> <a href="#">Media </a>
                    <ul class="sub-menu">
                      <!-- catalog -->
                      <li><a href="/trailers.php"> Trailers </a></li>
                      <!-- catalog -->
                      <li><a href="/interviews.php"> Interviews </a></li>
                      <!-- catalog -->
                      <li><a href="/blogs.php"> Blogs </a></li>
                    </ul>
                  </li>
                  <li> <a href="/contact-us.php">Contact </a> </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <header class="header header-mobile">
      <div class="container">
        <div class="row">
          <div class="col-xs-2">
            <div class="header-left">
              <div id="open-left"><i class="ion-navicon"></i></div>
            </div>
          </div>
          <div class="col-xs-8">
            <div class="header-center"> <a href="/index.php" id="logo-2"> <img class="logo-image" src="/record@1357admin/dist/img/1645873133-logo.png" alt="RECORD media Logo" /> </a> </div>
          </div>
          <div class="col-xs-2">
            <div class="header-right">
              <div id="open-search-2" class="open-search top-search-btn"> <i class="ion-ios-search-strong"></i> </div>
            </div>
          </div>
        </div>
      </div>
    </header>