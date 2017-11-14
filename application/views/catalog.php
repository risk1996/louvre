<div class="container">
    <h1>Books Catalog</h1>
    <div class="row">
        <div class="col-sm-3">
            <h3>Search Criteria</h3>
            <div id="simple-search">
                <form action="" method="post" class="form-inline">
                    <div class="input-group">
                        <span class="input-group-addon" style="padding: 0 0 0 0;">
                            <select class="form-control" name="searchby">
                                <option>Title</option>
                                <option>ISBN</option>
                                <option>Author</option>
                                <option>Genre</option>
                            </select>
                        </span>
                        <input type="text" class="form-control" placeholder="Keyword" aria-label="Keyword" aria-describedby="searchby">
                    </div>
                    <br><br><br>
                    <button class="btn btn-secondary btn-block" type="submit" name="submit">Search</button>
                </form>
            </div>
            <div id="advanced-search">
                <form action="" method="">
                    <div class="input-group">
                        <span class="input-group-addon" id="titleaddon">Title</span>
                        <input type="text" class="form-control" aria-describedby="titleaddon">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon" id="isbnaddon">ISBN</span>
                        <input type="text" class="form-control" aria-describedby="isbnaddon">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon" id="authoraddon">Author</span>
                        <input type="text" class="form-control" aria-describedby="titleaddon">
                    </div>
                    <br>
                    <label for="pricerange">Price Range: <span id="slidervalue">$0 - $400</span></label>
                    <br>
                    <input class="slider" type="text" data-slider-ticks="[0, 100, 200, 300, 400]" data-slider-ticks-snap-bounds="30" data-slider-ticks-labels='["$0", "$100", "$200", "$300", "$400"]' data-slider-value="[0,400]" style="width:100%;"/>
                    <br><br>
                    <button class="btn btn-secondary btn-block" type="submit" name="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="col-sm-9">
            <h3>Search Result</h3>
        </div>
    </div>
</div>