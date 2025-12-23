<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 1 - Inserisci Nuovo Studente</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background: white;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            max-width: 800px;
            width: 100%;
        }
        .breadcrumb {
            background: #f8f9fa;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            color: #666;
        }
        .breadcrumb a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }
        .breadcrumb a:hover {
            text-decoration: underline;
        }
        .breadcrumb span {
            margin: 0 8px;
            color: #999;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            font-size: 2em;
        }
        .instruction-box {
            background: #fff3cd;
            border-left: 5px solid #ffc107;
            padding: 30px;
            border-radius: 8px;
            margin: 30px 0;
        }
        .instruction-box h2 {
            color: #856404;
            margin-bottom: 15px;
            font-size: 1.5em;
        }
        .instruction-box p {
            color: #856404;
            line-height: 1.8;
            margin-bottom: 15px;
        }
        .instruction-box ol {
            color: #856404;
            line-height: 2;
            margin-left: 20px;
        }
        .instruction-box ol li {
            margin-bottom: 10px;
        }
        .instruction-box code {
            background: #fff;
            padding: 2px 8px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            color: #c62828;
        }
        .btn {
            display: inline-block;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin: 10px 10px 10px 0;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(102, 126, 234, 0.4);
        }
        .btn-secondary {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }
        .btn-secondary:hover {
            background: #667eea;
            color: white;
        }
        .actions {
            text-align: center;
            margin-top: 30px;
        }
        .icon {
            font-size: 80px;
            text-align: center;
            margin-bottom: 20px;
        }
        .requirements {
            background: #e3f2fd;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #2196f3;
        }
        .requirements h3 {
            color: #1565c0;
            margin-bottom: 10px;
        }
        .requirements ul {
            color: #555;
            line-height: 1.8;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="breadcrumb">
            🏠 <a href="../../">Home</a> <span>›</span> <a href="../">Giorno 2</a> <span>›</span> Esercizio 1
        </div>
        
        <div class="icon">👷‍♂️</div>
        <h1>🎯 Esercizio 1: Inserisci Nuovo Studente</h1>
        
        <div class="instruction-box">
            <h2>📝 Questo Esercizio È da Completare</h2>
            <p>Questo esercizio richiede che tu scriva il codice PHP per implementare la funzionalità richiesta.</p>
            
            <p><strong>Per completare questo esercizio, segui questi passaggi:</strong></p>
            <ol>
                <li>Leggi attentamente il file <code>README.md</code> in questa cartella per capire i requisiti</li>
                <li>Questo file (<code>index.php</code>) è solo un placeholder - sostituiscilo con la tua implementazione</li>
                <li>Crea un form HTML per inserire i dati dello studente</li>
                <li>Implementa la logica PHP per gestire l'invio del form</li>
                <li>Valida i dati e inseriscili nel database usando prepared statements</li>
                <li>Testa la tua soluzione ricaricando questa pagina</li>
            </ol>
        </div>
        
        <div class="requirements">
            <h3>✅ Requisiti Principali</h3>
            <ul>
                <li>Form con campi: Nome, Cognome, Email, Data di nascita, Città, Corso</li>
                <li>Validazione lato server (campi obbligatori, formato email)</li>
                <li>Query INSERT con prepared statements</li>
                <li>Messaggi di successo/errore</li>
                <li>Sanitizzazione input utente</li>
            </ul>
        </div>
        
        <div class="actions">
            <a href="README.md" class="btn btn-primary">📖 Leggi le Istruzioni</a>
            <a href="../" class="btn btn-secondary">← Torna al Giorno 2</a>
        </div>
        
        <div style="margin-top: 40px; text-align: center; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <p style="color: #666; margin-bottom: 10px;">💡 <strong>Suggerimento:</strong></p>
            <p style="color: #555; line-height: 1.6;">
                Puoi prendere spunto dagli esercizi del Giorno 1 per la struttura del codice.<br>
                Ricordati di usare <code>require_once '../../config/db_config.php';</code> per la connessione al database.
            </p>
        </div>
    </div>
</body>
</html>
