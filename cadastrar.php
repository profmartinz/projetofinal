<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Baixe seu E-book!</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
</head>
<body>
  <main class="container">
    <h1>📘 Baixe seu E-book gratuito!</h1>
    <p>Preencha seus dados e receba o link no seu e-mail.</p>

    <form action="processa.php" method="post" id="formLead">
      <label for="nome">Nome completo:</label>
      <input type="text" id="nome" name="nome" required>

      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required>

      <label for="whatsapp">WhatsApp:</label>
      <input type="tel" id="whatsapp" name="whatsapp" placeholder="(99) 9 9999-9999" required>

      <button type="submit">Quero receber o e-book!</button>
    </form>
  </main>

  <footer>
    <p>Todos os direitos reservados</p>
  </footer>
</body>
</html>
