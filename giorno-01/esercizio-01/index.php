<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 1 - Prima Connessione</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            max-width: 600px;
            width: 100%;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .message {
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            font-size: 18px;
        }
        .success {
            background: #d4edda;
            color: #155724;
            border: 2px solid #c3e6cb;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            border: 2px solid #f5c6cb;
        }
        .info {
            background: #d1ecf1;
            color: #0c5460;
            border: 2px solid #bee5eb;
            margin-top: 20px;
            padding: 15px;
            font-size: 14px;
        }
        .info strong {
            display: block;
            margin-bottom: 5px;
        }
        .icon {
            font-size: 50px;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔌 Esercizio 1: Prima Connessione al Database</h1>
        
        <?php
        // Includi file di configurazione
        require_once '../../config/db_config.template.php';
        
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
