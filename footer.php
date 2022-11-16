
            <footer class="pt-3 mt-4 text-muted border-top">&copy; <?php echo date('Y'); ?></footer>
        </div>
    </main>

    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>

    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/login" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <?php $login = sha1(time()); ?>
                        <input type="hidden" name="login" value="<?php echo $login; ?>">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Login</button>
                </div>
                    </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal" tabindex="-2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/register" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <?php $register = sha1(time()); ?>
                        <input type="hidden" name="register" value="<?php echo $register; ?>">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Register</button>
                </div>
                    </form>
            </div>
        </div>
    </div>

</body>
</html>
