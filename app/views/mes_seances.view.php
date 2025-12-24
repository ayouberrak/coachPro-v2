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

        /* --- Navbar --- */
        nav {
            position: fixed; top: 0; width: 100%;
            padding: 20px 8%; display: flex; justify-content: space-between; align-items: center;
            background: rgba(2, 2, 2, 0.7); backdrop-filter: blur(25px);
            border-bottom: 1px solid var(--glass-border); z-index: 1000;
        }
        .logo { font-weight: 800; font-size: 1.4rem; text-decoration: none; color: #fff; }
        .logo span { color: var(--primary); }
        .nav-links a { text-decoration: none; color: rgba(255,255,255,0.4); font-size: 0.85rem; font-weight: 700; transition: 0.4s; margin-left: 40px; }
        .nav-links a.active { color: #fff; position: relative; }
        .nav-links a.active::after { content: ''; position: absolute; bottom: -8px; left: 0; width: 100%; height: 2px; background: var(--primary); box-shadow: 0 0 10px var(--primary); }

        .container { max-width: 1200px; margin: 130px auto 60px; padding: 0 25px; }
        .header-title h1 { font-size: 2.5rem; font-weight: 800; letter-spacing: -1.5px; margin-bottom: 40px; }

        /* --- Table Glass Style --- */
        .glass-panel {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 35px;
            padding: 10px;
            backdrop-filter: blur(15px);
        }

        table { width: 100%; border-collapse: separate; border-spacing: 0 10px; }
        th { padding: 15px 25px; text-align: left; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 2px; color: rgba(255,255,255,0.3); }
        td { padding: 20px 25px; background: rgba(255, 255, 255, 0.01); border-top: 1px solid var(--glass-border); border-bottom: 1px solid var(--glass-border); }
        td:first-child { border-left: 1px solid var(--glass-border); border-radius: 20px 0 0 20px; }
        td:last-child { border-right: 1px solid var(--glass-border); border-radius: 0 20px 20px 0; }
        tr:hover td { background: rgba(255, 255, 255, 0.04); transform: scale(1.005); transition: 0.3s; }

        /* --- Coach & Sport --- */
        .coach-profile { display: flex; align-items: center; gap: 15px; }
        .coach-profile img { width: 45px; height: 45px; border-radius: 14px; object-fit: cover; border: 1px solid var(--glass-border); }
        .sport-badge { display: inline-flex; align-items: center; gap: 8px; padding: 6px 14px; border-radius: 12px; font-size: 0.75rem; font-weight: 700; background: rgba(255,255,255,0.05); color: #fff; }

        /* --- Custom Status Classes --- */
        .status-tag { display: flex; align-items: center; gap: 8px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; }
        .pulse { width: 8px; height: 8px; border-radius: 50%; }

        .status-pending { color: var(--warning); }
        .status-pending .pulse { background: var(--warning); box-shadow: 0 0 10px var(--warning); }

        .status-accepted { color: var(--primary); }
        .status-accepted .pulse { background: var(--primary); box-shadow: 0 0 10px var(--primary); }

        .status-refused { color: var(--danger); }
        .status-refused .pulse { background: var(--danger); box-shadow: 0 0 10px var(--danger); }

        .status-finished { color: var(--accent); }
        .status-finished .pulse { background: var(--accent); box-shadow: 0 0 10px var(--accent); }

        .status-cancelled { color: rgba(255,255,255,0.4); text-decoration: line-through; }
        .status-cancelled .pulse { background: #555; }

        /* --- Buttons --- */
        .action-group { display: flex; gap: 10px; }
        .btn-nadi { padding: 10px 16px; border-radius: 12px; border: 1px solid var(--glass-border); background: var(--glass); color: #fff; cursor: pointer; font-size: 0.75rem; font-weight: 700; transition: 0.3s; }
        .btn-edit:hover { border-color: var(--primary); color: var(--primary); }
        .btn-delete:hover { border-color: var(--danger); color: var(--danger); }
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
                <?php foreach($seancesF as $ses){ 
                    $pathPhoto = '../../public/uploads/' . basename($ses['photo']);
                    
                    // Formatage de la date (Ex: Mercredi 24 Déc.)
                    $dateObj = new DateTime($ses['date_seances']);
                    $formattedDate = $dateObj->format('D d M. Y');
                    
                    // Formatage de l'heure (Ex: 14:30)
                    $formattedTime = date("H:i", strtotime($ses['debut']));

                    // Déterminer la classe de statut (on suppose que $ses['status_key'] contient 'pending', 'accepted', etc.)
                    // $statusClass = "status-" . ($ses['style'] ?? 'pending'); 
                    ?>
                    <tr>
                        <td>
                            <div class="coach-profile">
                                <img src="<?= $pathPhoto ?>" alt="Avatar">
                                <div><b><?= $ses['fullname'] ?></b></div>
                            </div>
                        </td>
                        <td>
                            <div style="font-weight: 700; font-size: 0.9rem;">
                                <i class="fa-regular fa-calendar-check" style="margin-right: 8px; color: var(--primary);"></i><?= $formattedDate ?>
                            </div>
                            <div style="font-size: 0.8rem; color: rgba(255,255,255,0.4); margin-top: 4px;">
                                <i class="fa-regular fa-clock" style="margin-right: 5px;"></i> <?= $formattedTime ?>
                            </div>
                        </td>
                        <td>
                            <span class="sport-badge">
                                <?= $ses['type'] ?>
                            </span>
                        </td>
                        <td>
                            <div class="status-tag <?= $ses['style']  ?>">
                                <div class="pulse"></div> <?= $ses['type_status'] ?>
                            </div>
                        </td>
                        <td>
                            <div class="action-group">
                                <?php if($ses['type_status'] == 'en attente'): ?>
                                    <button class="btn-nadi btn-edit"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <a href="anullerSeances.controleur.php?id=<?=$ses['id_secances']?>"><button class="btn-nadi btn-delete"><i class="fa-solid fa-xmark"></i> Annuler</button></a>
                                <?php else: ?>
                                    <span style="font-size: 0.7rem; color: rgba(255,255,255,0.2);">Aucune action</span>
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