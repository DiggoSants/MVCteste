<?php
require_once APP_PATH . '/models/PrincesaModel.php';
class PrincesaController
{
    private $model;

    public function __construct()
    {
        $this->model = new PrincesaModel();
    }

    public function list()
    {
        $princesas = $this->model->getAll();
        require APP_PATH . '/views/lista.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $reino = $_POST['reino'];
            $historia = $_POST['historia'];
            $poderes = $_POST['poderes'];
            $caracteristica = $_POST['caracteristica'];
            $companheiro = $_POST['companheiro'];
            $this->model->create($nome, $reino, $historia, $poderes, $caracteristica, $companheiro);
            // Define a mensagem e o tipo
            $_SESSION['message'] = [
                'text' => 'Princesa adicionada com sucesso!',
                'type' => 'success'
            ];
            header("Location: /MVCteste/princesa/lista.php");
            exit;
        }
        require APP_PATH . '/views/cadastrar.php';
    }

    public function edit()
    {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $reino = $_POST['reino'];
            $historia = $_POST['historia'];
            $poderes = $_POST['poderes'];
            $caracteristica = $_POST['caracteristica'];
            $companheiro = $_POST['companheiro'];
            $this->model->updatePokemon($id, $nome, $reino, $historia, $poderes, $caracteristica, $companheiro);

            // Define a mensagem e o tipo
            $_SESSION['message'] = [
                'text' => 'Princesa atualizada com sucesso!',
                'type' => 'warning'
            ];
            header("Location: /MVCteste/princesa/lista.php");
            exit;
        }
        $princesas = $this->model->getById($id);
        require APP_PATH . '/views/cadastrar.php';
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->model->delete($id);
        // Define a mensagem e o tipo
        $_SESSION['message'] = [
            'text' => 'Princesa excluída com sucesso!',
            'type' => 'danger'
        ];
        header("Location: /MVCteste/princesa/lista.php");
        exit;
    }
}
