<div class="container d-flex justify-content-center">
    <div class="card shadow border-0 w-75">
        <div class="row g-0 align-items-center">
            <div class="col-md-5 text-center p-3">
                <img src="assets/<?= $part->img ?>" class="img-fluid rounded">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h3 class="card-title"><?= $part->name ?></h3>
                    <p class="card-text text-muted"><?= $part->desc ?></p>
                    <p class="mb-1"><strong>Prix :</strong> <?= $part->price ?> €</p>
                    <p class="mb-3"><strong>Stock :</strong> <?= $part->stock ?> unités</p>
                    <div class="d-grid">
                        <form action="item" method="POST">
                            <input type="hidden" name="partiditem" value="<?= $part->partid ?>">

                            <button class="btn btn-primary w-75" name="addcart">
                                <i class="fa fa-shopping-cart me-2"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>