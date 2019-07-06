<?php

class Blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("blog_model");
        $this->load->library("pagination");
    }


    public function index()
    {
        $data['view'] = 'blog_view/add_blog';
        $this->load->view('admin/layout', $data);
    }

    public function insert()
    {
        $this->load->model('blog_model');
        if ($this->input->post('submit')) {
           $cover_image = $_FILES['cover_image']['name'];
           $body_image = $_FILES['body_image']['name'];

            if($cover_image !== ""){

                $config['upload_path'] = './uploads/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '0'; // 0 = no file size limit
                //$config['file_name'] = $cover_image;
                $config['overwrite'] = false;
                $this->load->library('upload', $config);
                $this->upload->do_upload('cover_image');
                $upload_data = $this->upload->data();
                $cover_image = $upload_data['file_name'];

            }

            if($body_image !== ""){
                $config1['upload_path'] = './uploads/';
                $config1['log_threshold'] = 1;
                $config1['allowed_types'] = 'jpg|png|jpeg|gif';
                $config1['max_size'] = '0'; // 0 = no file size limit
                //$config1['file_name'] = $body_image;
                $config1['overwrite'] = false;
                $this->load->library('upload', $config1);
                $this->upload->do_upload('body_image');
                $upload_data1 = $this->upload->data();
                $body_image = $upload_data1['file_name'];

            }

                $article_name = $this->input->post('article_name');
                $description = $this->input->post('description');
                $date = $this->input->post('datepicker');
                $time = $this->input->post('timepicker');



            $this->blog_model->insert_data($article_name,$description,$date,$time,$cover_image,$body_image);
            redirect("blog/Blog", "refresh");
            }


        else {
            $data['view'] = 'blog_view/add_blog';
            $this->load->view('admin/layout', $data);
        }

    }

    public function view_blog()
    {
        $this->load->model("blog_model");
        $this->load->library("pagination");

        $config = array();
        $config["base_url"] = base_url() . "blog/Blog/view_blog/";
        $config["total_rows"] = $this->blog_model->count_blog();
        $config["per_page"] = 2;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data["view_data"] = $this->blog_model->view_data($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['view'] = 'blog_view/view_blog';
        $this->load->view('admin/layout', $data);

    }

    public function tag_blog(){
        $this->load->model("blog_model");
        $this->load->library("pagination");

        $config = array();
        $config["base_url"] = base_url() . "blog/Blog/tag_blog/";
        $config["total_rows"] = $this->blog_model->count_blog();
        $config["per_page"] = 5;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data["view_data"] = $this->blog_model->view_data($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['view'] = 'blog_view/tag_blog';
        $this->load->view('admin/layout', $data);
    }

    public function fetch()
    {
        $this->load->model("blog_model");
        $output = array();
        $data = $this->blog_model->fetch($_POST["blog_id"]);
        foreach ($data as $row) {
            $output['article_name'] = $row->article_name;
            $output['description'] = $row->description;
            $output['tag_name'] = $row->tag_name;
        }
        echo json_encode($output);
    }

    public function update()
    {
       $this->load->database();
       $_POST['action']= "save";
        if($_POST['action']=="save"){
           $updated = array(
               'article_name'=> $this->input->post('article_name'),
               'description'=> $this->input->post('description'),
           );
           $this->db->where('blog_id',$this->input->post("blog_id"));
           $this->db->update('blog',$updated);
           redirect('Blog','refresh');
       }
    }
    public function delete_data(){
        $blog_id = $this->uri->segment(4);
        $this->load->model('blog_model');
        $this->blog_model->delete($blog_id);
        redirect(base_url('blog/Blog/view_blog'));
    }

    public function add_tag(){
        $this->load->model('blog_model');
        $_POST['action']= "save";
        if($_POST['action']=="save"){
            $updated = array(
                'tag_name'=> $this->input->post('tag_name'),
            );
            $this->db->where('blog_id',$this->input->post("blog_id"));
            $this->db->update('blog',$updated);
            redirect('Blog','refresh');
        }

    }



}


