<div class="container">
	<div class="row">
		<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
			<div class="card h-100">
				<div class="card-body">
					<div>
						<div>
							<h5>username</h5>
							<h6>useremail</h6>
						</div>
						<div>
							<h5>About</h5>
							<p>random info</p>
						</div>
					</div>
				</div>
			</div>
		</div>
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
								<input type="text" class="form-control" id="Name" placeholder="Enter name" value="<?php echo $name; ?>">
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="phone">Phone</label>
								<input type="tel" class="form-control" id="phone" placeholder="Enter phone number" value=<?php echo $phone; ?>>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" class="form-control" id="email" placeholder="Enter email" value=<?php echo $email;?>>
							</div>
						</div>
					</div>
					<div class="row p-4">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="text-right">
								<button type="button" id="submit" name="submit" class="btn btn-dark">Update</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>