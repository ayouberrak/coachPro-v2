<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter - FitCoach</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        /* --- NAFS L'STYLE DYAL SIGNUP --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            height: 100vh;
            width: 100vw;
            overflow: hidden;
            background-color: #fff;
        }

        .split-container {
            display: flex;
            width: 100%;
            height: 100%;
        }

        /* Side Image */
        .image-side {
            width: 50%;
            position: relative;
            background-color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            overflow: hidden;
        }

        .image-side img {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            object-fit: cover;
            opacity: 0.6;
            z-index: 1;
        }

        .image-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(135deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.4) 100%);
            z-index: 2;
        }

        .image-content {
            position: relative;
            z-index: 3;
            padding: 3rem;
            max-width: 600px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 2rem;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .brand-logo {
            background: #fff;
            color: #000;
            padding: 8px;
            border-radius: 8px;
            display: flex;
        }

        .image-text h2 {
            font-size: 3rem;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .stats {
            display: flex;
            gap: 2rem;
            margin-top: 3rem;
            border-top: 1px solid rgba(255,255,255,0.2);
            padding-top: 2rem;
        }

        .stat { display: flex; flex-direction: column; }
        .stat-number { font-size: 1.5rem; font-weight: bold; }
        .stat-label { font-size: 0.9rem; opacity: 0.8; }

        /* Form Side */
        .form-side {
            width: 50%;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-y: auto;
        }

        .form-wrapper {
            width: 100%;
            max-width: 450px;
            padding: 2rem;
        }

        .form-header {
            margin-bottom: 2.5rem;
            text-align: center;
        }

        .form-header h1 {
            font-size: 2.2rem;
            color: #111;
            margin-bottom: 0.5rem;
        }

        .subtitle { color: #666; font-size: 1rem; }

        /* Inputs */
        .input-group {
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
        }

        .input-group label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 0.6rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: #333;
        }

        .input-group input {
            padding: 0.85rem 1rem;
            border: 1px solid #e1e1e1;
            border-radius: 10px;
            font-size: 1rem;
            background: #fcfcfc;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            outline: none;
            border-color: #000;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(0,0,0,0.05);
        }

        /* Form Options (Remember me & Forgot pass) */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            font-size: 0.9rem;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            user-select: none;
        }

        .checkbox-wrapper input { cursor: pointer; }

        .forgot-link {
            color: #000;
            text-decoration: none;
            font-weight: 600;
        }

        .forgot-link:hover { text-decoration: underline; }

        /* Button */
        .submit-btn {
            width: 100%;
            padding: 1rem;
            background-color: #000;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #222;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .form-footer {
            margin-top: 2rem;
            text-align: center;
            font-size: 0.95rem;
            color: #666;
        }

        .form-footer a {
            color: #000;
            font-weight: bold;
            text-decoration: none;
        }

        /* Alerts */
        .error-message {
            background-color: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #991b1b;
            font-size: 0.9rem;
        }

        .success-message {
            background-color: #d1fae5;
            color: #065f46;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #065f46;
            font-size: 0.9rem;
        }

        /* Responsive Mobile */
        @media (max-width: 900px) {
            .split-container { flex-direction: column; }
            body { overflow: auto; height: auto; }
            .image-side { width: 100%; height: 250px; }
            .form-side { width: 100%; padding: 2rem 0; }
            .image-text h2 { font-size: 1.8rem; }
            .stats { display: none; }
        }
    </style>
</head>
<body>

    <div class="split-container">
        <div class="image-side">
            <div class="image-overlay"></div>
            <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?w=1200&q=80" alt="Fitness motivation">
            <div class="image-content">
                <div class="brand">
                    <div class="brand-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8h1a4 4 0 0 1 0 8h-1"/>
                            <path d="M5 8H4a4 4 0 0 0 0 8h1"/>
                            <path d="M8 6v4"/>
                            <path d="M16 6v4"/>
                            <path d="M8 14v4"/>
                            <path d="M16 14v4"/>
                            <path d="M5 12h14"/>
                        </svg>
                    </div>
                    <span class="brand-name">FitCoach</span>
                </div>
                <div class="image-text">
                    <h2>Bon retour parmi nous</h2>
                    <p>Continuez votre parcours fitness et atteignez vos objectifs avec nos coachs experts.</p>
                </div>
                <div class="stats">
                    <div class="stat">
                        <span class="stat-number">10K+</span>
                        <span class="stat-label">Membres actifs</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Coachs certifiés</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">95%</span>
                        <span class="stat-label">Satisfaction</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-side">
            <div class="form-wrapper">
                <div class="form-header">
                    <h1>Se connecter</h1>
                    <p class="subtitle">Accédez à votre espace personnel</p>
                </div>
                
                <form action="" method="post">
                    <div id="msj_error">
                        <?php
                        if (isset($_GET['error'])) {
                            $error = $_GET['error'];
                            if ($error === 'empty') {
                                echo '<p class="error-message">Veuillez remplir tous les champs.</p>';
                            } elseif ($error === 'invalid') {
                                echo '<p class="error-message">Email ou mot de passe incorrect.</p>';
                            } elseif ($error === 'role') {
                                echo '<p class="error-message">Rôle utilisateur non reconnu.</p>';
                            }
                        } elseif (isset($_GET['success']) && $_GET['success'] == '1') {
                            echo '<p class="success-message">Inscription réussie! Veuillez vous connecter.</p>';
                        }
                        ?>
                    </div>

                    <div class="input-group">
                        <label for="email">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            Email
                        </label>
                        <input type="email" name="email" id="email" placeholder="exemple@email.com" required>
                    </div>

                    <div class="input-group">
                        <label for="password">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Mot de passe
                        </label>
                        <input type="password" name="password" id="password" placeholder="••••••••" required>
                    </div>

                    <div class="form-options">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" name="remember" id="remember">
                            <span>Se souvenir de moi</span>
                        </label>
                        <a href="#" class="forgot-link">Mot de passe oublié?</a>
                    </div>

                    <button type="submit" class="submit-btn">
                        <span>Se connecter</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </button>
                </form>
                
                <div class="form-footer">
                    <p>Pas encore de compte? <a href="../controllers/signupControllers.php">S'inscrire</a></p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>