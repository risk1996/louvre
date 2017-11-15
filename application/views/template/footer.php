    <br>
    <footer>
        <div class="card bg-dark">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6>Contact Us:</h6>
                            <span class="fa fa-info-circle"></span>&nbsp;info@louvre.dev <br>
                            <span class="fa fa-phone"></span>&nbsp;(+62)821 xxxx xxxx <br>
                            <span class="fa fa-whatsapp"></span>&nbsp;(+62)821 xxxx xxxx
                        </div>
                        <div class="col-sm-6">
                            <h6>&nbsp;</h6>
                            <span class="fa fa-map-marker"></span>&nbsp;Jl. Scientia Boulevard, Gading Serpong <br>
                            &nbsp;&nbsp;&nbsp;Tangerang, Banten-15811, Indonesia
                        </div>
                        <div class="col-sm-3">
                            <h6>Share This:</h6>
                            <span class="fa fa-share-alt"></span>&nbsp;
                            <span class="fa fa-facebook-official"></span>&nbsp;
                            <span class="fa fa-twitter"></span>&nbsp;
                            <span class="fa fa-google-plus"></span>&nbsp;
                            <span class="fa fa-instagram"></span>&nbsp;
                            <span class="fa fa-linkedin"></span>&nbsp;
                            <span class="fa fa-delicious"></span>&nbsp;
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-center" style="color: #aaaaaa; font-weight: 100; margin-bottom: 0;"><i>Copyright &copy; 2017 Stefanus Kurniawan - William Darian - Miqdad Abdurrahman</i></p>
            </div>
        </div>
    </footer>
    <script src="<?php echo site_url(); ?>/assets/jquery/jquery-3.2.1.js"></script>
    <script src="<?php echo site_url(); ?>/assets/popper/popper.js"></script>
    <script src="<?php echo site_url(); ?>/assets/bootstrap-4.0.0-beta.2-dist/js/bootstrap.js"></script>
    <script src="<?php echo site_url(); ?>/assets/ellipsis/ellipsis.js"></script>
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