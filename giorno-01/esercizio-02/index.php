<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 2 - Lista Studenti</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="breadcrumb">
            🏠 <a href="../../">Home</a> <span>›</span> <a href="../">Giorno 1</a> <span>›</span> Esercizio 2
        </div>
        
        <h1>👥 Lista Studenti</h1>
        <p class="subtitle">📚 Giorno 1 - Esercizio 2</p>
        
        <?php
        // Includi file di configurazione
        require_once '../../config/db_config.php';
        
        // Connetti al database
        $conn = connetti_database();
        
        if (!$conn) {
            echo '<div class="error">❌ Errore di connessione al database: ' . 
                 htmlspecialchars(mysqli_connect_error()) . '</div>';
            exit;
        }
        
        // Query per ottenere tutti gli studenti
        $query = "SELECT id, nome, cognome, email, data_nascita, citta, corso 
                  FROM studenti 
                  ORDER BY cognome, nome";
        
        // Esegui la query
        $result = mysqli_query($conn, $query);
        
        // Verifica se la query è stata eseguita correttamente
        if (!$result) {
            echo '<div class="error">❌ Errore nella query: ' . 
                 htmlspecialchars(mysqli_error($conn)) . '</div>';
            chiudi_database($conn);
            exit;
        }
        
        // Conta il numero di risultati
        $num_studenti = mysqli_num_rows($result);
        ?>
        
        <!-- Mostra il numero totale di studenti -->
        <div class="info-box">
            📊 Totale Studenti: <strong><?php echo $num_studenti; ?></strong>
        </div>
        
        <?php if ($num_studenti > 0): ?>
            <!-- Tabella con i dati degli studenti -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Email</th>
                        <th>Data Nascita</th>
                        <th>Città</th>
                        <th>Corso</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($studente = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><strong>#<?php echo htmlspecialchars($studente['id']); ?></strong></td>
                            <td><?php echo htmlspecialchars($studente['nome']); ?></td>
                            <td><?php echo htmlspecialchars($studente['cognome']); ?></td>
                            <td><?php echo htmlspecialchars($studente['email']); ?></td>
                            <td>
                                <?php 
                                if ($studente['data_nascita']) {
                                    $data = new DateTime($studente['data_nascita']);
                                    echo $data->format('d/m/Y');
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <td>📍 <?php echo htmlspecialchars($studente['citta']); ?></td>
                            <td>
                                <span class="badge badge-primary">
                                    <?php echo htmlspecialchars($studente['corso']); ?>
                                </span>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <!-- Messaggio se non ci sono studenti -->
            <div class="no-data">
                📭 Nessuno studente trovato nel database.
            </div>
        <?php endif; ?>
        
        <?php
        // Chiudi la connessione al database
        chiudi_database($conn);
        ?>
        
        <div class="footer">
            <p>🔗 Esercizio completato con successo!</p>
            <p>PHP/MySQLi Procedurale</p>
        </div>
    </div>
</body>
</html>
