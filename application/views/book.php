<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <img class="img-fluid" src="<?php echo site_url().'assets/covers/'.((file_exists('./assets/covers/'.$book['isbn13'].'.png'))?$book['isbn13'].'.png':'_placeholder.png'); ?>" alt="<?php echo $book['title']; ?> Book Cover">
            <button class="btn btn-secondary btn-block">Look at Preview</button>
            <h3 class="text-center">$<?php echo $book['price']; ?></h3>
            <button class="btn btn-primary btn-block">Add to Cart</button>
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
                            array('lang'  , 'Language'),
                            array('format', 'Book Format')
                        );
                        foreach($technicalinfos as $ti){
                            echo '<tr>';
                                echo '<td>'.$ti[1].'</td>';
                                echo '<td>:</td>';
                                echo '<td>';
                                    if($ti[0]=='lang'&&$book[$ti[0]]=='English')echo '<span class="em em-flag-um"></span>&nbsp;&nbsp;';
                                    if($ti[0]=='lang'&&$book[$ti[0]]=='Indonesian')echo '<span class="em em-flag-id"></span>&nbsp;&nbsp;';
                                    if($ti[0]=='format'&&$book[$ti[0]]=='PDF')echo '<span class="em em-blue_book"></span>&nbsp;&nbsp;';
                                    if($ti[0]=='format'&&$book[$ti[0]]=='EPUB')echo '<span class="em em-closed_book"></span>&nbsp;&nbsp;';
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