<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSORICURE — Shop Our Collection | Botanical Skincare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: '#F5EFE4',
                        sand: '#E2D5C3',
                        tan: '#C4A882',
                        bark: '#8C6E50',
                        ink: '#1C1917',
                        'warm-gray': '#9A8F83',
                        'off-white': '#FAF7F2',
                    },
                    fontFamily: {
                        serif: ['Cormorant Garamond', 'Georgia', 'serif'],
                        sans: ['DM Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #FAF7F2;
            font-family: 'DM Sans', sans-serif;
            color: #1C1917;
        }

        /* Custom cursor */
        .cursor {
            position: fixed;
            width: 8px;
            height: 8px;
            background: #1C1917;
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
            transition: transform 0.15s ease, width 0.25s ease, height 0.25s ease;
            mix-blend-mode: multiply;
        }
        .cursor.expand {
            width: 40px;
            height: 40px;
            background: #C4A882;
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Product card hover effects */
        .product-card {
            transition: transform 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }
        .product-card:hover {
            transform: translateY(-8px);
        }
        .product-image {
            transition: transform 0.6s ease;
        }
        .product-card:hover .product-image {
            transform: scale(1.03);
        }
        .btn-hover {
            transition: all 0.25s ease;
        }
        .btn-hover:hover {
            background: #1C1917;
            color: #F5EFE4;
            border-color: #1C1917;
        }
    </style>
</head>
<body>

<!-- Custom cursor -->
<div class="cursor" id="cursor"></div>

<!-- Simple Announcement Bar -->
<div class="bg-[#1C1917] text-[#F5EFE4] text-[11px] tracking-[0.12em] uppercase text-center py-3 overflow-hidden">
    <div class="inline-flex gap-8 animate-[ticker_22s_linear_infinite] whitespace-nowrap">
        <span>Free shipping on orders over €45 · Clinically validated formulas · 100% botanical origin · Cruelty-free · Dermatologist tested</span>
        <span>Free shipping on orders over €45 · Clinically validated formulas · 100% botanical origin · Cruelty-free · Dermatologist tested</span>
    </div>
</div>

<?
    @include('header.php');
?>
<!-- HERO SECTION (compact, not full height, with video/image template) -->
<section class="relative w-full overflow-hidden bg-[#1A1714]">
    <!-- Background Video / Image Template -->
    <div class="absolute inset-0">
        <video autoplay loop muted playsinline class="w-full h-full object-cover opacity-70">
            <source src="prodcut2.mp4" type="video/mp4">
            <!-- Fallback image if video fails -->
        </video>
        <!-- Overlay gradient for text readability -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/50 via-black/20 to-transparent"></div>
    </div>
    
    <!-- Hero Content (centered but not full height) -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-12 py-20 md:py-28">
        <div class="max-w-2xl">
            <span class="inline-block text-[11px] tracking-[0.2em] text-[#E2D5C3] uppercase mb-4">Spring edit 2025</span>
            <h1 class="font-serif text-5xl md:text-7xl font-light text-white leading-[1.1] mb-5">
                pure ritual,<br>radiant skin
            </h1>
            <p class="text-[#E2D5C3] text-sm md:text-base max-w-md leading-relaxed mb-8">
                Discover our core collection of four essential formulas — each crafted with clinical precision and botanical soul.
            </p>
            <a href="#products" class="inline-block border border-white text-white text-[11px] tracking-[0.1em] uppercase px-8 py-3 rounded-full hover:bg-white hover:text-[#1C1917] transition duration-300">shop collection →</a>
        </div>
    </div>
</section>

<!-- PRODUCTS SECTION (Exactly 4 products) - WORKING IMAGES -->
<section id="products" class="py-20 md:py-28 px-6 md:px-12 bg-[#FAF7F2]">
    <div class="max-w-7xl mx-auto">
        <!-- Section header -->
        <div class="text-center mb-12 md:mb-16">
            <div class="inline-flex items-center gap-3 mb-3">
                <div class="w-6 h-[1px] bg-[#C4A882]"></div>
                <span class="text-[10px] tracking-[0.2em] uppercase text-[#9A8F83]">the essentials</span>
                <div class="w-6 h-[1px] bg-[#C4A882]"></div>
            </div>
            <h2 class="font-serif text-3xl md:text-4xl font-light text-[#1C1917]">four pillars of calm</h2>
            <p class="text-[#9A8F83] text-sm max-w-lg mx-auto mt-3">Clinically validated, botanically pure — each formula targets specific skin needs.</p>
        </div>

        <!-- 4 Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Product 1: Calm Restore Serum -->
            <div class="product-card group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                <div class="relative overflow-hidden bg-[#F5EFE4] aspect-[3/4]">
                    <img class="product-image w-full h-full object-cover transition duration-500" 
                         src="https://images.pexels.com/photos/4041392/pexels-photo-4041392.jpeg?w=600&h=800&fit=crop" 
                         alt="Calm Restore Serum">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                        <button onclick="alert('Added Calm Restore Serum to cart 🧴')" class="bg-white text-[#1C1917] text-[11px] tracking-wide uppercase px-5 py-2 rounded-full font-medium hover:bg-[#1C1917] hover:text-white transition">Quick add</button>
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-[10px] tracking-[0.14em] uppercase text-[#9A8F83]">Restore</span>
                        <span class="text-[11px] font-medium text-[#C4A882]">⭐ 4.9</span>
                    </div>
                    <h3 class="font-medium text-[#1C1917] text-base mb-1">Calm Restore Serum</h3>
                    <p class="text-[#9A8F83] text-xs mb-3">Hyaluronic acid + oat lipid complex</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="font-semibold text-[#1C1917] text-lg">€58</span>
                        <button onclick="alert('Added to cart: Calm Restore Serum')" class="btn-hover border border-[#E2D5C3] text-[11px] tracking-wide uppercase px-4 py-2 rounded-full hover:bg-[#1C1917] hover:text-white hover:border-[#1C1917] transition">add</button>
                    </div>
                </div>
            </div>

            <!-- Product 2: Barrier Shield Mist -->
            <div class="product-card group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                <div class="relative overflow-hidden bg-[#F5EFE4] aspect-[3/4]">
                    <img class="product-image w-full h-full object-cover transition duration-500" 
                         src="https://images.pexels.com/photos/4041394/pexels-photo-4041394.jpeg?w=600&h=800&fit=crop" 
                         alt="Barrier Shield Mist">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                        <button onclick="alert('Added Barrier Shield Mist to cart 💧')" class="bg-white text-[#1C1917] text-[11px] tracking-wide uppercase px-5 py-2 rounded-full font-medium hover:bg-[#1C1917] hover:text-white transition">Quick add</button>
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-[10px] tracking-[0.14em] uppercase text-[#9A8F83]">Shield</span>
                        <span class="text-[11px] font-medium text-[#C4A882]">⭐ 4.8</span>
                    </div>
                    <h3 class="font-medium text-[#1C1917] text-base mb-1">Barrier Shield Mist</h3>
                    <p class="text-[#9A8F83] text-xs mb-3">Ceramide + prebiotic thermal water</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="font-semibold text-[#1C1917] text-lg">€42</span>
                        <button onclick="alert('Added to cart: Barrier Shield Mist')" class="btn-hover border border-[#E2D5C3] text-[11px] tracking-wide uppercase px-4 py-2 rounded-full hover:bg-[#1C1917] hover:text-white hover:border-[#1C1917] transition">add</button>
                    </div>
                </div>
            </div>

            <!-- Product 3: Night Renewal Balm -->
            <div class="product-card group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                <div class="relative overflow-hidden bg-[#1A1714] aspect-[3/4]">
                    <img class="product-image w-full h-full object-cover transition duration-500" 
                         src="https://images.pexels.com/photos/3735596/pexels-photo-3735596.jpeg?w=600&h=800&fit=crop" 
                         alt="Night Renewal Balm">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                        <button onclick="alert('Added Night Renewal Balm to cart 🌙')" class="bg-white text-[#1C1917] text-[11px] tracking-wide uppercase px-5 py-2 rounded-full font-medium hover:bg-[#1C1917] hover:text-white transition">Quick add</button>
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-[10px] tracking-[0.14em] uppercase text-[#9A8F83]">Renew</span>
                        <span class="text-[11px] font-medium text-[#C4A882]">⭐ 5.0</span>
                    </div>
                    <h3 class="font-medium text-[#1C1917] text-base mb-1">Night Renewal Balm</h3>
                    <p class="text-[#9A8F83] text-xs mb-3">Bakuchiol + evening primrose</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="font-semibold text-[#1C1917] text-lg">€74</span>
                        <button onclick="alert('Added to cart: Night Renewal Balm')" class="btn-hover border border-[#E2D5C3] text-[11px] tracking-wide uppercase px-4 py-2 rounded-full hover:bg-[#1C1917] hover:text-white hover:border-[#1C1917] transition">add</button>
                    </div>
                </div>
            </div>

            <!-- Product 4: Radiance Day Oil -->
            <div class="product-card group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                <div class="relative overflow-hidden bg-[#F5EFE4] aspect-[3/4]">
                    <img class="product-image w-full h-full object-cover transition duration-500" 
                         src="https://images.pexels.com/photos/4041395/pexels-photo-4041395.jpeg?w=600&h=800&fit=crop" 
                         alt="Radiance Day Oil">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                        <button onclick="alert('Added Radiance Day Oil to cart ✨')" class="bg-white text-[#1C1917] text-[11px] tracking-wide uppercase px-5 py-2 rounded-full font-medium hover:bg-[#1C1917] hover:text-white transition">Quick add</button>
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-[10px] tracking-[0.14em] uppercase text-[#9A8F83]">Radiance</span>
                        <span class="text-[11px] font-medium text-[#C4A882]">⭐ 4.9</span>
                    </div>
                    <h3 class="font-medium text-[#1C1917] text-base mb-1">Radiance Day Oil</h3>
                    <p class="text-[#9A8F83] text-xs mb-3">Vitamin C + marula & rosehip</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="font-semibold text-[#1C1917] text-lg">€65</span>
                        <button onclick="alert('Added to cart: Radiance Day Oil')" class="btn-hover border border-[#E2D5C3] text-[11px] tracking-wide uppercase px-4 py-2 rounded-full hover:bg-[#1C1917] hover:text-white hover:border-[#1C1917] transition">add</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional info / promise banner -->
        <div class="mt-16 text-center">
            <div class="inline-flex flex-wrap justify-center gap-8 text-[11px] tracking-[0.1em] uppercase text-[#9A8F83]">
                <span class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-[#C4A882] rounded-full"></span> 97% natural origin</span>
                <span class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-[#C4A882] rounded-full"></span> vegan & cruelty-free</span>
                <span class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-[#C4A882] rounded-full"></span> carbon-neutral shipping</span>
            </div>
        </div>
    </div>
</section>

<!-- Simple Testimonial / ingredient story (optional, keeps page focused) -->
<section class="py-16 md:py-20 bg-[#F5EFE4]">
    <div class="max-w-6xl mx-auto px-6 md:px-12 text-center">
        <div class="max-w-2xl mx-auto">
            <div class="w-12 h-[1px] bg-[#C4A882] mx-auto mb-6"></div>
            <p class="font-serif text-2xl md:text-3xl italic text-[#1C1917] leading-relaxed">“Formulated for sensitive, reactive skin — each ingredient chosen with intention, sourced with care.”</p>
            <p class="text-[#9A8F83] text-xs tracking-wide uppercase mt-6">— Dr. Elena Marchetti, Scientific Advisory Board</p>
        </div>
    </div>
</section>

<!-- Footer (clean, minimal) -->
<footer class="bg-[#FAF7F2] border-t border-[#E2D5C3] pt-12 pb-8 px-6 md:px-12">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
            <div class="font-serif text-xl tracking-[0.2em] text-[#1C1917] uppercase mb-3">Psoricure</div>
            <p class="text-[12px] text-[#9A8F83] leading-relaxed">Skin science rooted in botanical tradition.</p>
        </div>
        <div>
            <h4 class="text-[10px] tracking-[0.14em] uppercase text-[#9A8F83] mb-4">Shop</h4>
            <ul class="space-y-2 text-[13px] text-[#1C1917]">
                <li><a href="#" class="hover:text-[#8C6E50] transition">face care</a></li>
                <li><a href="#" class="hover:text-[#8C6E50] transition">body care</a></li>
                <li><a href="#" class="hover:text-[#8C6E50] transition">sets & rituals</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-[10px] tracking-[0.14em] uppercase text-[#9A8F83] mb-4">Learn</h4>
            <ul class="space-y-2 text-[13px] text-[#1C1917]">
                <li><a href="#" class="hover:text-[#8C6E50] transition">journal</a></li>
                <li><a href="#" class="hover:text-[#8C6E50] transition">ingredients</a></li>
                <li><a href="#" class="hover:text-[#8C6E50] transition">sustainability</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-[10px] tracking-[0.14em] uppercase text-[#9A8F83] mb-4">Newsletter</h4>
            <div class="flex border-b border-[#E2D5C3] pb-1">
                <input type="email" placeholder="your@email.com" class="bg-transparent border-none outline-none text-[12px] text-[#1C1917] flex-1 font-sans">
                <button class="text-[11px] tracking-[0.08em] uppercase text-[#8C6E50]">→</button>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto mt-10 pt-6 border-t border-[#E2D5C3] flex flex-col md:flex-row justify-between text-[11px] text-[#9A8F83]">
        <span>© 2025 Psoricure. All rights reserved.</span>
        <div class="flex gap-5 mt-3 md:mt-0">
            <a href="#" class="hover:text-[#1C1917]">privacy</a>
            <a href="#" class="hover:text-[#1C1917]">terms</a>
            <a href="#" class="hover:text-[#1C1917]">cookies</a>
        </div>
    </div>
</footer>

<script>
    // Custom cursor functionality
    const cursor = document.getElementById('cursor');
    if (cursor) {
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
        });
        document.querySelectorAll('a, button, .product-card, .btn-hover').forEach(el => {
            el.addEventListener('mouseenter', () => cursor.classList.add('expand'));
            el.addEventListener('mouseleave', () => cursor.classList.remove('expand'));
        });
    }
    
    // Smooth scroll for anchor link
    document.querySelector('a[href="#products"]')?.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('#products')?.scrollIntoView({ behavior: 'smooth' });
    });
</script>
</body>
</html>