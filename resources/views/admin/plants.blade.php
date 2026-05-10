<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6">

            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-4xl font-black text-emerald-700">
                        🌿 Plant Management
                    </h1>
                    <p class="text-gray-500 mt-2">
                        Manage medicinal plant records and QR-linked profiles.
                    </p>
                </div>

                <a href="{{ route('admin.plants.create') }}"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-2xl font-bold shadow">
                    + Add Plant
                </a>
            </div>

            @if(session('success'))
                <div class="mb-6 bg-emerald-100 text-emerald-700 px-6 py-4 rounded-2xl font-bold">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                <table class="w-full">
                    <thead class="bg-emerald-50">
                        <tr>
                            <th class="p-5 text-left">Plant</th>
                            <th class="p-5 text-left">Category</th>
                            <th class="p-5 text-left">Conservation</th>
                            <th class="p-5 text-left">QR Page</th>
                            <th class="p-5 text-left">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($plants as $plant)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="p-5">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ $plant->image_url ?? 'https://via.placeholder.com/100' }}"
                                            class="w-16 h-16 rounded-2xl object-cover">

                                        <div>
                                            <h2 class="font-bold text-gray-900">
                                                {{ $plant->name }}
                                            </h2>
                                            <p class="text-sm italic text-emerald-600">
                                                {{ $plant->scientific_name }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="p-5">
                                    {{ $plant->category }}
                                </td>

                                <td class="p-5">
                                    <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold">
                                        {{ $plant->conservation_status ?? 'Unknown' }}
                                    </span>
                                </td>

                                <td class="p-5">
                                    <a href="/plants/{{ $plant->id }}" target="_blank"
                                        class="text-emerald-600 font-bold underline">
                                        View
                                    </a>
                                </td>

                                <td class="p-5 flex gap-2">

                                    <a href="{{ route('admin.plants.edit', $plant) }}"
                                        class="bg-blue-100 text-blue-700 px-4 py-2 rounded-xl font-bold">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ route('admin.plants.destroy', $plant) }}" class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Delete this plant?')"
                                            class="bg-red-100 text-red-700 px-4 py-2 rounded-xl font-bold">
                                            Delete
                                        </button>

                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
