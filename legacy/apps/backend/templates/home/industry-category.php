<section class="module-hero">
    <div class="container">
        <a href="/" style="font-size:.9rem;">← Back to Home</a>
        <h1 style="margin-top:1rem;">Industry Modules</h1>
        <p style="color:var(--text-muted);max-width:600px;">Specialized modules for specific business types. Enable the industries that match your business during registration.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="card-grid">
            <?php
            $icons = [
                'restaurant_hotels' => '🍽️',
                'bar_liquor' => '🍷',
                'wholesale_retail' => '🏪',
                'supermarkets' => '🛒',
                'beauty_spa' => '💇',
                'agrovets_hardware' => '🔧',
                'healthcare' => '🏥',
            ];
            foreach ($modules as $key => $module):
                $featureCount = 0;
                foreach ($module['submodules'] ?? [] as $sub) {
                    $featureCount += count($sub['features'] ?? []);
                }
            ?>
            <a href="/modules/<?= $key ?>" class="card" style="text-decoration:none;color:inherit;">
                <div class="card-icon"><?= $icons[$key] ?? '🏭' ?></div>
                <h3><?= htmlspecialchars($module['name']) ?></h3>
                <p><?= htmlspecialchars($module['description']) ?></p>
                <span class="badge badge-industry"><?= count($module['submodules'] ?? []) ?> submodules · <?= $featureCount ?> features</span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
