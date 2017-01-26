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
                                <a href="<?= URL::to('users/login') ?>" class="">
                                    <i class="icon-chevron-left"></i>
                                    Back to Login
                                </a>

                            </li>
                        </ul>

                    </div><!--/.nav-collapse -->	

                </div> <!-- /container -->

            </div> <!-- /navbar-inner -->

        </div> <!-- /navbar -->



        <div class="account-container register">

            <div class="content clearfix"> 
                <?php if (Session::has('message')) { ?>

                    <div id="target-1" class="widget">
                        <div class="widget-content alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="margin-right: 10px;">×</button>
                            <p style="color: #008866;font-weight: bold;text-align: center"><?= Session::get('message') ?></p>
                        </div> <!-- /widget-content -->
                    </div> <!-- /widget -->

                <?php } ?>  


                <form action="<?= action('UserController@store', '1') ?>" method="post" >

                    <h1>Signup for Free Account</h1>			

                    <div class="login-fields">

                        <p>Create your free account:</p>

                        <div class="field">
                            <label for="firstname">First Name:</label>
                            <input type="text" id="firstname" name="first_name" value="" placeholder="First Name" class="login" required />
                        </div> <!-- /field -->

                        <div class="field">
                            <label for="lastname">Last Name:</label>	
                            <input type="text" id="lastname" name="last_name" value="" placeholder="Last Name" class="login" required />
                        </div> <!-- /field -->


                        <div class="field">
                            <label for="email">Email Address:</label>
                            <input type="email" id="email" name="email" value="" placeholder="Email" class="login" required />
                            <div id="checkusername"></div>
                        </div> <!-- /field -->

                        <div class="field">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" value="" placeholder="Password" class="login" required />
                        </div> <!-- /field -->

                        <div class="field">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" id="confirm_password" name="confirm_password" value="" placeholder="Confirm Password" class="login" required />
                        </div> <!-- /field -->

                    </div> <!-- /login-fields -->

                    <div class="login-actions">



                        <button type="submit" class="button btn btn-primary btn-large" id="addmember">Register</button>

                    </div> <!-- .actions -->

                </form>

            </div> <!-- /content -->

        </div> <!-- /account-container -->


        <!-- Text Under Box -->
        <div class="login-extra">
            Already have an account? <a href="<?= URL::to('users/login') ?>">Login to your account</a>
        </div> <!-- /login-extra -->


        <script src="<?= asset('js/jquery-1.7.2.min.js') ?>"></script>
        <script src="<?= asset('js/bootstrap.js') ?>"></script>
        <script src="<?= asset('js/signin.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#addmember').click(function () {
                    var password = $('#password').val();
                    var confirm_password = $('#confirm_password').val();

                    if (password != confirm_password) {
                        alert('Password and Confirm password are not matching');
                        return false;
                    }

                });
                $('#email').keyup(function () {
                    var email = $('#email').val();
                    $.ajax({
                        type: 'POST',
                        url: '<?=URL::to('ajaxs/checkusername')?>',
                        data: 'email=' + email,
                        success: function (html) {
                            $('#checkusername').html(html);
                            return false;
                        }
                    });
                });
            });
        </script>

    </body>

</html>
