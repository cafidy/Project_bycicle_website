<div class="container my-5">
    <div class="row g-4">
        <?php foreach($allparts as $part): ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="card h-100 shadow-sm border-0">
                    <form action="item" method="POST">
                        <input name="csrftoken" type="hidden" value="<?= $_SESSION["csrftoken"]?>">
                        <input type="hidden" name="partid" value="<?= $part->partid ?>">
                        <button name="item" class="border-0 bg-transparent w-100">
                            <img src="assets/<?=$part->img ?>" 
                                 class="card-img-top p-3"
                                 style="height:200px; object-fit:contain;">
                        </button>
                    </form>
                    <div class="card-body text-center">
                        <h5 class="fw-bold"><?= $part->name ?></h5>
                        <p class="text-success fw-bold mb-1">
                            <?= $part->price ?> €
                        </p>
                        <p class="text-muted small">
                            Stock: <?= $part->stock ?>
                        </p>
                    </div>
                    <div class="card-footer bg-white border-0 text-center pb-3">
                        <form method="POST">
                            <input name="csrftoken" type="hidden" value="<?= $_SESSION["csrftoken"]?>">
                            <input type="hidden" name="partid" value="<?= $part->partid ?>">

                            <button class="btn btn-primary w-75" name="addcart">
                                <i class="fa fa-shopping-cart me-2"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>