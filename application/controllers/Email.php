<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Email extends CI_Controller {
 
    function __construct() {
      parent::__construct();
    // jika belum login redirect ke login
      cek_session();
    }

    public function pesan(){
        $this->load->view('member/tema/header');
        $this->load->view('member/email');
        $this->load->view('member/tema/footer'); 
    }
 
      function index(){
        $this->load->library('mailer');
        $email = $this->session->userdata('pengguna')['email'];
        $nama = $this->session->userdata('pengguna')['nama'];
        $subjek = $this->input->post('subjek');
        $pesan = $this->input->post('pesan');
        
        $this->mailer->IsSMTP();
        $this->mailer->SMTPSecure = 'tls';
        $this->mailer->Host = "localhost"; //hostname masing-masing provider email
        $this->mailer->SMTPDebug = 2;
        $this->mailer->Port = 587;
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = "admin@kerabatjalan.com"; //user email
        $this->mailer->Password = "adminkerabatjalan"; //password email
        $this->mailer->SetFrom("admin@kerabatjalan.com","Kerabat Jalan"); //set email pengirim
        $this->mailer->Subject = $subjek; //subyek email
        $this->mailer->AddAddress($email,$nama); //tujuan email
        $this->mailer->MsgHTML('$pesan');
        if($this->mailer->Send()) echo "Message has been sent";
        else echo "Failed to sending message";

        }
    
    function info(){
        $this->load->view('member/tema/header');
        $this->load->view('member/pemberitahuan');
        $this->load->view('member/tema/footer');    
    }
}
