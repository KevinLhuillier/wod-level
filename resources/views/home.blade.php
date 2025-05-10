@extends('layout')
@section('content')

    <!-- Main Content -->
    <main class="flex-grow container mx-auto p-6">
        <!-- User Level and Rank -->
        <div class="flex items-center justify-center mb-8">
            <div class="relative w-32 h-32 flex-shrink-0">
                <div
                    class="absolute inset-0 bg-cyan-700 text-white text-6xl font-bold flex items-center justify-center shadow-xl"
                    style="clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);">
                    {{$user->level}}
                </div>
            </div>
            <div class="text-left ml-4">
                <p class="text-lg text-gray-400 m-0">{{$user->name}}</p>
                <span class="text-sm bg-gray-700 text-gray-300 px-3 py-1 rounded-full">{{$user->rank}}</span>
            </div>
        </div>

        <!-- Experience Bar -->
        <section class="mb-8">
            <h3 class="text-2xl font-semibold text-cyan-500 mb-4">Progression</h3>
            <div class="bg-gray-700 rounded-full h-6 relative overflow-hidden">
                <div class="bg-cyan-600 h-full rounded-full" style="width: {{$xpPercentage}}%;"></div>
                <span class="absolute inset-0 flex justify-center items-center text-sm font-semibold text-white">
                {{$user->xp}} / {{$xpNextLevel}} XP
            </span>
            </div>
        </section>

        <!-- Weight Task -->
        <section class="mb-8">
            <h3 class="text-2xl font-semibold text-cyan-500 mb-4">Weightlifting Task</h3>
            <ul class="space-y-4">
                    <li class="flex justify-between items-center bg-gray-800 p-4 rounded-lg shadow-lg border border-gray-700">
                        <div>
                            <span class="text-lg font-medium text-gray-300">{{ $weightTask->name }}</span>
                            <span
                                class="text-sm text-white bg-red-600 px-2 py-1 rounded-full mx-2">Stage {{ $weightTask->stage }}</span>
                            <span class="text-lg font-medium text-gray-300">{{ $weightTask->stage_label }}</span>
                            <span class="text-sm text-gray-400 ml-2">(+ {{ $weightTask->xp }} XP)</span>
                        </div>
                        {{--                        <form action="{{ route('tasks.complete', $task->id) }}" method="POST">--}}
                        <form action="{{ route('completeStage', ['skill' => $weightTask->skill_id, 'stage' => $weightTask->stage]) }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 transition duration-300">
                                Done
                            </button>
                        </form>

                    </li>
            </ul>
        </section>

        <!-- Gym Task -->
        <section class="mb-8">
            <h3 class="text-2xl font-semibold text-cyan-500 mb-4">Gym Task</h3>
            <ul class="space-y-4">
                <li class="flex justify-between items-center bg-gray-800 p-4 rounded-lg shadow-lg border border-gray-700">
                    <div>
                        <span class="text-lg font-medium text-gray-300">{{ $gymTask->name }}</span>
                        <span
                            class="text-sm text-white bg-red-600 px-2 py-1 rounded-full mx-2">Stage {{ $gymTask->stage }}</span>
                        <span class="text-lg font-medium text-gray-300">{{ $gymTask->stage_label }}</span>
                        <span class="text-sm text-gray-400 ml-2">(+ {{ $gymTask->xp }} XP)</span>
                    </div>
                    <form action="{{ route('completeStage', ['skill' => $gymTask->skill_id, 'stage' => $gymTask->stage]) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 transition duration-300">
                            Done
                        </button>
                    </form>

                </li>
            </ul>
        </section>

        <!-- Cardio Task -->
        <section class="mb-8">
            <h3 class="text-2xl font-semibold text-cyan-500 mb-4">Cardio Task</h3>
            <ul class="space-y-4">
                <li class="flex justify-between items-center bg-gray-800 p-4 rounded-lg shadow-lg border border-gray-700">
                    <div>
                        <span class="text-lg font-medium text-gray-300">{{ $cardioTask->name }}</span>
                        <span
                            class="text-sm text-white bg-red-600 px-2 py-1 rounded-full mx-2">Stage {{ $cardioTask->stage }}</span>
                        <span class="text-lg font-medium text-gray-300">{{ $cardioTask->stage_label }}</span>
                        <span class="text-sm text-gray-400 ml-2">(+ {{ $cardioTask->xp }} XP)</span>
                    </div>
                    {{--                        <form action="{{ route('tasks.complete', $task->id) }}" method="POST">--}}
                    <form action="{{ route('completeStage', ['skill' => $cardioTask->skill_id, 'stage' => $cardioTask->stage]) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 transition duration-300">
                            Done
                        </button>
                    </form>

                </li>
            </ul>
        </section>

        <!-- Priority Tasks -->
{{--        <section class="mb-8">--}}
{{--            <h3 class="text-2xl font-semibold text-cyan-500 mb-4">Priority Tasks</h3>--}}
{{--            <ul class="space-y-4">--}}
{{--                @foreach ($nextTasks as $task)--}}
{{--                    <li class="flex justify-between items-center bg-gray-800 p-4 rounded-lg shadow-lg border border-gray-700">--}}
{{--                        <div>--}}
{{--                            <span class="text-lg font-medium text-gray-300">{{ $task->name }}</span>--}}
{{--                            <span--}}
{{--                                class="text-sm text-white bg-red-600 px-2 py-1 rounded-full mx-2">Stage {{ $task->stage }}</span>--}}
{{--                            <span class="text-lg font-medium text-gray-300">{{ $task->stage_label }}</span>--}}
{{--                            <span class="text-sm text-gray-400 ml-2">(+ {{ $task->xp }} XP)</span>--}}
{{--                        </div>--}}
{{--                        --}}{{--                        <form action="{{ route('tasks.complete', $task->id) }}" method="POST">--}}
{{--                        <form action="{{ route('completeStage', ['skill' => $task->skill_id, 'stage' => $task->stage]) }}" method="POST">--}}
{{--                            @csrf--}}
{{--                            <button type="submit"--}}
{{--                                    class="px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 transition duration-300">--}}
{{--                                Done--}}
{{--                            </button>--}}
{{--                        </form>--}}

{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </section>--}}

        <!-- All Tasks -->
        <section class="mb-8">
            <h3 class="text-2xl font-semibold text-cyan-500 mb-4">All Tasks</h3>
            <ul class="space-y-4">
                @foreach ($allTasks as $task)
                    <li class="flex justify-between items-center bg-gray-800 p-4 rounded-lg shadow-lg border border-gray-700">
                        <div>
                            <span class="text-lg font-medium text-gray-300">{{ $task->name }}</span>
                            <span
                                class="text-sm text-white bg-red-600 px-2 py-1 rounded-full mx-2">Stage {{ $task->stage }}</span>
                            <span class="text-lg font-medium text-gray-300">{{ $task->stage_label }}</span>
                            <span class="text-sm text-gray-400 ml-2">(+ {{ $task->xp }} XP)</span>
                        </div>
                        {{--                        <form action="{{ route('tasks.complete', $task->id) }}" method="POST">--}}
                        <form action="{{ route('completeStage', ['skill' => $task->skill_id, 'stage' => $task->stage]) }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 transition duration-300">
                                Done
                            </button>
                        </form>

                    </li>
                @endforeach
            </ul>
        </section>
@endsection
