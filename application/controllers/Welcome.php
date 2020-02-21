<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

	public function __construct(){
		parent::__construct();
		$this->load->model('skripsi_model');
		$this->load->helper('url_helper');
	}
	public function index()
	{
		$data['tskripsi'] = $this->skripsi_model->get_tskripsi();
		$data['judul'] = 'News archive';

	$this->load->view('tampil_data');
	}

	public function view($judul = NULL)
	{
		$data['tskripsi_item'] = $this->skripsi_model->get_tskripsi($judul);
		if (empty($data['tskripsi_item'])) {
			show_404();
		}
		$data['judul'] = $data['tskripsi_item']['judul'];
		$this->load->view('tampil_data', $data);
	}

	public function insert()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['judul'] = 'Create a news item';
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('nama','Nama','required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('insert');
		}
		else
		{
			$this->skripsi_model->set_tskripsi();

		}
	}

	public function edit()
	{
		$nim = $this->uri->segment(3);
	}

	if (empty($nim)) {
		show_404();
	}

	$this->load->helper('form');
	$this->load->library('form_validation');

$data['judul'] = 'Edit a news item';
$data['tskripsi_item'] = $this->skripsi_model->get_tskripsi_by_id($nim);
$this->form_validation->set_rules('judul', 'Judul','required');
$this->form_validation->set_rules('nama', 'Nama','required');
if ($this->form_validation->run() === FALSE) {
	$this->load->view('edit');
}
else
{
	$this->skripsi_model->est_tskripsi($nim);
	redirect(base_url(). 'index.php')
}
}

public function delete()
{
	$nim = $this->uri->segment(3);

	if (empty($nim)) {
		show_404();
	}

	$skripsi_item = $this->skripsi_model->get_tskripsi_by_id($nim);

	$this->skripsi_model->delete_tskripsi($nim);
	redirect(base_url().'index.php');
}