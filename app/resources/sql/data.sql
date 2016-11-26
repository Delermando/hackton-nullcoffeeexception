create table usuario (
	id_usu serial primary key,
	nome varchar(50),
	senha varchar(50),
	email varchar(50),
	reputacao int
)

create table enderecos(
	id_end serial primary key,
	prioridade int,
	logradouro varchar(),
	numero varchar(),
	bairro varchar(),
	cidade varchar()
)

create table denuncias(
	id_den serial primary key,
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
	id_aleusu serial primary key,
	id_usuario int foreign key references usuario(id_usu),
	id_alerta int foreign key references alertas(id_ale),
	ultima_verificacao date time
)
