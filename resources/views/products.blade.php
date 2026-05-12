<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
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
            overflow-x: hidden;
        }

        /* Custom cursor - only on desktop */
        @media (hover: hover) and (pointer: fine) {
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
        }

        html {
            scroll-behavior: smooth;
        }

        /* Navbar Hide/Show on Scroll */
        .main-nav {
            transition: transform 0.3s ease, background 0.3s ease, box-shadow 0.3s ease;
            transform: translateY(0);
        }
        .main-nav.nav-hidden {
            transform: translateY(-100%);
        }
        .main-nav.nav-scrolled {
            background: rgba(250, 247, 242, 0.98);
            backdrop-filter: blur(8px);
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }

        /* Product card hover effects */
        .product-card {
            transition: transform 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            cursor: pointer;
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

        /* Announcement ticker animation */
        @keyframes ticker {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.85);
            z-index: 10000;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(5px);
        }
        .modal.active {
            display: flex;
            animation: fadeIn 0.3s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .modal-content {
            max-width: 1200px;
            width: 92%;
            background: #FAF7F2;
            border-radius: 24px;
            overflow: hidden;
            position: relative;
            animation: slideUp 0.4s ease;
            max-height: 90vh;
            display: flex;
            flex-direction: row;
        }
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .modal-close {
            position: absolute;
            top: 18px;
            right: 22px;
            font-size: 32px;
            cursor: pointer;
            color: #1C1917;
            z-index: 10;
            background: rgba(245, 239, 228, 0.9);
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            backdrop-filter: blur(4px);
        }
        .modal-close:hover {
            background: #1C1917;
            color: #F5EFE4;
            transform: scale(1.05);
        }
        
        .modal-image {
            flex: 1;
            background: #F5EFE4;
            position: relative;
            min-height: 500px;
            overflow: hidden;
        }
        .modal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
        
        .modal-details {
            flex: 1;
            padding: 2rem 2rem 2rem 2rem;
            overflow-y: auto;
            max-height: 90vh;
            background: #FAF7F2;
        }
        
        .modal-details::-webkit-scrollbar {
            width: 4px;
        }
        .modal-details::-webkit-scrollbar-track {
            background: #E2D5C3;
            border-radius: 4px;
        }
        .modal-details::-webkit-scrollbar-thumb {
            background: #C4A882;
            border-radius: 4px;
        }
        
        .modal-rating {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
        }
        .ingredient-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 16px 0;
        }
        .ingredient-badge {
            background: #E2D5C3;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 11px;
            color: #1C1917;
            letter-spacing: 0.03em;
        }
        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 15px;
            border: 1px solid #E2D5C3;
            border-radius: 40px;
            padding: 5px 12px;
            width: fit-content;
        }
        .quantity-btn {
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            padding: 0 8px;
            color: #8C6E50;
            transition: color 0.2s;
        }
        .quantity-btn:hover {
            color: #1C1917;
        }
        .quantity-number {
            font-size: 14px;
            font-weight: 500;
            min-width: 30px;
            text-align: center;
        }
        
        @media (max-width: 768px) {
            .modal-content {
                flex-direction: column;
                width: 95%;
                max-height: 85vh;
            }
            .modal-image {
                min-height: 280px;
                flex: 0 0 280px;
            }
            .modal-details {
                max-height: none;
                padding: 1.5rem;
            }
            .modal-close {
                top: 10px;
                right: 10px;
                width: 36px;
                height: 36px;
                font-size: 26px;
            }
        }
    </style>
</head>
<body>

    @include('sections/header')
<!-- Custom cursor -->
<div class="cursor" id="cursor"></div>

<!-- Simple Announcement Bar - Responsive -->
<div class="bg-[#1C1917] text-[#F5EFE4] text-[10px] md:text-[11px] tracking-[0.12em] uppercase text-center py-2 md:py-3 overflow-hidden">
    <div class="inline-flex gap-6 md:gap-8 animate-[ticker_22s_linear_infinite] whitespace-nowrap">
        <span>Free shipping on orders over €45 · Clinically validated formulas · 100% botanical origin · Cruelty-free · Dermatologist tested</span>
        <span>Free shipping on orders over €45 · Clinically validated formulas · 100% botanical origin · Cruelty-free · Dermatologist tested</span>
    </div>
