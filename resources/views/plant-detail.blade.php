<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicinal Plant Profile | Nature's Beauty Creations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html { scroll-behavior: smooth; }

        /* Subtle Organic Background Pattern */
        .botanical-pattern {
            background-color: #ffffff;
            /* Using a repeating SVG leaf tile */
            background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%2310b981' fill-opacity='0.02' fill-rule='evenodd'%3E%3Cpath d='M30 55c-10 0-15-10-15-10s10-5 15 10zm20-30c10 0 15 10 15 10s-10 5-15-10z' /%3E%3C/g%3E%3C/svg%3E");
            background-repeat: repeat;
        }

        /* Soft vignette to frame the content */
        .vignette {
            background: radial-gradient(circle, rgba(255,255,255,0) 0%, rgba(240,250,245,0.3) 100%);
        }

        /* Glassmorphism for the cards */
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>

<body class="botanical-bg min-h-screen text-slate-900 relative">
    <!-- Soft Vignette Overlay -->
    <div class="fixed inset-0 vignette pointer-events-none"></div>

    <div id="app" class="relative z-10 opacity-0 transition-opacity duration-500"></div>

    <!-- Back to Top Button -->
    <button onclick="window.scrollTo(0, 0)"
            id="backToTop"
            class="fixed bottom-10 right-10 z-50 bg-emerald-600/90 backdrop-blur-sm text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-emerald-700 transition-all opacity-0 pointer-events-none scale-90">
        <span class="text-2xl">↑</span>
    </button>

    <script>
        const plantId = {{ $id }};

        window.onscroll = function() {
            const btn = document.getElementById('backToTop');
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
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
                const data = await res.json();

                app.innerHTML = `
                <!-- 1. HERO SECTION -->
                <div class="relative h-[65vh] min-h-[500px] bg-slate-100 shadow-2xl">
                    <img src="${data.image_url}" onerror="this.src='https://via.placeholder.com/1200x800?text=Specimen+Image'" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-white via-white/10 to-black/5"></div>

                    <div class="absolute bottom-6 right-10 z-10">
                        <p class="text-[9px] text-gray-500 font-mono tracking-widest uppercase bg-white/40 backdrop-blur-md px-2 py-1 rounded border border-white/20">
                            Source: Wikimedia Commons
                        </p>
                    </div>

                    <!-- FIXED NAVIGATION (Relative Path) -->
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
                <div class="max-w-7xl mx-auto px-10 md:px-20 py-24 grid grid-cols-1 lg:grid-cols-3 gap-20">
                    <div class="lg:col-span-2 space-y-24">
                        <section class="bg-white/60 backdrop-blur-sm rounded-[3.5rem] p-10 md:p-16 border border-emerald-100/50 shadow-xl shadow-emerald-900/5 relative overflow-hidden">
                            <!-- Subtle decorative leaf inside card -->
                            <div class="absolute top-[-10%] right-[-5%] text-emerald-100 opacity-20 pointer-events-none">
                                <svg width="200" height="200" fill="currentColor" viewBox="0 0 24 24"><path d="M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8.13,20C11,20 14.29,16.5 15.7,13.07C15.82,12.77 15.94,12.45 16.06,12.12C17.06,12.12 18.1,12.12 19.14,12.12C19.14,12.12 21.05,8.04 17,8Z"/></svg>
                            </div>

                            <h2 class="text-xs font-black uppercase tracking-[0.5em] text-emerald-800 mb-12 flex items-center gap-4">
                                <span class="w-12 h-px bg-emerald-200"></span>
                                Medicinal Applications
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 relative z-10">
                                <div>
                                    <h3 class="text-2xl font-bold text-emerald-950 mb-4">Therapeutic Profile</h3>
                                    <p class="text-emerald-900/80 leading-relaxed text-xl font-light italic font-serif underline decoration-emerald-100 underline-offset-8">${data.uses}</p>
                                </div>
                                <div class="space-y-6">
                                    <h4 class="text-[10px] font-black text-emerald-900 uppercase tracking-widest opacity-60">Classification Tags</h4>
                                    <div class="flex flex-wrap gap-3">
                                        ${(data.tags || [data.category, 'Organic']).map(tag => `
                                            <span class="bg-emerald-100/50 px-4 py-2 rounded-xl text-emerald-800 text-[10px] font-black uppercase border border-emerald-200/50 tracking-wider transition-colors hover:bg-emerald-200">
                                                #${tag}
                                            </span>
                                        `).join('')}
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="px-6">
                            <h3 class="text-slate-400 font-black uppercase tracking-[0.4em] text-[10px] mb-10 flex items-center gap-4">
                                <span class="w-8 h-px bg-slate-200"></span>
                                Botanical Narrative
                            </h3>
                            <p class="text-slate-600 text-3xl leading-snug font-light font-serif first-letter:text-6xl first-letter:font-black first-letter:text-emerald-700 first-letter:mr-3 first-letter:float-left">
                                ${data.description}
                            </p>
                        </section>
                    </div>

                    <div class="space-y-12">
                        <div class="sticky top-12 space-y-8">
                            <div class="p-10 rounded-[3rem] border border-emerald-100 bg-white/80 backdrop-blur-md text-center shadow-2xl shadow-emerald-900/5 relative overflow-hidden">
                                <h4 class="font-bold text-slate-900 mb-8 text-xs uppercase tracking-widest">Plant QR Code</h4>
                                <div class="bg-white p-6 rounded-[2rem] shadow-inner inline-block mb-8 ring-1 ring-slate-100 hover:rotate-3 transition duration-500">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=${encodeURIComponent(data.qr_url)}" class="w-40 h-40 opacity-90" alt="QR Code">
                                </div>
                                <p class="text-slate-500 text-xs px-6 leading-relaxed mb-10 font-medium">
                                    Verified botanical entry for <br/><span class="text-emerald-700">${data.name}</span>
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
                app.innerHTML = `<div class="p-40 text-center text-slate-300 font-black tracking-widest">PLANT NOT FOUND</div>`;
                app.classList.remove('opacity-0');
            }
        }

        load();
    </script>
</body>
</html>
