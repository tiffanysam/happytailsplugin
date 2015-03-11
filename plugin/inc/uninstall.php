<?php

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ){
 exit;
}
if ( get_option( 'cd_op_array' ) != false ){
 delete_option( 'cd_op_array' );
}

?>