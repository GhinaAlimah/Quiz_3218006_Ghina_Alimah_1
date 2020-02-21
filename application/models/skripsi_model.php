<?php
/**
 * 
 */
class skripsi_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_tskripsi($slug = FALSE)
	{
		if ($judul == FALSE) {
			$query = $this->db->get('tskripsi');
			return $query->result_array();
		}
		$query = $this->db->get_where('tskripsi', array('judul' => $judul));
		return $query->row_array();
	}

	public function get_tskripsi_by_nim($nim = 0)
	{
		if ($nim == 0) {
			$query = $this->db->get('tskripsi');
			return $query->result_array();
		}
		$query = $this->db->get_where('tskripsi', array('nim' => $nim));
		return $query->row_array();
	}

	public function set_tskripsi($nim = 0)
	{
		$this->load->helper('url');
		$judul = url_title($this->input->post('nim','nama','judul','pemb'),'dash', TRUE);
		$data = array(
			'nim' => $this->input->post('nim'),
			'nama' => $this->input->post('nama'),
			'judul' => $this->input->post('judul'),
			'pemb' => $this->input->post('pemb')

		);
		if ($nim) {
			return $this->db->insert('tskripsi', $data);
		}else{
			return $this->db->update('tskripsi', $data);
		}
		
	}

	public function delete_tskripsi($nim)
	{
		$this->db->where('nim', $nim);
		return $this->db->delete('tskripsi');
	}
}