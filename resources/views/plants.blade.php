<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nature's Beauty | Botanical Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes slideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-in { animation: slideUp 0.6s ease-out forwards; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen font-sans">

<div class="max-w-7xl mx-auto px-6 py-12">
    <!-- Header -->
    <header class="text-center mb-16">
        <div class="inline-block px-4 py-1 rounded-full bg-emerald-100 text-emerald-700 text-[10px] font-black uppercase tracking-[0.4em] mb-4">
            Nature's Beauty Creations
        </div>
        <h1 class="text-5xl md:text-6xl font-black text-gray-900 tracking-tight">
            The <span class="text-emerald-600 italic">Botanical</span> Index
        </h1>
        <p class="mt-4 text-gray-500 max-w-xl mx-auto text-lg">
            Bridging physical herbal gardens to digital skin-science records.
        </p>
    </header>

    <!-- Search Bar -->
    <div class="max-w-3xl mx-auto mb-20">
        <div class="relative group">
            <input
                type="text"
                id="searchInput"
                placeholder="Search by ingredient (e.g. Neem) or benefit (e.g. Acne)..."
                class="w-full px-8 py-6 rounded-4xl border border-gray-200 shadow-2xl focus:ring-4 focus:ring-emerald-500/10 outline-none bg-white transition-all text-lg"
            >
            <div class="absolute right-8 top-1/2 -translate-y-1/2 text-emerald-600 font-bold">SEARCH</div>
        </div>
    </div>

    <!-- Results Grid -->
    <div id="plants-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        <!-- Skeleton States while loading -->
        <div class="h-96 rounded-[3rem] bg-gray-200 animate-pulse"></div>
        <div class="h-96 rounded-[3rem] bg-gray-200 animate-pulse"></div>
        <div class="h-96 rounded-[3rem] bg-gray-200 animate-pulse"></div>
    </div>
</div>

<script>
    let allPlants = [];

    async function init() {
        try {
            const res = await fetch('/api/plants');
            allPlants = await res.json();
            render(allPlants);
        } catch (e) {
            document.getElementById('plants-grid').innerHTML = `
                <div class="col-span-full text-center py-20 bg-white rounded-[3rem] border border-dashed">
                    <p class="text-gray-400">Unable to reach the Herbarium API. Please check your connection.</p>
                </div>`;
        }
    }

    function render(data) {
        const grid = document.getElementById('plants-grid');
        grid.innerHTML = data.map((plant, i) => `
            <article class="animate-in bg-white rounded-[3rem] shadow-xl shadow-gray-200/50 overflow-hidden group hover:-translate-y-2 transition-all duration-500 border border-gray-100" style="animation-delay: ${i * 0.05}s">
                <div class="relative h-64 overflow-hidden bg-gray-100">
                    <img
                        src="${plant.image_url}"
                        onerror="this.src='https://via.placeholder.com/600x400?text=Botanical+Image+Pending'"
                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700"
                    >
                    <div class="absolute top-6 left-6">
                        <span class="bg-white/90 backdrop-blur-md px-4 py-2 rounded-2xl text-[10px] font-black uppercase tracking-widest text-emerald-700 shadow-sm">
                            ✨ ${plant.primary_benefit || 'Skin Nourishment'}
                        </span>
                    </div>
                    <!-- Wikimedia Attribution -->
                    <div class="absolute bottom-0 right-0 px-2 py-1 bg-black/20 text-[8px] text-white/70 rounded-tl-lg italic">
                        via Wikimedia Commons
                    </div>
                </div>
                <div class="p-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-1">${plant.name}</h2>
                    <p class="text-emerald-600 italic text-sm mb-6 font-serif">${plant.scientific_name}</p>

                    <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                        <div class="bg-gray-50 p-2 rounded-xl">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=40x40&data=${encodeURIComponent(plant.qr_url)}" class="w-8 h-8 opacity-30">
                        </div>
                        <a href="/plants/${plant.id}" class="bg-gray-900 hover:bg-emerald-600 text-white px-8 py-3 rounded-2xl text-sm font-bold transition-all shadow-lg shadow-gray-200">
                            Details
                        </a>
                    </div>
                </div>
            </article>
        `).join('');
    }

    document.getElementById('searchInput').addEventListener('input', (e) => {
        const term = e.target.value.toLowerCase();
        render(allPlants.filter(p =>
            p.name.toLowerCase().includes(term) ||
            p.scientific_name.toLowerCase().includes(term) ||
            (p.primary_benefit && p.primary_benefit.toLowerCase().includes(term))
        ));
    });

    init();
</script>
</body>
</html>
