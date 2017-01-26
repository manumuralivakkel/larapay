<?php echo View::make('layouts/header'); ?>

<div class="main">

    <div class="main-inner">

        <div class="container">

            <div class="row">

                <div class="span12">      		

                    <div class="widget ">

                        <div class="widget-header">
                            <i class="icon-download-alt"></i>
                            <h3>Withdraw from Wallet to Your Bank Account</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">

                            <form id="edit-profile" class="form-horizontal" method="post" action="<?= action('WithdrawController@store', Session::get('uid') ) ?>"
                                  <fieldset>

                                    <div class="control-group">											
                                        <label class="control-label" for="firstname">To Account</label>
                                        <div class="controls">
                                            <select class="span6" name="account_id" required>
                                                <option value="">Select</option>
                                                <?php foreach ($accounts as $key => $account) { ?>
                                                    <option value="<?= $account->account_id ?>"><?= $account->bank_name ?>&nbsp;--->&nbsp;<?= $account->ac_no ?></option>
                                                <?php } ?>
                                            </select>

                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->



                                    <div class="control-group">											
                                        <label class="control-label" for="radiobtns">Amount</label>

                                        <div class="controls">
                                            <div class="input-prepend input-append">
                                                <span class="add-on">$</span>
                                                <input class="span2" id="appendedPrependedInput" name="amount"  placeholder="100.00" type="text" required>
<!--                                                <span class="add-on">.00</span>-->
                                            </div>
                                        </div>	<!-- /controls -->			
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