<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="text-3xl font-bold mb-4">Manajemen Skills</h1>
        <a href="<?= base_url('admin/dashboard/create_skill') ?>" class="bg-green-500 text-white px-4 py-2 rounded-md mb-4 inline-block">Tambah Skill Baru</a>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ikon</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (!empty($skills)): ?>
                        <?php foreach ($skills as $skill): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($skill['name']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($skill['category']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if (!empty($skill['icon'])): ?>
                                        <img src="<?= base_url('public/assets/icons/' . $skill['icon']) ?>" alt="<?= htmlspecialchars($skill['name']) ?>" class="w-8 h-8">
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                    <a href="#" class="text-red-600 hover:text-red-900">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada skill yang ditambahkan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>