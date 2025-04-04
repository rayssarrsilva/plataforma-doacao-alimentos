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
CREATE TABLE solicitacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    instituicao_id INT NOT NULL,
    data_solicitacao DATE NOT NULL,
    observacoes TEXT,
    FOREIGN KEY (instituicao_id) REFERENCES instituicoes(id)
);
