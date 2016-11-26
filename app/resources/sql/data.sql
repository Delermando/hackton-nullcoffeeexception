create table usuario (
	id_usu int primary key,
	nome varchar(),
	senha varchar(),
	email varchar(),
	reputacao int
)

create table enderecos(
	id_end int primary key,
	prioridade int,
	logradouro varchar(),
	numero varchar(),
	bairro varchar(),
	cidade varchar()
)

create table denuncias(
	id_den int primary key,
	status varchar(),
	latitude varchar(),
	longitude varchar(),
	obs text,
	imagem_Path varchar()
)
create table alertas(
	id_ale int,
	nome varchar(),
	intervalo numeric()
)

create table alerta_usuario(
	id_aleusu int primary key,
	id_usuario int foreign key references usuario(id_usu),
	id_alerta int foreign key references alertas(id_ale),
	ultima_verificacao date time
)
