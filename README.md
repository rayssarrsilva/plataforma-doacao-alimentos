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

