<div class="container">
    <h1>Books Catalog</h1>
    <div class="row">
        <div class="col-sm-3">
            <h3>Search Criteria</h3>
            <?php echo form_open('books'); ?>
                <div class="input-group">
                    <span class="input-group-addon" id="titleaddon" style="width: 70px;">Title</span>
                    <input type="text" name="title" class="form-control" aria-describedby="titleaddon" placeholder="Keyword" value="<?php if(isset($criteria['title']))echo $criteria['title']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="isbnaddon" style="width: 70px;">ISBN</span>
                    <input type="text" name="isbn13" class="form-control" aria-describedby="isbnaddon" placeholder="Keyword" value="<?php if(isset($criteria['isbn13']))echo $criteria['isbn13']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="authoraddon" style="width: 70px;">Author</span>
                    <input type="text" name="author" class="form-control" aria-describedby="titleaddon" placeholder="Keyword" value="<?php if(isset($criteria['author']))echo $criteria['author']; ?>">
                </div>
                <br>
                <label for="pricerange">Price Range: <span id="pricerange">$<?php if(isset($criteria['price']))echo explode(',', $criteria['price'])[0]; else echo '0'; ?> - $<?php if(isset($criteria['price']))echo explode(',', $criteria['price'])[1]; else echo '400'; ?></span></label>
                <br>
                <script src="<?php echo site_url(); ?>/assets/bootstrap-slider/bootstrap-slider.js"></script>
                <input id="priceslider" name="price" data-slider-id="priceslider" type="text" data-slider-ticks="[0, 100, 200, 300, 400]" data-slider-ticks-snap-bounds="30" data-slider-ticks-labels='["$0", "$100", "$200", "$300", "$400"]' data-slider-value="[<?php if(isset($criteria['price']))echo explode(',', $criteria['price'])[0]; else echo '0'; ?>,<?php if(isset($criteria['price']))echo explode(',', $criteria['price'])[1]; else echo '400'; ?>]" style="width:100%;"/>
                <script>
                    var slider = new Slider('#priceslider');
                    slider.on("slide", function(sliderValue) {
                        var val = String(sliderValue).split(',');
                        document.getElementById("pricerange").textContent = '$' + val[0] + ' - ' + '$' + val[1];
                    });
                </script>
                <br><br>
                <label for="pagesslider">Page Range: <span id="pagesrange"><?php if(isset($criteria['pages']))echo explode(',', $criteria['pages'])[0]; else echo '0'; ?> - <?php if(isset($criteria['pages']))echo explode(',', $criteria['pages'])[1]; else echo '5000'; ?></span></label>
                <br>
                <input id="pagesslider" name="pages" data-slider-id="pagesslider" type="text" data-slider-ticks="[0, 1000, 2000, 3000, 4000, 5000]" data-slider-ticks-snap-bounds="30" data-slider-ticks-labels='["0", "1000", "2000", "3000", "4000", "5000"]' data-slider-value="[<?php if(isset($criteria['pages']))echo explode(',', $criteria['pages'])[0]; else echo '0'; ?>,<?php if(isset($criteria['pages']))echo explode(',', $criteria['pages'])[1]; else echo '5000'; ?>]" style="width:100%;"/>
                <script>
                    var slider = new Slider('#pagesslider');
                    slider.on("slide", function(sliderValue) {
                        var val = String(sliderValue).split(',');
                        document.getElementById("pagesrange").textContent = val[0] + ' - ' + val[1];
                    });
                </script>
                <br><br>
                <label>Language:</label>
                <select class="form-control" name="lang">
                    <option value="">Any</option>
                    <?php
                        foreach($langs as $lang)echo '<option value="'.$lang.'" '.((isset($criteria['lang'])&&$criteria['lang']==$lang)?'selected':'').'>'.$lang.'</option>';
                    ?>
                </select>
                <br>
                <label>Format:</label>
                <select class="form-control" name="format">
                    <option value="">Any</option>
                    <?php
                        foreach($formats as $format)echo '<option value="'.$format.'" '.((isset($criteria['format'])&&$criteria['format']==$format)?'selected':'').'>'.$format.'</option>';
                    ?>
                </select>
                <br>
                <label>Genre:</label>
                <br>
                <?php
                    foreach($genres as $genre)echo '<label><span class="badge badge-secondary"><input type="checkbox" name="genre[]" value="'.$genre.'" '.((isset($criteria['genre']) && in_array($genre, explode(',',$criteria['genre'])))?'checked':'').'> '.$genre.'</span></label>&nbsp;';
                ?>
                <br><br>
                <button class="btn btn-dark btn-block" type="submit" name="submit">Refine Search</button>
            </form>
        </div>
        <div class="col-sm-9">
            <h3>Search Result (<?php echo count($books); ?>)</h3>
            <div class="row">
                <?php
                    $ctr=0;
                    foreach($books as $book){
                        echo '<div class="col-sm-3">';
                            echo '<div class="card bg-dark">';
                            echo '<p class="card-title text-center singleline"><b><a href="'.site_url('books/'.$book['slug']).'">'.$book['title'].'</a></b></p>';
                            echo '<a href="'.site_url('books/'.$book['slug']).'"><img class="card-img-top fill-3-2" src="'.site_url().'assets/covers/'.((file_exists('./assets/covers/'.$book['isbn13'].'.png'))?$book['isbn13'].'.png':'_placeholder.png').'" alt="'.$book['title'].' Book Cover"></a>';
                            echo '<p class="card-subtitle text-center mb-2 text-muted" style="margin: 0 !important;">by '.$book['author'].'</p>';
                            echo '<p class="text-center text-muted" style="margin: 0;"><small>'.$book['lang'].' '.$book['format'].'</small></p>';
                            echo '<p class="text-center" style="margin: 0;">'.($book['price']>$book['discountedprice']?'<strike class="text-muted">$ '.$book['price'].'</strike>   ':'').'<big>$ '.$book['discountedprice'].'</big></p>';
                            echo '<button class="btn btn-sm btn-secondary"><span class="fa fa-cart-plus"></span> Add to Cart</button>';
                            echo '</div>';
                        echo '</div>';
                        if($ctr++&&$ctr%4==0)echo '</div><br><div class="row">';
                    }
                ?>
            </div>
            <br>
            <div class="row">
                <nav aria-label="Search results pages" style="margin: 0 auto;">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><span class="fa fa-angle-left"></span><span class="fa fa-angle-left"></span></a></li>
                        <li class="page-item"><a class="page-link" href="#"><span class="fa fa-angle-left"></span></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"><span class="fa fa-angle-right"></span></a></li>
                        <li class="page-item"><a class="page-link" href="#"><span class="fa fa-angle-right"></span><span class="fa fa-angle-right"></span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>