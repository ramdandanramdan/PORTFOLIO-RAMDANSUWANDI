<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
<body>
<div class="flex">
    <aside class="sidebar w-64 min-h-screen p-6 border-r border-gray-700">
        <h1 class="text-3xl font-bold mb-8 text-white">Admin Panel</h1>
        <ul>
            <li class="mb-4"><a href="<?= base_url('admin/dashboard') ?>" class="text-gray-400 hover:text-white transition-colors duration-200">Dashboard</a></li>
            <li class="mb-4"><a href="<?= base_url('admin/dashboard/skills') ?>" class="text-gray-400 hover:text-white transition-colors duration-200">Kelola Skills</a></li>
            <li class="mb-4"><a href="<?= base_url('admin/dashboard/achievements') ?>" class="text-gray-400 hover:text-white transition-colors duration-200">Kelola Achievements</a></li>
        </ul>
    </aside>
    <main class="flex-1 p-8">
        ```