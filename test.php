                        if (isset($_GET['error'])) {
                            $error = $_GET['error'];
                            if ($error === 'empty') {
                                echo '<p class="error-message">Veuillez remplir tous les champs obligatoires.</p>';
                            } elseif ($error === 'insertUser') {
                                echo '<p class="error-message">Erreur lors de la création du compte. Veuillez réessayer.</p>';
                            } elseif ($error === 'coach') {
                                echo '<p class="error-message">Veuillez remplir toutes les informations du coach.</p>';
                            } elseif ($error === 'exetension') {
                                echo '<p class="error-message">Format de photo non valide. Autorisé: jpg, jpeg, png, gif.</p>';
                            } elseif ($error === 'client') {
                                echo '<p class="error-message">Veuillez fournir un numéro de téléphone pour le client.</p>';
                            }
                        }
                        if (isset($_GET['success']) && $_GET['success'] == 1) {
                            echo '<p class="success-message">Inscription réussie! Vous pouvez maintenant vous connecter.</p>';
                        }