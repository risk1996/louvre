<div class="container">
    <h2>Account Detail</h2>
    <div class="row">
        <div class="container" style="border-style:  solid;">
           <div id="accordion" data-children=".item">
                <div class="item">
                    <a data-toogle="collapse" data-parent="#accordion" href="#userdetails" aria-expanded="true" aria-controls="userdetails">
                        User Details
                    </a>
                    <div id="userdetails" class="collapse show" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-5">
                                <p>Name   : <?php echo $user['fname']." ".$user['lname']; ?></p>
                            </div>
                            <div class="col-sm-5">
                                <p>Gender   : <?php echo $user['gender']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <p>Email   : <?php echo $user['email']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>