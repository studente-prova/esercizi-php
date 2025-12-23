<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 1 - Prima Connessione</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="breadcrumb">
            🏠 <a href="../../">Home</a> <span>›</span> <a href="../">Giorno 1</a> <span>›</span> Esercizio 1
        </div>
        
        <h1>🔌 Esercizio 1: Prima Connessione al Database</h1>
        
        <?php
        // Includi file di configurazione
        require_once '../../config/db_config.php';
        
        // Variabile per memorizzare messaggi
        $messaggio = '';
        $tipo = '';
        $info_database = '';
        
        // Tenta la connessione al database
        $conn = connetti_database();
        
        // Verifica se la connessione è riuscita
        if ($conn) {
            $messaggio = "Connessione al database riuscita!";
            $tipo = "success";
            
            // Ottieni informazioni aggiuntive sul database
            $db_info = mysqli_get_server_info($conn);
            $db_name = DB_NAME;
            $charset = mysqli_character_set_name($conn);
            
            $info_database = "
                <div class='info'>
                    <strong>ℹ️ Informazioni Database:</strong>
                    📦 Database: <strong>$db_name</strong><br>
                    🔢 Versione MySQL: <strong>$db_info</strong><br>
                    🔤 Charset: <strong>$charset</strong>
                </div>
            ";
            
            // Chiudi la connessione
            chiudi_database($conn);
        } else {
            $messaggio = "Errore di connessione: " . mysqli_connect_error();
            $tipo = "error";
        }
        ?>
        
        <!-- Visualizza il messaggio -->
        <?php if ($tipo === 'success'): ?>
            <div class="icon">✅</div>
        <?php else: ?>
            <div class="icon">❌</div>
        <?php endif; ?>
        
        <div class="message <?php echo $tipo; ?>">
            <?php echo htmlspecialchars($messaggio); ?>
        </div>
        
        <?php echo $info_database; ?>
        
        <div style="margin-top: 30px; text-align: center; color: #666; font-size: 14px;">
            <p>📚 <strong>Giorno 1</strong> - Esercizio 1</p>
            <p>PHP/MySQLi Procedurale</p>
        </div>
    </div>
</body>
</html>
