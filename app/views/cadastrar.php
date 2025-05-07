<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Princesas Disney</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/cadastrar.css">
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-5">Cadastro de Princesas Disney</h1>
        
        <form method="POST" action="salvar.php">
            <input type="hidden" name="id" value="<?= htmlspecialchars($princesa['id'] ?? '') ?>">
            
            <div class="form-section">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome da Princesa</label>
                    <input type="text" class="form-control" id="nome" name="nome" 
                           value="<?= htmlspecialchars($princesa['nome'] ?? '') ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="reino" class="form-label">Reino/Origem</label>
                    <input type="text" class="form-control" id="reino" name="reino"
                           value="<?= htmlspecialchars($princesa['reino'] ?? '') ?>">
                </div>
            </div>
            
            <div class="form-section">
                <div class="mb-3">
                    <label for="historia" class="form-label">História</label>
                    <textarea class="form-control" id="historia" name="historia" rows="4"><?= htmlspecialchars($princesa['historia'] ?? '') ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="poderes" class="form-label">Poderes/Habilidades</label>
                    <textarea class="form-control" id="poderes" name="poderes" rows="3"><?= htmlspecialchars($princesa['poderes'] ?? '') ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="caracteristicas" class="form-label">Características Únicas</label>
                    <textarea class="form-control" id="caracteristicas" name="caracteristicas" rows="3"><?= htmlspecialchars($princesa['caracteristicas'] ?? '') ?></textarea>
                </div>
            </div>
            
            <div class="form-section">
                <div class="mb-3">
                    <label for="companheiro" class="form-label">Companheiro</label>
                    <input type="text" class="form-control" id="companheiro" name="companheiro"
                           value="<?= htmlspecialchars($princesa['companheiro'] ?? '') ?>">
                </div>
            </div>
            <a href="/MVCteste/index.php" class="btn btn-primary">Salvar</a>
            <a href="/MVCteste/app/views/lista.php" class="btn btn-danger">Cancelar</a>

            
        </form>
    </div>
</body>
</html>