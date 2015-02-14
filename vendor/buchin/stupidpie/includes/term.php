<?php



function spp_gauges(){
	echo '
	<script type="text/javascript">
	var _gauges=_gauges||[];(function(){var a=document.createElement("script");a.type="text/javascript";a.async=true;a.id="gauges-tracker";a.setAttribute("data-site-id","4f558898f5a1f52fcc000006");a.src="//secure.gaug.es/track.js";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)})()
	</script>
	';
}

function spp_set_activation(){
	spp_create_table();
}

function spp_get_country_id(){
	return file_get_contents("http://api.hostip.info/country.php?ip=".$_SERVER['REMOTE_ADDR'] );
}

function spp_create_table() {
   global $wpdb;  
   $table_name = $wpdb->prefix.'spp';
   if($wpdb->get_var("SHOW TABLES LIKE '$table_name';") != $table_name) {      
   		$sql = "CREATE TABLE `".$wpdb->prefix."spp` (
		`term` VARCHAR ( 255 ) NOT NULL ,
		PRIMARY KEY ( `term` )
		);";	
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
   }
}

function spp_is_found($term, $array){
	foreach ($array as $string) {
		$string=trim($string);
		if ($string!="") {
			if(stripos($term,$string)!== FALSE){
				return true;
			}
		}
	}
	return false;
}

function spp_contains_bad_words($term){
    global $spp_settings;
	if(empty($spp_settings->bad_words)) return false;
	
	$bannedWords = explode(',',$spp_settings->bad_words);
	return spp_is_found($term, $bannedWords);
}

function spp_filter_before_save($term){
	//check if terms contains bad word
	if(spp_contains_bad_words($term)) return false; else return true;
}

function spp_save_term($term){
	global $wpdb;
	if(spp_filter_before_save($term) == false) return false;
	$success = $wpdb->query( $wpdb->prepare( "INSERT IGNORE INTO ".$wpdb->prefix."spp (`term` ) VALUES ( %s )", $term ) );	
	return $success;
}