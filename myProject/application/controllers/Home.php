<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Database_model');
        $this->load->helper('url');
    }
	public function index()//anasayfa görüntüleyici
	{
		$query=$this->db->query("SELECT * FROM category ORDER BY name");
        $data["kategoriler"]=$query->result();

        $query=$this->db->query("SELECT * FROM products WHERE grup='kampanya'");
        $data["kampanya"]=$query->result();
        $query=$this->db->query("SELECT * FROM products ORDER BY date desc LIMIT 6");
        $data["yeni"]=$query->result();
        $query=$this->db->query("SELECT * FROM products ORDER BY RAND() LIMIT 3");
        $data["random"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();
        $data["sayfa"]="";
		$data["menu"]="anasayfa";

        $data["cat"] = $this->Database_model->get_categories();
		
		$this->load->view('_header',$data);
		$this->load->view('_slider');
		$this->load->view('_sidebar',$data);
		$this->load->view('_content',$data);
		$this->load->view('_footer');
	}
    public function categories($id) //kategoriden ürün seçilince gidilen sayfa görüntüleyici
    {
        $query=$this->db->query("SELECT * FROM category ORDER BY name");
        $data["kategoriler"]=$query->result();

        $query=$this->db->query("SELECT * FROM products WHERE grup='kampanya'");
        $data["kampanya"]=$query->result();
        $query=$this->db->query("SELECT * FROM products WHERE cat_id=$id");
        $data["cat_urunler"]=$query->result();
        $query=$this->db->query("SELECT * FROM products ORDER BY RAND() LIMIT 3");
        $data["random"]=$query->result();
        $query=$this->db->query("SELECT category.name as cat_name FROM products 
                                    INNER JOIN category on category.id=products.cat_id 
                                    WHERE category.id=$id");
        $data["isim"]=$query->result();

        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();
        $data["sayfa"]="";
        $data["menu"]="anasayfa";

        $data["cat"] = $this->Database_model->get_categories();

        $this->load->view('_header',$data);
        $this->load->view('_slider');
        $this->load->view('_sidebar',$data);
        $this->load->view('categories',$data);
        $this->load->view('_footer');
    }
    public function logout()//üye çıkışı
    {
        $this->session->unset_userdata("user_session");
        redirect(base_url().'home');

    }
    public function login_sayfa() //giriş sayfası görüntüleyici
    {
        $query=$this->db->query("SELECT * FROM category ORDER BY name");
        $data["kategoriler"]=$query->result();
        $data["menu"]="uye";
        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();
        $data["sayfa"]="Giriş Yap - ";

        $this->load->view('_header',$data);
        $this->load->view('login');
        $this->load->view('_footer');

    }
    public function login()  //login kontrollerini yapıp anasayfaya yönlendirme işlemleri
    {
        $email=$this->input->post("email");
        $password=$this->input->post("password");

        $this->load->model('Database_model');
        $result=$this->Database_model->login('users',$email,$password);

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
            $this->session->set_userdata("user_session",$sess_array);
            redirect(base_url().'home');
        }else{
            $this->session->set_flashdata("mesaj","Hatalı Kullanıcı Adı yada şifre");
            redirect(base_url().'home/login_sayfa');
        }
    }
    public function kaydol()//kayıt işlemleri yaptıktan sonra tekrar giriş sayfasına gitme işlemleri
    {
        //Form verilerini alıyoruz
        $data=array(
            'name'=> $this->input->post('name'),
            'surname'=> $this->input->post('surname'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
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
                redirect(base_url() . 'home/login_sayfa');
            }else if($control_email->result()!=NULL){
                $this->session->set_flashdata("msj_kontrol_e", "E-Mail Kullanılıyor");
                redirect(base_url() . 'home/login_sayfa');
            }
            $this->db->insert("users", $data);
            $this->session->set_flashdata("msj_insert", "Üye Kaydı Alındı");
            redirect(base_url() . 'home/login_sayfa');
        } else{
            $this->session->set_flashdata("msj_sifre", "Şifreler Uyuşmuyor..!");
            redirect(base_url() . 'home/login_sayfa');
        }
    }
	public function hakkimizda()//hakkımızda sayfası görüntüleyici
	{
		$query=$this->db->query("SELECT * FROM category ORDER BY name");
        $data["kategoriler"]=$query->result();

        $data["cat"] = $this->Database_model->get_categories();
		$query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();
        $data["sayfa"]="Hakkımızda - ";
		$data["menu"]="hakkimizda";
		
		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$data);
		$this->load->view('hakkimizda');
		$this->load->view('_footer');
	}
    public function kampanyalar() //kampanyalar sayfası görüntüleyici
    {
        $query=$this->db->query("SELECT * FROM category ORDER BY name");
        $data["kategoriler"]=$query->result();

        $data["cat"] = $this->Database_model->get_categories();
        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();
        $data["sayfa"]="Kampanyalar - ";
        $data["menu"]="kampanyalar";
        $query=$this->db->query("SELECT * FROM products WHERE grup='kampanya'");
        $data["kampanya"]=$query->result();
        $this->load->view('_header',$data);
        $this->load->view('_sidebar',$data);
        $this->load->view('kampanyalar',$data);
        $this->load->view('_footer');
    }
	public function iletisim() //iletisim sayfası görüntüleyici
	{
		$query=$this->db->query("SELECT * FROM category ORDER BY name");
        $data["kategoriler"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();
        $data["sayfa"]="İletişim - ";
		$data["menu"]="iletisim";
        $data["cat"] = $this->Database_model->get_categories();
		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$data);
		$this->load->view('iletisim');
		$this->load->view('_footer');
	}
	public function bize_yazin() //bize yazın sayfası görüntüleyici
	{
		$query=$this->db->query("SELECT * FROM category ORDER BY name");
        $data["kategoriler"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();
        $data["sayfa"]="Bize Yazın - ";
		$data["menu"]="bize_yazin";
        $data["cat"] = $this->Database_model->get_categories();
		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$data);
		$this->load->view('bize_yazin');
		$this->load->view('_footer');
	}
    public function mesaj_kaydet()//bize yazından mesaj gönderme işlemleri
    {
        ////////////////////////////////////////////////////////////////////
        $query=$this->db->query("SELECT * FROM settings");
        $data["ayar"]=$query->result();
        //Form verilerini alıyoruz
        $data=array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('message'),
			'ip'=>$_SERVER['REMOTE_ADDR']
        );
        $this->db->insert("messages", $data);

        $email=$this->input->post('email');
        $ad=$this->input->post('name');

        //mail içerik
        $mesaj="Merhaba ".$ad."Gönderdiğin mesajı aldık.<br>En kısa zamanda ";
        $mesaj.=$this->input->post('email');
        $mesaj.=" email adresinize dönüş yapacağız.<br>";
        $mesaj.="Teşekkürler.";


        //mail gonder
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->from("volkankckctn@gmail.com","info@volkanikdaglar.com"); //change
        $this->email->to($email);
        $this->email->subject('Merhaba');
        $this->email->message($mesaj);

        //send
        if($this->email->send())
            $this->session->set_flashdata("email_sent","Email başarı ile gönderildi.");
        else{
            $this->session->set_flashdata("email_sent","Email gönderilemedi.");
            show_error($this->email->print_debugger());
        }

        $this->session->set_flashdata("msj_insert", "Mesaj Başarı İle Gönderildi. En Kısa Sürede iletişim kurulacaktır!");
        redirect(base_url() . 'home/bize_yazin');
    }
    public function urun_detay_sayfa($id) //mesaj detay sayfası görüntüleyici
    {

        $query=$this->db->query("SELECT * FROM category ORDER BY name");
        $data["kategoriler"]=$query->result();

        $query=$this->db->query("SELECT * FROM products WHERE id=$id");
        $data["veri2"]=$query->result();

        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();

        $data["sayfa"]=null;
        $data["menu"]="urun";


        $data["cat"] = $this->Database_model->get_categories();
        $data["urun"] = $this->Database_model->cat_name_getir($id);
        $data["comment"] = $this->Database_model->get_comments($id);

        $query=$this->db->query("SELECT * FROM products ORDER BY RAND() LIMIT 3");
        $data["random"]=$query->result();
        $query=$this->db->query("SELECT * FROM products_image WHERE product_id=$id");
        $data["galeri"]=$query->result();
        $this->load->view('_header',$data);
        $this->load->view('_sidebar',$data);
        $this->load->view('urun_detay',$data);
        $this->load->view('_footer');
    }
    public function arama() //arama sonuçları sayfası işlemleri ve görüntüleyici
    {
        $query=$this->db->query("SELECT * FROM category ORDER BY name");
        $data["kategoriler"]=$query->result();

        $query=$this->db->query("SELECT * FROM products WHERE grup='kampanya'");
        $data["kampanya"]=$query->result();

        //Arama yapılan yer
        $arama=$this->input->post('arama');
        $query=$this->db->query("SELECT * FROM products WHERE name LIKE '%$arama%' ORDER BY date desc");
        $data["yeni"]=$query->result();
        $data["adet"]=count($query->result());




        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();
        $data["sayfa"]="Arama Sonuçları";
        $data["menu"]="anasayfa";

        $data["cat"] = $this->Database_model->get_categories();

        $this->load->view('_header',$data);
        $this->load->view('_slider');
        $this->load->view('_sidebar',$data);
        $this->load->view('arama_sonuclari',$data);
        $this->load->view('_footer');
    }
    public function filtre() //filtre sonuçları sayfası işlemleri ve görüntüleyici
    {
        if(!$this->input->post('aralik')){//filtrenin varsayılan değerleri
            $sol=350;
            $sag=450;
        }else{
            $data["filtre"]=$this->input->post('aralik');
            $fikibok=explode(',',$data["filtre"]);
            $sol=$fikibok[0];
            $sag=$fikibok[1];
        }


        $query=$this->db->query("SELECT * FROM category ORDER BY name");
        $data["kategoriler"]=$query->result();

        $query=$this->db->query("SELECT * FROM products WHERE grup='kampanya'");
        $data["kampanya"]=$query->result();

        $query=$this->db->query("SELECT * from products where s_price BETWEEN $sol and $sag");
        $data["yeni"]=$query->result();
        $data["adet"]=count($query->result());

        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();
        $data["sayfa"]="Filtreleme Sonuçları";
        $data["menu"]="anasayfa";

        $data["cat"] = $this->Database_model->get_categories();

        $this->load->view('_header',$data);
        $this->load->view('_slider');
        $this->load->view('_sidebar',$data);
        $this->load->view('filtre_sonuclari',$data);
        $this->load->view('_footer');
    }
}
