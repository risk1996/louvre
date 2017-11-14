<div id="slides" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" src="assets/slide/a.png" alt="First slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="assets/slide/b.png" alt="Second slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="assets/slide/c.png" alt="Third slide">
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
    <div class="row">
        <?php
            $books = array(array(
                'title' => 'Placeholder',
                'cover' => '_placeholder',
                'text'  => 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
                'foot'  => '2 days ago',
                'slug'  => 'placeholder'
            ));
            foreach($books as $book){
                echo '<div class="col-sm-3">';
                    echo '<div class="card bg-dark">';
                        echo '<img class="card-img-top" src="assets/covers/'.$book['cover'].'.png" alt="'.$book['title'].' Book Cover">';
                        echo '<div class="card-body">';
                            echo '<h4 class="card-title">'.$book['title'].'</h4>';
                            echo '<p class="card-text">'.$book['text'].'</p>';
                            echo '<a href="'.site_url('book/'.$book['slug']).'" class="btn btn-secondary">More Info</a>';
                        echo '</div>';
                        echo '<div class="card-footer text-muted">'.$book['foot'].'</div>';
                    echo '</div>';
                echo '</div>';
            }
        ?>
</div>