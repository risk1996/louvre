
<div class="container">
    <h2>Account Detail</h2>
    <div class="row">
        <div class="container" style="border-style:  solid;">
            <div id="accordion" data-children=".item">
                <div class="item">
                    <a data-toggle="collapse" data-parent="#accordion" href="#userdetails" aria-expanded="true" aria-controls="userdetails">
                        <h3>USER DETAILS</h3>
                    </a>
                    <div id="userdetails" class="collapse" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Nama
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $user['fname']." ".$user['lname']; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        Email
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $user['email']; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        Gender
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $user['gender']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-default btn-lg" href="#"><span class="fa fa-pencil-square-o"></span>Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <a data-toggle="collapse" data-parent="#accordion" href="#userbooks" aria-expanded="false" aria-controls="userbooks">
                        <h3>USER BOOKS</h3>
                    </a>
                    <div id="userbooks" class="collapse" role="tabpanel">
                        <?php foreach($user['bookdetails'] as $som => $value):?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img width="160" height="240" class="img-fluid" src="<?php echo site_url().'assets/covers/'.((file_exists('./assets/covers/'.$value[0]['isbn13'].'.png'))?$value[0]['isbn13'].'.png':'_placeholder.png'); ?>" alt="<?php echo $value[0]['title']; ?> Book Cover">
                                    </div>
                                    <div class="col-sm-10">
                                        <?php foreach($value[0] as $key => $val):?>
                                            <div class="row">
                                                <?php if($key == "isbn13" || $key == "title" || $key == "pubdate" || $key == "author" || $key == "lang" || $key == "genre" || $key == "pages" || $key == "format"){ ?>
                                                    <div class="col-sm-2">
                                                        <?php echo strtoupper($key); ?>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <?php echo $val; ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>