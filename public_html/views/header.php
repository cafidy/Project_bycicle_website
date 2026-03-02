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
          <a href="<?php echo $racinepath ?>" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
          
            <h1><i>Peloton leader</i></h1>
            <a href="<?php echo $racinepath.'controls/login.php'; ?>" class="btn btn-dark m-4">login</a>
            <h5> <i>Numero 1° des vendeur de pièces de vélo</i></h>
          </a>
          
        </div>
        <a href="<?php echo $racinepath.'controls/shop.php'; ?>" class="btn btn-dark text-light text-decoration-none me-3"><i class="fa fa-shopping-cart p-2"></i></a>
    </div>
</header>