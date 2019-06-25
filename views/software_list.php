<?php
session_start();

function getSoftwareList()
{
  $json = file_get_contents("../data/softwares.json", "r");
  $list = json_decode($json, true);
  usort($list, function($a, $b) {
    return $a['nome'] - $b['nome'];
});
  return $list;
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include(__DIR__ . "/layout/head.php") ?>

<body>
  <?php include(__DIR__ . "/layout/navBar.php") ?>
  <div class="col">
    <h2 class="d-flex justify-content-center">Lista de softwares por laboratório</h2>
    <br>
    <div id="lista-softwares">
      <?php
      $list = getSoftwareList();
      foreach ($list as $lab) {

        echo '<div class="card">';
        echo ' <div class="card-body">';
        echo "<h5>Laboratório " . $lab['nome'] . "</h5>";
        foreach ($lab["programas"] as $programa) {
          echo "<p>Nome: " . $programa["nome_software"] . "</p>";
          echo "<p>Versão: " . $programa["versao"] . "</p>";
          echo "<p>Data de instalação: " . date("d/m/Y", strtotime($programa["data_instalaçao"])) . "</p>";
          if (isAdmin()) {
            echo "<p> Data de expiração da licença: " . date("d/m/Y", strtotime($programa["data_expiracao_licenca"])) . "</p>";
          }
          echo "<hr/>";
        }
        echo '  </div>';
        echo '</div>';
        echo '<br>';
      }
      ?>
    </div>
  </div>
  <?php include("./layout/scripts.php") ?>
</body>

</html>