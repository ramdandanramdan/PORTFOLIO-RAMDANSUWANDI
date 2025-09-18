<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="text-3xl font-bold mb-4">Manajemen Pencapaian</h1>
        <a href="<?= base_url('admin/dashboard/create_achievement') ?>" class="bg-green-500 text-white px-4 py-2 rounded-md mb-4 inline-block">Tambah Pencapaian Baru</a>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Link</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (!empty($achievements)): ?>
                        <?php foreach ($achievements as $achievement): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($achievement['title']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($achievement['description']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if (!empty($achievement['link'])): ?>
                                        <a href="<?= htmlspecialchars($achievement['link']) ?>" target="_blank" class="text-blue-500 hover:underline">Lihat</a>
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
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada pencapaian yang ditambahkan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>