<div class="container">
    <div class="row justify-content-center align-items-center ">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header text-center bg-dark text-white">
                    <h4>Connexion Admin</h4>
                </div>
                <div class="card-body">
                    <form action="controls/users.php" method="POST">
                        
                        <div class="mb-3">
                            <label class="form-label">Email Admin</label>
                            <input type="email" class="form-control" placeholder="admin@gmail.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" placeholder="********" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark">
                                ready to roll
                            </button>
                        </div>

                    </form>
                </div>
                <div class="card-footer text-center ">
                    <small class="text-danger">Accès réservé à l’administrateur</small>
                </div>
            </div>
        </div>
    </div>
</div>
