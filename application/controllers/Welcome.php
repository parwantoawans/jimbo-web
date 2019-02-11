<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	var $crud;

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->crud = new grocery_CRUD();
		//$this->crud->set_theme('twitter-bootstrap');
		
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
		$this->load->view('header_menu');
	}

	private function render(){
		$this->crud->unset_columns(array('created_at','updated_at', 'role_parents', 'id_jam'));
		$this->crud->unset_edit_fields(array('created_at','updated_at', 'role_parents', 'id_jam'));
		$this->crud->unset_add_fields(array('created_at','updated_at', 'role_parents', 'id_jam'));
		$output = $this->crud->render();
		$this->_example_output($output);
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
		$this->crud->set_field_upload('image','assets/uploads/files');
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
		$this->crud->set_field_upload('image','assets/uploads/files');
		$this->crud->display_as('desc','Description');
		$this->render();
	}

	public function tm_events_type(){
		$this->crud->set_subject('Event Type');
		$this->render();
	}

	public function tm_extracuricullar(){
		$this->crud->set_subject('Extracuricullar');
		$this->crud->set_field_upload('icon','assets/uploads/files');
		$this->crud->display_as('jenis_extracuricullar','Name');
		$this->render();
	}

	public function tm_food_menu(){
		$this->crud->set_subject('Food Menu');
		$this->render();
	}

	public function tm_parents(){
		$this->crud->set_subject('Parent');
		$this->crud->set_field_upload('image','assets/uploads/files');
		$this->render();
	}

	public function tm_school(){
		$this->crud->set_subject('School');
		$this->crud->set_field_upload('visi_image','assets/uploads/files');
		$this->crud->set_field_upload('misi_image','assets/uploads/files');
		$this->crud->set_field_upload('file_url','assets/uploads/files');
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
		$this->crud->set_field_upload('image','assets/uploads/files');
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

	// transaction

	public function input_news(){
		$this->crud->set_subject('News');
		$this->crud->set_table('tm_news');
		$this->crud->set_relation('user_id','tm_users','username');
		$this->crud->set_field_upload('image','assets/uploads/files');
		$this->crud->display_as('desc','Description');
		$this->crud->display_as('user_id','User Created');
		$this->render();
	}

	public function input_article(){
		$this->crud->set_subject('Articles');
		$this->crud->set_table('tm_articles');
		$this->crud->set_relation('articles_type_id','tm_articles_type','articles_type');
		$this->crud->set_field_upload('image','assets/uploads/files');
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

		$this->crud->unset_add();
		$this->crud->unset_edit();
		$this->crud->unset_delete();

		$this->render();   
	}

	function _example_output($output = null){
		$this->load->view('example.php',$output); 
	}
}
