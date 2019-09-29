<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    
    var $tb_user = 'tb_user';
    var $_user_ci = '_user_ci';
    var $tb_role = 'tb_role';
    var $_user_role = '_user_role';
    
    public function create($set_data,$fk_role)
    {
        $insert = $this->db
        ->insert($this->tb_user,$set_data);
        if($insert){
            $insert_id = $this->db->insert_id();
            $this->insert_role($insert_id,$fk_role);
            $set_ci = [
                'fk_user' => $insert_id,
            ];
            $this->db
            ->insert($this->_user_ci,$set_ci);
        }
    }

    public function get()
    {
        return $this->db
        ->select('tb_user.*,tb_role.type as role')
        ->join($this->_user_role,'tb_user.id=_user_role.fk_user')
        ->join($this->tb_role,'_user_role.fk_role=tb_role.id')
        ->get($this->tb_user)
        ->result();
    }

    public function get_by_id($id)
    {
        return $this->db
        ->select('tb_user.*,(select fk_role from _user_role where fk_user=tb_user.id limit 1) as fk_role')
        ->where('id',$id)
        ->get($this->tb_user)
        ->row(0);
    }

    public function update($id,$set_data)
    {
        $update = $this->db
        ->where('id',$id)
        ->update($this->tb_user,$set_data);
        return $update;
    }
    public function delete($id)
    {
        $db_debug = $this->db->db_debug;
        $this->db->db_debug = FALSE;

        if(is_array($id)){
            $this->db->where_in('id',$id);
        }else{
            $this->db->where('id',$id);
        }
        $this->db->delete($this->tb_user);
        $error = $this->db->error();

        $this->db->db_debug = $db_debug;

        return $error;
    }

    public function get_role()
    {
        return $this->db
        ->get($this->tb_role)
        ->result();
    }
    public function insert_role($id_user,$fk_role)
    {
        $set_role = [
            'fk_user' => $id_user,
            'fk_role' => $fk_role,
        ];
        
        $role_data = $this->db
        ->where('fk_user',$id_user)
        ->get($this->_user_role);
        if($role_data->num_rows() == 0){
            $this->db->insert($this->_user_role,$set_role);
        }
    }

    public function update_role($id_user,$new_role)
    {
        $set_role = [
            'fk_user' => $id_user,
            'fk_role' => $new_role,
        ];
        
        $role_data = $this->db
        ->where('fk_user',$id_user)
        ->get($this->_user_role);
        if($role_data->num_rows() != 0){
            $this->db
            ->where('fk_user',$id_user)
            ->update($this->_user_role,$set_role);
        }
    }
}
