<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('set_linkurl')){

  function set_linkurl($id,$jdl){
    //buat array untuk memasukan beberapa karakter
    $char = array ('{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','-','/','\\',',','.','#',':',';','\'','"','[',']');
    //ubah huruf menjadi kecil
    //rubah struktur string pada $char menjadi kosong
    $del_char = strtolower(str_replace($char,"",$jdl));
    //ubah huruf menjadi kecil
    //rubah struktur string yang kosong dengan memberi karakter strip (-)
    $add_strip = strtolower(str_replace(' ', '-', $del_char));
    $clean_url = $id.'-'.$add_strip;
	return $clean_url;
  }
	
}
?>
