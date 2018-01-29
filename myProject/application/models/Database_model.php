<?php
    class Database_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
            // Your own constructor code
        }
        public function login($tablo,$email,$sifre){
        $query=$this->db->query("SELECT * FROM $tablo WHERE email ='".$email."' AND password = '".$sifre."'");
        if($query->num_rows()==1)
            return $query->result();
        else return false;
        }
        public function login_admin($tablo,$email,$sifre){
            $query=$this->db->query("SELECT * FROM $tablo WHERE email ='".$email."' AND password = '".$sifre."' AND authorty='1'");
            if($query->num_rows()==1)
                return $query->result();
            else return false;
        }

        public function get_categories(){

            $this->db->select('*');
            $this->db->from('category');
            $this->db->where('parent_id', 0);

            $parent = $this->db->get();

            $categories = $parent->result();
            $i=0;
            foreach($categories as $p_cat){

                $categories[$i]->sub = $this->sub_categories($p_cat->id);
                $i++;
            }
            return $categories;
        }
        public function sub_categories($id){

            $this->db->select('*');
            $this->db->from('category');
            $this->db->where('parent_id', $id);

            $child = $this->db->get();
            $categories = $child->result();
            $i=0;
            foreach($categories as $p_cat){

                $categories[$i]->sub = $this->sub_categories($p_cat->id);
                $i++;
            }
            return $categories;
        }
        public function cat_name_getir($id){
            $query = $this->db->query('SELECT products.*,category.name as cat_name FROM products 
                                        INNER JOIN category on products.cat_id=category.id
                                        WHERE products.id='.$id);
            return $query->result();
        }
        public function update_data($tablo,$data,$id){
            $this->db->where("id",$id);
            $this->db->update($tablo,$data);
            return true;
        }
        public function get_urunler(){
            $query = $this->db->query('SELECT products.* , category.name as katadi
            FROM products
            INNER JOIN category ON products.cat_id=category.id 
            ORDER BY name ');
            return $query->result();
        }
        public function get_urun($id){
            $query = $this->db->query('SELECT products.* , category.name as katadi
            FROM products
            INNER JOIN category ON products.cat_id=category.id 
            WHERE id=$id ');
            return $query->result();
        }
        public function get_sepet_urunler($id){
            $query=$this->db->query("SELECT a_sepet.adet,p.id,p.name,p.preview_img,p.s_price,p.stock FROM a_sepet
            INNER JOIN products as p on p.id=a_sepet.urun_id
            WHERE a_sepet.musteri_id=$id");
            return $query->result();
        }
        public function get_comments($id)
        {
            $query=$this->db->query("select u.name,comment.comment,comment.date from  comment
                inner join users as u on u.id=comment.user_id
                WHERE comment.product_id=$id
                ");

            return $query->result();
        }
        public function my_comments($id){
            $query=$this->db->query("SELECT products.name as urun_adi ,comment.* from comment
            inner join products on comment.product_id=products.id
            where user_id=".$id);
            return $query->result();
        }
        public function get_favori_urunler($id){
            $query=$this->db->query("SELECT fav_products.id as fav_id,p.id,p.name,p.preview_img,p.s_price FROM fav_products
            INNER JOIN products as p on p.id=fav_products.products_id
            WHERE fav_products.user_id=$id");
            return $query->result();
        }
    }
?>