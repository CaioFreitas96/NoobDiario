create database NoobDiario;
use NoobDiario;

create table login(
id int (2) not null primary key auto_increment,
nome varchar(50) not null,
email varchar(50) not null,
senha varchar(20) not null
);

									-- datatime data e hora do sistema operacional do computador 
                                    -- no qual a instância do SQL Server é executada.
create table diario(
anotacao varchar(300),
dia datetime,
nome_login varchar(50)             
);




