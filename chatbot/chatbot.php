<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $material = $_POST["material"];
    $lote = $_POST["lote"];
    $tolerancia = $_POST["tolerancia"];

    $prompt = "Considere um projeto de manufatura. Com base nas informações iniciais a seguir, indique 3 combinações viáveis de material e processo, priorizando baixo custo e fabricação nacional:\n
    - Material da peça: $material\n
    - Tamanho do lote: $lote unidades\n
    - Tolerância de fabricação: $tolerancia\n
    Apresente a resposta em forma de tabela com: material sugerido, processo recomendado, custo estimado por unidade (faixa), complexidade e comentários.";

    $data = json_encode(["model" => "gemma:2b", "prompt" => $prompt]);

    $ch = curl_init("http://192.168.0.101:11434/api/generate");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $result = curl_exec($ch);
    curl_close($ch);

    $response = json_decode($result, true);
    echo "<pre>" . htmlspecialchars($response["response"]) . "</pre>";
}
?>
