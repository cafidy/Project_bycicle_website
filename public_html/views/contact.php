<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 justify-content-center item-align-center p-4 container-sm">
    <div class="card">
        <div class="row">
            <form method="POST">
                <input name="csrftoken" type="hidden" value="<?= $_SESSION["csrftoken"]?>">
                <h3><i>Contact form</i></h3>
                <div class="m-1">
                    <label for="object">Objet :</label>
                    <input type="text" name="object" id="object" class="form-control">
                </div>
                <div class="m-1">
                    <label for="message">Message :</label>
                    <textarea name="message" id="message" class="form-control" rows="6"></textarea>
                </div>
                <div class="text-right p-3">
                    <button name="mail" class="btn btn-dark">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>