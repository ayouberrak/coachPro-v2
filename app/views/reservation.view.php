<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitCoach - Profil Élite</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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
        body { font-family: 'Poppins', sans-serif; background-color: var(--bg-body); color: var(--text-white); line-height: 1.6; }
        
        .navbar { position: fixed; top: 0; width: 100%; padding: 18px 8%; display: flex; justify-content: space-between; align-items: center; background: rgba(8, 8, 8, 0.9); backdrop-filter: blur(20px); border-bottom: 1px solid var(--border); z-index: 1000; }
        .logo { font-size: 1.4rem; font-weight: 800; text-decoration: none; color: white; letter-spacing: -1px; }
        .logo span { color: var(--primary); }
        .nav-links { display: flex; gap: 35px; align-items: center; }
        .nav-links a { text-decoration: none; color: var(--text-muted); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; transition: 0.3s; }
        .nav-links a.active { color: var(--primary); }

        .container { max-width: 1250px; margin: 0 auto; padding: 130px 20px 80px; }
        .main-grid { display: grid; grid-template-columns: 380px 1fr; gap: 50px; align-items: start; }

        /* --- Sidebar Coach --- */
        .coach-sidebar { background: var(--card-bg); border-radius: 40px; padding: 30px; border: 1px solid var(--border); position: sticky; top: 110px; }
        .coach-image { width: 100%; height: 380px; border-radius: 30px; object-fit: cover; margin-bottom: 20px; border: 1px solid var(--border); }
        .coach-sidebar h1 { font-size: 1.8rem; font-weight: 800; margin-bottom: 8px; }
        .coach-bio { color: var(--text-muted); font-size: 0.85rem; margin-bottom: 20px; line-height: 1.5; }

        .info-pill { background: rgba(255,255,255,0.03); border: 1px solid var(--border); padding: 15px; border-radius: 20px; display: flex; align-items: center; gap: 15px; margin-bottom: 25px; }
        .info-pill i { color: var(--primary); font-size: 1.2rem; }
        .info-pill div span { display: block; font-size: 0.65rem; text-transform: uppercase; color: var(--text-muted); font-weight: 700; }
        .info-pill div b { font-size: 1rem; color: #fff; }

        .certif-section h4 { font-size: 0.75rem; text-transform: uppercase; color: var(--text-white); margin-bottom: 12px; letter-spacing: 1px; }
        .cert-badge { display: inline-block; background: rgba(30, 215, 96, 0.1); border: 1px solid rgba(30, 215, 96, 0.2); color: var(--primary); padding: 6px 14px; border-radius: 10px; font-size: 0.7rem; font-weight: 700; }

        /* --- Booking Area --- */
        .booking-area { display: flex; flex-direction: column; gap: 30px; }
        .card-elite { background: var(--card-bg); border-radius: 40px; padding: 40px; border: 1px solid var(--border); }
        .section-header { font-size: 1.5rem; font-weight: 700; margin-bottom: 25px; }
        .section-header span { color: var(--primary); }

        .reservation-form { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .form-group { display: flex; flex-direction: column; gap: 8px; }
        .full-width { grid-column: span 2; }
        .input-box { background: var(--input-bg); border: 1px solid var(--border); padding: 15px; border-radius: 15px; color: white; font-family: inherit; transition: 0.3s; width: 100%; }
        .input-box:focus { border-color: var(--primary); outline: none; background: rgba(255, 255, 255, 0.05); }

        /* Style spécifique pour l'input time */
        input[type="time"]::-webkit-calendar-picker-indicator { filter: invert(1); cursor: pointer; }

        .btn-action { grid-column: span 2; background: var(--primary); color: black; padding: 20px; border-radius: 20px; border: none; font-weight: 800; font-size: 1.1rem; cursor: pointer; margin-top: 10px; transition: 0.4s; }
        .btn-action:hover { transform: scale(1.02); box-shadow: 0 15px 35px rgba(30, 215, 96, 0.25); }

        @media (max-width: 1000px) { .main-grid { grid-template-columns: 1fr; } .reservation-form { grid-template-columns: 1fr; } .btn-action, .full-width { grid-column: span 1; } }
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
            <?php $pathPhoto = '../../public/uploads/' . basename($res['photo']); ?>
            
            <aside class="coach-sidebar">
                <img src="<?=$pathPhoto?>" class="coach-image">
                <h1><?=$res['fullname'] ?></h1>
                <p class="coach-bio"><?=$res['biographie']?></p>

                <div class="info-pill">
                    <i class="fa-solid fa-award"></i>
                    <div>
                        <span>Expérience</span>
                        <b><?=$res['annees_experiance']?> Ans</b>
                    </div>
                </div>

                <div class="certif-section">
                    <h4>Certifications</h4>
                    <span class="cert-badge"><?=$res['certification']?></span>
                </div>
            </aside>

            <main class="booking-area">
                <div class="card-elite">
                    <h2 class="section-header">Réserver une <span>Séance</span></h2>
                    <form class="reservation-form" method="POST" action="">
                        
                        <div class="form-group">
                            <label style="font-size:0.7rem; font-weight:700; color:var(--text-muted); text-transform:uppercase;">Date de la séance</label>
                            <input type="date" class="input-box" name="dateDebut" required>
                        </div>

                        <div class="form-group">
                            <label style="font-size:0.7rem; font-weight:700; color:var(--text-muted); text-transform:uppercase;">Discipline (Sport)</label>
                            <select class="input-box" name="sport_id">
                                <option value="1">Musculation</option>
                                <option value="2">Yoga</option>
                                <option value="3">Football</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label style="font-size:0.7rem; font-weight:700; color:var(--text-muted); text-transform:uppercase;">Heure de début</label>
                            <input type="time" name="heure_debut" class="input-box" required>
                        </div>

                        <div class="form-group">
                            <label style="font-size:0.7rem; font-weight:700; color:var(--text-muted); text-transform:uppercase;">Durée prévue</label>
                            <input type="text" name="durre" class="input-box" placeholder="Ex: 1h 30min" required>
                        </div>

                        <div class="form-group full-width">
                            <label style="font-size:0.7rem; font-weight:700; color:var(--text-muted); text-transform:uppercase;">Notes complémentaires</label>
                            <textarea class="input-box" name="notes" rows="3" placeholder="Objectifs ou remarques..."></textarea>
                        </div>

                        <button type="submit" class="btn-action">Confirmer la Réservation</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

</body>
</html>