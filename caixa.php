<?php
	if(isset($_POST['enviar'])){

		// Acerta o horário caso seu servidor caso esteja com horário diferente do seu fuso horário.
		date_default_timezone_set('America/Sao_Paulo');

		// Define como HTML
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Recebendo os dados passados pela página "form_contato.php"
		$tituloForm	 = utf8_decode("Contato - Leonardo Oliveira");
		$recebeNome	 = utf8_decode($_POST["name"]);
		$assunto	 = utf8_decode($_POST["assunto"]);
		$recebemsg	 = utf8_decode($_POST["msg"]);
		$recebeEmail = $_POST["email"];
		$telefone	 = $_POST["tel"];

		// Faz quebra de linha na mensagem do TextArea
		$msgFormatada = preg_replace("/(\\r)?\\n/i", "<br/>", $recebemsg);
		// Pega IP para motivos de documentação
		$ip = $_SERVER["REMOTE_ADDR"];

		$destinatario = "leocomputa@gmail.com";
		$mensagem ="
			<html>
			<head>
			  <title>".utf8_decode("Formulário de Contato")."</title>
			</head>
				<body>
				<h3><b>".$tituloForm."</b></h3>
				<h3><b>De:</b> ".$recebeNome."<".$recebeEmail."></h3>
				<h3><b>Assunto:</b>Contato do Site </h3>
				<h3><b>Telefone:</b> ".$telefone."</h3>
				<h3><b>Mensagem:</b>
				".$msgFormatada."</h3><br/><br/>
				".date('d/m/Y - H:i')."<br/>
				IP: ".$ip."
				</body>
			</html>
		";

		// Remetente
		$headers .= 'From: '.$recebeNome.' <'.$recebeEmail.'>' . "\r\n";

		$mail = mail($destinatario,"Contato do Site",$mensagem,$headers);

		if($mail!=true){
		echo("<script type='text/javascript'> alert('Problemas no envio de E-mail !\nTente novamente mais tarde.');
			 location.href='contato.html';</script>");
		}else{
		echo("<script type='text/javascript'> alert('E-mail enviado com sucesso !');
			 location.href='contato.html';</script>");
		}
  	}
?>
