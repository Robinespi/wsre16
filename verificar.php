<?php

function vCorre($email){
	
	$expr="/^([a-z])+[0-9][0-9][0-9]@ikasle\.ehu\.[e]u?[s]$/";
	$error = '';
	if(!preg_match($expr,$email)){
		
		$error=$error.'<p>Email erroneo</p>';
	}
	
	return $error;
	
}





?>