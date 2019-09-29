<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ConfigEmail_model extends CI_Model
{
    var $_config = '_config';
    
    public function get_all()
    {
        $data = $this->db
        ->get($this->_config)
        ->result();
        $ret = [];
        foreach($data as $key => $value){
            $ret[$value->key_name] = $value->value_name;
        }
        return $ret;
    }
}
