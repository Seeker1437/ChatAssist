<?php

// get the feedback (they are arrays, to make multiple messages possible)
$feedback_notice = Session::get('feedback_notice');
$feedback_warning = Session::get('feedback_warning');
$feedback_positive = Session::get('feedback_positive');
$feedback_negative = Session::get('feedback_negative');

// echo out notice messages
if (isset($feedback_notice)) {
    foreach ($feedback_notice as $feedback) {
        echo '<div class="alert alert-info alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$feedback.'</div>';
    }
}

// echo out warning messages
if (isset($feedback_warning)) {
    foreach ($feedback_warning as $feedback) {
        echo '<div class="alert alert-warning alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$feedback.'</div>';
    }
}

// echo out positive messages
if (isset($feedback_positive)) {
    foreach ($feedback_positive as $feedback) {
        echo '<div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$feedback.'</div>';
    }
}

// echo out negative messages
if (isset($feedback_negative)) {
    foreach ($feedback_negative as $feedback) {
        echo '<div class="alert alert-danger alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$feedback.'</div>';
    }
}

