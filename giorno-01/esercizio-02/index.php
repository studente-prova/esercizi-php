<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 2 - Lista Studenti</title>
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
            max-width: 1200px;
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
        .info-box {
            background: #e3f2fd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: center;
            font-size: 18px;
            color: #1565c0;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background: #667eea;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
        }
        td {
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
        }
        tr:hover {
            background: #f5f5f5;
        }
        tr:nth-child(even) {
            background: #fafafa;
        }
        tr:nth-child(even):hover {
            background: #f0f0f0;
        }
        .no-data {
            text-align: center;
            padding: 40px;
            color: #999;
            font-size: 18px;
        }
        .error {
            background: #ffebee;
            color: #c62828;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 5px solid #c62828;
        }
        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge-primary {
            background: #e3f2fd;
            color: #1565c0;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
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
