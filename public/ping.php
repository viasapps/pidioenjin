<?php
// konfigurasi, silakan ganti
$sitemap_url = "http://" . $_SERVER['HTTP_HOST'] . "/sitemap.xml";
$send_email = true; // ganti ke false jika tidak ingin mendapatkan notifikasi
// stop disini.

// cara manggil via cron: 
// lynx -source http://domain.com/ping.php?email=alamat@email.ente > /dev/null

$email = $_GET['email'];
function SendSiteMapUpdateIndicationPing($sitemap_url){
	$curl_req = array();
	$urls = array();

	// below are the SEs that we will be pining
	$urls[] = "http://www.google.com/webmasters/tools/ping?sitemap=".urlencode($sitemap_url);
	$urls[] = "http://www.bing.com/webmaster/ping.aspx?siteMap=".urlencode($sitemap_url);

	foreach ($urls as $url)
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURL_HTTP_VERSION_1_1, 1);
		$curl_req[] = $curl;
	}

	//initiating multi handler
	$multiHandle = curl_multi_init();

	// adding all the single handler to a multi handler
	foreach($curl_req as $key => $curl)
	{
		curl_multi_add_handle($multiHandle,$curl);
	}
	do
	{
		$multi_curl = curl_multi_exec($multiHandle, $isactive);
	}
	while ($isactive || $multi_curl == CURLM_CALL_MULTI_PERFORM );
	
	$success = true;
	foreach($curl_req as $curlO)
	{
		if(curl_errno($curlO) != CURLE_OK)
		{
			$success = false;
		}
	}

	curl_multi_close($multiHandle);
	return $success;
}

$success = SendSiteMapUpdateIndicationPing($sitemap_url) ? 'Sukses' : 'Gagal';

$headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$title = $message = $success . ' ngeping ' . $sitemap_url;

if($send_email){
	// Send ping result to email
	echo $title;
	mail($email, $title , $message . ' ke Google dan Bing' . "\r\n\r\nThanks sudah nyobain VideoEngine\r\nhttp://bit.ly/GetVideoEngine\r\n\r\nMochammad Masbuchin", $headers);
}