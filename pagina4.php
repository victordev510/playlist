<?php
session_start();
 
 
if (isset($_POST["deletar"])) {
 
    $indice = $_POST["deletar"];
 
    if (isset($_SESSION["playlist"][$indice])) {
 
        unset($_SESSION["playlist"][$indice]);
 
        $_SESSION["playlist"] = array_values($_SESSION["playlist"]);

        
    }
}
 
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist Final</title>
    <link rel="stylesheet" herf="estilo.css">
</head>
<body>
    <div class="geral">
       
        <div class="bloco3">
 
            <h2 class="titulo1">Minha Playlist:</h2>
 
            <ol>
 
                <?php
 
                foreach ($_SESSION["playlist"] as $indice => $item) {
 
                    echo "<li>";
 
                    echo $item["artista"] . " - " . $item["musica"];
 
                    echo "
 
                        <form method='POST' style='display:inline;'>
 
                            <button
                                type='submit'
                                name='deletar'
                                value='$indice'
                                class='enviar'
                            >
                                Deletar
                            </button>
 
                        </form>
 
                    ";
 
                    echo "</li>";
                }
 
                ?>
 
            </ol>
 
            <a href="index.php">Voltar para pagina inicial</a>
        </div>
    </div>
</body>
 
</html>