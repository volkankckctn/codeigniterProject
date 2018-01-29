<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uyeler extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        if(!$this->session->userdata("admin_session"))
            redirect(base_url().'admin/login');
    }
	public function index()
	{
	    $query=$this->db->query("SELECT * FROM users ORDER BY id");
	    $data["veriler"]=$query->result();

	    $this->load->view('admin/_header');
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/uyeler_liste',$data);
		$this->load->view('admin/_footer');
	}
    public function duzenle($id){
        $query=$this->db->query("SELECT * FROM users WHERE id=$id");
        $data["veri"]=$query->result();

        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/uyeler_duzenle_formu',$data);
        $this->load->view('admin/_footer');
    }
    public function sil($id){
        $query=$this->db->query("DELETE FROM users WHERE id=$id");
        $this->session->set_flashdata("msj_delete","Üye Silme İşlemi Başarılı");
        redirect(base_url()."admin/uyeler");
    }
    public function ekle(){
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/uyeler_ekle');
        $this->load->view('admin/_footer');
    }
    public function ekle_kaydet(){
        //Form verilerini alıyoruz
        $data=array(
            'name'=> $this->input->post('ad'),
            'surname' => $this->input->post('soyad'),
            'username' => $this->input->post('kullaniciadi'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('sifre'),
            'tel' => $this->input->post('tel'),
            'image' => $this->input->post('icon'),
            'address' => $this->input->post('adres'),
            'status' => ($this-> input->post('durum')=="Aktif" ? 1 : 0  )    ,
            'authorty' => ($this->input->post('yetki')=="Admin"? 1 : 0 )    ,
            'newsletter'=> ($this->input->post('bulten')!="" ? 1 : 0 )
        );
        $control_username=$this->db->query("SELECT * FROM users WHERE username='".$data['username']."'");
        $control_email=$this->db->query("SELECT * FROM users WHERE email='".$data['email']."'");

        if($data['password']==$this->input->post('confirm')) {
            /*if($data['password']=='' && $data['name']=='' && $data['surname']=='' && $data['confirm']=='' && $data['username']=='' && $data['email']==''){
                $this->session->set_flashdata("msj_eksik", "* lı Alanların Doldurulması Zorunludur!!!!!!");
                redirect(base_url() . 'admin/uyeler/ekle');
            }*/
            if($control_username->result()!=NULL){
                $this->session->set_flashdata("msj_kontrol", "Kullanıcı Adı Kullanılıyor");
                redirect(base_url() . 'admin/uyeler/ekle');
            }else if($control_email->result()!=NULL){
                $this->session->set_flashdata("msj_kontrol_e", "E-Mail Kullanılıyor");
                redirect(base_url() . 'admin/uyeler/ekle');
            }
            $this->db->insert("users", $data);
            $this->session->set_flashdata("msj_insert", "Üye Ekleme İşlemi Başarılı");
            redirect(base_url() . 'admin/uyeler');
        } else{
            $this->session->set_flashdata("msj_sifre", "Şifreler Uyuşmuyor..!");
            redirect(base_url() . 'admin/uyeler');
        }
    }
    public function guncelle($id){
        //Form verilerini alıyoruz
        $data=array(
            'name'=> $this->input->post('ad'),
            'surname' => $this->input->post('soyad'),
            'username' => $this->input->post('kullaniciadi'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('sifre'),
            'tel' => $this->input->post('tel'),
            'image' => $this->input->post('icon'),
            'address' => $this->input->post('adres'),
            'status' => ($this-> input->post('durum')=="Aktif" ? 1 : 0  )    ,
            'authorty' => ($this->input->post('yetki')=="Admin"? 1 : 0 )    ,
            'newsletter'=> ($this->input->post('bulten')!="" ? 1 : 0 )
        );
        if($data['password']==$this->input->post('confirm')) {
            $this->load->model('Database_model');
            $this->Database_model->update_data("users",$data,$id);

            $this->session->set_flashdata("msj_guncelle", "Üye Bilgileri Düzenlendi !");
            redirect(base_url() . 'admin/uyeler');
        }
        else{
            $this->session->set_flashdata("msj_sifre", "Şifreler Uyuşmuyor..!");
            redirect(base_url() . 'admin/uyeler');
        }
    }
}
