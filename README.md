# NoobDiario

Diario de anotações feito com o framework Noobframework do professsor Edigar

## Requisitos

Nessario ter instalado na sua maquina o PHP8 para usar o servidor embutido e Visual C++.

Configurar o arquivo php.ini habilitando a pasta de extensões e o pdo_mysql para o utilização do PDO

Ter instalado na sua maquina o MySQL e um IDE para MySQL.

## Instalação

Baixe o arquivo zip do projeto, extraia a pasta e abra no seu IDE

Execute o script: "NoobDiario - Script para criar o banco" no seu IDE para MySQL

Crie um novo arquivo php com o nome de "config.php" dentro da pasta config, copie as informações do arquivo config.php.dist e configure da seguinte maneira:

'db' => [

  'drive' => 'mysql',
  
  'host' => 'localhost',
  
  'dbname' => 'NoobDiario',
  
  'user' => '',    //configura de acordo com o user do seu MySQL
  
  'pass' => ''     //configura de acordo com a senha do seu MySQL
],

Inicie o seu servidor PHP na pasta NoobDiario-main digitando: php -S localhost: 8080 router.php

Digite localhost: 8080 / login na url do seu navegado
