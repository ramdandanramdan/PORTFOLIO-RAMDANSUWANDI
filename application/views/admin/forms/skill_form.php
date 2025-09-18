<style>
    /* Menggunakan kembali style neon-text dari halaman lain */
    @keyframes pulse-neon {
        from { text-shadow: 0 0 5px #40e0d0, 0 0 10px #40e0d0; }
        to { text-shadow: 0 0 10px #40e0d0, 0 0 20px #40e0d0; }
    }
    .neon-text {
        text-shadow: 0 0 5px #40e0d0, 0 0 10px #40e0d0, 0 0 20px #40e0d0, 0 0 40px #40e0d0;
        color: #40e0d0;
        animation: pulse-neon 2.5s infinite alternate;
    }

    /* Style tambahan untuk input file */
    .file-input-wrapper {
        display: inline-block;
        position: relative;
        overflow: hidden;
        border-radius: 0.375rem; /* rounded-md */
        transition: all 0.3s ease;
        background-color: #1a202c; /* bg-gray-800 */
        border: 1px solid #2d3748; /* border-gray-700 */
        color: #e2e8f0; /* text-gray-200 */
        cursor: pointer;
    }
    .file-input-wrapper:hover {
        background-color: #2d3748;
    }
    .file-input-wrapper input[type="file"] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
    }
    .file-input-label {
        padding: 0.5rem 1rem;
        display: block;
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<div class="p-4 sm:ml-64">
    <div class="p-8 rounded-xl border border-gray-700 bg-[#0d1117] shadow-lg">
        <h1 class="text-3xl font-bold mb-8 text-white neon-text">Tambah Skill Baru</h1>
        <form action="<?= base_url('admin/dashboard/store_skill') ?>" method="post" enctype="multipart/form-data" class="space-y-6">
            <div class="mb-4">
                <label for="name" class="block text-sm font-bold text-cyan-400 mb-2">Nama Skill</label>
                <input type="text" name="name" id="name" 
                       class="mt-1 p-3 bg-gray-800 text-white border border-gray-700 rounded-lg w-full focus:border-fuchsia-400 focus:ring-1 focus:ring-fuchsia-400 transition-colors duration-300" required>
            </div>
            <div class="mb-4">
                <label for="category" class="block text-sm font-bold text-cyan-400 mb-2">Kategori</label>
                <input type="text" name="category" id="category" 
                       class="mt-1 p-3 bg-gray-800 text-white border border-gray-700 rounded-lg w-full focus:border-fuchsia-400 focus:ring-1 focus:ring-fuchsia-400 transition-colors duration-300" required>
            </div>
            <div class="mb-4">
                <label for="skill_icon" class="block text-sm font-bold text-cyan-400 mb-2">Ikon Skill</label>
                <div class="file-input-wrapper">
                    <span class="file-input-label">Pilih File...</span>
                    <input type="file" name="skill_icon" id="skill_icon" class="mt-1">
                </div>
                <p class="mt-2 text-xs text-gray-400">Pastikan format file PNG, SVG, atau JPG.</p>
            </div>
            <div class="flex justify-end pt-4">
                <button type="submit" 
                        class="bg-fuchsia-400 text-gray-900 font-bold px-6 py-3 rounded-md shadow-md hover:bg-fuchsia-500 transition-colors duration-300 transform hover:scale-105">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>