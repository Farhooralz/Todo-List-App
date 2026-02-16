<x-layout title="All Tasks">
    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Add Task Button -->
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="flex justify-between items-center">
                    <h1 class="card-title text-2xl">📋 My Tasks ({{ $tasks->total() }})</h1>
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">➕ Add Task</a>
                </div>
            </div>
        </div>

        <!-- Tasks Table -->
        @if($tasks->count())
            <div class="grid gap-4">
                @foreach($tasks as $task)
                    <div class="card bg-base-100 shadow-xl {{ $task->is_completed ? 'border-l-8 border-success' : 'border-l-8 border-primary' }}">
                        <div class="card-body">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h3 class="font-bold text-xl {{ $task->is_completed ? 'line-through opacity-60' : '' }}">
                                        {{ $task->title }}
                                    </h3>
                                    @if($task->description)
                                        <p class="mt-2 text-base-content/70">{{ $task->description }}</p>
                                    @endif
                                    @if($task->due_date)
                                        <p class="mt-1 badge badge-info badge-outline">
                                            📅 {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="flex gap-2">
                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline">✏️ Edit</a>
                                    <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-error" onclick="return confirm('Delete?')">🗑️ Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body pt-4">
                    {{ $tasks->links() }}
                </div>
            </div>
        @else
            <div class="text-center py-12">
                <div class="hero min-h-48 bg-base-200 rounded-xl">
                    <div class="hero-content text-center">
                        <div class="max-w-md">
                            <h1 class="text-5xl font-bold">📭</h1>
                            <p class="py-5">No tasks yet. Create your first one!</p>
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary">➕ Add First Task</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-layout>
