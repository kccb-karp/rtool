<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
    <!--<![endif]-->

    <head>
        <!-- {ele.ment: slide/split-testing} -->
        <meta charset="utf-8" />
        <meta name="language" content="english" />
        <meta name="author" content="buildrr" />
        <meta name="googlebot" content="noodp" />
        <meta name="slurp" content="noydir" />
        <!--<title>Web Design Company | Web Development Company | Buildrr LLCAdverntage</title>-->
        <title>Reporting Tool</title>
        <base href="http://192.168.0.201/rtooli/" />
        <meta name="keywords" content="rtool for OpenMRS-KenyaEMR reporting" />
        <meta name="description" content="rtool for OpenMRS-KenyaEMR reporting" />

        <link rel="icon" type="image/png" href="theme/images/logo.png" />
        <link href="theme/images/logo.png" type="image/x-icon" rel="shortcut icon" />

        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="theme/css/bootstrap.min.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
        <!-- <link rel="stylesheet" href="theme/css/main.css"> -->
        <!--<link rel="stylesheet" href="theme/css/backend.min.css" />-->
        <link rel="stylesheet" href="theme/css/arsfont.css" />
        <link rel="stylesheet" href="theme/css/fa/css/font-awesome.min.css" />
        <link rel="stylesheet" href="theme/js/slick/slick.css" />
        <!-- <link rel="stylesheet" href="theme/css/style.css"> -->
        <link rel="stylesheet" href="theme/css/custom.css" />
        <link rel="stylesheet" type="text/css" href="theme/js/slick/slick-theme.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" />
    </head>
    <body style="min-height: 100%;">
        <?php
            include 'functions.php';
            $obj = new myFunctions;
        ?> 
        <div class="top-strip"></div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default navbar-fixed-top" style=";margin: 0px !important;background: #fff;border-top: 2px solid red;">
            <nav class="navbar navbar-default" style="margin: 0px !important;">
                <div class="">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <div class="logowrap"><img src="theme/images/rlogo.png" /></div>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href=""><i class="fa fa-home" aria-hidden="true"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="reportinghub" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">REPORTING HUB<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="reportinghub">Dashboard</a></li>
                                    <li><a href="blank.php">Patients</a></li>
                                    <li><a href="blank.php">Quarterly</a></li>
                                    <li><a href="blank.php">Monthly</a></li>
                                    <li><a href="blank.php">LEAP</a></li>
                                    <li><a href="reportinghub/generatereports.php">Generate Reports</a></li>
                                    <li><a href="reportinghub/generatereports.php">Reports Glosary</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="blank.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">R-APIs<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="blank.php">3 PM</a></li>
                                    <li><a href="blank.php">NASCOP</a></li>
                                    <li><a href="blank.php">KARP</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="blank.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">QUERIES<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="blank.php">Design Query</a></li>
                                    <li><a href="blank.php">Saved Queries</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="blank.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">FACILITIES<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="blank.php">Facilities Master</a></li>
                                    <li><a href="blank.php">Contacts</a></li>
                                    <li><a href="blank.php">Reports</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="blank.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ADMIN<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="blank.php">Users</a></li>
                                    <li><a href="blank.php">Databases</a></li>
                                    <li><a href="blank.php">Settings</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="blank.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HELP &amp; FEEDBACK<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="blank.php">Q&amp;A</a></li>
                                    <li><a href="blank.php">Reporting Issues</a></li>
                                    <li><a href="blank.php">Report Errors</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right" style="margin-right: 10px;">
                            <li><a href="blank.php">LOGIN | SIGNUP</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </nav>
        </nav>
        <div class="body-section">

        
