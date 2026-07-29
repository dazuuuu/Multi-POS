<section class="module-hero">
    <div class="container">
        <h1><?= htmlspecialchars($title) ?></h1>
        <?php if ($business): ?>
        <p style="color:var(--text-muted);"><?= htmlspecialchars($business['name']) ?> · <?= htmlspecialchars($business['subscription_tier']) ?> plan</p>
        <?php endif; ?>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="value"><?= count($modules) ?></div>
                <div class="label">Active Modules</div>
            </div>
            <div class="stat-card">
                <div class="value"><?= count($businesses) ?></div>
                <div class="label">Businesses</div>
            </div>
            <div class="stat-card">
                <div class="value">0</div>
                <div class="label">Today's Sales</div>
            </div>
            <div class="stat-card">
                <div class="value">0</div>
                <div class="label">Products</div>
            </div>
        </div>

        <h2 class="section-title">Your Active Modules</h2>
        <p class="section-subtitle">Click a module to enter its workspace.</p>

        <?php if (empty($modules)): ?>
        <div class="alert alert-error">No modules activated. <a href="/register">Update your account</a> to enable modules.</div>
        <?php else: ?>
        <div class="card-grid">
            <?php foreach ($modules as $key => $module): ?>
            <a href="/modules/<?= $key ?>" class="card" style="text-decoration:none;color:inherit;">
                <span class="badge badge-<?= $module['category'] === 'industry' ? 'industry' : 'core' ?>">
                    <?= $module['category'] === 'industry' ? 'Industry' : 'Core' ?>
                </span>
                <h3 style="margin-top:.75rem;"><?= htmlspecialchars($module['name']) ?></h3>
                <p><?= htmlspecialchars($module['description']) ?></p>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div style="margin-top:2rem;">
            <a href="/core" class="btn btn-outline btn-sm">Browse Core Modules</a>
            <a href="/industry" class="btn btn-outline btn-sm">Browse Industry Modules</a>
        </div>
    </div>
</section>
