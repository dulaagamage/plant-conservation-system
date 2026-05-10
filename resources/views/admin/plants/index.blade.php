<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6">

            <div class="flex items-center justify-between mb-10">
                <div>
                    <h1 class="text-4xl font-black text-gray-900">
                        Plant Management
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Manage botanical records and medicinal plant data.
                    </p>
                </div>

                <a href="#"
                   class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-2xl font-bold shadow-lg transition">
                    + Add Plant
                </a>
            </div>

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">

                <table class="w-full">

                    <thead class="bg-emerald-50">
                        <tr>
                            <th class="text-left p-6">Image</th>
                            <th class="text-left p-6">Plant</th>
                            <th class="text-left p-6">Category</th>
                            <th class="text-left p-6">Conservation</th>
                            <th class="text-left p-6">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($plants as $plant)

                        <tr class="border-t border-gray-100 hover:bg-gray-50 transition">

                            <td class="p-6">
                                <img src="{{ $plant->image_url }}"
                                     class="w-20 h-20 object-cover rounded-2xl">
                            </td>

                            <td class="p-6">
                                <h2 class="font-bold text-lg">
                                    {{ $plant->name }}
                                </h2>

                                <p class="text-sm text-emerald-600 italic">
                                    {{ $plant->scientific_name }}
                                </p>
                            </td>

                            <td class="p-6">
                                {{ $plant->category }}
                            </td>

                            <td class="p-6">
                                {{ $plant->conservation_status }}
                            </td>

                            <td class="p-6 space-x-2">

                                <button class="bg-blue-100 text-blue-700 px-4 py-2 rounded-xl text-sm font-bold">
                                    Edit
                                </button>

                                <button class="bg-red-100 text-red-700 px-4 py-2 rounded-xl text-sm font-bold">
                                    Delete
                                </button>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>
