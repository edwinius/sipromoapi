<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('add_dot')) {

	function add_dot($data) {
		if(strlen($data) > 6) {
			$data = substr_replace($data, '.', -3, 0);
			$data = substr_replace($data, '.', -7, 0);
		} elseif(strlen($data) > 3) {
			$data = substr_replace($data, '.', -3, 0);
		}
		return($data);
	}
	
	function remove_sign($data) {
		$data = str_replace('&', '', $data);
		return($data);
	}
	
	function space_to_underscore($data) {
		$data = str_replace(' ', '_', $data);
		return($data);
	}
	
	function convert_br($data) {
		$data = trim(preg_replace('/\s\s+/', "\n----------------------------\n", $data));
		return($data);
	}

	function checkmydate($m, $d, $y) {
		return checkdate($m, $d, $y);
	}
	
	function add_new_line($data) {
		$data = str_replace("\n", "\n\n", $data);
		return($data);
	}

	function remove_nl($data) {
		$data = str_replace("\r", "|", $data);
		$data = str_replace("\n", "", $data);
		return($data);
	} 

	function remove_denominator($data) {
		$data = str_replace(" ", "", $data);
		$data = str_replace(".", "", $data);
		$data = str_replace(",", "", $data);
		return($data);
	}

	function spacetodash($data) {
		$data = str_replace(" ", "-", $data);
		return($data);
	}

	function encrypt1($data) {
		$data = $data * 92771499 + 5;
		return($data);
	}

	function decrypt1($data) {
		$data = ($data - 5) / 92771499;
		return($data);
	}

	function authorizeApp($appToken) {
		if(password_verify('adgoapplication', $appToken)) {
			return true;
		} else {
			return false;
		}
	}

	function combine_array($array1, $array2) {
		// Make array
		$ppid = '';
		$i = 0;
		$array = $row = $prow = $urow = array();
		
		foreach($array1 as $r) {
			if($i == 0) {
				$ppid = $r['company_pid'];
			}
			
			$pid = $r['company_pid'];

			if($pid == $ppid) {
				$row['company_pid'] = $r['company_pid'];
				
				//$urow['unit_name'] = $r -> unit_name;

				array_push($prow, $urow);
				
				if($i+1 == count($uresult)) {
					$row['child'] = $prow;
					array_push($array, $row);
				}
			} else {
				$row['child'] = $prow;
				array_push($array, $row);
				
				$row = array();
				$prow = array();
				
				$row['company_pid'] = $r['company_pid'];
				
				//$urow['unit_name'] = $r -> unit_name;
				
				array_push($prow, $urow);
				
				if($i+1 == count($uresult)) {
					$row['child'] = $prow;
					array_push($array, $row);
				}
			}
			
			$ppid = $r['company_pid'];
			$i++;
		}

		return $array;
	}
	
}
?>