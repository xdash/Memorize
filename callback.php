<?php

session_start();
include_once( 'config.php' );
include_once( 'includes/weibooauth.php' );



$o = new SaeTOAuth( WB_AKEY , WB_SKEY , $_SESSION['keys']['oauth_token'] , $_SESSION['keys']['oauth_token_secret']  );

$last_key = $o->getAccessToken(  $_REQUEST['oauth_verifier'] ) ;

$_SESSION['last_key'] = $last_key;


// ÊÚÈ¨Íê³É

header('Location: index.php');

?>
