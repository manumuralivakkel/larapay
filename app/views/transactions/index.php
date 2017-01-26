<?php echo View::make('layouts/header'); ?>



<div class="main">

    <div class="main-inner">

        <div class="container">

            <div class="row">

                <div class="span12">      		

                    <!-- /widget -->
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-tasks"></i>
                            <h3>Your Transactions</h3><a href="<?= URL::to('transactions/create/'. Session::get('uid') ) ?>"><button style="float: right;margin: 10px 10px 0 0;">Transfer Amount</button></a>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> Receiver's Email </th>
                                        <th> Receiver's Name </th>
                                        <th> Amount</th>
                                        <th> Date</th>
                                        <th class="td-actions">Actions </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($transactions as $key => $transaction) { ?>
                                        <tr>
                                            <td> <?= $transaction->email ?> </td>
                                            <td> <?= $transaction->first_name." ".$transaction->last_name ?> </td>
                                            <td> $<?= $transaction->amount ?> </td>
                                            <td> <?= $transaction->created_at ?> </td>
                                            <td class="td-actions">
                                                <form method="post" action="<?= action('TransactionController@destroy', $transaction->transaction_id) ?>">
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
