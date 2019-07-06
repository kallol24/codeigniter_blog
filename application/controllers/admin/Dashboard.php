<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends MY_Controller {
		public function __construct(){
			parent::__construct();

		}

        public function index(){
			$this->load->model('blog_model');
			$data['count_blog'] = $this->blog_model->count_blog();
			$data['view_data'] = $this->blog_model->latest_blog();
            $data['view'] = 'admin/dashboard/index';
            $this->load->view('admin/layout', $data);
        }
        public function get_blog(){

		    $this->load->model('blog_model');
		    $date = $this->input->post('date');
            $data = $this->blog_model->get_blog($date);
            echo json_encode($data);
        }


	}

