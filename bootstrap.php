<?php
session_start(); require_once __DIR__.'/config.php';
function e(?string $value): string{return htmlspecialchars($value??'',ENT_QUOTES,'UTF-8');}
function csrf_token(): string{if(empty($_SESSION['csrf_token']))$_SESSION['csrf_token']=bin2hex(random_bytes(32));return $_SESSION['csrf_token'];}
function verify_csrf():void{$token=$_POST['csrf_token']??'';if(!$token||!hash_equals($_SESSION['csrf_token']??'',$token)){http_response_code(419);die('CSRF token tidak valid. Silakan kembali dan coba lagi.');}}
function flash(string $type,string $message):void{$_SESSION['flash']=['type'=>$type,'message'=>$message];}
function get_flash():?array{$flash=$_SESSION['flash']??null;unset($_SESSION['flash']);return $flash;}
