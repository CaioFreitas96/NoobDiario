<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <!-- Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet"  type="text/css" href="../../public/css/login.css">

        </head>
        <body>
            <header>
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                        <h1>NoobDiario</h1> 
                        <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
                            <div class="navbar-nav">
                            </div>
                            <a href="/login">Login &nbsp </a>
                            <a></a>
                            <a href="/cadastro" id="cadastro"> Cadastro </a>
                        </div>
                    </nav>            
                </div>
            </header>
            <hr>
            <br></br>
            <section class="content">
            <div class="login">
                
                <form action="/diario" method="POST">
                    
                    
                    <div class="bm">
                        
                        <br> 
                        <p style="font-size:20px">  Login ou senha invalidos </p>
                        <p style="font-size:20px">  Retornar ao <a href='/login'>Login</a> </p>
                        
                    </div>
                </form>
            </div>        
        </section>
        <?php 
             
            
            
       