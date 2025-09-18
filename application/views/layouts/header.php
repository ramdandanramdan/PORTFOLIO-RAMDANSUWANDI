<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ramdan Suwandi - Cyberpunk Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #05050d;
            color: #d1d1e9;
            font-family: 'Fira Code', monospace;
            overflow-x: hidden;
            margin: 0;
        }
        canvas {
            position: fixed;
            top: 0;
            left: 0;
            display: block;
            z-index: -1;
        }

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

        /* Neon Glow Effect */
        .neon-text {
            text-shadow: 0 0 5px #40e0d0, 0 0 10px #40e0d0, 0 0 20px #40e0d0, 0 0 40px #40e0d0;
            color: #40e0d0;
            animation: pulse-neon 2.5s infinite alternate;
        }
        .neon-glow {
            box-shadow: 0 0 5px #fuchsia, 0 0 15px #fuchsia, 0 0 25px #fuchsia;
            animation: pulse-glow 3s infinite alternate;
        }
        .border-neon-cyan {
            border-color: #40e0d0;
            box-shadow: 0 0 5px #40e0d0;
        }
        .border-neon-fuchsia {
            border-color: #fuchsia;
            box-shadow: 0 0 5px #fuchsia;
        }

        /* Keyframe Animations */
        @keyframes pulse-neon {
            from { text-shadow: 0 0 5px #40e0d0, 0 0 10px #40e0d0; }
            to { text-shadow: 0 0 10px #40e0d0, 0 0 20px #40e0d0; }
        }
        @keyframes pulse-glow {
            from { box-shadow: 0 0 5px #fuchsia, 0 0 15px #fuchsia; }
            to { box-shadow: 0 0 10px #fuchsia, 0 0 25px #fuchsia; }
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-in {
            animation: fadeIn 1s ease-out;
        }
        
        /* Navbar with Cyberpunk Border */
        .glass-navbar {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            background-color: rgba(5, 5, 13, 0.6);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        .glass-navbar::before,
        .glass-navbar::after {
            content: '';
            position: absolute;
            height: 2px;
            background-color: #40e0d0;
            box-shadow: 0 0 8px #40e0d0;
        }
        .glass-navbar::before {
            top: 0;
            left: 0;
            width: 70%;
            transform: skewX(-30deg);
            transform-origin: bottom left;
        }
        .glass-navbar::after {
            bottom: 0;
            right: 0;
            width: 70%;
            transform: skewX(-30deg);
            transform-origin: bottom right;
        }
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #40e0d0;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease-out;
            box-shadow: 0 0 5px #40e0d0;
        }
        .nav-link:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }
    </style>
</head>
<body>
    <canvas id="bg-canvas"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/three@0.126.0/build/three.min.js"></script>
    <script>
        const canvas = document.getElementById('bg-canvas');
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(window.devicePixelRatio);

        camera.position.z = 50;
        const nodes = [];
        const lines = [];
        const numNodes = 100;
        for (let i = 0; i < numNodes; i++) {
            const geometry = new THREE.SphereGeometry(0.2, 8, 8);
            const material = new THREE.MeshBasicMaterial({ color: 0x40e0d0 });
            const node = new THREE.Mesh(geometry, material);
            node.position.x = (Math.random() - 0.5) * 100;
            node.position.y = (Math.random() - 0.5) * 100;
            node.position.z = (Math.random() - 0.5) * 100;
            scene.add(node);
            nodes.push(node);
        }
        const lineMaterial = new THREE.LineBasicMaterial({ color: 0xff00ff, transparent: true, opacity: 0.5 });
        const maxDistance = 15;
        for (let i = 0; i < numNodes; i++) {
            for (let j = i + 1; j < numNodes; j++) {
                const nodeA = nodes[i];
                const nodeB = nodes[j];
                const distance = nodeA.position.distanceTo(nodeB.position);
                if (distance < maxDistance) {
                    const lineGeometry = new THREE.BufferGeometry().setFromPoints([nodeA.position, nodeB.position]);
                    const line = new THREE.Line(lineGeometry, lineMaterial);
                    scene.add(line);
                    lines.push(line);
                }
            }
        }
        const animate = () => {
            requestAnimationFrame(animate);
            scene.rotation.y += 0.0005;
            scene.rotation.x += 0.0002;
            renderer.render(scene, camera);
        };
        animate();
        window.addEventListener('resize', () => {
            const width = window.innerWidth;
            const height = window.innerHeight;
            renderer.setSize(width, height);
            camera.aspect = width / height;
            camera.updateProjectionMatrix();
        });
    </script>
    
    <header class="fixed top-0 left-0 right-0 z-50 glass-navbar py-4">
        <nav class="container mx-auto px-6 flex justify-between items-center relative">
            <a href="<?= base_url('portofolio') ?>" class="text-2xl font-bold neon-text flicker-text py-2">
                <span class="text-fuchsia-400">MINI</span>-PORTFOLIO
            </a>
            
            <button id="mobile-menu-button" class="lg:hidden text-white focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path id="hamburger-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <div class="hidden lg:flex space-x-6 py-2">
                <a href="<?= base_url('portofolio/home') ?>" class="text-white hover:neon-text transition-all duration-200 nav-link">Home</a>
                <a href="<?= base_url('portofolio/about') ?>" class="text-white hover:neon-text transition-all duration-200 nav-link">About</a>
                <a href="<?= base_url('portofolio/skills') ?>" class="text-white hover:neon-text transition-all duration-200 nav-link">Skills</a>
                <a href="<?= base_url('portofolio/projects') ?>" class="text-white hover:neon-text transition-all duration-200 nav-link">Projects</a>
                <a href="<?= base_url('portofolio/achievements') ?>" class="text-white hover:neon-text transition-all duration-200 nav-link">Achievements</a>
                <a href="<?= base_url('portofolio/contact') ?>" class="text-white hover:neon-text transition-all duration-200 nav-link">Contact</a>
            </div>
        </nav>

        <div id="mobile-menu" class="hidden lg:hidden absolute top-full left-0 right-0 py-4 glass-navbar backdrop-blur-md">
            <div class="flex flex-col items-center space-y-4">
                <a href="<?= base_url('portofolio/home') ?>" class="text-white hover:neon-text transition-all duration-200 nav-link">Home</a>
                <a href="<?= base_url('portofolio/about') ?>" class="text-white hover:neon-text transition-all duration-200 nav-link">About</a>
                <a href="<?= base_url('portofolio/skills') ?>" class="text-white hover:neon-text transition-all duration-200 nav-link">Skills</a>
                <a href="<?= base_url('portofolio/projects') ?>" class="text-white hover:neon-text transition-all duration-200 nav-link">Projects</a>
                <a href="<?= base_url('portofolio/achievements') ?>" class="text-white hover:neon-text transition-all duration-200 nav-link">Achievements</a>
                <a href="<?= base_url('portofolio/contact') ?>" class="text-white hover:neon-text transition-all duration-200 nav-link">Contact</a>
            </div>
        </div>
    </header>
    <main class="relative z-10">
        
    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const closeIcon = document.getElementById('close-icon');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            hamburgerIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });

        // Menutup menu mobile saat tautan diklik
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                hamburgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            });
        });
    </script>