<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

        $url = "https://swapi.dev/api/people?page=2";

        // iniciar o curl
        $ch = curl_init($url);
        
        // converta para ler true para nao deixar em uma unica string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // TIPO de metodo
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        
        // atribui para a variavel resultado, para ler precisa do json, executar o curl, 
        $resultado = json_decode(curl_exec($ch));

        // exibe o que foi pego
        // var_dump($resultado);
        
        foreach($resultado->results as $ator){
            
            echo 'nome '. $ator->name . '<br>';
            echo 'nome '. $ator->height . '<br>';
            echo '<hr>';
            foreach($ator->filmes as $filme){
                echo 'filmes '.$filme.'<br>';
            }
        }
    ?>
</body>
</html>