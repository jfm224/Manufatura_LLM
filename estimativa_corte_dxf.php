<!-- estimativa_corte_dxf.php - Formulário e execução do cálculo -->
<form method="post" enctype="multipart/form-data">
  Envie o arquivo DXF: <input type="file" name="arquivo_dxf">
  <input type="submit" value="Calcular Custo">
</form>
<?php
if ($_FILES) {
  $arquivo = $_FILES['arquivo_dxf']['tmp_name'];
  $output = shell_exec("python3 laser_custo.py " . escapeshellarg($arquivo));
  echo "Comprimento total: " . $output . " mm";
}
?>