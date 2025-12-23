<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 3 - Dettagli Studente</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="breadcrumb">
            🏠 <a href="../../">Home</a> <span>›</span> <a href="../">Giorno 1</a> <span>›</span> Esercizio 3
        </div>
        
        <a href="../esercizio-02/index.php" class="back-link">← Torna alla lista studenti</a>
        
        <h1>🔍 Dettagli Studente</h1>
        <p class="subtitle">📚 Giorno 1 - Esercizio 3</p>
        
        <?php
        // Includi file di configurazione
        require_once '../../config/db_config.php';
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
