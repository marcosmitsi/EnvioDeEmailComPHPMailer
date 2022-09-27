<!--Templete utilizado https://colorlib.com/wp/template/login-form-v8/-->

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Usando Biblioteca PHPMailer</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" name="msg" action="assets/functions/sendEmail.php" method="POST">
					<span class="login100-form-title">
						Enviar Mesagem <br>
						<span class="txt1 p-b-9">
							É rápido e fácil.
						</span>
					</span>

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="nome" id="nome" placeholder="Nome Completo">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="email" name="email" id="email" placeholder="E-mail">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="assunto" id="assunto" placeholder="Assunto da Mensagem">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16">
						<textarea class="input100" id="mensg" name="mensg" rows="10" placeholder="Mensagem"></textarea>

						<span class="focus-input100"></span>
					</div>

					<div class="container-100-form-btn">
						<button class="login100-form-btn" name="SendAddMsg" type="submit" value="Enviar">
							Enviar
						</button>
					</div><br>


				</form>
			</div>
		</div>
	</div>

</body>

</html>