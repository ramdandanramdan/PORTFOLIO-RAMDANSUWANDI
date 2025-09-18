<style>
    /* Menghapus animasi border kotak yang berputar */
    @keyframes pulse-glow {
        from {
            box-shadow: 0 0 10px #40e0d0, 0 0 20px #40e0d0, 0 0 30px #fuchsia;
        }
        to {
            box-shadow: 0 0 20px #40e0d0, 0 0 40px #40e0d0, 0 0 50px #fuchsia;
        }
    }
    
    .glowing-image {
        position: relative;
        transition: transform 0.3s ease-in-out;
        box-shadow: 0 0 20px rgba(64, 224, 208, 0.5); /* Efek glow statis */
        animation: pulse-glow 2.5s infinite alternate ease-in-out;
    }
    .glowing-image:hover {
        transform: scale(1.05); /* Animasi scale saat hover */
    }

    /* Style lainnya yang sudah ada */
    .neon-text {
        text-shadow: 0 0 5px #40e0d0, 0 0 10px #40e0d0, 0 0 20px #40e0d0, 0 0 40px #40e0d0;
        color: #40e0d0;
    }
    
    /* Keyframe baru untuk efek kedap-kedip */
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

    /* Perubahan untuk card Pengalaman */
    .exp-card {
        background: #161b22;
        box-shadow: 0 0 15px rgba(255, 0, 255, 0.3);
        transition: box-shadow 0.3s ease;
    }
    .exp-card:hover {
        box-shadow: 0 0 25px rgba(255, 0, 255, 0.5), 0 0 20px rgba(64, 224, 208, 0.7);
    }
    
    /* --- EFEK GLITCH CYBERPUNK YANG LEBIH HALUS DAN KEREN --- */

    @keyframes subtle-glitch-in {
        0% {
            opacity: 0;
            transform: translateY(20px) scaleY(0.9);
            filter: blur(5px) saturate(200%);
            clip-path: inset(0 0 100% 0);
        }
        5% {
            filter: blur(0px) saturate(100%);
            clip-path: inset(0 0 0% 0);
        }
        10% {
            transform: translateY(0) skewX(2deg);
        }
        15%, 25%, 35%, 45% {
            transform: translateY(-2px) skewX(-2deg);
        }
        20%, 30%, 40% {
            transform: translateY(2px) skewX(2deg);
        }
        50% {
            transform: translateY(0);
        }
        60% {
            opacity: 0.8;
            filter: saturate(150%) hue-rotate(10deg);
        }
        100% {
            opacity: 1;
            transform: none;
            filter: none;
        }
    }

    /* Mengganti properti `transition` dengan `animation` pada saat `is-visible` */
    [data-aos] {
        opacity: 0;
        transition-property: none;
    }
    
    [data-aos].is-visible {
        opacity: 1;
        transform: none !important;
        animation: subtle-glitch-in 1.2s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
    }
    
    /* Menentukan delay untuk efek yang berurutan */
    [data-aos="fade-in-up"].is-visible {
        animation-delay: var(--aos-delay, 0s);
    }
    
    [data-aos="fade-in-left"].is-visible {
        animation-delay: var(--aos-delay, 0s);
    }
    
    [data-aos="fade-in-right"].is-visible {
        animation-delay: var(--aos-delay, 0s);
    }
</style>

<section id="hero" class="py-24 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="text-center md:text-left">
            <h1 class="text-5xl sm:text-6xl lg:text-8xl font-bold text-white mb-6 leading-tight" data-aos="fade-in-up" data-aos-delay="0">
                <span class="text-cyan-400">Hi!,</span> <br> I'M <span class="neon-text flicker-text">RAMDAN SUWANDI</span>
            </h1>
            <p class="text-base sm:text-lg text-gray-400 mb-10 max-w-lg mx-auto md:mx-0" data-aos="fade-in-up" data-aos-delay="200">
                “Thanks for visiting My Mini Portfolio. Saya sangat bersemangat untuk berbagi karya dan ide-ide saya dengan kalian. Mari kita bekerja sama untuk menciptakan proyek yang luar biasa. Let’s collaborate and achieve great results together!”
            </p>
            <div class="flex justify-center md:justify-start space-x-6" data-aos="fade-in-up" data-aos-delay="400">
                <a href="#projects" class="bg-fuchsia-400 text-gray-900 px-8 py-3 rounded-full font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">Lihat Proyek</a>
                <a href="#about" class="border-2 border-cyan-400 text-cyan-400 px-8 py-3 rounded-full font-bold hover:bg-cyan-400 hover:text-gray-900 transition-all duration-300 transform hover:scale-105">Tentang Saya</a>
            </div>
        </div>
        <div class="flex justify-center md:justify-end mt-8 md:mt-0" data-aos="fade-in-right">
            <div class="relative glowing-image w-[400px] h-[400px] sm:w-[500px] sm:h-[500px] lg:w-[600px] lg:h-[600px] flex items-center justify-center">
                <img src="<?= base_url('public/assets/images/rr.png') ?>" alt="Foto Profil" class="object-contain relative z-20 w-full h-full">
            </div>
        </div>
    </div>
</section>

---

