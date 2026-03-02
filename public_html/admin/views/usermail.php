<div class="container card">
    <div>
        <h4 class="card-title">Contact user</h4>
        <div class="card-body">
            <h6>Mail : <?php echo $usermail; ?></h6>
            <form action="" method="post">
                <div>
                    <label for="object" class="p-2">Object :</label>
                    <input type="text" id="object" name="object">
                </div>
                <div>
                    <label for="message">Message :</label>
                    <textarea id="message" name="message"></textarea>
                </div>
                <div>
                    <button type="submit" name="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>