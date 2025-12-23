<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitCoach - Explorez l'Élite</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-accent: #1ed760; 
            --bg-body: #080808; 
            --sidebar-bg: rgba(15, 15, 15, 0.98);
            --card-bg: #111111; 
            --text-white: #ffffff;
            --text-muted: #888888;
            --border-subtle: rgba(255, 255, 255, 0.05);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-white);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* --- Navbar Minimalist --- */
        .navbar-minimal {
            position: fixed;
            top: 0; width: 100%;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(8, 8, 8, 0.8);
            z-index: 1000;
            backdrop-filter: blur(15px);
            border-bottom: 1px solid var(--border-subtle);
        }

        .logo { font-size: 1.2rem; font-weight: 800; letter-spacing: 1px; }
        .logo span { color: var(--primary-accent); }

        /* --- Sidebar & Filter --- */
        .sidebar {
            position: fixed;
            top: 0; left: -350px; 
            width: 320px; height: 100vh;
            background: var(--sidebar-bg);
            z-index: 2000;
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            padding: 100px 30px;
            border-right: 1px solid var(--border-subtle);
        }

        .sidebar.active { left: 0; box-shadow: 20px 0 40px rgba(0,0,0,0.6); }

        .filter-trigger {
            position: fixed; bottom: 40px; right: 40px;
            width: 55px; height: 55px;
            background: var(--primary-accent);
            border: none; border-radius: 18px;
            cursor: pointer; z-index: 2100;
            display: flex; align-items: center; justify-content: center;
            transition: 0.3s;
        }
        .filter-trigger:hover { transform: scale(1.1) rotate(15deg); }

        /* --- Main Content --- */
        .main-content { padding: 140px 8% 80px; }

        .page-header { margin-bottom: 50px; }
        .page-header h1 { font-size: 3rem; font-weight: 800; letter-spacing: -1px; }
        .accent-text { color: var(--primary-accent); }

        /* --- Coach Cards --- */
        .coaches-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .coach-card {
            background: var(--card-bg);
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid var(--border-subtle);
            transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .coach-card:hover {
            transform: translateY(-8px);
            border-color: rgba(30, 215, 96, 0.3);
        }

        .img-box { height: 360px; position: relative; }
        .img-box img { width: 100%; height: 100%; object-fit: cover; }
        
        .card-overlay {
            position: absolute; bottom: 0; left: 0; right: 0;
            padding: 25px;
            background: linear-gradient(transparent, rgba(0,0,0,0.95));
        }

        .experience-tag {
            font-size: 0.65rem; font-weight: 700; color: var(--primary-accent);
            text-transform: uppercase; letter-spacing: 2px;
            display: block; margin-bottom: 5px;
        }

        .card-body { padding: 25px; }

        .certif-box {
            background: rgba(255,255,255,0.03);
            border-radius: 12px;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px dashed rgba(255,255,255,0.1);
        }

        .certif-label {
            font-size: 0.6rem; color: var(--text-muted);
            text-transform: uppercase; letter-spacing: 1px; display: block;
        }

        .certif-name {
            font-size: 0.85rem; font-weight: 500; color: #eee;
            display: flex; align-items: center; gap: 8px;
        }

        .btn-reserve {
            width: 100%; background: var(--primary-accent); color: #000;
            border: none; padding: 14px; border-radius: 12px;
            font-weight: 700; cursor: pointer; transition: 0.3s;
            text-decoration: none; display: block; text-align: center;
        }

        .btn-reserve:hover { filter: brightness(1.1); transform: scale(1.02); }

        .footer-elite {
            padding: 40px 8%; border-top: 1px solid var(--border-subtle);
            color: var(--text-muted); font-size: 0.75rem;
            display: flex; justify-content: space-between;
        }

        .body-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.6); z-index: 1900;
            display: none; backdrop-filter: blur(4px);
        }
        .body-overlay.active { display: block; }

    </style>
</head>
<body>

    <nav class="navbar-minimal">
        <div class="logo"><span>FIT</span>COACH</div>
        <div style="display: flex; gap: 25px; font-size: 0.85rem;">
            <a href="#" style="color: #fff; text-decoration: none;">Explore</a>
            <a href="#" style="color: var(--text-muted); text-decoration: none;">Mes Séances</a>
        </div>
    </nav>

    <div class="body-overlay" id="overlay"></div>

    <aside class="sidebar" id="sidebar">
        <h2 style="margin-bottom: 25px;">Filtres</h2>
        <div style="margin-bottom: 20px;">
            <label style="font-size: 0.7rem; color: var(--text-muted); text-transform: uppercase;">Discipline</label>
            <select style="width: 100%; background: #222; border: none; padding: 12px; color: #fff; border-radius: 8px; margin-top: 8px;">
                <option>Musculation</option>
                <option>Cardio</option>
            </select>
        </div>
        <button class="btn-reserve">Appliquer</button>
    </aside>

    <button class="filter-trigger" id="toggleSidebar">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2.5"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="2" y1="14" x2="6" y2="14"></line><line x1="10" y1="8" x2="14" y2="8"></line><line x1="18" y1="16" x2="22" y2="16"></line></svg>
    </button>

    <main class="main-content">
        <div class="page-header">
            <p style="color: var(--primary-accent); font-size: 0.7rem; font-weight: 700; letter-spacing: 3px; margin-bottom: 10px;">PREMIUM COACHING</p>
            <h1>Élite <span class="accent-text">Network</span></h1>
        </div>

        <div class="coaches-grid">
            <?php foreach($res as $ress){ 
                $pathPhoto = '../../public/uploads/' . basename($ress['photo']); 
            ?>
                <div class="coach-card">
                    <div class="img-box">
                        <img src="<?= $pathPhoto ?>" alt="Coach">
                        <div class="card-overlay">
                            <span class="experience-tag"><?= $ress['annees_experiance'] ?> Ans d'Expérience</span>
                            <h3 style="font-size: 1.4rem; font-weight: 700;"><?= $ress['fullname'] ?></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="certif-box">
                            <span class="certif-label">Certification</span>
                            <div class="certif-name">
                                <span>🛡️</span> <?= $ress['certification'] ?>
                            </div>
                        </div>
                        <a href="reservation.php?id=<?= $ress['id_coach'] ?>" class="btn-reserve">Réserver une séance</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <footer class="footer-elite">
        <div>© 2025 FITCOACH ELITE</div>
        <div style="display: flex; gap: 20px;">
            <span>Confidentialité</span>
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