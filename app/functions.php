<?php 
function add_icon($icon = '', $html = '') {
    
    return str_replace('">', '"><i class="icon-'.$icon.'"></i> ', $html);
    
}

function str_clean($word) {
    
    return str_replace('-',' ', Slug::create($word));
    
}

function is_banned_keywords($url='') {
    
    $banned_keywords = explode(',', Config::get('videoengine.banned_keywords'));
    $folders = explode('/', $url);
    $keywords = array();
    
    foreach ($folders as $name) {
        $keywords[] = explode('-', urldecode(Slug::create($name)));
    }

    $keywords = flatten($keywords);
    
    foreach ($keywords as $keyword) {
        if(in_array($keyword, $banned_keywords)) return true;
    }
    
}

function flatten(array $array) {
    
    $return = array();
    
    array_walk_recursive($array, function($a) use (&$return) {
        $return[] = $a; 
    });
    
    return $return;
    
}

function sitemap_time($lastmod) {
    
    $datetime = new DateTime($lastmod);
    return $datetime->format('Y-m-d\TH:i:sP');
    
}

function spp_get_delim($ref) {
    
    // Search engine match array
    // Used for fast delimiter lookup for single host search engines.
    // Non .com Google/MSN/Yahoo referrals are checked for after this array is checked
    $search_engines = array(
        
        'google.com' => 'q',
        'go.google.com' => 'q',
        'maps.google.com' => 'q',
        'local.google.com' => 'q',
        'search.yahoo.com' => 'p',
        'search.msn.com' => 'q',
        'bing.com' => 'q',
        'msxml.excite.com' => 'qkw',
        'search.lycos.com' => 'query',
        'alltheweb.com' => 'q',
        'search.aol.com' => 'query',
        'search.iwon.com' => 'searchfor',
        'ask.com' => 'q',
        'ask.co.uk' => 'ask',
        'search.cometsystems.com' => 'qry',
        'hotbot.com' => 'query',
        'overture.com' => 'Keywords',
        'metacrawler.com' => 'qkw',
        'search.netscape.com' => 'query',
        'looksmart.com' => 'key',
        'dpxml.webcrawler.com' => 'qkw',
        'search.earthlink.net' => 'q',
        'search.viewpoint.com' => 'k',
        'mamma.com' => 'query'
        
    );
    
    $delim = false;
    
    // Check to see if we have a host match in our lookup array
    if (isset($search_engines[$ref])) {
        
        $delim = $search_engines[$ref];
        
    } else {
        
        // Lets check for referrals for international TLDs and sites with strange formats
        // Optimizations
        $sub13 = substr($ref, 0, 13);
        
        // Search string for engine
        if(substr($ref, 0, 7) == 'google.')
            $delim = "q";
        elseif($sub13 == 'search.atomz.')
            $delim = "sp-q";
        elseif(substr($ref, 0, 11) == 'search.msn.')
            $delim = "q";
        elseif($sub13 == 'search.yahoo.')
            $delim = "p";
        elseif(preg_match('/home\.bellsouth\.net\/s\/s\.dll/i', $ref))
            $delim = "bellsouth";
        
    }
    
    return $delim;
    
}

function spp_get_refer() {
    
    // Break out quickly so we don't waste CPU cycles on non referrals
    if (!isset($_SERVER['HTTP_REFERER']) || ($_SERVER['HTTP_REFERER'] == '')) return false;
    $referer_info = parse_url($_SERVER['HTTP_REFERER']);
    $referer = $referer_info['host'];
    
    // Remove www. is it exists
    if(substr($referer, 0, 4) == 'www.')
        $referer = substr($referer, 4);
    
    return $referer;
    
}

function spp_get_terms($d) {
    
    $terms       = null;
    $query_array = array();
    $query_terms = null;
    
    // Get raw query
    $query = @explode($d.'=', $_SERVER['HTTP_REFERER']);
    $query = @explode('&', $query[1]);
    $query = @urldecode($query[0]);
    
    // Remove quotes, split into words, and format for HTML display
    $query = str_replace("'", '', $query);
    $query = str_replace('"', '', $query);
    $query_array = preg_split('/[\s,\+\.]+/',$query);
    $query_terms = implode(' ', $query_array);
    $terms = htmlspecialchars(urldecode(trim($query_terms)));
    
    return $terms;
    
}

function spp_setinfo() {
    
    // Did we come from a search engine?
    $referer = spp_get_refer();
    if (!$referer) return false;
    $delimiter = spp_get_delim($referer);
    
    if($delimiter){
        
        $query = spp_get_terms($delimiter);
        
        if (strrpos($query, "-1") !== false) {
            
			return Redirect::route('home');
            
        } else {
            
        	if (substr($query, 0, 4) == 'http') {
                
        		$expl = explode('/', $query);
        		if (isset($expl[4])) {
        			return Redirect::to($expl[3]."/".$expl[4]);
        		} else {
        			return Redirect::route('home');
        		}
                
        	}
            
        }
        
        $term = new Term;
        $term->term = $query;
        $term->save();
        
    }
    
}

function save_term($terms) {

    foreach ($terms as $query) {
        $term = new Term;
        $term->term = $query;
        $term->save();
    }
    
}

function alertcss() {
    
    return Theme::asset()->container('alertify-css')->styles();
    
}

function alertjs() {
    
    $show = Theme::asset()->container('alertify-js')->scripts();
    
    $message = Session::get('message');
    
    if (!empty($message)) {
        
        $show .= '<script type="text/javascript">';
        $show .= 'alertify.error("'.$message.'");';
        $show .= '</script>';
        
    }
    
    Session::flush();
    
    return $show;
}