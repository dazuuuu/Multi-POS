<div class="auth-container">
    <div class="auth-card">
        <h1 style="margin-bottom:.5rem;">Create Your Account</h1>
        <p style="color:var(--text-muted);margin-bottom:1.5rem;">Register your business and select the modules you need. All modules are available during testing.</p>

        <?php if (!empty($errors)): ?>
        <div class="alert alert-error">
            <?php foreach ($errors as $error): ?>
            <div><?= htmlspecialchars($error) ?></div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <form method="POST" action="/register">
            <h3 style="margin:1.5rem 0 1rem;">Account Details</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="owner_name">Your Full Name</label>
                    <input type="text" id="owner_name" name="owner_name" value="<?= htmlspecialchars($old['owner_name'] ?? '') ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required minlength="6">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" value="<?= htmlspecialchars($old['phone'] ?? '') ?>">
                </div>
            </div>

            <h3 style="margin:1.5rem 0 1rem;">Business Details</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="business_name">Business Name</label>
                    <input type="text" id="business_name" name="business_name" value="<?= htmlspecialchars($old['business_name'] ?? '') ?>" required>
                </div>
                <div class="form-group">
                    <label for="industry_type">Industry Type</label>
                    <select id="industry_type" name="industry_type">
                        <option value="">Select industry...</option>
                        <?php foreach ($industryModules as $key => $mod): ?>
                        <option value="<?= $key ?>" <?= ($old['industry_type'] ?? '') === $key ? 'selected' : '' ?>><?= htmlspecialchars($mod['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="currency">Currency</label>
                    <select id="currency" name="currency">
                        <?php foreach (['USD', 'EUR', 'GBP', 'KES', 'NGN', 'ZAR'] as $cur): ?>
                        <option value="<?= $cur ?>" <?= ($old['currency'] ?? 'USD') === $cur ? 'selected' : '' ?>><?= $cur ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="timezone">Timezone</label>
                    <select id="timezone" name="timezone">
                        <?php foreach (['UTC', 'Africa/Nairobi', 'Africa/Lagos', 'Europe/London', 'America/New_York'] as $tz): ?>
                        <option value="<?= $tz ?>" <?= ($old['timezone'] ?? 'UTC') === $tz ? 'selected' : '' ?>><?= $tz ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <h3 style="margin:1.5rem 0 1rem;">Subscription Tier</h3>
            <div class="tier-cards">
                <?php foreach ($tiers as $key => $tier): ?>
                <label class="tier-card">
                    <input type="radio" name="subscription_tier" value="<?= $key ?>" <?= ($old['subscription_tier'] ?? 'starter') === $key ? 'checked' : '' ?> style="margin-bottom:.5rem;">
                    <h4><?= htmlspecialchars($tier['name']) ?></h4>
                    <div class="price">$<?= number_format($tier['price_monthly'], 0) ?>/mo</div>
                    <p style="font-size:.8rem;color:var(--text-muted);"><?= htmlspecialchars($tier['description']) ?></p>
                </label>
                <?php endforeach; ?>
            </div>

            <h3 style="margin:1.5rem 0 1rem;">Select Modules <small style="font-weight:normal;color:var(--text-muted);">(all available for testing)</small></h3>

            <h4 style="margin-bottom:.5rem;font-size:.9rem;">Core Modules</h4>
            <div class="module-checkboxes" style="margin-bottom:1rem;">
                <?php foreach ($coreModules as $key => $mod): ?>
                <div class="module-checkbox">
                    <input type="checkbox" name="modules[]" value="<?= $key ?>" id="mod_<?= $key ?>"
                        <?= in_array($key, $old['modules'] ?? []) || empty($old) ? 'checked' : '' ?>>
                    <label for="mod_<?= $key ?>">
                        <?= htmlspecialchars($mod['name']) ?>
                        <small><?= count($mod['features']) ?> features</small>
                    </label>
                </div>
                <?php endforeach; ?>
            </div>

            <h4 style="margin-bottom:.5rem;font-size:.9rem;">Industry Modules</h4>
            <div class="module-checkboxes">
                <?php foreach ($industryModules as $key => $mod): ?>
                <div class="module-checkbox">
                    <input type="checkbox" name="modules[]" value="<?= $key ?>" id="mod_<?= $key ?>"
                        <?= in_array($key, $old['modules'] ?? []) ? 'checked' : '' ?>>
                    <label for="mod_<?= $key ?>">
                        <?= htmlspecialchars($mod['name']) ?>
                        <small><?= count($mod['submodules'] ?? []) ?> submodules</small>
                    </label>
                </div>
                <?php endforeach; ?>
            </div>

            <div style="margin-top:2rem;">
                <button type="submit" class="btn btn-primary" style="width:100%;padding:1rem;font-size:1rem;">Create Account & Start</button>
            </div>
        </form>

        <p style="text-align:center;margin-top:1.5rem;font-size:.9rem;">
            Already have an account? <a href="/login">Sign in</a>
        </p>
    </div>
</div>
