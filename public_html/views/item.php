<div class="container card border border-dark">
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 d-flex justify-content-center row card-body">
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 d-flex justify-content-center">
            <img src="<?php echo $img; ?>" alt="<?php echo htmlspecialchars($namepart); ?>" class="img-fluid p-4">
        </div>

        <div class="d-flex justify-content-center">
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12 d-flex flex-column justify-content-center">
                <h2><?php echo htmlspecialchars($namepart); ?></h2>
                <p><?php echo htmlspecialchars($descr); ?></p>
                <p><strong>Prix :</strong> €<?php echo number_format($price, 2, ',', ' '); ?></p>
                <p><strong>Stock :</strong> <?php echo number_format($stock, 0, ',', ' '); ?> unités</p>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <button class="p-1 m-2 btn btn-light"><i class="fa fa-shopping-cart"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>