<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitCoach - Explorez l'Élite</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #1ed760; 
            --bg-body: #080808; 
            --sidebar-bg: rgba(15, 15, 15, 0.98);
            --card-bg: #111111; 
            --text-white: #ffffff;
            --text-muted: #888888;
            --border: rgba(255, 255, 255, 0.08);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background-color: var(--bg-body); color: var(--text-white); line-height: 1.6; overflow-x: hidden; }

        /* --- Navbar Upgrade --- */
        .navbar {
            position: fixed; top: 0; width: 100%; padding: 20px 8%;
            display: flex; justify-content: space-between; align-items: center;
            background: rgba(8, 8, 8, 0.85); backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border); z-index: 1000;
        }
        .logo { font-size: 1.4rem; font-weight: 800; text-decoration: none; color: white; letter-spacing: -1px; }
        .logo span { color: var(--primary); }
        .nav-links { display: flex; gap: 30px; align-items: center; }
        .nav-links a { text-decoration: none; color: var(--text-muted); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; transition: 0.3s; }
        .nav-links a.active { color: #fff; }

        .logout-btn {
            display: flex; align-items: center; gap: 8px;
            background: rgba(255, 70, 70, 0.1); border: 1px solid rgba(255, 70, 70, 0.2);
            padding: 8px 16px; border-radius: 12px; color: #ff4646 !important;
            font-size: 0.75rem !important; font-weight: 700 !important;
        }
        .logout-btn:hover { background: rgba(255, 70, 70, 0.2); transform: translateY(-2px); }

        /* --- Sidebar & Filter --- */
        .sidebar {
            position: fixed; top: 0; left: -350px; width: 320px; height: 100vh;
            background: var(--sidebar-bg); z-index: 2000; transition: 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            padding: 100px 30px; border-right: 1px solid var(--border);
        }
        .sidebar.active { left: 0; }
        .filter-trigger {
            position: fixed; bottom: 30px; right: 30px; width: 60px; height: 60px;
            background: var(--primary); border: none; border-radius: 20px;
            cursor: pointer; z-index: 2100; display: flex; align-items: center; justify-content: center;
            box-shadow: 0 10px 30px rgba(30, 215, 96, 0.3);
        }

        /* --- Grid Layout --- */
        .main-content { padding: 140px 8% 80px; }
        .page-header { margin-bottom: 50px; }
        .page-header h1 { font-size: 3.5rem; font-weight: 800; letter-spacing: -2px; line-height: 1; }
        .accent-text { color: var(--primary); }

        .coaches-grid {
            display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 35px;
        }

        /* --- Elite Card Design --- */
        .coach-card {
            background: var(--card-bg); border-radius: 30px; overflow: hidden;
            border: 1px solid var(--border); transition: 0.4s; position: relative;
        }
        .coach-card:hover { transform: translateY(-10px); border-color: var(--primary); }
        
        .img-box { height: 400px; position: relative; overflow: hidden; }
        .img-box img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
        .coach-card:hover .img-box img { scale: 1.05; }
        
        .card-overlay {
            position: absolute; bottom: 0; left: 0; right: 0; padding: 30px;
            background: linear-gradient(transparent, rgba(0,0,0,0.9));
        }

        .experience-tag {
            background: rgba(30, 215, 96, 0.2); color: var(--primary);
            padding: 4px 12px; border-radius: 8px; font-size: 0.65rem;
            font-weight: 800; text-transform: uppercase; letter-spacing: 1px;
        }

        .card-body { padding: 25px; }
        .certif-box {
            background: rgba(255,255,255,0.03); border-radius: 15px;
            padding: 15px; margin-bottom: 20px; border: 1px solid var(--border);
        }
        .certif-label { font-size: 0.6rem; color: var(--text-muted); text-transform: uppercase; margin-bottom: 5px; display: block; }
        .certif-name { font-size: 0.85rem; font-weight: 600; display: flex; align-items: center; gap: 8px; }

        .btn-reserve {
            width: 100%; background: var(--primary); color: #000;
            border: none; padding: 16px; border-radius: 15px;
            font-weight: 800; cursor: pointer; transition: 0.3s;
            text-decoration: none; display: block; text-align: center;
        }
        .btn-reserve:hover { box-shadow: 0 10px 20px rgba(30, 215, 96, 0.2); }

        .body-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.7); backdrop-filter: blur(5px);
            z-index: 1900; display: none;
        }
        .body-overlay.active { display: block; }

        @media (max-width: 768px) {
            .page-header h1 { font-size: 2.5rem; }
            .nav-links { display: none; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="index.php" class="logo"><span>FIT</span>COACH</a>
        <div class="nav-links">
            <a href="client_dash.controleur.php" class="active">Explorer</a>
            <a href="mes_seances.controleur.php">Mes Séances</a>
            <a href="deconexion.controleur.php" class="logout-btn">
                <i class="fa-solid fa-power-off"></i> <span>Déconnexion</span>
            </a>
        </div>
    </nav>

    <div class="body-overlay" id="overlay"></div>

    <aside class="sidebar" id="sidebar">
        <h2 style="margin-bottom: 30px; font-weight: 800;">Filtres <span style="color:var(--primary);">Elite</span></h2>
        <div style="margin-bottom: 25px;">
            <label style="font-size: 0.7rem; color: var(--text-muted); text-transform: uppercase; font-weight: 700;">Spécialité</label>
            <select style="width: 100%; background: #222; border: 1px solid var(--border); padding: 15px; color: #fff; border-radius: 12px; margin-top: 10px;">
                <option>Musculation</option>
                <option>Crossfit</option>
                <option>Yoga</option>
                <option>Cardio</option>
            </select>
        </div>
        <button class="btn-reserve">Appliquer les Filtres</button>
    </aside>

    <button class="filter-trigger" id="toggleSidebar">
        <i class="fa-solid fa-sliders" style="font-size: 1.5rem;"></i>
    </button>

    <main class="main-content">
        <div class="page-header">
            <p style="color: var(--primary); font-size: 0.75rem; font-weight: 800; letter-spacing: 4px; margin-bottom: 10px; text-transform: uppercase;">The Network</p>
            <h1>Élite <span class="accent-text">Performance</span></h1>
        </div>

        <div class="coaches-grid">
            <?php foreach($res as $ress){ 
                $pathPhoto = '../../public/uploads/' . basename($ress['photo']); 
            ?>
                <div class="coach-card">
                    <div class="img-box">
                        <img src="<?= $pathPhoto ?>" alt="Coach Profile">
                        <div class="card-overlay">
                            <div style="margin-bottom: 10px;">
                                <span class="experience-tag"><?= $ress['annees_experiance'] ?> Ans Exp.</span>
                            </div>
                            <h3 style="font-size: 1.6rem; font-weight: 800; line-height: 1.2;"><?= htmlspecialchars($ress['fullname']) ?></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="certif-box">
                            <span class="certif-label">Certification Principale</span>
                            <div class="certif-name">
                                <i class="fa-solid fa-certificate" style="color: var(--primary);"></i> 
                                <?= htmlspecialchars($ress['certification']) ?>
                            </div>
                        </div>
                        <a href="reservation.controleur.php?id=<?= $ress['id_coach'] ?>" class="btn-reserve">
                            Voir le Profil <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <footer style="padding: 60px 8% 40px; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; color: var(--text-muted); font-size: 0.8rem;">
        <div>© 2025 FITCOACH ELITE SYNC.</div>
        <div style="display: flex; gap: 30px;">
            <span>Instagram</span>
            <span>LinkedIn</span>
            <span>Support</span>
        </div>
    </footer>

    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const toggleBtn = document.getElementById('toggleSidebar');

        function toggle() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        toggleBtn.addEventListener('click', toggle);
        overlay.addEventListener('click', toggle);
    </script>
</body>
</html>