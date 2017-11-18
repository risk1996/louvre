<div class="container">
    <h1>Books Catalog</h1>
    <div class="row">
        <div class="col-sm-3">
            <h3>Search Criteria</h3>
            <?php echo form_open('books'); ?>
                <div class="input-group">
                    <span class="input-group-addon" id="titleaddon" style="width: 70px;">Title</span>
                    <input type="text" name="title" class="form-control" aria-describedby="titleaddon" placeholder="Keyword">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="isbnaddon" style="width: 70px;">ISBN</span>
                    <input type="text" name="isbn13" class="form-control" aria-describedby="isbnaddon" placeholder="Keyword">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="authoraddon" style="width: 70px;">Author</span>
                    <input type="text" name="author" class="form-control" aria-describedby="titleaddon" placeholder="Keyword">
                </div>
                <br>
                <label for="pricerange">Price Range: <span id="pricerange">$0 - $400</span></label>
                <br>
                <script src="<?php echo site_url(); ?>/assets/bootstrap-slider/bootstrap-slider.js"></script>
                <input id="priceslider" name="price" data-slider-id="priceslider" type="text" data-slider-ticks="[0, 100, 200, 300, 400]" data-slider-ticks-snap-bounds="30" data-slider-ticks-labels='["$0", "$100", "$200", "$300", "$400"]' data-slider-value="[0,400]" style="width:100%;"/>
                <script>
                    var slider = new Slider('#priceslider');
                    slider.on("slide", function(sliderValue) {
                        var val = String(sliderValue).split(',');
                        document.getElementById("pricerange").textContent = '$' + val[0] + ' - ' + '$' + val[1];
                    });
                </script>
                <br>
                <label for="pagesslider">Page Range: <span id="pagesrange">0 - 5000</span></label>
                <br>
                <input id="pagesslider" name="pages" data-slider-id="pagesslider" type="text" data-slider-ticks="[0, 1000, 2000, 3000, 4000, 5000]" data-slider-ticks-snap-bounds="30" data-slider-ticks-labels='["0", "1000", "2000", "3000", "4000", "5000"]' data-slider-value="[0,5000]" style="width:100%;"/>
                <script>
                    var slider = new Slider('#pagesslider');
                    slider.on("slide", function(sliderValue) {
                        var val = String(sliderValue).split(',');
                        document.getElementById("pagesrange").textContent = val[0] + ' - ' + val[1];
                    });
                </script>
                <br><br>
                <button class="btn btn-dark btn-block" type="submit" name="submit">Search</button>
            </form>
        </div>
        <div class="col-sm-9">
            <h3>Search Result</h3>
            <?php var_dump($books); ?>
        </div>
    </div>
</div>