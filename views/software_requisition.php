<!DOCTYPE html>
<html lang="en">

<?php include(__DIR__ . "/layout/head.php") ?>

<body>
  <?php include(__DIR__ . "/layout/navBar.php") ?>
  <form>
    <!-- Início nome do software -->
    <div class="form-group col-sm">
      <label for="software-name">Nome do software</label>
      <input type="text" class="form-control" id="software-name" name="software-name" placeholder="Insira o nome do software requisitado" required>
    </div>
    <!-- Fim nome do software -->
    <!-- Início link do software -->
    <div class="form-group col-sm">
      <label for="software-link">Link do software</label>
      <input type="text" class="form-control" id="software-link" name="software-link" placeholder="Insira o link do software" required>
    </div>
    <!-- Fim link do software -->
    <!-- Início lista de labs -->
    <div class="form-group col-sm">
      <label>Laboratórios</label>
      <br>

      <?php
      for ($i = 1; $i <= 16; $i++) {
        echo "<br><input class='form-check-input' type='checkbox' value='lab-$i' id='lab-$i'>
        <label class='form-check-label' for='lab-$i'>
          Lab $i
        </label>";
      }
      ?>

    </div>
    <!-- Fim lista de labs -->
    <!-- Início justificativa -->
    <div class="form-group col-sm">
      <label for="software-justification">Justificativa</label>
      <input type="text" class="form-control" id="software-justification" name="software-justification" placeholder="Insira a justificativa da requisição" required>
    </div>
    <!-- Fim justificativa -->
    <!-- Início sistema operacional -->
    <div class="form-group col-sm">
      <label>Sistema Operacional</label>
      <div class="checkbox-group required">
        <br>
        <input class='form-check-input' type='checkbox' value='windows-7' id='windows-7' name="checkbox_name[]">
        <label class='form-check-label' for='windows-7'> Windows 7</label>
        <br>
        <input class='form-check-input' type='checkbox' value='windows-8' id='windows-8' name="checkbox_name[]">
        <label class='form-check-label' for='windows-8'> Windows 8</label>
        <br>
        <input class='form-check-input' type='checkbox' value='windows-10' id='windows-10' name="checkbox_name[]">
        <label class='form-check-label' for='windows-10'> Windows 10</label>
        <br>
        <input class='form-check-input' type='checkbox' value='linux' id='linux' name="checkbox_name[]">
        <label class='form-check-label' for='linux'> Linux</label>
        <br>
        <input class='form-check-input' type='checkbox' value='macos' id='macos' name="checkbox_name[]">
        <label class='form-check-label' for='macos'> MacOS</label>
      </div>
    </div>
    <!-- Fim sistema operacional -->

    <!-- Início dependências -->
    <div class="form-group col-sm">
      <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Dependências</label>
      <div class="form-group col-sm">
        <small>Adicione todas as dependências necessárias</small>
      </div>
      <!-- Início nome das dependências -->
      <div class="form-group col-sm">
        <label for="dependence-names">Nome das dependências</label>
        <textarea class="form-control" id="dependence-names" rows="3" placeholder="Insira o nome de todas as dependências, separados por um ;"></textarea>
      </div>
      <!-- Fim nome das dependências -->
      <!-- Início link das dependências -->
      <div class="form-group col-sm">
        <label for="dependence-links">Link das dependências</label>
        <textarea class="form-control" id="dependence-links" rows="3" placeholder="Insira o link de todas as dependências, separados por um ;"></textarea>
      </div>
      <!-- Fim link das dependências -->
    </div>
    <!-- Fim dependências -->

    <button type="submit" class="btn btn-primary check-me-out">Enviar</button>
    <button type="button" class="btn btn-info">Adicionar dependência</button>
  </form>
  <?php include("./layout/scripts.php") ?>
  <script>
    if (!$('div.checkbox-group.required :checkbox:checked').length > 0)
      alert("Deve selecionar ao menos um sistema operacional");
  </script>
</body>

</html>