<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista das Princesas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/lista.css">
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-5">Princesas Cadastradas</h1>

        <?php
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            $type = htmlspecialchars($message['type']);
            echo '<div class="alert alert-' . $type . '">' . htmlspecialchars($message['text']) . '</div>';
            unset($_SESSION['message']);
        }
        ?>
        
        <a href="/MVCteste/princesa/create" class="btn btn-success">Nova Princesa</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Reino</th>
                    <th>Poderes</th>
                    <th>Características</th>
                    <th>Companheiro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($princesas as $princesa): ?>
                    <tr>
                        <td><?= htmlspecialchars($princesa['id']) ?></td>
                        <td><?= htmlspecialchars($princesa['nome']) ?></td>
                        <td><?= htmlspecialchars($princesa['reino']) ?></td>
                        <td><?= htmlspecialchars($princesa['poderes']) ?></td>
                        <td><?= htmlspecialchars($princesa['caracteristicas']) ?></td>
                        <td><?= htmlspecialchars($princesa['companheiro']) ?></td>
                        <td>
                            <a href="/MVCteste/princesa/edit?id=<?= $princesa['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="/MVCteste/princesa/delete?id=<?= $princesa['id'] ?>" class="btn btn-sm btn-danger"
                                onclick="return confirm('Tem certeza que deseja excluir essa princesa?')">Excluir</a>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>