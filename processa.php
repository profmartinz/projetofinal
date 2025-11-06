<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Dados Recebidos</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <main class="container resultado">

    <?php
    //=========================================================
    // 1. VERIFICA SE O FORMULÁRIO FOI ENVIADO CORRETAMENTE
    //=========================================================
    // O PHP preenche a variável superglobal $_SERVER["REQUEST_METHOD"]
    // com o método usado no envio (GET ou POST).
    // Aqui, só permitimos que o código rode se o método for "POST".
    // Isso impede que alguém tente acessar esta página diretamente pela URL.
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

      //=======================================================
      // 2. INCLUI O ARQUIVO DE CONEXÃO COM O BANCO
      //=======================================================
      // O "include" traz o conteúdo do arquivo conexao.php,
      // permitindo que usemos a variável $conexao já conectada ao MySQL.
      include("conexao.php");


      //=======================================================
      // 3. CAPTURA OS DADOS ENVIADOS PELO FORMULÁRIO HTML
      //=======================================================
      // O array $_POST armazena os valores enviados pelos campos do formulário.
      // A função trim() remove espaços extras no início e fim do texto.
      // O operador ?? '' evita erros caso o campo não exista.
      $nome = trim($_POST["nome"] ?? '');
      $email = trim($_POST["email"] ?? '');
      $whatsapp = trim($_POST["whatsapp"] ?? '');


      //=======================================================
      // 4. MONTA O COMANDO SQL PARA INSERIR OS DADOS NO BANCO
      //=======================================================
      // O comando INSERT INTO adiciona uma nova linha na tabela "leads"
      // com os valores digitados pelo usuário.
      $sql = "INSERT INTO leads (nome, email, whatsapp)
              VALUES ('$nome', '$email', '$whatsapp')";


      //=======================================================
      // 5. EXECUTA O COMANDO SQL E VERIFICA SE DEU CERTO
      //=======================================================
      // A função $conexao->query() envia o comando para o MySQL.
      // Se retornar TRUE, significa que o dado foi salvo com sucesso.
      if ($conexao->query($sql) === TRUE) {
        // Mensagens exibidas na tela confirmando o sucesso
        echo "<h1>✅ Cadastro realizado com sucesso!</h1>";
        echo "<p><strong>Nome:</strong> $nome</p>";
        echo "<p><strong>E-mail:</strong> $email</p>";
        echo "<p><strong>WhatsApp:</strong> $whatsapp</p>";
        echo "<p>Em breve você receberá o link do seu e-book por e-mail 📩</p>";
      } else {
        // Caso ocorra algum erro ao salvar, mostramos a mensagem de erro
        echo "<h1>❌ Erro ao salvar!</h1>";
        echo "<p>Erro: " . $conexao->error . "</p>";
      }


      //=======================================================
      // 6. FECHA A CONEXÃO COM O BANCO DE DADOS
      //=======================================================
      // Sempre importante encerrar a conexão após o uso.
      $conexao->close();
    } else {
      //=======================================================
      // 7. BLOQUEIA ACESSOS DIRETOS SEM ENVIO DE FORMULÁRIO
      //=======================================================
      // Caso o usuário tente abrir o processa.php direto pela URL
      // sem passar pelo formulário, aparece esta mensagem:
      echo "<h1>⚠️ Acesso inválido!</h1>";
      echo "<p>Por favor, envie o formulário corretamente pela página principal.</p>";
    }
    ?>
  </main>

  <footer>
    <p>Todos os direitos reservados</p>
  </footer>
</body>

</html>