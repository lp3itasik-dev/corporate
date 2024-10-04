<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

public function __construct()
  {
      parent::__construct();
      $this->load->model('Models','m');
      if($this->session->userdata('level') == null){
        redirect(base_url());
      }
  }
	public function index()
	{
		$select = $this->db->select('*');
		$select = $this->db->where('username',$this->session->userdata('username'));
		$select = $this->db->where('check_in LIKE "%'.date('Y-m-d').'%"');
		$data['read_attendance'] = $this->m->Get_All('attendance',$select);
		$this->load->view('karyawan/index',$data);
	}
	public function ListAttendance()
	{
    $data['bulan'] = date('m');
		$data['tahun'] = date('Y');
    if(isset($_POST['bulan'])){$data['bulan'] = $_POST['bulan'];}
    if(isset($_POST['tahun'])){$data['tahun'] = $_POST['tahun'];}
		$this->load->view('karyawan/list-attendance',$data);
	}
	public function ListAttendanceTeam()
	{
    $select = $this->db->select('*');
    $select = $this->db->join('users','users.username=attendance.username');
		$select = $this->db->where('check_in LIKE "%'.date('Y-m-d').'%"');
    $select = $this->db->where('id_divisi',$this->session->userdata('id_divisi'));
		$data['list'] = $this->m->Get_All('attendance',$select);
		$this->load->view('karyawan/list-attendance-team',$data);
	}
  public function Attendance()
	{
    $check_in = NULL;
    $check_out = NULL;
    if(isset($_POST['check_in'])){$check_in=date('Y-m-d H:i:s');}
    if(isset($_POST['check_out'])){$check_out=date('Y-m-d H:i:s');}
  		$data=array(
        'username'	   =>	$this->session->userdata('username'),
        'nama'	       =>	$this->session->userdata('fullname'),
        'catatan'      =>	$this->input->post('catatan'),
  		);
      if($check_in!=NULL){
        $data['check_in']=$check_in;
        $data['location_in']=$_POST['lokasi'];
        $select=$this->db->select('*');
        $tunjangan_makan = $this->m->Get_All('tunjangan_makan',$select);
        $select=$this->db->where('TIME_FORMAT(jam_absen,"%H%i") >= '.date('Hi',strtotime($check_in)));
        $select=$this->db->order_by('jam_absen','ASC');
        $select=$this->db->limit('1');
        $tunjangan_transport = $this->m->Get_All('tunjangan_transport',$select);
        $data['um']=0;
        foreach($tunjangan_makan as $tm){
          $data['um']=$tm->uang_makan;
        }
        $data['ut']=0;
        foreach($tunjangan_transport as $tt){
          $data['ut']=$tt->uang_transport;
        }
        $this->m->Save($data, 'attendance');
      }else{
        $where=array(
          'username'	   =>	$this->session->userdata('username'),
          'check_in LIKE "'.date('Y-m-d').'%"'
    		);
        $data['check_out']=$check_out;
        $data['location_out']=$_POST['lokasi'];
        $this->m->Update($where,$data,'attendance');

      }

  		redirect('Karyawan');
	}
  public function ResumeBuku()
  {
    $data['tahun']=date('Y');
    if(isset($_POST['tahun'])){
      $data['tahun']=$this->input->post('tahun');
    }
    $this->load->view('karyawan/resume-buku',$data);
  }
  public function AddResumeBuku($bulan,$tahun)
  {
    $data['bulan']=$bulan;
    $data['tahun']=$tahun;
    $this->load->view('karyawan/resume-buku-add',$data);
  }
  public function AddResumeBukuAction()
  {
      $data=array(
        'username'		=>	$this->session->userdata('username'),
        'judul'		    =>	$this->input->post('judul'),
        'no_isbn'	    =>	$this->input->post('isbn'),
        'penulis'	    =>	$this->input->post('penulis'),
        'penerbit'	  =>	$this->input->post('penerbit'),
        'tahun_terbit'=>	$this->input->post('tahun_terbit'),
        'resume'	    =>	$this->input->post('resume_buku'),
        'bulan'	      =>	$this->input->post('bulan'),
        'tahun'	      =>	$this->input->post('tahun')
      );
      $this->m->Save($data, 'resume_buku');
      redirect('Karyawan/ResumeBuku');
  }
  public function EditResumeBuku($id)
  {
    $select = $this->db->select('*');
    $select = $this->db->where('id_buku',$id);
    $data['read_resume_buku'] = $this->m->Get_All('resume_buku',$select);

    $this->load->view('karyawan/resume-buku-edit',$data);
  }
  public function EditResumeBukuAction()
  {
    $where=array(
      'id_buku'			=> $this->input->post('id_buku')
    );
    $data=array(
      'judul'		=>	$this->input->post('judul'),
      'no_isbn'	=>	$this->input->post('isbn'),
      'penulis'	=>	$this->input->post('penulis'),
      'penerbit'	=>	$this->input->post('penerbit'),
      'tahun_terbit'	=>	$this->input->post('tahun_terbit'),
      'resume'	=>	$this->input->post('resume_buku'),
    );
    $this->m->Update($where,$data,'resume_buku');
    redirect(base_url().'Karyawan/ResumeBuku');
  }
  public function ViewResumeBuku($id)
  {
    $select = $this->db->select('*');
    $select = $this->db->where('id_buku',$id);
    $data['read_resume_buku'] = $this->m->Get_All('resume_buku',$select);

    $this->load->view('karyawan/resume-buku-view',$data);
  }
}
?>
