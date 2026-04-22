<?php if (!isset($_COOKIE['consent'])): ?>
<div class="position-fixed bottom-0 start-0 p-3" style="z-index: 1055; max-width: 350px;">
    <div class="bg-dark text-white rounded shadow p-3">
        <p class="mb-2 small">
            Ce site utilise des cookies pour améliorer votre expérience.
        </p>
        <form method="POST" class="d-flex gap-2">
            <input type="hidden" name="cookie_action" value="1">
            <details class="mb-3 border rounded p-3 bg-white">
                <summary class="fw-bold">
                    Les choix
                </summary>
                <input type="checkbox" name="choix1">
                <label for="choix 1">choix 1</label>
                <input type="checkbox" name="choix2">
                <label for="choix 1">choix 2</label>
                </details>
            <button name="accept_cookies" class="btn btn-success btn-sm">
                Accepter
            </button>
            <button name="refuse_cookies" class="btn btn-outline-light btn-sm">
                Refuser
            </button>
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
        <?php if (isset($_COOKIE['consent'])):?>
            <a href="account" class="btn btn-dark text-light text-decoration-none me-3">Account</a>
            <a href="contact" class="btn btn-dark text-light text-decoration-none">Contact</a>
        <?php endif; ?>
    </div>
    </div>
  </div>
</footer>
</html>