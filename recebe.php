<!DOCTYPE html>
<html lang="ptbr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação</title>

    <script>
        <?php
            $user_js = isset($_POST['user']) ? $_POST['user'] : '';
        ?>

        function encaminha() {
            var user = "<?php echo $user_js; ?>"; 
            alert("reCAPTCHA validado e dados de login corretos, amigo " + user + "! Voltando à página de testes!");
            window.location.href = "login.php";
        }

        function voltar() {
            window.history.back();
        }
    </script>
</head>
<body>
<?php
if (isset($_POST['g-recaptcha-response'])) {
    $recaptcha_response = $_POST['g-recaptcha-response'];
    $secret_key = '6LfvadgpAAAAAHa_qMjiHE2D0KuNKf8_jgr8QHfj';
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => $secret_key,
        'response' => $recaptcha_response
    );

    $context = stream_context_create(array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($data)
        )
    ));

    $result = file_get_contents($url, false, $context);
    $result_json = json_decode($result, true);

    if ($result_json['success']) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        
        if (empty($user) || empty($pass)) { 
            echo "Não inserir campos vazios"."<br>"."<br>"."<br>";
            echo "<button onclick='voltar()'>Voltar</button>";
        } 
        else if ($user != "pato" || $pass != "quack") {
            echo "Dados incorretos"."<br>"."<br>"."<br>";
            echo "<button onclick='voltar()'>Voltar</button>";
        } 
        else {
            echo "<script>encaminha();</script>";
        }
    }
    else {
        echo 'Falha ao validar o reCAPTCHA. Verifique se há parafusos nas suas juntas :)';
    }
} 
    else {
        echo 'Erro ao enviar o reCAPTCHA. Sua conexão está ok? :(';
    }
?>
</body>
</html>