<?php

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ){
 exit;
}
if ( get_option( 'tds_op_array' ) != false ){
 delete_option( 'tds_op_array' );
}

?>