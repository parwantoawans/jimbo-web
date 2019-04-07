<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	var $crud;
	var $isLogIn = false;

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('grocery_CRUD');
		$this->crud = new grocery_CRUD();
		$this->load->model('Menu_Model');
		$this->load->model('User_Model');
		$this->load->library('session');
		//$this->crud->set_theme('twitter-bootstrap');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");

		$this->isLogIn = $this->session->userdata('logged');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){

		if(is_null($this->isLogIn) || !$this->isLogIn){
			redirect('/welcome/login/');
		}

		$userMenu = $this->Menu_Model->getUserMenu($this->session->userdata('role_id'));
		
		//$this->load->view('home_cms');
		$data['menu'] = $this->Menu_Model->getMenuList();
		$data['user_menu'] = $userMenu;
		$this->load->view('dashboard', $data);
	}

	public function login(){
		$data['msg'] = $this->session->userdata('login_err');
		$this->load->view('login', $data);
	}

	public function doLogin(){

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[15]');

		if ($this->form_validation->run() == FALSE){
			$this->session->set_userdata('login_err', base64_encode(validation_errors()));
            redirect('/welcome/login/');
        }else{
			$userData = $this->User_Model->login($this->input->post('username'), $this->input->post('password'));
			if(is_array($userData) && count($userData)>0){
				$this->session->set_userdata('logged', true);
				$this->session->set_userdata('user_name', $userData[0]['username']);
				$this->session->set_userdata('user_id', $userData[0]['user_id']);
				$this->session->set_userdata('role_id', $userData[0]['menu_role_id']);
				$this->session->unset_userdata('login_err');
				redirect('/');
			}else{
				$this->session->set_userdata('login_err', 'No User Exists');
            	redirect('/welcome/login/');
			}
        }

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/welcome/login/');
	}

	private function render(){

		if(is_null($this->isLogIn) || !$this->isLogIn){
			redirect('/welcome/login/');
		}

		$this->crud->unset_columns(array('created_at','updated_at', 'role_parents', 'id_jam', 'title2', 'title3', 'is_active'));
		$this->crud->unset_edit_fields(array('created_at','updated_at', 'role_parents', 'id_jam', 'title2', 'title3', 'is_active'));
		$this->crud->unset_add_fields(array('created_at','updated_at', 'role_parents', 'id_jam', 'title2', 'title3', 'is_active'));
		$output = $this->crud->render();
		$this->_example_output($output);
	}

	public function tx_testing_calendar(){
		$this->crud->set_subject('Testing Calendar');
		$this->render();
	}

	public function students(){

		$this->crud->set_table('tm_students');
		$this->crud->set_relation_n_n('orangtua', 'tp_student_parent', 'tm_parents', 'nis', 'id_parents', 'nama');
		$this->crud->set_relation('id_agama','tm_agama','nama_agama');
		$this->crud->set_subject('Students');
		$this->crud->display_as('id_agama','Agama');
		$this->render();
	}

	public function tm_agama(){
		$this->crud->set_subject('Religion');
		$this->render();
	}

	public function tm_articles_type(){
		$this->crud->set_subject('Article Type');
		$this->crud->set_field_upload('image', $this->config->item('image_content_path'));
		$this->crud->display_as('articles_type','Type');
		$this->crud->display_as('desc','Description');
		$this->render();
	}

	public function tm_class(){
		$this->crud->set_subject('Class');
		$this->render();
	}

	public function tm_classes_program(){
		$this->crud->set_subject('Class Program');
		$this->crud->set_field_upload('image', $this->config->item('image_content_path'));
		$this->crud->display_as('program','Title');
		$this->crud->display_as('desc','Description');
		$this->render();
	}

	public function tm_events_type(){
		$this->crud->set_subject('Event Type');
		$this->render();
	}

	public function tm_extracuricullar(){
		$this->crud->set_subject('Extracuricullar');
		$this->crud->set_field_upload('icon', $this->config->item('image_content_path'));
		$this->crud->display_as('jenis_extracuricullar','Name');
		$this->render();
	}

	public function tm_food_menu(){
		$this->crud->set_subject('Food Menu');
		$this->crud->set_field_upload('image', $this->config->item('image_content_path'));
		$this->render();
	}

	public function tm_parents(){
		$this->crud->set_subject('Parent');
		$this->crud->set_field_upload('image', $this->config->item('image_content_path'));
		$this->crud->set_relation('id_agama','tm_agama','nama_agama');
		$this->render();
	}

	public function tm_school(){
		$this->crud->set_subject('School');
		$this->crud->set_field_upload('visi_image', $this->config->item('image_content_path'));
		$this->crud->set_field_upload('misi_image', $this->config->item('image_content_path'));
		$this->crud->set_field_upload('file_url', $this->config->item('image_content_path'));
		$this->crud->display_as('name_school','School Name');
		$this->render();
	}

	public function tm_subjects(){
		$this->crud->set_subject('Subject');
		$this->crud->display_as('nama_mapel','Nama Mata Pelajaran');
		$this->render();
	}

	public function tm_teachers(){
		$this->crud->set_subject('Teacher');
		$this->crud->set_field_upload('image', $this->config->item('image_content_path'));
		$this->crud->set_relation('id_agama','tm_agama','nama_agama');
		$this->render();
	}

	public function tm_type_nilai(){
		$this->crud->set_subject('Value of Subject');
		$this->crud->display_as('desc','Description');
		$this->render();
	}

	public function tp_school_year(){
		$this->crud->set_subject('Year of the School');
		$this->crud->set_relation('id_sekolah','tm_school','name_school');
		$this->crud->display_as('id_sekolah','Nama Sekolah');
		$this->render();
	}

	public function tm_contact(){
		$this->crud->set_subject('Contact');
		$this->render();
	}

	public function tm_experience(){
		$this->crud->set_subject('Experience');
		$this->render();
	}

	public function tm_gallery(){
		$this->crud->set_field_upload('image',$this->config->item('image_content_path'));
		$this->crud->set_subject('Image Gallery');
		$this->render();
	}

	public function tp_testimoni_parents(){
		$this->crud->set_subject('Parent Testimonial');
		$this->crud->set_relation('id_parents','tm_parents','nama');
		$this->crud->display_as('id_parents','Name');
		$this->render();
	}

	public function tm_about_us(){
		$this->crud->set_subject('About Us');
		$this->crud->set_field_upload('image',$this->config->item('image_content_path'));
		$this->render();
	}

	public function tm_menu(){
		$this->crud->set_subject('User Menu');
		$this->render();
	}

	public function tm_menu_group(){
		$this->crud->set_subject('User Group Menu');
		$this->render();
	}
	
	// transaction =========================================================================================

	public function input_news(){
		$this->crud->set_subject('News');
		$this->crud->set_table('tm_news');
		$this->crud->set_relation('user_id','tm_users','username');
		$this->crud->set_field_upload('image',$this->config->item('image_content_path'));
		$this->crud->display_as('desc','Content');
		$this->crud->display_as('user_id','User Created');
		$this->render();
	}

	public function input_article(){
		$this->crud->set_subject('Articles');
		$this->crud->set_table('tm_articles');
		$this->crud->set_relation('articles_type_id','tm_articles_type','articles_type');
		$this->crud->set_field_upload('image',$this->config->item('image_content_path'));
		$this->crud->display_as('articles_type_id','Article Type');
		$this->crud->display_as('desc','Description');
		$this->render();
	}

	public function input_event(){
		$this->crud->set_subject('Events');
		$this->crud->set_table('tm_events');
		$this->crud->set_relation('events_type_id','tm_events_type','type');
		$this->crud->display_as('events_type_id','Event Type');
		$this->crud->display_as('desc','Description');
		$this->crud->display_as('nama','Name');
		$this->render();
	}

	public function input_nilai(){

		$this->crud->set_subject('Value of Subject');
		
		$this->crud->set_table('tx_nilai');
		$this->crud->set_relation('nis','tm_students','nama_panggilan');
		$this->crud->set_relation('mid','tm_subjects','nama_mapel');
		$this->crud->set_relation('id_tahun_ajaran','tp_school_year','desc');
		$this->crud->set_relation('id_type_nilai','tm_type_nilai','desc');
		
		$this->crud->display_as('nis','Nama Siswa');
		$this->crud->display_as('mid','Mata Pelajaran');
		$this->crud->display_as('id_tahun_ajaran','Tahun Ajaran');
		$this->crud->display_as('id_type_nilai','Tipe Nilai');

		$this->render(); 
	}

	public function input_makanan(){

		$this->crud->set_table('tp_food_student_year');
		$this->crud->set_relation('id_tahun_ajaran','tp_school_year','desc');
		$this->crud->set_relation('nis','tm_students','nama_panggilan');
		$this->crud->set_relation('fid','tm_food_menu','jenis_makanan');

		$this->crud->columns('id_tahun_ajaran','nis','fid','date');
		$this->crud->unset_columns('created_at','updated_at');

		$this->crud->display_as('id_tahun_ajaran','Tahun Ajaran');
		$this->crud->display_as('fid','Jenis Makanan');
		$this->crud->display_as('nis','Nama Siswa');
		
		$this->crud->set_subject('Foods');

		$this->render(); 
		
	}

	public function input_extracuricullar(){

		$this->crud->set_table('tx_extracuricullar');
		$this->crud->set_relation('id_tahun_ajaran','tp_school_year','desc');
		$this->crud->set_relation('nis','tm_students','nama_panggilan');
		$this->crud->set_relation('extra_id','tm_extracuricullar','jenis_extracuricullar');

		$this->crud->unset_columns('created_at','updated_at');
		
		$this->crud->set_subject('Extracuricullar');

		$this->crud->display_as('id_tahun_ajaran','Tahun Ajaran');
		$this->crud->display_as('extra_id','Nama Extracuricullar');
		$this->crud->display_as('nis','Nama Siswa');

		$this->render(); 
		
	}

	public function jadwal_mata_pelajaran(){

		$this->crud->set_subject('Subjects');

		$this->crud->set_table('tx_schedule');
		$this->crud->set_relation('id_tahun_ajaran','tp_school_year','desc');
		$this->crud->set_relation('id_class','tm_class','nama_ruang_kelas');
		$this->crud->set_relation('peg_id','tm_teachers','nama_panggilan');
		$this->crud->set_subject('Jadwal Mata Pelajaran');
		$this->crud->set_relation('mid','tm_subjects','nama_mapel');

		$this->crud->display_as('id_tahun_ajaran','Tahun Ajaran');
		$this->crud->display_as('id_class','Nama Kelas');
		$this->crud->display_as('peg_id','Nama Guru');
		$this->crud->display_as('mid','Mata Pelajaran');

		$this->render(); 
	}

	public function input_kelas(){

		$this->crud->set_subject('Classes');
		$this->crud->set_table('tm_class');
		$this->crud->columns('nama_ruang_kelas');
		$this->crud->unset_columns('id_jam');
		$this->render();
	}

	// fungsi ini untuk orang tua
	public function nilai_anak( $id = 0 ){

		$this->crud->where('tx_nilai.nis',$id);
		
		$this->crud->set_table('tx_nilai');
		$this->crud->set_relation('nis','tm_students','nama_panggilan');
		$this->crud->set_relation('mid','tm_subjects','nama_mapel');
		$this->crud->set_relation('id_tahun_ajaran','tp_school_year','desc');
		$this->crud->set_relation('id_type_nilai','tm_type_nilai','desc');

		$this->crud->set_subject('Nilai');
		$this->crud->display_as('nis','Nama Siswa');
		$this->crud->display_as('mid','Mata Pelajaran');
		$this->crud->display_as('id_tahun_ajaran','Tahun Ajaran');
		$this->crud->display_as('id_type_nilai','Tipe Nilai');

		//$this->crud->unset_add();
		//$this->crud->unset_edit();
		$this->crud->unset_delete();

		$this->render();   
	}

	public function tx_videos(){
		$this->crud->set_subject('Videos');
		$this->crud->set_field_upload('video',$this->config->item('image_content_path'));
		$this->render();
	}

	public function tm_school_improvement(){
		$this->crud->set_subject('School Improvement');
		$this->crud->set_field_upload('image',$this->config->item('image_content_path'));
		$this->render();
	}

	public function tm_other_service(){
		$this->crud->set_subject('Other Service');
		$this->crud->set_field_upload('image',$this->config->item('image_content_path'));
		$this->render();
	}

	public function tx_calendar(){
		$this->crud->set_subject('Callendar');
		$this->render();
	}

	public function tx_field_trip(){
		$this->crud->set_subject('Field Trip');
		$this->crud->set_field_upload('main_image', $this->config->item('image_content_path'));
		$this->crud->set_field_upload('image_1', $this->config->item('image_content_path'));
		$this->crud->set_field_upload('image_2', $this->config->item('image_content_path'));
		$this->crud->set_field_upload('image_3', $this->config->item('image_content_path'));
		$this->crud->set_field_upload('image_4', $this->config->item('image_content_path'));
		$this->crud->set_field_upload('image_5', $this->config->item('image_content_path'));
		$this->render();
	}

	public function tx_menu_role(){
		$this->crud->set_subject('Group Menu Role');
		$this->render();
	}

	public function menu_group_map(){
		$this->crud->set_subject('Group Menu Map');

		$this->crud->set_table('tp_menu_group');
		$this->crud->set_relation('group_menu_id','tm_menu_group','group_menu_name');
		$this->crud->set_relation('menu_id','tm_menu','menu_name');

		$this->crud->display_as('group_menu_id','Group Menu');
		$this->crud->display_as('menu_id','Menu');

		$this->render();
	}

	public function menu_role_map(){
		
		$this->crud->set_table('tp_role_map');
		$this->crud->set_relation('menu_role_id','tx_menu_role','role_name');
		$this->crud->set_relation('menu_id','tm_menu','menu_name');

		$this->crud->display_as('menu_role_id','Menu Role');
		$this->crud->display_as('menu_id','Menu');

		$this->crud->set_subject('Role Menu Map');

		$this->render();
	}

	function _example_output($output = null){
		$this->load->view('example.php',$output); 
	}
}
