<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coop_model extends CI_Model
{
    var $tb_coop = 'tb_coop';
    var $tb_company = 'tb_company';
    var $tb_coop_type = 'tb_coop_type';
    var $vw_coop = 'vw_coop';

    public function create($set_data)
    {
        $data_company = $this->db
        ->where('name',$set_data['company_name'])
        ->where('address',$set_data['company_address'])
        ->get($this->tb_company)
        ->row(0);

        $id_company = "";
        if($data_company == null){
            $set_company = [
                'name' => $set_data['company_name'],
                'address' => $set_data['company_address']
            ];
            $insert_company = $this->db->insert($this->tb_company,$set_company);
            $id_company = $this->db->insert_id();
        }else{
            $id_company = $data_company->id;
        }
        
        $set_coop = [
            'fk_company' => $id_company,
            'coop_number' => $set_data['coop_number'],
            'description' => $set_data['description'],
            'start_date' => $set_data['start_date'],
            'end_date' => $set_data['end_date'],
            'fk_coop_type' => $set_data['fk_coop_type'],
            'created_by' => $set_data['created_by'],
        ];
        $insert = $this->db->insert($this->tb_coop,$set_coop);
        return $insert;
    }

    public function get()
    {
        return $this->db
        ->select($this->tb_coop.'.id,'.$this->tb_company.'.name as company_name,'.$this->tb_company.'.address as company_address,coop_number,description,start_date,end_date,status,tb_coop_type.name as coop_type_name')
        ->join($this->tb_company,$this->tb_coop.'.fk_company='.$this->tb_company.'.id')
        ->join($this->tb_coop_type,$this->tb_coop.'.fk_coop_type='.$this->tb_coop_type.'.id')
        ->get($this->tb_coop)
        ->result();
    }

    public function get_by_id($id)
    {
        return $this->db
        ->select($this->tb_coop.'.id,'.$this->tb_company.'.name as company_name,'.$this->tb_company.'.address as company_address,coop_number,description,start_date,end_date,fk_coop_type,tb_coop_type.name as coop_type_name')
        ->join($this->tb_company,$this->tb_coop.'.fk_company='.$this->tb_company.'.id')
        ->join($this->tb_coop_type,$this->tb_coop.'.fk_coop_type='.$this->tb_coop_type.'.id')
        ->where($this->tb_coop.'.id',$id)
        ->get($this->tb_coop)
        ->row(0);
    }

    public function update($id,$set_data)
    {
        $data_company = $this->db
        ->where('name',$set_data['company_name'])
        ->where('address',$set_data['company_address'])
        ->get($this->tb_company)
        ->row(0);

        $id_company = "";
        if($data_company == null){
            $set_company = [
                'name' => $set_data['company_name'],
                'address' => $set_data['company_address']
            ];
            $insert_company = $this->db->insert($this->tb_company,$set_company);
            $id_company = $this->db->insert_id();
        }else{
            $id_company = $data_company->id;
        }

        $set_coop = [
            'fk_company' => $id_company,
            'coop_number' => $set_data['coop_number'],
            'description' => $set_data['description'],
            'start_date' => $set_data['start_date'],
            'end_date' => $set_data['end_date'],
            'fk_coop_type' => $set_data['fk_coop_type']
        ];
        $update = $this->db
        ->where('id',$id)
        ->update($this->tb_coop,$set_coop);
        
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
        $this->db->delete($this->tb_coop);
        $error = $this->db->error();

        $this->db->db_debug = $db_debug;

        return $error;
    }
    
    public function get_company()
    {
        return $this->db
        ->get($this->tb_company)
        ->result();
    }

    public function find_coop_type($name)
    {
        return $this->db
        ->where('name',$name)
        ->get($this->tb_coop_type)
        ->row(0)
        ->id;
    }

    public function get_coop_reminder($max_send)
    {
        $now = date('Y-m-d');
        
        $coop_reminder = $this->db
        ->select('vw_coop_for_email.*,tb_company.name company_name,tb_company.address company_address,tb_coop_type.name as type_name')
        ->join('tb_company','vw_coop_for_email.fk_company=tb_company.id')
        ->join('tb_coop_type','vw_coop_for_email.fk_coop_type=tb_coop_type.id')
        ->where('remind_date <=',$now)
        ->where('status',0)
        ->where('mail_send <',$max_send)
        ->get("vw_coop_for_email");
        
        return $coop_reminder->result();
    }

    public function get_coop_reminder_by_id_mailing($id_emailing,$max_send)
    {
        $now = date('Y-m-d');
        
        $coop_reminder = $this->db
        ->select('vw_coop_for_email.*,tb_company.name company_name,tb_company.address company_address,tb_coop_type.name as type_name')
        ->join('tb_company','vw_coop_for_email.fk_company=tb_company.id')
        ->join('tb_coop_type','vw_coop_for_email.fk_coop_type=tb_coop_type.id')
        ->join('_emailing_coop','vw_coop_for_email.id=_emailing_coop.fk_coop')
        ->where('_emailing_coop.fk_emailing',$id_emailing)
        ->get("vw_coop_for_email");
        
        return $coop_reminder->result();
    }

    public function change_status($id,$status)
    {
        $this->db
        ->where('id',$id)
        ->update($this->tb_coop,['status' => $status]);
    }
}
