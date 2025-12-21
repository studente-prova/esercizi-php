<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 3 - Dettagli Studente</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
            text-align: center;
        }
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }
        .back-link {
            display: inline-block;
            color: #667eea;
            text-decoration: none;
            margin-bottom: 20px;
            font-weight: 600;
            transition: color 0.3s;
        }
        .back-link:hover {
            color: #764ba2;
        }
        .card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .card-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .card-header h2 {
            font-size: 32px;
            margin-bottom: 10px;
        }
        .card-header .id {
            font-size: 18px;
            opacity: 0.9;
        }
        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .detail-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }
        .detail-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.8;
            margin-bottom: 8px;
        }
        .detail-value {
            font-size: 20px;
            font-weight: 600;
        }
        .error, .warning {
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: center;
        }
        .error {
            background: #ffebee;
            color: #c62828;
            border-left: 5px solid #c62828;
        }
        .warning {
            background: #fff3e0;
            color: #e65100;
            border-left: 5px solid #e65100;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
        .icon {
            font-size: 24px;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="../esercizio-02/index.php" class="back-link">← Torna alla lista studenti</a>
        
        <h1>🔍 Dettagli Studente</h1>
        <p class="subtitle">📚 Giorno 1 - Esercizio 3</p>
        
        <?php
        // Includi file di configurazione
        require_once '../../config/db_config.template.php';
        require_once '../../utils/functions.php';
        
        // Variabili
        $errore = '';
        $studente = null;
        
        // Verifica se è stato passato l'ID
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            $errore = "⚠️ Nessun ID studente specificato. Aggiungi ?id=1 all'URL.";
        } elseif (!is_numeric($_GET['id'])) {
            $errore = "❌ ID non valido. L'ID deve essere un numero.";
        } else {
            // ID valido, procedi con la query
            $id = (int)$_GET['id'];
            
            // Connetti al database
            $conn = connetti_database();
            
            if (!$conn) {
                $errore = "❌ Errore di connessione al database: " . mysqli_connect_error();
            } else {
                // Prepara la query (prepared statement per sicurezza)
                $stmt = mysqli_prepare($conn, "SELECT id, nome, cognome, email, data_nascita, citta, corso, creato_il 
                                                FROM studenti 
                                                WHERE id = ?");
                
                if ($stmt) {
                    // Bind del parametro
                    mysqli_stmt_bind_param($stmt, "i", $id);
                    
                    // Esegui la query
                    mysqli_stmt_execute($stmt);
                    
                    // Ottieni il risultato
                    $result = mysqli_stmt_get_result($stmt);
                    
                    // Controlla se è stato trovato uno studente
                    if (mysqli_num_rows($result) > 0) {
                        $studente = mysqli_fetch_assoc($result);
                    } else {
                        $errore = "📭 Studente con ID #$id non trovato nel database.";
                    }
                    
                    mysqli_stmt_close($stmt);
                } else {
                    $errore = "❌ Errore nella preparazione della query: " . mysqli_error($conn);
                }
                
                chiudi_database($conn);
            }
        }
        ?>
        
        <?php if ($errore): ?>
            <!-- Mostra messaggio di errore -->
            <div class="<?php echo strpos($errore, '⚠️') !== false ? 'warning' : 'error'; ?>">
                <?php echo htmlspecialchars($errore); ?>
            </div>
            <div style="text-align: center; margin-top: 20px;">
                <p>Prova con:</p>
                <a href="?id=1" style="color: #667eea;">?id=1</a> | 
                <a href="?id=2" style="color: #667eea;">?id=2</a> | 
                <a href="?id=3" style="color: #667eea;">?id=3</a>
            </div>
        <?php elseif ($studente): ?>
            <!-- Mostra dettagli studente -->
            <div class="card">
                <div class="card-header">
                    <h2><?php echo htmlspecialchars($studente['nome'] . ' ' . $studente['cognome']); ?></h2>
                    <div class="id">ID: #<?php echo htmlspecialchars($studente['id']); ?></div>
                </div>
                
                <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label">📧 Email</div>
                        <div class="detail-value"><?php echo htmlspecialchars($studente['email']); ?></div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">📅 Data di Nascita</div>
                        <div class="detail-value">
                            <?php 
                            if ($studente['data_nascita']) {
                                echo formatta_data_italiana($studente['data_nascita']);
                                
                                // Calcola età
                                $data_nascita = new DateTime($studente['data_nascita']);
                                $oggi = new DateTime();
                                $eta = $oggi->diff($data_nascita)->y;
                                echo " <small>($eta anni)</small>";
                            } else {
                                echo '-';
                            }
                            ?>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">📍 Città</div>
                        <div class="detail-value"><?php echo htmlspecialchars($studente['citta']); ?></div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">🎓 Corso di Studi</div>
                        <div class="detail-value"><?php echo htmlspecialchars($studente['corso']); ?></div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">📝 Iscritto il</div>
                        <div class="detail-value">
                            <?php 
                            if ($studente['creato_il']) {
                                $data = new DateTime($studente['creato_il']);
                                echo $data->format('d/m/Y');
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="footer">
            <p>🔗 Esercizio completato con successo!</p>
            <p>PHP/MySQLi Procedurale</p>
        </div>
    </div>
</body>
</html>
