<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire - FitCoach</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        /* Reset & Base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            height: 100vh;
            width: 100vw;
            overflow: hidden; /* Prevent body scroll, handle in containers */
        }

        /* Split Container Layout */
        .split-container {
            display: flex;
            width: 100%;
            height: 100%;
        }

        /* LEFT SIDE - IMAGE */
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
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.6;
            z-index: 1;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
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

        .stat {
            display: flex;
            flex-direction: column;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* RIGHT SIDE - FORM */
        .form-side {
            width: 50%;
            background: #fff;
            display: flex;
            justify-content: center;
            overflow-y: auto; /* Allow scrolling only on form side */
        }

        .form-wrapper {
            width: 100%;
            max-width: 500px;
            padding: 3rem 2rem;
        }

        .form-header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-header h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            color: #666;
        }

        /* Form Elements */
        .form-row {
            display: flex;
            gap: 1rem;
        }

        .form-row .input-group {
            flex: 1;
        }

        .input-group {
            margin-bottom: 1.25rem;
            display: flex;
            flex-direction: column;
        }

        .input-group label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: #444;
        }

        .input-group input, 
        .input-group select, 
        .input-group textarea {
            padding: 0.75rem 1rem;
            border: 1px solid #e1e1e1;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            width: 100%;
            background: #f9f9f9;
        }

        .input-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .input-group input:focus, 
        .input-group select:focus, 
        .input-group textarea:focus {
            outline: none;
            border-color: #000;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(0,0,0,0.05);
        }

        /* Role Sections (Coach/Client) */
        .role-section {
            display: none; /* Hidden by default */
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            border: 1px solid #e9ecef;
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #dee2e6;
        }

        /* File Input Styling */
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
            height: 100%;
            width: 100%;
            z-index: 2;
        }

        .file-input-display {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 1rem;
            border: 2px dashed #cbd5e0;
            border-radius: 8px;
            color: #718096;
            transition: all 0.3s;
        }

        .file-input-wrapper:hover .file-input-display {
            border-color: #4a5568;
            color: #2d3748;
        }

        /* Button */
        .submit-btn {
            width: 100%;
            padding: 1rem;
            background-color: #000;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: transform 0.2s, background-color 0.2s;
        }

        .submit-btn:hover {
            background-color: #333;
            transform: translateY(-2px);
        }

        .form-footer {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.9rem;
            color: #666;
        }

        .form-footer a {
            color: #000;
            font-weight: bold;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        /* Messages */
        .error-message {
            background-color: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            border-left: 4px solid #991b1b;
        }

        .success-message {
            background-color: #d1fae5;
            color: #065f46;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            border-left: 4px solid #065f46;
        }

        /* Responsive Mobile */
        @media (max-width: 900px) {
            .split-container {
                flex-direction: column;
                overflow-y: auto; /* Allow full page scroll on mobile */
            }
            body {
                overflow: auto;
                height: auto;
            }
            .image-side {
                width: 100%;
                height: 300px;
            }
            .form-side {
                width: 100%;
                overflow: visible;
            }
            .image-text h2 {
                font-size: 2rem;
            }
            .stats {
                display: none; /* Hide stats on mobile to save space */
            }
        }
    </style>
</head>
<body>

    <div class="split-container">
        <div class="image-side">
            <div class="image-overlay"></div>
            <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=1200&q=80" alt="Fitness motivation">
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
                    <h2>Transformez votre vie</h2>
                    <p>Rejoignez des milliers de personnes qui ont atteint leurs objectifs fitness avec nos coachs experts.</p>
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
                    <h1>Créer un compte</h1>
                    <p class="subtitle">Commencez votre transformation aujourd'hui</p>
                </div>
                
                <form action="" method="post" enctype="multipart/form-data">
                    <div id="msj_error">
                    </div>
                    <div class="form-row">
                        <div class="input-group">
                            <label for="nom">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                Nom
                            </label>
                            <input type="text" name="nom" id="nom" placeholder="Entrez votre nom" required>
                        </div>
                        <div class="input-group">
                            <label for="prenom">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                Prénom
                            </label>
                            <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom" required>
                        </div>
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

                    <div class="input-group">
                        <label for="roleSelect">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            Rôle
                        </label>
                        <select name="role" id="roleSelect" required>
                            <option selected disabled value="">Choisir votre rôle</option>
                            <?php foreach($reslt as $Res){ ?>
                                <option value="<?=$Res['id_role']?>"><?=$Res['type_role']?></option>
                            <?php }?>
                            </select>
                    </div>

                    <div id="divCoach" class="role-section">
                        <div class="section-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>
                            Informations Coach
                        </div>
                        
                        <div class="input-group">
                            <label for="biographie">Biographie</label>
                            <textarea name="biographie" id="biographie" placeholder="Décrivez votre parcours et expertise..."></textarea>
                        </div>
                        
                        <div class="input-group file-input-group">
                            <label for="photo">Photo de profil</label>
                            <div class="file-input-wrapper">
                                <input type="file" name="photo" id="photo" accept="image/*">
                                <div class="file-input-display" id="fileNameDisplay">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                    <span id="fileLabelText">Choisir une photo</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="input-group">
                                <label for="annes_exepriances">Années d'expérience</label>
                                <input type="number" name="annes_exepriances" id="annes_exepriances" placeholder="0" min="0">
                            </div>
                            <div class="input-group">
                                <label for="certification">Certification</label>
                                <input type="text" name="certification" id="certification" placeholder="Ex: BPJEPS">
                            </div>
                        </div>
                    </div>

                    <div id="divClient" class="role-section">
                        <div class="section-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            Informations Client
                        </div>
                        <div class="input-group">
                            <label for="tel">Numéro de téléphone</label>
                            <input type="number" name="tel" id="tel" placeholder="+33 6 00 00 00 00">
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">
                        <span>S'inscrire</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </button>
                </form>
                
                <div class="form-footer">
                    <p>Déjà un compte? <a href="../controlleur/login.controleur.php">Se connecter</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('roleSelect');
            const divCoach = document.getElementById('divCoach');
            const divClient = document.getElementById('divClient');
            
            // File input logic (to show filename when selected)
            const fileInput = document.getElementById('photo');
            const fileLabelText = document.getElementById('fileLabelText');

            if(fileInput) {
                fileInput.addEventListener('change', function(e) {
                    if(e.target.files.length > 0) {
                        fileLabelText.textContent = e.target.files[0].name;
                        fileLabelText.style.color = '#333';
                    }
                });
            }

            // Role switching logic
            roleSelect.addEventListener('change', function() {
                // Get the text of the selected option
                const selectedText = roleSelect.options[roleSelect.selectedIndex].text.toLowerCase();
                
                // Hide both initially
                divCoach.style.display = 'none';
                divClient.style.display = 'none';

                // Check text (Since I don't know your specific IDs like 1 or 2, 
                // checking text "coach" or "client" is safer for this demo)
                if (selectedText.includes('coach')) {
                    divCoach.style.display = 'block';
                    // Optional: Add required attributes dynamically
                    document.getElementById('biographie').setAttribute('required', '');
                    document.getElementById('tel').removeAttribute('required');
                } 
                else if (selectedText.includes('client') || selectedText.includes('membre')) {
                    divClient.style.display = 'block';
                    // Optional: Add required attributes dynamically
                    document.getElementById('tel').setAttribute('required', '');
                    document.getElementById('biographie').removeAttribute('required');
                }
            });
        });
    </script>
</body>
</html>