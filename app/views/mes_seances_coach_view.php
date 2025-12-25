<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Dashboard | FitSync Elite</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #1ed760;
            --accent: #00f2ff;
            --danger: #ff4646;
            --warning: #ffaa00;
            --bg: #020202;
            --glass: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.08);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg);
            color: #fff;
            min-height: 100vh;
            background-image: radial-gradient(circle at 0% 0%, rgba(30, 215, 96, 0.08) 0%, transparent 40%);
        }

        /* --- Navbar --- */
        .navbar {
            position: fixed; top: 0; width: 100%; padding: 18px 8%;
            display: flex; justify-content: space-between; align-items: center;
            background: rgba(2, 2, 2, 0.8); backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border); z-index: 1000;
        }
        .logo { font-weight: 800; font-size: 1.4rem; text-decoration: none; color: #fff; }
        .logo span { color: var(--primary); }

        .container { max-width: 1300px; margin: 120px auto 60px; padding: 0 25px; }

        /* --- Coach Stats --- */
        .stats-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px; margin-bottom: 40px;
        }
        .stat-card {
            background: var(--glass); border: 1px solid var(--glass-border);
            padding: 25px; border-radius: 25px; display: flex; align-items: center; gap: 20px;
        }
        .stat-icon {
            width: 50px; height: 50px; border-radius: 15px;
            display: flex; align-items: center; justify-content: center; font-size: 1.2rem;
        }

        /* --- Table Styling --- */
        .glass-panel {
            background: var(--glass); border: 1px solid var(--glass-border);
            border-radius: 35px; padding: 10px; backdrop-filter: blur(20px);
        }
        table { width: 100%; border-collapse: separate; border-spacing: 0 10px; }
        th { padding: 15px 25px; text-align: left; font-size: 0.7rem; text-transform: uppercase; color: rgba(255,255,255,0.3); letter-spacing: 2px; }
        td { padding: 20px 25px; background: rgba(255, 255, 255, 0.015); border-top: 1px solid var(--glass-border); border-bottom: 1px solid var(--glass-border); }
        td:first-child { border-left: 1px solid var(--glass-border); border-radius: 20px 0 0 20px; }
        td:last-child { border-right: 1px solid var(--glass-border); border-radius: 0 20px 20px 0; }

        /* --- Client Info --- */
        .client-info { display: flex; align-items: center; gap: 12px; }
        .client-avatar { width: 40px; height: 40px; border-radius: 50%; background: var(--primary); color: #000; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.8rem; }
        
        /* --- Action Buttons (Coach specific) --- */
        .btn-coach { padding: 10px 18px; border-radius: 12px; border: none; font-weight: 700; cursor: pointer; transition: 0.3s; font-size: 0.8rem; display: flex; align-items: center; gap: 8px; }
        .btn-accept { background: var(--primary); color: #000; }
        .btn-refuse { background: rgba(255, 70, 70, 0.1); color: var(--danger); border: 1px solid rgba(255, 70, 70, 0.2); }
        .btn-accept:hover { transform: scale(1.05); box-shadow: 0 0 20px rgba(30, 215, 96, 0.3); }
        .btn-refuse:hover { background: var(--danger); color: #fff; }

        .status-pill { padding: 6px 12px; border-radius: 8px; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; }
        .pill-pending { background: rgba(255, 170, 0, 0.1); color: var(--warning); }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="#" class="logo">FIT<span>COACH</span> <small style="font-size: 0.6rem; vertical-align: middle; opacity: 0.5;">COACH MODE</small></a>
        <div class="nav-links">
            <a href="logout.php" class="logout-btn" style="color: var(--danger); text-decoration: none; font-weight: 700; font-size: 0.8rem;">DÉCONNEXION</a>
        </div>
    </nav>

    <div class="container">
        <header style="margin-bottom: 40px;">
            <h1 style="font-size: 2.5rem; letter-spacing: -1.5px;">Gestion des <span>Séances</span></h1>
            <p style="color: rgba(255,255,255,0.4);">Gérez vos réservations et votre planning client</p>
        </header>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(30, 215, 96, 0.1); color: var(--primary);"><i class="fa-solid fa-calendar-check"></i></div>
                <div><span style="display:block; font-size:0.7rem; color:var(--text-muted);">Total Séances</span><b>24</b></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(255, 170, 0, 0.1); color: var(--warning);"><i class="fa-solid fa-clock-rotate-left"></i></div>
                <div><span style="display:block; font-size:0.7rem; color:var(--text-muted);">En Attente</span><b>05</b></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(0, 242, 255, 0.1); color: var(--accent);"><i class="fa-solid fa-user-group"></i></div>
                <div><span style="display:block; font-size:0.7rem; color:var(--text-muted);">Clients Actifs</span><b>12</b></div>
            </div>
        </div>

        <div class="glass-panel">
            <table>
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Discipline</th>
                        <th>Date & Heure</th>
                        <th>Statut</th>
                        <th>Décision</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="client-info">
                                <div class="client-avatar">YM</div>
                                <div><b style="font-size: 0.9rem;">Yassine Mansouri</b></div>
                            </div>
                        </td>
                        <td><span style="color: var(--primary); font-weight: 700; font-size: 0.8rem;">Boxing Elite</span></td>
                        <td>
                            <div style="font-size: 0.85rem;"><b>28 Déc. 2025</b></div>
                            <div style="font-size: 0.75rem; color: rgba(255,255,255,0.4);">18:30 (1h 30min)</div>
                        </td>
                        <td><span class="status-pill pill-pending">En Attente</span></td>
                        <td>
                            <div style="display: flex; gap: 10px;">
                                <button class="btn-coach btn-accept"><i class="fa-solid fa-check"></i> Accepter</button>
                                <button class="btn-coach btn-refuse"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
            </table>
        </div>
    </div>

</body>
</html>