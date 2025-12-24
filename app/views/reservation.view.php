<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitCoach - Profil Élite</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #1ed760; 
            --bg-body: #080808; 
            --card-bg: #111111; 
            --border: rgba(255, 255, 255, 0.08);
            --text-white: #ffffff;
            --text-muted: #888888;
            --input-bg: rgba(0, 0, 0, 0.3);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-white);
            line-height: 1.6;
        }

        /* --- Navbar Fixe & Nadiya --- */
        .navbar {
            position: fixed;
            top: 0; width: 100%;
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(8, 8, 8, 0.9);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            z-index: 1000;
        }

        .logo { 
            font-size: 1.4rem; font-weight: 800; 
            text-decoration: none; color: white; 
            letter-spacing: -1px; 
        }
        .logo span { color: var(--primary); }

        .nav-links { display: flex; gap: 35px; align-items: center; }
        .nav-links a { 
            text-decoration: none; 
            color: var(--text-muted); 
            font-size: 0.85rem; 
            font-weight: 600; 
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
            position: relative;
        }

        /* Effet Hover & Active sur la Nav */
        .nav-links a:hover, .nav-links a.active { color: var(--primary); }
        .nav-links a.active::after {
            content: '';
            position: absolute; bottom: -8px; left: 0;
            width: 100%; height: 2px; background: var(--primary);
            box-shadow: 0 0 10px var(--primary);
        }

        .container { 
            max-width: 1250px; 
            margin: 0 auto; 
            padding: 130px 20px 80px; 
        }

        /* --- Grid Layout --- */
        .main-grid {
            display: grid;
            grid-template-columns: 380px 1fr;
            gap: 50px;
            align-items: start;
        }

        /* --- Left Side: Coach Sidebar --- */
        .coach-sidebar {
            background: var(--card-bg);
            border-radius: 40px;
            padding: 35px;
            border: 1px solid var(--border);
            position: sticky;
            top: 110px;
        }

        .coach-image {
            width: 100%; height: 420px;
            border-radius: 30px;
            object-fit: cover;
            margin-bottom: 25px;
        }

        .specialty-tag { 
            color: var(--primary); font-weight: 800; 
            font-size: 0.7rem; letter-spacing: 2px; 
            text-transform: uppercase; display: block; margin-bottom: 10px;
        }

        .coach-sidebar h1 { font-size: 2.2rem; font-weight: 800; margin-bottom: 15px; }
        .coach-bio { color: var(--text-muted); font-size: 0.9rem; margin-bottom: 30px; }

        .certif-flex { display: flex; flex-wrap: wrap; gap: 10px; }
        .certif-badge { 
            background: rgba(255,255,255,0.03); 
            padding: 8px 15px; border-radius: 12px; 
            font-size: 0.75rem; border: 1px solid var(--border); 
        }

        /* --- Right Side: Booking --- */
        .booking-area { display: flex; flex-direction: column; gap: 30px; }

        .card-elite {
            background: var(--card-bg);
            border-radius: 40px;
            padding: 40px;
            border: 1px solid var(--border);
        }

        .section-header { font-size: 1.5rem; font-weight: 700; margin-bottom: 30px; }
        .section-header span { color: var(--primary); }

        /* --- Time Slots Interactive --- */
        .slots-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(135px, 1fr));
            gap: 15px;
        }

        .slot-pill {
            background: rgba(255,255,255,0.02);
            border: 1px solid var(--border);
            padding: 18px; border-radius: 20px;
            text-align: center; cursor: pointer;
            transition: 0.3s; font-weight: 600; color: var(--text-muted);
        }

        .slot-pill:hover { border-color: var(--primary); background: rgba(30, 215, 96, 0.05); color: white; }
        .slot-pill.selected {
            background: var(--primary); border-color: var(--primary);
            color: black; box-shadow: 0 10px 20px rgba(30, 215, 96, 0.2);
        }

        /* --- Booking Form --- */
        .reservation-form {
            display: grid; grid-template-columns: 1fr 1fr; gap: 25px;
        }

        .form-group { display: flex; flex-direction: column; gap: 10px; }
        .full-width { grid-column: span 2; }
        .form-group label { font-size: 0.7rem; color: var(--text-muted); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; }

        .input-box {
            background: var(--input-bg);
            border: 1px solid var(--border);
            padding: 16px; border-radius: 16px;
            color: white; font-family: inherit; transition: 0.3s;
        }
        .input-box:focus { border-color: var(--primary); outline: none; background: rgba(30, 215, 96, 0.02); }

        .btn-action {
            grid-column: span 2;
            background: var(--primary);
            color: black; padding: 22px;
            border-radius: 20px; border: none;
            font-weight: 800; font-size: 1.1rem;
            cursor: pointer; margin-top: 20px; transition: 0.4s;
        }
        .btn-action:hover { transform: scale(1.02); box-shadow: 0 15px 35px rgba(30, 215, 96, 0.25); }

        @media (max-width: 1000px) {
            .main-grid { grid-template-columns: 1fr; }
            .coach-sidebar { position: relative; top: 0; }
            .reservation-form { grid-template-columns: 1fr; }
            .btn-action, .full-width { grid-column: span 1; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="index.php" class="logo"><span>FIT</span>COACH</a>
        <div class="nav-links">
            <a href="reservation.controleur.php" class="active">Explore</a>
            <a href="mes_seances.controleur.php">Mes Séances</a>
            <a href="profile_client.controleur.php">Profil</a>
        </div>
    </nav>

    <div class="container">
        <div class="main-grid">
            
            <aside class="coach-sidebar">
                <img src="https://images.unsplash.com/photo-1594381898411-846e7d193883?w=600&q=80" alt="Coach Detail" class="coach-image">
                <span class="specialty-tag">Elite Performance</span>
                <h1>Marc Leblanc</h1>
                <p class="coach-bio">Préparez-vous à transformer votre physique. Mon approche est basée sur la force pure et la discipline mentale.</p>
                <div class="certif-flex">
                    <div class="certif-badge">🛡️ Master NASM</div>
                    <div class="certif-badge">🏅 Pro Force</div>
                </div>
            </aside>

            <main class="booking-area">
                
                <div class="card-elite">
                    <h2 class="section-header">Créneaux <span>Disponibles</span></h2>
                    <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 25px;">Cliquez sur l'heure pour l'ajouter automatiquement au formulaire :</p>
                    <div class="slots-grid">
                        <div class="slot-pill" onclick="fillTime('08:30 - 09:30', this)">08:30 AM</div>
                        <div class="slot-pill" onclick="fillTime('10:00 - 11:00', this)">10:00 AM</div>
                        <div class="slot-pill" onclick="fillTime('11:30 - 12:30', this)">11:30 AM</div>
                        <div class="slot-pill" onclick="fillTime('15:00 - 16:00', this)">15:00 PM</div>
                        <div class="slot-pill" onclick="fillTime('17:30 - 18:30', this)">17:30 PM</div>
                        <div class="slot-pill" onclick="fillTime('19:00 - 20:00', this)">19:00 PM</div>
                    </div>
                </div>

                <div class="card-elite">
                    <h2 class="section-header">Finaliser <span>la Réservation</span></h2>
                    <form class="reservation-form">
                        <div class="form-group">
                            <label>Date Choisie</label>
                            <input type="date" class="input-box">
                        </div>
                        <div class="form-group">
                            <label>Heure Sélectionnée</label>
                            <input type="text" id="target_time" class="input-box" placeholder="Choisir un slot..." readonly style="border-color: var(--primary);">
                        </div>
                        <div class="form-group full-width">
                            <label>Type de Programme</label>
                            <select class="input-box">
                                <option>Coaching Force & Hypertrophie</option>
                                <option>Perte de Gras Intensive</option>
                                <option>Consultation Nutrition</option>
                            </select>
                        </div>
                        <div class="form-group full-width">
                            <label>Notes (Optionnel)</label>
                            <textarea class="input-box" rows="3" placeholder="Objectifs, blessures, ou questions..."></textarea>
                        </div>
                        <button type="button" class="btn-action">Confirmer le RDV</button>
                    </form>
                </div>

            </main>
        </div>
    </div>

    <script>
        function fillTime(time, element) {
            // 1. Ma3mar l'input dial l'heure
            document.getElementById('target_time').value = time;

            // 2. Changer de style l'bouton
            const allPills = document.querySelectorAll('.slot-pill');
            allPills.forEach(p => p.classList.remove('selected'));
            element.classList.add('selected');
        }
    </script>
</body>
</html>