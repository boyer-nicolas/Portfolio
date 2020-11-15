<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/init.php' );

// Check if all inputs are filled
if ( ! empty( $_POST ) ) {

    // initiate the array collecting all fields
    $fields = [];

    // verify all fields and store them
    foreach ( array_keys($_POST) as $field ) {

        $fields[$field] = $_POST[$field];

    }
        
    // Check if values aren't only spaces
    if ( ! ctype_space( array_values( $fields ) ) ) {

        extract( $fields, EXTR_PREFIX_SAME, "wddx" );

        $to      = 'boyer63nicolas@gmail.com';
        $subject = $name . " : " . $subject;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: $email" . "\r\n";
        $message = "
                    <html>
                    <head>
                    <title>$subject</title>
                    </head>
                    <body>
                    <p>$message</p>
                    </body>
                    </html>
                    ";
        
        if ( mail( $to, $subject, $message, $headers ) ) {

            echo "true";

        } 

    }
}
?>