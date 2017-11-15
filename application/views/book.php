<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <img class="img-fluid" src="<?php echo site_url().'assets/covers/'.((file_exists('./assets/covers/'.$book['isbn13'].'.png'))?$book['isbn13'].'.png':'_placeholder.png'); ?>" alt="<?php echo $book['title']; ?> Book Cover">
            <button class="btn btn-secondary btn-block">Look at Preview</button>
            <h3 class="text-center">$<?php echo $book['price']; ?></h3>
            <button class="btn btn-primary btn-block">Buy</button>
        </div>
        <div class="col-sm-6">
            <h2><?php echo $book['title']; ?></h2>
            <h4>By <?php echo $book['author']; ?></h4>
            <p><?php echo $book['summary']; ?></p>
            <?php
                $genres=explode(',', $book['genre']);
                foreach($genres as $genre)echo '<a href="#" class="badge badge-secondary">'.$genre.'</a>&nbsp;';
            ?>
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