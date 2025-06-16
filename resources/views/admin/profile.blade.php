@extends('layouts.app')

@section('page-title', 'Profile')
@section('page-description', 'Kelola informasi akun Anda')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Profile Header -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl p-8 text-white">
        <div class="flex flex-col md:flex-row items-center gap-6">
            <!-- Avatar -->
            <div class="relative">
                <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center text-4xl backdrop-blur-sm border border-white/30">
                    👤
                </div>
                <div class="absolute -top-1 -right-1 w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center">
                    <svg class="w-3 h-3 text-yellow-800" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M5 16L3 6l5.5 4L12 4l3.5 6L21 6l-2 10H5zm2.7-2h8.6l.9-4.4L14 12l-2-3.4L10 12l-3.2-2.4L7.7 14z"/>
                    </svg>
                </div>
            </div>
            
            <!-- User Info -->
            <div class="text-center md:text-left">
                <h1 class="text-3xl font-bold mb-2">{{ $user->username }}</h1>
                <p class="text-blue-100 text-lg capitalize">{{ $user->role }}</p>
                <div class="flex items-center justify-center md:justify-start gap-2 mt-3">
                    <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                    <span class="text-blue-100 text-sm">Account Active</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Information -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Account Details -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-6 flex items-center gap-3">
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                Account Details
            </h2>
            
            <div class="space-y-4">
                <!-- Username -->
                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Username</label>
                    <p class="text-gray-900 font-medium">{{ $user->username }}</p>
                </div>
                
                <!-- Role -->
                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Role</label>
                    <div class="flex items-center gap-2">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full capitalize">
                            {{ $user->role }}
                        </span>
                    </div>
                </div>
                
                <!-- Account Created -->
                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Account Created</label>
                    <p class="text-gray-900">{{ $user->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Account Status -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-6 flex items-center gap-3">
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                Account Status
            </h2>
            
            <div class="space-y-4">
                <!-- Status Indicators -->
                <div class="grid grid-cols-1 gap-4">
                    <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg border border-green-200">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Account Active</p>
                                <p class="text-sm text-gray-600">Your account is active and verified</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Active</span>
                    </div>
                    
                    <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg border border-blue-200">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Data Protected</p>
                                <p class="text-sm text-gray-600">Your data is secure and encrypted</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Secured</span>
                    </div>
                    
                    <div class="flex items-center justify-between p-4 bg-purple-50 rounded-lg border border-purple-200">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Admin Access</p>
                                <p class="text-sm text-gray-600">Full system administration rights</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">Premium</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <!-- Logout Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Session Management</h3>
                <p class="text-gray-600 mt-1">Securely end your current session</p>
            </div>
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-medium flex items-center gap-2 transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>
@endsection