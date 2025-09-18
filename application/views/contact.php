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

    .glass-effect {
        background: rgba(13, 17, 23, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }
</style>

<div class="container mx-auto px-4 py-16 pt-32 min-h-screen flex flex-col items-center">
    <h2 class="text-4xl font-bold text-center mb-4 neon-text flicker-text">Hubungi Saya</h2>
    <h4 class="text-xl text-center text-fuchsia-400 mb-8">Lets collaboration</h4>

    <div class="glass-effect p-8 rounded-3xl border border-fuchsia-400 shadow-xl max-w-4xl w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">
            <div class="flex flex-col justify-center space-y-6">
                <p class="text-lg text-gray-300">
                    Jika Anda memiliki pertanyaan, proposal proyek, atau sekadar ingin terhubung, jangan ragu untuk menghubungi saya melalui salah satu saluran di bawah ini.
                </p>

                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <span class="text-3xl text-cyan-400">📞</span>
                        <div>
                            <p class="font-semibold text-white">WhatsApp</p>
                            <a href="https://wa.me/6285890750820" class="text-gray-300 hover:text-fuchsia-400 transition-colors">085890750820</a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-3xl text-cyan-400">📷</span>
                        <div>
                            <p class="font-semibold text-white">Instagram</p>
                            <a href="https://www.instagram.com/ohmyliong" class="text-gray-300 hover:text-fuchsia-400 transition-colors">@ohmyliong</a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-3xl text-cyan-400">✉️</span>
                        <div>
                            <p class="font-semibold text-white">Email</p>
                            <a href="mailto:ramdansuwandi18@gmail.com" class="text-gray-300 hover:text-fuchsia-400 transition-colors">ramdansuwandi18@gmail.com</a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-3xl text-cyan-400">🔗</span>
                        <div>
                            <p class="font-semibold text-white">LinkedIn</p>
                            <a href="https://www.linkedin.com/in/ramdansuwandi/" target="_blank" class="text-gray-300 hover:text-fuchsia-400 transition-colors">linkedin.com/in/ramdansuwandi</a>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-2xl font-bold text-white mb-6 text-center lg:text-left">Kirim Pesan Langsung</h3>
                <form id="contact-form" onsubmit="return handleFormSubmit(event)" class="space-y-6">
                    <div>
                        <label for="name" class="block text-gray-400 mb-1">Nama Lengkap</label>
                        <input type="text" id="name" name="Nama Lengkap" class="w-full glass-effect border border-gray-700 rounded-md p-3 text-white focus:outline-none focus:border-cyan-400 transition-colors" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-400 mb-1">Alamat Email</label>
                        <input type="email" id="email" name="Alamat Email" class="w-full glass-effect border border-gray-700 rounded-md p-3 text-white focus:outline-none focus:border-cyan-400 transition-colors" placeholder="Masukkan email Anda" required>
                    </div>
                    <div>
                        <label for="message" class="block text-gray-400 mb-1">Pesan</label>
                        <textarea id="message" name="Pesan" rows="4" class="w-full glass-effect border border-gray-700 rounded-md p-3 text-white focus:outline-none focus:border-cyan-400 transition-colors" placeholder="Tuliskan pesan Anda di sini" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-cyan-400 text-gray-900 py-3 rounded-full font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function handleFormSubmit(event) {
        // Mencegah form untuk refresh halaman
        event.preventDefault();

        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const message = document.getElementById('message').value;

        const subject = encodeURIComponent('Pesan dari Portofolio Anda');
        const body = encodeURIComponent(
            `Nama: ${name}\n` +
            `Email: ${email}\n\n` +
            `Pesan:\n${message}`
        );
        
        // Membuat tautan mailto
        const mailtoLink = `mailto:ramdansuwandi18@gmail.com?subject=${subject}&body=${body}`;

        // Mengarahkan ke tautan mailto
        window.location.href = mailtoLink;
    }
</script>