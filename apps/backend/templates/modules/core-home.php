<section class="module-hero">
    <div class="container">
        <a href="/dashboard" style="font-size:.9rem;">← Back to Dashboard</a>
        <div style="display:flex;align-items:center;gap:1rem;margin-top:1rem;">
            <div class="card-icon" style="margin:0;">📦</div>
            <div>
                <h1><?= htmlspecialchars($module['name']) ?></h1>
                <p style="color:var(--text-muted);"><?= htmlspecialchars($module['description']) ?></p>
            </div>
        </div>
        <span class="badge badge-core" style="margin-top:1rem;display:inline-block;">Core Module · <?= $module['feature_count'] ?> features</span>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Available Features</h2>
        <p class="section-subtitle">This module workspace is ready for implementation. All features are registered and accessible.</p>

        <div class="feature-list">
            <?php foreach ($module['features'] as $feature): ?>
            <div class="feature-item"><?= htmlspecialchars(ucwords(str_replace('_', ' ', $feature))) ?></div>
            <?php endforeach; ?>
        </div>

        <div style="margin-top:2rem;padding:1.5rem;background:#eff6ff;border-radius:var(--radius);">
            <h3 style="margin-bottom:.5rem;">Module Status</h3>
            <p style="color:var(--text-muted);font-size:.9rem;">Backend module registered and enabled. Feature controllers and services can be built under <code>apps/backend/modules/core/<?= $module['key'] ?>/</code></p>
        </div>
    </div>
</section>
