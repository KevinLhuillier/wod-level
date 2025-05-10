@extends('layout')
@section('content')

    <div class="container mx-auto p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- User Information Card -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-700">
            <h2 class="text-xl font-semibold text-cyan-500 mb-4">User Information</h2>
            <p class="text-lg text-gray-300">Name: <span class="font-bold">{{ $user->name }}</span></p>
            <p class="text-lg text-gray-300">XP: <span class="font-bold">{{ $user->xp }}</span></p>
        </div>

        <!-- Rank Indicator Card -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-700">
            <h2 class="text-xl font-semibold text-cyan-500 mb-4">Rank</h2>
            <p class="text-lg text-gray-300">Rank:
                <span class="px-3 py-1 rounded-full
                @if($user->rank === 'Rx') bg-green-600
                @elseif($user->rank === 'Inter') bg-yellow-600
                @else bg-red-600
                @endif text-white">
                {{ $user->rank }}
            </span>
            </p>
            <form action="{{ route('dashboard.reset') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300">
                    Reset Level & Skills
                </button>
            </form>
        </div>

        <!-- PR Input Link Card -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-700 flex items-center justify-center">
            <a href="{{ route('pr.create') }}"
               class="px-6 py-3 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 transition duration-300 text-lg font-semibold">
                Enter PR
            </a>
        </div>
    </div>

    @if(session('status'))
        <div class="bg-green-600 text-white p-4 rounded-lg mb-4">
            {{ session('status') }}
        </div>
    @endif

@endsection
