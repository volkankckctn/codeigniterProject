<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uye extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Database_model');
        $this->load->helper('url');

        if(!$this->session->userdata("user_session")){//user girişi yoksa alttaki fonksiyonlar çalışmasın
            $this->session->set_flashdata("mesaj","Alışverişin Tadını Çıkarmak İçin Lütfen Giriş Yapın..");
            redirect(base_url().'home/login_sayfa');
        }
    }
	public function index()//index
	{
        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();
		
		$query=$this->db->query("SELECT * FROM users WHERE id=".$this->session->user_session["id"]);
        $data["uye"]=$query->result();
        $data["sayfa"]="Hesabım - ";
		$data["menu"]="uye";
		
		$this->load->view('_header',$data);
		$this->load->view('_uye_sidebar');
		$this->load->view('hesabim',$data);
		$this->load->view('_footer');
	}
    public function cikis()//uye cikisi
    {
        $this->session->unset_userdata("user_session");
        redirect(base_url());
    }
    public function hesabim()//hesabım sayfa çağırıcı
    {
        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();

        $query = $this->db->query("SELECT * FROM users WHERE id=" . $this->session->user_session["id"]);
        $data["uye"] = $query->result();
        $data["sayfa"] = "Üye Paneli - ";
        $data["menu"] = "uye";

        $this->load->view('_header', $data);
        $this->load->view('_uye_sidebar');
        $this->load->view('hesabim', $data);
        $this->load->view('_footer');

    }
    public function uye_guncelle($id)//üye güncelleme işlemleri
    {
        //Form verilerini alıyoruz

        $data=array(
            'name' => $this->input->post('name'),
            'surname' => $this->input->post('surname'),
            'email' => $this->input->post('email'),
            'tel' => $this->input->post('tel'),
            'address' => $this->input->post('address')
        );
        $this->load->model('Database_model');
        $this->Database_model->update_data("users",$data,$id);
        $this->session->set_flashdata("msj_guncelle", "Hesap Bilgileriz Güncellendi!");

        $email = $this->input->post('email');
        $password=$this->session->user_session["password"];
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
            redirect(base_url() . 'uye/hesabim');
        }else echo "bi bok oldu";
    }
    public function profil_sayfa() //profil resmi değiştirme sayfası çağırıcı
    {
        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();

        $query = $this->db->query("SELECT * FROM users WHERE id=" . $this->session->user_session["id"]);
        $data["uye"] = $query->result();
        $data["sayfa"] = "Profil Resmi - ";
        $data["menu"] = "uye";

        $this->load->view('_header', $data);
        $this->load->view('_uye_sidebar');
        $this->load->view('hesabim_profil', $data);
        $this->load->view('_footer');
    }
    public function profil_degis($id) //profil resmi değiştirme işlemleri
    {
        $data=array(
            'image' => $this->input->post('icon'),
        );
        $this->load->model('Database_model');
        $this->Database_model->update_data("users",$data,$id);

        $sess_array=array(
            'id'=>$this->session->user_session["id"],
            'name'=>$this->session->user_session["name"],
            'surname'=>$this->session->user_session["surname"],
            'address'=>$this->session->user_session["address"],
            'tel'=>$this->session->user_session["tel"],
            'authorty'=>$this->session->user_session["authorty"],
            'status'=>$this->session->user_session["status"],
            'image'=>$this->input->post('icon'),
            'username'=>$this->session->user_session["username"],
            'email'=>$this->session->user_session["email"],
            'password'=>$this->session->user_session["password"]
        );
        $this->session->set_userdata("user_session",$sess_array);
        $this->session->set_flashdata("degis", "Avatar Başarıyla Değiştirildi.");
        redirect(base_url() . 'uye/hesabim');
    }
    public function sifre_degistir_sayfa() //şifre değiştir sayfa çağırıcı
    {
        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();

        $query = $this->db->query("SELECT * FROM users WHERE id=" . $this->session->user_session["id"]);
        $data["uye"] = $query->result();
        $data["sayfa"] = "Şifre İşlemleri - ";
        $data["menu"] = "uye";

        $this->load->view('_header', $data);
        $this->load->view('_uye_sidebar');
        $this->load->view('hesabim_sifredegis', $data);
        $this->load->view('_footer');
    }
    public function sifre_degistir($id)//şifre değiştirme işlemleri
    {
        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();

        $query = $this->db->query("SELECT * FROM users WHERE id=" . $this->session->user_session["id"]);
        $data["uye"] = $query->result();
        $data["sayfa"] = "Üye Paneli - ";
        $data["menu"] = "uye";

        $n_password=$this->input->post('new');
        $n_password_c=$this->input->post('confirm   ');
        $old_password=$this->session->user_session["password"];
        if($old_password==$this->input->post('old')){
            $data=array(
                'password' => $n_password,
            );
            $this->load->model('Database_model');
            $this->Database_model->update_data("users",$data,$id);
            $this->session->set_flashdata("degis", "Şifre Başarıyla Değiştirildi");
            redirect(base_url() . 'uye/sifre_degistir_sayfa');
        }else{
            $this->session->set_flashdata("sifre_yanlis", "Eski Şifreniz Yanlış");
            redirect(base_url() . 'uye/sifre_degistir_sayfa');

        }
    }
    public function mesaj_sayfa() //mesajlarım sayfası çağırıcı
    {
        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();

        $query = $this->db->query("SELECT * FROM users WHERE id=" . $this->session->user_session["id"]);
        $data["uye"] = $query->result();
        $data["sayfa"] = "Mesajlarım - ";
        $data["menu"] = "uye";

        $query = $this->db->query("SELECT * FROM messages WHERE email='" . $this->session->user_session["email"]."'");
        $data["mesaj"]=$query->result();

        $this->load->view('_header', $data);
        $this->load->view('_uye_sidebar');
        $this->load->view('hesabim_mesajlar', $data);
        $this->load->view('_footer');
    }
    public function sepet_ekle($id)// sepete ekleme işlemleri
    {
        $this->load->model("Database_model");

        $query=$this->db->query("SELECT id, adet FROM a_sepet WHERE urun_id=$id AND musteri_id=".$this->session->user_session['id']);
        $sepet=$query->result();
        if(count($this->input->post("adet"))>0){//ürün detay sayfasından geliyorsa
            $data=array(
                'musteri_id'=>$this->session->user_session["id"],
                'urun_id'=>$id,
                'adet'=> $this->input->post("adet"),
                'tarih'=>date("Y-m-d h:i:s")
            );
            if(count($sepet)>0)
            {
                $sepet_id=(int)$sepet[0]->id;
                $data['adet']+=$sepet[0]->adet;
                $this->Database_model->update_data("a_sepet",$data,$sepet_id);
                $this->session->set_flashdata("basari","Ürün sepete eklendi");
                redirect(base_url()."home/urun_detay_sayfa/".$id);

            }else {//sepette daha önce varsa üstüne ekle
                if($this->db->insert("a_sepet",$data)){
                    $this->session->set_flashdata("basari","Ürün sepete eklendi");
                    redirect(base_url()."home/urun_detay_sayfa/".$id);
                }echo "DB errror";
            }
        }else{//anasayfadan eklediyse
            $query=$this->db->query("SELECT *, IF(stock=0, 'tukendi', 'stokta') as kontrol from products WHERE id=$id");
            $kontrol=$query->result();


            if($kontrol[0]->kontrol=="tukendi"){
                $this->session->set_flashdata("basarisiz","Ürün Stokta Mevcut Değil");
                redirect(base_url()."home/urun_detay_sayfa/".$id);
            }

            $data=array(
                'musteri_id'=>$this->session->user_session["id"],
                'urun_id'=>$id,
                'adet'=> 1,
                'tarih'=>date("Y-m-d h:i:s")
            );
            if(count($sepet)>0)
            {
                $sepet_id=(int)$sepet[0]->id;
                $data['adet']+=1;
                $this->Database_model->update_data("a_sepet",$data,$sepet_id);
                $this->session->set_flashdata("basari","Ürün sepete eklendi");
                redirect(base_url()."home/urun_detay_sayfa/".$id);

            }else {
                if($this->db->insert("a_sepet",$data)){
                    $this->session->set_flashdata("basari","Ürün sepete eklendi");
                    redirect(base_url()."home/urun_detay_sayfa/".$id);
                }echo "DB errror";
            }
        }
    }
    public function sepet_sil($id)// sepet silme
    {

        $query = $this->db->query("DELETE FROM a_sepet WHERE urun_id=$id");
        $this->session->set_flashdata("delete", "Ürün Sepetinizden Kaldırıldı");
        redirect(base_url() . "uye/sepetim");

    }
    public function sepetim() //sepetim sayfası çağırıcı
    {
        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();

        $query = $this->db->query("SELECT * FROM users WHERE id=" . $this->session->user_session["id"]);
        $data["uye"] = $query->result();
        $data["sayfa"] = "Sepetim - ";
        $data["menu"] = "sepetim";
        $this->load->model("Database_model");

        $data["sepet"]=$this->Database_model->get_sepet_urunler($this->session->user_session["id"]);
        $this->load->view('_header', $data);
        $this->load->view('sepetim', $data);
        $this->load->view('_footer',$data);

    }
    public function yorum_sayfa() // yorumlarım sayfası çağırıcı
    {
        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();

        $query = $this->db->query("SELECT * FROM users WHERE id=" . $this->session->user_session["id"]);
        $data["uye"] = $query->result();
        $data["sayfa"] = "Yorumlarım - ";
        $data["menu"] = "uye";

        $this->load->model('Database_model');
        $data["yorum"]=$this->Database_model->my_comments($this->session->user_session["id"]);

        $this->load->view('_header', $data);
        $this->load->view('_uye_sidebar');
        $this->load->view('hesabim_yorumlarim', $data);
        $this->load->view('_footer');
    }
    public function yorum_yap($id)//yorum yap işlemleri
    {
        $data=array(
            'user_id' => $this->session->user_session["id"],
            'product_id' => $id,
            'comment' => $this->input->post('comment'),
            'date' => date("Y-m-d h:i:s")
        );
        $this->db->insert("comment",$data);
        $this->session->set_flashdata("basari","Yorumunuz basarıyla eklendi.");
        redirect(base_url()."home/urun_detay_sayfa/".$id);

    }
    public function yorum_sil($id)//yorum sil
    {
        $query = $this->db->query("DELETE FROM comment WHERE id=$id");
        $this->session->set_flashdata("delete", "Üründen Yorumunuz Kaldırıldı");
        redirect(base_url() . "uye/yorum_sayfa");

    }
    public function favori_ekle($id)//favorilerime ekle işlemleri
    {

        $query = $this->db->query("SELECT * FROM fav_products WHERE products_id=" . $id ." AND user_id=".$this->session->user_session["id"]);
        if($query->result()){
            $this->session->set_flashdata("basarisiz", "Ürün Zaten Favoriler Ekli.");
            redirect(base_url() . "home/urun_detay_sayfa/".$id);
        }
        $data=array(
            'user_id'=>$this->session->user_session["id"],
            'products_id'=>$id,
        );

        $this->db->insert("fav_products",$data);
        $this->session->set_flashdata("basari", "Ürün Favorilere Eklendi.");
        redirect(base_url() . "home/urun_detay_sayfa/".$id);

    }
    public function favori_sil($id)//favorilerimden sil işlemleri
    {
        $query = $this->db->query("DELETE FROM fav_products WHERE products_id=" . $id ." AND user_id=".$this->session->user_session["id"]);
        $this->session->set_flashdata("basari", "Ürün Favorilerden Çıkarıldı.");
        redirect(base_url() . "uye/favori_sayfa");
    }
    public function favori_sayfa()//favorilerim sayfası görünteliyici
    {

        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();


        $data["fav"]=$this->Database_model->get_favori_urunler($this->session->user_session["id"]);
        $data["sayfa"] = "Favorilerim - ";
        $data["menu"] = "uye";

        $this->load->view('_header', $data);
        $this->load->view('_uye_sidebar');
        $this->load->view('hesabim_favoriler', $data);
        $this->load->view('_footer');
    }
    public function siparis_tamamla()//alısverisi tamamla sayfası görüntüleyici
    {
        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();

        $query = $this->db->query("SELECT * FROM users WHERE id=" . $this->session->user_session["id"]);
        $data["uye"] = $query->result();
        $query = $this->db->query("SELECT a_sepet.adet,p.s_price FROM a_sepet
            INNER JOIN products as p on p.id=a_sepet.urun_id
            WHERE a_sepet.musteri_id=". $this->session->user_session["id"]);
        $data["sepet"] = $query->result();
        $data["sayfa"] = "Satın Al - ";
        $data["menu"] = "tamamla";

        $this->load->view('_header', $data);
        $this->load->view('_uye_sidebar');
        $this->load->view('siparis_tamamla', $data);
        $this->load->view('_footer');
    }
    public function siparis_iptal($id) //siparis iptal işlemleri
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
        redirect(base_url().'uye/siparislerim');
    }
    public function satin_al() //siparis tamamla - satın alma işlemleri
    {
        $data=array(
            'musteri_id'=>$this->session->user_session["id"],
            'tarih'=>date("Y-m-d h:i:s"),
            'ip'=>$_SERVER['REMOTE_ADDR'],
            'ad_soyad'=>$this->input->post('ad_soyad'),
            'tel'=>$this->input->post('tel'),
            'tutar'=>$this->input->post('tutar'),
            'adres'=>$this->input->post('adres'),
            'odeme_sekli'=>$this->input->post('odeme_sekli'),
            'siparis_durumu'=>"yeni",
        );
        $this->db->insert("a_siparis",$data);
        $order_id=$this->db->insert_id();
        $sepet=$this->Database_model->get_sepet_urunler($this->session->user_session["id"]);
        foreach ($sepet as $urun)
        {
            $data2=array(
                'musteri_id'=>$this->session->user_session["id"],
                'urun_id'=>$urun->id,
                'siparis_id'=>$order_id,
                'adet'=>$urun->adet,
                'fiyat'=>$urun->s_price,
                'tarih'=>date("Y-m-d h:i:s"),
                'urun_adi'=>$urun->name,
                'tutar'=>(double)$this->input->post('tutar')
            );
            $this->db->insert("a_siparis_urunler",$data2);
            $stock['stock']=($urun->stock)-($urun->adet);      //satın alınan ürünleri stoktan düş
            $this->Database_model->update_data("products",$stock,$urun->id);
        }
        $this->db->query("DELETE FROM a_sepet WHERE musteri_id=".$this->session->user_session["id"]);
        $this->session->set_flashdata("basari","Siparişiniz işleme alındı.Hayırlı Olsun :)");
        redirect(base_url()."uye/siparislerim");
    }
    public function siparislerim()//siparişlerim sayfası görüntüleyici
    {
        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();

        $query = $this->db->query("SELECT * FROM a_siparis WHERE musteri_id=" . $this->session->user_session["id"]);
        $data["siparis"] = $query->result();
        $data["sayfa"] = "Siparişlerim - ";
        $data["menu"] = "uye";

        $this->load->view('_header', $data);
        $this->load->view('_uye_sidebar');
        $this->load->view('hesabim_siparislerim', $data);
        $this->load->view('_footer');
    }
    public function siparislerim_detay($id) //siparişlerim datay sayfası görüntüleyici
    {
        $query=$this->db->query("SELECT * FROM settings");
        $data["veri"]=$query->result();

        $query = $this->db->query("SELECT a_siparis_urunler.*,products.preview_img as urun_resim from a_siparis_urunler
        left join products on products.name=a_siparis_urunler.urun_adi
        where siparis_id=$id");
        $data["urunler"] = $query->result();
        $data["sayfa"] = "Siparişlerim - ";
        $data["menu"] = "uye";

        $this->load->view('_header', $data);
        $this->load->view('_uye_sidebar');
        $this->load->view('hesabim_siparislerim_detay', $data);
        $this->load->view('_footer');
    }
}
