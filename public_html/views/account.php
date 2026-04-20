<div class="container">
	<div class="row">
		<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
			<div class="card h-100">
				<div class="card-body">
					<div>
						<div>
							<h5>username</h5>
							<h6><?= $_SESSION["user"]->name ?></h6>
						</div>
						<div>
							<h5>About</h5>
							<p>random info</p>
						</div>
					</div>
				</div>
			</div>
		</div>
			<form action="account" method="POST">
				<input name="userid" type="hidden" value="<?= $_SESSION["user"]->userid ?>">
				<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<h6 class="mb-2 text-dark">Personal Details</h6>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="Name">Name</label>
									<input name="name" type="text" class="form-control" id="Name" placeholder="Enter name" value="<?= $_SESSION["user"]->name ?>">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="phone">Phone</label>
								<input name="phone" type="tel" class="form-control" id="phone" placeholder="Enter phone number" value=<?= $_SESSION["user"]->phone ?>>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="email">Email</label>
									<input name="email" type="text" class="form-control" id="email" placeholder="Enter email" value=<?= $_SESSION["user"]->email ?>>
								</div>
							</div>
						</div>
						<div class="row p-4">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="text-right">
									<button name="update" class="btn btn-dark">Update</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
		<?php
			$groupedOrders = [];

			foreach ($orders->getProrder() as $orderpart) {
				$groupedOrders[$orderpart->date][] = $orderpart;
			}
			?>

			<?php foreach ($groupedOrders as $date => $orderParts): ?>
				<div class="card mb-4 shadow-sm">
					<div class="card-header bg-dark text-white">
						Order from <?= $date ?>
					</div>

					<div class="card-body">
						<?php foreach ($orderParts as $orderpart): 
							$part = $orderpart->part;
						?>
							<div class="row align-items-center mb-3">
								<div class="col-md-2 text-center">
									<img src="<?= $racinepath ?>assets/<?= $part->img ?>" 
										class="img-fluid rounded" 
										style="max-height:80px;">
								</div>

								<div class="col-md-6">
									<h6 class="mb-1"><?= $part->name ?></h6>
									<small class="text-muted"><?= $part->desc ?></small>
								</div>

								<div class="col-md-2 text-end">
									<strong><?= $part->price ?> €</strong>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endforeach; ?>
	</div>
</div>