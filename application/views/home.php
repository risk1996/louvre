<div id="slides" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php
            foreach($slidercontents as $slidercontent){
                echo '<div class="carousel-item '.(($slidercontent==$slidercontents[0])?'active':'').'">';
                    echo '<img class="d-block w-100" src="'.site_url().'assets/slide/'.$slidercontent['promotionsubtitle'].'" alt="'.$slidercontent['promotiontitle'].' Image">';
                    echo '<div class="carousel-caption d-none d-md-block">';
                        echo '<h3>'.$slidercontent['promotiontitle'].'</h3>';
                        echo '<p>'.$slidercontent['promotioninfo'].'</p>';
                        echo '<a class="btn btn-outline-light" href="'.site_url().'books/'.$slidercontent['slug'].'">Learn More</a>';
                    echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
    <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<br>
<div class="container">
    <div class="jumbotron" style="background-image: url('<?php echo site_url(); ?>assets/jumbotron/bg.jpg'); background-size: cover;">
        <h1 class="display-3">Holiday Sale</h1>
        <p class="lead">Save up to 55% off your favourite books this winter!</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p>
    </div>
    <div class="row">
        <div class="card-deck">
            <?php
                foreach($books as $book){
                    echo '<div class="card bg-dark">';
                        echo '<a href="'.site_url('books/'.$book['slug']).'"><img class="card-img-top fill-3-2" src="'.site_url().'assets/covers/'.((file_exists('./assets/covers/'.$book['isbn13'].'.png'))?$book['isbn13'].'.png':'_placeholder.png').'" alt="'.$book['title'].' Book Cover"></a>';
                        echo '<div class="card-body">';
                            echo '<h4 class="card-title singleline"><a href="'.site_url('books/'.$book['slug']).'">'.$book['title'].'</a></h4>';
                            echo '<p class="card-text card-text-limit ellipsis multiline">'.$book['summary'].'</p>';
                            echo '<a href="'.site_url('books/'.$book['slug']).'" class="btn btn-secondary btn-block">More Info</a>';
                        echo '</div>';
                        $genres=explode(',', $book['genre']);
                        echo '<div class="card-footer text-muted">';
                        foreach($genres as $genre){
                            echo form_open('catalog', array('id'=>$book['isbn13'].$genre.'form', 'style'=>'display: inline;'));
                                echo '<input type="hidden" name="genre[]" value="'.$genre.'">';
                            echo '</form>';
                            echo '<a href="#" onclick="document.getElementById(\''.$book['isbn13'].$genre.'form\').submit();" class="badge badge-secondary">'.$genre.'</a>&nbsp;';
                        }
                        echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</div>