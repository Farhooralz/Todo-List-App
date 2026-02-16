<x-layout title="Create Task">
    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h1 class="card-title text-2xl mb-6">➕ Create New Task</h1>
                
                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf
                    
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text font-semibold">Title</span>
                        </label>
                        <input type="text" name="title" value="{{ old('title') }}" 
                               class="input input-bordered w-full @error('title') input-error @enderror" required>
                        @error('title')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text font-semibold">Description</span>
                        </label>
                        <textarea name="description" rows="4" 
                                  class="textarea textarea-bordered w-full @error('description') textarea-error @enderror"
                                  placeholder="Optional details...">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-control mb-6">
                        <label class="label">
                            <span class="label-text font-semibold">Due Date</span>
                        </label>
                        <input type="date" name="due_date" value="{{ old('due_date') }}" 
                               class="input input-bordered w-full @error('due_date') input-error @enderror">
                        @error('due_date')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="card-actions justify-end space-x-3">
                        <a href="{{ route('tasks.index') }}" class="btn btn-ghost">❌ Cancel</a>
                        <button type="submit" class="btn btn-primary">✅ Create Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
