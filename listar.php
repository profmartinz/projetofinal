<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Cadastros</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container resultado">
        <h1>📋 Cadastros realizados</h1>

        <?php
        //=====================================================
        // 1. CONEXÃO COM O BANCO DE DADOS
        //=====================================================
        // O comando include() insere aqui o conteúdo do arquivo conexao.php,
        // que contém as informações de conexão com o MySQL (servidor, usuário, senha, banco)
        // e cria a variável $conexao usada para interagir com o banco.
        include("conexao.php");


        //=====================================================
        // 2. EXCLUSÃO DE REGISTROS (DELETE)
        //=====================================================
        // Se o usuário clicar no botão "Excluir", a URL será algo assim:
        // listar.php?excluir=3
        // Nesse caso, a variável $_GET["excluir"] existe e contém o número 3.
        if (isset($_GET["excluir"])) {

            // Captura o valor recebido pela URL e converte para inteiro com intval().
            // Isso impede que alguém envie um texto ou código malicioso.
            $id = intval($_GET["excluir"]);

            // Cria o comando SQL para excluir o registro com o ID informado.
            // DELETE FROM nome_da_tabela WHERE id = valor
            $sql = "DELETE FROM leads WHERE id = $id";

            // Executa o comando SQL no banco de dados.
            // O método query() envia a instrução para o MySQL.
            $conexao->query($sql);

            // Exibe uma mensagem confirmando a exclusão.
            // O texto é exibido apenas na página após o comando ser executado.
            echo "<p class='mensagem-sucesso'>✅ Registro excluído com sucesso!</p>";
        }


        //=====================================================
        // 3. CONSULTA DOS REGISTROS (SELECT)
        //=====================================================
        // Agora, vamos buscar todos os cadastros existentes no banco.
        // O comando SELECT * traz todas as colunas da tabela "leads".
        $dados = $conexao->query("SELECT * FROM leads");


        //=====================================================
        // 4. EXIBIÇÃO DOS RESULTADOS NA TELA
        //=====================================================
        // Verifica se a consulta retornou algum resultado.
        // A propriedade num_rows mostra quantas linhas foram encontradas.
        if ($dados->num_rows > 0) {

            // Enquanto houver registros na tabela, o loop while será executado.
            // A função fetch_assoc() retorna cada linha como um array associativo,
            // ou seja, acessamos os campos pelos nomes das colunas (ex: $linha["nome"]).
            while ($linha = $dados->fetch_assoc()) {

                // Criamos um "cartão" (div) para exibir cada cadastro na tela.
                echo "<div class='card-cadastro'>";

                // Mostra o nome cadastrado.
                echo "<p>Nome: " . $linha["nome"] . "</p>";

                // Mostra o e-mail cadastrado.
                echo "<p>E-mail: " . $linha["email"] . "</p>";

                // Mostra o número de WhatsApp cadastrado.
                echo "<p>WhatsApp: " . $linha["whatsapp"] . "</p>";

                // Cria um link para excluir o cadastro atual.
                // Quando clicado, a página é recarregada com o ID a ser excluído na URL.
                // Exemplo: listar.php?excluir=5
                // O comando onclick usa "confirm()" para exibir uma caixa de confirmação.
                echo "<a 
                href='listar.php?excluir=" . $linha["id"] . "' 
                class='botao-excluir' 
                onclick='return confirm(\"Tem certeza que deseja excluir?\")'>
                🗑 Excluir
              </a>";

                // Fecha o bloco do cadastro atual.
                echo "</div>";
            }
        } else {
            // Caso o banco esteja vazio, exibe uma mensagem informando que não há dados.
            echo "<p class='mensagem-vazia'>Nenhum cadastro encontrado.</p>";
        }


        //=====================================================
        // 5. FECHAR A CONEXÃO
        //=====================================================
        // Depois que terminamos de usar o banco de dados, é importante fechar a conexão
        // para liberar recursos do servidor.
        $conexao->close();
        ?>

        <!--===================================================
         6. BOTÃO PARA VOLTAR AO MENU PRINCIPAL
         ===================================================-->
        <a href="index.php" class="voltar">⬅ Voltar ao menu</a>
    </main>

    <footer>
        <p>Todos os direitos reservados</p>
    </footer>
</body>

</html>