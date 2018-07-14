<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

  public function index(){
    $this->load->view('home');
  }
  public function sharefb(){

    $jawaban = $_GET['jawab'];
    $data['jawaban'] = $jawaban;

    if($jawaban == 'a'){
      $txthasil = 'Miss you don’t know it all';
      
    }elseif ($jawaban == 'b') {
      $txthasil = 'Living live at the fullest';
      
    }elseif ($jawaban == 'c') {
      $txthasil = 'Tricky-Picky';
      
    }elseif ($jawaban == 'd') {
      $txthasil = 'The Economist';
     
    }elseif ($jawaban == 'e') {
      $txthasil = 'Mrs. Worried';
     
    }
    $data['txthasil'] = $txthasil;
    $this->load->view('share',$data);
  }
  public function saveform(){
    //print_r($_POST);
    // $keys = range('a', 'e');
    // $values = array_fill(0, 5, 0);
    // $freq = array_combine($keys, $values);
    // $word = "ccc";
    // $len = strlen($word);
    // for ($i=0; $i<$len; $i++) {
    //   $letter = strtolower($word[$i]);
    //   if (array_key_exists($letter, $freq)) {
    //     $freq[$letter]++;
    //   }
    // }
    // arsort($freq);
    // print_r($freq);
    // echo reset($freq);
    // $arrayKeys = array_keys($freq);
    // echo key($freq);
    if(isset($_POST['hasil']) and $_POST['hasil'] != ''){

      $ip = $this->input->ip_address();
      $name = $_POST['name-user'];
      $email = $_POST['email-user'];

      $jawaban = explode(',', $_POST['hasil']);

      //print_r($jawaban);

      $penting = $jawaban[7].$jawaban[8].$jawaban[9];

      //echo $penting;

      $keys = range('a', 'e');
      $values = array_fill(0, 5, 0);
      $freq = array_combine($keys, $values);
      $word = $penting;
      $len = strlen($word);
      for ($i=0; $i<$len; $i++) {
        $letter = strtolower($word[$i]);
        if (array_key_exists($letter, $freq)) {
          $freq[$letter]++;
        }
      }
      arsort($freq);
      //print_r($freq);
      $jumlah = reset($freq);
      $arrayKeys = array_keys($freq);
      
      if($jumlah == 1){
        $hasil = $jawaban[7];
      }else{
        $hasil = key($freq);
      }



      $data = array();
      $inputdata = array(            

        'name'    => $name,
        'email'   => $email,
        'ip'      => $ip,
        'hasil'   => $hasil,
        'jawab1'  => $jawaban[0],
        'jawab2'  => $jawaban[1],
        'jawab3'  => $jawaban[2],
        'jawab4'  => $jawaban[3],
        'jawab5'  => $jawaban[4],
        'jawab6'  => $jawaban[5],
        'jawab7'  => $jawaban[6],
        'jawab8'  => $jawaban[7],
        'jawab9'  => $jawaban[8],
        'jawab10' => $jawaban[9],
        'cretime' => date('Y-m-d H:i:s'),

      );     

      $saved = $this->db->insert('personality', $inputdata);

      if($hasil == 'a'){
        $txthasil = 'Miss you don’t know it all';
        $txtpersonality = 'Kalau punya bekas luka, kamu tipe orang yang masa bodoh atau tak acuh. Padahal, bekas luka akan mengganggu penampilanmu. Apalagi kalau bekas lukamu ada di bagian terbuka seperti wajah, lengan, hingga leher.  Tentunya, kulit yang bebas dari bekas luka akan membuatmu lebih cantik dan percaya diri!  Jadi, untuk mengatasi bekas luka, serahkan saja pada ahlinya: Dermatix!';
        $pic = '<img src="'.base_url('assets/frontend/images/hasil/a.png').'" alt="">';
      }elseif ($hasil == 'b') {
        $txthasil = 'Living live at the fullest';
        $txtpersonality = 'Kamu tipe orang yang benar-benar memperhatikan dan menangani bekas luka dengan baik. Buat kamu, bekas luka harus segera ditangani agar cepat memudar dan tidak mengganggu pergaulan dan penampilan terbaikmu. Tentunya, Dermatix adalah pilihan terbaik untuk memudarkan bekas lukamu.';
        $pic = '<img src="'.base_url('assets/frontend/images/hasil/b.png').'" alt="">';
      }elseif ($hasil == 'c') {
        $txthasil = 'Tricky-Picky';
        $txtpersonality = 'Kamu tipe yang penuh pertimbangan dan pemilih dalam menangani bekas luka. Padahal, pilih-pilih malah akan bikin kamu banyak pertimbangan dan membuatmu ragu, yang akhirnya tidak menghasilkan apa-apa. Jadi, kenapa mesti pilih-pilih kalau sudah ada Dermatix yang telah teruji klinis mampu membantu menyamarkan bekas luka?';
        $pic = '<img src="'.base_url('assets/frontend/images/hasil/c.png').'" alt="">';
      }elseif ($hasil == 'd') {
        $txthasil = 'The Economist';
        $txtpersonality = 'Dalam memilih perawatan bekas luka, kamu termasuk hemat. Harga yang ekonomis menjadi pertimbangan kamu dalam menangani bekas luka. Padahal, harga yang ekonomis belum tentu menjamin kualitas bagus, lho. Jadi, kalau memilih perawatan bekas luka jangan tanggung-tanggung, pilih yang benar-benar efektif dari teknologi terdepan: Dermatix!';
        $pic = '<img src="'.base_url('assets/frontend/images/hasil/d.png').'" alt="">';
      }elseif ($hasil == 'e') {
        $txthasil = 'Mrs. Worried';
        $txtpersonality = 'Bekas luka akan membuatmu khawatir dengan berlebihan. Tipe ini juga akan mempertimbangkan berbagai cara untuk membuat bekas luka cepat memudar. Namun, terkadang, kecemasan yang berlebihan malah akan membuat perawatan lukamu kurang maksimal. Sekarang, kamu tidak perlu khawatir. Untuk menangani bekas luka, serahkan saja pada ahlinya: Dermatix!';
        $pic = '<img src="'.base_url('assets/frontend/images/hasil/e.png').'" alt="">';
      }

      echo json_encode(array('status'=>'true','txthasil'=>$txthasil,'hasil'=>$hasil,'pic'=>$pic,'name'=>$name,'personality'=>$txtpersonality));
    }

  }
}
