
<?php
class forms {

    public function signup() {
        ?>
        <div class="card shadow-lg p-4" style="max-width: 400px; margin: auto;">
            <h3 class="text-center mb-3">Sign Up</h3>
            <form action="submit.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-success w-100 mb-2">Sign Up</button>
                <div class="text-center">
                    <a href="login.php">Already have an account? Log in</a>
                </div>
            </form>
        </div>
        <?php
    }

    public function signin() {
        ?>
        <div class="card shadow-lg p-4" style="max-width: 400px; margin: auto;">
            <h3 class="text-center mb-3">Sign In</h3>
            <form action="login_process.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-2">Sign In</button>
                <div class="text-center">
                    <a href="index.php">Don't have an account? Sign up</a>
                </div>
            </form>
        </div>
        <?php
    }
}
