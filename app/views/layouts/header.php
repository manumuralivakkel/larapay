<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>LaraPay</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= asset('css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
        <link href="<?= asset('css/font-awesome.css') ?>" rel="stylesheet">
        <link href="<?= asset('css/style.css') ?>" rel="stylesheet">
        <link href="<?= asset('css/pages/dashboard.css') ?>" rel="stylesheet">
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
              <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
    </head>
    <?php $uid = Session::get('uid'); ?>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                            class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="">LaraPay </a>
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                        class="icon-user"></i> <?= Session::get('display_name')?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=URL::to('users/logout')?>">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
<!--                        <form class="navbar-search pull-right">
                            <input type="text" class="search-query" placeholder="Search">
                        </form>-->
                    </div>
                    <!--/.nav-collapse --> 
                </div>
                <!-- /container --> 
            </div>
            <!-- /navbar-inner --> 
        </div>
        <!-- /navbar -->
        <div class="subnavbar">
            <div class="subnavbar-inner">
                <div class="container">
                    <ul class="mainnav">
                        <li><a href="<?= action('UserController@Dashboard') ?>"><i class="icon-home"></i><span>Home</span> </a> </li>
                        <li><a href="<?= action('AccountController@Index', $uid) ?>"><i class="icon-credit-card"></i><span>Bank Accounts</span> </a></li>
                        <li><a href="<?= action('DepositController@Index', $uid) ?>"><i class="icon-download-alt"></i><span>Deposits</span> </a> </li>
                        <li><a href="<?= action('WithdrawController@Index', $uid) ?>"><i class="icon-upload-alt"></i><span>Withdraws</span> </a> </li>
                        <li class="dropdown">
<!--                            <a href="<?= action('TransactionController@Index', $uid) ?>">-->
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">    
                            <i class="icon-tasks"></i><span>Transactions</span><b class="caret"></b> 
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= action('TransactionController@Index', $uid)?>">Sent</a></li>
                                <li><a href="<?= action('TransactionController@Receive', $uid)?>">Received</a></li>
<!--                                <li><a href="javascript:void(0);">Change Password</a></li>-->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-user"></i><span>Account</span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= action('UserController@Wallet', $uid) ?>">Wallet</a></li>
                                <li><a href="<?= action('ProfileController@Show', $uid) ?>">Profile</a></li>
<!--                                <li><a href="javascript:void(0);">Change Password</a></li>-->
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /container --> 
            </div>
            <!-- /subnavbar-inner --> 
        </div>
        <!-- /subnavbar -->
        <?php if (Session::has('message')) { ?>
            <div class="container">
                <div class="row">	      	
                    <div class="span12">
                        <div id="target-1" class="widget">
                            <div class="widget-content alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="margin-right: 10px;">×</button>
                                <p style="color: #008866;font-weight: bold;text-align: center"><?= Session::get('message') ?></p>
                            </div> <!-- /widget-content -->
                        </div> <!-- /widget -->
                    </div> <!-- /span12 -->
                </div> <!-- /row -->
            </div>
        <?php } ?>  
        