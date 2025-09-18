<style>
    /* Keyframe untuk efek kedap-kedip */
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

    /* Efek glow untuk gambar */
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
        box-shadow: 0 0 20px rgba(64, 224, 208, 0.5);
        animation: pulse-glow 2.5s infinite alternate ease-in-out;
    }
    .glowing-image:hover {
        transform: scale(1.05);
    }
</style>

<div class="container mx-auto px-4 py-16 min-h-screen flex flex-col justify-center items-center text-center pt-32">
    <h2 class="text-4xl md:text-5xl font-bold mb-12 neon-text flicker-text">About Me</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 items-center">
        <div class="flex justify-center order-1 md:order-2">
            <div class="relative glowing-image w-full h-auto rounded-lg">
                <img src="<?= base_url('public/assets/images/r.png') ?>" alt="Gambar Ramdan Suwandi" class="w-full h-full object-cover rounded-lg">
            </div>
        </div>
        
        <div class="w-full bg-gray-800/60 backdrop-blur-sm p-8 rounded-3xl shadow-xl order-2 md:order-1 md:col-span-2">
            <h3 class="text-3xl font-bold text-cyan-400 mb-4">Short Bio</h3>
            <div class="text-gray-300 text-left leading-relaxed space-y-4">
                <p>
                    Hello, I’m **Ramdan Suwandi**, a dedicated and passionate Informatics Engineering student at **Krisnadwipayana University**. With a strong academic background in IT since vocational high school and continuous learning in my university studies, I have developed a solid foundation in technology.
                </p>
                <p>
                    My journey in the tech world began at a vocational high school, where I majored in Computer and Network Engineering. This provided me with a hands-on understanding of various technical skills, from network troubleshooting and hardware maintenance to software installation. A key experience during this time was a three-month internship as an IT Support and Assistant Lecturer at what is now Jakarta Global University (JGU), which sharpened my problem-solving abilities and communication skills in an academic setting. I also hold a competency certificate, which validates my technical skills.
                </p>
                <p>
                    My passion for technology has evolved and deepened over the years. I am particularly enthusiastic about Front-end Development, UI/UX Design, and the groundbreaking world of Web3 and blockchain. My professional experience, including a role as a Bulky Operator at Shopee Express Indonesia for more than one year, has further equipped me with valuable skills. In this role, I was responsible for data input and operational management, utilizing a laptop to handle data accurately via Excel and other software. This experience has instilled in me a strong sense of discipline, adaptability, and the ability to manage high-volume tasks in a fast-paced and challenging environment.
                </p>
                <p>
                    I am an active learner and am always seeking new challenges. I am eager to collaborate with like-minded individuals to create impactful projects. Feel free to explore my portfolio to see a collection of my projects and accomplishments. I look forward to connecting and potentially collaborating on future endeavors in the dynamic world of technology.
                </p>
            </div>
        </div>
    </div>
</div>