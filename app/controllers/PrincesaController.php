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
        $princesas = $this->model->getAllPrincesas();
        require APP_PATH . '/views/lista.php';
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $reino = $_POST['nome'];
            $poderes = $_POST['nome'];
            $caracteristicas = $_POST['nome'];
            $companheiro = $_POST['type'];
            $this->model->createPrincesas($nome, $reino, $poderes, $caracteristicas, $companheiro);
            // Define a mensagem e o tipo
            $_SESSION['message'] = [
                'text' => 'Princesa adicionada com sucesso!',
                'type' => 'success'
            ];
            header("Location: /MVCteste/princesa/list");
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
            $poderes = $_POST['poderes'];
            $caracteristicas = $_POST['caracteristicas'];
            $companheiro = $_POST['companheiro'];
            $this->model->updatePrincesas($id, $nome, $reino, $poderes, $caracteristicas, $companheiro);

            // Define a mensagem e o tipo
            $_SESSION['message'] = [
                'text' => 'Princesa atualizada com sucesso!',
                'type' => 'warning'
            ];
            header("Location: /MVCteste/princesa/list");
            exit;
        }
        $princesa = $this->model->getPrincesaById($id);
        require APP_PATH . '/views/cadastrar.php';
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->model->deletePrincesa($id);
        // Define a mensagem e o tipo
        $_SESSION['message'] = [
            'text' => 'Princesa excluída com sucesso!',
            'type' => 'danger'
        ];
        header("Location: /MVCteste/princesa/list");
        exit;
    }
}
