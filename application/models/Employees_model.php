<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees_model extends CI_Model
{
	public function insert_employee($data)
	{
		return $q = $this->db->insert('employees', $data);
	}

    public function record_count()
    {
        return $this->db->get('employees')->num_rows();
    }

    public function fetch_records($per_page, $segment)
    {
		$query = $this->db->select('*')->get('employees', $per_page, $segment);
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
   }

   public function delete_record($ids)
   {
		$this->db->where_in('id', $ids);
		return $this->db->delete('employees');
   }

   public function update($id, $data)
   {
		$this->db->where('id', $id);
		return $this->db->update('employees', $data); 
   }

   public function find($id)
   {
		$this->db->where('id', $id);
		return $this->db->get('employees')->row();
   }

}
