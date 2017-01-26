<?php echo View::make('layouts/header'); ?>

<div class="main">

    <div class="main-inner">

        <div class="container">

            <div class="row">

                <div class="span12">      		

                    <!-- /widget -->
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-user"></i>
                            <h3>Account details</h3><a href="<?= URL::to('profiles/' . $profile->profile_id . '/edit')?>"><button style="float: right;margin: 10px 10px 0 0;">Edit</button></a>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <table class="table table-striped table-bordered">
                                
                                <tbody>
                                    <tr>
                                        <th> First name </th>
                                        <td> <?=$profile->first_name?> </td>
                                    </tr>
                                    <tr>
                                        <th> Last name</th> 
                                        <td> <?=$profile->last_name?> </td>
                                    </tr>
                                    <tr>
                                        <th> Date of birth</th> 
                                        <td> <?=$profile->dob?> </td>
                                    </tr>
                                    <tr>
                                        <th> Mobile </th>
                                        <td> <?=$profile->mobile?> </td>
                                    </tr>
                                    <tr>
                                        <th> Phone </th>
                                        <td> <?=$profile->phone?> </td>
                                    </tr>
                                    <tr>
                                        <th> Address </th>
                                        <td> <?=$profile->address?> </td>
                                    </tr>
                                    <tr>
                                        <th> Country </th>
                                        <td> <?=$profile->country?> </td>
                                    </tr>
                                    
                                  
                                  
                                </tbody>
                            </table>
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
