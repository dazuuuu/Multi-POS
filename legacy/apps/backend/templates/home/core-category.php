<section class="module-hero">
    <div class="container">
        <a href="/" style="font-size:.9rem;">← Back to Home</a>
        <h1 style="margin-top:1rem;">Core System Modules</h1>
        <p style="color:var(--text-muted);max-width:600px;">These features are available to every business regardless of industry. Select the modules you need during account creation.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="card-grid">
            <?php foreach ($modules as $key => $module): ?>
            <a href="/modules/<?= $key ?>" class="card" style="text-decoration:none;color:inherit;">
                <div class="card-icon">📦</div>
                <h3><?= htmlspecialchars($module['name']) ?></h3>
                <p><?= htmlspecialchars($module['description']) ?></p>
                <span class="badge badge-core"><?= count($module['features']) ?> features</span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
