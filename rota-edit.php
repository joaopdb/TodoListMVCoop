<?php

include 'config.php';

if(isset($_GET['editar_id']))
{
    $id = $_GET['editar_id'];
    extract($toDo->pegarId($id));
}
if(isset($_POST['botao-edicao']))
{
    $TarefaId = $id;
    $TituloTarefa = $_POST['tarefa'];
    $toDo->setTitulo($TituloTarefa);
    $toDo->setId($TarefaId);


    if($toDo->editar())
    {
        header("Location: index.php?inserido");
    }
    else
    {
        header("Location: edit.php?error");
    }
   }

