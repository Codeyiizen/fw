<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class BlogController extends CI_Controller
{

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{ // create constructor for Hangar model
		parent::__construct();
		$this->load->model('Blog_Model'); // Loading models defined in Favoritewish_Model.php
		$this->load->model('Mail', 'mail');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->library('encryption');
		$this->load->helper('custom');
		$this->load->library("pagination");
		$sql = "SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));";
        $this->db->query($sql );
	}

    
	public function adminBlog(){  
		$data['title'] = 'Blog List Page';
        $data['blog'] = $this->Blog_Model->getBlogsAll();
		$this->load->view('layouts/admin_header', $data);
		$this->template->load('default_layout', 'contents', 'admin/blog/adminBlog', $data);
		$this->load->view('layouts/admin_footer');
	}

	public function adminBlogAdd(){ 
		$data['title'] = 'Blog Add Page';
        $data['categories'] = $this->Blog_Model->getBlogCategoriesAll();
		$this->load->view('layouts/admin_header', $data);
		$this->template->load('default_layout', 'contents', 'admin/blog/addBlog', $data);
		$this->load->view('layouts/admin_footer');	 
	}
   
    public function adminBlogCategory(){   
		$data['title'] = 'Blog categories';
        $data['categoreis'] = $this->Blog_Model->getBlogCategories();
      //  echo"<pre>"; var_dump($data['categoreis']); exit;
		$this->load->view('layouts/admin_header', $data);
		$this->template->load('default_layout', 'contents', 'admin/blog/adminBlogCategory', $data);
		$this->load->view('layouts/admin_footer');
	}
    public function adminBlogCategoryAdd(){
        $data['title'] = 'Blog Categories Add Page';
		$this->load->view('layouts/admin_header', $data);
        $data['getCat'] = '';
		$this->template->load('default_layout', 'contents', 'admin/blog/categoriesAdd', $data);
		$this->load->view('layouts/admin_footer'); 
    }

    public function adminBlogCategoryAddPost(){
	   $this->form_validation->set_rules('title', 'title', 'required');
       $this->form_validation->set_rules('categories', 'Description', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->adminBlogCategoryAdd();
		}else{
			$insertData = array(
				'title' => $this->input->post('title'),
                'categories' => $this->input->post('categories'),
				'created_on' => date('Y-m-d H:i:s')
			); 
			 $this->Blog_Model->InsertBlogCategories($insertData);
             $this->session->set_flashdata('success', 'Category added successfully');
		   redirect('admin/blog/category');
	 }
    }

    public function adminBlogCategoryEdit(){ 
        $id = $this->uri->segment(5);
        $data['title'] = 'Blog Categories Add Page';
        $data['getCat'] = $this->Blog_Model->getCatById($id);
        $this->load->view('layouts/admin_header', $data);
		$this->template->load('default_layout', 'contents', 'admin/blog/categoryEdit', $data);
		$this->load->view('layouts/admin_footer');
    }

    public function adminBlogCategoryEditPost() { 
        $id = $this->uri->segment(6);  
    
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('categories', 'Description', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $data['getCat'] = $this->Blog_Model->getCatById($id);
            $this->load->view('layouts/admin_header', $data);
            $this->template->load('default_layout', 'contents', 'admin/blog/categoryEdit', $data);
            $this->load->view('layouts/admin_footer');
        } else {
            $updateData = array(
                'title' => $this->input->post('title'),
                'categories' => $this->input->post('categories'),
                'created_on' => date('Y-m-d H:i:s')
            ); 
    
            $this->Blog_Model->updateBlogCategories($id, $updateData);
            $this->session->set_flashdata('update', 'Category Update Successfully');
            redirect('admin/blog/category');
        }
    }

    public function adminBlogCategoryDelete(){ 
        $id = $this->input->post('id');
        $this->Blog_Model->deleteCategories($id);
    }

    public function adminBlogAddPost() {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('cat_id', 'Category', 'required');
        $this->form_validation->set_rules('blog_content', 'Blog Content', 'required');
        $this->form_validation->set_rules('tag', 'Tag', 'required');
        $this->form_validation->set_rules('meta_title', 'Meta Title', 'required');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
        $this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->adminBlogAdd();
        } else {
            if(!empty($_FILES['blog_image']['name'])){
                $config['upload_path']          = './assets/uploads/blog_images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('blog_image')) {
                    $error = array('error' => $this->upload->display_errors());
                    redirect('admin/blog', $this->session->set_flashdata("error_msg", $error));
                } else {
                    $profileImageData = array('upload_data' => $this->upload->data());
                }
                $profile_photo = $profileImageData['upload_data']['file_name'];
            } else {
                $profile_photo = ''; 
            }
            $blogSlug  = $this->input->post('title');      
            $blogSlugWithDash = slug($blogSlug);
            $getObjBlogSlugCount = $this->Blog_Model->getSlugCount($blogSlugWithDash);
            if($getObjBlogSlugCount == 0){
                $blogSlugTitle = $blogSlugWithDash;
            }else{
                $blogSlugTitle = $blogSlugWithDash.'-'.$getObjBlogSlugCount;
            }
    
            $insertData = array(
                'title' => slug($this->input->post('title')),
                'slug' => $blogSlugTitle,  
                'cat_id' => $this->input->post('cat_id'),
                'blog_content' => $this->input->post('blog_content'),
                'tag' => $this->input->post('tag'),
                'meta_title' => $this->input->post('meta_title'),
                'meta_description' => $this->input->post('meta_description'),
                'meta_keywords' => $this->input->post('meta_keyword'),
                'image' => $profile_photo,
                'created_on' => date('Y-m-d H:i:s')
            );
            
            $this->Blog_Model->InsertBlog($insertData);
            $this->session->set_flashdata('success', 'Blog added successfully.');
            redirect('admin/blog');
        }
    }
    
   
    public function adminBlogEdit(){
        $id = $this->uri->segment(4);
        $data['title'] = 'Blog Edit Page';
        $data['categories'] = $this->Blog_Model->getBlogCategoriesAll();
        $data['editBlog'] = $this->Blog_Model->getBlogById($id);
        $this->load->view('layouts/admin_header', $data);
		$this->template->load('default_layout', 'contents', 'admin/blog/editBlog', $data);
		$this->load->view('layouts/admin_footer');
    }

    public function adminBlogEditPost() {
        $id = $this->uri->segment(5);
        $update = $this->Blog_Model->getBlogById($id);
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('cat_id', 'Category', 'required');
        $this->form_validation->set_rules('blog_content', 'Blog Content', 'required');
        $this->form_validation->set_rules('tag', 'Tag', 'required');
        $this->form_validation->set_rules('meta_title', 'Meta Title', 'required');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
        $this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $data['editBlog'] = $update;
            $data['categories'] = $this->Blog_Model->getBlogCategoriesAll();
            $this->load->view('layouts/admin_header', $data);
            $this->template->load('default_layout', 'contents', 'admin/blog/editBlog', $data);
            $this->load->view('layouts/admin_footer');
        } else {
            $profile_photo = $update->image; 
            if ($this->input->post('remove_image') == '1') {
                if (file_exists('./assets/uploads/blog_images/' . $update->image)) {
                    unlink('./assets/uploads/blog_images/' . $update->image); 
                }
                $profile_photo = null; 
            }
            if (!empty($_FILES['blog_image']['name'])) {
                $config['upload_path'] = './assets/uploads/blog_images/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
    
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
    
                if (!$this->upload->do_upload('blog_image')) { 
                    $data['editBlog'] = $update;
                    $data['categories'] = $this->Blog_Model->getCategories();
                    $data['error_msg'] = $this->upload->display_errors();
                    $this->load->view('layouts/admin_header', $data);
                    $this->template->load('default_layout', 'contents', 'admin/blog/editBlog', $data);
                    $this->load->view('layouts/admin_footer');
                    return;
                } else {
                    $uploadData = $this->upload->data();
                    $profile_photo = $uploadData['file_name'];
                    if ($update->image && file_exists('./assets/uploads/blog_images/' . $update->image)) {
                        unlink('./assets/uploads/blog_images/' . $update->image); 
                    }
                }
            }
            $blogSlug  = $this->input->post('title');
            $slug = slug($blogSlug);
            $blogSlugWithDash = $slug;
            $blogHidSlug =  $this->input->post('hid_title');
		    $blogHidSlug =  slug($blogHidSlug);
            $getObjBlogSlugCount = $this->Blog_Model->getSlugCount($blogSlug,$id);
            if($getObjBlogSlugCount == 0){  
                $blogSlugTitle = $blogSlugWithDash;
            }else{
                if($blogSlug!=$blogHidSlug){
                    $blogSlugTitle = $blogSlugWithDash.'-'.$getObjBlogSlugCount;
                  }else{
                    $blogSlugTitle = $update->slug;
                  }
            }
            $updateData = array(
                'title' => slug($this->input->post('title')),
                'slug' => $blogSlugTitle,
                'cat_id' => $this->input->post('cat_id'),
                'blog_content' => $this->input->post('blog_content'),
                'tag' => $this->input->post('tag'),
                'meta_title' => $this->input->post('meta_title'),
                'meta_description' => $this->input->post('meta_description'),
                'meta_keywords' => $this->input->post('meta_keyword'),
                'image' => $profile_photo,
                'created_on' => date('Y-m-d H:i:s')
            );
            $this->Blog_Model->updateBlog($id, $updateData);
            $this->session->set_flashdata('Successupdate', 'Blog Updated Successfully.');
            redirect('admin/blog');
        }
    }
    
    
    

    public function adminBlogDelete(){
        $id = $this->input->post('id');
        $this->Blog_Model->deleteBlog($id);  
        
    }

    public function adminBlogStatusUpdate(){
        $data = array(
            'table_name' => 'blog', 
            'id' => $this->input->post('id'),
            'status' => $this->input->post('status'),
        );
       $update =  $this->Blog_Model->updateBlogStatus($data);
       if ($update) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
       
    }

    public function adminBlogCategoryStatusUpdate(){
        $data = array(
            'table_name' => 'blog_categories', 
            'id' => $this->input->post('id'),
            'status' => $this->input->post('status'),
        );
       $this->Blog_Model->updateCatStatus($data);  
    }

    public function adminBlogShow(){
        $id = $this->uri->segment(4);
        $data['blogShow'] = $this->Blog_Model->getBlogShow($id);
        $data['cat_name'] = $this->Blog_Model->getCatNameById($data['blogShow']->cat_id);
        $this->load->view('layouts/admin_header', $data);
		$this->template->load('default_layout', 'contents', 'admin/blog/blogShow', $data);
		$this->load->view('layouts/admin_footer');
    }

    public function frontBlogShow() {
        $data = array();
        $data['metaDescription'] = 'Blog Page Meta Description';
        $data['metaKeywords'] = 'Blog Page meta KeyWords';
        $data['title'] = "Blog";
        $data['breadcrumbs'] = array('Blog' => '#');
    
        $category_id = $this->input->get('cat_id');
        $tags = $this->input->get('tag'); 
    
        if (!empty($tags)) {
            $tagArray = explode(',', $tags);
            $data['blog'] = $this->Blog_Model->getBlogsByTags($tagArray);
        } elseif (!empty($category_id)) {
            $data['blog'] = $this->Blog_Model->getBlogsByCategory($category_id);
        } else {
            $data['blog'] = $this->Blog_Model->getAllBlog();
        }
    
        $data['categories'] = $this->Blog_Model->getCategories();
        $data['getTag'] = $this->Blog_Model->getAllTag(); 
    
        $this->load->view('front/header_main', $data);
        $this->load->view('front/blog', $data);
        $this->load->view('front/template/template_footer');
        $this->load->view('front/footer_main');
    }
    
    

    public function frontBlogShowDetails(){ 
        $id = $this->uri->segment(5);
        $data['title'] = 'Blog Details Page';
        $data['metaDescription'] = 'Blog Page Meta Description';
        $data['metaKeywords'] = 'Blog Page meta KeyWords';
        $data['getTag'] = $this->Blog_Model->getAllTag();
        $data['blogDetails'] = $this->Blog_Model->getBlogDetailsById($id);
        $data['recentBlog']  = $this->Blog_Model->getRecentBlog();
       // echo"<pre>"; var_dump($data['recentBlog']); exit;
        $this->load->view('front/header_main', $data);
		$this->template->load('default_layout', 'contents','front/blogDetails', $data);
		$this->load->view('front/template/template_footer');
        $this->load->view('front/footer_main');
    }

    
    
}


