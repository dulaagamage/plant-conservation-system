<x-app-layout>
    <div class="py-10">
        <div class="max-w-4xl mx-auto px-6">

            <h1 class="text-4xl font-black text-emerald-700 mb-8">
                🌿 Add New Plant
            </h1>

            <form method="POST" action="{{ route('admin.plants.store') }}" class="bg-white rounded-3xl shadow-xl p-8 space-y-6">
                @csrf

                <input name="name" placeholder="Plant Name" class="w-full rounded-2xl border-gray-300" required>

                <input name="scientific_name" placeholder="Scientific Name" class="w-full rounded-2xl border-gray-300">

                <input name="category" placeholder="Category e.g. Tree • Medicinal" class="w-full rounded-2xl border-gray-300">

                <textarea name="uses" placeholder="Medicinal Uses" class="w-full rounded-2xl border-gray-300 h-28" required></textarea>

                <textarea name="description" placeholder="Botanical Description" class="w-full rounded-2xl border-gray-300 h-32"></textarea>

                <input name="image_url" placeholder="Image URL" class="w-full rounded-2xl border-gray-300">

                <input name="conservation_status" placeholder="Conservation Status" class="w-full rounded-2xl border-gray-300">

                <input name="habitat" placeholder="Habitat" class="w-full rounded-2xl border-gray-300">

                <textarea name="ayurveda_uses" placeholder="Ayurveda / Traditional Uses" class="w-full rounded-2xl border-gray-300 h-28"></textarea>

                <textarea name="research_notes" placeholder="Research Notes" class="w-full rounded-2xl border-gray-300 h-28"></textarea>

                <input name="active_compounds" placeholder="Active Compounds" class="w-full rounded-2xl border-gray-300">

                <input name="garden_zone" placeholder="Garden Zone" class="w-full rounded-2xl border-gray-300">

                <div class="flex gap-4">
                    <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-2xl font-bold">
                        Save Plant
                    </button>

                    <a href="/admin/plants" class="px-8 py-3 rounded-2xl bg-gray-100 font-bold">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
