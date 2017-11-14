<div class="row">
    <div class="col-sm-2">
        <img src="/assets/cover/<?php echo $book['cover']; ?>" alt="<?php echo $book['title']; ?> Book Cover">
        <button class="btn btn-secondary btn-sm">Look at Preview</button>
        <h3>$<?php echo $price; ?></h3>
        <button class="btn btn-primary">Buy</button>
    </div>
    <div class="col-sm-7">
        <h2><?php echo $title; ?></h2>
        <h4>By <?php echo $author; ?></h4>
        <p><?php echo $summary; ?></p>
        <a href="#" class="badge badge-secondary"><?php echo $genre; ?></a>
    </div>
    <div class="col-sm-3">
        <?php
            if(!count($rating))echo '<div class="row"><p><i>There are no reviews yet.</i></p></div>';
            else{
                foreach($rating as $r){
                    echo '<div class="row" style="margin-left:auto; margin-right:auto;">';
                    $fs = intval(floor($r['rating']/2));
                    $hs = intval(floor($r['rating']%2));
                    $es = intval(floor((10-$r['rating'])/2));
                    while($fs--) echo '<span class="fa fa-star"></span>';
                    while($hs--) echo '<span class="fa fa-star-half-o"></span>';
                    while($es--) echo '<span class="fa fa-star-o"></span>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo $r['review'];
                    echo '</div>';
                }
            }
        ?>
    </div>
</div>