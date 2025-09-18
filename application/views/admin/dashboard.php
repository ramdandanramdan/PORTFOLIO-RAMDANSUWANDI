<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #0d1117;
            color: #c9d1d9;
            font-family: 'Fira Code', monospace;
        }
        .sidebar {
            background-color: #161b22;
        }
        .btn-neon-primary {
            background-color: #40e0d0;
            color: #0d1117;
            box-shadow: 0 0 10px #40e0d0;
            transition: all 0.3s ease;
        }
        .btn-neon-primary:hover {
            box-shadow: 0 0 20px #40e0d0, 0 0 30px #40e0d0;
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="flex">
    <aside class="sidebar w-64 min-h-screen p-6 border-r border-gray-700">
        <h1 class="text-3xl font-bold mb-8 text-white">Admin Panel</h1>
        <ul>
            <li class="mb-4"><a href="<?= base_url('admin/dashboard') ?>" class="text-gray-400 hover:text-white transition-colors duration-200">Dashboard</a></li>
            <li class="mb-4"><a href="<?= base_url('admin/dashboard/skills') ?>" class="text-gray-400 hover:text-white transition-colors duration-200">Kelola Skills</a></li>
            <li class="mb-4"><a href="<?= base_url('admin/dashboard/achievements') ?>" class="text-gray-400 hover:text-white transition-colors duration-200">Kelola Achievements</a></li>
        </ul>
    </aside>

    <main class="flex-1 p-8">
        <h2 class="text-4xl font-bold mb-8 text-white">Kelola Proyek</h2>
        <a href="<?= base_url('admin/dashboard/create') ?>" class="btn-neon-primary px-6 py-2 rounded-lg font-semibold inline-block mb-8">Tambah Proyek Baru</a>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left table-auto">
                <thead>
                    <tr class="bg-gray-800 text-gray-400 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Gambar</th>
                        <th class="py-3 px-6 text-left">Judul</th>
                        <th class="py-3 px-6 text-left">Deskripsi</th>
                        <th class="py-3 px-6 text-left">Link</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-300 text-sm font-light">
                    <?php if (!empty($projects)): ?>
                        <?php foreach ($projects as $project): ?>
                        <tr class="border-b border-gray-700 hover:bg-gray-700 transition-colors duration-200">
                            <td class="py-3 px-6">
                                <?php if (!empty($project['image'])): ?>
                                    <img src="<?= base_url('public/uploads/projects/' . $project['image']) ?>" alt="Gambar Proyek" class="w-16 h-16 object-cover rounded-md border border-gray-600">
                                <?php endif; ?>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap"><?= htmlspecialchars($project['title']) ?></td>
                            <td class="py-3 px-6 text-left"><?= substr(htmlspecialchars($project['description']), 0, 50) ?>...</td>
                            <td class="py-3 px-6 text-left"><a href="<?= htmlspecialchars($project['link']) ?>" target="_blank" class="text-blue-400 hover:underline">Link</a></td>
                            <td class="py-3 px-6 text-center">
                                <a href="<?= base_url('admin/dashboard/edit/' . $project['id']) ?>" class="bg-yellow-500 px-3 py-1 rounded-lg text-white font-semibold hover:bg-yellow-600 transition-colors duration-200">Edit</a>
                                <a href="<?= base_url('admin/dashboard/delete/' . $project['id']) ?>" class="bg-red-500 px-3 py-1 rounded-lg text-white ml-2 font-semibold hover:bg-red-600 transition-colors duration-200" onclick="return confirm('Apakah Anda yakin ingin menghapus proyek ini?');">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="py-10 text-center text-gray-500">Belum ada proyek yang ditambahkan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>