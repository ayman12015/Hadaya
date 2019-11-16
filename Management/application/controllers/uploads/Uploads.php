<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Uploads extends CI_Controller 
{
 public function __construct() 
 {
 parent::__construct();
 $this->load->model('uploads/Upload','uploadModel');
 }
    
    
    /* for view upload form start */
 public function index()
 {   

 $this->load->view('uploads/uploads', array('error' => ' ' ));

 
 }
    /* for view upload form close */
 
    
    /* for view upload file and insert file details in database start */
 public function upload_file()
 {
 $config = array(
 'upload_path' => "./uploads/",
 'allowed_types' => "gif|jpg|png|jpeg|pdf|docx",
 'overwrite' => TRUE,
 'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
 'max_height' => "768",
 'max_width' => "1024"
 );
 
 
 /*  for load library for upload file start */
 $this->load->library('upload', $config);
 $this->upload->initialize($config);
 /*  for load library for upload file close */
 
 if($this->upload->do_upload())
 { 
 /*  for upload file start */
 $data = array('upload_data' => $this->upload->data());
 /*  for upload file close */
 
 $file_name =  $data['upload_data']['raw_name'].$data['upload_data']['file_ext'];
 
 /*  for insert data in database start */
   $insert_data = array(
                     'name' => $this->input->post('name'),
                     'file_name' => $file_name,
                     'created_date' => date('Y-m-d H:i:s')
                      );
   $this->uploadModel->file_insert($insert_data);
              /*  for insert data in database close */
              
   $this->load->view('uploads/uploads_success',$data);
   
 }
 else
 {
 
 
 $this->load->view('uploads/uploads');

 }
 }
 
 /* for view upload file and insert file details in database close */
 
}
?>