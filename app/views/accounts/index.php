<?php echo View::make('layouts/header'); ?>



<div class="main">

    <div class="main-inner">

        <div class="container">

            <div class="row">

                <div class="span12">      		

                    <!-- /widget -->
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-credit-card"></i>
                            <h3>Bank Accounts</h3><a href="<?= action('AccountController@create')?>"><button style="float: right;margin: 10px 10px 0 0;">Add Accounts</button></a>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> Bank </th>
                                        <th> Account Number</th>
                                        <th> Beneficiary Name</th>
                                        <th> Account Balance</th>
                                        <th class="td-actions">Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach ($accounts as $key=>$account){?>
                                    <tr>
                                        <td> <?=$account->bank_name?> </td>
                                        <td> <?=$account->ac_no?> </td>
                                        <td> <?=$account->benef_name?> </td>
                                        <td> $<?=$account->balance?> </td>
                                        <td class="td-actions">
                                            <a href="<?=URL::to('accounts/' . $account->account_id . '/edit')?>"><button class="btn btn-small btn-success btn-icon-only icon-edit"></button></a>
                                            <form method="post" action="<?= action('AccountController@destroy', $account->account_id) ?>">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-small btn-icon-only icon-remove"> </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } ?>

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
