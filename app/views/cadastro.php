<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet"  type="text/css" href="../../public/css/cadastro.css">
    </head>
    <body>
        <header>
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <h1>NoobDiario</h1> 
                    <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link active " href="http://localhost:8080/login" id="sair" >Login</a>                       
                        </div>
                    </div>
                </nav>            
            </div>
        </header>
        <hr>
        <br>
        
        <section class="content">
            <div class="cadastro">
                
                <form class="form" method="POST" action="/cadastro">

                    <a>Nome:</a>
                    <!-- o name server para o array visualizar o nome da variável enviado pelo imput -->
                    <input class="field" name="nome"  placeholder="Nome">
                    <br>
                    <a>E-mail:</a>
                    <input class="field" name="email" placeholder="E-mail">
                    <br>
                    <a>Senha:</a>
                    <input class="field" name="senha" placeholder="Senha">    
                        <!-- não precisa colocar NAME no botão, se não você vai enviar essa informação no formulario -->
                        <button class="botao" type="submit">Cadastrar</button> 
                    
                          
                </form>
            </div>
        </section>
<?php