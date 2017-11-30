<div class="container">
    <h2><?= $title ?></h2>
    <div class="row">
        <div class="col-sm-6">
            <?php echo form_open('users/register'); ?>
                <h3>User Information</h3>
                <h4>E-Mail</h4>
                <div class="input-group">
                    <span class="input-group-addon" id="emailaddon"><span class="fa fa-envelope"></span></span>
                    <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="E-Mail" aria-label="E-Mail" aria-describedby="emailaddon">
                </div>
                <?php echo form_error('email', '<p class="bg-danger">', '</p>'); ?>
                <?php echo form_error('email')?'':'<br>'; ?>
                <h4>Account Name</h4>
                <div class="input-group">
                    <span class="input-group-addon" id="nameaddon"><span class="fa fa-id-card"></span></span>
                    <input type="text" name="fname" value="<?php echo $fname; ?>" class="form-control" placeholder="First Name" aria-label="First Name" aria-describedby="nameaddon">
                    <input type="text" name="lname" value="<?php echo $lname; ?>" class="form-control" placeholder="Last Name" aria-label="Last Name" aria-describedby="nameaddon">
                </div>
                <?php echo form_error('fname', '<p class="bg-danger">', '</p>'); ?>
                <?php echo form_error('lname', '<p class="bg-danger">', '</p>'); ?>
                <?php echo form_error('fname')||form_error('lname')?'':'<br>'; ?>
                <h4>Account Password</h4>
                <div class="input-group">
                    <span class="input-group-addon" id="passaddon"><span class="fa fa-key"></span></span>
                    <input type="password" name="pass" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="passaddon">
                </div>
                <?php echo form_error('pass', '<p class="bg-danger">', '</p>'); ?>
                <?php echo form_error('pass')?'':'<br>'; ?>
                <div class="input-group">
                    <span class="input-group-addon" id="confpassaddon"><span class="fa fa-check"></span></span>
                    <input type="password" name="confpass" class="form-control" placeholder="Re-Type Password" aria-label="Re-Type Password" aria-describedby="confpassaddon">
                </div>
                <?php echo form_error('confpass', '<p class="bg-danger">', '</p>'); ?>
                <?php echo form_error('confpass')?'':'<br>'; ?>
                <h4>Gender</h4>
                <label class="form-check-label"><input class="form-check-input" type="radio" name="gender" value="M" <?php if(!isset($gender)||$gender=='M')echo 'checked'; ?>><span class="fa fa-mars"></span> Male</label><br>
                <label class="form-check-label"><input class="form-check-input" type="radio" name="gender" value="F" <?php if($gender=='F')echo 'checked'; ?>><span class="fa fa-venus"></span> Female</label><br>
                <label class="form-check-label"><input class="form-check-input" type="radio" name="gender" value="O" <?php if($gender=='O')echo 'checked'; ?>><span class="fa fa-genderless"></span> Other / Rather not Say</label><br>
                <br>
                <div class="form-check">
                    <label class="form-check-label"><input type="checkbox" name="subscribe" class="form-check-input" checked="checked">I'd love to receive news and promotions from The Louvre.</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label"><input type="checkbox" name="eulaaccept" class="form-check-input">I have read and accept the End User Lisence Agreement.</label>
                </div>
                <?php echo form_error('eulaaccept', '<p class="bg-danger">', '</p>'); ?>
                <?php echo form_error('eulaaccept')?'':'<br>'; ?>
                <button type="submit" name="submit" value="submit" class="btn btn-dark btn-block">Register</button>
                <br>
                <a href="<?php echo base_url(); ?>" class="btn btn-secondary btn-block">Cancel</a>
            </form>
        </div>
        <div class="col-sm-6">
            <h3>End User Lisence Agreement</h3>
            <iframe src="<?php echo site_url(); ?>assets/eula/eula.html" frameborder="0" width="100%" height="720px"></iframe>
        </div>
    </div>
</div>