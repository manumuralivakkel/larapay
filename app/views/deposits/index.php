<?php echo View::make('layouts/header'); ?>



<div class="main">

    <div class="main-inner">

        <div class="container">

            <div class="row">

                <div class="span12">      		

                    <!-- /widget -->
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-download-alt"></i>
                            <h3>Deposit to Wallet</h3><a href="<?= URL::to('deposits/create/'.Session::get('uid'))?>"><button style="float: right;margin: 10px 10px 0 0;">Deposit</button></a>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> From Bank </th>
                                        <th> From Account Number</th>
                                        <th> Amount</th>
                                        <th> Date</th>
                                        <th class="td-actions">Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach ($deposits as $key=>$deposit){?>
                                    <tr>
                                        <td> <?=$deposit->bank_name?> </td>
                                        <td> <?=$deposit->ac_no?> </td>
                                        <td> $<?=$deposit->amount?> </td>
                                        <td> <?=$deposit->created_at?> </td>
                                        <td class="td-actions">
                                            <form method="post" action="<?= action('DepositController@destroy', $deposit->deposit_id) ?>">
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
