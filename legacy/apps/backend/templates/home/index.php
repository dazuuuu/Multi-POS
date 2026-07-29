<section class="hero">
    <div class="container">
        <h1>Multi-POS SaaS Platform</h1>
        <p>A complete multi-tenant point of sale system with core business features and industry-specific modules for restaurants, healthcare, retail, and more.</p>
        <div class="hero-actions">
            <a href="/register" class="btn btn-primary">Get Started Free</a>
            <a href="/core" class="btn btn-outline">Explore Core Modules</a>
            <a href="/industry" class="btn btn-outline">Industry Solutions</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Platform Categories</h2>
        <p class="section-subtitle">Choose the modules that fit your business during account creation.</p>

        <div class="card-grid">
            <a href="/core" class="card" style="text-decoration:none;color:inherit;">
                <div class="card-icon">🏢</div>
                <h3>Core System</h3>
                <p>Business management, POS, inventory, financials, employees, and reports — available to every business.</p>
                <span class="badge badge-core"><?= count($coreModules) ?> modules</span>
            </a>

            <a href="/industry" class="card" style="text-decoration:none;color:inherit;">
                <div class="card-icon">🏭</div>
                <h3>Industry Modules</h3>
                <p>Specialized solutions for restaurants, healthcare, supermarkets, beauty salons, and more.</p>
                <span class="badge badge-industry"><?= count($industryModules) ?> industries</span>
            </a>
        </div>
    </div>
</section>

<section class="section" style="background: var(--surface);">
    <div class="container">
        <h2 class="section-title">Subscription Plans</h2>
        <p class="section-subtitle">Start small and scale as your business grows.</p>

        <div class="card-grid">
            <?php foreach ($tiers as $key => $tier): ?>
            <div class="card">
                <span class="badge badge-<?= $key ?>"><?= htmlspecialchars($tier['name']) ?></span>
                <h3 style="margin-top:.75rem;">$<?= number_format($tier['price_monthly'], 0) ?>/mo</h3>
                <p><?= htmlspecialchars($tier['description']) ?></p>
                <ul style="list-style:none;font-size:.85rem;color:var(--text-muted);">
                    <?php foreach ($tier['suitable_for'] as $item): ?>
                    <li>• <?= htmlspecialchars($item) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Core Modules Overview</h2>
        <div class="card-grid">
            <?php foreach ($coreModules as $key => $module): ?>
            <div class="card">
                <h3><?= htmlspecialchars($module['name']) ?></h3>
                <p><?= htmlspecialchars($module['description']) ?></p>
                <span class="badge badge-core"><?= count($module['features']) ?> features</span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
