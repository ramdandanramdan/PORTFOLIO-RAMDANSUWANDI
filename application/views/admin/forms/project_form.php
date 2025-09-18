<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Proyek</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #0d1117; color: #c9d1d9; font-family: 'Fira Code', monospace; }
        .form-input { background-color: #161b22; border: 1px solid #30363d; color: #c9d1d9; }
        .btn-neon-primary { background-color: #40e0d0; color: #0d1117; box-shadow: 0 0 10px #40e0d0; transition: all 0.3s ease; }
        .btn-neon-primary:hover { transform: translateY(-2px); box-shadow: 0 0 20px #40e0d0, 0 0 30px #40e0d0; }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="bg-gray-800/60 p-8 rounded-lg shadow-xl w-full max-w-lg border border-cyan-400">
        <h2 class="text-3xl font-bold mb-6 text-center text-white"><?= isset($project) ? 'Edit Proyek' : 'Tambah Proyek Baru' ?></h2>
        
        <form action="<?= isset($project) ? base_url('admin/dashboard/update/' . $project['id']) : base_url('admin/dashboard/store') ?>" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="title" class="block text-gray-400">Judul Proyek</label>
                <input type="text" id="title" name="title" value="<?= isset($project) ? htmlspecialchars($project['title']) : '' ?>" class="form-input w-full p-2 mt-1 rounded" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-400">Deskripsi</label>
                <textarea id="description" name="description" class="form-input w-full p-2 mt-1 rounded h-32" required><?= isset($project) ? htmlspecialchars($project['description']) : '' ?></textarea>
            </div>
            <div class="mb-4">
                <label for="link" class="block text-gray-400">Link Website/GitHub</label>
                <input type="text" id="link" name="link" value="<?= isset($project) ? htmlspecialchars($project['link']) : '' ?>" class="form-input w-full p-2 mt-1 rounded">
            </div>
            <div class="mb-4">
                <label for="project_image" class="block text-gray-400">Gambar Proyek</label>
                <input type="file" id="project_image" name="project_image" class="form-input w-full p-2 mt-1 rounded">
                <?php if (isset($project) && !empty($project['image'])): ?>
                    <p class="text-xs text-gray-500 mt-2">Gambar saat ini: <img src="<?= base_url('public/uploads/projects/' . $project['image']) ?>" alt="Gambar Proyek" class="w-24 h-auto mt-2 rounded"></p>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn-neon-primary w-full px-4 py-2 mt-4 rounded font-semibold"><?= isset($project) ? 'Update Proyek' : 'Tambah Proyek' ?></button>
        </form>
        <a href="<?= base_url('admin/dashboard') ?>" class="block text-center mt-4 text-gray-400 hover:text-white transition-colors">Kembali ke Dashboard</a>
    </div>
</body>
</html>