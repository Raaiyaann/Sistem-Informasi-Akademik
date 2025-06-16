@extends('layouts.app')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

.modern-container {
    font-family: 'Inter', sans-serif;
}

.floating-particles {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 1;
    pointer-events: none;
}

.particle {
    position: absolute;
    background: linear-gradient(45deg, #14b8a6, #0d9488, #0f766e);
    border-radius: 50%;
    animation: float-particle 25s infinite linear;
    opacity: 0.06;
}

.particle:nth-child(1) { width: 4px; height: 4px; left: 10%; animation-delay: 0s; }
.particle:nth-child(2) { width: 6px; height: 6px; left: 20%; animation-delay: 4s; }
.particle:nth-child(3) { width: 3px; height: 3px; left: 30%; animation-delay: 8s; }
.particle:nth-child(4) { width: 5px; height: 5px; left: 40%; animation-delay: 12s; }
.particle:nth-child(5) { width: 4px; height: 4px; left: 50%; animation-delay: 16s; }
.particle:nth-child(6) { width: 7px; height: 7px; left: 60%; animation-delay: 20s; }
.particle:nth-child(7) { width: 3px; height: 3px; left: 70%; animation-delay: 24s; }
.particle:nth-child(8) { width: 5px; height: 5px; left: 80%; animation-delay: 28s; }

@keyframes float-particle {
    0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
    10% { opacity: 0.06; }
    90% { opacity: 0.06; }
    100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
}

.glass-card {
    background: rgba(30, 41, 59, 0.8);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(148, 163, 184, 0.1);
    border-radius: 16px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
}

.stats-card {
    background: rgba(30, 41, 59, 0.6);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(148, 163, 184, 0.1);
    border-radius: 12px;
    padding: 1.5rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stats-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(20, 184, 166, 0.1), transparent);
    transition: left 0.5s;
}

.stats-card:hover::before {
    left: 100%;
}

.stats-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 40px rgba(20, 184, 166, 0.15);
    border-color: rgba(20, 184, 166, 0.3);
}

.modern-table {
    background: rgba(30, 41, 59, 0.6);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(148, 163, 184, 0.1);
    border-radius: 16px;
    overflow: hidden;
}

.table-header {
    background: rgba(15, 23, 42, 0.8);
    border-bottom: 1px solid rgba(148, 163, 184, 0.1);
}

.table-row {
    border-bottom: 1px solid rgba(148, 163, 184, 0.1);
    transition: all 0.2s ease;
}

.table-row:hover {
    background: rgba(20, 184, 166, 0.05);
}

.table-row:last-child {
    border-bottom: none;
}

.add-button {
    background: linear-gradient(135deg, #14b8a6, #0d9488);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(20, 184, 166, 0.3);
    position: relative;
    overflow: hidden;
}

.add-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.add-button:hover::before {
    left: 100%;
}

.add-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(20, 184, 166, 0.4);
    background: linear-gradient(135deg, #0d9488, #0f766e);
}

.edit-button {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 500;
    font-size: 0.75rem;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
}

.edit-button:hover {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    color: white;
    text-decoration: none;
}

.delete-button {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 500;
    font-size: 0.75rem;
    transition: all 0.3s ease;
    cursor: pointer;
}

.delete-button:hover {
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
}

.role-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: capitalize;
}

.role-mahasiswa {
    background: rgba(59, 130, 246, 0.2);
    color: #60a5fa;
    border: 1px solid rgba(59, 130, 246, 0.3);
}

.role-dosen {
    background: rgba(168, 85, 247, 0.2);
    color: #c084fc;
    border: 1px solid rgba(168, 85, 247, 0.3);
}

.role-admin {
    background: rgba(20, 184, 166, 0.2);
    color: #5eead4;
    border: 1px solid rgba(20, 184, 166, 0.3);
}

.icon-orange {
    background: linear-gradient(135deg, #f97316, #ea580c);
}

.icon-purple {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.icon-teal {
    background: linear-gradient(135deg, #14b8a6, #0d9488);
}

.number-badge {
    background: linear-gradient(135deg, #f97316, #ea580c);
    color: white;
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.875rem;
}

.user-avatar {
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    color: white;
    font-size: 0.875rem;
}

.avatar-mahasiswa {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
}

.avatar-dosen {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.avatar-admin {
    background: linear-gradient(135deg, #14b8a6, #0d9488);
}
</style>

<div class="modern-container min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white p-6">
    
    <!-- Floating Particles Background -->
    <div class="floating-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Background Gradient Orbs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-teal-400/10 to-teal-600/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-tr from-teal-500/10 to-teal-700/10 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto space-y-6">
        
        <!-- Header Section -->
        <div class="glass-card p-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-white mb-2">Data User</h2>
                    <p class="text-gray-400">Kelola informasi pengguna dalam sistem</p>
                </div>
                <a href="{{ route('user.create') }}" class="add-button">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah User
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="stats-card">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 icon-orange rounded-xl flex items-center justify-content-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm">Total User</p>
                        <p class="text-white text-2xl font-bold">{{ count($users) }}</p>
                    </div>
                </div>
            </div>

            <div class="stats-card">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 icon-purple rounded-xl flex items-center justify-content-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm">User Aktif</p>
                        <p class="text-white text-2xl font-bold">{{ count($users) }}</p>
                    </div>
                </div>
            </div>

            <div class="stats-card">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 icon-teal rounded-xl flex items-center justify-content-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm">Total Role</p>
                        <p class="text-white text-2xl font-bold">3</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="glass-card p-6">
            <h3 class="text-xl font-semibold text-white mb-6">Daftar User</h3>
            
            <div class="modern-table">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="table-header">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">No</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Username</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-300 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                            <tr class="table-row">
                                <td class="px-6 py-4">
                                    <div class="number-badge">
                                        {{ $loop->iteration }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="user-avatar 
                                            @if($u->role == 'mahasiswa') avatar-mahasiswa
                                            @elseif($u->role == 'dosen') avatar-dosen
                                            @else avatar-admin
                                            @endif">
                                            {{ strtoupper(substr($u->username, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="text-white font-medium">{{ $u->username }}</p>
                                            <p class="text-gray-400 text-sm">{{ $u->role }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-white font-medium">
                                        @if ($u->role == 'mahasiswa' && $u->mahasiswa)
                                            {{ $u->mahasiswa->nama }}
                                        @elseif ($u->role == 'dosen' && $u->dosen)
                                            {{ $u->dosen->nama }}
                                        @else
                                            <span class="text-gray-400 italic">Nama tidak ditemukan</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="role-badge 
                                        @if($u->role == 'mahasiswa') role-mahasiswa
                                        @elseif($u->role == 'dosen') role-dosen
                                        @else role-admin
                                        @endif">
                                        {{ $u->role }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('user.edit', $u->id) }}" class="edit-button">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('user.destroy', $u->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus user ini?')">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="delete-button">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
