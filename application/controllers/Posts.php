<?php


     class Posts extends CI_Controller{

        //funcao(index) para chamar a pagina index dos post onde estao todos os post
          public function index(){

                  // variel para a view para passar dados
                  $data['title'] = 'Ultimos Post';

                  // chamar no models nos post ja criados chamaanod o model
                  $data['posts'] = $this->Post_model->get_posts();

                  //print_r($data['posts']);
                  //passar para carregar todas as paginas  header conteudo das paginas e footer
                  $this->load->view('templates/header');
                  // conteudo a passar nas paginas
                  $this->load->view('posts/index',$data);
                  $this->load->view('templates/footer');

            }

              // levar para a pagina consoante o slug
              public function view($slug = NULL){
                  
                $data['post'] = $this->Post_model->get_posts($slug);

                // se post estiver vazia ou nao existir mostrar mostrar 404 ou outra cena qualquer
                  if(empty($data['post'])){
                    show_404();
                  }

                  $data['title'] = $data['post']['title'];
                  // carregar conteudo nos posts individuais
                  $this->load->view('templates/header');
                  $this->load->view('posts/view', $data);
                  $this->load->view('templates/footer');
              }


                // criar posts
                public function create() {
                    $data['title'] = 'Criar Posts';

                    //validar antes de enviar ao criar post

                    $this->form_validation->set_rules('title','Title','required');

                    $this->form_validation->set_rules('body','Body','required');

                    // ver se a validacao foi submetida com sucesso 

                    //se nao for enviada 
                    if($this->form_validation-> run() === FALSE){
                      
                      $this->load->view('templates/header');
                      $this->load->view('posts/create', $data);
                      $this->load->view('templates/footer');

                    }

                    //se for enviada com sucesso
                    else{

                       $this->Post_model->create_post();
                        redirect('posts');
                    }
                    
                }


                  //apagar posts
                 public function delete($id){
                  echo $id;
                  //apagar post pelo id
                  $this->Post_model->delete_post($id);
                  redirect('posts');
                 }
 }
