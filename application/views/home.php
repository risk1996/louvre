<div id="slides" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="assets/slide/harpot.png" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Harry Potter and the Deathly Hallows</h3>
                <p>Final book of the series usulaly marked the ending. But does it?</p>
                <button class="btn btn-outline-light">Learn More</button>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="assets/slide/hgt.png" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>The Hunger Games Trilogy</h3>
                <p>The Hunger Games Trilogy boxed set is out now!</p>
                <button class="btn btn-outline-light">Learn More</button>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="assets/slide/ndt.png" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>His Latest Book</h3>
                <p>Take a look at Neil DeGrasse Tyson's latest book.</p>
                <button class="btn btn-outline-light">Learn More</button>
            </div>
        </div>
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
    <div class="jumbotron" style="background-image: url(https://image.freepik.com/free-photo/wooden-texture_1208-334.jpg); background-size: cover;">
        <h1 class="display-3">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
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