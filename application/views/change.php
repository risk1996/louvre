<div class="container">
    <h2><?= $title ?></h2>
    <div class="row">
        <div class="col-sm-6">
            <?php echo form_open('users/change'); ?>
                <h3>User Information</h3>
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
                    <span class="input-group-addon" id="oldpassaddon"><span class="fa fa-key"></span></span>
                    <input type="password" name="oldpass" class="form-control" placeholder="Old Password" aria-label="Old Password" aria-describedby="oldpassaddon">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="passaddon"><span class="fa fa-key"></span></span>
                    <input type="password" name="pass" class="form-control" placeholder="New Password" aria-label="Password" aria-describedby="passaddon">
                </div>
                <?php echo form_error('pass', '<p class="bg-danger">', '</p>'); ?>
                <?php echo form_error('pass')?'':'<br>'; ?>
                <div class="input-group">
                    <span class="input-group-addon" id="confpassaddon"><span class="fa fa-check"></span></span>
                    <input type="password" name="confpass" class="form-control" placeholder="Re-Type Password" aria-label="Re-Type Password" aria-describedby="confpassaddon">
                </div>
                <?php echo form_error('confpass', '<p class="bg-danger">', '</p>'); ?>
                <?php echo form_error('confpass')?'':'<br>'; ?>
                
                <button type="submit" name="submit" value="submit" class="btn btn-dark btn-block">Update</button>
                <br>
                <a href="<?php echo base_url(); ?>" class="btn btn-secondary btn-block">Cancel</a>
            </form>
        </div>
    </div>
</div>