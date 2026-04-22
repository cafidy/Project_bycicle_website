<div class="container my-5">
    <h2 class="mb-4 text-center">🛒 My Basket</h2>
    <?php if(isset($_SESSION['user'])): 
        foreach($orders->getacorder() as $order):
        $part = $order->part;
    ?>
        <div class="card mb-4 shadow-sm">
            <div class="row g-0 align-items-center">
                <div class="col-md-3 text-center p-3">
                    <img src="<?= $racinepath ?>assets/<?= $part->img ?>" 
                         class="img-fluid rounded" 
                         style="max-height:150px; object-fit:cover;">
                </div>
                <div class="col-md-6 p-3">
                    <h5 class="fw-bold"><?= $part->name ?></h5>
                    <p class="text-muted mb-2"><?= $part->desc ?></p>
                    <h6 class="text-success fw-bold"><?= $part->price ?> €</h6>
                </div>
                <div class="col-md-3 text-center p-3">
                    <form action="basket" method="POST">
                        <input type="hidden" name="odrpart" value="<?= $order->id ?>">
                        <button class="btn btn-outline-danger w-100" name="takeoff">
                            <i class="fa-solid fa-trash me-2"></i> Remove
                        </button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php elseif(!empty($parts)): ?>

        <?php foreach($parts as $part): ?>

        <div class="card mb-4 shadow-sm">
            <div class="row g-0 align-items-center">

                <div class="col-md-3 p-3 text-center">
                    <img src="<?= $racinepath ?>assets/<?= $part->img ?>" class="img-fluid rounded">
                </div>

                <div class="col-md-6 p-3">
                    <h5><?= $part->name ?></h5>
                    <p><?= $part->desc ?></p>
                    <h6 class="text-success"><?= $part->price ?> €</h6>
                </div>

                <div class="col-md-3 p-3">
                    <form method="POST">
                        <input type="hidden" name="partid" value="<?= $part->partid ?>">
                        <button class="btn btn-danger w-100" name="remove_cookie">Remove</button>
                    </form>
                </div>

            </div>
        </div>

        <?php endforeach; ?>

    <?php else: ?>

        <p class="text-center">Your basket is empty</p>

    <?php endif; ?>
    <?php if(isset($_SESSION['user']) && !empty($orders->getacorder())): ?>
        <form action="basket" method="POST">
            <input type="hidden" name="orderid" value="<?= $orders->getacorder()[0]->orderid ?>">
            <button class="btn btn-primary w-75" name="orderpart">
                <i class="fa fa-shopping-cart me-2"></i> BUY
            </button>
        </form>
    <?php endif; ?>
</div>