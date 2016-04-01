<?php if(!defined('BASEPATH'))exit('No direct script access allowed'); 

/*
 * Class string cat chuoi
 * @param string
 * @return string
 */

class string{
	function cut( $str, $limit, $more=" ..."){
		if ($str=="" || $str == NULL || is_array($str) || strlen($str)==0)
		return $str;
		$str = trim($str);
					
		if (strlen($str) <= $limit) return $str;
		$str = substr($str,0,$limit);
		
		if (!substr_count($str," ")) 
		{
			if ($more) $str .= " ...";
			return $str;
		}
		while(strlen($str) && ($str[strlen($str)-1] != " ")) 
		{
			$str = substr($str,0,-1);
		}
			$str = substr($str,0,-1);
		if ($more) $str .= " ...";
			return $str;
	}
	
	function replace($str) {
		if(!$str) return false;
  	        $unicode = array(
        		'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
  	            'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
  	            'd'=>array('đ'),
				'-'=>array('-'),
  	            'D'=>array('Đ'),
  	            'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
  	            'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
  	            'i'=>array('í','ì','ỉ','ĩ','ị'),
  	            'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
  	            'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
  	            '0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
  	            'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
  	            'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
  	            'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
  	            'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
				'-'=>array(', ','. '),
				'' =>array(',','.'),					
				'-'=>array(' .',' ;','; ',' :',': '),
  	            '-'=>array(';',':'),
				'-'=>array(' - '),	
  	        );

  	        foreach($unicode as $nonUnicode=>$uni){
  	        	foreach($uni as $value)
            	$str = str_replace($value,$nonUnicode,$str);
  	        }
    	return $str;	
	}	
	function makeTitle($str){
		//Code loại bỏ ký hiệu đặc biệt
		$str=trim($str);//Loại bỏ các dấu cách(khoảng trắng) ở đầu và cuối 1 chuỗi
		$str=str_replace(' ','-',$str);
		$str=preg_replace("/(Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ)/",'O',$str);
		$str=preg_replace("/(ò|ó|ọ|ỏ|õ|ơ|ờ|ớ|ợ|ở|ỡ|ô|ồ|ố|ộ|ổ|ỗ)/",'o',$str);
		$str=preg_replace("/(Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ)/",'A',$str);
		$str=preg_replace("/(à|á|ạ|ả|ã|ă|ằ|ắ|ặ|ẳ|ẵ|â|ầ|ấ|ậ|ẩ|ẫ)/",'a',$str);
		$str=preg_replace("/(É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ)/",'E',$str);
		$str=preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể)/",'e',$str);
		$str=preg_replace("/(Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự)/",'U',$str);
		$str=preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ử|ự)/",'u',$str);
		$str=preg_replace("/(Í|Ì|Ỉ|Ĩ|Ị)/",'i',$str);
		$str=preg_replace("/(í|ì|ị|ỉ|ĩ)/",'i',$str);
		$str=preg_replace("/(Ý|Ỳ|Ỷ|Ỹ|Ỵ)/",'y',$str);
		$str=preg_replace("/(ý|ỳ|ỵ|ỷ|ỹ)/",'y',$str);
		$str=str_replace('Đ','D',$str);
		$str=str_replace('đ','d',$str);
		$str=preg_replace("/[^-a-zA-Z0-9]/",'',$str);
		return strtolower($str);
	}
}
?>