<?php
class forms {

    // Signup form
    public function signup() {
        ?>
        <h2 class="mb-4">Sign Up</h2>
        <form action="mailing.php" method="POST" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name" required>
                <div class="invalid-feedback">Please enter your name.</div>
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                <div class="invalid-feedback">Please enter a valid email.</div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <div class="invalid-feedback">Please provide a password.</div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
        </form>
        <?php
    }

    // Signin form
    public function signin() {
        ?>
        <h2 class="mb-4">Sign In</h2>
        <form action="signin.php" method="POST" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                <div class="invalid-feedback">Please enter your email.</div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <div class="invalid-feedback">Please provide your password.</div>
            </div>

            <button type="submit" class="btn btn-success btn-block">Sign In</button>
        </form>
        <?php
    }
}
?>
