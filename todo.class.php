


<?php
class todo{
    private $db;
    protected $tarefa = null;
    protected $id = null;
    //metodo construtor de conexao com o banco de dados
    
    function __construct($DB_con) {
        $this->db = $DB_con;
    }

    //metodos de entrada
    
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitulo($tarefa)
    {
        $this->tarefa = $tarefa;
    }

    
    //adiciona tarefa na tabela de banco de dados
    
    public function adicionar(){
        try{
            $stmt = $this->db->prepare("INSERT INTO tarefa(tarefa) VALUES(:tarefa)");
            $stmt->bindparam(":tarefa",$this->tarefa);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }
    
    //retorna o Linha da tabela por ID
    
    public function pegarId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM tarefa WHERE id=:id");
        $stmt->execute(array(":id"=>$id));
        $Linha=$stmt->fetch(PDO::FETCH_ASSOC);
        return $Linha;
    }

    //remove tarefa da tabela de banco de dados
    
    public function remove(){
        $stmt = $this->db->prepare("DELETE FROM tarefa WHERE id=:id");
        $stmt->bindparam(":id",$this->id);
        $stmt->execute();
        return true;
    }
    
    //altera tarefa selecionada
    
    public function editar(){
        
        try{
            $stmt = $this->db->prepare("UPDATE tarefa SET 
                                        tarefa =:tarefa WHERE id=:id ");
            $stmt->bindparam(":id",$this->id);
            $stmt->bindparam(":tarefa",$this->tarefa);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }

}
