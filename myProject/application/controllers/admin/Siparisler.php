<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siparisler extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        if(!$this->session->userdata("admin_session"))
            redirect(base_url().'admin/login');
    }
	public function index()
	{
        $query=$this->db->query("SELECT * FROM a_siparis");
        $data["veri"]=$query->result();
	    $this->load->view('admin/_header');
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/siparisler',$data);
		$this->load->view('admin/_footer');
	}
    public function siparis_iptal($id)
    {
        $this->load->model("Database_model");
        $query=$this->db->query("SELECT * FROM a_siparis_urunler WHERE siparis_id=$id");
        $geri_ekle=$query->result();
        foreach ($geri_ekle as $urun){
            $query=$this->db->query("SELECT stock FROM products WHERE id=$urun->urun_id");
            $data_p=$query->result();
            $p['stock']=$data_p[0]->stock+$urun->adet;
            $this->Database_model->update_data("products",$p,$urun->urun_id);
        }
        $data['siparis_durumu']='iptal';
        $this->Database_model->update_data("a_siparis",$data,$id);
        $this->session->set_flashdata("basarili","Sipariş Başarıyla İptal Edildi.");
        redirect(base_url().'admin/siparisler');
    }
    public function siparis_detay($id)
    {
        $query=$this->db->query("SELECT * FROM a_siparis_urunler WHERE siparis_id=$id");
        $data["veri"]=$query->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/siparisler_detay',$data);
        $this->load->view('admin/_footer');
    }
    public function siparis_kargo_detay($id)
    {
        $query=$this->db->query("SELECT * FROM a_siparis_urunler WHERE siparis_id=$id");
        $data["veri"]=$query->result();
        $query=$this->db->query("SELECT * FROM a_siparis WHERE id=$id");
        $data["bilgi"]=$query->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/siparisler_kargo_detay',$data);
        $this->load->view('admin/_footer');
    }
    public function siparis_guncelle($id)
    {
        $data['kargo']=$this->input->post('kargo');
        $data['aciklama']=$this->input->post('aciklama');
        $data['siparis_durumu']=$this->input->post('siparis_durumu');
        $this->load->model("Database_model");
        $this->Database_model->update_data("a_siparis",$data,$id);
        $this->session->set_flashdata("basarili","Sipariş Bilgileri Güncellendi.");
        redirect(base_url().'admin/siparisler');
    }
    public function siparisler_kargodakiler()
    {
        $query=$this->db->query("SELECT * FROM a_siparis");
        $data["veri"]=$query->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/siparisler_kargodakiler',$data);
        $this->load->view('admin/_footer');
    }
    public function siparisler_tamamlananlar()
    {
        $query=$this->db->query("SELECT * FROM a_siparis");
        $data["veri"]=$query->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/siparisler_tamamlananlar',$data);
        $this->load->view('admin/_footer');
    }
    public function siparisler_iptaller()
    {
        $query=$this->db->query("SELECT * FROM a_siparis");
        $data["veri"]=$query->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/siparisler_iptaller',$data);
        $this->load->view('admin/_footer');
    }
}
