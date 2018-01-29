<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urunler extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Database_model');
        $this->load->helper('url');


        if(!$this->session->userdata("admin_session"))
            redirect(base_url().'admin/login');
    }
	public function index()
	{
	    /*$query=$this->db->query("SELECT * FROM products ORDER BY id");
	    $data["veriler"]=$query->result();*/
        $data["veriler"]=$this->Database_model->get_urunler();
	    $this->load->view('admin/_header');
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/urunler_liste',$data);
		$this->load->view('admin/_footer');
	}
    public function duzenle($id){
        $query=$this->db->query("SELECT * FROM products WHERE id=$id");
        $query2=$this->db->query("SELECT * FROM category ORDER BY id" );
        $data["veri"]=$query->result();
        $data["cat"]=$query2->result();

        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/urunler_duzenle_formu',$data);
        $this->load->view('admin/_footer');
    }
    public function sil($id)
    {
        $query = $this->db->query("DELETE FROM products WHERE id=$id");
        $this->session->set_flashdata("msj_delete", "Ürün Silme İşlemi Başarılı");
        redirect(base_url() . "admin/urunler");
    }
    public function ekle(){
        $query=$this->db->query("SELECT * FROM category");
        $data["veri"]=$query->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/urunler_ekle',$data);
        $this->load->view('admin/_footer');
    }
    public function test(){
        $query=$this->db->query("SELECT * FROM category");
        $data["urun_dizi"]=$query->result();

        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/test',$data);
        $this->load->view('admin/_footer');

    }
    public function ekle_kaydet(){
        //Form verilerini alıyoruz
        $data=array(
            'cat_id'=> $this->input->post('kategori'),
            'name' => $this->input->post('name'),
            'b_price' => $this->input->post('b_price'),
            's_price' => $this->input->post('s_price'),
            'stock' => $this->input->post('stock'),
            'description' => $this->input->post('description'),
            'keywords' => $this->input->post('keywords'),
            'date'=>date("Y-m-d h:i:s")
        );
        $this->db->insert("products", $data);
        $this->session->set_flashdata("msj_insert", "Ürün Ekleme İşlemi Başarılı");
        redirect(base_url() . 'admin/urunler');
    }
    public function guncelle($id){
        //Form verilerini alıyoruz

        $data=array(
            'cat_id'=> $this->input->post('kategori'),
            'name' => $this->input->post('name'),
            'b_price' => $this->input->post('b_price'),
            's_price' => $this->input->post('s_price'),
            'stock' => $this->input->post('stock'),
            'description' => $this->input->post('description'),
            'keywords' => $this->input->post('keywords'),

        );
        $this->load->model('Database_model');
        $this->Database_model->update_data("products",$data,$id);
        $this->session->set_flashdata("msj_guncelle", "Ürün Bilgileri Düzenlendi!");
        redirect(base_url() . 'admin/urunler');


    }
    public function resim_yukle($id){
        $query=$this->db->query("SELECT * FROM products WHERE id=$id");
        $data["veri"]=$query->result();
        $data["id"]=$id;
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/urunler_resim_yukle',$data);
        $this->load->view('admin/_footer');
    }
    public function resim_kaydet($id){
        $data["id"]=$id;
        //upload edilecek dosyaya ait ayarlar ve limitler
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100000;
        $config['max_width']            = 4096;
        $config['max_height']           = 2048;
        //Ayarlar ile kütüphaneyi çağır
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('resim')) // Yükle -> Eğer hata varsa
        {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata("mesaj","Yüklemede Hata Oluştu".$error);
            $this->load->view('admin/_header');
            $this->load->view('admin/_sidebar');
            $this->load->view('admin/urunler_resim_yukle',$data);
            $this->load->view('admin/_footer');
            }
        else {
            $upload_data = $this->upload->data();
            $data=array(
                'preview_img'=> $upload_data["file_name"]
            );

            $this->load->model('Database_model');
            $this->Database_model->update_data("products",$data,$id);

            $this->session->set_flashdata("msj_resim_ekle", "Resim Başarıyla Eklendi !");
            redirect(base_url() . 'admin/urunler');

        }
    }
    public function galeri_yukle($id){
        $query=$this->db->query("SELECT * FROM products_image WHERE product_id=$id");
        $data["veri"]=$query->result();
        $data["id"]=$id;
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/urunler_galeri_yukle',$data);
        $this->load->view('admin/_footer');
    }
    public function galeri_kaydet($id){
        $data["id"]=$id;
        //upload edilecek dosyaya ait ayarlar ve limitler
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100000;
        $config['max_width']            = 4096;
        $config['max_height']           = 4096;
        //Ayarlar ile kütüphaneyi çağır
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('resim')) // Yükle -> Eğer hata varsa
        {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata("mesaj","Yüklemede Hata Oluştu".$error);
            $this->load->view('admin/_header');
            $this->load->view('admin/_sidebar');
            redirect(base_url() . 'admin/urunler/galeri_yukle/'.$id);
            $this->load->view('admin/_footer');
        }
        else {//veritabanına kayıt
            $upload_data = $this->upload->data();
            $data=array(
                'product_id'=> $id,
                'image'=> $upload_data["file_name"]
            );

            $this->db->insert("products_image",$data);

            $this->session->set_flashdata("msj_galeri_ekle", "Resim Başarıyla Galeriye Eklendi !");
            redirect(base_url() . 'admin/urunler/galeri_yukle/'.$id);

        }
    }
    public function galeri_sil($urun_id,$resim_id)
    {
        $query = $this->db->query("DELETE FROM products_image WHERE id=$resim_id");
        $this->session->set_flashdata("galeri_delete", "Resim Galeriden Silindi!");
        redirect(base_url() . "admin/urunler/galeri_yukle/".$urun_id);
    }

}
