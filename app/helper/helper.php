<?php

function require_once_wildcard( $wildcard, $__FILE__ ) {
	preg_match( "/^(.+)\/[^\/]+$/", $__FILE__, $matches );
	$ls = "ls $matches[1]/$wildcard";
	$ls = explode( "\n", $ls );
	array_pop( $ls ); // remove empty line ls always prints
	foreach ( $ls as $inc ) {
		require_once( $inc );
	}
}

?>