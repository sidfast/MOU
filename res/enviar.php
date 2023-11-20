<?php

$nome = addslashes($_POST['nome']);
$email = addslashes($_POST['email']);
$fone = addslashes($_POST['fone']);
$mensagem = addslashes($_POST['mensagem']);

if( isset($nome) && isset($email) &&  isset($fone) && isset($mensagem) &&
  !empty($nome) && !empty($email) && !empty($fone) && !empty($mensagem)) 
{
    $para = 'admin@reidomicroondas.com.br';
    $assunto = 'Nova mensagem de contato ('.$nome.')'; 
    $corpo = "Nome: " .$nome. "\r\n".
             "Email: " .$email."\r\n".
             "Fone: " .$fone. "\r\n".
             "Mensagem: ". $mensagem;
    $cabecalho = "From:contato@reidomicroondas.com.br"."\r\n".
                 "Reply-To:".$email."\r\n".
                 "X=Mailer:PHP/".phpversion();
    if(mail($para, $assunto, $mensagem, $cabecalho)){
        echo ('Email enviado com sucesso');
    }
    else {
        echo ('O email não pode ser enviado');
    }
} 
else {
    echo ('Todos os campos precisam ser preenchidos antes de enviar');
}