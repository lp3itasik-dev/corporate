<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Models extends CI_Model{
    function Get_Page($limit, $start, $table){
        $query = $this->db->get($table, $limit, $start);
        return $query;
    }
	public function Get_All($table,$select)
	{
		$select;
		$query = $this->db->get($table);
		return $query->result();
	}
  public function Get_ResumeByBulan($bulan,$tahun,$username)
  {
    $where=array(
      'bulan' => $bulan,
      'tahun' => $tahun,
      'username' => $username,
    );
    $query = $this->db->get_where('resume_buku', $where);
    return $query->result();
  }
  public function Get_ResumeByBulanByUser($bulan,$tahun)
  {
    $where=array(
      'bulan' => $bulan,
      'tahun' => $tahun,
      'username' => $this->session->userdata('username'),
    );
    $query = $this->db->get_where('resume_buku', $where);
    return $query->result();
  }
	public function Get_AttendanceByUser($username,$dari,$sampai)
	{
	   $where=array(
      'username' => $username,
      'check_in >=' => $_GET['dari'],
      'check_in <=' => $_GET['sampai'],
    );
    $query = $this->db->get_where('attendance', $where);
    return $query->result();
	}
	public function Get_AttendanceByTanggalAndUser($tanggal,$username)
	{
	$where=array(
      'DATE_FORMAT(check_in, "%Y-%m-%d") =' => $tanggal,
      'username' => $username,
    );
    $query = $this->db->get_where('attendance', $where);
    return $query->result();
	}
	public function Get_Where($where, $table)
	{
		$query = $this->db->get_where($table, $where);
		return $query->result();
	}
	function Save($data, $table){
		$result=$this->db->insert($table, $data);
		return $result;
	}
	function Update($where, $data, $table){
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}
	function Update_All($data, $table){
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}
	function Delete($where, $table){
		$result=$this->db->delete($table, $where);
		return $result;
	}
	function Delete_All($table){
		$result=$this->db->delete($table);
		return $result;
	}
	public function Cek_login($username,$username_value,$password,$password_value,$table)
	{
		$this->db->select('*');
		$this->db->where($username,$username_value);
		$this->db->where($password,$password_value);
		$query = $this->db->get($table);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
}
