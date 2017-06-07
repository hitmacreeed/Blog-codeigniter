<?php
     class Pages extends CI_Controller{

      //funcao(view) para ver se as views dos controller existem se nao erro 404
          public function view($page ='home'){

            if (file_exists(APPPATH.'/views/pages/'.$page.'php')) {
              show_404();

            }


            // variel para a view para passar dados
             $data['title'] = ucfirst($page);

            //passar para carregar todas as paginas  header conteudo das paginas e footer
             $this->load->view('templates/header');
             $this->load->view('pages/'.$page,$data);// conteudo a passar nas paginas
             $this->load->view('templates/footer');

        }


 }
