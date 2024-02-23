<?php
    session_start();
    ob_start();
    define("PATH_ADMIN", "http://localhost/NguyenThiHoaiThuong/admin/index.php?"); 
    require("../lib/coreFunction.php");
    $f = new CoreFunction();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JUNIA ADMIN</title>

    <!-- Bootstrap Core CSS -->
    <link href="../admin/asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../admin/asset/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../admin/asset/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../admin/asset/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Junia Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href=""><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?= PATH_ADMIN ?>page=catList"><i class="fa fa-fw fa-bar-chart-o"></i> Quản lý danh mục</a>
                    </li>
                    <li>
                        <a href="<?= PATH_ADMIN ?>page=productList"><i class="fa fa-fw fa-table"></i> Quản lý sản phẩm</a>
                    </li>
                    <li>
                        <a href="<?= PATH_ADMIN ?>page=userList"><i class="fa fa-fw fa-edit"></i> Quản lý người dùng</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-fw fa-desktop"></i> Quản lý hóa đơn</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <?php

                            if(!isset($_SESSION['admin']) || $_SESSION['admin'] == false) {
                                header("Location: login.php");
                                exit(); 
                            }
                            else{
                                if(!isset($_GET['page'])) {
                                    $page = "";
                                }
                                else {
                                    $page = $_GET['page'];
                                }
                                $route= [
                                    ''=>'home.php',
                                    'catList'=>'category/list.php',
                                    'catAdd'=>'category/add.php',
                                    'catEdit'=>'category/edit.php',
                                    'catDelete'=>'category/delete.php',
                                    'productList'=>'product/list.php',
                                    'productAdd'=>'product/add.php',
                                    'productEdit'=>'product/edit.php',
                                    'productDelete'=>'product/delete.php',
                                    'userList'=>'user/list.php',

                                ];
                                foreach($route as $r => $val) {
                                    if($r == $page) {
                                        require($val);
                                    }
                                }
                            }
                        ?>
                        

                    </div>
                </div>   
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../admin/asset/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../admin/asset/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../admin/asset/js/plugins/morris/raphael.min.js"></script>
    <script src="../admin/asset/js/plugins/morris/morris.min.js"></script>
    <script src="../admin/asset/js/plugins/morris/morris-data.js"></script>

</body>

</html>
