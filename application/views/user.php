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
                        <p class="mb-3">
                        Donec at ipsum dignissim, rutrum turpis scelerisque, tristique lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus nec dui turpis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>