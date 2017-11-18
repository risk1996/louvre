<div class="container">
    <h2><?= $title ?></h2>
    <div class="row">
        <div class="col-sm-6">
            <?php form_open('users/register'); ?>
                <h3>User Information</h3>
                <div class="input-group">
                    <span class="input-group-addon" id="emailaddon"><span class="fa fa-envelope"></span></span>
                    <input type="email" name="email" class="form-control" placeholder="E-Mail" aria-label="E-Mail" aria-describedby="emailaddon">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="nameaddon"><span class="fa fa-id-card"></span></span>
                    <input type="text" name="firstname" class="form-control" placeholder="First Name" aria-label="First Name" aria-describedby="nameaddon">
                    <input type="text" name="lastname" class="form-control" placeholder="Last Name" aria-label="Last Name" aria-describedby="nameaddon">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="passaddon"><span class="fa fa-key"></span></span>
                    <input type="password" name="pass" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="passaddon">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="confpassaddon"><span class="fa fa-check"></span></span>
                    <input type="password" name="confpass" class="form-control" placeholder="Re-Type Password" aria-label="Re-Type Password" aria-describedby="confpassaddon">
                </div>
                <br>
                <div class="form-check">
                    <label class="form-check-label"><input type="checkbox" name="subscribe" class="form-check-input" checked="checked">I'd love to receive news and promotions from The Louvre.</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label"><input type="checkbox" name="eulaaaccept" class="form-check-input">I have read and accept the End User Lisence Agreement.</label>
                </div>
                <br>
                <button class="btn btn-dark btn-block">Register</button>
            </form>
        </div>
        <div class="col-sm-6">
            <h3>End User Lisence Agreement</h3>
            <iframe src="<?php echo site_url(); ?>assets/eula/eula.html" frameborder="0" width="100%" height="720px"></iframe>
        </div>
    </div>
</div>