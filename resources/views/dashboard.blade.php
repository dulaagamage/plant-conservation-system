<x-app-layout>

    <div class="py-10 bg-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Header -->
            <div class="mb-12">
                <h1 class="text-5xl font-black text-emerald-700">
                    🌿 Botanical Administration
                </h1>

                <p class="text-gray-500 mt-4 text-lg">
                    Smart Herbal Plant Management System
                </p>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">

                <div class="bg-white p-8 rounded-3xl shadow-xl">
                    <p class="text-gray-400 uppercase text-xs tracking-widest mb-2">
                        Total Plants
                    </p>

                    <h2 class="text-5xl font-black text-emerald-600">
                        {{ \App\Models\Plant::count() }}
                    </h2>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-xl">
                    <p class="text-gray-400 uppercase text-xs tracking-widest mb-2">
                        Conservation Records
                    </p>

                    <h2 class="text-5xl font-black text-blue-500">
                        {{ \App\Models\Plant::whereNotNull('conservation_status')->count() }}
                    </h2>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-xl">
                    <p class="text-gray-400 uppercase text-xs tracking-widest mb-2">
                        Research Entries
                    </p>

                    <h2 class="text-5xl font-black text-amber-500">
                        {{ \App\Models\Plant::whereNotNull('research_notes')->count() }}
                    </h2>
                </div>

            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <a href="/admin/plants"
                   class="bg-emerald-600 hover:bg-emerald-700 text-white p-10 rounded-3xl shadow-xl transition block">

                    <h3 class="text-3xl font-black mb-3">
                        🌱 Manage Plants
                    </h3>

                    <p class="opacity-90">
                        View, edit, and manage botanical records.
                    </p>
                </a>

                <a href="/admin/plants/create"
                   class="bg-slate-900 hover:bg-black text-white p-10 rounded-3xl shadow-xl transition block">

                    <h3 class="text-3xl font-black mb-3">
                        ➕ Add New Plant
                    </h3>

                    <p class="opacity-90">
                        Add medicinal plant data and research details.
                    </p>
                </a>

            </div>

        </div>
    </div>

</x-app-layout>
