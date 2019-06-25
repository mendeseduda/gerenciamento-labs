<?php


  function isAdmin() {
    return false;
  }
  function getSoftwareList()
  { 
    $list = [
      [
        "nome" => 11,
        "programas" => [
          [
            "nome_software" => "Visual Studio Code",
            "versao"=> "4.3.1",
            "data_instalaçao"=> "2019-06-21",
            "data_expiracao_licenca"=> "2021-06-21"
          ],[
            "nome_software" => "Visual Studio",
            "versao"=> "2.0.0",
            "data_instalaçao"=> "2017-01-01",
            "data_expiracao_licenca"=> "2021-06-21"
          ],[
            "nome_software" => "Fire fox",
            "versao" => "900.1",
            "data_instalaçao" => "2019-06-21",
            "data_expiracao_licenca" => ""
          ]
        ]
          ], [
            "nome" => 12,
            "programas" => [
              [
                "nome_software" => "Minecraf",
                "versao"=> "4.3.1",
                "data_instalaçao"=> "2012-09-12",
                "data_expiracao_licenca"=> "2019-06-21"
              ]
            ]
          ]
    ];

    return $list;
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<?php include(__DIR__ . "/layout/head.php")?>
<body>
<?php include(__DIR__ . "/layout/navBar.php")?>
<h4>Lista de softwares por laboratorio</h4>
<p>Nome: </p>
<div id="lista-softwares">
<?php
  $list = getSoftwareList();
  foreach ($list as $lab) {

    echo '<div class="card">';
    echo ' <div class="card-body">';
    echo "<h5>Laboratorio ".$lab['nome']."</h5>";
    foreach ($lab["programas"] as $programa) {
      echo "<p>Nome: ".$programa["nome_software"]."</p>";
      echo "<p>Versao: ".$programa["versao"]."</p>";
      echo "<p>Data de instalacao: ".date("d/m/Y", strtotime($programa["data_instalaçao"]))."</p>";
      if(isAdmin()){
        echo "<p> Data de expiracao da licenca: ".date("d/m/Y", strtotime($programa["data_expiracao_licenca"]))."</p>";
        }
    }
    echo '  </div>';
    echo '</div>';
    echo '<br>';
  }
?>
</div>
</body>
</html>