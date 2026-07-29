<section class="module-hero">
    <div class="container">
        <a href="/dashboard" style="font-size:.9rem;">← Back to Dashboard</a>
        <div style="display:flex;align-items:center;gap:1rem;margin-top:1rem;">
            <div class="card-icon" style="margin:0;">🏭</div>
            <div>
                <h1><?= htmlspecialchars($module['name']) ?></h1>
                <p style="color:var(--text-muted);"><?= htmlspecialchars($module['description']) ?></p>
            </div>
        </div>
        <span class="badge badge-industry" style="margin-top:1rem;display:inline-block;">Industry Module · <?= $module['feature_count'] ?> features</span>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php if (!empty($module['submodules'])): ?>
            <?php foreach ($module['submodules'] as $subKey => $submodule): ?>
            <div class="submodule-section" <?= $subKey === array_key_first($module['submodules']) ? 'style="margin-top:0;padding-top:0;border:none;"' : '' ?>>
                <h3><?= htmlspecialchars($submodule['name']) ?></h3>
                <div class="feature-list">
                    <?php foreach ($submodule['features'] as $feature): ?>
                    <div class="feature-item"><?= htmlspecialchars(ucwords(str_replace('_', ' ', $feature))) ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
        <div class="feature-list">
            <?php foreach ($module['features'] as $feature): ?>
            <div class="feature-item"><?= htmlspecialchars(ucwords(str_replace('_', ' ', $feature))) ?></div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div style="margin-top:2rem;padding:1.5rem;background:#fdf2f8;border-radius:var(--radius);">
            <h3 style="margin-bottom:.5rem;">Industry Module Status</h3>
            <p style="color:var(--text-muted);font-size:.9rem;">Backend module registered and enabled. Industry-specific controllers can be built under <code>apps/backend/modules/industry/<?= $module['key'] ?>/</code></p>
        </div>
    </div>
</section>
