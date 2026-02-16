<x-layout title="{{ $task->title }}">
    <div class="max-w-2xl mx-auto space-y-6">
        <div class="card bg-base-100 shadow-xl {{ $task->is_completed ? 'border-l-8 border-success' : 'border-l-8 border-primary' }}">
            <div class="card-body">
                <div class="flex justify-between items-start mb-4">
                    <h1 class="text-3xl font-bold {{ $task->is_completed ? 'line-through opacity-60' : '' }}">
                        {{ $task->title }}
                    </h1>
                    <div class="badge badge-lg {{ $task->is_completed ? 'badge-success' : 'badge-warning' }}">
                        {{ $task->is_completed ? '✅ Completed' : '⏳ Pending' }}
                    </div>
                </div>

                @if($task->description)
                    <div class="mb-6 p-4 bg-base-200 rounded-lg">
                        <h3 class="font-semibold mb-2">Description</h3>
                        <p>{{ $task->description }}</p>
                    </div>
                @endif

                @if($task->due_date)
                    <div class="stats shadow bg-base-200">
                        <div class="stat">
                            <div class="stat-title">Due Date</div>
                            <div class="stat-value text-primary">{!! \Carbon\Carbon::parse($task->due_date)
                            ->format('M d, Y') !!}</div>
                        </div>
                    </div>
                @endif

                <div class="card-actions justify-end space-x-3 mt-6">
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-outline btn-primary">✏️ Edit</a>
                    <a href="{{ route('tasks.index') }}" class="btn btn-ghost">📋 Back to List</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
