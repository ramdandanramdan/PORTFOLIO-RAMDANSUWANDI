<style>
    /* Menggunakan kembali keyframe untuk teks kedap-kedip */
    @keyframes flicker-neon {
        0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
            text-shadow: 0 0 5px #40e0d0, 0 0 10px #40e0d0, 0 0 20px #40e0d0;
            color: #40e0d0;
            opacity: 1;
        }
        20%, 24%, 55% {
            text-shadow: none;
            color: #40e0d0;
            opacity: 0.3;
        }
        40% {
            text-shadow: 0 0 10px #40e0d0, 0 0 20px #40e0d0, 0 0 40px #40e0d0;
            opacity: 1;
        }
    }

    .flicker-text {
        animation: flicker-neon 4s infinite;
    }

    /* Keyframe baru untuk efek glow kedap-kedip pada hover */
    @keyframes flicker-glow-hover {
        0%, 100% {
            box-shadow: 0 0 20px rgba(255, 0, 255, 0.7), 0 0 10px rgba(64, 224, 208, 0.5);
        }
        50% {
            box-shadow: 0 0 10px rgba(255, 0, 255, 0.5), 0 0 5px rgba(64, 224, 208, 0.3);
        }
    }
    
    /* Style untuk setiap kartu skill */
    .skill-card {
        position: relative;
        padding: 1.5rem; /* Tambahkan padding yang lebih baik */
        background: rgba(13, 17, 23, 0.7);
        border: 1px solid #2d3748;
        border-radius: 1rem;
        text-align: center;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 0 5px rgba(255, 0, 255, 0.1);
        transform-style: preserve-3d;
        flex: 1 1 180px; /* Membuat kartu lebih responsif */
        max-width: 200px;
    }

    .skill-card:hover {
        transform: scale(1.1) rotateY(10deg) translateZ(50px);
        border-color: #fuchsia;
        animation: flicker-glow-hover 0.5s infinite alternate;
        z-index: 10;
    }

    .perspective-1000 {
        perspective: 1000px;
    }
</style>

<div class="container mx-auto px-4 py-16 pt-32">
    <h2 class="text-4xl font-bold text-center mb-12 neon-text flicker-text">Keterampilan</h2>
    <div class="flex flex-wrap justify-center gap-6 perspective-1000">
        <?php if (!empty($skills)): ?>
            <?php foreach ($skills as $skill): ?>
                <div class="skill-card">
                    <?php if (!empty($skill['icon'])): ?>
                        <img src="<?= base_url('public/assets/icons/' . $skill['icon']) ?>" alt="<?= htmlspecialchars($skill['name']) ?>" class="w-16 h-16 mx-auto mb-4 object-contain">
                    <?php endif; ?>
                    <p class="font-bold text-lg text-cyan-400 mb-1"><?= htmlspecialchars($skill['name']) ?></p>
                    <p class="text-xs text-gray-400 font-semibold"><?= htmlspecialchars($skill['category']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-gray-500 col-span-full">Belum ada keterampilan yang ditambahkan.</p>
        <?php endif; ?>
    </div>
</div>