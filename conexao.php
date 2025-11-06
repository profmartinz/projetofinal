<?php
// ============================================================
// 1. CONFIGURAÇÕES BÁSICAS DO BANCO DE DADOS
// ============================================================

// O nome do servidor onde o banco de dados está rodando.
// Quando usamos o XAMPP localmente, o servidor é sempre "localhost".
$servidor = "localhost";

// O nome do usuário que acessa o MySQL.
// No XAMPP, o usuário padrão é "root".
$usuario = "root";

// A senha do usuário do MySQL.
// Por padrão, o XAMPP vem sem senha (campo vazio).
$senha = "";

// O nome do banco de dados que você criou no phpMyAdmin.
// No nosso projeto, chamamos ele de "cadastro_ebook".
$banco = "cadastro_ebook";


// ============================================================
// 2. CRIANDO A CONEXÃO COM O BANCO
// ============================================================
// Aqui usamos a classe mysqli (MySQL Improved) para criar a conexão.
// Passamos como parâmetros: servidor, usuário, senha e nome do banco.
$conexao = new mysqli($servidor, $usuario, $senha, $banco);


// ============================================================
// 3. VERIFICANDO SE A CONEXÃO FUNCIONOU
// ============================================================
// Se houver algum problema na conexão (ex: nome errado do banco, MySQL desligado),
// a propriedade "connect_error" será preenchida.
// Nesse caso, usamos die() para interromper a execução e mostrar o erro na tela.
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// Se não houver erros, a conexão é mantida aberta normalmente.
// Outros arquivos (como processa.php e listar.php) poderão incluir este arquivo
// e usar a variável $conexao para enviar comandos SQL ao banco.
