<?php
# Author  :WAJID ALI JAIVD
# Created :15 September 2025
# Description : this class to call all effect related to text
class Text{
	
	/*
	* @Construct Class
	**/
	public function __construct(){
		date_default_timezone_set('Asia/Karachi');
	}
	
	
	/*
	* @function to get RequestNo
	**/
	public static function unique(){
		$now = DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''));
		return $now->format("YmdGisu");
		//return date('YmdGis').rand(100,50000);
	}//close func
	
	/*
	* @function to get Randdom
	**/
	public static function random(){
		return date('Gis').rand(1000,99999);
	}//close func
	
	/*
	* @function to get random String
	**/
	public static function randomText($b=16){
		$permitted_chars = 'ABZDEFGHIJKLMNOPQRSYUVWXYZabcdefghijklmnopqrstuvwxyz';
		return substr(str_shuffle($permitted_chars), 0, $b);
	}//Close function
	
	/*
	* @function to get random String
	**/
	public static function randomCode($b=16){
		$permitted_chars = 'ABZDEFGHIJKLMNOPQRSYUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
		return substr(str_shuffle($permitted_chars), 0, $b);
	}//Close function
	
	/*
	* @function to get splited first item only
	**/
	public static function first($Str, $Saprator){
		$Data = explode($Saprator, $Str);
		return trim($Data[0]);
	}//close function
	
	/*
	* @function to get splited Last item only
	**/
	public static function last($Str, $Saprator){
		$Data = explode($Saprator, $Str);
		return $Data[sizeof($Data) - 1];
	}//close function
	
	/*
	* @function to get splited Last item and display all items before last only
	**/
	public static function before_last($Str, $Saprator){
		$DD = '';
		$Data = explode($Saprator, $Str);
		for( $i=0; $i<sizeof($Data) - 1; $i++)
			$DD .= $Data[$i].'-';
		return rtrim($DD,$Saprator);
	}//close function
	
	
	/*
	* @function to get contains text
	* First argument is a Sting inwhich we will find the match world
	* Example: 'My Name is Salman', 'Salman'
	**/
	public static function contains($str,$list=array()){
		if(is_array($list))
			for($i=0; $i<sizeof($list); $i++){
				if (strpos($str,$list[$i]) !== false)
					return true;
			}
		else if(is_array($str))
			for($i=0; $i<sizeof($str); $i++){
				if (strpos($str[$i],$list) !== false)
					return true;
			}
		else if (strpos($str,$list) !== false)
			return true;
			
		return false;
	}//Close Functions
	
	
	/*
	* @function to Check Equal text any one of the string in list 
	* First argument is a Sting inwhich we will find the match world
	* Second argument can be single string or list of array to match
	**/
	public static function equal($str,$list=array(),$Val=''){
		if(is_array($list))
			for($i=0; $i<sizeof($list); $i++){
				if ($list[$i] == $str){
					if(!empty($Val))
						return $list[$i];
					else
						return true;
						
				}
			}
		else if ($list == $str)
			return true;
			
		return false;
	}//Close Functions
	
	
	/*
	* @function to Check Equal text any one of the string in list 
	* First argument is a Array inwhich we will find the match world
	* Second argument can be single string or list of array to match
	**/
	public static function equalOR($vaule=array(),$list=array(),$IsKey='key'){
		if( sizeof($vaule) > 0 ){
			foreach($vaule as $key => $val){
				for($i=0; $i<sizeof($list); $i++){
					if ($list[$i] == $$IsKey){
						return true;						
					}
				}//End For
			}//End Each
		}
		return false;
	}//Close Functions
	
	
	/*
	* @function to check StartWith
	* Second argument can be single string or list of array to match
	**/
	public static function startWith($str,$startW){
		if( is_array($startW) ){
			for($i=0; $i<sizeof($startW); $i++){
				if ( strpos($str, trim($startW[$i])) === 0)
						return true;
			}
			return false;
		} else if( is_array($str) ){
			for($i=0; $i<sizeof($str); $i++)
				if (strpos($str[$i], $startW) === 0)
					return true;
			return false;
		} else {
			if (strpos($str, $startW) === 0)
				return true;
			else 
				return false;
		}
	}//Close function
	
	
	
	/*
	* @function to check StartWith
	* Second argument can be single string or list of array to match
	**/
	public static function startWithArr($str,$startW){
		if( is_array($startW) ){
			for($i=0; $i<sizeof($startW); $i++)
				if (strpos($startW[$i],$str) === 0)
					return true;
			return false;
		} else {
			if (strpos($str, $startW) === 0)
				return true;
			else 
				return false;
		}
	}//Close function
	
	/*
	* @function to check EndWidth
	**/
	public static function endWith($str, $endW) {
		if( is_array($endW) ){
			for($j=0; $j<sizeof($endW); $j++){
				$Last = '';
				for($i=(strlen($str) - strlen($endW[$j])); $i<strlen($str); $i++)
		 			$Last .= $str[$i];
				if ($Last == $endW[$j])
					return true;
			}
			return false;
		} else {
			$Last = '';
			for($i=(strlen($str) - strlen($endW)); $i<strlen($str); $i++)
		 		$Last .= $str[$i];
			if ($Last == $endW)
				return true;
		}

		return false;
	}//Close function
	
	
	/*
	* @function convert json to array
	**/
	public static function jsonArray($Str){
		//$Str = str_replace(array("\r\n","\r"), '\n', $Str);
		$Str = preg_replace('/\s/', ' ', $Str);
		return json_decode(str_replace('\\','\\\\',$Str), true);
	}//Close
	
	
	/*
	* @function convert array to json
	**/
	public static function arrayJson($Str){
		return json_encode(str_replace('\\','\\\\',$Str));
	}//Close
	
	
	/*
	* @function to check the array value
	* First Argument is main array inwhich you need to validate the value
	* Second Argument is also array inwhich compare value will be their
	**/
	public static function checkEmptyValue($Arr, $vaule){
		foreach($vaule as $AR)
			if(empty($Arr[$AR]))
				return $AR;		
		return true;
	}
	
	/*
	* @function to check the array value variable isset or not
	* First Argument is main array inwhich you need to validate the value
	* Second Argument is also array inwhich compare value will be their
	**/
	public static function CheckIsset($Arr, $vaule){
		foreach($vaule as $AR)
			if(!isset($Arr[$AR]))
				return $AR;		
		return true;
	}
	
	/*
	* @function to will return the Value What is Set
	* First Argument is main array inwhich you need to validate the value
	* Second Argument is also array inwhich compare value will be their
	**/
	public static function GetIsset($Arr, $vaule){
		foreach($vaule as $AR)
			if(isset($Arr[$AR]))
				return $AR;		
		return false;
	}
	
	
	/*
	* @function to get based on limit to return value upto limit
	**/
	public static function limit($text,$limit){
		$txt = '';
		if(strlen($text) < $limit)
			return $text;
		for($i=0; $i<$limit; $i++)
			$txt .= $text[$i];
		return $txt.'..';	
	}
	
	
	/*
	* @function to get value in between two points
	**/
	public static function mid($text, $LStart, $LEnd=null){
		$txt = '';
		if(!empty($LEnd) && strlen($text) < $LEnd)
			return $text;
		else if(empty($LEnd))
			$LEnd = strlen($text);
			
		for($i=$LStart; $i<$LEnd; $i++)
			$txt .= $text[$i];
			
		return trim($txt);	
	}
	
	/*
	* @function to get file icon
	**/
	public static function icon($Ext){
		switch(strtolower($Ext)){
			case 'jpg': case 'jpeg': case 'gif': case 'png': case 'bmp':
				return '<i class="fa fa-image FYellow1"></i>';
			case 'pdf':
				return '<i class="fa fa-file-pdf-o FRed"></i>';
			case 'xls': case 'xlsx':
				return '<i class="fa fa-file-excel-o FGreen2"></i>';
			case 'doc': case 'docx':
				return '<i class="fa fa-file-word-o FBlue"></i>';
			case 'mp4':
				return '<i class="fa fa-file-video-o FRed1"></i>';
			case 'txt':
				return '<i class="fa fa-file-text-o FBlack"></i>';
			default:
				return '<i class="fa fa-file"></i>';;
			break;
		}//End Switch
	}//close
	
	/*
	* @function encode text
	**/
	public static function encode($str){
		return base64_encode($str);	
	}//close
	
	/*
	* @function encode text
	**/
	public static function decode($str){
		return base64_decode($str);	
	}//close
	
	/*
	* @function to allow extension for upload the documents
	**/
	public static function extension(){
		return '.xls,.xlsx,.doc,.docx,.pdf,.jpg,.jpeg,.gif,.png,.bmp';
	}//close
	
	
	/*
	* @function Remove dot & space
	**/
	public static function trims($str){
		return trim(preg_replace('~[\r\n\s\.\-\&]~', '', $str));
		//return str_replace(' ','',str_replace('.','',str_replace('-','',$str)));
	}
	
	/*
	* @function Remove New line and tab space
	**/
	public static function ntrims($str){
		return trim(preg_replace('~[\r\n]~', '', $str)); //\'
		//return str_replace(' ','',str_replace('.','',str_replace('-','',$str)));
	}//Close
	
	/*
	* @function Remove New line and tab space
	**/
	public static function ntrims2($str){
		return trim(preg_replace('~[\r\n\t]~', '', str_replace(array('\r','\n','\t'),'',$str)));
		//return str_replace(array('\r','\n','\t'),'',$str);
	}//Close
	
	/*
	* @function to get valua inbetween from two string
	* Salmen is best for me ( Salman, Best ) output = is
	**/
	public static function MidString($StartString,$EndString,$String){
		return preg_replace('/(.*)'.$StartString.'(.*)'.$EndString.'(.*)/sm', '\2', $String);
	}//Close
	
	/*
	* @function Display First And Last Words of the Centance
	**/
	public static function icon_tag($str){
		
		$words = explode(" ", str_replace('  ',' ',$str));
		$acronym = "";
		if( sizeof($words) > 1 )
			for($i=0; $i<2; $i++) $acronym .= strtoupper($words[$i][0]);
		else 
			$acronym = strtoupper($str[0]).strtoupper($str[strlen($str) - 1]);
		return $acronym ;	
	}
	
	
	/*
	* @function to get random color
	**/
	public static function rand_color() {
		return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
	}
	
	/*
	* @function to get random color Light
	**/
	public static function random_color_light() {
		$str = '#';
		for($i = 0 ; $i < 3 ; $i++) {
			$str .= dechex( rand(170 , 255) );
		}
		return $str;
	}
	
	/*
	* @function to check Text is Arabic or not
	**/
	public static function is_arabic($str) {
		if (preg_match('/[اأإء-ي]/ui', $str))
			return true;
		else
			return false;
	}//Close 
	
	/*
	* @function to replace <br> tag to \n for New Line in Textarea display in div
	**/
	public static function decode_textarea($str){
		return str_replace('<br />', ' \n', urldecode($str));
	}//Close 
	
	
	/*
	* @function to replace <br> tag to \n for New Line in Textarea display in div
	**/
	public static function encode_textarea($str){
		return preg_replace('~[\n]~', '<br>', $str);
	}//Close 
	
	
	/*
	* @function to desplay any html text
	* this will remove all new lines from the code
	**/
	public static function display_html($str){
		return trim(preg_replace('/\s\s+/', ' ', $str));
	}//Close function
	
	
	/*
	* @function to check status
	**/
	public static function is_nav(){
		return $_COOKIE['WorkListSelected'];
	}//close	
	
	
	
	/*
	* @function to remove illegal char
	**/
	public static function remove_illchar($str){
		$illChar = array("'",'"');
		for($i=0; $i<sizeof($illChar); $i++)
			$str = str_replace($illChar[$i],'',$str);
		return $str;
	}//Close Function
	
	
	/*
	* @function encrypt Show document URL
	**/
	public static function DisplayURL($Str,$Root='Yes'){
		$Str = str_replace(_ROOT_,'',$Str);
		if( $Root == 'Yes' )
			return _ROOT_."ShowDocument/?Filename=".base64_encode($Str);
		else
			return "/ShowDocument/?Filename=".base64_encode($Str);
	}//Close
	
	
	/*
	* @function encrypt Download URL
	**/
	public static function DownloadURL($Str,$NewName=null){
		$Str = str_replace(_ROOT_,'',$Str);
		return _ROOT_."DownloadDoc/?FileID=".base64_encode($Str)."&FileNames=".$NewName;
	}//Close
	
	/*
	* @funtion to dump data
	**/
	public static function dump($str){
		echo '<pre>'; var_dump($str); echo '</pre>';
	}//closed
	
	
	/*
	* @funtion to return value of second variable if first is null
	**/
	public static function IsNull($Str1,$Str2){
		return $Str1 != ''? $Str1 : $Str2;
	}//closed
	
	
	/*
	* @function get DocURL
	**/
	public static function DocURL($URL){
		return base64_encode(_ROOT_.'documents/'.$URL);
	}//Close
	
	/*
	* @function get DocURL
	**/
	public static function ShowDoc($URL){
		return _ROOT_.'ShowDocument/?Filename='.base64_encode(_ROOT_.'documents/'.$URL);
	}//Close
	
	/*
	* @funtion make object array as normal array
	**/
	public static function make_array($Array,$By=''){
		$Arr = array();
		if( empty($By) )
			foreach($Array as $key => $val) $Arr[] = $key;
		else 
			foreach($Array as $key => $val) $Arr[] = $val;
		return $Arr;
	}//Close
	
	/*
	* @function to convert to XML Field to Array
	**/
	public static function xml_to_array($XML){
		$obj = simplexml_load_string($XML);
		$json = json_encode($obj);
		return json_decode($json, true);	
	}//Close
	
	
	/*
	* @function to remove all data between tags
	**/
	public static function remove_tag($TagName, $StrValue){
		return preg_replace('#(<'.$TagName.'.*?>).*?(</'.$TagName.'>)#', "", $StrValue);
	}
	
	/*
	* @function to read logs
	**/
	public static function read_count($IP='',$Email=''){
		if( !empty($IP) ){
			$file = 'bin/logs/'.Date_Time::now('D').'_404-error-'.$IP.$Email.'.txt';
			if(!file_exists($file)) return 0;
			// Read the file into an array where each element is a line
			$lines = file($file);
			// Count the number of lines
			return count($lines);
		}
		return 0;
	}//End Func
	
	
	/*
	* @function to remove illegal char
	**/
	public static function search_format($str){
		//$str = preg_replace('/\bS-\b/', 'PLACEHOLDER1', $str);  // Replace 'S-' with PLACEHOLDER1
		//$str = preg_replace('/\bSO-\b/', 'PLACEHOLDER2', $str); // Replace 'SO-' with PLACEHOLDER2
		$str = preg_replace('/\bS-\b/i', 'PLACEHOLDER1', $str);  // Replace 'S-' with PLACEHOLDER1
		$str = preg_replace('/\bso-\b/i', 'PLACEHOLDER2', $str);
		
		// Step 2: Remove dangerous SQL injection characters
		$str = preg_replace('/[\'";#\-\*\\\%\(\)]/', '', $str);
		
		// Step 3: Restore 'PLACEHOLDER1' back to 'S-' and 'PLACEHOLDER2' back to 'SO-'
		$str = str_replace('PLACEHOLDER1', 'S-', $str);
		$str = str_replace('PLACEHOLDER2', 'SO-', $str);

		return $str;
	}//Close Function
	
}//End Class

?>