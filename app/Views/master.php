<!--    Layout de configuração do site todas as partes da aplicação devem herda essa VIEW       -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    link para o arquivo css     -->
    <?= link_tag('/assets/css/style.css') ?>
    <title>CRUDigniter</title>
</head>

<body>
    <!--    Ponto onde todas as outras VIEWS vão ser rederizadas    -->
    <?= $this->renderSection('content') ?>
</body>

</html>