<section id="about" class="py-24">
    <div class="container mx-auto px-4 text-center" data-aos="fade-in-up">
        <h2 class="text-5xl font-bold mb-12 neon-text flicker-text">Tentang Saya</h2>
        <div class="max-w-4xl mx-auto text-lg text-gray-400 leading-relaxed text-left">
            <p class="mb-4" data-aos="fade-in-up" data-aos-delay="200">
                Hello, I’m Ramdan Suwandi, a dedicated and passionate Informatics Engineering student at Krisnadwipayana University, class of 2021. Over the past three years, I’ve immersed myself in various aspects of technology and design, developing a deep passion for UI/UX, backend development, software engineering, graphic design, and more.
            </p>
            <p class="mb-4" data-aos="fade-in-up" data-aos-delay="400">
                I am always eager to take on new challenges and collaborate with like-minded individuals to create impactful and meaningful work. As I continue to grow and evolve in my career, I remain committed to learning, exploring, and pushing the boundaries of what’s possible in the tech and design fields.
            </p>
            <p data-aos="fade-in-up" data-aos-delay="600">
                Feel free to explore my portfolio to see a collection of my projects and accomplishments. I look forward to connecting and potentially collaborating on future endeavors.
            </p>
        </div>
    </div>
</section>

---

<section id="education" class="py-24 bg-[#0d1117]">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-5xl font-bold mb-12 neon-text flicker-text" data-aos="fade-in-up">Pendidikan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center max-w-6xl mx-auto">
            <div class="space-y-12 text-left" data-aos="fade-in-left">
                <div class="relative">
                    <h3 class="text-3xl font-bold text-white mb-2">SMPN 17 KOTA BEKASI</h3>
                    <p class="text-gray-400">Jl. Kemang Raya No.80, Jaticempaka, Kec. Pd. Gede, Kota Bks, Jawa Barat</p>
                    <p class="text-sm text-gray-500 mt-2">Jan 2015 - Jan 2017</p>
                </div>
                <div class="relative">
                    <h3 class="text-3xl font-bold text-white mt-4 mb-2">SMK BHAKTI PERSADA</h3>
                    <p class="text-gray-400">Jl. Antara Dalam, Jatimakmur, Kec. Pd. Gede, Kota Bks, Jawa Barat</p>
                    <p class="text-sm text-gray-500 mt-2">Teknologi Komputer & Jaringan</p>
                </div>
                <div class="relative">
                    <h3 class="text-3xl font-bold text-white mt-4 mb-2">UNIVERSITAS KRISNADWIPAYANA</h3>
                    <p class="text-gray-400">Jalan Raya Jatiwaringin, Jaticempaka, Kec. Pd. Gede, Kota Bks, Jawa Barat</p>
                    <p class="text-sm text-gray-500 mt-2">Informatics Engineering - 2021 - Sekarang</p>
                </div>
            </div>
            <div class="relative glowing-image w-full h-full rounded-lg" data-aos="fade-in-right">
                <img src="<?= base_url('public/assets/images/unkris.jpg') ?>" alt="Gambar Pendidikan" class="w-full h-full object-cover rounded-lg">
            </div>
        </div>
    </div>
</section>

---

<section id="experience" class="py-24">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-5xl font-bold mb-12 neon-text flicker-text" data-aos="fade-in-up">Pengalaman Organisasi</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center max-w-6xl mx-auto">
            <div class="relative glowing-image w-full h-full rounded-lg" data-aos="fade-in-left">
                <img src="<?= base_url('public/assets/images/unkris.jpg') ?>" alt="Gambar Organisasi" class="w-full h-full object-cover rounded-lg">
            </div>
            <div class="text-right space-y-8" data-aos="fade-in-right">
                <div class="relative">
                    <h3 class="text-3xl font-bold text-white mb-2">REKOR.ID (Rekan Kolaborasi Indonesia)</h3>
                    <p class="text-gray-400 mb-4">Pondok Gede, Bekasi – Indonesia | <span class="text-sm text-cyan-400">Jul 2025 - Sekarang</span></p>
                    <p class="text-xl font-bold text-fuchsia-400 mb-4">Co-Founder & IT Specialist</p>
                    <ul class="list-none space-y-2 text-base text-right ml-auto">
                        <li>Sebagai Co-Founder dan IT Specialist di REKOR.ID, saya memimpin inisiatif teknologi, memastikan platform digital, sistem data, dan alat kolaboratif dikelola secara efektif untuk mendukung kegiatan organisasi.</li>
                        <li>REKOR.ID dimulai sebagai gerakan sosial akar rumput dan telah berkembang menjadi platform yang diakui untuk pendidikan, keterlibatan sipil, dan kesadaran nasional.</li>
                        <li>Saya berkontribusi dengan membangun dan memelihara solusi IT yang memungkinkan transparansi, penanganan data yang aman, dan komunikasi yang andal.</li>
                        <li>Pengalaman ini tidak hanya mempertajam keahlian teknis saya tetapi juga memperkenalkan saya pada persimpangan teknologi, politik, dan hukum.</li>
                        <li>Memimpin operasi IT, termasuk membangun dan memelihara infrastruktur digital, sistem data yang aman, dan platform kolaboratif.</li>
                        <li>Mengembangkan dan meluncurkan SUARA-KITA (<a href="https://suara-kita-6q1e.vercel.app" target="_blank" class="text-cyan-400 hover:underline">suara-kita-6q1e.vercel.app</a>), platform web lengkap bagi warga untuk menyuarakan aspirasi.</li>
                        <li>Mengintegrasikan solusi IT ke dalam kampanye advokasi, forum publik, dan proyek jurnalistik.</li>
                        <li>Memperkuat kredibilitas organisasi dengan menggabungkan keahlian teknis dengan kesadaran akan isu-isu politik, hukum, dan sosial.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const aosDelay = entry.target.getAttribute('data-aos-delay') || '0';
                    entry.target.style.setProperty('--aos-delay', `${aosDelay}ms`);
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1 
        });

        document.querySelectorAll('[data-aos]').forEach(element => {
            observer.observe(element);
        });
    });
</script>