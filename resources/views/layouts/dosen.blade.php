<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD | @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-red-950 via-red-800 to-gray-900 text-gray-100">


    <div class="flex min-h-screen w-full">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-100 text-gray-900 shadow-xl flex flex-col justify-between">
            <div class="p-6">
                <h1 class="text-2xl font-extrabold text-center text-red-800 mb-10">SIAKAD</h1>
                <nav class="space-y-3 text-sm font-semibold">
                    <a href="{{route("dosen.dashboard")}}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-red-200 @if(request()->is('dashboard')) bg-red-800 text-white @endif">
                        🏠 Dashboard
                    </a>
                    <a href="{{route("profile.dosen.index")}}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-red-200 @if(request()->is('profile*')) bg-red-800 text-white @endif">
                        🔐 Profile
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>
    </div>

</body>
</html>
