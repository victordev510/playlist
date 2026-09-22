<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTIFY</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
 
 <?php
            if(isset($_SESSION["mensagem"])){
                echo $_SESSION["mensagem"];
                unset($_SESSION["mensagem"]);
            }else{
                echo "&nbsp;";
            }
            if(isset($_SESSION["playlist"])){
            $playlist = $_SESSION["playlist"];
            }else{
            $playlist = "";
            }
  ?>
    
    <div class="geral">

        <div class="bloco1">

            <h1 class="titulo1">BEM VINDO A LISTIFY</h1>  

            <h3 class="titulo1"> Mais do que Música. 🎶🎧</h3>

        
        
            <form action="pagina3.php" method="POST">
                <table>
                    <tr>
                        <td><label for="">Escolha o Nome da playlist:</label></td>
                        <td><input type="text" name="nome"></td>
                    </tr>
                </table>
        <br>
        <a href="pagina3.php"><br><input type = "submit" class="enviar"></a>
    </div>
   </div>
 
</form>
</body>
</html>