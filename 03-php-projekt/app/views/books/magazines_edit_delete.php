<?php
require_once '../../models/Database.php';
require_once '../../models/Magazine.php';

$db = (new Database())->getConnection();
$magazineModel = new Magazine($db);
$magazines = $magazineModel->getAll();

$editMode = false;
$magazineToEdit = null;

if (isset($_GET['edit'])) {
    $editId = (int)$_GET['edit'];
    $magazineToEdit = $magazineModel->getById($editId);
    if ($magazineToEdit) {
        $editMode = true;
    }
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editace a mazání periodik</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Knihovna</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="../../views/books/magazine_create.php">Přidat periodikum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../controllers/magazine_list.php">Výpis periodik</a>
                            </li>
                        </ul>
                    </div>
                </div>
        </nav>
        


        <?php if ($editMode): ?>
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                    <h2>Upravit periodikum: <?= htmlspecialchars($magazineToEdit['name']) ?></h2>
                    </div>
                    <div class="card-body">
                        <form action="../../controllers/magazine_update.php" method="post">
                            <input type="hidden" name="id" value="<?= $magazineToEdit['id'] ?>">
                            <div class="mb-3">
                                <label class="form-label">ID periodika:</label>
                                <input type="text" class="form-control" value="<?= $magazineToEdit['id'] ?>" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Název periodika:</label>
                                <input type="text" id="name" name="name" class="form-control" required value="<?= htmlspecialchars($magazineToEdit['name']) ?>">
                            </div>


                            <div class="mb-3">
                                <label for="year" class="form-label">Rok vydání:</label>
                                <input type="number" id="year" name="year" class="form-control" required value="<?= htmlspecialchars($magazineToEdit['year']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="issn" class="form-label">ISSN:</label>
                                <input type="text" id="issn" name="issn" class="form-control" required value="<?= htmlspecialchars($magazineToEdit['issn']) ?>">
                            </div>

                            <button type="submit" class="btn btn-success w-100">Uložit změny</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <h2>Výpis knih</h2>

        <?php if (!empty($magazines)): ?>
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Název</th>
                        <th>Rok</th>
                        <th>ISSN</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($magazines as $magazine): ?>
                    <tr>
                        <td><?= htmlspecialchars($magazine['id']) ?></td>
                        <td><?= htmlspecialchars($magazine['name']) ?></td>
                        <td><?= htmlspecialchars($magazine['year']) ?></td>
                        <td><?= htmlspecialchars($magazine['issn']) ?></td>
                        <td>
                            <a href="?edit=<?= $magazine['id'] ?>" class="btn btn-sm btn-success">Upravit</a>
                            <a href="../../controllers/magazine_delete.php?id=<?= $magazine['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Opravdu chcete smazat tuto knihu?');">Smazat</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        
            <?php else: ?>
            <div class="alert alert-info">Žádná kniha nebyla nalezena.</div>
        <?php endif; ?>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>