<?php
require_once APP_PATH . '/models/Model.php';

class PrincesaModel extends Model
{
    public function getAll()
    {
        return $this->db->query("SELECT * FROM princesas_disney")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM princesas_disney WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save($data)
    {
        if (empty($data['id'])) {
            // Inserção
            $stmt = $this->db->prepare("INSERT INTO princesas_disney 
                                      (nome, reino, historia, poderes, caracteristicas, companheiro,) 
                                      VALUES (:nome, :reino, :historia, :poderes, :caracteristicas, :companheiro,)");
            return $stmt->execute([
                'nome' => $data['nome'] ?? '',
                'reino' => $data['reino'] ?? '',
                'historia' => $data['historia'] ?? '',
                'poderes' => $data['poderes'] ?? '',
                'caracteristicas' => $data['caracteristicas'] ?? '',
                'companheiro' => $data['companheiro'] ?? '',
              

            ]);
        } else {
            // Atualização
            $stmt = $this->db->prepare("UPDATE princesas_disney SET 
                                      nome = :nome,  
                                      reino = :reino,
                                      historia = :historia, 
                                        poderes = :poderes, 
                                      caracteristicas = :caracteristicas,
                                        companheiro = :companheiro,
                                      WHERE id = :id");
            return $stmt->execute([
                'id' => $data['id'] ?? '',
                'nome' => $data['nome'] ?? '',
                'reino' => $data['reino'] ?? '',
                'historia' => $data['historia'] ?? '',
                'poderes' => $data['poderes'] ?? '',
                'caracteristicas' => $data['caracteristicas'] ?? '',
                'companheiro' => $data['companheiro'] ?? '',
            ]);
        }
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM princesas_disney WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}