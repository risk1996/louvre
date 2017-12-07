
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
                                        <span class="fa fa-user-circle"></span>  Nama
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $user['fname']." ".$user['lname']; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <span class="fa fa-envelope-o"></span>  Email
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $user['email']; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    <span class="fa fa-venus-mars"</span> Gender
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
                                    <div class="col-sm-3">
                                        <img width="320" height="480" class="img-fluid" src="<?php echo site_url().'assets/covers/'.((file_exists('./assets/covers/'.$value[0]['isbn13'].'.png'))?$value[0]['isbn13'].'.png':'_placeholder.png'); ?>" alt="<?php echo $value[0]['title']; ?> Book Cover">
                                    </div>
                                    <div class="col-sm-9">
                                        <table class="table table-dark table-sm table-striped">
                                            <thead>
                                                <tr><th colspan="2"><h5>A Little Book Information</h5></th></tr>
                                            </head>
                                            <tbody>
                                                <?php foreach($value[0] as $key => $val):?>
                                                    
                                                        <?php if($key == "isbn13" || $key == "title" || $key == "pubdate" || $key == "author" || $key == "lang" || $key == "genre" || $key == "pages" || $key == "format"){ ?>
                                                            <tr>
                                                                <?php
                                                                    if($key == "isbn13")echo "<td>ISBN 13</td><td>:</td><td><span class='fa fa-book'></span> ".$val."</td>"; 
                                                                    else if($key == "title")echo "<td>Title</td><td>:</td><td><a href='".base_url()."books/".$value[0]['slug']."'><span class='fa fa-link'></span> ".$val."</a></td>";
                                                                    else if($key == "pubdate")echo "<td>Published Date</td><td>:</td><td><span class='fa fa-calendar'></span> ".$val."</td>";
                                                                    else if($key == "author")echo "<td>Author</td><td>:</td><td><span class='fa fa-edit'></span> ".$val."</td>";
                                                                    else if($key == "lang")echo "<td>Language</td><td>:</td><td>".$val."</td>";
                                                                    else if($key == "genre")echo "<td>Genres</td><td>:</td><td>".$val."</td>";
                                                                    else if($key == "format")echo "<td>Format</td><td>:</td><td><span class='fa fa-file-pdf-o'></span>&nbsp".$val."</td>";
                                                                    else if($key == "pages")echo "<td>Pages</td><td>:</td><td>".$val." pages</td>";
                                                                ?>
                                                            </tr>
                                                        <?php } ?>
                                                    
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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