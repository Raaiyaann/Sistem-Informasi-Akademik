<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD | @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg border-r border-gray-200 flex flex-col relative">
            <!-- Header -->
            <div class="p-6 border-b border-gray-200">
                <div class="text-center">
                    <h1 class="text-2xl font-bold text-gray-800 mb-1">SIAKAD</h1>
                    <p class="text-sm text-gray-500">SISTEM - INFORMASI - AKADEMIK</p>
                </div>
                <!-- User Info (sidebar only, compact) -->
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg mt-6">
                    <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                        <i data-lucide="user" class="w-4 h-4 text-white"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Admin</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="p-4 space-y-2 flex-1">
                <a href="{{route('admin.dashboard')}}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200 @if(request()->is('dashboard')) bg-blue-50 text-blue-600 border-r-2 border-blue-600 @endif">
                    <i data-lucide="home" class="w-5 h-5"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                
                <a href="{{route('mahasiswa.index')}}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200 @if(request()->is('mahasiswa*')) bg-blue-50 text-blue-600 border-r-2 border-blue-600 @endif">
                    <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                    <span class="font-medium">Mahasiswa</span>
                </a>
                
                <a href="{{route('dosen.index')}}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200 @if(request()->is('dosen*')) bg-blue-50 text-blue-600 border-r-2 border-blue-600 @endif">
                    <i data-lucide="user-check" class="w-5 h-5"></i>
                    <span class="font-medium">Dosen</span>
                </a>
                
                <a href="{{route('prodi.index')}}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200 @if(request()->is('prodi*')) bg-blue-50 text-blue-600 border-r-2 border-blue-600 @endif">
                    <i data-lucide="building-2" class="w-5 h-5"></i>
                    <span class="font-medium">Program Studi</span>
                </a>
                
                <a href="{{route('matakuliah.index')}}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200 @if(request()->is('matakuliah*')) bg-blue-50 text-blue-600 border-r-2 border-blue-600 @endif">
                    <i data-lucide="book-open" class="w-5 h-5"></i>
                    <span class="font-medium">Mata Kuliah</span>
                </a>
                
                <a href="{{route('kelas.index')}}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200 @if(request()->is('kelas*')) bg-blue-50 text-blue-600 border-r-2 border-blue-600 @endif">
                    <i data-lucide="users" class="w-5 h-5"></i>
                    <span class="font-medium">Kelas</span>
                </a>
                
                <a href="{{route('jadwal.index')}}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200 @if(request()->is('jadwal*')) bg-blue-50 text-blue-600 border-r-2 border-blue-600 @endif">
                    <i data-lucide="calendar" class="w-5 h-5"></i>
                    <span class="font-medium">Jadwal</span>
                </a>
            </nav>
            
            <!-- Bottom Section (sidebar only, no overflow) -->
            <div class="border-t border-gray-200 bg-white px-4 py-2">
                <a href="{{route('profile.admin.index')}}" 
                   class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200 @if(request()->is('profile*')) bg-gray-50 @endif">
                    <i data-lucide="user" class="w-5 h-5"></i>
                    <span class="font-medium">Profile</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                        <p class="text-gray-600 mt-1">@yield('page-description', 'Selamat datang di Sistem Informasi Akademik')</p>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <!-- Notification Bell -->
                        <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i data-lucide="bell" class="w-5 h-5"></i>
                        </button>
                        
                        <!-- User Avatar -->
                        <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                            <i data-lucide="user" class="w-4 h-4 text-white"></i>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Content -->
            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>

</body>
</html>