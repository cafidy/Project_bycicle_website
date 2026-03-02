<div class="container-sm p-4 w-50">
    <form action="<?php echo $racinepath.'controls/account.php'; ?>">
    <div class="form-group">
        <label for="Email1">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailtext" required>
        <small id="emailtext" class="form-text text-muted">We'll never share your email with anyone else(maybe)</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="Password1" required>
    </div>
    <button type="submit" class="btn btn-dark">Login</button>
    </form>
</div>