<?php

class Connection{
    public PDO $pdo;
    
    public function __construct()
    {
        $this->pdo = new PDO('mysql:server=localhost;dbname=news','root','');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public function getNews(){
        $sql = $this->pdo->prepare("SELECT * FROM yangilik ORDER BY time DESC");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addNews($data){
        $sql = $this->pdo->prepare("INSERT INTO yangilik(id, title, text, time) VALUES (null, :title, :text, :time)");
        $sql->bindValue('title',addslashes($data['title']));
        $sql->bindValue('text',addslashes($data['text']));
        $sql->bindValue('time',date('Y-m-d H:i:s'));
        return $sql->execute();
    }

    public function getIdNews($id){
        $sql = $this->pdo->prepare("SELECT * FROM yangilik WHERE id=$id");
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

}

function sher($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

?>