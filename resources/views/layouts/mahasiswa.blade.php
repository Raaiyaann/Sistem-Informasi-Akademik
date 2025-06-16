<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD | @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .sidebar-gradient {
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        }
        
        .menu-item {
            transition: all 0.2s ease-in-out;
        }
        
        .menu-item:hover {
            background: rgba(59, 130, 246, 0.1);
            border-color: rgba(59, 130, 246, 0.3);
        }
        
        .menu-item.active {
            background: rgba(59, 130, 246, 0.15);
            border-color: rgba(59, 130, 246, 0.4);
        }
        
        .menu-item.active .menu-icon {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        }
        
        .logo-container {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-72 sidebar-gradient shadow-xl">
            <div class="h-full flex flex-col p-6">
                <!-- Logo Section -->
                <div class="mb-8 text-center">
                    <div class="logo-container w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <img src="{{ asset('storage/logo-untad.png') }}" alt="Logo Untad" class="w-10 h-10 object-contain">
                    </div>
                    <h1 class="text-2xl font-bold text-white mb-1">SIAKAD</h1>
                    <p class="text-slate-300 text-sm">Universitas Tadulako</p>
                    <div class="w-12 h-0.5 bg-blue-500 mx-auto mt-3 rounded-full"></div>
                </div>
                
                <!-- User Info -->
                <div class="bg-slate-800/50 rounded-xl p-4 mb-6 border border-slate-700">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-white font-medium text-sm">{{ Auth::user()->name ?? 'Mahasiswa' }}</div>
                            <div class="text-slate-400 text-xs">{{ Auth::user()->mahasiswa->nim ?? 'NIM: -' }}</div>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation Menu -->
                <nav class="flex-1 space-y-2">
                    <!-- Dashboard -->
                    <a href="{{ route('mahasiswa.dashboard') }}" 
                       class="menu-item {{ request()->routeIs('mahasiswa.dashboard') ? 'active' : '' }} flex items-center gap-3 p-3 rounded-lg text-white border border-transparent">
                        <div class="menu-icon w-9 h-9 bg-slate-700 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v3H8V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-medium text-sm">Dashboard</div>
                            <div class="text-xs text-slate-400">Beranda Utama</div>
                        </div>
                    </a>
                    
                    <!-- KRS -->
                    <a href="{{ route('krs.mahasiswa.index') }}" 
                       class="menu-item {{ request()->routeIs('krs.*') ? 'active' : '' }} flex items-center gap-3 p-3 rounded-lg text-white border border-transparent">
                        <div class="menu-icon w-9 h-9 bg-slate-700 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-medium text-sm">KRS</div>
                            <div class="text-xs text-slate-400">Kartu Rencana Studi</div>
                        </div>
                    </a>

                    <!-- Profile -->
                    <a href="{{ route('mahasiswa.profile') }}"
                       class="menu-item {{ request()->routeIs('mahasiswa.profile') ? 'active' : '' }} flex items-center gap-3 p-3 rounded-lg text-white border border-transparent">
                        <div class="menu-icon w-9 h-9 bg-slate-700 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-medium text-sm">Profile</div>
                            <div class="text-xs text-slate-400">Data Mahasiswa</div>
                        </div>
                    </a>
                </nav>
            </div>
        </aside>
        
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Your main content goes here -->
            @yield('content')
        </div>
    </div>
</body>
</html>