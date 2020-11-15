<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/init.php' );

$mail = $_POST['email'];

if ( filter_var( $mail, FILTER_VALIDATE_EMAIL) ) {

    echo "true";

}