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
		$this->crud->unset_columns('created_at','updated_at');
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
		
	}

	public function students(){

		$this->crud->set_table('tm_students');
		
		$this->crud->set_relation_n_n('child', 'tp_student_parent', 'tm_parents', 'nis', 'id_parents', 'nama');
		

		$this->crud->set_relation('id_agama','tm_agama','nama_agama');
		
		$this->crud->set_subject('Students');

		$output = $this->crud->render();

			$this->_example_output($output);
	}

	public function input_nilai(){
		
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

		$output = $this->crud->render();
		$this->_example_output($output);   
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
		
		$this->crud->set_subject('Makanan');

		$output = $this->crud->render();
		$this->_example_output($output);   
		
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

		$output = $this->crud->render();
		$this->_example_output($output);   
		
	}

	public function jadwal_mata_pelajaran(){
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

		$output = $this->crud->render();
		$this->_example_output($output);   
	}

	public function input_kelas(){

		$this->crud->set_table('tm_class');

		$this->crud->columns('nama_ruang_kelas');

		$this->crud->unset_columns('id_jam');

		$output = $this->crud->render();
		$this->_example_output($output);
	}

	public function nilai_anak($id=0){

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

		$output = $this->crud->render();
		$this->_example_output($output);   
	}

	function _example_output($output = null){
		$this->load->view('example.php',$output); 
	}
}
