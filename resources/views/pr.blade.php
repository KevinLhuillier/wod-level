@extends('layout')
@section('content')

    <div class="container mx-auto p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($skills as $skill)
            <!-- Skill Card -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-gray-700 relative">
                <!-- Last PR and Date -->
                @if ($skill->pr_data && $skill->updated_at)
                    <div class="absolute top-4 right-4 text-right">
                        <p class="text-l text-gray-400">Last PR: <span class="text-white font-semibold">{{ $skill->pr_data }}</span></p>
                        <p class="text-l text-gray-400">Updated: {{ \Carbon\Carbon::parse($skill->updated_at)->format('d/m/Y') }}</p>
                    </div>
                @endif

                <!-- Skill Category Label -->
                <span class="text-sm px-3 py-1 rounded-full
                    @if($skill->type === 'Weightlifting') bg-orange-600
                    @elseif($skill->type === 'Gym') bg-red-600
                    @else bg-blue-600
                    @endif text-white">
                    {{ $skill->type }}
                </span>

                <!-- Skill Name -->
                <h2 class="text-xl font-semibold text-cyan-500 mt-4 mb-4">{{ $skill->name }}</h2>

                <!-- PR Input Form -->
                <form action="{{ route('pr.store', $skill->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="pr_{{ $skill->id }}" class="block text-gray-300 mb-2">Enter PR</label>
                        <input  type="number" name="pr" id="pr_{{ $skill->id }}" class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="Enter PR value">
                    </div>
                    <button type="submit" class="px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 transition duration-300">
                        Save PR
                    </button>
                </form>
                <!-- Success Message -->
                @if (session('success') && session('skill_id') == $skill->id)
                    <div class="absolute bottom-4 right-4 bg-green-600 text-white text-sm px-4 py-2 rounded-lg shadow-lg">
                        {{ session('success') }}
                    </div>
                @endif

            </div>
        @endforeach
    </div>

@endsection
