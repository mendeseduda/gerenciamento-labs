<?php
session_start();
if (!$_SESSION["admin"]) {
    header('Location: /gerenciamento-labs/views/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include("./layout/head.php");
?>

<body>
    <?php
    include("./layout/navBar.php");
    ?>

    <?php
    $json = file_get_contents("../data/requisitions.json", "r");
    $requisitions = json_decode($json, true);
    ?>

    <div class="d-flex flex-column justify-content-center align-items-center mt-5">
        <h1>Requisições de Software</h1>
        <br>
        <div id="accordion" style="width: 700px;">
            <div class="w-100 text-right"><a href="/gerenciamento-labs/views/addSoftware.php">Adicionar software</a></div>
            <?php
            if (sizeof($requisitions) > 0)
                foreach ($requisitions as $key => $requisition) : ?>
                <?php if (!$requisition["aprovado"]) : ?>
                    <div class="card mt-2">
                        <div class="card-header" id="<?= "heading" . $key ?>">
                            <h5 class="mb-0">
                                <div style="cursor: pointer;" data-toggle="collapse" data-target="<?= "#collapse" . $key ?>" aria-expanded="false" aria-controls="collapseTwo">
                                    <div>
                                        <span>Software: <a class="software-url" href="<?= $requisition["url"] ?>" target="_blank"><?= $requisition["nome-software"] ?></a></span>
                                    </div>
                                    <div>
                                        <span>Professor(a): <?= $requisition["nome-professor"] ?></span>
                                    </div>
                                </div>
                            </h5>
                        </div>
                        <div id="<?= "collapse" . $key ?>" class="collapse" aria-labelledby="<?= "heading" . $key ?>" data-parent="#accordion">
                            <div class="card-body">
                                <div class="my-1">
                                    <div><strong>Sistema Operacional: </strong><?= $requisition["sistema-operacional"] ?></div>
                                </div>
                                <div class="my-1">
                                    <div><strong>Laboratório(s): </strong><?= implode(",", $requisition["laboratorio"]) ?></div>
                                </div class="my-1">
                                <div class="my-1">
                                    <div><strong>Justificativa:</strong></div>
                                    <textarea class="textarea-justify" name="" id="" cols="50" rows="5" disabled value="Ótimo para programar WEB"><?= $requisition["justificativa"] ?></textarea>
                                </div class="my-1">
                                <div class="my-1">
                                    <div><strong>Dependências:</strong></div>
                                    <textarea class="textarea-justify" name="" id="" cols="50" rows="5" disabled value="Ótimo para programar WEB"><?= $requisition["dependencias"] ?></textarea>
                                </div>
                                <div class="text-right">
                                    <form class="form-btn" action="../server/delete_requisition.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $key ?>">
                                        <button type="submit" class="btn btn-danger">Reprovar</button>
                                    </form>
                                    <form class="form-btn" class="form-btn" action="../server/aprove_requisition.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $key ?>">
                                        <button type="submit" class="btn btn-success">Aprovar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include("./layout/scripts.php") ?>
</body>

</html>