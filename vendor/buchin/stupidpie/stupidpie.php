<?php
/*
Plugin Name: StupidPie
Plugin URI: http://ninjaplugins.com/products/stupidpie
Description: StupidPie is a stupid content generator. RISK: your domain will be deindexed, your adsense account will be banned, your server will crash. Benefit: If done properly and you have a good facerank, it will generate tons of traffic. Should be done in massive amount of wordpress install. Blog which already have minimum 100/day from search engine is recomended. Please read README.txt for example usage.
Author: AjariAkuAdsene
Version: 1.4
Author URI: http://ninjaplugins.com
*/

/*
## 1.4 Release Notes:
* Bing API deprecated, now using Bing RSS
* Since we are using Bing RSS, StupidPie no longer able to fetch image (ㄒ_ㄒ)
* Since we are using Bing RSS, We no longer limited to 5000 query per month ＼(^ω^＼)
*/

require_once('settings.php');

require_once('templates/h2o/h2o.php');
define('SPP_PATH',  dirname(__FILE__));

foreach (glob(SPP_PATH."/includes/*.php") as $filename) {
	require($filename); 
}

function spp($term = "", $template = 'default.html', $hack = ""){
    global $spp_settings;
    
    $result = new h2o(
        SPP_PATH."/templates/$template", 
        array(  
            'safeClass' => array('SimpleXMLElement','stdClass')
        ));
                
    return $result->render(array('term'=>$term, 'hack' => $hack, 'settings' => $spp_settings));
}