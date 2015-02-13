<?php

class Helpers {
    
    public static function convert_title_case($s) {
        
		$arr = preg_split("//u", $s, -1, PREG_SPLIT_NO_EMPTY);
		$result = "";
		$mode = false;
		foreach ($arr as $char) {
			$res = preg_match(
				'/\\p{Mn}|\\p{Me}|\\p{Cf}|\\p{Lm}|\\p{Sk}|\\p{Lu}|\\p{Ll}|'.
				'\\p{Lt}|\\p{Sk}|\\p{Cs}/u', $char) == 1;
			if ($mode) {
				if (!$res)
					$mode = false;
			}
			elseif ($res) {
				$mode = true;
				$char = mb_convert_case($char, MB_CASE_TITLE, "UTF-8");
			}
			$result .= $char;
		}

		return $result;
        
	}

}