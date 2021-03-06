<div class="container">
    <h1>Books Catalog</h1>
    <div class="row">
        <div class="col-sm-3">
            <h3>Search Criteria</h3>
            <?php echo form_open('catalog', array('method' => 'get')); ?>
                <div class="input-group">
                    <span class="input-group-addon" id="titleaddon" style="width: 70px;">Title</span>
                    <input type="text" name="title" class="form-control" aria-describedby="titleaddon" placeholder="Keyword" value="<?php if(isset($criteria['title']))echo $criteria['title']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="isbnaddon" style="width: 70px;">ISBN13</span>
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
                <label>Discount:</label>
                <select class="form-control" name="discount">
                    <option value="">Any</option>
                    <option value="TRUE" <?php if(isset($criteria['discount'])&&$criteria['discount']=='TRUE')echo 'selected="selected"'; ?>>Yes</option>
                    <option value="FALSE" <?php if(isset($criteria['discount'])&&$criteria['discount']=='FALSE')echo 'selected="selected"'; ?>>No</option>
                </select>
                <br>
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
                <select class="form-control" name="language">
                    <option value="">Any</option>
                    <?php
                        foreach($langs as $lang)echo '<option value="'.$lang.'" '.((isset($criteria['language'])&&$criteria['language']==$lang)?'selected':'').'>'.$lang.'</option>';
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
            <h3>Search Result</h3>
            <div class="row">
                <?php
                    if(count($books)>0){
                        $ctr=0;
                        $bookchunk = array_chunk($books, 12);
                        foreach($bookchunk[$page] as $book){
                            echo '<div class="col-sm-3">';
                                echo '<div class="card bg-dark">';
                                echo '<p class="card-title text-center singleline"><b><a href="'.site_url('books/'.$book['slug']).'">'.$book['title'].'</a></b></p>';
                                echo '<a href="'.site_url('books/'.$book['slug']).'"><img class="card-img-top fill-3-2" src="'.site_url().'assets/covers/'.((file_exists('./assets/covers/'.$book['isbn13'].'.png'))?$book['isbn13'].'.png':'_placeholder.png').'" alt="'.$book['title'].' Book Cover"></a>';
                                echo '<p class="card-subtitle text-center mb-2 text-muted singleline" style="margin: 0 !important;">by '.$book['author'].'</p>';
                                echo '<p class="text-center text-muted" style="margin: 0;"><small>'.$book['language'].' '.$book['format'].'</small></p>';
                                echo '<p class="text-center" style="margin: 0;">'.($book['price']>$book['discountedprice']?'<strike class="text-muted">$ '.$book['price'].'</strike>   ':'').'<big>$ '.$book['discountedprice'].'</big></p>';
                                if($this->users_model->user_own($this->session->userdata('email'), $book['isbn13'])){
                                    echo '<a class="btn btn-secondary btn-sm btn-block" href="'.site_url().'users"><span class="fa fa-book"></span> Owned</a>';
                                }else if($this->purchase_model->in_cart($this->session->userdata('email'), $book['isbn13'])){
                                    echo '<a class="btn btn-secondary btn-sm btn-block" href="'.site_url().'cart"><span class="fa fa-cart-arrow-down"></span> In Cart</a>';
                                }else if($this->session->userdata('roles') == 'buyer'){
                                    echo form_open('purchase/add');
                                        $q = $this->input->server('QUERY_STRING');
                                        echo '<input type="hidden" name="isbn13" value="'.$book['isbn13'].'">';
                                        echo '<input type="hidden" name="caller" value="'.current_url().($q!=''?'?'.$q:'').'">';
                                        echo '<button type="submit" class="btn btn-sm btn-secondary btn-block"><span class="fa fa-cart-plus"></span> Add to Cart</button>';
                                    echo '</form>';
                                }
                                echo '</div>';
                            echo '</div>';
                            if($ctr++&&$ctr%4==0)echo '</div><br><div class="row">';
                        }
                    }else{
                        echo '<p><i>There are no books that match your search criteria.</i></p>';
                    }
                ?>
            </div>
            <br>
            <h6 class="pull-right"><?php echo count($books); ?> result<?php echo count($books)==1?'':'s'; ?> in {elapsed_time} seconds.</h6>
            <br><br>
            <div class="row"><?php echo $pagination; ?></div>
        </div>
    </div>
</div>