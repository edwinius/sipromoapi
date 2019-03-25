<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_model {

    public function verify_data() {
        $json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        
        $appToken = $obj['appToken'];

        if(authorizeApp($appToken)) {
            $callback['status'] = '200';
            $callback['body'] = $obj['body'];

            if(array_key_exists('table', $obj)) {
                $callback['table'] = $obj['table'];
            }
        } else {
            $callback['status'] = '401';
			$callback['msg'] = 'Unauthorized App';
        }

        //$jsoncallback = json_encode($callback);
		return $callback;
    }

}
?>