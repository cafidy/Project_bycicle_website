<footer class="bg-dark text-light py-4 mt-4">
  <div class="container">
    <div class="row">

      <div class="col-md-6 text-center text-md-start">
        <h5 class="mb-2">test</h5>
        <p class="mb-0">𐔌՞. .՞𐦯</p>
      </div>
      <div class="col-md-6 text-center">
        <a href="firstpage" class="btn btn-dark text-light text-decoration-none me-3">Home</a>
        <?php if (isset($_SESSION["user"])):?>
            <a href="account" class="btn btn-dark text-light text-decoration-none me-3">Account</a>
            <a href="contact" class="btn btn-dark text-light text-decoration-none">Contact</a>
        <?php endif; ?>
    </div>
    </div>
  </div>
</footer>
</html>