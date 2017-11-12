<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?> - The Louvre Bookstore</title>
    <link rel="icon" href="assets/branding/Favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/bootstrap-4.0.0-beta.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/customize.css">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="<?php echo site_url(); ?>" class="navbar-brand mb-0 h-1">
                    <img src="assets/branding/Louvre-Header.png" alt="The Louvre Header Icon" width="80" height="37" class="d-inline-block align-top">
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
                    <form action="" method="post" class="form-inline" style="margin-left: auto;">
                        <div class="input-group">
                            <span class="input-group-addon" style="padding: 0 0 0 0;">
                                <select class="form-control" name="searchby">
                                    <option>Name</option>
                                    <option>ISBN</option>
                                    <option>Author</option>
                                    <option>Genre</option>
                                </select>
                            </span>
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="searchby">
                        </div>
                        &nbsp;&nbsp;
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>    