</div>



<style>
    @media (min-width: 768px) {
        .main-nav {
            padding: 0 1.5rem !important;
        }
        .main-nav div:first-child {
            font-size: 22px !important;
        }
        .nav-links-desktop {
            display: flex !important;
        }
        .main-nav svg {
            width: 18px !important;
            height: 18px !important;
        }
    }
    @media (min-width: 1024px) {
        .main-nav {
            padding: 0 3rem !important;
        }
    }
    @media (max-width: 767px) {
        .main-nav {
            padding: 0 1rem !important;
        }
        .main-nav div:first-child {
            font-size: 16px !important;
            letter-spacing: 0.15em !important;
        }
    }
    .nav-links-desktop a:hover {
        color: #1C1917 !important;
    }
    /* Add padding to body to account for fixed navbar */
    body {
        padding-top: 60px;
    }
    .announcement {
        position: fixed;
        top: 60px;
        left: 0;
        right: 0;
        z-index: 999;
    }
    .hero {
        margin-top: 0;
    }
    @media (max-width: 768px) {
        body {
            padding-top: 60px;
        }
    }
</style>

<!-- HERO SECTION - Responsive -->
<section class="hero relative w-full overflow-hidden bg-[#1A1714]" style="margin-top: 0;">
    <div class="absolute inset-0">
        <video autoplay loop muted playsinline class="w-full h-full object-cover opacity-70">
            <source src="{{asset('videos/prodcut2.mp4')}}" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/30 to-transparent"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-5 md:px-8 lg:px-12 py-16 md:py-20 lg:py-28">
        <div class="max-w-2xl">
            <span class="inline-block text-[10px] md:text-[11px] tracking-[0.2em] text-[#E2D5C3] uppercase mb-3 md:mb-4">Spring edit 2025</span>
            <h1 class="font-serif text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-light text-white leading-[1.1] mb-3 md:mb-5">
                pure ritual,<br>radiant skin
            </h1>
            <p class="text-[#E2D5C3] text-xs sm:text-sm md:text-base max-w-md leading-relaxed mb-6 md:mb-8">
                Discover our core collection of four essential formulas — each crafted with clinical precision and botanical soul.
            </p>
            <a href="#products" class="inline-block border border-white text-white text-[10px] md:text-[11px] tracking-[0.1em] uppercase px-6 md:px-8 py-2.5 md:py-3 rounded-full hover:bg-white hover:text-[#1C1917] transition duration-300">shop collection →</a>
        </div>
    </div>
</section>

