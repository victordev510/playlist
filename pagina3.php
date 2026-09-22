<?php
session_start();

$musicas = array(
    "veigh" => array(
        "Novo Balanço",
        "Engana Dizendo Que Ama",
        "Clickbait",
        "Perdoa Por Tudo",
        "Artista Genérico",
        "Jeito Bandido",
        "Vida Chique",
        "Mandrake",
        "Meio Pá"
    ),

    "thiaguinho" => array(
        "Deixa Tudo Como Tá",
        "Ainda Bem",
        "Caraca, Muleke!",
        "Falta Você",
        "Ousadia & Alegria",
        "Energia Surreal",
        "Sou o Cara Pra Você",
        "Desencana",
        "Vamo Que Vamo"
    ),

    "luan santana" => array(
        "Meteoro",
        "Te Vivo",
        "Morena",
        "Acordando o Prédio",
        "Escreve Aí",
        "Cê Topa",
        "Tudo Que Você Quiser",
        "Quando a Bad Bater",
        "Abalo Emocional"
    )
);


// Cria a playlist caso ela ainda não exista
if (!isset($_SESSION["playlist"])) {
    $_SESSION["playlist"] = array();
}


// Escolher artista
if (isset($_POST["artista"]) && !isset($_POST["musica"])) {
    $_SESSION["artista"] = $_POST["artista"];
}


// Adicionar música
if (isset($_POST["musica"]) && isset($_POST["artista"])) {

    $artista = $_POST["artista"];
    $musica = $_POST["musica"];

    $_SESSION["playlist"][] = array(
        "artista" => $artista,
        "musica" => $musica
    );

    $_SESSION["artista"] = $artista;
}


// Deletar música
if (isset($_POST["deletar"])) {

    $indice = $_POST["deletar"];

    if (isset($_SESSION["playlist"][$indice])) {

        unset($_SESSION["playlist"][$indice]);

        // Reorganiza os índices
        $_SESSION["playlist"] = array_values($_SESSION["playlist"]);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Playlist</title>
    <link rel="stylesheet" href="estilo.css">

</head>

<body>
    <div class="geral">
        <div class="bloco2">

            <h1 class="titulo1">Playlist</h1>

            <h2>Selecione o artista/banda</h2>

            <form method="POST">

                <select name="artista">

                    <option value="veigh">Veigh</option>

                    <option value="thiaguinho">Thiaguinho</option>

                    <option value="luan santana">Luan Santana</option>

                </select>

                <button type="submit" class="enviar">
                    Enviar
                </button>

            </form>


            <?php

            if (isset($_SESSION["artista"])) {

                $artista = $_SESSION["artista"];

                echo "<hr>";


                if ($artista == "veigh") {

                    echo "<h2>Veigh</h2>";

                    echo "<p>
                        Veigh é um dos principais nomes da música urbana brasileira.
                    </p>";

                } 
                
                elseif ($artista == "thiaguinho") {

                    echo "<h2>Thiaguinho</h2>";

                    echo "<p>
                        Thiaguinho é um dos principais nomes do pagode brasileiro.
                    </p>";

                } 
                
                elseif ($artista == "luan santana") {

                    echo "<h2>Luan Santana</h2>";

                    echo "<p>
                        Luan Santana é um dos grandes nomes do sertanejo brasileiro.
                    </p>";
                }

            ?>


                <h2>Músicas do artista:</h2>


                <form method="POST">

                    <input 
                        type="hidden" 
                        name="artista" 
                        value="<?php echo $artista; ?>"
                    >


                    <select name="musica">

                        <?php

                        foreach ($musicas[$artista] as $musica) {

                            echo "<option value=\"$musica\">
                                $musica
                            </option>";
                        }

                        ?>

                    </select>


                    <br><br>


                    <button type="submit">
                        Adicionar para a PlayList
                    </button>

                </form>


            <?php } ?>


            <?php

            if (count($_SESSION["playlist"]) > 0) {

                echo "<hr>";

                echo "<h2>Minha Playlist:</h2>";

                echo "<ol>";


                foreach ($_SESSION["playlist"] as $indice => $item) {

                    echo "<li>";

                    echo $item["artista"] . " - " . $item["musica"];


                    // Botão para deletar a música
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


                echo "</ol>";
            }

            ?>
        <a href="pagina4.php"><br><input type = "submit" class="enviar"></a>
        </div>

    </div>
</body>

</html>
