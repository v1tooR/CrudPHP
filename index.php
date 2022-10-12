<?php 
    $pdo = new PDO('mysql:host=localhost;dbname=newphp','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //colocando o banco de dados
    if(isset($_GET['delete'])){
        $id = (int)$_GET['delete'];
        $pdo->exec("DELETE FROM usuarios WHERE id=$id");
        echo 'Deletado com sucessoo id:  '.$id.'!';
    }
    //insert
    if(isset($_POST['nome'])){
        $sql = $pdo->prepare("INSERT INTO usuarios VALUES (null,?,?)");
        $sql->execute(array($_POST['nome'],$_POST['email']));
        echo 'Inserido com sucesso';
    }
    /*$nome = 'Felipe';
    $pdo->exec("UPDATE usuarios SET nome='$nome' WHERE id=5" ) */
    
?>

<form method="post">
    <input type="text" name="nome" value="">
    <input type="text" name="email" value="">
    <input type="submit" value="Enviar">
</form>

<?php 
    $sql = $pdo->prepare("SELECT * FROM usuarios");
    $sql->execute();

    $fetchUsuarios = $sql->fetchAll();
    foreach ($fetchUsuarios as $key => $value) {
        echo '<a href="?delete='.$value['id'].'">(EXCLUIR) </a>'.$value['nome'].' | '.$value['email'].'
            </a>';
        echo '<hr>';
    }

?>