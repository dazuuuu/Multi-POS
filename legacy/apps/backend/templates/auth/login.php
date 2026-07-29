<div class="auth-container" style="max-width:450px;">
    <div class="auth-card">
        <h1 style="margin-bottom:.5rem;">Sign In</h1>
        <p style="color:var(--text-muted);margin-bottom:1.5rem;">Access your Multi-POS dashboard.</p>

        <?php if (!empty($errors)): ?>
        <div class="alert alert-error">
            <?php foreach ($errors as $error): ?>
            <div><?= htmlspecialchars($error) ?></div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <form method="POST" action="/login">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%;padding:.8rem;">Sign In</button>
        </form>

        <p style="text-align:center;margin-top:1.5rem;font-size:.9rem;">
            Don't have an account? <a href="/register">Create one</a>
        </p>
    </div>
</div>
