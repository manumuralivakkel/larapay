<?php echo View::make('layouts/header'); ?>

<div class="main">

    <div class="main-inner">

        <div class="container">

            <div class="row">

                <div class="span12">      		

                    <!-- /widget -->
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-user"></i>
                            <h3>Account details</h3><a href="<?=URL::to('profiles/create/'.Session::get('uid'))?>"><button style="float: right;margin: 10px 10px 0 0;">Create</button></a>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                          
                        </div>
                        <!-- /widget-content --> 
                    </div>
                    <!-- /widget --> 

                </div> <!-- /span8 -->




            </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /main-inner -->

</div> <!-- /main -->

<?php echo View::make('layouts/footer'); ?>
