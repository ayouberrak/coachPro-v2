<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitCoach - Dashboard Elite</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            /* Identical Palette to Login/Signup */
            --primary: #000000;
            --accent: #1ed760; /* Spotify Green for success/stats */
            --bg-body: #f8f9fa;
            --sidebar-bg: #ffffff;
            --card-bg: #ffffff;
            --text-main: #111111;
            --text-muted: #666666;
            --danger: #ff4d4d;
            --border: #ececec;
            --shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: var(--bg-body); 
            color: var(--text-main); 
            display: flex; 
            min-height: 100vh; 
        }

        /* --- Sidebar --- */
        .sidebar { 
            width: 280px; 
            background: var(--sidebar-bg); 
            border-right: 1px solid var(--border); 
            padding: 35px 20px; 
            position: fixed; 
            height: 100vh; 
            display: flex;
            flex-direction: column;
        }

        .logo { 
            font-size: 1.5rem; 
            font-weight: 800; 
            color: #000; 
            margin-bottom: 50px; 
            display: flex; 
            align-items: center; 
            gap: 10px;
            padding-left: 15px;
        }
        .logo span { background: #000; color: #fff; padding: 2px 8px; border-radius: 6px; }

        .nav-link { 
            padding: 14px 18px; 
            color: var(--text-muted); 
            text-decoration: none; 
            border-radius: 12px; 
            margin-bottom: 5px; 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            transition: 0.3s; 
            font-weight: 500; 
        }
        .nav-link:hover, .nav-link.active { 
            background: #f0f0f0; 
            color: #000; 
        }
        .logout-link { margin-top: auto; color: var(--danger) !important; }

        /* --- Main Content --- */
        .main-content { flex: 1; margin-left: 280px; padding: 40px 50px; }

        /* --- Top Bar --- */
        .top-bar { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 40px; 
        }
        .search-box { 
            background: #fff; 
            border-radius: 12px; 
            padding: 12px 20px; 
            display: flex; 
            align-items: center; 
            width: 350px; 
            border: 1px solid var(--border); 
            box-shadow: var(--shadow);
        }
        .search-box input { background: none; border: none; margin-left: 10px; outline: none; width: 100%; font-size: 0.9rem; }

        .user-profile { display: flex; align-items: center; gap: 20px; }
        .digital-clock { font-weight: 600; color: var(--text-muted); font-size: 0.9rem; }
        .user-avatar { 
            width: 42px; height: 42px; 
            background: #000; 
            border-radius: 10px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            color: #fff; 
            font-weight: 600;
        }

        /* --- Stats Card --- */
        .stats-row { 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            gap: 25px; 
            margin-bottom: 40px; 
        }
        .stat-card { 
            background: #fff; 
            padding: 25px; 
            border-radius: 20px; 
            border: 1px solid var(--border); 
            box-shadow: var(--shadow);
            transition: transform 0.3s;
        }
        .stat-card:hover { transform: translateY(-5px); }
        .stat-card h4 { color: var(--text-muted); font-size: 0.8rem; text-transform: uppercase; margin-bottom: 10px; letter-spacing: 0.5px; }
        .stat-card p { font-size: 1.8rem; font-weight: 700; color: #000; }

        /* --- Panels --- */
        .glass-panel { 
            background: #fff; 
            border-radius: 24px; 
            padding: 30px; 
            border: 1px solid var(--border); 
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }
        .panel-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
        .panel-header h3 { font-size: 1.1rem; font-weight: 700; display: flex; align-items: center; gap: 10px; }

        .pulse-icon { width: 8px; height: 8px; background: var(--accent); border-radius: 50%; box-shadow: 0 0 10px var(--accent); animation: pulse 2s infinite; }

        /* --- Table --- */
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 15px; color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase; border-bottom: 1px solid #f0f0f0; }
        td { padding: 18px 15px; border-bottom: 1px solid #f8f8f8; font-size: 0.9rem; vertical-align: middle; }
        
        .client-name { font-weight: 600; color: #000; }
        .sport-badge { background: #f0f0f0; padding: 5px 12px; border-radius: 8px; font-size: 0.8rem; font-weight: 500; color: #444; }

        /* --- Action Buttons --- */
        .btn-group { display: flex; gap: 8px; }
        .action-btn { 
            width: 36px; height: 36px; 
            border-radius: 10px; 
            border: none; 
            cursor: pointer; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            transition: 0.2s;
        }
        .btn-check { background: #e8f9ee; color: #2ecc71; }
        .btn-check:hover { background: #2ecc71; color: #fff; }
        .btn-x { background: #fdeaea; color: #e74c3c; }
        .btn-x:hover { background: #e74c3c; color: #fff; }

        .status-pill { 
            padding: 6px 14px; 
            border-radius: 50px; 
            font-size: 0.7rem; 
            font-weight: 700; 
            background: #eef2ff; 
            color: #4f46e5; 
            text-transform: uppercase;
        }

        @keyframes pulse { 
            0% { box-shadow: 0 0 0 0 rgba(30, 215, 96, 0.4); } 
            70% { box-shadow: 0 0 0 10px rgba(30, 215, 96, 0); } 
            100% { box-shadow: 0 0 0 0 rgba(30, 215, 96, 0); } 
        }

        @media (max-width: 1100px) {
            .stats-row { grid-template-columns: repeat(2, 1fr); }
            .sidebar { width: 80px; padding: 35px 10px; }
            .logo span, .nav-link span, .logo { display: none; }
            .main-content { margin-left: 80px; }
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="logo"><span>FIT</span> COACH</div>
        <nav>
            <a href="../controllers/coach.conttoleur.php" class="nav-link active">🏠 <span>Dashboard</span></a>
            <a href="../controllers/seances_coach.controlleur.php" class="nav-link">🏋️ <span>Mes Séances</span></a>
            <a href="../controllers/dispo.contorleurs.php" class="nav-link">📅 <span>Disponibilités</span></a>
            <a href="#" class="nav-link">👤 <span>Mon Profil</span></a>
        </nav>
        <a href="../controllers/logoutContrelleur.php" class="nav-link logout-link">🚪 <span>Déconnexion</span></a>
    </aside>

    <main class="main-content">
        <div class="top-bar">
            <div class="search-box">
                🔍 <input type="text" placeholder="Rechercher un client...">
            </div>
            <div class="user-profile">
                <div class="digital-clock" id="clock">00:00:00</div>
                <div class="user-avatar"><?= substr($nom, 0, 1) ?></div>
            </div>
        </div>

        <div class="welcome-hero" style="margin-bottom: 40px;">
            <h1 style="font-size: 2rem;">Content de vous revoir, <span style="font-weight: 800; border-bottom: 3px solid #1ed760;">Coach <?= $nom ?></span></h1>
            <p style="color: var(--text-muted); margin-top: 5px;">Voici le résumé de votre activité aujourd'hui.</p>
        </div>

        <div class="stats-row">
            <div class="stat-card"><h4>Séances Totales</h4><p>128</p></div>
            <div class="stat-card"><h4>Nouveaux</h4><p style="color: #2ecc71;">+12</p></div>
            <div class="stat-card"><h4>En Attente</h4><p id="pending-count" style="color: #f39c12;">2</p></div>
            <div class="stat-card"><h4>Revenus</h4><p>8,450 DH</p></div>
        </div>

        <div class="glass-panel">
            <div class="panel-header">
                <h3><div class="pulse-icon"></div> Demandes de réservation</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Discipline</th>
                        <th>Date & Heure</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="pending-list">
                    <?php if(!empty($resutlt)): ?>
                        <?php foreach($resutlt as $res): ?>
                        <tr>
                            <td class="client-name"><?= $res['fulnameClient']?></td>
                            <td><span class="sport-badge"><?= $res['type']?></span></td>
                            <td style="color: var(--text-muted);"><?= $res['dateandtime']?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="../controllers/accepteSeances.controleur.php?id=<?= $res['id_secances'] ?>" class="action-btn btn-check" title="Confirmer">✓</a>
                                    <a href="../controllers/refuseSeances.controleur.php?id=<?= $res['id_secances'] ?>" class="action-btn btn-x" title="Refuser">✕</a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr><td colspan="4" style="text-align:center; color: var(--text-muted);">Aucune demande en attente.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="glass-panel">
            <div class="panel-header">
                <h3>📅 Séances déjà confirmées</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Discipline</th>
                        <th>Date & Heure</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody id="confirmed-list">
                    <?php foreach($resutltAcc as $ress): ?>
                        <tr>
                            <td class="client-name"><?= $ress['fulnameClient']?></td>
                            <td><span class="sport-badge"><?= $ress['type']?></span></td>
                            <td style="color: var(--text-muted);"><?= $ress['dateandtime']?></td>
                            <td><span class="status-pill"><?= $ress['type_status']?></span></td>
                        </tr>
                    <?php endforeach ?> 
                </tbody>
            </table>
        </div>
    </main>

    <script>
        function updateClock() {
            const now = new Date();
            document.getElementById('clock').innerText = now.toLocaleTimeString();
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>
</html>