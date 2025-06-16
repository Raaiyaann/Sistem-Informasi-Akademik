@extends('layouts.dosen')

@section('content')
<div class="min-h-screen w-full bg-white text-gray-900 p-10 flex flex-col justify-between rounded-r-xl shadow-lg">

    <!-- Header -->
    <div>
        <h1 class="text-3xl font-extrabold mb-3">
            Selamat Datang, 
            <span class="font-extrabold text-red">[ {{$user->username}} ]</span>
        </h1>
        <p class="text-sm text-gray-600 mb-8">Tahun ajaran 2025/2026</p>

    </div>

</div>
@endsection
