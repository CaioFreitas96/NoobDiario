<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet"  type="text/css" href="../../public/css/diario.css">
    </head>
    <body>
        <header>
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <h1>Dailybook</h1> 
                    <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link active " href="http://localhost:8080/login" id="sair" >Sair</a>                       
                        </div>
                    </div>
                </nav>            
            </div>
        </header>
        <hr>
        <br>
        <section class="content">
            <div class="Anotacao">
                <h6>Anotação</h6>
                <form class="form" method="POST" action="http://localhost:8080/anotacao">
                    <input class="field" name="anotacao" placeholder="O que quer anotar ?">    
                    <div class="bt">
                        <input class="botao" type="submit" name="botao" value="Enviar"> 
                    </div>      
                </form>
            </div>
        </section>
<?php


//echo $anotacao;
foreach($anotacao as $anota){
echo " 
<section class='content'>
    <div class='Anotacao'>
        <h6><b>Anotação:  </b></h6>"
        . $anota['dia'] . "
        <table border width='100%' height='15% align='center'>
            <tr>
                <td align='center'> <br>" . $anota['anotacao'] . "</br><br></td>
            </tr>
        </table>
    </div>
</section>";
}

?>