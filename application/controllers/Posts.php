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

              // levar para a pagina consoante o slug/posts
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
                    $data['title'] = 'Criar Posts'; //titulo da pagina em si

                    $data['categories'] = $this->Post_model->get_categories(); //receber categorias pela funcao no model
 
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

                      //carregar imagens\ defenicoes das imagens 
                      $config['upload_path']= './assets/images/posts';
                      $config['allowed_types']= 'png|jpg|gif';
                      $config['max_size']= '2048';
                      $config['max_width']= '500';
                      $config['max_heigth']= '500';

                      $this->load->library('upload',$config); //carregar bliblioteca de upload e chamar os configs

                      if (!$this->upload->do_upload()) {
                        $errors=array('error'=>$this->upload->display_errors()); //mostrar erros no upload
                        $post_image = 'imagempordefeito.jpg'; // se o utilizador nao carregar uma imagem
                       
                      }

                      else{
                          //se tiver sucesso upload das imagens
                          $data = array('upload_data'=> $this->upload->data());
                          $post_image = $_FILES['userfile']['name']; //receber a imagen e o nome dela
                      }
                     

                        $this->Post_model->create_post($post_image);
                        redirect('posts');
                    }
                    
                }


                  //apagar posts
                  public function delete(){

                       //apagar post pelo id
                       $id = $this->uri->segment(3);
                       $this->Post_model->delete_post($id);
                       redirect('posts');
                 }

                      // ver paginas para editar
                     public function edit($slug){

                         $data['post'] = $this->Post_model->get_posts($slug);
                         $data['categories'] = $this->Post_model->get_categories(); //receber categorias pela funcao no model

                          // se post estiver vazia ou nao existir mostrar mostrar 404 ou outra cena qualquer
                          if(empty($data['post'])){
                             show_404();
                          }
                             $data['title'] = $data['post']['title'];
                             // carregar conteudo nos posts individuais
                              $this->load->view('templates/header');
                              $this->load->view('posts/edit', $data);
                              $this->load->view('templates/footer');
             

                     }

                        //actualizar post
                      public function update(){

                        $this->Post_model->update_post();
                         redirect('posts');

                      }

 }
