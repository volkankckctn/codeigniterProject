<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        if(!$this->session->userdata("admin_session"))
            redirect(base_url().'admin/login');
    }
	public function index()
	{
	    $this->load->view('admin/_header');
		$this->load->view('admin/_sidebar');
		$this->load->view('admin/_content');
		$this->load->view('admin/_footer');
	}
    public function ayarlar()
    {
        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();

        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/ayarlar',$data);
        $this->load->view('admin/_footer');
    }
    public function ayarlar_guncelle($id)
    {

        $data=array(
            'name'=>$this->input->post('name'),
            'description'=>$this->input->post('description'),
            'smtpemail'=>$this->input->post('smtpemail'),
            'smtpserver'=>$this->input->post('smtpserver'),
            'smtpport'=>$this->input->post('smtpport'),
            'tel'=>$this->input->post('tel'),
            'password'=>$this->input->post('password'),
            'keywords'=>$this->input->post('keywords'),
            'address'=>$this->input->post('address'),
            'about_us'=>$this->input->post('about_us'),
            'contact'=>$this->input->post('contact'),
            'fax'=>$this->input->post('fax'),
            'facebook'=>$this->input->post('facebook'),
            'instagram'=>$this->input->post('instagram'),
            'twitter'=>$this->input->post('twitter'),
            'pinterest'=>$this->input->post('pinterest'),
        );
        $this->load->model("Database_model");
        $this->Database_model->update_data("settings",$data,$id);
        $this->session->set_flashdata("msj", "Site Bilgileri Düzenlendi !");
        redirect(base_url().'admin/home/ayarlar');
    }
    public function duyuru()
    {
        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();

        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/duyuru',$data);
        $this->load->view('admin/_footer');
    }
    public function duyuru_guncelle($id){
        $data=array(
            'duyuru'=>$this->input->post('duyuru'),
        );
        $this->load->model("Database_model");
        $this->Database_model->update_data("settings",$data,$id);
        $this->session->set_flashdata("msj", "Duyuru İçeriği Düzenlendi !");
        redirect(base_url().'admin/home/duyuru');
    }
	public function mesajlar()
    {
        $query=$this->db->query("SELECT * FROM messages ORDER BY date");
        $data["veri"]=$query->result();

        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/mesajlar',$data);
        $this->load->view('admin/_footer');
    }
	public function mesajlar_sil($id)
    {
        $query = $this->db->query("DELETE FROM messages WHERE id=$id");
        $this->session->set_flashdata("msj_delete", "Mesaj Silme İşlemi Başarılı");
        redirect(base_url() . "admin/home/mesajlar");
    }
	public function mesajlar_ac($id)
    {
        $query=$this->db->query("SELECT * FROM messages WHERE id=$id");
        $data["veri"]=$query->result();
		$read["read"]=1;

		$this->load->model('Database_model');
        $this->Database_model->update_data("messages",$read,$id);
        $this->session->set_flashdata("msj_guncelle", "Okundu Olarak İşaretlendi");
		
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/mesajlar_ac',$data);
        $this->load->view('admin/_footer');
    }
	public function mesajlar_okunmadi($id)
    {
        $data['read']=0;
        $this->load->model("Database_model");
        $this->Database_model->update_data("messages",$data,$id);
	
        $this->session->set_flashdata("msj", "Okunmadı olarak işaretlendi");
        redirect(base_url().'admin/home/mesajlar/');
    }
	public function mesajlar_cevapla($id)
    {
        $data=array(
            'cevap'=>$this->input->post('cevap'),
        );
        $this->load->model("Database_model");
        $this->Database_model->update_data("messages",$data,$id);
        $this->session->set_flashdata("msj", "Mesaj Başarı ile Cevaplandı");
        redirect(base_url().'admin/home/mesajlar/');
    }
    public function kampanya()
    {
        $query=$this->db->query("SELECT * FROM products ORDER BY name");
        $data["veri"]=$query->result();

        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/kampanya',$data);
        $this->load->view('admin/_footer');
    }
    public function kampanya_sil($id)
    {
        $data=array(
            'grup'=>"",
        );
        $this->load->model("Database_model");
        $this->Database_model->update_data("products",$data,$id);
        $this->session->set_flashdata("msj", "Ürün Kampanyalı Ürünlerden Kaldırıldı.");
        redirect(base_url().'admin/home/kampanya/');
    }
    public function kampanya_ekle_sayfa()
    {
        $query=$this->db->query("SELECT * FROM products WHERE grup = 'kampanya'");
        $sorgu=$query->result();
        if(count($sorgu)<3){
            $query=$this->db->query("SELECT * FROM products ORDER BY name");
            $data["veri"]=$query->result();

            $this->load->view('admin/_header');
            $this->load->view('admin/_sidebar');
            $this->load->view('admin/kampanya_ekle',$data);
            $this->load->view('admin/_footer');
        }else {
            $this->session->set_flashdata("msj", "3 Üründen Fazla Kampanya Ürünü Olamaz");
            redirect(base_url().'admin/home/kampanya/');}

    }
    public function kampanya_ekle()
    {
        $ad=$this->input->post('kampanya');
        $query=$this->db->query("SELECT id FROM products WHERE name = '$ad'");
        $data["id"]=$query->result();
        $id=$data["id"][0]->id;

        $data=array(
            'grup'=>'kampanya',
        );
        $this->load->model("Database_model");
        $this->Database_model->update_data("products",$data,$id);
        $this->session->set_flashdata("msj", "Ürün Kategorilere Eklendi.");

        $query=$this->db->query("SELECT * FROM products ORDER BY name");
        $data["veri"]=$query->result();
        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/kampanya',$data);
        $this->load->view('admin/_footer');
    }
    public function yorumlar()
    {
        $query=$this->db->query("SELECT comment.*,u.name,u.surname,p.name as p_name FROM comment 
                                inner join users as u on comment.user_id=u.id
                                inner join products as p on comment.product_id=p.id");
        $data["veri"]=$query->result();

        $this->load->view('admin/_header');
        $this->load->view('admin/_sidebar');
        $this->load->view('admin/yorumlar',$data);
        $this->load->view('admin/_footer');
    }
    public function yorumlar_sil($id)
    {
        $query = $this->db->query("DELETE FROM comment WHERE id=$id");
        $this->session->set_flashdata("msj_delete", "Yorum Silme İşlemi Başarılı");
        redirect(base_url() . "admin/home/yorumlar");
    }
}
