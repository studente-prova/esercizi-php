<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 1 - Inserisci Nuovo Studente</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
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
        
        <div class="hint-box">
            <p>💡 <strong>Suggerimento:</strong></p>
            <p>
                Puoi prendere spunto dagli esercizi del Giorno 1 per la struttura del codice.<br>
                Ricordati di usare <code>require_once '../../config/db_config.php';</code> per la connessione al database.
            </p>
        </div>
    </div>
</body>
</html>
