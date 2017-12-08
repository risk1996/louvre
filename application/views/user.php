
<div class="container">
    <h1><?php echo $title; ?></h1>
    <div id="accordion" role="tablist">
        <div class="card bg-dark">
            <div class="card-header" role="tab"><h5 class="mb-0"><a data-toggle="collapse" href="#accinfo">Account Information</a></h5></div>
            <div id="accinfo" class="collapse show" role="tabpanel" data-parent="#accordion">
                <div class="card-body" style="margin: 0; padding: 0;">
                    <table class="table table-dark table-striped" style="margin: 0; padding: 0;">
                        <tbody>
                            <tr>
                                <td class="text-right" width="128"><span class="fa fa-envelope-o"></span> E-Mail</td>
                                <td width="10">:</td>
                                <td><?php echo $user['email']; ?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="128"><span class="fa fa-key"></span> Password</td>
                                <td width="10">:</td>
                                <td><?php echo '●●●●●●●●●●●●●●●●'; ?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="128"><span class="fa fa-user-circle"></span> Name</td>
                                <td width="10">:</td>
                                <td><?php echo $user['fname'].' '.$user['lname']; ?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="128"><span class="fa fa-venus-mars"></span> Gender</td>
                                <td width="10">:</td>
                                <td><?php echo $user['gender']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="<?php echo site_url(); ?>user/change" class="btn btn-outline-dark btn-block"><span class="fa fa-pencil-square-o"></span> Change Account Information</a>
                </div>
            </div>
        </div>
        <?php if($this->session->userdata('roles')=='buyer'){ ?>
        <div class="card bg-dark">
            <div class="card-header" role="tab"><h5 class="mb-0"><a data-toggle="collapse" href="#userbook">Owned Books</a></h5></div>
            <div id="userbook" class="collapse" role="tabpanel" data-parent="#accordion">
                <div class="card-body" style="margin: 0; padding: 0;">
                    <table class="table table-dark table-striped" id="userbooktable" style="margin: 0; padding: 0;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ISBN13</th>
                                <th width="0"></th>
                                <th>Book Title</th>
                                <th>Language</th>
                                <th>Format</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $cnt = 1;
                                foreach($books as $book){
                                    echo '<tr>';
                                        echo '<td class="text-right">'.$cnt++.'</td>';
                                        echo '<td><a href="'.site_url().'books/'.$book['slug'].'">'.$book['isbn13'].'</a></td>';
                                        echo '<td style="padding: 0; margin: 0;" width="37">';
                                            echo '<a href="'.site_url().'books/'.$book['slug'].'"><img width="37" class="img-fluid" src="'.site_url().'assets/covers/'.((file_exists('./assets/covers/'.$book['isbn13'].'.png'))?$book['isbn13'].'.png':'_placeholder.png').'" alt="'.$book['title'].'Book Cover"></a>';
                                        echo '</td>';
                                        echo '<td>';
                                            echo '<a href="'.site_url().'books/'.$book['slug'].'">'.$book['title'].'</a>';
                                        echo '</td>';
                                        echo '<td>';
                                            echo '<span class="em '.$lang[$book['language']]['emoji'].'"></span> ';
                                            echo $book['language'];
                                        echo '</td>';
                                        echo '<td>';
                                            echo '<span class="em '.$format[$book['format']]['emoji'].'"></span> ';
                                            echo $book['format'];
                                        echo '</td>';
                                        echo '<td>';
                                            echo '<a class="btn btn-primary btn-sm" href="'.site_url().'"><span class="fa fa-download"></span> Download</a>';
                                        echo '</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card bg-dark">
            <div class="card-header" role="tab"><h5 class="mb-0"><a data-toggle="collapse" href="#transhis">Transaction History</a></h5></div>
            <div id="transhis" class="collapse" role="tabpanel" data-parent="#accordion">
                <div class="card-body" style="margin: 0; padding: 0;">
                    <table class="table table-dark table-striped" id="usertranstable" style="margin: 0; padding: 0;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Invoice Number</th>
                                <th>Payment</th>
                                <th>Purchase Date</th>
                                <th>Book Title</th>
                                <th>Purchase Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $cnt = 1;
                                foreach($transactions as $transaction){
                                    echo '<tr>';
                                        echo '<td class="text-right">'.$cnt++.'</td>';
                                        echo '<td>';
                                        echo $transaction['invoiceno'];
                                        echo '</td>';
                                        echo '<td>';
                                        echo $transaction['payment'];
                                        echo '</td>';
                                        echo '<td>';
                                        echo $transaction['invdate'];
                                        echo '</td>';
                                        echo '<td>';
                                            foreach($trans[$transaction['invoiceno']] as $tran){
                                                echo '<a href="'.site_url().'books/'.$books[$tran['isbn13']]['slug'].'">'.$books[$tran['isbn13']]['title'].'</a>';
                                                echo '<br>';
                                            }
                                        echo '</td>';
                                        echo '<td>';
                                            foreach($trans[$transaction['invoiceno']] as $tran){
                                                echo '<span>$</span><span class="qty">'.number_format($books[$tran['isbn13']]['price']*(100-$tran['discount'])/100,2).'</span>';
                                                echo '<br>';
                                            }
                                        echo '</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php }else if($this->session->userdata('roles')=='manager'){ ?>
        <div class="card bg-dark">
            <div class="card-header" role="tab"><h5 class="mb-0"><a data-toggle="collapse" href="#dbcrud">Database Administrative Tools</a></h5></div>
            <div id="dbcrud" class="collapse" role="tabpanel" data-parent="#accordion">
                <div class="card-body">
                    <h4>View</h4>
                    <div class="row">
                        <a href="<?php echo site_url('admin/manage/users'); ?>" class="col-sm-6 btn btn-outline-light btn-lg">View Users</a>
                        <a href="<?php echo site_url('admin/manage/userbook'); ?>" class="col-sm-6 btn btn-outline-light btn-lg">View Users' Books</a>
                    </div>
                    <div class="row">
                        <a href="<?php echo site_url('admin/manage/cart'); ?>" class="col-sm-4 btn btn-outline-light btn-lg">View Carts</a>
                        <a href="<?php echo site_url('admin/manage/transactions'); ?>" class="col-sm-4 btn btn-outline-light btn-lg">View Transactions</a>
                        <a href="<?php echo site_url('admin/manage/transactiondetail'); ?>" class="col-sm-4 btn btn-outline-light btn-lg">View Transaction Details</a>
                    </div>
                    <h4>Manage</h4>
                    <div class="row">
                        <a href="<?php echo site_url('admin/manage/book'); ?>" class="col-sm-4 btn btn-outline-light btn-lg">Manage Books</a>
                        <a href="<?php echo site_url('admin/manage/genres'); ?>" class="col-sm-4 btn btn-outline-light btn-lg">Manage Genres</a>
                        <a href="<?php echo site_url('admin/manage/bookgenre'); ?>" class="col-sm-4 btn btn-outline-light btn-lg">Manage Book Genres</a>
                    </div>
                    <div class="row">
                        <a href="<?php echo site_url('admin/manage/bookspecial'); ?>" class="col-sm-4 btn btn-outline-light btn-lg">Manage Book Specials</a>
                        <a href="<?php echo site_url('admin/manage/formats'); ?>" class="col-sm-4 btn btn-outline-light btn-lg">Manage Formats</a>
                        <a href="<?php echo site_url('admin/manage/langs'); ?>" class="col-sm-4 btn btn-outline-light btn-lg">Manage Languages</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>