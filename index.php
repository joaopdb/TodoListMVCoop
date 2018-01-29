<?php
include 'rota-index.php';
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>TodoListMVC</title>
    <link href="main.css" rel="stylesheet" media="screen">

</head>

<body>


<div id="content">
    <form method="post">
        <h3>Adicionar Tarefa</h3>
        <input type='text' name='tarefa' class='caixa-entrada' required>
        <button type="submit" class="botaoadd" name="botao-adicionar">
            Adicionar
        </button>
    </form>
</div>
<ul>
    <?php

   $stmt = $DB_con->prepare("SELECT * FROM tarefa ORDER BY id DESC ");
        $stmt->execute();
        if($stmt->rowCount() >0){
            while ($linha=$stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
      
                <li>
                    <h1> <?php print($linha['tarefa']); ?> </h1> 
                    <div class='botaoredefinir'>
                    <form method="post">                        
                        <button type="submit" value= <?php print($linha['id']); ?> class="botaoaparencia" name="botao-editar">Editar </button>
                        <button type="submit" value= <?php print($linha['id']); ?> class="botaoaparencia" name="botao-deletar"> Deletar </button>                        
                    </form>
                    </div>
                </li>
            <?php
            }
        }else {
            echo "<h1> Não existe Lista </h1>";
        } 
    ?>
</ul>







