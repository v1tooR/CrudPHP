<?php 
    require __DIR__. '/vendor/autoload.php';

    //

    use \App\Entity\Vaga;

    //validação
    if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){
        $obVaga = new Vaga;

        // -> acessar propriedades ou métodos de um objeto, para membros estáticos(aqueles que pertencem/compartilhados a classe)
        $obVaga->titulo = $_POST['titulo'];
        $obVaga->descricao = $_POST['descricao'];
        $obVaga->ativo = $_POST['ativo'];

        $obVaga->cadastrar();
        //echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;

        header('location: site.php?status=success');
        exit;
    }

    include __DIR__. '/includes/header.php';
    include __DIR__. '/includes/footer.php';
    include __DIR__. '/includes/formulario.php';