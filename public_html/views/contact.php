<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 justify-content-center item-align-center p-4 container-sm">
    <div class=" card">
        <div class=" row gutters ">
            <form>
                <h3><i>Contact form</i></h3>
                <div class ="m-1">
                    <label for="email">Email d'envoie :</label>
                    <input type="text" name="contactemail" id="contactemail" value =<?php echo $contactemail;?>>
                </div>
                <div class ="m-1">
                    <label for="object">Objet :</label>
                    <input type="text" name="object" id="object">
                </div>
                <div class ="m-1">
                    <label for="message">Message :</label>
                    <input type="text" name="message" id="message">
                </div>
                <div class="text-right p-3">
                    <button type="button" id="submit" name="submit" class="btn btn-dark">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
