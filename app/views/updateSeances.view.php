<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Séance | FitSync</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #1ed760;
            --bg: #050505;
            --card: #111111;
            --border: rgba(255, 255, 255, 0.08);
            --input-bg: rgba(255, 255, 255, 0.03);
            --text-muted: #888888;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: radial-gradient(circle at 50% 50%, rgba(30, 215, 96, 0.08) 0%, transparent 50%);
        }

        .edit-container {
            width: 100%;
            max-width: 550px;
            background: var(--card);
            padding: 40px;
            border-radius: 35px;
            border: 1px solid var(--border);
            backdrop-filter: blur(20px);
            box-shadow: 0 30px 60px rgba(0,0,0,0.6);
        }

        .header-edit { text-align: center; margin-bottom: 35px; }
        .header-edit h1 { font-size: 1.8rem; font-weight: 800; letter-spacing: -1px; }
        .header-edit p { color: var(--text-muted); font-size: 0.9rem; margin-top: 5px; }

        .edit-form { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .full-width { grid-column: span 2; }

        .form-group { display: flex; flex-direction: column; gap: 8px; }
        .form-group label { font-size: 0.7rem; font-weight: 700; color: var(--primary); text-transform: uppercase; letter-spacing: 1px; }

        .input-box {
            background: var(--input-bg);
            border: 1px solid var(--border);
            padding: 16px;
            border-radius: 16px;
            color: #fff;
            font-family: inherit;
            font-size: 0.95rem;
            transition: 0.3s ease;
        }

        .input-box:focus {
            outline: none;
            border-color: var(--primary);
            background: rgba(30, 215, 96, 0.02);
            box-shadow: 0 0 15px rgba(30, 215, 96, 0.1);
        }

        /* Time picker icon color */
        input::-webkit-calendar-picker-indicator { filter: invert(1); opacity: 0.6; cursor: pointer; }

        .action-btns {
            grid-column: span 2;
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .btn {
            flex: 1;
            padding: 18px;
            border-radius: 18px;
            font-weight: 800;
            font-size: 0.9rem;
            cursor: pointer;
            transition: 0.4s;
            border: none;
            text-align: center;
            text-decoration: none;
        }

        .btn-save { background: var(--primary); color: #000; }
        .btn-save:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(30, 215, 96, 0.3); }

        .btn-back { background: rgba(255,255,255,0.05); color: #fff; border: 1px solid var(--border); }
        .btn-back:hover { background: rgba(255,255,255,0.1); }

        .coach-mini-card {
            grid-column: span 2;
            display: flex;
            align-items: center;
            gap: 15px;
            background: rgba(255,255,255,0.02);
            padding: 15px;
            border-radius: 20px;
            margin-bottom: 10px;
        }
        .coach-mini-card img { width: 50px; height: 50px; border-radius: 12px; object-fit: cover; }
        .coach-mini-card b { font-size: 0.95rem; }
                /* --- Logout Button Style --- */
        .logout-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 70, 70, 0.05); /* Background 7mar khfif bzayf */
            border: 1px solid rgba(255, 70, 70, 0.2);
            padding: 8px 16px;
            border-radius: 12px;
            color: #ff4646 !important; /* Loun 7mar */
            text-transform: uppercase;
            font-size: 0.75rem !important;
            font-weight: 700 !important;
            transition: 0.3s all ease;
        }

        .logout-btn:hover {
            background: rgba(255, 70, 70, 0.15);
            border-color: #ff4646;
            box-shadow: 0 0 15px rgba(255, 70, 70, 0.1);
            transform: translateY(-2px);
        }

        .logout-btn i {
            font-size: 0.9rem;
        }

        /* Bach ma t-khrebch l'mobile view */
        @media (max-width: 768px) {
            .logout-btn span { display: none; } /* Khalli gher l'icon f telfon */
            .logout-btn { padding: 10px; }
        }
    </style>
</head>
<body>

    <div class="edit-container">
        <header class="header-edit">
            <h1>Modifier la <span>Séance</span></h1>
            <p>Ajustez vos horaires ou votre discipline</p>
        </header>

        <form class="edit-form" action="" method="POST">
            
            <div class="coach-mini-card">
                <?php $pathPhoto = '../../public/uploads/' . basename($senacesUp['photo']); ?>
                <img src="<?= $pathPhoto?>" alt="<?=$senacesUp['fullname']?>">
                <div>
                    <span>Coaching avec</span>
                    <b><?=$senacesUp['fullname']?></b>
                </div>
            </div>

            <input type="hidden" name="seance_id" value="<?= $senacesUp['id_secances']?>">

            <div class="form-group full-width">
                <label>Date de la Séance</label>
                <?php 
                    $datetime = $senacesUp['date_seances'];
                    $date = date('Y-m-d', strtotime($datetime));
                ?>
                <input type="date" class="input-box" value="<?=$date?>" name="dateDebut">
            </div>

            <div class="form-group">
                <label>Heure de Début</label>
                <input type="time"  class="input-box" value="<?=$senacesUp['debut']?>" name="heure_debut">
            </div>

            <div class="form-group">
                <label>Durée</label>
                <input type="text"  class="input-box" placeholder="Ex: 1h 30min" value="<?=$senacesUp['duree']?>" name="durre">
            </div>

            <div class="form-group full-width">
                <label>Discipline</label>
                <select name="sport_id" class="input-box" name="sport_id">
                    <option value="<?=$senacesUp['id_sport']?>" selected><?=$senacesUp['type']?></option>
                    <option value="2">Yoga</option>
                    <option value="3">Crossfit</option>
                    <option value="4">Boxing</option>
                </select>   
            </div>

            <div class="form-group full-width">
                <label>Notes / Objectifs</label>
                <textarea name="notes" class="input-box" rows="3">Séance focalisée sur le bas du corps.</textarea>
            </div>

            <div class="action-btns">
                <a href="mes_seances.controleur.php" class="btn btn-back">Annuler</a>
                <button type="submit" class="btn btn-save">Enregistrer les changements</button>
            </div>

        </form>
    </div>

</body>
</html>