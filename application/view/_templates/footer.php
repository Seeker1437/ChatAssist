        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo Config::get('URL'); ?>public/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="<?php echo Config::get('URL'); ?>public/js/ie10-viewport-bug-workaround.js"></script>
        <!-- Custom App Code -->
        <script src="<?php echo Config::get('URL'); ?>public/js/app.js"></script>
        <?php if ($this->checkForActiveControllerAndAction($filename, "cybersecurity/index")) { ?>
            <script src="https://sdk.amazonaws.com/js/aws-sdk-2.41.0.min.js"></script>
            <script type="text/javascript">
                // set the focus to the input box
                document.getElementById("wisdom").focus();

                // Initialize the Amazon Cognito credentials provider
                AWS.config.region = 'us-east-1'; // Region
                AWS.config.credentials = new AWS.CognitoIdentityCredentials({
                    // Provide your Pool Id here
                    IdentityPoolId: 'us-east-1:6ff775c8-e5b8-4a56-a07a-d5014265fafa',
                });

                var lexruntime = new AWS.LexRuntime();
                var lexUserId = 'chatbot-demo' + Date.now();
                var sessionAttributes = {};

                function pushChat() {

                    // if there is text to be sent...
                    var wisdomText = document.getElementById('wisdom');
                    if (wisdomText && wisdomText.value && wisdomText.value.trim().length > 0) {

                        // disable input to show we're sending it
                        var wisdom = wisdomText.value.trim();
                        wisdomText.value = '...';
                        wisdomText.locked = true;

                        // send it to the Lex runtime
                        var params = {
                            botAlias: '$LATEST',
                            botName: 'ScheduleAppointment',
                            inputText: wisdom,
                            userId: lexUserId,
                            sessionAttributes: sessionAttributes
                        };
                        showRequest(wisdom);
                        lexruntime.postText(params, function(err, data) {
                            if (err) {
                                console.log(err, err.stack);
                                showError('Error:  ' + err.message + ' (see console for details)')
                            }
                            if (data) {
                                // capture the sessionAttributes for the next cycle
                                sessionAttributes = data.sessionAttributes;
                                // show response and/or error/dialog status
                                showResponse(data);
                            }
                            // re-enable input
                            wisdomText.value = '';
                            wisdomText.locked = false;
                        });
                    }
                    // we always cancel form submission
                    return false;
                }

                function showRequest(daText) {

                    var conversationDiv = document.getElementById('conversation');
                    var requestPara = document.createElement("P");
                    requestPara.className = 'userRequest';
                    requestPara.appendChild(document.createTextNode(daText));
                    conversationDiv.appendChild(requestPara);
                    conversationDiv.scrollTop = conversationDiv.scrollHeight;
                }

                function showError(daText) {

                    var conversationDiv = document.getElementById('conversation');
                    var errorPara = document.createElement("P");
                    errorPara.className = 'lexError';
                    errorPara.appendChild(document.createTextNode(daText));
                    conversationDiv.appendChild(errorPara);
                    conversationDiv.scrollTop = conversationDiv.scrollHeight;
                }

                function showResponse(lexResponse) {

                    var conversationDiv = document.getElementById('conversation');
                    var responsePara = document.createElement("P");
                    responsePara.className = 'lexResponse';
                    if (lexResponse.message) {
                        responsePara.appendChild(document.createTextNode(lexResponse.message));
                        responsePara.appendChild(document.createElement('br'));
                    }
                    if (lexResponse.dialogState === 'ReadyForFulfillment') {
                        responsePara.appendChild(document.createTextNode(
                            'Ready for fulfillment'));
                        // TODO:  show slot values
                    } else {
                        responsePara.appendChild(document.createTextNode(
                            '(' + lexResponse.dialogState + ')'));
                    }
                    conversationDiv.appendChild(responsePara);
                    conversationDiv.scrollTop = conversationDiv.scrollHeight;
                }
            </script>

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