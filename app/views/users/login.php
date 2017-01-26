<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>LaraPay</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes"> 

        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= asset('css/bootstrap-responsive.min.css') ?>" rel="stylesheet" type="text/css" />

        <link href="<?= asset('css/font-awesome.css') ?>" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

        <link href="<?= asset('css/style.css') ?>" rel="stylesheet" type="text/css">
        <link href="<?= asset('css/pages/signin.css') ?>" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div class="navbar navbar-fixed-top">

            <div class="navbar-inner">

                <div class="container">

                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <a class="brand" href="">
                        LaraPay				
                    </a>		

                    <div class="nav-collapse">
                        <ul class="nav pull-right">

                            <li class="">						
                                <a href="<?= URL::to('users/create') ?>" class="">
                                    Don't have an account?
                                </a>

                            </li>


                        </ul>

                    </div><!--/.nav-collapse -->	

                </div> <!-- /container -->

            </div> <!-- /navbar-inner -->

        </div> <!-- /navbar -->



        <div class="account-container">

            <div class="content clearfix">

                <form action="<?= action('UserController@Signin','1')?>" method="post">

                    <h1>Member Login</h1>		

                    <div class="login-fields">

                        <p>Please provide your details</p>
                        <?php if (Session::has('message')) { ?>

                            <div id="target-1" class="widget">
                                <div class="widget-content alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="margin-right: 10px;">×</button>
                                    <p style="color: #008866;font-weight: bold;text-align: center"><?= Session::get('message') ?></p>
                                </div> <!-- /widget-content -->
                            </div> <!-- /widget -->

                        <?php } ?>  
                        <div class="field">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" required />
                        </div> <!-- /field -->

                        <div class="field">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"required />
                        </div> <!-- /password -->

                    </div> <!-- /login-fields -->

                    <div class="login-actions">


                        <button type="submit" class="button btn btn-success btn-large">Sign In</button>

                    </div> <!-- .actions -->



                </form>

            </div> <!-- /content -->

        </div> <!-- /account-container -->






        <script src="<?= asset('js/jquery-1.7.2.min.js') ?>"></script>
        <script src="<?= asset('js/bootstrap.js') ?>"></script>

        <script src="<?= asset('js/signin.js') ?>"></script>

    </body>

</html>
