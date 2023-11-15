<?php
  function encryptData($data) {
    $ciphering = "BF-CBC";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $option = 0;
    $encryption_iv = "18161100";
    $encryption_key = openssl_digest(php_uname(),'MD5', TRUE);
    $encryption = openssl_encrypt($data,$ciphering,$encryption_key,$option,$encryption_iv);
    return $encryption; }

  function decryptData($data) {
    $ciphering = "BF-CBC";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $option = 0;
    $encryption_iv = "18161100";
    $encryption_key = openssl_digest(php_uname(),'MD5', TRUE);
    $decryption = openssl_decrypt($data,$ciphering,$encryption_key,$option,$encryption_iv);
    return $decryption;}
?>