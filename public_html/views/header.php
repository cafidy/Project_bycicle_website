<html >
<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $racinepath.'style/style.css'; ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<header class="container-auto rounded m-5 align-items-center">
  <div class="px-3 py-2 bg-dark text-white rounded">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="firstpage" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        
          <h1 class="me-5"><i>Peloton leader</i></h1>
          <h5><i>The leading retailer of bicycle parts</i></h5>
          <?php if(isset($_SESSION['user'])): ?>
           <form method="POST" action="login">
            <input name="csrftoken" type="hidden" value="<?= $_SESSION["csrftoken"]?>">
              <button class="btn btn-danger m-4" type="submit" name="disconect" action="login">Logout</button>
          </form>
          <?php endif; ?>
          <?php if(!isset($_SESSION['user'])): ?>
          <a href="login" class="btn btn-dark m-4"><i class="fa fa-arrow-right-to-bracket me-2"></i>Login</a>
          <?php endif; ?>
          
        </a>
        
      </div>
      <div class="d-flex justify-content-between align-items-center w-100 px-3">
        <a href="shop" class="btn btn-dark text-light text-decoration-none">
          <i class="fa fa-shop me-2"></i>Shop
        </a>
        <a href="basket" class="btn btn-dark text-light d-flex align-items-center">
          <i class="fa fa-shopping-cart me-2"></i>Basket
        </a>
    </div>
    </div>
  </div>
</header>