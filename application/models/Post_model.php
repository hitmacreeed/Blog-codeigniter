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

                $this->db->order_by('id','DESC');//ordenar pelo ultimo id
                $query = $this->db->get('posts');
                return $query->result_array();
            }

              //selecionar  todos os post
              $query = $this->db->get_where('posts', array('slug' => $slug ));
              return $query->row_array();
        }



         public function create_post(){
          //obter os titulos criados e transformar em slug tb
          $slug = url_title($this->input->post('title'));

          //obter array de name="" do form ... dados introduzidos
            $data = array(
            'title'=> $this->input->post('title'),
            'slug'=> $slug,
            'body'=> $this->input->post('body')
               );

            //inserir na base de dados
              return $this->db->insert('posts',$data);

           }

            //apagar post pelo id
            public function delete_post($id){
              //selecionar na tabela o id 
              $this->db->where('id',$id);
              //selecioanr qual tabela que ira apagar pelo id
              $this->db->delete('posts');
              return true;
            }

 }
