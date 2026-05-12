<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>PSORICURE — Contact Us | Botanical Skincare</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
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

        /* Navbar styles */
        .main-nav {
            background: var(--off-white);
            border-bottom: 0.5px solid var(--sand);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 0 3rem;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
        }

        .main-nav.nav-hidden {
            transform: translateY(-100%);
        }

        .main-nav.nav-scrolled {
            background: rgba(250, 247, 242, 0.98);
            backdrop-filter: blur(8px);
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }

        body {
            padding-top: 60px;
        }

        .nav-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 400;
            letter-spacing: 0.2em;
            color: var(--ink);
            text-transform: uppercase;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            list-style: none;
            font-size: 12px;
            letter-spacing: 0.08em;
            margin: 0;
            padding: 0;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--warm-gray);
            transition: color 0.2s;
        }

        .nav-links a:hover, .nav-links a.active {
            color: var(--ink);
        }

        .nav-icons {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-icons svg {
            width: 18px;
            height: 18px;
            stroke: var(--warm-gray);
            fill: none;
            stroke-width: 1.5;
            cursor: pointer;
            transition: stroke 0.2s;
        }

        .nav-icons svg:hover {
            stroke: var(--ink);
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            z-index: 101;
        }

        .mobile-menu-btn span {
            display: block;
            width: 22px;
            height: 2px;
            background: var(--ink);
            margin: 5px 0;
            transition: 0.3s;
        }

        :root {
            --off-white: #FAF7F2;
            --sand: #E2D5C3;
            --ink: #1C1917;
            --warm-gray: #9A8F83;
            --bark: #8C6E50;
            --tan: #C4A882;
            --cream: #F5EFE4;
        }

        @media (max-width: 768px) {
            .main-nav {
                padding: 0 1.5rem;
            }
            .mobile-menu-btn {
                display: block;
            }
            .nav-links {
                position: fixed;
                top: 60px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 60px);
                background: var(--off-white);
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
                padding-top: 3rem;
                gap: 2rem;
                transition: left 0.3s ease;
                z-index: 999;
                margin: 0;
            }
            .nav-links.active {
                left: 0;
            }
            .nav-links li a {
                font-size: 16px;
                letter-spacing: 0.1em;
            }
            .nav-icons {
                gap: 1rem;
            }
            .mobile-menu-btn.active span:nth-child(1) {
                transform: rotate(45deg) translate(5px, 5px);
            }
            .mobile-menu-btn.active span:nth-child(2) {
                opacity: 0;
            }
            .mobile-menu-btn.active span:nth-child(3) {
                transform: rotate(-45deg) translate(7px, -6px);
            }
        }

        @media (max-width: 480px) {
            .main-nav {
                padding: 0 1rem;
            }
            .nav-logo {
                font-size: 18px;
                letter-spacing: 0.15em;
            }
            .nav-icons svg {
                width: 16px;
                height: 16px;
            }
        }

        /* Form styles */
        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #E2D5C3;
            border-radius: 8px;
            background: white;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            transition: all 0.2s;
            outline: none;
        }
        .form-input:focus {
            border-color: #8C6E50;
            box-shadow: 0 0 0 2px rgba(140, 110, 80, 0.1);
        }
        .form-textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #E2D5C3;
            border-radius: 8px;
            background: white;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            transition: all 0.2s;
            outline: none;
            resize: vertical;
        }
        .form-textarea:focus {
            border-color: #8C6E50;
            box-shadow: 0 0 0 2px rgba(140, 110, 80, 0.1);
        }
        .submit-btn {
            background: #1C1917;
            color: #F5EFE4;
            padding: 12px 32px;
            border-radius: 999px;
            font-size: 12px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
        }
        .submit-btn:hover {
            background: #8C6E50;
            transform: translateY(-2px);
        }
        .info-card {
            background: #F5EFE4;
            border-radius: 16px;
            padding: 1.5rem;
            transition: transform 0.3s;
        }
        .info-card:hover {
            transform: translateY(-4px);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.6s ease forwards;
        }
    </style>
</head>
<body>

<!-- Custom cursor -->
<div class="cursor" id="cursor"></div>

<!-- Navigation Bar -->
<nav class="main-nav" id="mainNav">
    <a href="{{ url('/home') }}" class="nav-logo">Psoricure</a>
    <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <ul class="nav-links" id="navLinks">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/products') }}">Products</a></li>
        <li><a href="{{ url('/about') }}">About</a></li>
        <li><a href="{{ url('/contact') }}" class="active">Contact</a></li>
    </ul>
    <div class="nav-icons">
        <span style="font-size:11px;letter-spacing:0.08em;color:var(--warm-gray);">€ EUR</span>
        <svg viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="7" />
            <path d="m21 21-4.35-4.35" />
        </svg>
        <svg viewBox="0 0 24 24">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
            <circle cx="12" cy="7" r="4" />
        </svg>
        <svg viewBox="0 0 24 24">
            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <path d="M16 10a4 4 0 0 1-8 0" />
        </svg>
    </div>
