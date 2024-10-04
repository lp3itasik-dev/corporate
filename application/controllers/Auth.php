<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
    }

	public function index()
	{
		$this->Login();
	}
	public function masuk()
	{
		$this->load->view('mkt/index');
	}

	/** --Login-- **/
	public function login()
	{
		$this->load->view('log/index');
	}
	public function cek_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$select = $this->db->select('*');
		$select = $this->db->where('username',$username);
		$select = $this->db->join('divisi','divisi.id=users.id_divisi');
		$login = $this->m->Get_All('users',$select);
		if(count($login)>0){
			foreach ($login as $d) {
				$password_hash = $d->password;
				$level = $d->level;
				if(password_verify($password, $password_hash)) {
					$data=array(
						'username' 		=> $d->username,
						'fullname' 		=> $d->fullname,
						'level' 			=> $d->level,
						'foto' 				=> $d->foto,
						'id_divisi' 	=> $d->id_divisi,
						'divisi' 			=> $d->divisi,
						'color1' 			=> $d->color1,
						'color2' 			=> $d->color2,
						'gradient' 		=> $d->gradient,
					);
					$this->session->set_userdata($data);
					echo ucfirst($d->level);
				}else{
					echo 'false';
				}
			}
		}else{
			echo "false";
		}
	}
	/** --Login-- **/

	/** --Logout-- **/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	/** --Logout-- **/

	public function Profile()
	{
		$this->load->view('log/profile');
	}
	public function ProfileUpdate()
	{
		$table = 'users';
		$where=array(
			'username'		=>	$this->session->userdata('username')
		);
		$data=array(
			'fullname'	  =>	$this->input->post('nama'),
			'gradient'	  =>	$this->input->post('gradient'),
			'color1'		  =>	$this->input->post('color1'),
      'color2'	 		=>	$this->input->post('color2'),
		);
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
		$this->session->set_userdata($data);
		if($this->input->post('password')!=""){$data['password']=password_hash($this->input->post('password'),PASSWORD_DEFAULT);}
		$this->m->Update($where, $data, $table);
		redirect(base_url().'Auth/Profile');
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
