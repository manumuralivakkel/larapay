<?php echo View::make('layouts/header'); ?>

<div class="main">

    <div class="main-inner">

        <div class="container">

            <div class="row">

                <div class="span12">      		

                   <div class="widget ">

                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3>Edit Your Profile</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">

                            <form id="edit-profile" class="form-horizontal" method="post" action="<?= action('ProfileController@store') ?>">
                                
                                  <fieldset>
                                    
                                      <div class="control-group">											
                                        <label class="control-label" for="firstname">First Name</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="firstname" name="first_name"  value="<?=$user->first_name?>" required>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->

                                    <div class="control-group">											
                                        <label class="control-label" for="lastname">Last Name</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="lastname" name="last_name"  value="<?=$user->last_name?>" required>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->

                                    <div class="control-group">											
                                        <label class="control-label" for="lastname">Date of birth</label>
                                        <div class="controls">
                                            <input type="date" class="span6" id="lastname" name="dob"  value="">
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    
                                    <div class="control-group">											
                                        <label class="control-label" for="lastname">phone</label>
                                        <div class="controls">
                                            <input type="number" class="span6" id="lastname" name="phone"  value="">
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    
                                    <div class="control-group">											
                                        <label class="control-label" for="lastname">Mobile</label>
                                        <div class="controls">
                                            <input type="number" class="span6" id="lastname" name="mobile"  value="">
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    
                                    <div class="control-group">											
                                        <label class="control-label" for="lastname">Address</label>
                                        <div class="controls">
                                            <textarea name="address"></textarea>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    
                                    <div class="control-group">											
                                        <label class="control-label" for="lastname">Country</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="lastname" name="country"  value="">
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->

                                    

                                    <input type="hidden" name="member_id" value="<?= Session::get('uid') ?>" />
                                    <div class="controls">
                                        <button type="submit" class="btn btn-primary">Save</button></div>
                                </fieldset>
                            </form>

                        </div> <!-- /widget-content -->

                    </div> <!-- /widget -->

                </div> <!-- /span8 -->




            </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /main-inner -->

</div> <!-- /main -->


<?php echo View::make('layouts/footer'); ?>