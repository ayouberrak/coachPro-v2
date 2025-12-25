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
            --info: #a855f7;
            --bg: #020202;
            --glass: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.08);
            --card-hover: rgba(255, 255, 255, 0.05);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg);
            color: #fff;
            min-height: 100vh;
            background-image: 
                radial-gradient(circle at 5% 10%, rgba(30, 215, 96, 0.07) 0%, transparent 35%),
                radial-gradient(circle at 95% 90%, rgba(0, 242, 255, 0.05) 0%, transparent 35%);
            background-attachment: fixed;
        }

        /* --- Navbar --- */
        .navbar {
            position: fixed; top: 0; width: 100%;
            padding: 18px 8%; display: flex; justify-content: space-between; align-items: center;
            background: rgba(2, 2, 2, 0.8); backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border); z-index: 1000;
        }
        .logo { font-weight: 800; font-size: 1.4rem; text-decoration: none; color: #fff; letter-spacing: -1px; }
        .logo span { color: var(--primary); }
        
        .nav-links { display: flex; gap: 30px; align-items: center; }
        .nav-links a { 
            text-decoration: none; color: rgba(255,255,255,0.5); 
            font-size: 0.85rem; font-weight: 700; transition: 0.3s; 
            text-transform: uppercase; letter-spacing: 0.5px;
        }
        .nav-links a.active { color: #fff; position: relative; }
        .nav-links a.active::after {
            content: ''; position: absolute; bottom: -8px; left: 0; width: 100%; height: 2px; 
            background: var(--primary); box-shadow: 0 0 10px var(--primary);
        }

        .logout-btn {
            display: flex; align-items: center; gap: 8px;
            background: rgba(255, 70, 70, 0.08); border: 1px solid rgba(255, 70, 70, 0.2);
            padding: 9px 18px; border-radius: 14px; color: #ff4646 !important;
            font-size: 0.75rem !important; transition: 0.3s;
        }
        .logout-btn:hover { background: rgba(255, 70, 70, 0.15); transform: translateY(-2px); }

        /* --- Main Content --- */
        .container { max-width: 1200px; margin: 140px auto 60px; padding: 0 25px; }
        .header-title h1 { font-size: 2.8rem; font-weight: 800; letter-spacing: -2px; margin-bottom: 45px; }
        .header-title h1 span { color: var(--primary); }

        /* --- Table Glass Design --- */
        .glass-panel {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 40px;
            padding: 15px;
            backdrop-filter: blur(20px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        table { width: 100%; border-collapse: separate; border-spacing: 0 12px; }
        
        th { 
            padding: 15px 25px; text-align: left; font-size: 0.7rem; 
            text-transform: uppercase; letter-spacing: 2px; color: rgba(255,255,255,0.3);
            font-weight: 700;
        }

        td { 
            padding: 22px 25px; 
            background: rgba(255, 255, 255, 0.015);
            border-top: 1px solid var(--glass-border);
            border-bottom: 1px solid var(--glass-border);
            vertical-align: middle;
        }

        td:first-child { border-left: 1px solid var(--glass-border); border-radius: 24px 0 0 24px; }
        td:last-child { border-right: 1px solid var(--glass-border); border-radius: 0 24px 24px 0; }

        tr:hover td { background: var(--card-hover); border-color: rgba(255,255,255,0.15); transition: 0.3s ease; }

        /* --- Coach Profile --- */
        .coach-profile { display: flex; align-items: center; gap: 16px; }
        .coach-profile img { width: 48px; height: 48px; border-radius: 16px; object-fit: cover; border: 1px solid var(--glass-border); }
        .coach-profile b { font-size: 0.95rem; display: block; letter-spacing: -0.3px; }
        
        .sport-badge {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 7px 15px; border-radius: 14px; font-size: 0.75rem; font-weight: 700;
            background: rgba(255,255,255,0.05); border: 1px solid var(--glass-border);
            color: #eee;
        }

        /* --- Status System --- */
        .status-tag { display: flex; align-items: center; gap: 10px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; }
        .pulse { width: 10px; height: 10px; border-radius: 50%; position: relative; }
        .pulse::after { content: ''; position: absolute; width: 100%; height: 100%; border-radius: 50%; background: inherit; animation: pulse-anim 2s infinite; opacity: 0.4; }

        .status-pending { color: var(--warning); }
        .status-pending .pulse { background: var(--warning); }
        
        .status-accepted { color: var(--primary); }
        .status-accepted .pulse { background: var(--primary); }

        .status-refused { color: var(--danger); }
        .status-refused .pulse { background: var(--danger); }

        @keyframes pulse-anim {
            0% { transform: scale(1); opacity: 0.4; }
            70% { transform: scale(2.5); opacity: 0; }
            100% { transform: scale(1); opacity: 0; }
        }

        /* --- Buttons --- */
        .action-group { display: flex; gap: 12px; }
        .btn-nadi { 
            padding: 12px 20px; border-radius: 15px; border: 1px solid var(--glass-border); 
            background: rgba(255,255,255,0.03); color: #fff; cursor: pointer; 
            font-size: 0.8rem; font-weight: 700; transition: 0.3s;
            display: flex; align-items: center; gap: 8px;
        }
        .btn-edit:hover { border-color: var(--primary); color: var(--primary); background: rgba(30, 215, 96, 0.05); }
        .btn-delete:hover { border-color: var(--danger); color: var(--danger); background: rgba(255, 70, 70, 0.05); }

        @media (max-width: 900px) {
            .nav-links { display: none; }
            .glass-panel { overflow-x: auto; border-radius: 25px; }
            table { min-width: 800px; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="index.php" class="logo"><span>FIT</span>COACH</a>
        <div class="nav-links">
            <a href="client_dash.controleur.php">Explorer</a>
            <a href="mes_seances.controleur.php" class="active">Mes Séances</a>
            <a href="deconexion.controleur.php" class="logout-btn">
                <i class="fa-solid fa-power-off"></i> <span>Déconnexion</span>
            </a>
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
                        <th>Coach Expert</th>
                        <th>Date & Heure</th>
                        <th>Discipline</th>
                        <th>Statut actuel</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($seancesF as $ses){ 
                    $pathPhoto = '../../public/uploads/' . basename($ses['photo']);
                    
                    $dateObj = new DateTime($ses['date_seances']);
                    $formattedDate = $dateObj->format('D d M. Y');
                    $formattedTime = date("H:i", strtotime($ses['debut']));
                   ?>
                    <tr>
                        <td>
                            <div class="coach-profile">
                                <img src="<?= $pathPhoto ?>" alt="Avatar">
                                <div><b><?= htmlspecialchars($ses['fullname']) ?></b></div>
                            </div>
                        </td>
                        <td>
                            <div style="font-weight: 700; font-size: 0.9rem; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-regular fa-calendar-check" style="color: var(--primary);"></i>
                                <?= $formattedDate ?>
                            </div>
                            <div style="font-size: 0.8rem; color: rgba(255,255,255,0.4); margin-top: 6px; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-regular fa-clock"></i> 
                                <?= $formattedTime ?>
                            </div>
                        </td>
                        <td>
                            <span class="sport-badge">
                                <i class="fa-solid fa-dumbbell" style="font-size: 0.7rem; color: var(--primary);"></i>
                                <?= htmlspecialchars($ses['type']) ?>
                            </span>
                        </td>
                        <td>
                            <div class="status-tag <?= $ses['style'] ?>">
                                <div class="pulse"></div> 
                                <?= htmlspecialchars($ses['type_status']) ?>
                            </div>
                        </td>
                        <td>
                            <div class="action-group">
                                <?php if($ses['type_status'] == 'en attente' || $ses['type_status'] == 'pending'): ?>
                                    <a href="updateSeances.controleur.php?id=<?=$ses['id_secances']?>" style="text-decoration:none;">
                                        <button class="btn-nadi btn-edit" title="Modifier">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </a>
                                    <a href="anullerSeances.controleur.php?id=<?=$ses['id_secances']?>" style="text-decoration:none;">
                                        <button class="btn-nadi btn-delete">
                                            <i class="fa-solid fa-xmark"></i> Annuler
                                        </button>
                                    </a>
                                <?php else: ?>
                                    <span style="font-size: 0.7rem; color: rgba(255,255,255,0.2); font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Confirmée</span>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>