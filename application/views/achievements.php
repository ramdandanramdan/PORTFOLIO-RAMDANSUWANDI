<style>
    /* Keyframe untuk teks judul yang kedap-kedip */
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

    /* Style tambahan dari kode Anda */
    .hover\:shadow-cyan-neon:hover {
        box-shadow: 0 0 15px rgba(64, 224, 208, 0.7);
    }
</style>

<div class="container mx-auto px-4 py-16 pt-32">
    <h2 class="text-4xl font-bold text-center mb-12 neon-text flicker-text">Pencapaian</h2>
    <ul class="space-y-6">
        <?php if (!empty($achievements)): ?>
            <?php foreach ($achievements as $achievement): ?>
                <li class="relative p-4 bg-gray-900/50 rounded-xl border border-cyan-400 transition-all duration-300 transform hover:scale-105 hover:shadow-cyan-neon">
                    <h4 class="text-lg font-semibold text-white"><?= htmlspecialchars($achievement['title']) ?></h4>
                    <p class="text-sm text-gray-400 mb-2"><?= htmlspecialchars($achievement['description']) ?></p>
                    <?php if (!empty($achievement['link'])): ?>
                        <a href="<?= htmlspecialchars($achievement['link']) ?>" target="_blank" class="text-fuchsia-400 hover:text-white transition-colors text-sm">Lihat Sertifikat &rarr;</a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-gray-500">Belum ada pencapaian yang ditambahkan.</p>
        <?php endif; ?>
    </ul>
</div>