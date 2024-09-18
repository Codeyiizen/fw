<?php
/*
* https://www.google.com/search?q=how+to+change+user+status+in+codeigniter+3&sca_esv=562779362&sxsrf=AB5stBi93feoR3kjJvHJkYd01-oCG_1Jsg%3A1693936150707&ei=Fmr3ZNLmKpGO2roPuNCkwAY&oq=how+to+change+user+status+in+code&gs_lp=Egxnd3Mtd2l6LXNlcnAiIWhvdyB0byBjaGFuZ2UgdXNlciBzdGF0dXMgaW4gY29kZSoCCAEyBRAhGKABMgUQIRigATIFECEYoAEyBRAhGKABSMXsAVAAWKPXAXACeACQAQCYAcUDoAH_OKoBCjAuNDUuMi4wLjG4AQPIAQD4AQHCAgQQIxgnwgIHECMYigUYJ8ICCBAAGIoFGJECwgILEC4YigUYsQMYgwHCAgsQABiABBixAxiDAcICERAuGIMBGMcBGLEDGNEDGIAEwgILEC4YgAQYsQMYgwHCAgUQABiABMICCBAAGIAEGLEDwgILEAAYigUYsQMYgwHCAgcQABgNGIAEwgIGEAAYHhgNwgIIEAAYCBgeGA3CAgQQIRgVwgIIECEYFhgeGB3CAhEQLhiABBixAxiDARjHARjRA8ICBRAuGIAEwgIEEAAYA8ICCBAAGIAEGMsBwgIGEAAYFhgewgIIEAAYFhgeGA_iAwQYACBBiAYB&sclient=gws-wiz-serp
* https://elevenstechwebtutorials.com/detail/22/active-inactive-status-using-codeigniter
* https://techarise.com/full-featured-registration-login-module-codeigniter/
* https://www.guru99.com/codeigniter-url-routing.html
* https://www.webslesson.info/2020/10/how-to-implement-google-recaptcha-in-codeigniter.html
*/

defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Blog_Model extends CI_Model {

    public function InsertBlogCategories($insertData){ 
        $this->db->insert('blog_categories', $insertData);
        return true;
    }
    
    public function getBlogCategories(){
        $this->db->select('*');
        $this->db->from("blog_categories");
        $query = $this->db->get();
        return $query->result();
    }

    public function getCatById($id){
        $this->db->select('*');
        $this->db->from("blog_categories");
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function updateBlogCategories($id,$updateData){
     $this->db->where('id', $id);
     $this->db->update('blog_categories',$updateData);
    }

    public function deleteCategories($id){
        $this->db-> where('id',$id);
        $this->db-> delete('blog_categories');
        return true;
    }

    public function getBlogCategoriesAll(){
        $this->db->select('*');
        $this->db->from("blog_categories");
        $this->db-> where('status',1);
        $query = $this->db->get();
        return $query->result();
    }

    public function InsertBlog($data) {
        $this->db->insert('blog', $data);
        return $this->db->insert_id();
    }

    public function getBlogsAll(){
        $this->db->select('*');
        $this->db->from("blog");
        $query = $this->db->get();
        return $query->result(); 
    }

    public function getBlogById($id){
        $this->db->select('*');
        $this->db->from("blog");
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function updateBlog($id,$updateData){
        $this->db->where('id', $id);
        $this->db->update('blog',$updateData);
    }

    public function deleteBlog($id){
        $this->db-> where('id',$id);
        $this->db-> delete('blog');
    }

    public function updateBlogStatus($data){
        extract($data);
         $this->db->where('id', $id);
         $this->db->update($table_name, array('status' => $status,
        ));
        return true;
    }

    public function updateCatStatus($data){
        extract($data);
         $this->db->where('id', $id);
         $this->db->update($table_name, array('status' => $status,
        ));
        return true;
    }

    public function getCategoryById($id) {
        return $this->db->get_where('blog_categories', array('id' => $id))->row();
    }

    public function getBlogShow($id){
        $this->db->select('*');
        $this->db->from("blog");
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();   
    }

    public function getCatNameById($id){
        $this->db->select('*');
        $this->db->from("blog_categories");
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row(); 
    }

    public function getAllBlog(){
        $this->db->select('*');
        $this->db->from("blog");
        $this->db->where('status',1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getCategories(){
        $this->db->select('*');
        $this->db->from("blog_categories");
        $query = $this->db->get();
        return $query->result();  
    }

    // public function getBlogsByCategory($category_id) {
    //     $this->db->where('cat_id', $category_id);
    //     $query = $this->db->get('blog'); 
    //     return $query->result();
    // }

    public function getBlogDetailsById($id){  
        $this->db->select('*');
        $this->db->from("blog");
        $this->db->where('slug',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getAllTag(){
        $this->db->select('tag,id');
        $this->db->from('blog');
        $this->db->distinct(); 
        $query = $this->db->get();
        return $query->result();
    }

    public function getBlogsByTags($tags) {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->group_start();
        foreach ($tags as $tag) {
            $this->db->or_like('tag', $tag); // Match each tag
        }
        $this->db->group_end();
    
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getBlogsByCategory($category_id){
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->where('cat_id', $category_id);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }


    public function getSlugCount($title,$id=""){ 
        $this->db->where('title', trim($title));
        if(!empty($id)){  
            $this->db->where('id !=',$id);
        }
        $count = $this->db->count_all_results('blog');
        return $count;
    }

    public function getRecentBlog(){
        $this->db->select('*');
        $this->db->from("blog");
        $this->db->where('status',1);
        $this->db->limit(3);
        $this->db->order_by('id',"desc");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function countBlogByCatId($cat_id){
        $this->db->where('cat_id', $cat_id);
        $count = $this->db->count_all_results('blog');
        return $count;
    }
    
     
}
