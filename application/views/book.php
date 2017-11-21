<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <img class="img-fluid" src="<?php echo site_url().'assets/covers/'.((file_exists('./assets/covers/'.$book['isbn13'].'.png'))?$book['isbn13'].'.png':'_placeholder.png'); ?>" alt="<?php echo $book['title']; ?> Book Cover">
            <button class="btn btn-secondary btn-block">Look at Preview</button>
            <h3 class="text-center">$<?php echo $book['price']; ?></h3>
            <button class="btn btn-primary btn-block">Add to Cart</button>
        </div>
        <div class="col-sm-6">
            <h2><?php echo $book['title']; ?></h2>
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
            <h5 class="text-muted">Technical Information</h5>
            <p class="text-muted">
                ISBN: <?php echo $book['isbn13']; ?><br>
                Pages: <?php echo $book['pages']; ?><br>
                Language: <?php echo $book['lang']; ?><br>
                Format: <?php echo $book['format']; ?>
            </p>
        </div>
        <div class="col-sm-3">
            <?php
                // if(!count($rating))echo '<div class="row"><p><i>There are no reviews yet.</i></p></div>';
                // else{
                //     foreach($rating as $r){
                //         echo '<div class="row" style="margin-left:auto; margin-right:auto;">';
                //         $fs = intval(floor($r['rating']/2));
                //         $hs = intval(floor($r['rating']%2));
                //         $es = intval(floor((10-$r['rating'])/2));
                //         while($fs--) echo '<span class="fa fa-star"></span>';
                //         while($hs--) echo '<span class="fa fa-star-half-o"></span>';
                //         while($es--) echo '<span class="fa fa-star-o"></span>';
                //         echo '</div>';
                //         echo '<div class="row">';
                //         echo $r['review'];
                //         echo '</div>';
                //     }
                // }
            ?>
        </div>
    </div>
</div>