<?php
require_once APP_PATH . '/models/Model.php';

class PrincesaModel extends Model
{
    public function getAllPrincesas()
    {
        $stmt = $this->db->query("SELECT * FROM princesas_disney");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPrincesaById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM princesas_disney WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createPrincesas($nome, $reino, $poderes, $caracteristicas, $companheiro)
    {
        $stmt = $this->db->prepare("INSERT INTO princesas_disney (nome, reino, poderes, caracteristicas, companheiro) VALUES (:nome, :reino, :poderes, :caracteristicas, :companheiro)");
        return $stmt->execute([
            'nome' => $nome,
            'reino' => $reino,
            'poderes' => $poderes,
            'caracteristicas' => $caracteristicas,
            'companheiro' => $companheiro
        ]);
    }

    public function updatePrincesas($id, $nome, $reino, $poderes, $caracteristicas, $companheiro)
    {
        $stmt = $this->db->prepare("UPDATE princesas_disney SET nome = :nome, reino = :reino, poderes = :poderes, caracteristicas = :caracteristicas, companheiro = :companheiro WHERE id = :id");
        return $stmt->execute([
            'id'=>$id,
            'nome'=>$nome,
            'reino'=>$reino,
            'poderes'=>$poderes,
            'caracteristicas'=>$caracteristicas,
            'companheiro'=>$companheiro]);
    }

    public function deletePrincesa($id)
    {
        $stmt = $this->db->prepare("DELETE FROM princesas_disney WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}