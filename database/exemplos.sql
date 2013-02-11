-- EXEMPLOS DE INSERÇÕES NA BASE DE DADOS

-- Campo status (tabelas usuarios, clientes e atendimentos):
-- 0 = Ativo
-- 1 = Inativo

-- Campo prioridade (tabela atendimentos):
-- 0 = Baixa
-- 1 = Média
-- 2 = Alta

-- EMPRESAS

INSERT INTO empresas (nome, razao_social) VALUES ('Inta', 'Educação');
INSERT INTO empresas (nome, razao_social) VALUES ('ACME', 'Animação');
INSERT INTO empresas (nome, razao_social) VALUES ('Cyberdyne', 'Robótica');
INSERT INTO empresas (nome, razao_social) VALUES ('Stark', 'Armas');
INSERT INTO empresas (nome, razao_social) VALUES ('Umbrella', 'Farmacêutica');
INSERT INTO empresas (nome, razao_social) VALUES ('Wonka', 'Chocolates');

-- USUARIOS

INSERT INTO usuarios (nome, matricula, status, empresa_id) VALUES ('Willy Wonka', 'mat123', '0', '6');
INSERT INTO usuarios (nome, matricula, status, empresa_id) VALUES ('John Connor', 'mat666', '0', '3');
INSERT INTO usuarios (nome, matricula, status, empresa_id) VALUES ('Sarah Connor', 'mat643', '1', '3');
INSERT INTO usuarios (nome, matricula, status, empresa_id) VALUES ('Tony Stark', 'mat999', '0', '4');
INSERT INTO usuarios (nome, matricula, status, empresa_id) VALUES ('Doutor Oscar', 'mat987', '0', '1');
INSERT INTO usuarios (nome, matricula, status, empresa_id) VALUES ('Chuck Jones', 'mat435', '1', '2');
INSERT INTO usuarios (nome, matricula, status, empresa_id) VALUES ('Chris Redfield', 'mat237', '0', '5');

-- CLIENTES

INSERT INTO clientes (nome, matricula, status, data_cadastro, email, telefone1, empresa_id) VALUES ('Charlie Chaplin', 'mat123', '0', NOW(), 'email@email.com', '55883552', '2');
INSERT INTO clientes (nome, matricula, status, data_cadastro, email, telefone1, empresa_id) VALUES ('Stanley Kubrick', 'mat642', '1', NOW(), 'email@email.com', '55883563', '3');
INSERT INTO clientes (nome, matricula, status, data_cadastro, email, telefone1, empresa_id) VALUES ('Neil Gaiman', 'mat636', '0', NOW(), 'email@email.com', '55887549', '4');
INSERT INTO clientes (nome, matricula, status, data_cadastro, email, telefone1, empresa_id) VALUES ('Alan Turing', 'mat690', '1', NOW(), 'email@email.com', '55886969', '6');
INSERT INTO clientes (nome, matricula, status, data_cadastro, email, telefone1, empresa_id) VALUES ('Gordon Freeman', 'mat567', '0', NOW(), 'email@email.com', '55881234', '5');
INSERT INTO clientes (nome, matricula, status, data_cadastro, email, telefone1, empresa_id) VALUES ('Ozzy Osbourne', 'mat666', '1', NOW(), 'email@email.com', '55886666', '1');

-- CATEGORIAS

INSERT INTO categorias (descricao) VALUES ('Unimestre');
INSERT INTO categorias (descricao) VALUES ('Pagamento');
INSERT INTO categorias (descricao) VALUES ('Avaliação');
INSERT INTO categorias (descricao) VALUES ('Sugestão');
INSERT INTO categorias (descricao) VALUES ('Horário de verão');
INSERT INTO categorias (descricao) VALUES ('Calendário Acadêmico');

-- ATENDIMENTOS

INSERT INTO atendimentos (protocolo, data_hora, status, prioridade, plano_atendimento, observacoes, nota, empresa_id, usuario_id, cliente_id, categoria_id) VALUES ('proto-123', NOW(), '0', '2', 'Meu plano', 'Minhas observações', 'Minha nota', '1', '1', '1', '1');