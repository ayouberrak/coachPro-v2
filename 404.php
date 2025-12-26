<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Lost in Space</title>
    <!-- Kan3ayto 3la FontAwesome bach ndiro les icones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* --- CSS START --- */
        @import url('https://fonts.googleapis.com/css2?family=Righteous&family=Roboto:wght@300;500&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            height: 100vh;
            overflow: hidden; /* Bach maibanch scrollbar */
            font-family: 'Roboto', sans-serif;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* Container dyal njoum (Stars) */
        .stars-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }

        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            opacity: 0.8;
            animation: twinkle var(--duration) infinite ease-in-out;
        }

        /* Animation dyal Twinkle (Njoum kaytfiw w ych3lo) */
        @keyframes twinkle {
            0%, 100% { opacity: 0.3; transform: scale(0.8); }
            50% { opacity: 1; transform: scale(1.2); }
        }

        /* Main Content */
        .container {
            text-align: center;
            z-index: 10;
            position: relative;
        }

        /* 404 Text design */
        .error-code {
            font-family: 'Righteous', cursive;
            font-size: 10rem;
            background: -webkit-linear-gradient(#ff00cc, #333399);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 20px rgba(255, 0, 204, 0.5);
            animation: glitch 3s infinite;
        }

        .description {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            color: #dcdcdc;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Button Design */
        .home-btn {
            padding: 12px 30px;
            font-size: 1rem;
            background: transparent;
            border: 2px solid #00d2ff;
            color: #00d2ff;
            text-decoration: none;
            border-radius: 50px;
            transition: 0.3s;
            text-transform: uppercase;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 0 10px #00d2ff55;
        }

        .home-btn:hover {
            background: #00d2ff;
            color: #1a1a2e;
            box-shadow: 0 0 20px #00d2ff, 0 0 40px #00d2ff;
            transform: translateY(-3px);
        }

        /* Astronaut SVG Container */
        .astronaut-container {
            width: 300px;
            margin: 0 auto;
            margin-top: -50px;
            animation: float 6s ease-in-out infinite;
        }

        .astronaut-svg {
            width: 100%;
            height: auto;
            filter: drop-shadow(0 0 15px rgba(0, 210, 255, 0.5));
        }

        /* Animations Keyframes */
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        @keyframes glitch {
            0% { text-shadow: 2px 2px 0px #ff00cc; }
            50% { text-shadow: -2px -2px 0px #00d2ff; }
            100% { text-shadow: 2px 2px 0px #ff00cc; }
        }

        /* Planet Icon f lkher (Deco) */
        .planet {
            position: absolute;
            font-size: 5rem;
            color: rgba(255, 255, 255, 0.1);
            top: 10%;
            right: 10%;
            animation: rotatePlanet 20s linear infinite;
        }

        @keyframes rotatePlanet {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        /* Mobile responsive */
        @media (max-width: 768px) {
            .error-code { font-size: 6rem; }
            .astronaut-container { width: 200px; }
        }
    </style>
</head>
<body>

    <!-- Background Stars -->
    <div class="stars-container" id="stars"></div>

    <!-- Decorative Planet Icon -->
    <i class="fa-solid fa-earth-americas planet"></i>

    <div class="container" id="scene">
        <!-- SVG Astronaut -->
        <div class="astronaut-container" data-speed="2">
            <!-- Simple SVG Astronaut inline code -->
            <svg class="astronaut-svg" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                <path fill="#ffffff" d="M256 0c-44.18 0-80 35.82-80 80v16c0 8.84-7.16 16-16 16h-16c-8.84 0-16 7.16-16 16v32c0 30.12 11.23 57.73 29.81 79.16C153.25 244.62 150.31 251.27 150 258c-.08 1.63-.12 3.28-.12 4.94V320c0 53.02 42.98 96 96 96s96-42.98 96-96v-57.06c0-1.66-.05-3.3-.12-4.94-.31-6.73-3.25-13.38-7.81-18.84C352.77 217.73 364 190.12 364 160v-32c0-8.84-7.16-16-16-16h-16c-8.84 0-16-7.16-16-16V80c0-44.18-35.82-80-80-80zm-48 80c0-17.67 14.33-32 32-32s32 14.33 32 32v16h-64V80zm64 160c-17.67 0-32-14.33-32-32h64c0 17.67-14.33 32-32 32z"/>
                <path fill="#00d2ff" opacity="0.6" d="M256 96c8.84 0 16 7.16 16 16v32c0 8.84-7.16 16-16 16s-16-7.16-16-16v-32c0-8.84 7.16-16 16-16z"/>
                <path fill="#e0e0e0" d="M256 416c-53.02 0-96-42.98-96-96v-48h192v48c0 53.02-42.98 96-96 96z"/>
            </svg>
        </div>

        <h1 class="error-code" data-speed="1">404</h1>
        <p class="description" data-speed="0.5">L'page li katqeleb 3liha mchat l'fada2!</p>
        
        <a href="/" class="home-btn">
            <i class="fa-solid fa-rocket"></i>
            Rje3 L'Home
        </a>
    </div>

    <script>
        // --- JAVASCRIPT START ---

        // 1. Script Bach nsawbo Njoum (Stars) bzaf f lbackground bla ma nektbohum f HTML
        const starsContainer = document.getElementById('stars');
        const starCount = 100; // 3adad njoum

        for (let i = 0; i < starCount; i++) {
            const star = document.createElement('div');
            star.classList.add('star');
            
            // Position 3chwa2iya (Random)
            const x = Math.random() * 100;
            const y = Math.random() * 100;
            const size = Math.random() * 3 + 1; // Hjam mokhtalifa
            const duration = Math.random() * 3 + 2; // Sor3a d animation mokhtalifa

            star.style.left = `${x}%`;
            star.style.top = `${y}%`;
            star.style.width = `${size}px`;
            star.style.height = `${size}px`;
            star.style.setProperty('--duration', `${duration}s`);

            starsContainer.appendChild(star);
        }

        // 2. Parallax Effect (Kiji m3a souris)
        document.addEventListener('mousemove', (e) => {
            const x = (window.innerWidth - e.pageX * 2) / 100;
            const y = (window.innerHeight - e.pageY * 2) / 100;

            // N7erko l'astronaut w titre chwiya
            document.querySelectorAll('[data-speed]').forEach(el => {
                const speed = el.getAttribute('data-speed');
                const xMove = x * speed;
                const yMove = y * speed;
                
                el.style.transform = `translateX(${xMove}px) translateY(${yMove}px)`;
            });
        });

    </script>
</body>
</html>