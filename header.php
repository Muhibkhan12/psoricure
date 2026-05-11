<style>
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
</style>
    
    <nav>
        <div class="nav-logo">Psoricure</div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="product.php">Products</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
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