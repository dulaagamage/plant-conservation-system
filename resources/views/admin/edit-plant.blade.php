<x-app-layout>
    <div class="py-10">
        <div class="max-w-4xl mx-auto px-6">

            <h1 class="text-4xl font-black text-emerald-700 mb-8">
                ✏️ Edit Plant
            </h1>

            <form method="POST" action="{{ route('admin.plants.update', $plant) }}" class="bg-white rounded-3xl shadow-xl p-8 space-y-6">
                @csrf
                @method('PUT')

                <input name="name" value="{{ $plant->name }}" class="w-full rounded-2xl border-gray-300" required>

                <input name="scientific_name" value="{{ $plant->scientific_name }}" class="w-full rounded-2xl border-gray-300">

                <input name="category" value="{{ $plant->category }}" class="w-full rounded-2xl border-gray-300">

                <textarea name="uses" class="w-full rounded-2xl border-gray-300 h-28" required>{{ $plant->uses }}</textarea>

                <textarea name="description" class="w-full rounded-2xl border-gray-300 h-32">{{ $plant->description }}</textarea>

                <input name="image_url" value="{{ $plant->image_url }}" class="w-full rounded-2xl border-gray-300">

                <input name="conservation_status" value="{{ $plant->conservation_status }}" class="w-full rounded-2xl border-gray-300">

                <input name="habitat" value="{{ $plant->habitat }}" class="w-full rounded-2xl border-gray-300">

                <textarea name="ayurveda_uses" class="w-full rounded-2xl border-gray-300 h-28">{{ $plant->ayurveda_uses }}</textarea>

                <textarea name="research_notes" class="w-full rounded-2xl border-gray-300 h-28">{{ $plant->research_notes }}</textarea>

                <input name="active_compounds" value="{{ $plant->active_compounds }}" class="w-full rounded-2xl border-gray-300">

                <input name="garden_zone" value="{{ $plant->garden_zone }}" class="w-full rounded-2xl border-gray-300">

                <div class="flex gap-4">
                    <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-2xl font-bold">
                        Update Plant
                    </button>

                    <a href="{{ route('admin.plants') }}" class="px-8 py-3 rounded-2xl bg-gray-100 font-bold">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
