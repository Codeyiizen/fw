<?php

if (!function_exists('random_strings')) {
	// This function will return a random
	// string of specified length
	function random_strings($length_of_string)
	{

		// String of all alphanumeric character
		$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

		// Shuffle the $str_result and returns substring
		// of specified length
		return substr(
			str_shuffle($str_result),
			0,
			$length_of_string
		);
	}
}
if (!function_exists('getUser')) {
	// This function will return a random
	// string of specified length
	function getUser()
	{

		$CI = &get_instance();
		$CI->load->library('session');
		return $CI->session->userdata('ci_seesion_key');
	}
}

if (!function_exists('returnSuccessResponse')) {
	// This function will return a random
	// string of specified length
	function returnSuccessResponse($data=array())
	{

		return json_encode(array('code'=>200,"data"=>$data));
	}
}

if (!function_exists('returnErrorResponse')) {
	// This function will return a random
	// string of specified length
	function returnErrorResponse($data=array(),$message="")
	{

		return json_encode(array('code'=>201,"message"=>$message));
	}
}
if (!function_exists('returnFriendStatus')) {
	// This function will return a random
	// string of specified length
	function returnFriendStatus($status=0,$type="")
	{
		if($type=='from'){
			if($status==0){
				return 'Request sent';
			} else if($status==1){
				return "Friend";
			}
		}else if($type=='from'){
			if($status==0){
				return 'Request sent';
			} else if($status==1){
				return "Friend";
			}
		}
	}
}
if (!function_exists('checkMenuActive')) {
	// This function will return a random
	// string of specified length
	function checkMenuActive($check="")
	{
		$currentURL = uri_string();
		if($currentURL === $check){
			return 'text-warning';
		} else {
			return '';
		}
	}
}
if (!function_exists('checkMainMenuActive')) {
	// This function will return a random
	// string of specified length
	function checkMainMenuActive($check="")
	{
		$currentURL = uri_string();
		if(strpos($currentURL,$check)!==false){
			return 'active';
		} else {
			return '';
		}
	}
}

if (!function_exists('getUserProfilePhoto')) {
	// This function will return a random
	// string of specified length
	function getUserProfilePhoto($photo="")
	{
		if(!empty($photo) && file_exists(FCPATH . 'assets/uploads/profile_photo/' . $photo) && !empty($photo)){
			return base_url() . 'assets/uploads/profile_photo/' . $photo;
		} else {
			return base_url() . 'assets/images/site-image/user-icon.svg';
		}
	}
}