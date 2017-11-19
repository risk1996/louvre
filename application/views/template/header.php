<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?> - The Louvre Bookstore</title>
    <link rel="icon" href="<?php echo site_url(); ?>/assets/branding/Favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo site_url(); ?>/assets/bootstrap-4.0.0-beta.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo site_url(); ?>/assets/bootstrap-slider/css/bootstrap-slider.css">
    <link rel="stylesheet" href="<?php echo site_url(); ?>/assets/css/customize.css">
    <link rel="stylesheet" href="<?php echo site_url(); ?>/assets/font-awesome-4.7.0/css/font-awesome.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container" style="margin-top: 0;">
                <a href="<?php echo site_url(); ?>" class="navbar-brand mb-0 h-1">
                    <img src="<?php echo site_url(); ?>/assets/branding/Louvre-Header.png" alt="The Louvre Header Icon" width="80" height="37" class="d-inline-block align-top">
                    The Louvre Bookstore
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item <?php if($title=='Home')echo 'active'; ?>"><a href="<?php echo site_url(); ?>" class="nav-link">Home</a></li>
                        <li class="nav-item <?php if($title=='About')echo 'active'; ?>"><a href="<?php echo site_url('about'); ?>" class="nav-link">About</a></li>
                    </ul>
                    <span style="margin-left: auto;">
                        <?php
                            if(isset($_SESSION['logged'])){
                                echo '<span class="fa fa-user-circle"></span>';
                            }
                            else{
                                echo '<button type="button" class="btn btn-outline-secondary" data-placement="bottom" data-toggle="popover" title="Login" data-content="';
                                    echo str_replace('"', '\\\'', form_open('home'));
                                        echo '<div class=\'input-group\'>';
                                            echo '<span class=\'input-group-addon\' id=\'emailaddon\'><span class=\'fa fa-envelope\'></span></span>';
                                            echo '<input type=\'email\' class=\'form-control\' placeholder=\'E-Mail\' aria-label=\'E-Mail\' aria-describedby=\'emailaddon\'>';
                                        echo '</div>';
                                        echo '<br>';
                                        echo '<div class=\'input-group\'>';
                                            echo '<span class=\'input-group-addon\' id=\'passwordaddon\'><span class=\'fa fa-key\'></span></span>';
                                            echo '<input type=\'password\' class=\'form-control\' placeholder=\'Password\' aria-label=\'Password\' aria-describedby=\'passwordaddon\'>';
                                        echo '</div>';
                                        echo '<br>';
                                        echo '<button class=\'btn btn-secondary btn-block\' type=\'submit\' name=\'submit\'>Login</button>';
                                        echo validation_errors();
                                    echo '</form>';
                                    echo '<hr>';
                                    echo '<a href=\''.site_url().'register\' class=\'btn btn-dark btn-block\' name=\'submit\' role=\'button\'>Register</a>';
                                    echo '" id="popover">';
                                echo '<span class="fa fa-sign-in"></span></button>';
                            }
                        ?>
                    </span>
                    &nbsp;&nbsp;
                    <?php echo form_open('books', array('class' => 'form-inline')); ?>
                        <div class="input-group">
                            <span class="input-group-addon" style="padding: 0 0 0 0;">
                                <select class="form-control" name="searchby">
                                    <option value="title">Title</option>
                                    <option value="isbn13">ISBN</option>
                                    <option value="author">Author</option>
                                </select>
                            </span>
                            <input type="text" name="keyword" class="form-control" placeholder="Keyword" aria-label="Keyword" aria-describedby="searchby">
                        </div>
                        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" name="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>