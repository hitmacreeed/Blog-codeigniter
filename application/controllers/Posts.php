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

                $data['posts'] = $this->Post_model->get_posts($slug);

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





 }
