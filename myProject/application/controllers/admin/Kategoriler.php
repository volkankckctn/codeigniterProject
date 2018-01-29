<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoriler extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        if(!$this->session->userdata("admin_session"))
            redirect(base_url().'admin/login');
    }
	public function index()
	{
	    $query=$this->db->query("SELECT * FROM category ORDER BY id");
	    $data["veriler"]=$query->result();

	    $this->load->view('admin/_header');
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/kategoriler_liste',$data);
		$this->load->view('admin/_footer');
	}
    public function duzenle($id){
        $query=$this->db->query("SELECT * FROM category WHERE id=$id");
        $data["veri"]=$query->result();
		
		$query2=$this->db->query("SELECT * FROM category");
        $data["veri2"]=$query2->result();
		
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/kategoriler_duzenle_formu',$data);
        $this->load->view('admin/_footer');
    }
    public function sil($id){
        $query=$this->db->query("DELETE FROM category WHERE id=$id");
        $this->session->set_flashdata("msj_delete","Kategori Silme İşlemi Başarılı");
        redirect(base_url()."admin/kategoriler");
    }
    public function ekle(){
        $query=$this->db->query("SELECT * FROM category");
        $data["veri"]=$query->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/kategoriler_ekle',$data);
        $this->load->view('admin/_footer');
    }
    public function test(){


    }
    public function ekle_kaydet(){
        //Form verilerini alıyoruz
        $data=array(
            'parent_id'=> $this->input->post('parent_id'),
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'status' => ($this-> input->post('durum')=="Aktif" ? 1 : 0  )
        );
        $this->db->insert("category", $data);
        $this->session->set_flashdata("msj_insert", "Kategori Ekleme İşlemi Başarılı");
        redirect(base_url() . 'admin/Kategoriler');


    }
    public function guncelle($id){
        //Form verilerini alıyoruz
        $data=array(
            'parent_id' => $this->input->post('parent_id'),
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'status' => ($this-> input->post('durum')=="Aktif" ? 1 : 0  )
        );
        $this->load->model('Database_model');
        $this->Database_model->update_data("category",$data,$id);

        $this->session->set_flashdata("msj_guncelle", "Kategori Bilgileri Düzenlendi !");
        redirect(base_url() . 'admin/Kategoriler');
    }
    public function resim_yukle($id){
        $query=$this->db->query("SELECT * FROM category WHERE id=$id");
        $data["veri"]=$query->result();
        $data["id"]=$id;
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/kategoriler_resim_yukle',$data);
        $this->load->view('admin/_footer');
    }
    public function resim_kaydet($id){
        $data["id"]=$id;
        //upload edilecek dosyaya ait ayarlar ve limitler
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        //Ayarlar ile kütüphaneyi çağır
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('resim')) // Yükle -> Eğer hata varsa
        {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata("mesaj","Yüklemede Hata Oluştu".$error);
            $this->load->view('admin/_header');
            $this->load->view('admin/_sidebar');
            $this->load->view('admin/kategoriler_resim_yukle',$data);
            $this->load->view('admin/_footer');
        }
        else {
            $upload_data = $this->upload->data();
            $data=array(
                'image'=> $upload_data["file_name"]
            );

            $this->load->model('Database_model');
            $this->Database_model->update_data("category",$data,$id);

            $this->session->set_flashdata("msj_resim_ekle", "Resim Başarıyla Eklendi !");
            redirect(base_url() . 'admin/kategoriler');

        }
    }
}
