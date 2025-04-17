<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace uživatele</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Registrace uživatele</h2>
                    </div>
                    <div class="card-body">
                        <form action="../../controllers/register.php" method="post" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="username" class="form-label">Uživatelské jméno: <span class="text-danger">*</span></label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail (nepovinný): <span class="text-danger">*</span></label>
                                <input type="text" id="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Jméno (nepovinné):</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="surname" class="form-label">Příjmení:</label>
                                <input type="text" id="surname" name="surname" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="password_hash" class="form-label">Heslo: <span class="text-danger">*</span></label>
                                <input type="text" id="password_hash" name="password_hash" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="passwordagain" class="form-label">Potvrzení hesla: <span class="text-danger">*</span></label>
                                <input type="text" id="passwordagain" name="passwordagain" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Uložit knihu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>