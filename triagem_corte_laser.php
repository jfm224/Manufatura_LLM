
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pré-Triagem Corte a Laser</title>
</head>
<body>
    <h2>Pré-Triagem de Corte a Laser</h2>
    <form method="POST">
        <label>Material:</label>
        <select name="material">
            <option value="Alumínio">Alumínio</option>
            <option value="Aço chapa preta">Aço chapa preta</option>
            <option value="Aço baixo carbono">Aço baixo carbono</option>
            <option value="Aço inox">Aço inox</option>
        </select><br><br>

        <label>Espessura (mm):</label>
        <input type="number" step="0.1" name="espessura"><br><br>

        <label>Potência disponível (kW):</label>
        <input type="number" step="0.1" name="potencia"><br><br>

        <label>Tolerância desejada (mm):</label>
        <input type="number" step="0.01" name="tolerancia"><br><br>

        <input type="submit" value="Verificar Viabilidade">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $material = escapeshellarg($_POST["material"]);
    $espessura = escapeshellarg($_POST["espessura"]);
    $potencia = escapeshellarg($_POST["potencia"]);
    $tolerancia = escapeshellarg($_POST["tolerancia"]);

    $cmd = escapeshellcmd("python3 /usr/local/www/inferencia_corte_laser.py $material $espessura $potencia $tolerancia");
    $output = shell_exec($cmd);

    echo "<pre><strong>Resultado da Inferência:</strong><br>$output</pre>";
}
?>
</body>
</html>
