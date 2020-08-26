<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class category extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Mht') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_category');
        if ($this->session->userdata('Mht_type') !='1') { redirect('/'); }
    }

    public function index()
    {
        $data['title'] = 'Category';
        $this->load->view('pages/category', $data, FALSE);
    }

    // fetch category 
    public function getData($var = null)
    {
        $fetch_data = $this->m_category->make_datatables();
        $data = array();  
        foreach($fetch_data as $row)  
        {  
             $sub_array = array();  
             $sub_array[] = $row->id;  
             $sub_array[] = $row->title;  
             $sub_array[] = date('d M, Y', strtotime($row->created_on)); 
             $sub_array[] = '
                 <a class="blue hoverable action-btn update-btn  modal-trigger" id="'.$row->id.'" href="#modal1"><i class="fas fa-edit "></i></a>
                 <a class="red hoverable delete-btn action-btn" id="'.$row->id.'"><i class="fas fa-trash  "></i></a>
             ';  
             $data[] = $sub_array;  
        }  
        $output = array(  
             "draw"                =>     intval($_POST["draw"]),  
             "recordsTotal"        =>     $this->m_category->get_all_data(),  
             "recordsFiltered"     =>     $this->m_category->get_filtered_data(),  
             "data"                =>     $data  
        );  
        echo json_encode($output); 
    }

    //  add category
    public function add_category()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category', 'Category', 'required|is_unique[mh_category.title]');
        if ($this->form_validation->run() == FALSE)
        { 
            $this->output->set_status_header('400');
            $data = form_error('category');
            echo $data;
        }else{
            $title  = $this->input->post('category');
            $nav = $this->input->post('nav');
            $home = $this->input->post('home');
            $data   = array(
                'title' => $title,
                'menu' => (empty($nav))? '0' : $nav,
                'index' => (empty($home))? '0' : $home,
            );
            if($this->m_category->add_category($data))
            {
                echo 'Category added successfully';
            }else{
                echo 'Some error occured, Please try agin later';
            }
        }
        
    }

    // delete data
    public function delete()
    {
        $id  = $this->input->post('id');
        if($this->m_category->delete($id))
        {
            echo 'Category deleted successfully';
        }else{
            echo 'Some error occured, Please try agin later';
        }
    }

    // single data
    public function single_data()
    {
        $id  = $this->input->post('id');
        if($row = $this->m_category->single_data($id))
        {
            $output['title']  = $row->title;
            $output['id']     = $row->id;
            $output['index']  = $row->index;
            $output['menu']   = $row->menu;
            echo json_encode($output);
        }else{
            echo 'No data fond';
        }
    }

    // update
    public function update_category()
    {
        $title  = $this->input->post('category');
        $id  = $this->input->post('ctid');
        $nav = $this->input->post('nav');
        $home = $this->input->post('home');
        $data   = array(
            'title' => $title,
            'menu' => (empty($nav))? '0' : $nav,
            'index' => (empty($home))? '0' : $home,
        );
        if($this->m_category->add_category($data, $id))
        {
            echo 'Category update successfully';
        }else{
            echo 'Some error occured, Please try agin later';
        }
    }


    // sub category
    public function sub_category($id = null)
    {
        $data['result'] = $this->m_category->sub_category();
        $data['title'] = 'Sub Category';
        $this->load->view('pages/sub-category', $data, FALSE);
    }

    // add sub category
    public function sub_category_add(Type $var = null)
    {
        $id = $this->input->post('ctid');
        $title = $this->input->post('category');
        $data = array(
            'main_category' => $id,
            'title' => $title,
            'created_by' => $this->session->userdata('Mht')
        );
        if($this->m_category->add_sub_category($data))
        {
            $this->session->set_flashdata('success', 'Category update successfully');
            redirect('category/sub-category');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
            redirect('category/sub-category');
        }
    }

    // dete subcategory
    public function sub_category_delete($id = null)
    {
        if($this->m_category->deleteSub($id))
        {
            $this->session->set_flashdata('success', 'Category deleted successfully');
            redirect('category/sub-category');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
            redirect('category/sub-category');
        }
    }

     // Edit subcategory
     public function sub_category_edit()
     {
         $id = $this->input->post('id');
         $title = $this->input->post('category');
         $data = array('title' => $title, );
         if($this->m_category->editSub($data, $id))
         {
             $this->session->set_flashdata('success', 'Category updated successfully');
             redirect('category/sub-category');
         }else{
             $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
             redirect('category/sub-category');
         }
     }

}

/* End of file category.php */
