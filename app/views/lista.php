<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel das Princesas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/lista.css">

</head>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-5">Princesas Cadastradas</h1>
        
        <div class="text-end mb-4">
            <a href="/MVCteste/app/views/cadastrar.php" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nova Princesa
            </a>
        </div>
        
        <div class="row">
            <?php foreach ($princesas as $princesa): ?>
            <div class="col-md-4">
                <div class="card princesa-card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><?= htmlspecialchars($princesa['nome']) ?></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        </p>
                        <p class="card-text"><strong>Companheiro:</strong> <?= htmlspecialchars($princesa['companheiro']) ?></p>

                    </div>
                    <div class="card-footer">
                        <a href="/princesa/excluir/<?= $princesa['id'] ?>" class="btn btn-sm btn-danger" 
                           onclick="return confirm('Tem certeza que deseja excluir esta princesa?')">
                            <i class="bi bi-trash"></i>Excluir</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>