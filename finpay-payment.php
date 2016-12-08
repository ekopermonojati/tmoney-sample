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

$base_url				= 'https://api.mainapi.net/tmoney/1.0.0/finpay-payment';

$post_data['idTmoney']	= '195100001914';
$post_data['idFusion']	= '+6219563687570';
$post_data['token']		= 'e546765481f720950920bee8b1b6d7248db7d9080a800257f715e7a467668004cd4974ef9b38c7b0';
$post_data['invoice']	= '';
$post_data['amount']	= '10000';
$post_data['terminal']	= 'WEB-TMONEY';

$access_token			= '2ce51a7397b5c899c113e5d6f4bdfccb';


$result = json_encode(curl_post($base_url, $post_data, $access_token));

echo $result;

?>