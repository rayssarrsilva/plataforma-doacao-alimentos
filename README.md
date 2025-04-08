# 🥫 Plataforma de Doações de Alimentos

Sistema web desenvolvido em PHP com banco de dados MySQL (phpMyAdmin) para conectar doadores de alimentos a instituições de caridade. Doadores podem registrar doações, e instituições podem solicitar a retirada desses alimentos.

## 👥 Desenvolvedores
- **Rayssa**
- **Mateus**

## 📌 Funcionalidades
- Cadastro de doadores
- Cadastro de instituições
- Registro de doações associadas a doadores e instituições
- Listagem de doações
- Listagem de instituições e doadores
- Solicitação de retirada por parte das instituições (em desenvolvimento)

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
CREATE TABLE doadores ( 
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR(100) NOT NULL, 
    email VARCHAR(100) UNIQUE NOT NULL 
); 
 
CREATE TABLE instituicoes ( 
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR(150) NOT NULL, 
    endereco VARCHAR(255) NOT NULL 
); 
 
CREATE TABLE doacoes ( 
    id INT AUTO_INCREMENT PRIMARY KEY, 
    doador_id INT, 
    instituicao_id INT, 
    descricao TEXT NOT NULL, 
    data_doacao DATE NOT NULL, 
    FOREIGN KEY (doador_id) REFERENCES doadores(id), 
    FOREIGN KEY (instituicao_id) REFERENCES instituicoes(id) 
);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doador_id INT,
    nome_produto VARCHAR(255),
    FOREIGN KEY (doador_id) REFERENCES doadores(id) ON DELETE CASCADE
);

ALTER TABLE doacoes ADD COLUMN produto_id INT, ADD FOREIGN KEY (produto_id) REFERENCES produtos(id);

ALTER TABLE doadores 
    ADD COLUMN senha VARCHAR(255) AFTER email;

ALTER TABLE instituicoes 
    ADD COLUMN email VARCHAR(255),
    ADD COLUMN senha VARCHAR(255);


