<!DOCTYPE html>
<html lang="ptbr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticação com reCaptcha via Google</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
}

p {
    text-align: center;
}

form {
    max-width: 400px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.captcha-container {
    text-align: center;
    margin-bottom: 20px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

#dica {
    color: white;
    text-align: center;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#dica:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>
    <h1>Página simples para teste de cadastro.</h1>
    <p>Insira os dados para adentrar o sistema</p>
    <br>
    <form action="recebe.php" method="post" id="formulario" novalidate>
            <label for="user">Usuário</label><br>
            <input type="text" id="user" name="user" required><br><br>
            <label for="pass">Senha</label><br>
            <input type="password" id="pass" name="pass" required><br><br>
            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
            <div class="captcha-container">
                <div class="g-recaptcha" data-sitekey="6LfvadgpAAAAAHLGAe6AKpSvQu7J16bHRblZv7zx"></div><br>
            </div>
        <input type="submit" value= "Enviar">
    </form>
    <p>Para uma dica, mova o mouse abaixo dessa mensagem</p>
    <p id="dica">O login é "pato" e a senha é "quack"</p>
</body>
</html>