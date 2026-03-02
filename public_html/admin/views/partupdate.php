<div class="container"> 
    <div class="card">
        <h4 class="card-title p-3 d-flex justify-content-center">Modification ID:<?php echo $id; ?></h4>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
            <div class="form-group p-2 m-4">
                <label class="mb-1" for="partname"><h5>Partname</h5></label>
                <input class="form-control " type="text" name="partname" id="partname" value=<?php echo $partname; ?>>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
            <div class="form-group p-2 m-4">
                <label class="mb-1" for="price"><h5>Price</h5></label>
                <input class="form-control" type="number" name="price" id="price" value=<?php echo $price; ?>>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
            <div class="form-group p-2 m-4">
                <label class="mb-1" for="descrition"><h5>Description</h5></label>
                <textarea class="form-control " name="description" id="description" rows="8" cols="50"><?php echo $description; ?></textarea>
            </div>
        </div>
        <div class="d-flex justify-content-center pb-4">
            <button class="btn btn-dark">submit</button>
        </div>
    </div>
</div>