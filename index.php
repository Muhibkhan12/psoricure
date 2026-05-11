<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSORICURE — Skin science, botanical soul.</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap"
        rel="stylesheet">
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
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --cream: #F5EFE4;
            --sand: #E2D5C3;
            --tan: #C4A882;
            --bark: #8C6E50;
            --ink: #1C1917;
            --off-white: #FAF7F2;
            --warm-gray: #9A8F83;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--off-white);
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
            font-weight: 300;
            cursor: none;
        }

        /* Custom cursor */
        .cursor {
            position: fixed;
            width: 8px;
            height: 8px;
            background: var(--ink);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
            transition: transform 0.15s ease, width 0.25s ease, height 0.25s ease, background 0.25s ease;
            mix-blend-mode: multiply;
        }

        .cursor.expand {
            width: 40px;
            height: 40px;
            background: var(--tan);
        }

        /* Announcement bar */
        .announcement {
            background: var(--ink);
            color: var(--cream);
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            text-align: center;
            padding: 10px 1rem;
            position: relative;
            overflow: hidden;
        }

        .announcement-track {
            display: inline-flex;
            gap: 4rem;
            animation: ticker 22s linear infinite;
            white-space: nowrap;
        }

        @keyframes ticker {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }

        /* Nav */
        nav {
            background: var(--off-white);
            border-bottom: 0.5px solid var(--sand);
            position: sticky;
            top: 0;
            z-index: 100;
            padding: 0 3rem;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 400;
            letter-spacing: 0.2em;
            color: var(--ink);
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            list-style: none;
            font-size: 12px;
            letter-spacing: 0.08em;
            color: var(--warm-gray);
        }

        .nav-links a:hover {
            color: var(--ink);
            transition: color 0.2s;
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
            cursor: none;
        }

        .nav-icons svg:hover {
            stroke: var(--ink);
            transition: stroke 0.2s;
        }

        /* Hero */
        .hero {
            display: grid;
            grid-template-columns: 58% 42%;
            height: calc(100vh - 96px);
            min-height: 520px;
        }

        .hero-left {
            background: var(--cream);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: flex-end;
            padding: 4rem;
        }

        .hero-img-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #D4B896 0%, #C4967A 40%, #E8C99A 100%);
            opacity: 0.35;
        }

        .hero-texture {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at 30% 20%, rgba(196, 168, 130, 0.4) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(140, 110, 80, 0.3) 0%, transparent 50%);
        }

        .hero-person {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(ellipse 180px 280px at 38% 35%, rgba(210, 170, 130, 0.9) 0%, transparent 70%),
                radial-gradient(ellipse 120px 200px at 42% 75%, rgba(185, 140, 100, 0.7) 0%, transparent 65%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-headline {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(42px, 5.5vw, 72px);
            font-weight: 300;
            line-height: 1.05;
            color: var(--ink);
            margin-bottom: 1.25rem;
        }

        .hero-headline em {
            font-style: italic;
        }

        .hero-headline .underline-accent {
            text-decoration: underline;
            text-decoration-thickness: 1px;
            text-underline-offset: 6px;
            text-decoration-color: var(--bark);
        }

        .hero-sub {
            font-size: 13px;
            color: var(--bark);
            letter-spacing: 0.04em;
            line-height: 1.7;
            max-width: 320px;
            margin-bottom: 2rem;
        }

        .pill-btn {
            display: inline-block;
            border: 1px solid var(--ink);
            border-radius: 999px;
            padding: 10px 28px;
            font-size: 12px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--ink);
            background: transparent;
            cursor: none;
            transition: background 0.3s, color 0.3s;
        }

        .pill-btn:hover {
            background: var(--ink);
            color: var(--cream);
        }

        .pill-btn-light {
            border-color: var(--cream);
            color: var(--cream);
        }

        .pill-btn-light:hover {
            background: var(--cream);
            color: var(--ink);
        }

        .hero-right {
            background: #1A1714;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-right-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
        }

        .product-float {
            animation: float 5s ease-in-out infinite;
            filter: drop-shadow(0 8px 20px rgba(0, 0, 0, 0.3));
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-12px);
            }
        }

        .section-tabs {
            display: flex;
            gap: 2rem;
            align-items: center;
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            font-weight: 400;
        }

        .tab-dot {
            width: 8px;
            height: 8px;
            background: var(--ink);
            border-radius: 50%;
            flex-shrink: 0;
        }

        .tab-active {
            color: var(--ink);
        }

        .tab-inactive {
            color: var(--warm-gray);
            cursor: none;
        }

        .tab-inactive:hover {
            color: var(--ink);
            transition: color 0.2s;
        }

        /* Updated product card styles with full images and hover overlay */
        .product-card {
            background: var(--cream);
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0;
            transition: transform 0.3s ease;
            cursor: none;
            position: relative;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-4px);
        }

        .product-image-wrapper {
            position: relative;
            width: 100%;
            aspect-ratio: 1 / 1.2;
            overflow: hidden;
        }

        .product-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-img {
            transform: scale(1.05);
        }

        .product-hover-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0) 100%);
            padding: 1.5rem 1rem 1rem;
            transform: translateY(100%);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .product-card:hover .product-hover-overlay {
            transform: translateY(0);
        }

        .hover-buttons {
            display: flex;
            gap: 0.75rem;
            justify-content: center;
        }

        .hover-btn {
            background: var(--off-white);
            border: none;
            padding: 8px 16px;
            font-size: 11px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            cursor: none;
            transition: all 0.2s ease;
            border-radius: 999px;
            font-family: 'DM Sans', sans-serif;
            font-weight: 400;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .hover-btn-cart {
            background: var(--ink);
            color: var(--cream);
        }

        .hover-btn-cart:hover {
            background: var(--bark);
            transform: scale(1.02);
        }

        .hover-btn-fav {
            background: var(--off-white);
            color: var(--ink);
            border: 1px solid var(--sand);
        }

        .hover-btn-fav:hover {
            background: var(--cream);
            color: var(--bark);
        }

        .hover-price {
            text-align: center;
            font-size: 14px;
            font-weight: 600;
            color: white;
            letter-spacing: 0.05em;
        }

        .product-info {
            padding: 1rem;
            text-align: center;
            width: 100%;
            background: var(--cream);
        }

        .product-label {
            font-size: 10px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--warm-gray);
            display: block;
            margin-bottom: 0.25rem;
        }

        .product-tag {
            font-size: 10px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--bark);
            display: block;
            margin-bottom: 0.5rem;
        }

        .product-name {
            font-size: 13px;
            color: var(--ink);
            text-align: center;
            font-weight: 400;
            margin-bottom: 0.25rem;
        }

        .product-price {
            font-size: 12px;
            color: var(--warm-gray);
        }

        .triptych {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            height: 520px;
        }

        .triptych-panel {
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: flex-end;
            padding: 2rem;
        }

        .triptych-panel:hover .triptych-img {
            transform: scale(1.04);
        }

        .triptych-img {
            position: absolute;
            inset: 0;
            transition: transform 0.6s ease;
            background-size: cover;
            background-position: center;
        }

        .triptych-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(28, 25, 23, 0.55) 0%, transparent 50%);
        }

        .triptych-label {
            position: absolute;
            top: 50%;
            left: 2rem;
            transform: translateY(-50%) rotate(-90deg);
            transform-origin: left center;
            font-family: 'Cormorant Garamond', serif;
            font-size: 32px;
            font-weight: 300;
            color: rgba(245, 239, 228, 0.9);
            letter-spacing: 0.05em;
            white-space: nowrap;
        }

        .triptych-content {
            position: relative;
            z-index: 2;
        }

        .ingredient-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 560px;
        }

        .ingredient-left {
            padding: 5rem 4rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .ingredient-headline {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(36px, 4vw, 58px);
            font-weight: 300;
            line-height: 1.1;
            color: var(--ink);
            margin-bottom: 1.5rem;
        }

        .ingredient-body {
            font-size: 13px;
            line-height: 1.8;
            color: var(--warm-gray);
            max-width: 360px;
            margin-bottom: 2rem;
        }

        .ingredient-right {
            position: relative;
            background: var(--sand);
            overflow: hidden;
        }

        .values-strip {
            background: var(--ink);
            color: var(--cream);
            padding: 4rem 3rem;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 3rem;
            border-top: 0.5px solid rgba(255, 255, 255, 0.1);
        }

        .value-item {
            border-top: 0.5px solid rgba(255, 255, 255, 0.2);
            padding-top: 1.5rem;
        }

        .value-number {
            font-family: 'Cormorant Garamond', serif;
            font-size: 42px;
            font-weight: 300;
            color: var(--tan);
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .value-label {
            font-size: 12px;
            letter-spacing: 0.08em;
            color: rgba(245, 239, 228, 0.6);
            text-transform: uppercase;
            margin-bottom: 0.75rem;
        }

        .value-desc {
            font-size: 13px;
            line-height: 1.7;
            color: rgba(245, 239, 228, 0.75);
        }

        footer {
            background: var(--off-white);
            border-top: 0.5px solid var(--sand);
            padding: 3rem;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 2rem;
        }

        .footer-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 20px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--ink);
            margin-bottom: 1rem;
        }

        .footer-tagline {
            font-size: 12px;
            color: var(--warm-gray);
            line-height: 1.6;
        }

        .footer-col-title {
            font-size: 10px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--warm-gray);
            margin-bottom: 1rem;
        }

        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
        }

        .footer-links a {
            font-size: 13px;
            color: var(--ink);
        }

        .footer-links a:hover {
            color: var(--bark);
            transition: color 0.2s;
        }

        .footer-bottom {
            border-top: 0.5px solid var(--sand);
            padding: 1.25rem 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 11px;
            color: var(--warm-gray);
            letter-spacing: 0.06em;
        }

        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-delay-1 {
            transition-delay: 0.1s;
        }

        .reveal-delay-2 {
            transition-delay: 0.2s;
        }

        .reveal-delay-3 {
            transition-delay: 0.3s;
        }

        .reveal-delay-4 {
            transition-delay: 0.4s;
        }

        @media (max-width: 768px) {
            .hero {
                grid-template-columns: 1fr;
                height: auto;
            }

            .hero-right {
                height: 300px;
            }

            .triptych {
                grid-template-columns: 1fr;
                height: auto;
            }

            .triptych-panel {
                height: 300px;
            }

            .ingredient-section {
                grid-template-columns: 1fr;
            }

            .ingredient-right {
                height: 360px;
            }

            .values-strip {
                grid-template-columns: 1fr;
            }

            footer {
                grid-template-columns: 1fr 1fr;
            }

            nav {
                padding: 0 1.5rem;
            }

            .hero-left {
                padding: 2rem;
            }

            .ingredient-left {
                padding: 3rem 2rem;
            }
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="cursor" id="cursor"></div>

    <div class="announcement">
        <span class="announcement-track">
            <span>Free shipping on orders over €45 &nbsp;·&nbsp; Clinically validated formulas &nbsp;·&nbsp; 100%
                botanical origin &nbsp;·&nbsp; Cruelty-free &nbsp;·&nbsp; Dermatologist tested</span>
            <span>Free shipping on orders over €45 &nbsp;·&nbsp; Clinically validated formulas &nbsp;·&nbsp; 100%
                botanical origin &nbsp;·&nbsp; Cruelty-free &nbsp;·&nbsp; Dermatologist tested</span>
        </span>
    </div>


<?php
    @include('header.php');
?>
    <section class="hero">
        <div class="hero-left">
            <div class="hero-img-bg"></div>
            <div class="hero-texture"></div>
            <div class="hero-person"></div>
            <div class="hero-content reveal">
                <h1 class="hero-headline">
                    skin science,<br>
                    botanical <span class="underline-accent"><em>soul.</em></span>
                </h1>
                <p class="hero-sub">Formulated for sensitive, reactive skin. Every ingredient chosen with intention,
                    sourced with care.</p>
                <a href="#" class="pill-btn">discover the range</a>
            </div>
        </div>

        <div class="hero-right">
            <video autoplay loop muted playsinline
                style="position:absolute; top:0; left:0; width:100%; height:100%; object-fit:cover;">
                <source src="product.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div
                style="position:absolute;bottom:2rem;left:50%;transform:translateX(-50%);display:flex;gap:8px;z-index:2;">
                <div style="width:20px;height:1px;background:var(--tan);"></div>
                <div style="width:8px;height:1px;background:rgba(196,168,130,0.3);"></div>
            </div>
        </div>
    </section>

    <!-- Best Sellers Section with restored images -->
    <section style="padding:5rem 3rem;background:var(--off-white);">
        <div style="display:flex;align-items:center;gap:1.5rem;margin-bottom:3rem;" class="reveal">
            <div class="tab-dot"></div>
            <div class="section-tabs">
                <span class="tab-active" data-tab="best" onclick="switchTab(this,'best')">best sellers</span>
                <span class="tab-inactive" data-tab="sets" onclick="switchTab(this,'sets')">sets</span>
            </div>
        </div>

        <div id="tab-best" style="display:grid;grid-template-columns:repeat(4,1fr);gap:1px;background:var(--sand);">
            <!-- Product 1 -->
            <div class="product-card reveal reveal-delay-1">
                <div class="product-image-wrapper">
                    <img class="product-img" src="https://images.unsplash.com/photo-1570194065650-d99fb4d8a547?w=600&h=800&fit=crop" alt="Calm Restore Serum">
                    <div class="product-hover-overlay">
                        <div class="hover-price">€58.00</div>
                        <div class="hover-buttons">
                            <button class="hover-btn hover-btn-cart" onclick="event.preventDefault(); alert('Added to cart: Calm Restore Serum')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                            <button class="hover-btn hover-btn-fav" onclick="event.preventDefault(); alert('Added to favorites: Calm Restore Serum')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-label">Restore</div>
                    <div class="product-tag">Calm · Hydrate</div>
                    <p class="product-name">Calm Restore Serum</p>
                    <p class="product-price">€58.00</p>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="product-card reveal reveal-delay-2">
                <div class="product-image-wrapper">
                    <img class="product-img" src="https://images.unsplash.com/photo-1608248597279-f99d160bfcbc?w=600&h=800&fit=crop" alt="Barrier Shield Mist">
                    <div class="product-hover-overlay">
                        <div class="hover-price">€42.00</div>
                        <div class="hover-buttons">
                            <button class="hover-btn hover-btn-cart" onclick="event.preventDefault(); alert('Added to cart: Barrier Shield Mist')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                            <button class="hover-btn hover-btn-fav" onclick="event.preventDefault(); alert('Added to favorites: Barrier Shield Mist')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-label">Shield</div>
                    <div class="product-tag">Protect · Balance</div>
                    <p class="product-name">Barrier Shield Mist</p>
                    <p class="product-price">€42.00</p>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="product-card reveal reveal-delay-3">
                <div class="product-image-wrapper">
                    <img class="product-img" src="https://images.unsplash.com/photo-1616949756403-5f3b2b8a4f9a?w=600&h=800&fit=crop" alt="Night Renewal Balm">
                    <div class="product-hover-overlay">
                        <div class="hover-price">€74.00</div>
                        <div class="hover-buttons">
                            <button class="hover-btn hover-btn-cart" onclick="event.preventDefault(); alert('Added to cart: Night Renewal Balm')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                            <button class="hover-btn hover-btn-fav" onclick="event.preventDefault(); alert('Added to favorites: Night Renewal Balm')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-label">Renew</div>
                    <div class="product-tag">Repair · Soften</div>
                    <p class="product-name">Night Renewal Balm</p>
                    <p class="product-price">€74.00</p>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="product-card reveal reveal-delay-4">
                <div class="product-image-wrapper">
                    <img class="product-img" src="https://images.unsplash.com/photo-1596462502278-27bfdc403aef?w=600&h=800&fit=crop" alt="Radiance Day Oil">
                    <div class="product-hover-overlay">
                        <div class="hover-price">€65.00</div>
                        <div class="hover-buttons">
                            <button class="hover-btn hover-btn-cart" onclick="event.preventDefault(); alert('Added to cart: Radiance Day Oil')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                            <button class="hover-btn hover-btn-fav" onclick="event.preventDefault(); alert('Added to favorites: Radiance Day Oil')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-label">Radiance</div>
                    <div class="product-tag">Illuminate · Even</div>
                    <p class="product-name">Radiance Day Oil</p>
                    <p class="product-price">€65.00</p>
                </div>
            </div>
        </div>

        <div id="tab-sets" style="display:none;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--sand);">
            <!-- Set 1 -->
            <div class="product-card" style="grid-column:span 1">
                <div class="product-image-wrapper">
                    <img class="product-img" src="https://images.unsplash.com/photo-1617897903246-71924b6eea7f?w=600&h=600&fit=crop" alt="Calm Ritual Set">
                    <div class="product-hover-overlay">
                        <div class="hover-price">€148.00 <span style="text-decoration:line-through;font-size:10px;">€165.00</span></div>
                        <div class="hover-buttons">
                            <button class="hover-btn hover-btn-cart" onclick="event.preventDefault(); alert('Added to cart: The Calm Ritual Set')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                            <button class="hover-btn hover-btn-fav" onclick="event.preventDefault(); alert('Added to favorites: The Calm Ritual Set')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-label">Starter</div>
                    <div class="product-tag">3-piece ritual</div>
                    <p class="product-name">The Calm Ritual Set</p>
                    <p class="product-price">€148.00 <span style="text-decoration:line-through;font-size:11px;margin-left:4px;">€165.00</span></p>
                </div>
            </div>

            <!-- Set 2 -->
            <div class="product-card">
                <div class="product-image-wrapper">
                    <img class="product-img" src="https://images.unsplash.com/photo-1612817288484-6f916006741a?w=600&h=600&fit=crop" alt="Skin Reset Programme">
                    <div class="product-hover-overlay">
                        <div class="hover-price">€220.00 <span style="text-decoration:line-through;font-size:10px;">€257.00</span></div>
                        <div class="hover-buttons">
                            <button class="hover-btn hover-btn-cart" onclick="event.preventDefault(); alert('Added to cart: Skin Reset Programme')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                            <button class="hover-btn hover-btn-fav" onclick="event.preventDefault(); alert('Added to favorites: Skin Reset Programme')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-label">Complete</div>
                    <div class="product-tag">5-piece routine</div>
                    <p class="product-name">Skin Reset Programme</p>
                    <p class="product-price">€220.00 <span style="text-decoration:line-through;font-size:11px;margin-left:4px;">€257.00</span></p>
                </div>
            </div>

            <!-- Set 3 -->
            <div class="product-card">
                <div class="product-image-wrapper">
                    <img class="product-img" src="https://images.unsplash.com/photo-1601049541289-9b1b7bbbfe19?w=600&h=600&fit=crop" alt="Travel Essentials Duo">
                    <div class="product-hover-overlay">
                        <div class="hover-price">€68.00</div>
                        <div class="hover-buttons">
                            <button class="hover-btn hover-btn-cart" onclick="event.preventDefault(); alert('Added to cart: Travel Essentials Duo')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                            <button class="hover-btn hover-btn-fav" onclick="event.preventDefault(); alert('Added to favorites: Travel Essentials Duo')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-label">Travel</div>
                    <div class="product-tag">Mini essentials</div>
                    <p class="product-name">Travel Essentials Duo</p>
                    <p class="product-price">€68.00</p>
                </div>
            </div>
        </div>
    </section>

    <section class="triptych">
        <div class="triptych-panel">
            <div class="triptych-img"
                style="background-image: url('https://images.unsplash.com/photo-1598440947619-2c35fc9aa908?w=800&h=1000&fit=crop');">
            </div>
            <div class="triptych-overlay"></div>
            <span class="triptych-label">face</span>
            <div class="triptych-content">
                <a href="#" class="pill-btn pill-btn-light" style="font-size:11px;padding:8px 22px;">shop face</a>
            </div>
        </div>
        <div class="triptych-panel">
            <div class="triptych-img"
                style="background-image: url('https://images.unsplash.com/photo-1631730359585-38a4935cbec4?w=800&h=1000&fit=crop');">
            </div>
            <div class="triptych-overlay"></div>
            <span class="triptych-label">tools</span>
            <div class="triptych-content">
                <a href="#" class="pill-btn pill-btn-light" style="font-size:11px;padding:8px 22px;">shop tools</a>
            </div>
        </div>
        <div class="triptych-panel">
            <div class="triptych-img"
                style="background-image: url('https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?w=800&h=1000&fit=crop');">
            </div>
            <div class="triptych-overlay"></div>
            <span class="triptych-label">body</span>
            <div class="triptych-content">
                <a href="#" class="pill-btn pill-btn-light" style="font-size:11px;padding:8px 22px;">shop body</a>
            </div>
        </div>
    </section>

    <section class="ingredient-section">
        <div class="ingredient-left reveal">
            <p
                style="font-size:11px;letter-spacing:0.14em;text-transform:uppercase;color:var(--warm-gray);margin-bottom:1.5rem;">
                Ingredient philosophy</p>
            <h2 class="ingredient-headline">
                precious<br>ingredients,<br><em>consciously sourced.</em>
            </h2>
            <p class="ingredient-body">
                Every formula begins in the field. We trace each active compound to its origin — from marula groves in
                Namibia to wild rosehip harvests in Patagonia. Our commitment to purity is non-negotiable.
            </p>
            <a href="#" class="pill-btn">all ingredients</a>
        </div>

        <div class="ingredient-right">
            <div
                style="position:relative;z-index:2;padding:3rem;display:grid;grid-template-columns:1fr 1fr;gap:1rem;height:100%;align-content:center;">
                <img src="https://images.unsplash.com/photo-1603909223429-69bb7101f420?w=300&h=400&fit=crop"
                    style="width:100%;height:auto;border-radius:12px;object-fit:cover;aspect-ratio:3/4;">
                <div style="display:flex;flex-direction:column;gap:1rem;">
                    <img src="https://images.unsplash.com/photo-1595434091143-b375ced5fe5c?w=300&h=200&fit=crop"
                        style="width:100%;height:auto;border-radius:12px;object-fit:cover;flex:1;">
                    <img src="https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?w=300&h=200&fit=crop"
                        style="width:100%;height:auto;border-radius:12px;object-fit:cover;flex:1;">
                </div>
            </div>
        </div>
    </section>

    <section class="values-strip reveal">
        <div class="value-item">
            <div class="value-number">97%</div>
            <div class="value-label">Natural origin</div>
            <div class="value-desc">Every formula audited for botanical purity. No synthetic fragrance, no sulphates, no
                compromise.</div>
        </div>
        <div class="value-item">
            <div class="value-number">12</div>
            <div class="value-label">Source countries</div>
            <div class="value-desc">Wild-harvested and ethically farmed ingredients, traced from field to formula.</div>
        </div>
        <div class="value-item">
            <div class="value-number">0</div>
            <div class="value-label">Animal testing</div>
            <div class="value-desc">Certified cruelty-free. Every product validated through clinical human trials only.
            </div>
        </div>
    </section>

    <section style="padding:5rem 3rem;background:var(--cream);">
        <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:3rem;" class="reveal">
            <h2 style="font-family:'Cormorant Garamond',serif;font-size:28px;font-weight:300;">from the journal</h2>
            <a href="#"
                style="font-size:12px;letter-spacing:0.08em;text-transform:uppercase;color:var(--warm-gray);border-bottom:0.5px solid var(--warm-gray);padding-bottom:2px;">all
                articles</a>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:2rem;">
            <article class="reveal reveal-delay-1">
                <img src="https://images.unsplash.com/photo-1570554886111-e80fcca6a029?w=400&h=300&fit=crop"
                    style="width:100%;aspect-ratio:4/3;border-radius:4px;margin-bottom:1.25rem;object-fit:cover;">
                <p
                    style="font-size:10px;letter-spacing:0.12em;text-transform:uppercase;color:var(--warm-gray);margin-bottom:0.5rem;">
                    Skin Science</p>
                <h3
                    style="font-family:'Cormorant Garamond',serif;font-size:20px;font-weight:400;line-height:1.3;margin-bottom:0.75rem;">
                    What the skin barrier actually does — and how to protect it</h3>
                <p style="font-size:12px;color:var(--warm-gray);">14 April 2025 · 6 min read</p>
            </article>
            <article class="reveal reveal-delay-2">
                <img src="https://images.unsplash.com/photo-1526947425960-945c6e72858f?w=400&h=300&fit=crop"
                    style="width:100%;aspect-ratio:4/3;border-radius:4px;margin-bottom:1.25rem;object-fit:cover;">
                <p
                    style="font-size:10px;letter-spacing:0.12em;text-transform:uppercase;color:var(--warm-gray);margin-bottom:0.5rem;">
                    Ritual</p>
                <h3
                    style="font-family:'Cormorant Garamond',serif;font-size:20px;font-weight:400;line-height:1.3;margin-bottom:0.75rem;">
                    The case for a two-step morning routine — nothing more</h3>
                <p style="font-size:12px;color:var(--warm-gray);">28 March 2025 · 4 min read</p>
            </article>
            <article class="reveal reveal-delay-3">
                <img src="https://images.unsplash.com/photo-1596621644888-839145c3ed60?w=400&h=300&fit=crop"
                    style="width:100%;aspect-ratio:4/3;border-radius:4px;margin-bottom:1.25rem;object-fit:cover;">
                <p
                    style="font-size:10px;letter-spacing:0.12em;text-transform:uppercase;color:var(--warm-gray);margin-bottom:0.5rem;">
                    Ingredients</p>
                <h3
                    style="font-family:'Cormorant Garamond',serif;font-size:20px;font-weight:400;line-height:1.3;margin-bottom:0.75rem;">
                    Marula oil: ancient remedy, modern proof</h3>
                <p style="font-size:12px;color:var(--warm-gray);">10 March 2025 · 5 min read</p>
            </article>
        </div>
    </section>

    <footer>
        <div>
            <div class="footer-logo">Psoricure</div>
            <p class="footer-tagline">Skin science rooted<br>in botanical tradition.</p>
        </div>
        <div>
            <p class="footer-col-title">Shop</p>
            <ul class="footer-links">
                <li><a href="#">face care</a></li>
                <li><a href="#">body care</a></li>
                <li><a href="#">beauty tools</a></li>
                <li><a href="#">sets & rituals</a></li>
                <li><a href="#">new arrivals</a></li>
            </ul>
        </div>
        <div>
            <p class="footer-col-title">Learn</p>
            <ul class="footer-links">
                <li><a href="#">journal</a></li>
                <li><a href="#">ingredients</a></li>
                <li><a href="#">skin types</a></li>
                <li><a href="#">about us</a></li>
                <li><a href="#">sustainability</a></li>
            </ul>
        </div>
        <div>
            <p class="footer-col-title">Support</p>
            <ul class="footer-links">
                <li><a href="#">contact</a></li>
                <li><a href="#">shipping & returns</a></li>
                <li><a href="#">faq</a></li>
                <li><a href="#">store locator</a></li>
            </ul>
            <div style="margin-top:1.5rem;">
                <p class="footer-col-title" style="margin-bottom:0.75rem;">Newsletter</p>
                <div style="display:flex;border-bottom:0.5px solid var(--sand);">
                    <input type="email" placeholder="your@email.com"
                        style="background:transparent;border:none;outline:none;font-size:12px;color:var(--ink);font-family:'DM Sans',sans-serif;flex:1;padding:6px 0;" />
                    <button
                        style="background:transparent;border:none;cursor:none;font-size:11px;letter-spacing:0.08em;text-transform:uppercase;color:var(--bark);padding:6px 0;">→</button>
                </div>
            </div>
        </div>
    </footer>
    <div class="footer-bottom">
        <span>© 2025 Psoricure. All rights reserved.</span>
        <span style="display:flex;gap:1.5rem;">
            <a href="#" style="color:var(--warm-gray);">privacy</a>
            <a href="#" style="color:var(--warm-gray);">terms</a>
            <a href="#" style="color:var(--warm-gray);">cookies</a>
        </span>
    </div>

    <script>
        const cursor = document.getElementById('cursor');
        document.addEventListener('mousemove', e => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
        });
        document.querySelectorAll('a, button, [class*="product-card"], [class*="triptych-panel"], svg, img').forEach(el => {
            el.addEventListener('mouseenter', () => cursor.classList.add('expand'));
            el.addEventListener('mouseleave', () => cursor.classList.remove('expand'));
        });

        function switchTab(el, tab) {
            document.querySelectorAll('[data-tab]').forEach(t => {
                t.classList.remove('tab-active');
                t.classList.add('tab-inactive');
            });
            el.classList.add('tab-active');
            el.classList.remove('tab-inactive');
            document.getElementById('tab-best').style.display = tab === 'best' ? 'grid' : 'none';
            document.getElementById('tab-sets').style.display = tab === 'sets' ? 'grid' : 'none';
        }

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); } });
        }, { threshold: 0.12 });
        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

        setTimeout(() => {
            document.querySelectorAll('.hero .reveal').forEach(el => el.classList.add('visible'));
        }, 200);
    </script>
</body>

</html>