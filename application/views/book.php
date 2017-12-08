<div class="container">
    <h1><?php echo $title; ?></h1>
    <div class="row">
        <div class="col-sm-3">
            <img class="img-fluid" src="<?php echo site_url().'assets/covers/'.((file_exists('./assets/covers/'.$book['isbn13'].'.png'))?$book['isbn13'].'.png':'_placeholder.png'); ?>" alt="<?php echo $book['title']; ?> Book Cover">
            <button class="btn btn-light btn-block" style="color: black;">Look at Preview</button>
            <?php
                echo '<h3 class="text-center" style="margin: 0;">'.($book['price']>$book['discountedprice']?'<strike class="text-muted">$ '.$book['price'].'</strike><br>':'').'<big>$ '.$book['discountedprice'].'</big></h3>';
            ?>
            <?php
                if($this->users_model->user_own($this->session->userdata('email'), $book['isbn13'])){
                    echo '<a class="btn btn-secondary btn-block" href="'.site_url().'users"><span class="fa fa-book"></span> Owned</a>';
                }else if($this->purchase_model->in_cart($this->session->userdata('email'), $book['isbn13'])){
                    echo '<a class="btn btn-secondary btn-block" href="'.site_url().'cart"><span class="fa fa-cart-arrow-down"></span> In Cart</a>';
                }else if($this->session->userdata('roles') == 'buyer'){
                    echo form_open('purchase/add');
                        $q = $this->input->server('QUERY_STRING');
                        echo '<input type="hidden" name="isbn13" value="'.$book['isbn13'].'">';
                        echo '<input type="hidden" name="caller" value="'.current_url().($q!=''?'?'.$q:'').'">';
                        echo '<button type="submit" class="btn btn-secondary btn-block"><span class="fa fa-cart-plus"></span> Add to Cart</button>';
                    echo '</form>';
                }
            ?>
        </div>
        <div class="col-sm-6">
            <h2>
                <?php
                    echo $book['title'];
                    if(isset($book['ed'])){
                        echo '<small> ('.$book['ed'].' edition)</small>';
                    }
                ?>
            </h2>
            <h4 class="text-muted">By <?php echo $book['author']; ?></h4>
            <?php
                $genres=explode(',', $book['genre']);
                foreach($genres as $genre){
                    echo form_open('catalog', array('id'=>$book['isbn13'].$genre.'form', 'style'=>'display: inline;'));
                        echo '<input type="hidden" name="genre[]" value="'.$genre.'">';
                    echo '</form>';
                    echo '<a href="#" onclick="document.getElementById(\''.$book['isbn13'].$genre.'form\').submit();" class="badge badge-secondary">'.$genre.'</a>&nbsp;';
                }
            ?>
            <br><br>
            <h5>Book Summary</h5>
            <p><?php echo $book['summary']; ?></p>
            <br>
            <table class="table table-dark table-sm table-striped">
                <thead>
                    <tr><th colspan="2"><h5>Technical Information</h5></th></tr>
                </thead>
                <tbody>
                    <?php
                        $technicalinfos = array(
                            array('isbn13', 'ISBN13'),
                            array('pages' , 'Pages'),
                            array('language'  , 'Language'),
                            array('format', 'Book Format')
                        );
                        foreach($technicalinfos as $ti){
                            echo '<tr>';
                                echo '<td>'.$ti[1].'</td>';
                                echo '<td>:</td>';
                                echo '<td>';
                                    if($ti[0]=='format')echo '<span class="em '.$format[$book['format']]['emoji'].'"></span> ';
                                    if($ti[0]=='language')echo '<span class="em '.$lang[$book['language']]['emoji'].'"></span> ';
                                    echo $book[$ti[0]];
                                    if($ti[0]=='pages')echo ' page';
                                    if($ti[0]=='pages'&&$book[$ti[0]]%10>1)echo 's';
                                echo '</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>