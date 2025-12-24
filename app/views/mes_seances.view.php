<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Séances | FitSync Elite</title>
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
            --glass-border: rgba(255, 255, 255, 0.07);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg);
            color: #fff;
            min-height: 100vh;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(30, 215, 96, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(0, 242, 255, 0.05) 0%, transparent 40%);
        }

        /* --- Navbar Nadiya --- */
        nav {
            position: fixed; top: 0; width: 100%;
            padding: 20px 8%; display: flex; justify-content: space-between; align-items: center;
            background: rgba(2, 2, 2, 0.7); backdrop-filter: blur(25px);
            border-bottom: 1px solid var(--glass-border); z-index: 1000;
        }
        .logo { font-weight: 800; font-size: 1.4rem; letter-spacing: -1px; text-decoration: none; color: #fff; }
        .logo span { color: var(--primary); }
        .nav-links { display: flex; gap: 40px; }
        .nav-links a { 
            text-decoration: none; color: rgba(255,255,255,0.4); 
            font-size: 0.85rem; font-weight: 700; transition: 0.4s;
        }
        .nav-links a.active { color: #fff; position: relative; }
        .nav-links a.active::after {
            content: ''; position: absolute; bottom: -8px; left: 0; width: 100%; height: 2px; background: var(--primary); box-shadow: 0 0 10px var(--primary);
        }

        .container { max-width: 1200px; margin: 130px auto 60px; padding: 0 25px; }

        .header-title { margin-bottom: 40px; }
        .header-title h1 { font-size: 2.5rem; font-weight: 800; letter-spacing: -1.5px; }

        /* --- Glass Table --- */
        .glass-panel {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 35px;
            padding: 10px;
            backdrop-filter: blur(15px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
        }

        table { width: 100%; border-collapse: separate; border-spacing: 0 10px; }
        
        th { 
            padding: 15px 25px; text-align: left; font-size: 0.7rem; 
            text-transform: uppercase; letter-spacing: 2px; color: rgba(255,255,255,0.3);
        }

        tr { transition: 0.3s; }

        td { 
            padding: 20px 25px; 
            background: rgba(255, 255, 255, 0.01);
            border-top: 1px solid var(--glass-border);
            border-bottom: 1px solid var(--glass-border);
        }

        td:first-child { border-left: 1px solid var(--glass-border); border-radius: 20px 0 0 20px; }
        td:last-child { border-right: 1px solid var(--glass-border); border-radius: 0 20px 20px 0; }

        tr:hover td { background: rgba(255, 255, 255, 0.04); transform: translateY(-2px); border-color: rgba(255,255,255,0.15); }

        /* --- Elements Style --- */
        .coach-profile { display: flex; align-items: center; gap: 15px; }
        .coach-profile img { width: 45px; height: 45px; border-radius: 14px; object-fit: cover; border: 1px solid var(--glass-border); }
        .coach-profile b { font-size: 0.95rem; display: block; }
        
        .sport-badge {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 6px 14px; border-radius: 12px; font-size: 0.75rem; font-weight: 700;
            background: rgba(0, 242, 255, 0.07); color: var(--accent); border: 1px solid rgba(0, 242, 255, 0.15);
        }

        .status-tag { display: flex; align-items: center; gap: 8px; font-size: 0.8rem; font-weight: 600; }
        .status-tag.confirmed { color: var(--primary); }
        .status-tag.pending { color: var(--warning); }
        .pulse { width: 8px; height: 8px; border-radius: 50%; background: currentColor; box-shadow: 0 0 10px currentColor; }

        /* --- Neon Buttons --- */
        .action-group { display: flex; gap: 12px; }
        
        .btn-nadi {
            padding: 10px 18px; border-radius: 12px; border: 1px solid var(--glass-border);
            background: rgba(255,255,255,0.03); color: #fff; cursor: pointer;
            font-family: inherit; font-size: 0.75rem; font-weight: 700;
            display: flex; align-items: center; gap: 8px; transition: 0.3s;
        }

        .btn-edit:hover { 
            background: rgba(30, 215, 96, 0.1); border-color: var(--primary); color: var(--primary);
            box-shadow: 0 0 20px rgba(30, 215, 96, 0.1);
        }

        .btn-delete:hover { 
            background: rgba(255, 70, 70, 0.1); border-color: var(--danger); color: var(--danger);
            box-shadow: 0 0 20px rgba(255, 70, 70, 0.1);
        }

        @media (max-width: 900px) {
            .nav-links { display: none; }
            .glass-panel { overflow-x: auto; }
            table { min-width: 850px; }
        }
    </style>
</head>
<body>

    <nav>
        <a href="#" class="logo">FIT<span>SYNC</span></a>
        <div class="nav-links">
            <a href="explore.php">Explorer</a>
            <a href="mes-seances.php" class="active">Mes Séances</a>
            <a href="profil.php">Profil</a>
        </div>
    </nav>

    <div class="container">
        <header class="header-title">
            <h1>Planning <span>Elite</span></h1>
        </header>

        <div class="glass-panel">
            <table>
                <thead>
                    <tr>
                        <th>Coach</th>
                        <th>Date & Heure</th>
                        <th>Sport</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="coach-profile">
                                <img src="https://images.unsplash.com/photo-1594381898411-846e7d193883?w=100">
                                <div><b>Marc Leblanc</b></div>
                            </div>
                        </td>
                        <td>
                            <div style="font-weight: 700; font-size: 0.9rem;"><i class="fa-regular fa-calendar" style="margin-right: 8px; color: var(--primary);"></i>28 Déc. 2025</div>
                            <div style="font-size: 0.8rem; color: rgba(255,255,255,0.4); margin-top: 4px;">08:00 — 09:30</div>
                        </td>
                        <td>
                            <span class="sport-badge"><i class="fa-solid fa-dumbbell"></i> Musculation</span>
                        </td>
                        <td>
                            <div class="status-tag confirmed">
                                <div class="pulse"></div> Confirmé
                            </div>
                        </td>
                        <td>
                            <div class="action-group">
                                <button class="btn-nadi btn-edit"><i class="fa-solid fa-pen-to-square"></i> Modifier</button>
                                <button class="btn-nadi btn-delete"><i class="fa-solid fa-trash-can"></i> Annuler</button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="coach-profile">
                                <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?w=100">
                                <div><b>Karim Zahid</b></div>
                            </div>
                        </td>
                        <td>
                            <div style="font-weight: 700; font-size: 0.9rem;"><i class="fa-regular fa-calendar" style="margin-right: 8px; color: var(--primary);"></i>30 Déc. 2025</div>
                            <div style="font-size: 0.8rem; color: rgba(255,255,255,0.4); margin-top: 4px;">18:00 — 19:30</div>
                        </td>
                        <td>
                            <span class="sport-badge" style="color: #ffaa00; background: rgba(255,170,0,0.07); border-color: rgba(255,170,0,0.15);"><i class="fa-solid fa-bolt"></i> Crossfit</span>
                        </td>
                        <td>
                            <div class="status-tag pending">
                                <div class="pulse"></div> En Attente
                            </div>
                        </td>
                        <td>
                            <div class="action-group">
                                <button class="btn-nadi btn-edit"><i class="fa-solid fa-pen-to-square"></i> Modifier</button>
                                <button class="btn-nadi btn-delete"><i class="fa-solid fa-trash-can"></i> Annuler</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>