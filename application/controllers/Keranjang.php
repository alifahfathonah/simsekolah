<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Keranjang extends CI_Controller {
        function __construct()
        {
            parent::__construct();
            $this->load->model('Model_common');
            $this->load->model('perpustakaan/Model_perpus');
        }

        public function index()
        {
            $data['setting'] = $this->Model_common->all_setting();
            $data['page_home'] = $this->Model_common->all_page_home();
            $data['comment'] = $this->Model_common->all_comment();
            $data['social'] = $this->Model_common->all_social();
            $data['all_news'] = $this->Model_common->all_news();
            $data['all_news_category'] = $this->Model_common->all_news_category();

            $data['list_keranjang'] = $this->cart->contents();

            $this->load->view('perpustakaan/view_header',$data);
            $this->load->view('perpustakaan/view_keranjang',$data);
            $this->load->view('perpustakaan/view_footer');
        }
        public function hapus_keranjang()
        {
            $this->cart->destroy();
            redirect('perpustakaan/dashboard');
        }
        public function berhasil_pinjam()
        {
            $this->cart->destroy();
        }
        public function hapus_item_keranjang($row_id=null)
        {
            if ($row_id) {
                $this->cart->remove($row_id);
                redirect('perpustakaan/keranjang');
            }
        }
        public function pesan()
        {
            $data['setting'] = $this->Model_common->all_setting();
            $data['page_home'] = $this->Model_common->all_page_home();
            $data['comment'] = $this->Model_common->all_comment();
            $data['social'] = $this->Model_common->all_social();
            $data['all_news'] = $this->Model_common->all_news();
            $data['all_news_category'] = $this->Model_common->all_news_category();

            $this->load->view('perpustakaan/view_header',$data);

            $this->load->view('perpustakaan/view_footer');
        }
        public function proses_pesanan()
        {
            $response = [
                'status' => 'ok'
            ];
            echo json_encode($response);
        }
    }