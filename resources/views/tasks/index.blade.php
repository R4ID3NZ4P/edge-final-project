<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('To-Do List') }}</h2>

                <!-- Form to add a new task -->
                <form action="{{ route('tasks.store') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="text" name="title" class="border px-4 py-2 rounded-lg" placeholder="New task" required>
                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg">Add Task</button>
                </form>

                <!-- List of tasks -->
                <ul class="mt-4">
                    @foreach ($tasks as $task)
                        <li class="flex justify-between items-center mt-2">
                            <span class="{{ $task->is_completed ? 'line-through' : '' }}">{{ $task->title }}</span>
                            <div>
                                <form action="{{ route('tasks.update', $task) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="ml-2 bg-green-500 text-white px-4 py-1 rounded-md">
                                        {{ $task->is_completed ? 'Undo' : 'Complete' }}
                                    </button>
                                </form>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ml-2 bg-red-500 text-white px-4 py-1 rounded-md">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>