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
    border-radius: 20px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
    position: relative;
    overflow: hidden;
}

.glass-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(20, 184, 166, 0.1), transparent);
    transition: left 0.6s;
}

.glass-card:hover::before {
    left: 100%;
}

.form-group {
    position: relative;
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    color: #94a3b8;
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.form-input {
    width: 100%;
    padding: 1rem 1.25rem;
    background: rgba(15, 23, 42, 0.6);
    border: 1px solid rgba(148, 163, 184, 0.2);
    border-radius: 12px;
    color: white;
    font-size: 1rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.form-input:focus {
    outline: none;
    border-color: #14b8a6;
    box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.1);
    background: rgba(15, 23, 42, 0.8);
}

.form-input::placeholder {
    color: #64748b;
}

.form-select {
    width: 100%;
    padding: 1rem 1.25rem;
    background: rgba(15, 23, 42, 0.6);
    border: 1px solid rgba(148, 163, 184, 0.2);
    border-radius: 12px;
    color: white;
    font-size: 1rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    cursor: pointer;
}

.form-select:focus {
    outline: none;
    border-color: #14b8a6;
    box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.1);
    background: rgba(15, 23, 42, 0.8);
}

.form-select option {
    background: #1e293b;
    color: white;
    padding: 0.5rem;
}

.submit-button {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
    position: relative;
    overflow: hidden;
    cursor: pointer;
    width: 100%;
}

.submit-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.submit-button:hover::before {
    left: 100%;
}

.submit-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4);
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
}

.back-button {
    background: rgba(71, 85, 105, 0.6);
    color: #cbd5e1;
    border: 1px solid rgba(148, 163, 184, 0.2);
    padding: 0.75rem 1.5rem;
    border-radius: 12px;
    font-weight: 500;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    backdrop-filter: blur(10px);
}

.back-button:hover {
    background: rgba(71, 85, 105, 0.8);
    color: white;
    text-decoration: none;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(71, 85, 105, 0.3);
}

.header-icon {
    width: 4rem;
    height: 4rem;
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    animation: icon-float 3s ease-in-out infinite;
}

@keyframes icon-float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-5px); }
}

.form-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
    transition: color 0.3s ease;
}

.form-input:focus + .form-icon,
.form-select:focus + .form-icon {
    color: #14b8a6;
}

.input-with-icon {
    position: relative;
}

.input-with-icon .form-input,
.input-with-icon .form-select {
    padding-left: 3rem;
}

.user-info-card {
    background: rgba(20, 184, 166, 0.1);
    border: 1px solid rgba(20, 184, 166, 0.2);
    border-radius: 12px;
    padding: 1rem;
    margin-bottom: 1.5rem;
}

.user-avatar {
    width: 3rem;
    height: 3rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    color: white;
    font-size: 1.25rem;
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

    <div class="relative z-10 max-w-2xl mx-auto">
        
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('user.index') }}" class="back-button">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Data User
            </a>
        </div>

        <!-- Form Card -->
        <div class="glass-card p-8">
            
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="header-icon">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-white mb-2">Edit User</h2>
                <p class="text-gray-400">Perbarui informasi pengguna</p>
            </div>

            <!-- Current User Info -->
            <div class="user-info-card">
                <div class="flex items-center gap-4">
                    <div class="user-avatar">
                        {{ strtoupper(substr($user->username, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-white font-semibold">{{ $user->username }}</p>
                        <p class="text-teal-400 text-sm capitalize">{{ $user->role }}</p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('user.update', $user->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- Username Field -->
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <div class="input-with-icon">
                        <input 
                            type="text" 
                            name="username" 
                            value="{{ $user->username }}" 
                            class="form-input" 
                            required
                        >
                        <div class="form-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Role Field -->
                <div class="form-group">
                    <label class="form-label">Role Pengguna</label>
                    <div class="input-with-icon">
                        <select name="role" class="form-select" required>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="dosen" {{ $user->role == 'dosen' ? 'selected' : '' }}>Dosen</option>
                            <option value="mahasiswa" {{ $user->role == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                        </select>
                        <div class="form-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.414-4.414a2 2 0 010 2.828L11.828 15H9v-2.828l8.586-8.586a2 2 0 012.828 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="submit-button">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
