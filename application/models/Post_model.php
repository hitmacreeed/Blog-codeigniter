<?php
    class Post_model extends Ci_Model{

       //carregar base de dados para para fazer posts atraves de um model
        public function __construct(){
          $this->load->database(); // funcao database
        }


        // funcao para receber os posts na base de dados *verrificando os slug
        //slug --> *Some systems (such as Django) use the slug as part of the URL to locate the story, an example being www.mysite.com/archives/kate-and-william.*

        public function get_posts($slug = FALSE) {
            if ($slug === FALSE) {
                $query = $this->db->get('posts');
                return $query->result_array();
            }

              $query = $this->db->get_where('posts', array('slug' => $slug ));
              return $query->row_array();
        }





 }