</nav>

<!-- Hero Section -->
<section class="relative w-full overflow-hidden bg-[#1A1714]">
    <div class="absolute inset-0">
        <div class="w-full h-full object-cover opacity-40 bg-gradient-to-br from-[#1A1714] to-[#2A2520]"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/30 to-transparent"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-5 md:px-8 lg:px-12 py-16 md:py-20">
        <div class="max-w-2xl fade-in">
            <span class="inline-block text-[10px] md:text-[11px] tracking-[0.2em] text-[#E2D5C3] uppercase mb-3 md:mb-4">get in touch</span>
            <h1 class="font-serif text-4xl sm:text-5xl md:text-6xl font-light text-white leading-[1.1] mb-4 md:mb-5">
                let's connect,<br><span class="italic text-[#C4A882]">naturally.</span>
            </h1>
            <p class="text-[#E2D5C3] text-xs sm:text-sm md:text-base max-w-md leading-relaxed">
                Have questions about our formulas? Need skincare advice? We're here to help — reach out anytime.
            </p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16 md:py-24 px-5 md:px-8 lg:px-12">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
            
            <!-- Contact Form -->
            <div class="fade-in" style="animation-delay: 0.1s;">
                <div class="mb-8">
                    <div class="inline-flex items-center gap-2 mb-3">
                        <div class="w-8 h-[1px] bg-[#C4A882]"></div>
                        <span class="text-[10px] tracking-[0.2em] uppercase text-[#9A8F83]">send a message</span>
                    </div>
                    <h2 class="font-serif text-3xl md:text-4xl font-light text-[#1C1917]">we'd love to<br>hear from you</h2>
                </div>
                
                <form id="contactForm" class="space-y-5">
                    <div>
                        <label class="block text-[11px] uppercase tracking-[0.1em] text-[#9A8F83] mb-2">Full name *</label>
                        <input type="text" id="name" name="name" class="form-input" required placeholder="Your name">
                    </div>
                    
                    <div>
                        <label class="block text-[11px] uppercase tracking-[0.1em] text-[#9A8F83] mb-2">Email address *</label>
                        <input type="email" id="email" name="email" class="form-input" required placeholder="hello@example.com">
                    </div>
                    
                    <div>
                        <label class="block text-[11px] uppercase tracking-[0.1em] text-[#9A8F83] mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-input" placeholder="General inquiry, order question, etc.">
                    </div>
                    
                    <div>
                        <label class="block text-[11px] uppercase tracking-[0.1em] text-[#9A8F83] mb-2">Message *</label>
                        <textarea id="message" name="message" rows="5" class="form-textarea" required placeholder="Tell us how we can help..."></textarea>
                    </div>
                    
                    <button type="submit" class="submit-btn w-full md:w-auto">Send Message →</button>
                    
                    <p class="text-[11px] text-[#9A8F83] mt-3">* Required fields. We'll respond within 24-48 hours.</p>
                </form>
                
                <div id="formSuccess" class="hidden mt-5 p-4 bg-[#E2D5C3] rounded-xl text-[#1C1917] text-sm">
                    ✨ Thank you for reaching out! We'll get back to you soon.
                </div>
            </div>
            
            <!-- Contact Information -->
            <div class="space-y-8 fade-in" style="animation-delay: 0.2s;">
                <!-- Support Section -->
                <div class="info-card">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-[#C4A882]/20 flex items-center justify-center flex-shrink-0">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#8C6E50" stroke-width="1.5">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-serif text-xl font-medium text-[#1C1917] mb-1">Customer Support</h3>
                            <p class="text-[13px] text-[#9A8F83] mb-2">Mon - Fri: 9:00 AM - 6:00 PM CET</p>
                            <a href="mailto:care@psoricure.com" class="text-[#8C6E50] text-sm hover:underline">care@psoricure.com</a>
                        </div>
                    </div>
                </div>
                
                <!-- Wholesale Section -->
                <div class="info-card">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-[#C4A882]/20 flex items-center justify-center flex-shrink-0">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#8C6E50" stroke-width="1.5">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-serif text-xl font-medium text-[#1C1917] mb-1">Wholesale Inquiries</h3>
                            <p class="text-[13px] text-[#9A8F83] mb-2">Partnership and bulk orders</p>
                            <a href="mailto:wholesale@psoricure.com" class="text-[#8C6E50] text-sm hover:underline">wholesale@psoricure.com</a>
                        </div>
                    </div>
                </div>
                
                <!-- Media & Press -->
                <div class="info-card">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-[#C4A882]/20 flex items-center justify-center flex-shrink-0">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#8C6E50" stroke-width="1.5">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-serif text-xl font-medium text-[#1C1917] mb-1">Media & Press</h3>
                            <p class="text-[13px] text-[#9A8F83] mb-2">Press kits and interview requests</p>
                            <a href="mailto:press@psoricure.com" class="text-[#8C6E50] text-sm hover:underline">press@psoricure.com</a>
                        </div>
                    </div>
                </div>
                
                <!-- Address -->
                <div class="info-card">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-[#C4A882]/20 flex items-center justify-center flex-shrink-0">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#8C6E50" stroke-width="1.5">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-serif text-xl font-medium text-[#1C1917] mb-1">Studio Location</h3>
                            <p class="text-[13px] text-[#9A8F83] leading-relaxed">
                                Psoricure Atelier<br>
                                Herengracht 420<br>
                                1017 BZ Amsterdam<br>
                                Netherlands
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Map Section -->
        <div class="mt-16 pt-8 border-t border-[#E2D5C3] fade-in" style="animation-delay: 0.3s;">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <div class="inline-flex items-center gap-2 mb-3">
                        <div class="w-8 h-[1px] bg-[#C4A882]"></div>
                        <span class="text-[10px] tracking-[0.2em] uppercase text-[#9A8F83]">visit us</span>
                    </div>
                    <h2 class="font-serif text-2xl md:text-3xl font-light text-[#1C1917] mb-4">find our atelier</h2>
                    <p class="text-[#9A8F83] text-sm leading-relaxed mb-4">
                        Our Amsterdam atelier is open by appointment. We'd love to welcome you for a personalized consultation.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="text-[#8C6E50] text-xs uppercase tracking-wide hover:underline">Book an appointment →</a>
                        <a href="#" class="text-[#8C6E50] text-xs uppercase tracking-wide hover:underline">Get directions →</a>
                    </div>
                </div>
                <div class="bg-[#E2D5C3] rounded-2xl overflow-hidden h-64">
                    <img src="https://images.pexels.com/photos/2587054/pexels-photo-2587054.jpeg?w=800&h=500&fit=crop" alt="Amsterdam canal" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Teaser -->
<section class="py-12 md:py-16 bg-[#F5EFE4]">
    <div class="max-w-7xl mx-auto px-5 md:px-8 lg:px-12 text-center">
        <div class="max-w-2xl mx-auto">
            <div class="w-12 h-[1px] bg-[#C4A882] mx-auto mb-6"></div>
            <p class="font-serif text-xl md:text-2xl italic text-[#1C1917] leading-relaxed">“Before reaching out, browse our <a href="#" class="underline decoration-[#C4A882] hover:text-[#8C6E50]">FAQ</a> — you might find your answer there.”</p>
            <p class="text-[#9A8F83] text-xs tracking-wide uppercase mt-6">— we're here to help, always</p>
        </div>
    </div>
</section>

<!-- Footer -->
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

<script>
    // Navbar scroll hide functionality
    const nav = document.getElementById('mainNav');
    let lastScrollY = window.scrollY;
    let ticking = false;
    
    function handleScroll() {
        const currentScrollY = window.scrollY;
        if (currentScrollY > 10) {
            nav.classList.add('nav-scrolled');
        } else {
            nav.classList.remove('nav-scrolled');
        }
        if (currentScrollY > lastScrollY && currentScrollY > 100) {
            nav.classList.add('nav-hidden');
        } else if (currentScrollY < lastScrollY) {
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
    handleScroll();
    
    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const navLinks = document.getElementById('navLinks');
    
    if (mobileMenuBtn && navLinks) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenuBtn.classList.toggle('active');
            navLinks.classList.toggle('active');
            document.body.style.overflow = navLinks.classList.contains('active') ? 'hidden' : '';
        });
        
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenuBtn.classList.remove('active');
                navLinks.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
    }
    
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768 && navLinks && navLinks.classList.contains('active')) {
            navLinks.classList.remove('active');
            if (mobileMenuBtn) mobileMenuBtn.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
    
    // Form submission
    const contactForm = document.getElementById('contactForm');
    const formSuccess = document.getElementById('formSuccess');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Here you would normally send the form data to your server
            // For demo, we'll just show success message
            formSuccess.classList.remove('hidden');
            contactForm.reset();
            setTimeout(() => {
                formSuccess.classList.add('hidden');
            }, 5000);
        });
    }
    
    // Custom cursor
    const cursor = document.getElementById('cursor');
    if (cursor && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
        });
        document.querySelectorAll('a, button, .submit-btn, .info-card').forEach(el => {
            el.addEventListener('mouseenter', () => cursor.classList.add('expand'));
            el.addEventListener('mouseleave', () => cursor.classList.remove('expand'));
        });
    }
</script>
</body>
</html>