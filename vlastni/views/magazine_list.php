<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Výpis periodik</title>
    
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
                            <a class="nav-link" href="../views/magazine_create.php">Přidat periodikum</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../controllers/magazine_list.php">Výpis periodik</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <h2>Výpis periodik</h2>
        <?php if(!empty($magazines)): ?>
            <!-- <h3>Hrubý výpis</h3>
            <?php var_dump($magazines); ?>
            <h3>Lepší výpis</h3>
            <pre><?php print_r($magazines); ?></pre> 
            <h3>Tablukový výpis</h3> -->
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Název</th>
                        <th>Rok vydání</th>
                        <th>ISSN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($magazines as $magazine): ?>
                        <tr>
                        <td><?= htmlspecialchars($magazine['name']) ?></td>
                        <td><?= htmlspecialchars($magazine['year']) ?></td>
                        <td><?= htmlspecialchars($magazine['issn']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info">Žádné periodikum nebylo nalezeno</div>
        <?php endif;?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>