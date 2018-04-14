        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo Config::get('URL'); ?>public/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="<?php echo Config::get('URL'); ?>public/js/ie10-viewport-bug-workaround.js"></script>
        <?php if ($this->checkForActiveControllerAndAction("cybersecurity/index")) { ?>
        <script src="https://sdk.amazonaws.com/js/aws-sdk-2.41.0.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#signup").click(function() {
                        $.post( "/signup", $("#signupForm").serialize(),
                            function(data) {
                                $("#signupSuccess").show();
                            }
                        )
                            .error(function(xhr) {
                                switch(xhr.status) {
                                    case 409:
                                        $("#signupDuplicate").show();
                                        break;
                                    default:
                                        $("#signupError").show();
                                }
                            })
                            .always(function() {
                                $("#signupModal").modal('hide');
                            });
                    })
                })
            </script>
        <?php } ?>
    </body>
</html>