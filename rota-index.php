<?php

include 'config.php';

if(isset($_POST['botao-adicionar'])){
    $TituloTarefa = $_POST['tarefa'];
    $toDo->setTitulo($TituloTarefa);

    if($toDo->adicionar())
    {
        header("Location: index.php?Adicionado");
    }
    else
    {
        header("Location: index.php?Falhou");
    }
}

if(isset($_POST['botao-deletar'])){
    $TarefaId = $_POST['botao-deletar'];
    $toDo->setId($TarefaId);
    if($toDo->remove())
    {
        header("Location: index.php?Deletado");
    }
    else
    {
        header("Location: index.php?FalhouDeletar");
    }
}
if(isset($_POST['botao-editar']))
{
    $TarefaId = $_POST['botao-editar'];

    header("Location: edit.php?editar_id=$TarefaId");
}
