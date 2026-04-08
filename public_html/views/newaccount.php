<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header text-center bg-dark text-white">
                    <h4>Créer un compte</h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo $racinepath.'controls/newaccount.php'; ?>" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="example@gmail.com" required>
                            <small class="form-text text-muted">We'll share your email with anyone else <?php echo $message; ?></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" class="form-control" name="name" placeholder="Votre nom" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" name="phone" placeholder="06xxxxxxxx" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" name="password" placeholder="********" required>
                        </div>
                        <small class="form-text text-muted"> <?php echo $message; ?></small>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark" name="create">Créer</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small class="text-muted">Déjà un compte ? Connecte-toi</small>
                </div>
            </div>
        </div>
    </div>
</div>