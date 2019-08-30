<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    
    var $tb_user = 'tb_user';
    var $tb_role = 'tb_role';
    var $_user_role = '_user_role';
    var $_user_ci = '_user_ci';
    
    public function delete($id)
    {
        $db_debug = $this->db->db_debug;
        $this->db->db_debug = FALSE;

        $this->db
        ->where('id',$id)
        ->delete($this->tb_user);
        $error = $this->db->error();

        $this->db->db_debug = $db_debug;

        return $error;
    }
}