<!-- PRODUCTS SECTION - Fully Responsive Grid -->
<section id="products" class="py-12 md:py-20 lg:py-28 px-4 sm:px-6 md:px-8 lg:px-12 bg-[#FAF7F2]">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-10 md:mb-16">
            <div class="inline-flex items-center gap-2 md:gap-3 mb-2 md:mb-3">
                <div class="w-4 md:w-6 h-[1px] bg-[#C4A882]"></div>
                <span class="text-[9px] md:text-[10px] tracking-[0.2em] uppercase text-[#9A8F83]">the essentials</span>
                <div class="w-4 md:w-6 h-[1px] bg-[#C4A882]"></div>
            </div>
            <h2 class="font-serif text-2xl sm:text-3xl md:text-4xl font-light text-[#1C1917]">four pillars of calm</h2>
            <p class="text-[#9A8F83] text-xs sm:text-sm max-w-lg mx-auto mt-2 md:mt-3 px-4">Clinically validated, botanically pure — each formula targets specific skin needs.</p>
        </div>

        <!-- Responsive Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 md:gap-6 lg:gap-8">
            
            <!-- Product 1 -->
            <div class="product-card group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300" data-product="1">
                <div class="relative overflow-hidden bg-[#F5EFE4] aspect-[3/4]">
                    <img class="product-image w-full h-full object-cover transition duration-500" 
                         src="https://images.pexels.com/photos/4041392/pexels-photo-4041392.jpeg?w=600&h=800&fit=crop" 
                         alt="Calm Restore Serum">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                        <span class="bg-white text-[#1C1917] text-[10px] md:text-[11px] tracking-wide uppercase px-4 md:px-5 py-1.5 md:py-2 rounded-full font-medium">Quick view</span>
                    </div>
                </div>
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-[9px] md:text-[10px] tracking-[0.14em] uppercase text-[#9A8F83]">Restore</span>
                        <span class="text-[10px] md:text-[11px] font-medium text-[#C4A882]">⭐ 4.9</span>
                    </div>
                    <h3 class="font-medium text-[#1C1917] text-sm md:text-base mb-1">Calm Restore Serum</h3>
                    <p class="text-[#9A8F83] text-[10px] md:text-xs mb-3">Hyaluronic acid + oat lipid complex</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="font-semibold text-[#1C1917] text-base md:text-lg">€58</span>
                        <button class="btn-hover border border-[#E2D5C3] text-[10px] md:text-[11px] tracking-wide uppercase px-3 md:px-4 py-1.5 md:py-2 rounded-full hover:bg-[#1C1917] hover:text-white transition add-to-cart-btn" data-name="Calm Restore Serum" data-price="58">add</button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="product-card group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300" data-product="2">
                <div class="relative overflow-hidden bg-[#F5EFE4] aspect-[3/4]">
                    <img class="product-image w-full h-full object-cover transition duration-500" 
                         src="https://images.pexels.com/photos/4041394/pexels-photo-4041394.jpeg?w=600&h=800&fit=crop" 
                         alt="Barrier Shield Mist">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                        <span class="bg-white text-[#1C1917] text-[10px] md:text-[11px] tracking-wide uppercase px-4 md:px-5 py-1.5 md:py-2 rounded-full font-medium">Quick view</span>
                    </div>
                </div>
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-[9px] md:text-[10px] tracking-[0.14em] uppercase text-[#9A8F83]">Shield</span>
                        <span class="text-[10px] md:text-[11px] font-medium text-[#C4A882]">⭐ 4.8</span>
                    </div>
                    <h3 class="font-medium text-[#1C1917] text-sm md:text-base mb-1">Barrier Shield Mist</h3>
                    <p class="text-[#9A8F83] text-[10px] md:text-xs mb-3">Ceramide + prebiotic thermal water</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="font-semibold text-[#1C1917] text-base md:text-lg">€42</span>
                        <button class="btn-hover border border-[#E2D5C3] text-[10px] md:text-[11px] tracking-wide uppercase px-3 md:px-4 py-1.5 md:py-2 rounded-full hover:bg-[#1C1917] hover:text-white transition add-to-cart-btn" data-name="Barrier Shield Mist" data-price="42">add</button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="product-card group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300" data-product="3">
                <div class="relative overflow-hidden bg-[#1A1714] aspect-[3/4]">
                    <img class="product-image w-full h-full object-cover transition duration-500" 
                         src="https://images.pexels.com/photos/3735596/pexels-photo-3735596.jpeg?w=600&h=800&fit=crop" 
                         alt="Night Renewal Balm">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                        <span class="bg-white text-[#1C1917] text-[10px] md:text-[11px] tracking-wide uppercase px-4 md:px-5 py-1.5 md:py-2 rounded-full font-medium">Quick view</span>
                    </div>
                </div>
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-[9px] md:text-[10px] tracking-[0.14em] uppercase text-[#9A8F83]">Renew</span>
                        <span class="text-[10px] md:text-[11px] font-medium text-[#C4A882]">⭐ 5.0</span>
                    </div>
                    <h3 class="font-medium text-[#1C1917] text-sm md:text-base mb-1">Night Renewal Balm</h3>
                    <p class="text-[#9A8F83] text-[10px] md:text-xs mb-3">Bakuchiol + evening primrose</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="font-semibold text-[#1C1917] text-base md:text-lg">€74</span>
                        <button class="btn-hover border border-[#E2D5C3] text-[10px] md:text-[11px] tracking-wide uppercase px-3 md:px-4 py-1.5 md:py-2 rounded-full hover:bg-[#1C1917] hover:text-white transition add-to-cart-btn" data-name="Night Renewal Balm" data-price="74">add</button>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="product-card group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300" data-product="4">
                <div class="relative overflow-hidden bg-[#F5EFE4] aspect-[3/4]">
                    <img class="product-image w-full h-full object-cover transition duration-500" 
                         src="https://images.pexels.com/photos/4041395/pexels-photo-4041395.jpeg?w=600&h=800&fit=crop" 
                         alt="Radiance Day Oil">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                        <span class="bg-white text-[#1C1917] text-[10px] md:text-[11px] tracking-wide uppercase px-4 md:px-5 py-1.5 md:py-2 rounded-full font-medium">Quick view</span>
                    </div>
                </div>
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-[9px] md:text-[10px] tracking-[0.14em] uppercase text-[#9A8F83]">Radiance</span>
                        <span class="text-[10px] md:text-[11px] font-medium text-[#C4A882]">⭐ 4.9</span>
                    </div>
                    <h3 class="font-medium text-[#1C1917] text-sm md:text-base mb-1">Radiance Day Oil</h3>
                    <p class="text-[#9A8F83] text-[10px] md:text-xs mb-3">Vitamin C + marula & rosehip</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="font-semibold text-[#1C1917] text-base md:text-lg">€65</span>
                        <button class="btn-hover border border-[#E2D5C3] text-[10px] md:text-[11px] tracking-wide uppercase px-3 md:px-4 py-1.5 md:py-2 rounded-full hover:bg-[#1C1917] hover:text-white transition add-to-cart-btn" data-name="Radiance Day Oil" data-price="65">add</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Promise Banner - Responsive -->
        <div class="mt-12 md:mt-16 text-center">
            <div class="inline-flex flex-wrap justify-center gap-4 md:gap-8 text-[9px] md:text-[11px] tracking-[0.1em] uppercase text-[#9A8F83]">
                <span class="flex items-center gap-1.5 md:gap-2"><span class="w-1.5 h-1.5 bg-[#C4A882] rounded-full"></span> 97% natural origin</span>
                <span class="flex items-center gap-1.5 md:gap-2"><span class="w-1.5 h-1.5 bg-[#C4A882] rounded-full"></span> vegan & cruelty-free</span>
                <span class="flex items-center gap-1.5 md:gap-2"><span class="w-1.5 h-1.5 bg-[#C4A882] rounded-full"></span> carbon-neutral shipping</span>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial - Responsive -->
<section class="py-12 md:py-16 lg:py-20 bg-[#F5EFE4]">
    <div class="max-w-6xl mx-auto px-5 md:px-8 lg:px-12 text-center">
        <div class="max-w-2xl mx-auto">
            <div class="w-8 md:w-12 h-[1px] bg-[#C4A882] mx-auto mb-5 md:mb-6"></div>
            <p class="font-serif text-xl sm:text-2xl md:text-3xl italic text-[#1C1917] leading-relaxed px-3">“Formulated for sensitive, reactive skin — each ingredient chosen with intention, sourced with care.”</p>
            <p class="text-[#9A8F83] text-[10px] md:text-xs tracking-wide uppercase mt-5 md:mt-6">— Dr. Elena Marchetti, Scientific Advisory Board</p>
        </div>
    </div>
</section>

<!-- Footer - Responsive Grid -->
<footer class="bg-[#FAF7F2] border-t border-[#E2D5C3] pt-10 md:pt-12 pb-6 md:pb-8 px-5 md:px-8 lg:px-12">
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
        <div>
            <div class="font-serif text-lg md:text-xl tracking-[0.2em] text-[#1C1917] uppercase mb-2 md:mb-3">Psoricure</div>
            <p class="text-[11px] md:text-[12px] text-[#9A8F83] leading-relaxed">Skin science rooted in botanical tradition.</p>
        </div>
        <div>
            <h4 class="text-[9px] md:text-[10px] tracking-[0.14em] uppercase text-[#9A8F83] mb-3 md:mb-4">Shop</h4>
            <ul class="space-y-1.5 md:space-y-2 text-[12px] md:text-[13px] text-[#1C1917]">
                <li><a href="#" class="hover:text-[#8C6E50] transition">face care</a></li>
                <li><a href="#" class="hover:text-[#8C6E50] transition">body care</a></li>
                <li><a href="#" class="hover:text-[#8C6E50] transition">sets & rituals</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-[9px] md:text-[10px] tracking-[0.14em] uppercase text-[#9A8F83] mb-3 md:mb-4">Learn</h4>
            <ul class="space-y-1.5 md:space-y-2 text-[12px] md:text-[13px] text-[#1C1917]">
                <li><a href="#" class="hover:text-[#8C6E50] transition">journal</a></li>
                <li><a href="#" class="hover:text-[#8C6E50] transition">ingredients</a></li>
                <li><a href="#" class="hover:text-[#8C6E50] transition">sustainability</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-[9px] md:text-[10px] tracking-[0.14em] uppercase text-[#9A8F83] mb-3 md:mb-4">Newsletter</h4>
            <div class="flex border-b border-[#E2D5C3] pb-1">
                <input type="email" placeholder="your@email.com" class="bg-transparent border-none outline-none text-[11px] md:text-[12px] text-[#1C1917] flex-1 font-sans">
                <button class="text-[10px] md:text-[11px] tracking-[0.08em] uppercase text-[#8C6E50]">→</button>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto mt-8 md:mt-10 pt-5 md:pt-6 border-t border-[#E2D5C3] flex flex-col sm:flex-row justify-between text-[10px] md:text-[11px] text-[#9A8F83] gap-3 sm:gap-0 text-center sm:text-left">
        <span>© 2025 Psoricure. All rights reserved.</span>
        <div class="flex gap-4 md:gap-5 justify-center sm:justify-end">
            <a href="#" class="hover:text-[#1C1917] transition">privacy</a>
            <a href="#" class="hover:text-[#1C1917] transition">terms</a>
            <a href="#" class="hover:text-[#1C1917] transition">cookies</a>
        </div>
    </div>
</footer>

<!-- MODAL STRUCTURE -->
<div id="productModal" class="modal">
    <div class="modal-content">
        <div class="modal-close" id="closeModal">&times;</div>
        <div class="modal-image">
            <img id="modalProductImage" src="" alt="Product">
        </div>
        <div class="modal-details">
            <div class="modal-rating">
                <span id="modalProductRating" class="text-[#C4A882] text-sm">⭐ 4.9</span>
                <span class="text-[#9A8F83] text-xs">(124 reviews)</span>
            </div>
            <h2 id="modalProductName" class="font-serif text-2xl md:text-3xl font-light text-[#1C1917] mb-2">Product Name</h2>
            <p id="modalProductTagline" class="text-[#8C6E50] text-[10px] md:text-xs tracking-wide uppercase mb-3">Restore · Calm · Hydrate</p>
            <p id="modalProductDesc" class="text-[#9A8F83] text-xs md:text-sm leading-relaxed mb-4">Complete product description goes here.</p>
            
            <div class="mb-4">
                <h4 class="text-[9px] md:text-[10px] tracking-[0.14em] uppercase text-[#9A8F83] mb-2">Key Ingredients</h4>
                <div id="modalIngredients" class="ingredient-list"></div>
            </div>
            
            <div class="mb-4">
                <h4 class="text-[9px] md:text-[10px] tracking-[0.14em] uppercase text-[#9A8F83] mb-2">Benefits</h4>
                <ul id="modalBenefits" class="text-[12px] md:text-[13px] text-[#1C1917] space-y-1 list-disc pl-4"></ul>
            </div>
            
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mt-6 pt-4 border-t border-[#E2D5C3]">
                <div>
                    <span class="text-[#9A8F83] text-[10px] md:text-xs block">Price</span>
                    <span id="modalProductPrice" class="font-serif text-2xl md:text-3xl font-light text-[#1C1917]">€58</span>
                </div>
                <div class="flex items-center gap-3 md:gap-4">
                    <div class="quantity-selector">
                        <button class="quantity-btn" id="decrementQty">−</button>
                        <span class="quantity-number" id="modalQty">1</span>
                        <button class="quantity-btn" id="incrementQty">+</button>
                    </div>
                    <button id="modalAddToCart" class="bg-[#1C1917] text-white text-[10px] md:text-[11px] tracking-[0.1em] uppercase px-5 md:px-6 py-2.5 md:py-3 rounded-full hover:bg-[#8C6E50] transition">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // ========== NAVBAR SCROLL HIDE FUNCTIONALITY ==========
    const nav = document.querySelector('.main-nav');
    let lastScrollY = window.scrollY;
    let ticking = false;
    
    function handleScroll() {
        const currentScrollY = window.scrollY;
        
        // Add scrolled class for shadow effect (when scrolled past 10px)
        if (currentScrollY > 10) {
            nav.classList.add('nav-scrolled');
        } else {
            nav.classList.remove('nav-scrolled');
        }
        
        // Hide navbar on scroll down, show on scroll up
        if (currentScrollY > lastScrollY && currentScrollY > 100) {
            // Scrolling DOWN - hide navbar
            nav.classList.add('nav-hidden');
        } else if (currentScrollY < lastScrollY) {
            // Scrolling UP - show navbar
            nav.classList.remove('nav-hidden');
        }
        
        lastScrollY = currentScrollY;
        ticking = false;
    }
    
    window.addEventListener('scroll', () => {
        if (!ticking) {
            requestAnimationFrame(handleScroll);
            ticking = true;
        }
    });
    
    // Initial call to set correct state
    handleScroll();
    
    // ========== PRODUCT DATABASE ==========
    const products = {
        1: {
            name: "Calm Restore Serum",
            tagline: "Restore · Calm · Hydrate",
            image: "https://images.pexels.com/photos/4041392/pexels-photo-4041392.jpeg?w=800&h=1000&fit=crop",
            price: 58,
            rating: "⭐ 4.9",
            description: "A deeply hydrating, soothing serum formulated for sensitive and reactive skin. Features hyaluronic acid to plump and oat lipid complex to restore the skin barrier. Lightweight, fast-absorbing, and fragrance-free.",
            ingredients: ["Hyaluronic Acid", "Oat Lipid Complex", "Niacinamide", "Glycerin", "Panthenol"],
            benefits: ["Intense 72-hour hydration", "Strengthens skin barrier function", "Reduces redness & irritation", "Non-comedogenic", "Suitable for all skin types"]
        },
        2: {
            name: "Barrier Shield Mist",
            tagline: "Shield · Protect · Balance",
            image: "https://images.pexels.com/photos/4041394/pexels-photo-4041394.jpeg?w=800&h=1000&fit=crop",
            price: 42,
            rating: "⭐ 4.8",
            description: "An ultra-fine, refreshing mist that instantly calms and reinforces the skin's natural defense system. Ceramides and prebiotic thermal water work together to strengthen the microbiome.",
            ingredients: ["Ceramide NP", "Prebiotic Thermal Water", "Squalane", "Allantoin", "Green Tea Extract"],
            benefits: ["Instant soothing relief", "Reinforces skin barrier", "Balances microbiome", "Sets makeup", "Use throughout the day"]
        },
        3: {
            name: "Night Renewal Balm",
            tagline: "Renew · Repair · Soften",
            image: "https://images.pexels.com/photos/3735596/pexels-photo-3735596.jpeg?w=800&h=1000&fit=crop",
            price: 74,
            rating: "⭐ 5.0",
            description: "A rich, transformative night balm that works while you sleep. Bakuchiol (a natural retinol alternative) smooths fine lines, while evening primrose oil deeply nourishes.",
            ingredients: ["Bakuchiol", "Evening Primrose Oil", "Shea Butter", "Rosehip Oil", "Vitamin E"],
            benefits: ["Reduces fine lines", "Improves skin elasticity", "Overnight repair", "Gentle retinol alternative", "Wake up radiant"]
        },
        4: {
            name: "Radiance Day Oil",
            tagline: "Radiance · Illuminate · Even",
            image: "https://images.pexels.com/photos/4041395/pexels-photo-4041395.jpeg?w=800&h=1000&fit=crop",
            price: 65,
            rating: "⭐ 4.9",
            description: "A brightening, fast-absorbing facial oil that delivers instant luminosity. Vitamin C from Kakadu plum combined with cold-pressed marula and rosehip oils for a natural dewy glow.",
            ingredients: ["Vitamin C", "Marula Oil", "Rosehip Oil", "Jojoba Oil", "Sea Buckthorn"],
            benefits: ["Brightens dark spots", "Antioxidant protection", "Improves texture", "Natural dewy finish", "Wears under makeup"]
        }
    };

    let currentProductId = null;
    let currentQuantity = 1;

    const modal = document.getElementById('productModal');
    const closeModal = document.getElementById('closeModal');
    const modalProductImage = document.getElementById('modalProductImage');
    const modalProductName = document.getElementById('modalProductName');
    const modalProductTagline = document.getElementById('modalProductTagline');
    const modalProductRating = document.getElementById('modalProductRating');
    const modalProductDesc = document.getElementById('modalProductDesc');
    const modalProductPrice = document.getElementById('modalProductPrice');
    const modalIngredients = document.getElementById('modalIngredients');
    const modalBenefits = document.getElementById('modalBenefits');
    const modalQtySpan = document.getElementById('modalQty');
    const decrementBtn = document.getElementById('decrementQty');
    const incrementBtn = document.getElementById('incrementQty');
    const modalAddToCart = document.getElementById('modalAddToCart');

    // Open modal
    document.querySelectorAll('.product-card').forEach(card => {
        card.addEventListener('click', (e) => {
            if (e.target.classList.contains('add-to-cart-btn')) return;
            const productId = card.getAttribute('data-product');
            currentProductId = productId;
            currentQuantity = 1;
            modalQtySpan.textContent = currentQuantity;
            const product = products[productId];
            if (product) {
                modalProductImage.src = product.image;
                modalProductName.textContent = product.name;
                modalProductTagline.textContent = product.tagline;
                modalProductRating.textContent = product.rating;
                modalProductDesc.textContent = product.description;
                modalProductPrice.textContent = `€${product.price}`;
                modalIngredients.innerHTML = product.ingredients.map(ing => `<span class="ingredient-badge">${ing}</span>`).join('');
                modalBenefits.innerHTML = product.benefits.map(benefit => `<li>${benefit}</li>`).join('');
            }
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });

    function closeModalFunc() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }
    closeModal.addEventListener('click', closeModalFunc);
    modal.addEventListener('click', (e) => { if (e.target === modal) closeModalFunc(); });

    decrementBtn.addEventListener('click', () => { if (currentQuantity > 1) { currentQuantity--; modalQtySpan.textContent = currentQuantity; } });
    incrementBtn.addEventListener('click', () => { currentQuantity++; modalQtySpan.textContent = currentQuantity; });

    modalAddToCart.addEventListener('click', () => {
        const product = products[currentProductId];
        if (product) alert(`Added ${currentQuantity} × ${product.name} to cart\nTotal: €${product.price * currentQuantity}`);
        closeModalFunc();
    });

    document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const name = btn.getAttribute('data-name');
            const price = btn.getAttribute('data-price');
            alert(`Added ${name} to cart 🛒\nPrice: €${price}`);
        });
    });

    // Custom cursor (desktop only)
    const cursor = document.getElementById('cursor');
    if (cursor && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
        });
        document.querySelectorAll('a, button, .product-card, .btn-hover, .modal-close, .quantity-btn').forEach(el => {
            el.addEventListener('mouseenter', () => cursor.classList.add('expand'));
            el.addEventListener('mouseleave', () => cursor.classList.remove('expand'));
        });
    }
    
    // Smooth scroll to products
    document.querySelector('a[href="#products"]')?.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('#products')?.scrollIntoView({ behavior: 'smooth' });
    });
</script>
</body>
</html>