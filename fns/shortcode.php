<?php
    // inc/shortcode.php
    extract(shortcode_atts(array(
        'message' => 'This is the default message',
        'color' => '',
    ), $atts));
    $data = [
        'message' => $message,
        'color' => $color,
    ];
    $output = "";
    if($this->display_shortcode == "yes"){
        $output = $this->render_view('shortcode', $data, true);
    }