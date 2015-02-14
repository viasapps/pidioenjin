<?php namespace Buchin\Youtube;
use Buzz\Browser;
use Buzz\Client\Curl;
use Buzz\Client\FileGetContents;

class Youtube {

	var $url = 'http://gdata.youtube.com/feeds/api/videos?alt=json&v=2';
    
	public function __construct()
	{
        $this->browsercurl = new Browser(new Curl());
		$this->browserfgc = new Browser(new FileGetContents());
	}

	public function remove_common_words($input)
    {
	    $commonWords = array('a','able','about','above','abroad','according','accordingly','across','actually','adj','after','afterwards','again','against','ago','ahead','ain\'t','all','allow','allows','almost','alone','along','alongside','already','also','although','always','am','amid','amidst','among','amongst','an','and','another','any','anybody','anyhow','anyone','anything','anyway','anyways','anywhere','apart','appear','appreciate','appropriate','are','aren\'t','around','as','a\'s','aside','ask','asking','associated','at','available','away','awfully','b','back','backward','backwards','be','became','because','become','becomes','becoming','been','before','beforehand','begin','behind','being','believe','below','beside','besides','best','better','between','beyond','both','brief','but','by','c','came','can','cannot','cant','can\'t','caption','cause','causes','certain','certainly','changes','clearly','c\'mon','co','co.','com','come','comes','concerning','consequently','consider','considering','contain','containing','contains','corresponding','could','couldn\'t','course','c\'s','currently','d','dare','daren\'t','definitely','described','despite','did','didn\'t','different','directly','do','does','doesn\'t','doing','done','don\'t','down','downwards','during','e','each','edu','eg','eight','eighty','either','else','elsewhere','end','ending','enough','entirely','especially','et','etc','even','ever','evermore','every','everybody','everyone','everything','everywhere','ex','exactly','example','except','f','fairly','far','farther','few','fewer','fifth','first','five','followed','following','follows','for','forever','former','formerly','forth','forward','found','four','from','further','furthermore','g','get','gets','getting','given','gives','go','goes','going','gone','got','gotten','greetings','h','had','hadn\'t','half','happens','hardly','has','hasn\'t','have','haven\'t','having','he','he\'d','he\'ll','hello','help','hence','her','here','hereafter','hereby','herein','here\'s','hereupon','hers','herself','he\'s','hi','him','himself','his','hither','hopefully','how','howbeit','however','hundred','i','i\'d','ie','if','ignored','i\'ll','i\'m','immediate','in','inasmuch','inc','inc.','indeed','indicate','indicated','indicates','inner','inside','insofar','instead','into','inward','is','isn\'t','it','it\'d','it\'ll','its','it\'s','itself','i\'ve','j','just','k','keep','keeps','kept','know','known','knows','l','last','lately','later','latter','latterly','least','less','lest','let','let\'s','like','liked','likely','likewise','little','\'ll','look','looking','looks','low','lower','ltd','m','made','mainly','make','makes','many','may','maybe','mayn\'t','me','mean','meantime','meanwhile','merely','might','mightn\'t','mine','minus','miss','more','moreover','most','mostly','mr','mrs','much','must','mustn\'t','my','myself','n','name','namely','nd','near','nearly','necessary','need','needn\'t','needs','neither','never','neverf','neverless','nevertheless','new','next','nine','ninety','no','nobody','non','none','nonetheless','noone','no-one','nor','normally','not','nothing','notwithstanding','novel','now','nowhere','o','obviously','of','off','often','oh','ok','okay','old','on','once','one','ones','one\'s','only','onto','opposite','or','other','others','otherwise','ought','oughtn\'t','our','ours','ourselves','out','outside','over','overall','own','particular','particularly','past','per','perhaps','placed','please','plus','possible','presumably','probably','provided','provides','q','que','quite','qv','r','rather','rd','re','really','reasonably','recent','recently','regarding','regardless','regards','relatively','respectively','right','round','s','said','same','saw','say','saying','says','second','secondly','see','seeing','seem','seemed','seeming','seems','seen','self','selves','sensible','sent','serious','seriously','seven','several','shall','shan\'t','she','she\'d','she\'ll','she\'s','should','shouldn\'t','since','six','so','some','somebody','someday','somehow','someone','something','sometime','sometimes','somewhat','somewhere','soon','sorry','specified','specify','specifying','still','sub','such','sup','sure','t','take','taken','taking','tell','tends','th','than','thank','thanks','thanx','that','that\'ll','thats','that\'s','that\'ve','\'ve','the','their','theirs','them','themselves','then','thence','there','thereafter','thereby','there\'d','therefore','therein','there\'ll','there\'re','theres','there\'s','thereupon','there\'ve','these','they','they\'d','they\'ll','they\'re','they\'ve','thing','things','think','third','thirty','this','thorough','thoroughly','those','though','three','through','throughout','thru','thus','till','to','together','too','took','toward','towards','tried','tries','truly','try','trying','t\'s','twice','two','u','un','under','underneath','undoing','unfortunately','unless','unlike','unlikely','until','unto','up','upon','upwards','us','use','used','useful','uses','using','usually','v','value','various','versus','very','via','viz','vs','w','want','wants','was','wasn\'t','way','we','we\'d','welcome','well','we\'ll','went','were','we\'re','weren\'t','we\'ve','what','whatever','what\'ll','what\'s','what\'ve','when','whence','whenever','where','whereafter','whereas','whereby','wherein','where\'s','whereupon','wherever','whether','which','whichever','while','whilst','whither','who','who\'d','whoever','whole','who\'ll','whom','whomever','who\'s','whose','why','will','willing','wish','with','within','without','wonder','won\'t','would','wouldn\'t','x','y','yes','yet','you','you\'d','you\'ll','your','you\'re','you\'ve','yours','yourself','yourselves','you\'ve','z','zero','ada','adalah','agak','agar','akan','aku','amat','anda','apa','apabila','atau','bahwa','bagai','baru','beberapa','begitu','begini','bila','belum','betapa','banyak','boleh','cara','cuma','dan','dalam','dari','dapat','demikian','dengan','di','dia','hanya','harus','ialah','ini','ingin','itu','hanya','jika','juga','hendak','kali','kalau','kami','kan','karena','ke','kelak','kemudian','kenapa','kepada','kini','ku','lah','lain-lain','lagi','lalu','lama','lantas','maka','mana','masa','masih','mau','me','mereka','merupakan','meng','mengapa','mesti','mu','namun','nan','nun','nya','orang','pada','paling','pasti','para','pen','pengen','pernah','saat','saja','sana','sang','sangat','saya','sebagainya','sedang','sehingga','selain','selalu','seluruh','sekali','sekarang','sementara','semua','senantiasa','seorang','seseorang','seperti','serba','sering','serta','sesuatu','si','sini','situ','suatu','sudah','supaya','tahun','tanpa','telah','terus','untuk','yakni','yaitu','yang');

	    return preg_replace('/\b('.implode('|',$commonWords).')\b/','',$input);
	}

