<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 2 - Modifica ed Elimina Studente</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="breadcrumb">
            🏠 <a href="../../">Home</a> <span>›</span> <a href="../">Giorno 2</a> <span>›</span> Esercizio 2
        </div>
        
        <div class="icon">👷‍♀️</div>
        <h1>🎯 Esercizio 2: Modifica ed Elimina Studente</h1>
        
        <div class="instruction-box">
            <h2>📝 Questo Esercizio È da Completare</h2>
            <p>Questo è un esercizio avanzato che richiede l'implementazione di operazioni UPDATE e DELETE.</p>
            
            <p><strong>Per completare questo esercizio, segui questi passaggi:</strong></p>
            <ol>
                <li>Leggi attentamente il file <code>README.md</code> in questa cartella per capire i requisiti</li>
                <li>Questo file (<code>index.php</code>) è solo un placeholder - sostituiscilo con la tua implementazione</li>
                <li>Ricevi l'ID dello studente tramite parametro GET (<code>?id=1</code>)</li>
                <li>Carica i dati attuali dello studente dal database</li>
                <li>Mostra un form precompilato con i dati</li>
                <li>Implementa la logica per aggiornare i dati (UPDATE)</li>
                <li>Implementa la funzionalità di eliminazione (DELETE) con conferma JavaScript</li>
                <li>Usa redirect dopo operazioni di successo (Pattern Post-Redirect-Get)</li>
            </ol>
        </div>
        
        <div class="requirements">
            <h3>✅ Requisiti Principali</h3>
            <ul>
                <li>Ricevere ID studente via GET</li>
                <li>Form precompilato con dati attuali</li>
                <li>Query UPDATE con prepared statements</li>
                <li>Query DELETE con prepared statements</li>
                <li>Conferma JavaScript prima di eliminare</li>
                <li>Redirect dopo operazioni (evitare re-submit)</li>
                <li>Gestione errori e messaggi appropriati</li>
            </ul>
        </div>
        
        <div class="warning">
            <h3>⚠️ Difficoltà: Avanzato</h3>
            <p>
                Questo esercizio combina diverse tecniche: query parametriche, gestione di form, 
                operazioni multiple (update/delete), e pattern di redirect. Assicurati di aver 
                completato l'Esercizio 1 prima di procedere.
            </p>
        </div>
        
        <div class="actions">
            <a href="README.md" class="btn btn-primary">📖 Leggi le Istruzioni</a>
            <a href="../" class="btn btn-secondary">← Torna al Giorno 2</a>
        </div>
        
        <div style="margin-top: 40px; text-align: center; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <p style="color: #666; margin-bottom: 10px;">💡 <strong>Suggerimenti:</strong></p>
            <p style="color: #555; line-height: 1.6;">
                • Usa <code>$_GET['id']</code> per ricevere l'ID dello studente<br>
                • Valida sempre che l'ID sia numerico con <code>is_numeric()</code><br>
                • Per eliminazione, usa: <code>onclick="return confirm('Sei sicuro?')"</code><br>
                • Dopo update/delete, usa: <code>header('Location: ...');</code> seguito da <code>exit();</code>
            </p>
        </div>
    </div>
</body>
</html>
