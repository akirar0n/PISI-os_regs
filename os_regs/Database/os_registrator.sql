drop database os_registrator;

create schema if not exists os_registrator default character set utf8;

use os_registrator;


-- CADASTRO E LOGIN USUARIO --
create table if not exists login_user (
	idUser int not null primary key auto_increment,
    tipoUser int not null,
    email varchar(255) not null,
    senha varchar(15) not null,
	nome varchar(100) not null,
    sobrenome varchar(80) not null,
    cpf varchar(11) not null,
    telefone int(11) not null,
    endereco varchar(100) not null
);

-- DADOS DOS EQUIPAMENTOS -- 
create table if not exists equips (
    id_num_os int not null primary key auto_increment,
	modelo varchar(100),
    marca varchar(100),
    serial_number varchar(30),
    obs varchar(200),
    defeito varchar(100),
    os_status varchar(100),
    valor decimal
);

select * from login_user;
select * from equips;

insert into login_user values (null, 1, 'adm1@gmail.com', 'adm123', 'Admin', 'da Silva', '11122233344', 909098888, 'Ceilandia');
insert into login_user values (null, 2, 'client1@gmail.com', 'client123', 'Fulano', 'dos Santos', '12345678910', 950008900, 'Taguatinga');