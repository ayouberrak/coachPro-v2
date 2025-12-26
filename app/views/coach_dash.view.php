<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Elite Dashboard | FitSync</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #1ed760;
            --accent: #00f2ff;
            --danger: #ff4646;
            --warning: #ffaa00;
            --bg: #020202;
            --sidebar-bg: rgba(255, 255, 255, 0.02);
            --glass: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.08);
            --card-hover: rgba(255, 255, 255, 0.06);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg);
            color: #fff;
            min-height: 100vh;
            display: flex;
            background-image: 
                radial-gradient(circle at 0% 0%, rgba(30, 215, 96, 0.08) 0%, transparent 35%),
                radial-gradient(circle at 100% 100%, rgba(0, 242, 255, 0.05) 0%, transparent 35%);
            background-attachment: fixed;
        }

        /* --- Sidebar Elite --- */
        .sidebar { 
            width: 280px; 
            background: var(--sidebar-bg); 
            backdrop-filter: blur(20px);
            border-right: 1px solid var(--glass-border); 
            padding: 40px 20px; 
            position: fixed; 
            height: 100vh; 
            display: flex;
            flex-direction: column;
            z-index: 100;
        }

        .logo { 
            font-size: 1.5rem; font-weight: 800; color: #fff; 
            margin-bottom: 50px; display: flex; align-items: center; gap: 10px;
            text-decoration: none; letter-spacing: -1px;
        }
        .logo span { color: var(--primary); }

        .nav-link { 
            padding: 16px 20px; color: rgba(255,255,255,0.5); 
            text-decoration: none; border-radius: 16px; margin-bottom: 8px; 
            display: flex; align-items: center; gap: 15px; transition: 0.3s; 
            font-weight: 600; font-size: 0.9rem;
        }
        .nav-link i { font-size: 1.1rem; }
        .nav-link:hover, .nav-link.active { 
            background: var(--glass); color: #fff; 
            border: 1px solid var(--glass-border);
        }
        .nav-link.active { color: var(--primary); }

        .logout-link { 
            margin-top: auto; color: var(--danger) !important; 
            background: rgba(255, 70, 70, 0.05); border: 1px solid rgba(255, 70, 70, 0.1);
        }

        /* --- Main Content --- */
        .main-content { flex: 1; margin-left: 280px; padding: 40px 60px; }

        .top-header {
            display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px;
        }
        .welcome-msg h1 { font-size: 2.2rem; font-weight: 800; letter-spacing: -1.5px; }
        .welcome-msg h1 span { color: var(--primary); border-bottom: 3px solid var(--primary); }

        .digital-clock { 
            background: var(--glass); padding: 10px 20px; border-radius: 12px;
            border: 1px solid var(--glass-border); font-weight: 700; color: var(--primary);
            letter-spacing: 1px;
        }

        /* --- Stats Cards --- */
        .stats-row { 
            display: grid; grid-template-columns: repeat(4, 1fr); gap: 25px; margin-bottom: 50px; 
        }
        .stat-card { 
            background: var(--glass); padding: 30px; border-radius: 28px; 
            border: 1px solid var(--glass-border); transition: 0.4s;
            position: relative; overflow: hidden;
        }
        .stat-card:hover { transform: translateY(-10px); background: var(--card-hover); border-color: var(--primary); }
        .stat-card h4 { color: rgba(255,255,255,0.4); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 12px; }
        .stat-card p { font-size: 1.8rem; font-weight: 800; }

        /* --- Panels --- */
        .glass-panel { 
            background: var(--glass); border-radius: 35px; padding: 35px; 
            border: 1px solid var(--glass-border); margin-bottom: 40px;
            backdrop-filter: blur(15px);
        }
        .panel-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .panel-header h3 { font-size: 1.2rem; font-weight: 700; display: flex; align-items: center; gap: 12px; }

        .pulse-icon { width: 10px; height: 10px; background: var(--primary); border-radius: 50%; box-shadow: 0 0 15px var(--primary); animation: pulse 2s infinite; }

        /* --- Table Style --- */
        table { width: 100%; border-collapse: separate; border-spacing: 0 12px; }
        th { text-align: left; padding: 15px 20px; color: rgba(255,255,255,0.3); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 2px; }
        td { padding: 20px; background: rgba(255, 255, 255, 0.01); border-top: 1px solid var(--glass-border); border-bottom: 1px solid var(--glass-border); vertical-align: middle; }
        td:first-child { border-left: 1px solid var(--glass-border); border-radius: 20px 0 0 20px; }
        td:last-child { border-right: 1px solid var(--glass-border); border-radius: 0 20px 20px 0; }

        .client-name { font-weight: 700; font-size: 0.95rem; }
        .sport-badge { 
            background: rgba(255,255,255,0.05); padding: 6px 14px; border-radius: 12px; 
            font-size: 0.75rem; font-weight: 700; color: var(--primary); border: 1px solid rgba(30, 215, 96, 0.2);
        }

        /* --- Buttons --- */
        .btn-group { display: flex; gap: 10px; }
        .action-btn { 
            width: 40px; height: 40px; border-radius: 14px; border: 1px solid var(--glass-border); 
            cursor: pointer; display: flex; align-items: center; justify-content: center; 
            transition: 0.3s; background: var(--glass); color: #fff;
        }
        .btn-check:hover { border-color: var(--primary); color: var(--primary); background: rgba(30, 215, 96, 0.1); }
        .btn-x:hover { border-color: var(--danger); color: var(--danger); background: rgba(255, 70, 70, 0.1); }

        .status-pill { 
            padding: 8px 16px; border-radius: 12px; font-size: 0.7rem; 
            font-weight: 800; background: rgba(0, 242, 255, 0.1); 
            color: var(--accent); text-transform: uppercase; letter-spacing: 1px;
        }

        @keyframes pulse { 
            0% { transform: scale(1); opacity: 1; }
            70% { transform: scale(2.5); opacity: 0; }
            100% { transform: scale(1); opacity: 0; }
        }

        @media (max-width: 1200px) {
            .stats-row { grid-template-columns: repeat(2, 1fr); }
            .sidebar { width: 100px; padding: 40px 15px; }
            .sidebar span, .logo span { display: none; }
            .main-content { margin-left: 100px; }
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <a href="#" class="logo"><span>FIT</span>SYNC</a>
        <nav>
            <a href="../controllers/coach.conttoleur.php" class="nav-link active">
                <i class="fa-solid fa-house"></i> <span>Dashboard</span>
            </a>
            <a href="../controllers/seances_coach.controlleur.php" class="nav-link">
                <i class="fa-solid fa-dumbbell"></i> <span>Mes Séances</span>
            </a>
            <a href="../controllers/dispo.contorleurs.php" class="nav-link">
                <i class="fa-solid fa-calendar-days"></i> <span>Disponibilités</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fa-solid fa-user-gear"></i> <span>Mon Profil</span>
            </a>
        </nav>
        <a href="../controlleur/deconexion.controleur.php" class="nav-link logout-link">
            <i class="fa-solid fa-power-off"></i> <span>Déconnexion</span>
        </a>
    </aside>

    <main class="main-content">
        <div class="top-header">
            <div class="welcome-msg">
                <h1>Content de vous revoir, Coach <span><?= htmlspecialchars($_SESSION['user_name']) ?></span></h1>
            </div>
            <div class="digital-clock" id="clock">00:00:00</div>
        </div>

        <div class="stats-row">
            <div class="stat-card">
                <h4>Séances Totales</h4>
                <p>128</p>
            </div>
            <div class="stat-card">
                <h4>Nouveaux</h4>
                <p style="color: var(--primary);">+12</p>
            </div>
            <div class="stat-card">
                <h4>En Attente</h4>
                <p style="color: var(--warning);">2</p>
            </div>
            <div class="stat-card">
                <h4>Revenus</h4>
                <p>8,450 <small style="font-size: 1rem;">DH</small></p>
            </div>
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
                <tbody>
                    <?php foreach($seancesEnatt as $res): ?>

                        <tr>
                            <td class="client-name"><?= $res['fulnameClient']?></td>
                            <td><span class="sport-badge"><?= $res['type']?></span></td>
                            <td style="color: rgba(255,255,255,0.6); font-size: 0.85rem;">
                                <i class="fa-regular fa-clock" style="color: var(--primary); margin-right: 8px;"></i><?= $res['dateandtime']?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="accepte.controleur.php?id=<?= $res['id_secances'] ?>" 
                                    class="action-btn btn-check" title="Confirmer">
                                        <i class="fa-solid fa-check"></i>
                                    </a>

                                    <a href="anuller.controleur.php?id=<?= $res['id_secances'] ?>" 
                                    class="action-btn btn-x" title="Refuser">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>

        <div class="glass-panel">
            <div class="panel-header">
                <h3><i class="fa-solid fa-calendar-check" style="color: var(--primary); margin-right: 10px;"></i> Séances confirmées</h3>
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
                <tbody>
                    <?php foreach($seancesConfirmer as $ress): ?>
                        <tr>
                            <td class="client-name"><?= $ress['fulnameClient']?></td>
                            <td><span class="sport-badge"><?= $ress['type']?></span></td>
                            <td style="color: rgba(255,255,255,0.6); font-size: 0.85rem;">
                                <i class="fa-regular fa-calendar" style="color: var(--accent); margin-right: 8px;"></i><?= $ress['dateandtime']?>
                            </td>
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