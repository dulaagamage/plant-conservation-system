<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicinal Plant Profile | Nature's Beauty Creations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Fixed class name and optimized pattern */
        .botanical-pattern {
            background-color: #ffffff;
            background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%2310b981' fill-opacity='0.02' fill-rule='evenodd'%3E%3Cpath d='M30 55c-10 0-15-10-15-10s10-5 15 10zm20-30c10 0 15 10 15 10s-10 5-15-10z' /%3E%3C/g%3E%3C/svg%3E");
            background-repeat: repeat;
        }

        .vignette {
            background: radial-gradient(circle, rgba(255, 255, 255, 0) 0%, rgba(240, 250, 245, 0.3) 100%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        /* Drop cap polish */
        .botanical-narrative::first-letter {
            initial-letter: 3;
            -webkit-initial-letter: 3;
        }

        @media print {
            #backToTop, .z-50, button { display: none !important; }
            .shadow-2xl { shadow: none !important; border: 1px solid #eee; }
        }
    </style>
</head>

<body class="botanical-pattern min-h-screen text-slate-900 relative antialiased">
    <!-- Soft Vignette Overlay -->
    <div class="fixed inset-0 vignette pointer-events-none"></div>

    <!-- App Container with Loading State -->
    <div id="app" class="relative z-10 opacity-0 transition-opacity duration-700 ease-in-out"></div>

    <!-- Back to Top Button -->
    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" id="backToTop"
        class="fixed bottom-6 right-6 md:bottom-10 md:right-10 z-50 bg-emerald-600/90 backdrop-blur-sm text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-emerald-700 transition-all opacity-0 pointer-events-none scale-90 active:scale-95">
        <span class="text-2xl">↑</span>
    </button>

    <script>
        const plantId = {{ $id }};

        // Optimized scroll listener
        let isScrolling;
        window.onscroll = function () {
            const btn = document.getElementById('backToTop');
            if (document.documentElement.scrollTop > 400) {
                btn.classList.remove('opacity-0', 'pointer-events-none', 'scale-90');
                btn.classList.add('opacity-100', 'pointer-events-auto', 'scale-100');
            } else {
                btn.classList.add('opacity-0', 'pointer-events-none', 'scale-90');
                btn.classList.remove('opacity-100', 'pointer-events-auto', 'scale-100');
            }
        };

        async function load() {
            const app = document.getElementById('app');
            try {
                const res = await fetch(`/api/plants/${plantId}`);
                if (!res.ok) throw new Error('Plant not found');
                const data = await res.json();

                app.innerHTML = `
                <!-- 1. HERO SECTION -->
                <div class="relative h-[65vh] min-h-[500px] bg-slate-100 shadow-2xl overflow-hidden">
                    <img src="${data.image_url}" onerror="this.src='https://via.placeholder.com/1200x800?text=Specimen+Image'" class="w-full h-full object-cover transform hover:scale-105 transition duration-1000">
                    <div class="absolute inset-0 bg-gradient-to-t from-white via-white/10 to-black/5"></div>

                    <div class="absolute bottom-6 right-10 z-10">
                        <p class="text-[9px] text-gray-500 font-mono tracking-widest uppercase bg-white/50 backdrop-blur-md px-3 py-1.5 rounded-full border border-white/30">
                            Source: Wikimedia Commons
                        </p>
                    </div>

                    <!-- NAVIGATION -->
                    <a href="../"
                       class="absolute top-10 left-10 bg-white/90 backdrop-blur-md shadow-xl w-12 h-12 flex items-center justify-center rounded-full hover:scale-110 transition group z-50 border border-white/50">
                        <span class="text-xl group-hover:-translate-x-1 transition duration-200">←</span>
                    </a>

                    <div class="absolute bottom-0 left-0 right-0 p-10 md:p-20">
                        <div class="flex items-center gap-4 mb-6">
                             <span class="bg-emerald-600 text-white text-[10px] font-black uppercase tracking-[0.4em] px-5 py-2 rounded-full shadow-lg shadow-emerald-900/20">
                                ${data.category || 'Herbaceous'}
                            </span>
                        </div>
                        <h1 class="text-6xl md:text-8xl font-black tracking-tighter leading-none text-slate-900 drop-shadow-sm">${data.name}</h1>
                        <p class="text-emerald-700 italic text-2xl md:text-3xl mt-4 font-serif">${data.scientific_name}</p>
                    </div>
                </div>

                <!-- 2. CONTENT GRID -->
                <div class="max-w-7xl mx-auto px-6 md:px-20 py-24 grid grid-cols-1 lg:grid-cols-3 gap-20">
                    <div class="lg:col-span-2 space-y-24">
                        <section class="glass-card rounded-[3.5rem] p-8 md:p-16 border border-emerald-100/50 shadow-xl shadow-emerald-900/5 relative overflow-hidden">
                            <!-- Decorative SVG -->
                            <div class="absolute top-[-5%] right-[-5%] text-emerald-100 opacity-20 pointer-events-none">
                                <svg width="240" height="240" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8.13,20C11,20 14.29,16.5 15.7,13.07C15.82,12.77 15.94,12.45 16.06,12.12C17.06,12.12 18.1,12.12 19.14,12.12C19.14,12.12 21.05,8.04 17,8Z"/>
                                </svg>
                            </div>

                            <h2 class="text-xs font-black uppercase tracking-[0.5em] text-emerald-800 mb-12 flex items-center gap-4">
                                <span class="w-12 h-px bg-emerald-200"></span>
                                Medicinal & Scientific Profile
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 relative z-10">
                                <div>
                                    <h3 class="text-2xl font-bold text-emerald-950 mb-4">Traditional Uses</h3>
                                    <p class="text-emerald-900/80 leading-relaxed text-xl font-light italic font-serif">
                                        ${data.uses}
                                    </p>
                                    <p class="mt-6 text-emerald-700 text-sm leading-relaxed">
                                        ${data.ayurveda_uses || ''}
                                    </p>
                                </div>

                                <div class="space-y-6">
                                    <h4 class="text-[10px] font-black text-emerald-900 uppercase tracking-widest opacity-60">
                                        Botanical Classification
                                    </h4>
                                    <div class="space-y-3 text-slate-700 text-sm">
                                        <p class="flex justify-between border-b border-emerald-50 pb-1"><b>Category:</b> <span>${data.category}</span></p>
                                        <p class="flex justify-between border-b border-emerald-50 pb-1"><b>Habitat:</b> <span>${data.habitat || '-'}</span></p>
                                        <p class="flex justify-between border-b border-emerald-50 pb-1"><b>Conservation:</b> <span>${data.conservation_status || '-'}</span></p>
                                        <p class="flex justify-between border-b border-emerald-50 pb-1"><b>Endemic:</b> <span>${data.is_endemic ? 'Yes' : 'No'}</span></p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-12 pt-10 border-t border-emerald-100 relative z-10">
                                <h3 class="text-xs font-black uppercase tracking-[0.4em] text-slate-700 mb-6">Scientific Insights</h3>
                                <p class="text-slate-600 mb-6 leading-relaxed">${data.research_notes || ''}</p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <p class="text-sm text-slate-500 bg-emerald-50/50 p-3 rounded-xl">
                                        <b class="text-emerald-900 block mb-1">Active compounds:</b> ${data.active_compounds || 'Not documented'}
                                    </p>
                                    <p class="text-sm text-slate-500 bg-slate-50 p-3 rounded-xl">
                                        <b class="text-slate-900 block mb-1">Studied by:</b> ${data.studied_by || 'Research ongoing'}
                                    </p>
                                </div>
                            </div>
                        </section>

                        <section class="px-6">
                            <h3 class="text-slate-400 font-black uppercase tracking-[0.4em] text-[10px] mb-10 flex items-center gap-4">
                                <span class="w-8 h-px bg-slate-200"></span>
                                Botanical Narrative
                            </h3>
                            <p class="botanical-narrative text-slate-600 text-3xl leading-snug font-light font-serif first-letter:text-6xl first-letter:font-black first-letter:text-emerald-700 first-letter:mr-3 first-letter:float-left">
                                ${data.description}
                            </p>
                        </section>
                    </div>

                    <div class="space-y-12">
                        <div class="sticky top-12 space-y-8">
                            <div class="p-10 rounded-[3rem] border border-emerald-100 bg-white/80 backdrop-blur-md text-center shadow-2xl shadow-emerald-900/5 relative overflow-hidden">
                                <h4 class="font-bold text-slate-900 mb-8 text-xs uppercase tracking-widest">Plant QR Code</h4>
                                <div class="bg-white p-6 rounded-[2rem] shadow-inner inline-block mb-8 ring-1 ring-slate-100 hover:rotate-3 transition duration-500 cursor-help">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=${encodeURIComponent(data.qr_url)}" class="w-40 h-40 opacity-90" alt="QR Code">
                                </div>
                                <p class="text-slate-500 text-xs px-6 leading-relaxed mb-10 font-medium">
                                    Verified botanical entry for <br/><span class="text-emerald-700 font-bold">${data.name}</span>
                                </p>
                                <button onclick="window.print()" class="w-full py-5 rounded-2xl bg-slate-900 text-white font-black uppercase tracking-widest text-[10px] hover:bg-emerald-600 transition-all active:scale-95 shadow-xl hover:shadow-emerald-200">
                                    Print Plant Profile
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                app.classList.remove('opacity-0');
            } catch (e) {
                app.innerHTML = `<div class="p-40 text-center text-slate-400 font-black tracking-widest bg-white/50 backdrop-blur-md m-10 rounded-3xl border border-dashed border-slate-300">PLANT NOT FOUND</div>`;
                app.classList.remove('opacity-0');
            }
        }

        load();
    </script>
</body>

</html>
