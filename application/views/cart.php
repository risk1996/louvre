<div class="container">
    <h1><?php echo $title; ?></h1>
    <table class="table table-striped table-bordered table-dark" id="dat">
        <thead>
            <tr>
                <th></th>
                <th>ISBN13</th>
                <th colspan="2">Book Title</th>
                <th>Language</th>
                <th>Format</th>
                <th>Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(count($books)){
                    $cnt = 1;
                    $subtotal = $price = 0;
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
                                echo ($book['price']>$book['discountedprice']?'<strike class="text-muted"><span>$<span><span class="qty">'.$book['price'].'</span></strike><br>':'').'<big><span>$</span><span class="qty">'.$book['discountedprice'].'</span></big>';
                            echo '</td>';
                            echo '<td>';
                                echo form_open('purchase/remove');
                                    echo '<input type="hidden" name="isbn13" value="'.$book['isbn13'].'">';
                                    echo '<button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button>';
                                echo '</form>';
                            echo '</td>';
                        echo '</tr>';
                        $price += $book['price'];
                        $subtotal += $book['discountedprice'];
                    }
                    $total = 1.1 * $subtotal;
                    echo '<tr>';
                        echo '<td class="text-right" colspan="6">Subtotal :</td>';
                        echo '<td><big><span>$</span><span class="qty">'.number_format($subtotal, 2).'</span><big></td>';
                    echo '</tr>';
                    if($price>$subtotal){
                        echo '<tr>';
                            echo '<td class="text-right text-success" colspan="6">You Save :</td>';
                            echo '<td class="text-success"><big><span>$</span><span class="qty">'.number_format($price-$subtotal, 2).'</span><big></td>';
                        echo '</tr>';
                    }
                    echo '<tr>';
                        echo '<td class="text-right" colspan="6">Value Added Tax (10% VAT) :</td>';
                        echo '<td><big><span>$</span><span class="qty">'.number_format(.1*$subtotal, 2).'</span><big></td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td class="text-right" colspan="6"><h4>Grand Total :</h4></td>';
                        echo '<td><h4><b><span>$</span><span class="qty">'.number_format($total, 2).'</span><b></h4></td>';
                    echo '</tr>';
                }else{
                    echo '<tr>';
                        echo '<td class="text-center" colspan="8"><i>There are no items in your cart.</i></td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
    <?php if(count($books)){ ?>
    <button class="btn btn-dark btn-lg btn-block" type="button" data-toggle="modal" data-target="#checkout">Check Out</button>
    <?php } ?>
    <br>
    <br>
    <div class="modal" tabindex="-1" role="dialog" id="checkout">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Check Out</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" style="padding: 0; margin: 0;">
                    <table class="table table-striped" style="padding: 0; margin: 0;">
                        <tr>
                            <td class="text-right">Invoice Number</td>
                            <td>:</td>
                            <td class="text-right"><b><?php echo $invoiceno; ?></b></td>
                        </tr>
                        <tr>
                            <td class="text-right">Grand Total</td>
                            <td>:</td>
                            <td><?php echo '<b><span>$</span><span class="qty">'.number_format($total, 2).'</span><b>'; ?></td>
                        </tr>
                        <tr>
                            <td class="text-right">Payment Method</td>
                            <td>:</td>
                            <td>
                                <?php echo form_open('purchase/checkout', array('id' => 'checkoutform')); ?>
                                    <input type="hidden" name="invoiceno" value="<?php echo $invoiceno; ?>">
                                    <select class="custom-select selectw" name="payment">
                                        <option value="Debit">Debit</option>
                                        <option value="Visa">Visa</option>
                                        <option value="MasterCard">Master Card</option>
                                        <option value="PayPal">PayPal</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><button type="button" class="btn btn-block btn-primary" onClick="document.getElementById('checkoutform').submit();">Check Out</button></td>
                        </tr>
                        <tr>
                            <td colspan="3"><button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">Cancel</button></td>
                        </tr>
                    </table>
                </div>
                <!-- <div class="modal-footer"></div> -->
            </div>
        </div>
    </div>
</div>