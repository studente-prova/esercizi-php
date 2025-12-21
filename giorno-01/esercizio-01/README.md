# Esercizio 1: Prima Connessione al Database

## 🎯 Obiettivo

Creare un file PHP che si connette al database MySQL e mostra un messaggio di conferma della connessione riuscita.

## 📝 Descrizione

Questo è il tuo primo esercizio con PHP e MySQL. Imparerai a:
- Includere file di configurazione
- Stabilire una connessione al database
- Gestire eventuali errori di connessione
- Chiudere correttamente la connessione

## 🔧 Requisiti

1. Includere il file di configurazione del database
2. Stabilire connessione usando `mysqli_connect()`
3. Verificare se la connessione è riuscita
4. Mostrare messaggio di successo o errore
5. Chiudere la connessione

## 💻 File da Creare

- `index.php` - File principale dell'esercizio

## 📚 Funzioni PHP da Usare

- `mysqli_connect()` - Crea connessione al database
- `mysqli_connect_error()` - Ritorna errore di connessione
- `mysqli_close()` - Chiude connessione

## 🎨 Output Atteso

```
✅ Connessione al database riuscita!
Database: esercizi_php
```

oppure in caso di errore:

```
❌ Errore di connessione: [messaggio errore]
```

## 💡 Suggerimenti

1. Assicurati di aver configurato correttamente `config/db_config_local.php`
2. Usa `require_once` per includere i file di configurazione
3. Controlla sempre se la connessione è valida prima di usarla
4. Usa CSS inline o semplice per migliorare la presentazione

## 🚀 Bonus (Opzionale)

- Mostra informazioni aggiuntive come versione MySQL
- Aggiungi stili CSS per rendere l'output più gradevole
- Mostra il charset della connessione

## 📖 Esempio di Codice di Partenza

```php
<?php
// Includi configurazione database
require_once '../../config/db_config.template.php';

// TODO: Crea connessione

// TODO: Verifica connessione

// TODO: Mostra messaggio

// TODO: Chiudi connessione
?>
```

## ✅ Test

Per verificare che l'esercizio funzioni:

1. Avvia il server PHP:
```bash
cd giorno-01/esercizio-01
php -S localhost:8000
```

2. Apri il browser a `http://localhost:8000`

3. Dovresti vedere il messaggio di connessione riuscita
