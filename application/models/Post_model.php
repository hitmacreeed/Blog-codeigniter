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

                $this->db->order_by('posts.id','DESC');//ordenar pelo ultimo id
                $this->db->join('categories','categories.id = posts.category_id');
                $query = $this->db->get('posts');
                return $query->result_array();
            }

              //selecionar  todos os post
              $query = $this->db->get_where('posts', array('slug' => $slug ));
              return $query->row_array();
        
        }



        public function create_post($post_image) {
              //obter os titulos criados e transformar em slug, receber as imagens
                $slug = url_title($this->input->post('title'));

                //obter array de name="" do form ... dados introduzidos
                  $data = array(
                  'title'=> $this->input->post('title'),
                  'slug'=> $slug,
                  'body'=> $this->input->post('body'),
                  'category_id' => $this->input->post('category_id'),
                  'post_image' => $post_image

                   );

                    //inserir na base de dados
                    return $this->db->insert('posts',$data);

         }

              //apagar post pelo id
               public function delete_post($id) {

                 //selecionar na tabela o id 
                  $this->db->where('id',$id);
                   //selecioanr qual tabela que ira apagar pelo id
                    $this->db->delete('posts');
                    
                    return true;

                   
            }

              //editar posts pelo slug
                public function update_post(){
                  //mudar o slug pelo titulo 
                   $slug = url_title($this->input->post('title'));

                  $data = array(
                  'title'=> $this->input->post('title'),
                  'slug'=> $slug,
                  'body'=> $this->input->post('body'),
                  'category_id'=> $this->input->post('category_id')
                   );

                     //actualizar na base de dados
                      $this->db->where('id',$this->input->post('id')); 
                      return $this->db->update('posts',$data);
                  
                }


                //receber categorias 
                  public function get_categories(){

                    $this->db->order_by('name');//oerdenar pelo nome da categoria
                    $query=$this->db->get('categories');//receber da tabela categorias
                    return $query->result_array();//devolver o array das categorias

                  }



 }
