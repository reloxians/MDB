<?php

function time_up($datetime) {
	
$now = new DateTime(); 
$future_date = new DateTime($datetime); 
$interval = $future_date->diff($now); 

//vars

$years = $interval->format("%y");

$months = $interval->format("%m");

$days = $interval->format("%d");

$hours = $interval->format("%h");

if($years < 1 && $months < 1 && $days < 1 ) {
	
			return $interval->format("%h hours, %i minutes, %s seconds");
	
	} elseif ($years < 1 && $months < 1 ) {

			return $interval->format("%d days %h hours, %i minutes, %s seconds");
			
	} elseif ($years < 1 ) {
		
			return $interval->format("%m months %d days %h hours, %i minutes, %s seconds");
		
		} else {
		
			return $interval->format("%y years, %m months %d days %h hours, %i minutes, %s seconds");
		
		}


}



function now($datetime, $full = false) { 
$now = new DateTime; 
$ago = new DateTime($datetime); 
$diff = $now->diff($ago); 
$diff->w = floor($diff->d / 7); 
$diff->d -= $diff->w * 7; 
$string = array( 
			'y' => 
			'year', 
			'm' => 
			'month', 
			'w' => 
			'week', 
			'd' => 
			'day', 
			'h' => 
			'hour', 
			'i' => 
			'minute', 
			's' => 
			'second',
			 ); 
			 
			foreach ($string as $k => &$v) { 
					if ($diff->$k) { 
							$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : ''); 
							} else { 
						
						unset($string[$k]); 
						
						} 
						
					} 
					
				if (!$full) $string = array_slice($string, 0, 1); 
					return $string ? implode(', ', $string) . ' ago' : 'just now'; 		
				}
				
				
				



	function  sidebar() {
	return include ROOT.DS.'includes'.DS.'sidebar.php' ;
}

function count_it($number) {
	if($number > 1000 ) {
			$current = ($number / 1000);
			
		return  $current . 'k' ;
	} else {
		echo $number ;
	}
}

//shorten strings

if (!function_exists('chop_string')) {
function chop_string($str, $len) {
    if (strlen($str) < $len)
        return $str;

    $str = substr($str,0,$len);
    if ($spc_pos = strrpos($str," "))
            $str = substr($str,0,$spc_pos);

    return $str . ' __<span style="color: #e56600;"> Read more...</span>';
}   
}



if (!function_exists('chop_string_blog')) {
function chop_string_blog($str, $len) {
    if (strlen($str) < $len)
        return $str;

    $str = substr($str,0,$len);
    if ($spc_pos = strrpos($str," "))
            $str = substr($str,0,$spc_pos);

    return $str . '....';
}   
}



if (!function_exists('chop_string_null')) {
function chop_string_null($str, $len) {
    if (strlen($str) < $len)
        return $str;

    $str = substr($str,0,$len);
    if ($spc_pos = strrpos($str," "))
            $str = substr($str,0,$spc_pos);

    return $str . ' __<span style="color: #e56600; font-size: 13px;"> Read more...</span>';
}   
}


if (!function_exists('chop_int')) {
function chop_int($str, $len) {
    if (strlen($str) < $len)
        return $str;

    $str = substr($str,0,$len);
    if ($spc_pos = strrpos($str," "))
            $str = substr($str,0,$spc_pos);

    return $str ;
}   
}


	function site_name() {
	return 'Reloxians' ;
	}
	
	function site_number() {
		return '+(512) 957-7750' ;
	}
	
	function site_email() {
	return 'reloxians@gmail.com' ;
	}
	
	//random numbers
	
	function grs($length = 10) { 
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 				  $charactersLength = strlen($characters); 
		$randomString = ''; 
		for ($i = 0; $i < $length; $i++) { 
			$randomString .= $characters[rand(0, $charactersLength - 1)]; 
			
			} 
			return $randomString;
		}
	
	function slug($string){ 
			$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string); 
			
			$slug = strtolower($slug);
			return $slug; 
	}
	
	
	
	
	
	
	
	
	
	
	