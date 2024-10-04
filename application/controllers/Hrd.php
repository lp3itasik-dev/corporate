<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hrd extends CI_Controller {

public function __construct()
  {
    parent::__construct();
    $this->load->model('Models','m');
    if($this->session->userdata('level')!="hrd"){
      redirect(base_url());
    }
  }
	public function index()
	{
    $select = $this->db->select('*');
		$select = $this->db->where('username',$this->session->userdata('username'));
		$select = $this->db->where('check_in LIKE "%'.date('Y-m-d').'%"');
		$data['read_attendance'] = $this->m->Get_All('attendance',$select);
		$this->load->view('hrd/index',$data);
	}
	public function ListAttendance()
	{
    $data['bulan'] = date('m');
    $data['tahun'] = date('Y');
		$data['username'] = $this->session->userdata('username');
    if(isset($_POST['bulan'])){$data['bulan'] = $_POST['bulan'];}
    if(isset($_POST['tahun'])){$data['tahun'] = $_POST['tahun'];}
    if(isset($_POST['username'])){$data['username'] = $_POST['username'];}

    $select = $this->db->select('*');
		$data['read_users'] = $this->m->Get_All('users',$select);
		$this->load->view('hrd/list-attendance',$data);
	}
	public function ListAttendanceTeam()
	{
    $select = $this->db->select('*');
    $select = $this->db->join('users','users.username=attendance.username');
		$select = $this->db->where('check_in LIKE "%'.date('Y-m-d').'%"');
    $select = $this->db->where('id_divisi',$this->session->userdata('id_divisi'));
		$data['list'] = $this->m->Get_All('attendance',$select);
		$this->load->view('hrd/list-attendance-team',$data);
	}
	public function Divisi()
	{
    $select = $this->db->select('*');
    $data['read_divisi'] = $this->m->Get_All('divisi',$select);
		$this->load->view('hrd/divisi',$data);
	}
	public function Karyawan()
	{
    $select = $this->db->select('users.*,divisi.divisi');
    $select = $this->db->join('divisi','divisi.id=users.id_divisi');
    $data['read_users'] = $this->m->Get_All('users',$select);
    $select = $this->db->select('*');
    $data['read_divisi'] = $this->m->Get_All('divisi',$select);
		$this->load->view('hrd/karyawan',$data);
	}
	public function TunjanganMakan()
	{
    $select = $this->db->select('*');
    $data['read_tunjangan_makan'] = $this->m->Get_All('tunjangan_makan',$select);
		$this->load->view('hrd/tunjangan-makan',$data);
	}
	public function TunjanganTransport()
	{
    $select = $this->db->select('*');
    $data['read_tunjangan_transport'] = $this->m->Get_All('tunjangan_transport',$select);
		$this->load->view('hrd/tunjangan-transport',$data);
	}
	public function ReportTunjanganMakan()
	{
		$this->load->view('hrd/report-tunjangan-makan');
	}
	public function CetakTunjanganMakan()
	{
    $select = $this->db->select('fullname,count(attendance.id) as total_kehadiran, sum(um) as total_um');
    $select = $this->db->join('attendance','attendance.username=users.username','left');
    $select = $this->db->where('check_in >="'.$_GET['dari'].'"');
    $select = $this->db->where('check_in <="'.$_GET['sampai'].'"');
    $select = $this->db->group_by('users.username');
    $data['read_tunjangan_makan'] = $this->m->Get_All('users',$select);
		$this->load->view('hrd/cetak-tunjangan-makan',$data);
	}
	public function ReportTunjanganTransport()
	{
		$this->load->view('hrd/report-tunjangan-transport');
	}
	public function CetakTunjanganTransport()
	{
    $select = $this->db->select('*');
    $select = $this->db->group_by('users.username');
    $data['read_users'] = $this->m->Get_All('users',$select);
		$this->load->view('hrd/cetak-tunjangan-transport',$data);
	}
  public function DivisiCreate()
	{
		$data=array(
			'divisi'		=>	$this->input->post('divisi'),
		);
		$this->m->Save($data, 'divisi');
		redirect(base_url().'index.php/Hrd/Divisi');
	}
  public function DivisiUpdate()
	{
    $table = 'divisi';
		$where=array(
			'id'		=>	$this->input->post('id')
		);
		$data=array(
      'divisi'	  =>	$this->input->post('divisi'),
		);
		$this->m->Update($where, $data, $table);
		redirect(base_url().'index.php/Hrd/Divisi');
	}
	function DivisiDelete()
	{
		$table = 'divisi';
		$where=array(
			'id'		=>	$this->input->post('id')
		);
		$this->m->Delete($where, $table);
		redirect(base_url().'index.php/Hrd/Divisi');
	}
  public function KaryawanCreate()
	{
		$data=array(
			'username'		=>	$this->input->post('username'),
			'password'	  =>	password_hash($this->input->post('password'),PASSWORD_DEFAULT),
      'fullname'	  =>	$this->input->post('nama'),
      'id_divisi'	  =>	$this->input->post('divisi'),
			'level'	      =>	$this->input->post('level'),
		);
		if(!empty($_FILES['image']['name']))
		{
			$path = 'template/global_assets/images/foto/';
			$upload = $this->_do_upload($path);
			$data['foto'] = $upload;
		}else{
			$data['foto'] = "user-img.jpg";
		}

		$this->m->Save($data, 'users');
		redirect(base_url().'index.php/Hrd/Karyawan');
	}
  public function KaryawanUpdate()
	{
    $table = 'users';
		$where=array(
			'username'		=>	$this->input->post('id')
		);
		$data=array(
      'fullname'	  =>	$this->input->post('nama'),
      'id_divisi'	  =>	$this->input->post('divisi'),
			'level'	      =>	$this->input->post('level'),
		);
    if($this->input->post('password')!=""){$data['password']=password_hash($this->input->post('password'),PASSWORD_DEFAULT);}
		if(!empty($_FILES['image']['name']))
		{
      $path = 'template/global_assets/images/foto/';
			$upload = $this->_do_upload($path);
      $data['foto'] = $upload;
			$read = $this->m->Get_Where($where, $table);
			if(file_exists('template/global_assets/images/foto/'.$read->image) && ($read->image != 'user-img.jpg')){
        unlink('template/global_assets/images/foto/'.$read->image);
      }
		}
		$this->m->Update($where, $data, $table);
		redirect(base_url().'index.php/Hrd/Karyawan');
	}
	function KaryawanDelete()
	{
		$table = 'users';
		$where=array(
			'username'		=>	$this->input->post('id')
		);
		$read = $this->m->Get_Where($where, $table);
    if(file_exists('template/global_assets/images/foto/'.$read->image) && ($read->image != 'user-img.jpg')){
      unlink('template/global_assets/images/foto/'.$read->image);
    }

		$this->m->Delete($where, $table);

		redirect(base_url().'index.php/Hrd/Karyawan');
	}
	public function TunjanganTransportCreate()
	{
    $data['uang_transport'] = $this->input->post('uang_transport');
    $data['jam_absen'] = $this->input->post('waktu_kehadiran');
    $this->m->Save($data,'tunjangan_transport');
		redirect(base_url().'index.php/Hrd/TunjanganTransport');
	}
	public function TunjanganTransportUpdate()
	{
    $where['id'] = $this->input->post('id');
    $data['uang_transport'] = $this->input->post('uang_transport');
    $data['jam_absen'] = $this->input->post('waktu_kehadiran');
    $this->m->Update($where,$data,'tunjangan_transport');
		redirect(base_url().'index.php/Hrd/TunjanganTransport');
	}
	public function TunjanganTransportDelete()
	{
    $where['id'] = $this->input->post('id');
    $this->m->Delete($where,'tunjangan_transport');
		redirect(base_url().'index.php/Hrd/TunjanganTransport');
	}
	public function TunjanganMakanUpdate()
	{
    $data['uang_makan'] = $this->input->post('uang_makan');
    $this->m->Update_All($data,'tunjangan_makan');
		redirect(base_url().'index.php/Hrd/TunjanganMakan');
	}
  public function ResumeBuku()
	{
    $data['tahun']=date('Y');
    if(isset($_POST['tahun'])){
      $data['tahun']=$this->input->post('tahun');
    }
    $select = $this->db->select('*');
    $select = $this->db->where('level','karyawan');
		$select = $this->db->order_by('fullname');
    $data['read_users'] = $this->m->Get_All('users',$select);
		$this->load->view('hrd/resume-buku',$data);
	}
	public function ResumeBukuVerifikasi($id_buku)
	{
    $where=array(
			'id_buku'			=> $id_buku
		);
		$data=array(
			'status'		=>	'1',
		);
		$this->m->Update($where,$data,'resume_buku');
		redirect('index.php/Hrd/ResumeBuku');
	}
  public function ViewResumeBuku($id)
	{
		$select = $this->db->select('*');
		$select = $this->db->where('id_buku',$id);
		$data['read_resume_buku'] = $this->m->Get_All('resume_buku',$select);

		$this->load->view('hrd/resume-buku-view',$data);
	}
  private function _do_upload($path){
		$config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500000; //set max size allowed in Kilobyte
        $config['max_width']            = 500000; // set max width image allowed
        $config['max_height']           = 500000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('image')) //upload and validate
        {
            $data['inputerror'][] = 'image';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}
}
?>
