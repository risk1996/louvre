    <footer>
        <!-- Footernya pake apa? Atau ga mau pake footer? -->
    </footer>
    <script src="<?php echo site_url(); ?>/assets/jquery/jquery-3.2.1.js"></script>
    <script src="<?php echo site_url(); ?>/assets/popper/popper.js"></script>
    <script src="<?php echo site_url(); ?>/assets/bootstrap-4.0.0-beta.2-dist/js/bootstrap.js"></script>
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
</body>