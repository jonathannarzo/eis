<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->model('employees_model');
		// Check if authenticated
		if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');
	}

	public function index()
	{
		$this->data['page_title'] = 'Employees';

		$this->load->library('pagination');
		$config["base_url"] = base_url().'/employees/index/';
		$config["total_rows"] = $this->employees_model->record_count();
		$config["per_page"] = 5;
		$config["num_links"] = 10;
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$this->pagination->initialize($config);
		$this->data["results"] = $this->employees_model->fetch_records($config["per_page"], $this->uri->segment(3));
		$this->data["links"] = $this->pagination->create_links();

		// Form
		$this->data['logged_in'] = $this->ion_auth->logged_in();
		$this->data['fullname'] = array(
			'name' => 'fullname',
			'id'    => 'fullname',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('fullname'),
			'required' => 'required',
			'class' => 'form-control'
		);
		$this->data['position'] = array(
			'name' => 'position',
			'id'    => 'position',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('position'),
			'required' => 'required',
			'class' => 'form-control'
		);
		$this->data['birth_date'] = array(
			'name' => 'birth_date',
			'id'    => 'birth_date',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('birth_date'),
			'required' => 'required',
			'class' => 'form-control datepicker-select'
		);
		$this->data['age'] = array(
			'name' => 'age',
			'id'    => 'age',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('age'),
			'readonly' => 'readonly',
			'class' => 'form-control'
		);
		$this->data['salary'] = array(
			'name' => 'salary',
			'id'    => 'salary',
			'type'  => 'number',
			'step' => '0.01',
			'value' => $this->form_validation->set_value('salary'),
			'required' => 'required',
			'class' => 'form-control'
		);
		$this->load->view('employee/employee', $this->data);
	}

	public function create()
	{
		$this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
		$this->form_validation->set_rules('position', 'Position', 'required|trim');
		$this->form_validation->set_rules('birth_date', 'Birthdate', 'required|trim');
		$this->form_validation->set_rules('age', 'Age', 'trim');
		$this->form_validation->set_rules('salary', 'Salary', 'required|trim');

		if ($this->form_validation->run()) {
			$data = [
				'fullname' => $this->input->post('fullname'),
				'position' => $this->input->post('position'),
				'birth_date' => date('Y-m-d', strtotime($this->input->post('birth_date'))),
				'salary' => $this->input->post('salary')
			];
			
			if ($this->input->post('method') === 'edit') $process = $this->employees_model->update($this->input->post('record-id'), $data);
			else $process = $this->employees_model->insert_employee($data);

			echo json_encode(array('success' => (bool) $process));
		} else {
			echo json_encode(array(
				'success' => false,
				'msg' => validation_errors()
			));
		}
	}

	public function delete()
	{
		$segments = $this->uri->segment_array();
		$ids = array();
		foreach ($segments as $key => $segment) {
			if ($key > 2) {
				$ids[] = $segment;
			}
		}
		$delete = $this->employees_model->delete_record($ids);
		echo json_encode(array(
			'success' => (bool) $delete
		));
	}

	public function edit($id)
	{
		$record = $this->employees_model->find($id);
		echo json_encode(array(
			'success' => true,
			'id' => $record->id,
			'fullname' => $record->fullname,
			'position' => $record->position,
			'birth_date' => date('m/d/Y', strtotime($record->birth_date)),
			'salary' => $record->salary
		));
	}
}
