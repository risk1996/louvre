    <br>
    <footer>
        <div class="card bg-dark">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6>Site Map</h6>
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link <?php if($this->uri->segment(1)==NULL)echo 'active'; ?>" href="<?php echo site_url(); ?>"><span class="fa fa-home"></span> Home</a></li>
                                <li class="nav-item"><a class="nav-link <?php if($this->uri->segment(1)=='catalog')echo 'active'; ?>" href="<?php echo site_url('catalog'); ?>"><span class="fa fa-book"></span> Books</a></li>
                                <?php
                                    if($this->session->userdata('email')!==NULL){
                                        echo '<li class="nav-item">';
                                            echo '<a class="nav-link '.(($this->uri->segment(1)=='users')?'active':'').'" href="'.site_url('users').'"><span class="fa fa-user-circle"></span> Account</a>';
                                        echo '</li>';
                                        echo '<li class="nav-item">';
                                            $cart = $this->purchase_model->cart_get($this->session->userdata('email'));
                                            echo '<a class="nav-link '.(($this->uri->segment(1)=='cart')?'active':'').'" href="'.site_url('cart').'"><span class="fa fa-shopping-cart"></span> Cart <span class="badge badge-light">'.count($cart).'</span></a>';
                                        echo '</li>';
                                    }
                                ?>
                                <li class="nav-item"><a class="nav-link <?php if($this->uri->segment(1)=='about')echo 'active'; ?>" href="<?php echo site_url('about'); ?>"><span class="fa fa-info-circle"></span> About</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <h6>Contact Us</h6>
                            <span class="fa fa-envelope"></span>&nbsp;info@louvre.dev <br>
                            <span class="fa fa-phone"></span>&nbsp;(+62)821 xxxx xxxx <br>
                            <span class="fa fa-whatsapp"></span>&nbsp;(+62)821 xxxx xxxx
                        </div>
                        <div class="col-sm-4">
                            <h6>&nbsp;</h6>
                            <span class="fa fa-map-marker"></span>&nbsp;Jl. Scientia Boulevard, Gading Serpong <br>
                            &nbsp;&nbsp;&nbsp;Tangerang, Banten-15811, Indonesia
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <h6 style="margin: 0 auto; display: block;">Share This</h6>
                        <br>
                    </div>
                    <div class="row">
                        <span style="margin-left:auto;"></span>
                        <a href="#" class="btn btn-outline-light btn-circle"><span class="fa fa-share-alt"></span></a>&nbsp;
                        <a href="#" class="btn btn-outline-light btn-circle"><span class="fa fa-facebook"></span></a>&nbsp;
                        <a href="#" class="btn btn-outline-light btn-circle"><span class="fa fa-twitter"></span></a>&nbsp;
                        <a href="#" class="btn btn-outline-light btn-circle"><span class="fa fa-google-plus"></span></a>&nbsp;
                        <a href="#" class="btn btn-outline-light btn-circle"><span class="fa fa-instagram"></span></a>&nbsp;
                        <a href="#" class="btn btn-outline-light btn-circle"><span class="fa fa-linkedin"></span></a>&nbsp;
                        <a href="#" class="btn btn-outline-light btn-circle"><span class="fa fa-delicious"></span></a>
                        <span style="margin-right:auto;"></span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-center" style="color: #aaaaaa; font-weight: 100; margin-bottom: 0;"><i>Copyright &copy; 2017 Stefanus Kurniawan - William Darian - Miqdad Abdurrahman</i></p>
            </div>
        </div>
    </footer>
    <script src="<?php echo site_url(); ?>assets/jquery/jquery-3.2.1.js"></script>
    <script src="<?php echo site_url(); ?>assets/popper/popper.js"></script>
    <script src="<?php echo site_url(); ?>assets/bootstrap-4.0.0-beta.2-dist/js/bootstrap.js"></script>
    <script src="<?php echo site_url(); ?>assets/ellipsis/ellipsis.js"></script>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
        $('#popover').popover({ 
            html : true,
            title: function() {
            return $("#popover-head").html();
            },
            content: function() {
            return $("#popover-content").html();
            }
        });
        <?php if(isset($log))echo '$(\'#popover\').popover(\'show\')'; ?>
    </script>
    <script type="text/javascript">
        $(".ellipsis").ellipsis();
    </script>
    <script>
        $(document).ready(function(){
            $('#dat').DataTable();
        });
    </script>
    <?php if(isset($crud))foreach($crud->js_files as $file)echo '<script src="'.$file.'"></script>'; ?>
</body>