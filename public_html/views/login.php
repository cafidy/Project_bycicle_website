<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header text-center bg-dark text-white">
                    <h4>Connexion</h4>
                </div>
                <div class="card-body">
                    <form action="login" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="user@gmail.com" required>
                            <small class="form-text text-muted">We'll never share your email <?php echo $message; ?></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" name="password" placeholder="********" required>
                        </div>
                        <small class="form-text text-muted text-red"><?php echo $message; ?></small>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark" name="login">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="newaccount" class="form-text text-muted">New to the site</a>
                </div>
            </div>
        </div>
    </div>
</div>