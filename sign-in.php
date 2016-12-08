<?php 

function curl_post($base_url = '', $post_data = '', $access_token = '')
{
	
	$content_type		= 'Content-Type: application/x-www-form-urlencoded';
	$accept				= 'Accept: application/json';
	$authorization		= 'Authorization: Bearer ' . $access_token;
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $base_url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array($content_type, $accept, $authorization));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));

	$resp = curl_exec($ch);

	$response = json_decode($resp, true);

	return $response;
	
}

$base_url				= 'https://api.mainapi.net/tmoney/1.0.0/sign-in';

$post_data['userName']	= 'rina@yopmail.com';
$post_data['password']	= 'L12356tr';
$post_data['terminal']	= 'WHITELABEL-DILO';

$access_token			= '2ce51a7397b5c899c113e5d6f4bdfccb';


$result = json_encode(curl_post($base_url, $post_data, $access_token));

echo $result;

?>
