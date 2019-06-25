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
    <div class="col mt-5">
        <div class="row justify-content-center">
            <form class="form-new-software">
                <h3>Adicionar software</h3>
                <div class="form-group">
                    <label for="lab">Laboratório</label>
                    <input type="text" class="form-control" id="lab" placeholder="Insira o laboratório">
                </div>
                <div><strong>Softwares</strong></div>
                <div id="softwares">
                    <div>
                        <div class="form-group">
                            <label for="softwarename">Nome</label>
                            <input type="text" class="form-control" id="softwarename" placeholder="Insira o nome do software">
                        </div>
                        <div class="form-group">
                            <label for="softwareversion">Versão</label>
                            <input type="text" class="form-control" id="softwareversion" placeholder="Insira a versão do software">
                        </div>
                        <div class="form-group">
                            <label for="dateinstall">Date de instalação</label>
                            <input type="date" class="form-control" id="dateinstall" placeholder="Insira a data de instalação">
                        </div>
                        <div class="form-group">
                            <label for="datelicense">Data de expiração da licença</label>
                            <input type="date" class="form-control" id="softwarename" placeholder="Insira a data de expiração da licensa">
                        </div>
                    </div>
                    <hr>
                </div>
                <div>
                    <p class="add-new text-right" id="add">Adicionar</p>
                </div>
                <button type="button" class="btn btn-primary" id="send">Enviar</button>
            </form>
        </div>
    </div>
    <?php include("./layout/scripts.php") ?>
    <script>
        let cont = 0;
        $('#add').click(() => {
            console.log('adding');

            const newhtml = `
                <div>
                    <div class="form-group">
                        <label for="softwarename${cont}">Nome</label>
                        <input type="text" class="form-control" id="softwarename${cont}" placeholder="Insira o nome do software">
                    </div>
                    <div class="form-group">
                        <label for="softwareversion${cont}">Versão</label>
                            <input type="text" class="form-control" id="softwareversion${cont}" placeholder="Insira a versão do software">
                    </div>
                    <div class="form-group">
                        <label for="dateinstall${cont}">Date de instalação</label>
                        <input type="date" class="form-control" id="dateinstall${cont}" placeholder="Insira a data de instalação">
                    </div>
                    <div class="form-group">
                        <label for="datelicense${cont}">Data de expiração da licença</label>
                        <input type="date" class="form-control" id="softwarename${cont}" placeholder="Insira a data de expiração da licensa">
                    </div>
                </div>
                <hr>`;
            $('#softwares').append(newhtml);
            cont++;
        });

        $('#send').click(() => {
            const body = {
                nome: $('#lab').val(),
                programas: []
            };
            $('#softwares > div').each((index, elem) => {
                const nameSoftwareInput = $('input', elem)[0];
                const versionInput = $('input', elem)[1];
                const dateInstallInput = $('input', elem)[2];
                const dateLicenseInput = $('input', elem)[3];
                body.programas.push({
                    "nome_software": nameSoftwareInput.value,
                    "versao": versionInput.value,
                    "data_instalaçao": dateInstallInput.value,
                    "data_expiracao_licenca": dateLicenseInput.value
                });
            });

            fetch('/gerenciamento-labs/server/addSoftware.php', {
                method: 'POST',
                body: JSON.stringify(body)
            }).then((response) => {
                console.log(response);

                if (response.status) {
                    alert("Software(s) adicionado(s) com sucesso!");
                    window.location = '/gerenciamento-labs/views/dashboard.php'
                }
            });

        });
    </script>
</body>

</html>