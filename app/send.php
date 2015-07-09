<?php

// Passando os dados obtidos pelo formulário para as variáveis abaixo
$nomeremetente     = $_POST['nomeremetente'];
$emailremetente    = trim($_POST['mail']);
$emaildestinatario = 'paulo.hsilvavieira@hotmail.com'; // Digite seu e-mail aqui, lembrando que o e-mail deve estar em seu servidor web
$telefone      	   = $_POST['tel'];
$mensagem          = $_POST['msg'];
 
 //contato@rm.eti.br
/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '<P>'.$nomeremetente.' te enviou uma mensagem</P>
<p><b>Nome:</b> '.$nomeremetente.'
<p><b>E-Mail:</b> '.$emailremetente.'
<p><b>Telefone:</b> '.$telefone.'
<p><b>Mensagem:</b> '.$mensagem.'</p>
<hr>';


// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $emailremetente\r\n"; // remetente
$headers .= "Return-Path: $emaildestinatario \r\n"; // return-path
$envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers); 
 

?>
