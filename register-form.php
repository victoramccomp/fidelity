<?php include('header.php'); ?>

<?php

	$connect = mysqli_connect("localhost", "root", "", "fidelity");
	session_start();

	if(isset($_POST["register"]))
	{
		if(empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["username"]))
		{
			print_r("E-mail e Senha são obrigatórios!");
		}
		else
		{
			$email = mysqli_real_escape_string($connect, $_POST["email"]);
			$username = mysqli_real_escape_string($connect, $_POST["username"]);
			$password = mysqli_real_escape_string($connect, $_POST["password"]);
			$password = md5($password);

			$query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
			
			if(mysqli_query($connect, $query))
			{
				print_r("Cadastro Concluído!");
			}
		}
		
	}
?>

<div class="register">
	<form method="POST">
		
		<div class="form-group">
			<label for="username">Nome</label>
			<input type="text" class="form-control" id="username" name="username" required>
		</div>

		<div class="form-group">
			<label for="email">E-mail</label>
			<input type="email" class="form-control" id ="email" name="email" required>
		</div>

		<div class="form-group">
			<label for="password">Digite sua Senha</label>
			<input type="password" class="form-control" id="password" name="password" required>
		</div>

		<div class="form-group">
			<label for="confirmPassword">Confirme sua Senha</label>
			<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
		</div>

		<button type="submit" name="register" class="btn btn-success">Cadastrar</button>
	</form>
</div>

<?php include('footer.php'); ?>