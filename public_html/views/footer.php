<?php if (!isset($_COOKIE['consent'])): ?>
<div class="position-fixed bottom-0 start-0 p-3" style="z-index: 1055; max-width: 350px;">
    <div class="bg-dark text-white rounded shadow p-3">
        <p class="mb-2 small">
            Ce site utilise des cookies pour améliorer votre expérience.
        </p>
        <form method="POST">
            <input name="csrftoken" type="hidden" value="<?= $_SESSION["csrftoken"]?>">
            <input type="hidden" name="cookie_action" value="1">
            <details class="mb-3">
                <summary class="fw-bold mb-2" style="cursor:pointer;">
                    ⚙️ Personnaliser
                </summary>
                <div class="mt-2 ps-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="choix1" id="choix1">
                        <label class="form-check-label" for="choix1">
                            Choix 1
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="choix2" id="choix2">
                        <label class="form-check-label" for="choix2">
                            Choix 2
                        </label>
                    </div>
                </div>
            </details>
            <div class="d-flex gap-2">
                <button name="accept_cookies" class="btn btn-success btn-sm w-50">Accepter</button>
                <button name="refuse_cookies" class="btn btn-outline-light btn-sm w-50">Refuser</button>
            </div>
        </form>
    </div>
</div>

<?php endif; ?>
<footer class="bg-dark text-light py-4 mt-4">
  <div class="container">
    <div class="row">

      <div class="col-md-6 text-center text-md-start">
        <h5 class="mb-2">test</h5>
        <p class="mb-0">𐔌՞. .՞𐦯</p>
      </div>
      <div class="col-md-6 text-center">
        <a href="firstpage" class="btn btn-dark text-light text-decoration-none me-3">Home</a>
        <a href="mention" class="btn btn-dark text-light text-decoration-none me-3">Mention legal</a>
        <?php if (isset($_SESSION['user'])):?>
            <a href="account" class="btn btn-dark text-light text-decoration-none me-3">Account</a>
            <a href="contact" class="btn btn-dark text-light text-decoration-none">Contact</a>
        <?php endif; ?>
    </div>
    </div>
  </div>
</footer>
</html>