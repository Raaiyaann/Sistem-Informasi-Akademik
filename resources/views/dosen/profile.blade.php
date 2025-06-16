@extends('layouts.dosen')

@section('content')
    <div class="text-black flex flex-col md:w-2/3 lg:w-1/2 gap-4 px-6 py-4 bg-white border border-t-4 border-zinc-800 shadow col-span-3 md:col span-2">
        <div class="flex flex-col gap-2">
            <div class="font-semibold">UserName</div>
            <div class="px-3 py-2 border border-zinc-300">{{ $user->username }}</div>
        </div>
        <div class="flex flex-col gap-2">
            <div class="font-semibold">Role</div>
            <div class="px-3 py-2 border border-zinc-300">{{ $user->role }}</div>
        </div>
        <form action="{{ route("auth.logout") }}" method="POST" class="self-end mt-4">
            @CSRF
            @method("delete")
            <button type="submit"
            class="bg-red-50 border border-red-500 text-red-500 px-3 py-1 text-sm cursor-pointer">Logout</button>
        </form>
        
    </div>
@endsection