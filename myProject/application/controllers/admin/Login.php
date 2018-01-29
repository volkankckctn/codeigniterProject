<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();

    }
    public function login_ol(){

        $email=$this->input->post("email");
        $password=$this->input->post("password");

        $this->load->model("Database_model");
        $result = $this->Database_model->login_admin("users",$email,$password);

        if($result){
            $sess_array=array(
                'id'=>$result[0]->id,
                'name'=>$result[0]->name,
                'surname'=>$result[0]->surname,
                'address'=>$result[0]->address,
                'tel'=>$result[0]->tel,
                'authorty'=>$result[0]->authorty,
                'status'=>$result[0]->status,
                'image'=>$result[0]->image,
                'username'=>$result[0]->username,
                'email'=>$result[0]->email,
                'password'=>$result[0]->password
            );
            $this->session->set_userdata("admin_session",$sess_array);
            redirect(base_url().'admin');
        }else{
            $this->session->set_flashdata("mesaj","Hatalı Kullanıcı Adı yada şifre");
            redirect(base_url().'admin/login');
        }
    }
	public function index()
	{
		$this->load->view('admin/login_form');
	}
	public function login_out(){
        $this->session->unset_userdata("admin_session");
        redirect(base_url().'admin/login');
    }
}
