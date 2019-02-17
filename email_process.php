<?php

include('PHPMailer/PHPMailerAutoload.php');
include('PHPMailer/class.phpmailer.php');
include('PHPMailer/class.smtp.php');


$nome=utf8_decode($_POST['nome']);
$telefone=$_POST['telefone'];
$email=$_POST['email'];
$decoracao=utf8_decode($_POST['decoracao']);
$locacao=utf8_decode($_POST['locacao']);
$brinquedos=utf8_decode($_POST['brinquedos']);
$mensagem=utf8_decode($_POST['mensagem']);

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = '************************';
$mail->SMTPAuth = true;
$mail->Username = 'contato@locfestasnit.com.br';
$mail->Password = '************************';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;


$mail->setFrom('$email', 'Teste');
$mail->addReplyTo('contato@locfestasnit.com.br', 'Loc Festas');


#$mail->addAttachment('local_do_anexo/arquivo.extenção', 'NomeAmigavel.extenção');

$mail->isHTML(true);
$mail->Subject = "Formulario de Contato - Site Loc Festas - $nome";
$mail->Body = "<strong>Nome:</strong> $nome<br /><br /> <strong>Telefone:</strong> $telefone<br /><br /> <strong>E-mail:</strong> $email<br /><br /> <strong>Decoracao:</strong> $decoracao<br /><br /> <strong>Locacao:</strong> $locacao<br /><br /> <strong>Brinquedos:</strong> $brinquedos<br /><br /> <strong>Mensagem:</strong> $mensagem";
$mail->AltBody = 'Conteúdo alternativo (em texto simples), caso destinatário não possa receber em HTML';

$mail->addAddress('contato@locfestasnit.com.br');

if(!$mail->send()) {
echo "<script>alert('Erro ao enviar mensagem');</script>";
} else {
echo "<script>alert('Mensagem enviada com sucesso!');</script>"; 
}

?>