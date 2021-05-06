<?php
  $coches = [
    'Seat' => ['Ibiza','Leon','Arona'],
    'Volvo' => ['a','b','c'],
    'Mercedes' => ['1','2','3']
  ];

  if (isset($_POST['enviar'])) {
    $marca = $_POST['marca'];
  }

  if (isset($_POST['actualizar'])) {
    //print_r($_POST);
    foreach ($_POST as $key => $value) {
      if ($key!='actualizar'&&$key!=$value) {
        echo "Se ha actualizado ".$key." por ".$value;echo "</br>";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Busca tu coche</h1>
    <hr>
    <form action="" method="post">
      <label for="marca">Marca: </label>
      <select name="marca">
        <?php foreach ($coches as $key => $value): ?>
          <?php if (isset($marca)): ?>
            <?php if ($marca==$key): ?>
                <option value="<?=$key?>" selected><?=$key?></option>
              <?php else: ?>
                <option value="<?=$key?>"><?=$key?></option>
            <?php endif; ?>
          <?php else: ?>
            <option value="<?=$key?>"><?=$key?></option>
          <?php endif; ?>
        <?php endforeach; ?>
      </select>
      <br>
      <input type="submit" name="enviar" value="Buscar">
    </form>
    <hr>
    <?php if (isset($_POST['enviar'])): ?>
      <form action="" method="post">
        <table>
          <tr>
            <th>Coche</th>
          </tr>
          <?php foreach ($coches[$marca] as $key => $value): ?>
            <tr>
              <td>
                <input type="text" name="<?=$value?>" value="<?=$value?>">
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
        <input type="submit" name="actualizar" value="Actualizar">
      </form>
    <?php endif; ?>
  </body>
</html>
