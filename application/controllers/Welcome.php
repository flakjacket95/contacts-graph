<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	public function index()
	{
		$this->load->database();
		$data['people'] = $this->db->get('graph_people')->result();
		$data['orgs'] = $this->db->get('graph_orgs')->result();
		$this->load->view('graph', $data);
	}
	public function addGraphOrg() {
		$nm = $this->input->post('name');
		$pnt = $this->input->post('parent');
		$this->load->database();
		$this->db->insert('graph_orgs', array('name' => $nm, 'parent' => $pnt));
		redirect('welcome/index');
	}
	public function addGraphPerson() {
		if($this->input->post('clnk') == "") {
			$clnk = NULL;
		} else {
			$clnk = $this->input->post('clnk');
		}
		$info = array (
			'o_id' => $this->input->post('org'),
			'clnk' => $clnk,
			'poc' => $this->input->post('poc'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'notes' => $this->input->post('notes'),
			'website' => $this->input->post('website')
		);
		$this->load->database();
		$this->db->insert('graph_people', $info);
		redirect('welcome/index');
	}
	public function editGraphPerson() {
		if($this->input->post('editclnk') == "") {
			$clnk = NULL;
		} else {
			$clnk = $this->input->post('editclnk');
		}
		$info = array (
			'o_id' => $this->input->post('editorg'),
			'clnk' => $clnk,
			'poc' => $this->input->post('editpoc'),
			'email' => $this->input->post('editemail'),
			'phone' => $this->input->post('editphone'),
			'name' => $this->input->post('editname'),
			'address' => $this->input->post('editaddress'),
			'notes' => $this->input->post('editnotes'),
			'website' => $this->input->post('editwebsite')
		);
		$this->load->database();
		$this->db->where('p_id', $this->input->post('editpid'));
		$this->db->update('graph_people', $info);
		redirect('welcome/index');
	}
	public function editGraphOrg() {
		$nm = $this->input->post('editorgname');
		$pnt = $this->input->post('editorgparent');
		$this->load->database();
		$this->db->where('o_id', $this->input->post('editorgoid'));
		$this->db->update('graph_orgs', array('name' => $nm, 'parent' => $pnt));
		redirect('welcome/index');
	}
}
