<div class="container chat">
    <div class="row">
          <div class="col-md-12 logo"></div>
          <a class="back-btn" href="<?php echo Config::get('URL'); ?>"><i class="fa fa-angle-left"></i>Back</a>
        <div class="container">
            <div id="signupSuccess" class="alert alert-success" style="display:none">
                <p id="signupSuccessText">Thanks for signing up! You'll be among the first to know when we launch.</p>
            </div>
            <div id="signupDuplicate" class="alert alert-success" style="display:none">
                <p id="signupDuplicateText">Fear not, you're already on the list! You'll be among the first to know when we launch.</p>
            </div>
            <div id="signupError" class="alert alert-info" style="display:none">
                <p id="signupErrorText">Well this is embarrassing. It looks like we're having trouble getting you on the list.</p>
            </div>

            <div id="conversation" style="width: 400px; height: 400px; border: 1px solid #ccc; background-color: #eee; padding: 4px; overflow: scroll"></div>
            <form id="chatform" style="margin-top: 10px" onsubmit="return pushChat();">
                <input type="text" id="wisdom" size="80" value="" placeholder="check my data">
            </form>

            <!-- Modal -->
            <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Provide a few details and we'll be in touch...</h4>
                        </div>
                        <div class="modal-body">
                            <form id="signupForm" role="form">
                                <input type="hidden" id="theme" name="theme" value="<%= theme %>"/>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your email address">
                                </div>
                                <div class="form-group">
                                    <label for="previewAccess">Interested in Preview Access?</label>
                                    <select class="form-control" name="previewAccess">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button id="signup" type="button" class="btn btn-primary">Sign Up!</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </div> <!-- /container -->
    </div>
</div>
