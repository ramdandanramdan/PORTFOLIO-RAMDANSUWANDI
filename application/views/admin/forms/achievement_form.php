<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="text-3xl font-bold mb-4">Tambah Pencapaian Baru</h1>
        <form action="<?= base_url('admin/dashboard/store_achievement') ?>" method="post">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Pencapaian</label>
                <input type="text" name="title" id="title" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="4" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required></textarea>
            </div>
            <div class="mb-4">
                <label for="link" class="block text-sm font-medium text-gray-700">Link Sertifikat/Dokumen</label>
                <input type="url" name="link" id="link" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
            </div>
        </form>
    </div>
</div>