	public function search($term = '', $max_results = 25, $start_index = 1)
	{
		$videos = array();
		$term = urlencode($term);
		$url = $this->url . '&q=' . $term;
		$url = $url . '&max-results=' . $max_results;
		$url = $url . '&start-index=' . $start_index;

		$response = $this->browsercurl->get($url);
        
        $response = $response->getContent();
        
        if (empty($response)) {
            
            $response = $this->browserfgc->get($url);
            $response = $response->getContent();
            
            if (empty($response)) {
                
                return Redirect::to('/');
                
            }
            
        }

		$response = json_decode($response, true);
		
		$meta = array();
		$meta['max_results'] = $response['feed']['openSearch$itemsPerPage']['$t'];
		$meta['start_index'] = $response['feed']['openSearch$startIndex']['$t'];
		$meta['total_results'] = $response['feed']['openSearch$totalResults']['$t'];

		$response = isset($response['feed']['entry'][0]) ? $response['feed']['entry'] : null;

		foreach ((array) $response as $raw) {
			$videos[] = $this->format($raw);
		}

		return array( 'meta' => $meta, 'videos' => $videos );
	}

	public function format($raw)
	{
		$video = array();
		$video['youtubeid'] = $raw['media$group']['yt$videoid']['$t'];
		$video['author'] = $raw['author'][0]['name']['$t'];
		$video['title'] = $raw['title']['$t'];
		$video['excerpt'] = $this->remove_common_words($raw['media$group']['media$description']['$t']);
		$video['views'] = isset($raw['yt$statistics']['viewCount']) ? $raw['yt$statistics']['viewCount'] : 0;
		$video['likes'] = isset($raw['yt$rating']['numLikes']) ? $raw['yt$rating']['numLikes'] : '0';
		$video['aspect_ratio'] = isset($raw['media$group']['yt$aspectRatio']['$t']) ? $raw['media$group']['yt$aspectRatio']['$t'] : 'unknown';
		$video['duration'] = $raw['media$group']['yt$duration']['seconds'];
		$video['thumbnail'] = $raw['media$group']['media$thumbnail'][0]['url'];
		$video['thumbnail_mq'] = $raw['media$group']['media$thumbnail'][1]['url'];
		$video['thumbnail_hq'] = $raw['media$group']['media$thumbnail'][2]['url'];
		$video['thumbnail_sd'] = $raw['media$group']['media$thumbnail'][3]['url'];
		return $video;
	}
}