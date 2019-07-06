<?php

class Blog_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function insert_data($article_name,$description,$date,$time,$cover_image,$body_image)
    {
        $data=array(
            'article_name'=>$article_name,
            'description'=>$description,
            'date'=>$date,
            'time'=>$time,
            'cover_image'=>$cover_image,
            'body_image'=>$body_image,
        );
        $this->db->insert("blog",$data);
    }

    public function view_data($limit,$start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("blog");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function latest_blog(){

        $last = $this->db->order_by("date","DESC")
            ->limit(5)
            ->get('blog');

        return $last->result();
    }
    public function count_blog(){
        return $this->db->count_all("blog");
    }

    public function fetch($id){
        $this->db->where("blog_id",$id);
        $query = $this->db->get("blog");
        return $query->result();
    }

    public function delete($id){
        $this->db->where("blog_id", $id);
        $this->db->delete("blog");
    }

    public function get_blog($date){
        $this->db->select('*');
        $this->db->from("blog");
        $this->db->where("date",$date);
        $query = $this->db->get();
        return $query->result();
    }
}