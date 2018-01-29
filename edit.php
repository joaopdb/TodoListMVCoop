<?php
include 'rota-edit.php';
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>TodoListMVC</title>
    <link href="main.css" rel="stylesheet" media="screen">

</head>

<body>
    
<div id="content">
    <form method="post">
        <h3>Editar Tarefa</h3>
        <input type='text' name='tarefa' value="<?php echo $tarefa; ?>" class='caixa-entrada' required>
        <button type="submit" id="<?php echo $id; ?>" class="botaoadd" name="botao-edicao">
            Editar
        </button>
    </form>
</div>








