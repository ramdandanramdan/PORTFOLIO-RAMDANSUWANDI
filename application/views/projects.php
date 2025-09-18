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

    /* Keyframe untuk efek glow kedap-kedip pada hover */
    @keyframes flicker-glow-hover {
        0%, 100% {
            box-shadow: 0 0 20px rgba(255, 0, 255, 0.7), 0 0 10px rgba(64, 224, 208, 0.5);
        }
        50% {
            box-shadow: 0 0 10px rgba(255, 0, 255, 0.5), 0 0 5px rgba(64, 224, 208, 0.3);
        }
    }
    
    /* Style untuk setiap kartu proyek */
    .project-card {
        position: relative;
        padding: 1.5rem;
        background: rgba(13, 17, 23, 0.7);
        border: 1px solid #2d3748;
        border-radius: 1.5rem; /* rounded-3xl */
        text-align: left;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 0 5px rgba(255, 0, 255, 0.1);
        transform-style: preserve-3d;
        flex: 1 1 180px;
    }

    .project-card:hover {
        /* Efek 3D hanya maju ke depan */
        transform: scale(1.05) translateZ(100px);
        border-color: #fuchsia;
        animation: flicker-glow-hover 0.5s infinite alternate;
        z-index: 10;
    }

    .perspective-1000 {
        perspective: 1000px;
    }
</style>

<div class="container mx-auto px-4 py-16 pt-32">
    <h2 class="text-4xl font-bold text-center mb-12 neon-text flicker-text">Proyek</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 perspective-1000">
        <?php if (!empty($projects)): ?>
            <?php foreach ($projects as $project): ?>
                <div class="project-card flex flex-col justify-between">
                    <?php if (!empty($project['image'])): ?>
                        <img src="<?= base_url('public/uploads/projects/' . $project['image']) ?>" alt="<?= htmlspecialchars($project['title']) ?>" class="w-full h-48 object-cover rounded-xl mb-4 border border-fuchsia-400">
                    <?php endif; ?>
                    <h3 class="text-2xl font-bold text-cyan-400 mb-2"><?= htmlspecialchars($project['title']) ?></h3>
                    <p class="text-gray-300 mb-4 flex-grow"><?= htmlspecialchars($project['description']) ?></p>
                    <a href="<?= htmlspecialchars($project['link']) ?>" target="_blank" class="inline-block text-white bg-fuchsia-400 px-4 py-2 rounded-full mt-auto self-start hover:bg-white hover:text-gray-900 transition-colors duration-300">Lihat Proyek &rarr;</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-gray-500 col-span-full">Belum ada proyek yang ditambahkan.</p>
        <?php endif; ?>
    </div>
</div>