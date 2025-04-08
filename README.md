# 🥫 Plataforma de Doações de Alimentos

Sistema web desenvolvido em PHP com banco de dados MySQL (phpMyAdmin) para conectar doadores de alimentos a instituições de caridade. Doadores podem registrar doações, e instituições podem solicitar a retirada desses alimentos.

## 👥 Desenvolvedores
- **Rayssa**
- **Mateus**

## 📌 Funcionalidades
- ✅ Registro e login de doadores
- ✅ Registro e login de instituições
- ✅ Cadastro de produtos para doação (por doador logado)
- ✅ Registro de solicitações de retirada (por instituição logada)
- ✅ Doadores podem **aceitar ou recusar** solicitações feitas aos seus produtos
- ✅ Listagem pública de produtos **disponíveis** para doação
- ✅ Painel exclusivo para cada tipo de usuário
- ✅ Controle de status das solicitações: `pendente`, `aceito`, `recusado`

Versão atual: v2.0
→ Inclui controle de login, sistema de produtos, painel de usuários e controle de status.

🖥️ Como Executar o Projeto Localmente

1- Instale o XAMPP (ou Laragon/WAMP):
2- Coloque o projeto na pasta htdocs
3- Caminho típico: C:\xampp\htdocs\plataforma-doacoes-alimentos
4- Inicie os serviços Apache e MySQL no painel do XAMPP
5- Acesse o phpMyAdmin: http://localhost/phpmyadmin
5- Crie um banco de dados com o nome: doacoes_db
6- Copie o código sql fornecido abaixo para criar as tabelas.
7- Acesse o sistema no navegador
Exemplo de URL:
http://localhost/plataforma-doacoes-alimentos/forms/doadores_form.php

## 🗃️ Estrutura do Banco de Dados

Crie as tabelas utilizando o script abaixo no phpMyAdmin:

```sql
## 🗃️ Estrutura do Banco de Dados (SQL)

```sql
CREATE TABLE doadores ( 
 id INT AUTO_INCREMENT PRIMARY KEY, 
 nome VARCHAR(100) NOT NULL, 
 email VARCHAR(100) UNIQUE NOT NULL,
 senha VARCHAR(255) NOT NULL
); 

CREATE TABLE instituicoes ( 
 id INT AUTO_INCREMENT PRIMARY KEY, 
 nome VARCHAR(150) NOT NULL, 
 endereco VARCHAR(255),
 email VARCHAR(255) UNIQUE,
 senha VARCHAR(255)
); 

CREATE TABLE produtos (
 id INT AUTO_INCREMENT PRIMARY KEY,
 doador_id INT,
 nome_produto VARCHAR(255),
 FOREIGN KEY (doador_id) REFERENCES doadores(id) ON DELETE CASCADE
);

CREATE TABLE doacoes ( 
 id INT AUTO_INCREMENT PRIMARY KEY, 
 doador_id INT, 
 instituicao_id INT, 
 produto_id INT,
 data_doacao DATE NOT NULL,
 status VARCHAR(20) DEFAULT 'pendente',
 FOREIGN KEY (doador_id) REFERENCES doadores(id),
 FOREIGN KEY (instituicao_id) REFERENCES instituicoes(id),
 FOREIGN KEY (produto_id) REFERENCES produtos(id)
);



