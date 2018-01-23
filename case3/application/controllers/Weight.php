<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weight extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		//Load Dependencies
		$this->load->helper('url');
		$this->load->model('m_weight');
	}

	// View All Items
	public function index()
	{
		$data = array(
			'template' => 'v_home',
			'title'	   => 'Body Weight Logging',
			'weight'   => $this->m_weight->get_all()
		);

		$this->load->view('template/page', $data, FALSE);
	}

	// View One Item
	public function view( $date = NULL )
	{
		$condition = array(
			'date' => $date
		);

		$weight = $this->m_weight->get($condition);

		if ($weight == NULL) 
		{
			$this->session->set_flashdata('error', 'No Data Found');
			redirect('');
		} 
		else 
		{
			$data = array(
				'template' => 'v_view',
				'title'	   => 'Body Weight ' . $weight['date'],
				'weight'   => $weight
			);

			$this->load->view('template/page', $data, FALSE);
		}
	}

	// Add New Item
	public function insert()
	{
		$data = array(
			'template'	=> 'v_form',
			'title'		=> 'Insert Data'
		);

		$post = $this->session->flashdata('post');

		$data['date'] = $post['date'];
		$data['max']  = $post['max'];
		$data['min']  = $post['min'];

		if ($this->input->post('submit')) 
		{
			$this->validate_input();
		}
		else
		{
			$this->load->view('template/page', $data, FALSE);
		}		
	}

	// Edit Item
	public function edit($date = NULL)
	{
		$condition = array(
			'date' => $date
		);

		$weight = $this->m_weight->get($condition);

		if ($weight == NULL) 
		{
			$this->session->set_flashdata('error', 'No Data Found');
			redirect('');
		} 
		else 
		{
			$data = array(
				'template'	=> 'v_form',
				'title'		=> 'Edit Data'
			);

			$post = $this->session->flashdata('post');

			if ($post == NULL) 
			{
				$data['date'] = $weight['date'];
				$data['max']  = $weight['max'];
				$data['min']  = $weight['min'];
			}
			else
			{				
				$data['date'] = $post['date'];
				$data['max']  = $post['max'];
				$data['min']  = $post['min'];
			}

			if ($this->input->post('submit')) 
			{
				$this->validate_input();
			}
			else
			{
				$this->load->view('template/page', $data, FALSE);
			}	
		}	
	}

	// Delete Item
	public function delete($date = NULL)
	{
		$condition = array(
			'date' => $date
		);

		$weight = $this->m_weight->get($condition);

		if ($weight == NULL) 
		{
			$this->session->set_flashdata('error', 'No Data Found');
			redirect('');
		} 
		else 
		{
			$condition = array(
				'date' => $date
			);

			$this->m_weight->delete($condition);

			$this->session->set_flashdata('success', 'Data deleted');
			redirect('');
		}	
	}

	//Validate Form Input
	private function validate_input()
	{
		$this->session->set_flashdata('post', $this->input->post());

		$post = $this->input->post();

		if ($post['date'] == NULL) 
		{
			$error = 'Please fill Date';
		}
		else if ($post['max'] == NULL) 
		{
			$error = 'Please fill Max';
		}
		else if ($post['min'] == NULL) 
		{
			$error = 'Please fill Min';
		}
		else if ($post['max'] < $post['min']) 
		{
			$error = 'Max must be greater or equal than Min';
		}
		else
		{
			$this->uri->segment(2);

			if ($this->uri->segment(2) == 'insert') 
			{
				$condition = array(
					'date' => $post['date']
				);

				$check_flag = $this->m_weight->get($condition);

				if ($check_flag != NULL) 
				{
					$error = 'Data already exist';
				}
			}
		}

		if (isset($error)) 
		{
			$this->session->set_flashdata('error', $error);		

			//For Insert
			$url = 'weight/' . $this->uri->segment(2);

			//For Edit
			if ($this->uri->segment(3) != NULL) 
			{
				$url = $url . '/' . $this->uri->segment(3);
			}

			redirect($url);
		}
		else
		{
			unset($data);

			$data = array(
				'date' 	=> $post['date'],
				'max'	=> $post['max'],
				'min'	=> $post['min']
			);

			//Insert Data
			if ($this->uri->segment(2) == 'insert') 
			{
				$this->m_weight->insert($data);

				$this->session->set_flashdata('success', 'Data inserted');
			}
			//Edit Data
			else
			{
				unset($condition);

				$date = $this->uri->segment(3);

				$condition['date'] = $date;

				$this->m_weight->update($data, $condition);

				$this->session->set_flashdata('success', 'Data updated');
			}
			
			redirect('');
		}

	}

}