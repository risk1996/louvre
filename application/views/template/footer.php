    <br>
    <footer>
        <div class="card bg-dark">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6>Site Map</h6>
                            <a href="<?php echo site_url(); ?>"><span class="fa fa-home"></span> Home</a><br>
                            <a href="<?php echo site_url('books'); ?>"><span class="fa fa-book"></span> Books</a><br>
                            <a href="<?php echo site_url('about'); ?>"><span class="fa fa-info-circle"></span> About</a>
                        </div>
                        <div class="col-sm-3">
                            <h6>Contact Us</h6>
                            <span class="fa fa-envelope"></span>&nbsp;info@louvre.dev <br>
                            <span class="fa fa-phone"></span>&nbsp;(+62)821 xxxx xxxx <br>
                            <span class="fa fa-whatsapp"></span>&nbsp;(+62)821 xxxx xxxx
                        </div>
                        <div class="col-sm-6">
                            <h6>&nbsp;</h6>
                            <span class="fa fa-map-marker"></span>&nbsp;Jl. Scientia Boulevard, Gading Serpong <br>
                            &nbsp;&nbsp;&nbsp;Tangerang, Banten-15811, Indonesia
                        </div>
                    </div>
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
    </script>
    <script type="text/javascript">
        $(".ellipsis").ellipsis();
    </script>
</body>