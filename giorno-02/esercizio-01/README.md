# Esercizio 1: Inserisci Nuovo Studente

## 🎯 Obiettivo

Creare un form HTML per inserire un nuovo studente nel database e gestire l'elaborazione dei dati con validazione completa.

## 📝 Descrizione

In questo esercizio imparerai a:
- Creare form HTML con campi appropriati
- Ricevere dati tramite metodo POST
- Validare input utente (campi obbligatori, formato email)
- Eseguire query INSERT in modo sicuro
- Mostrare messaggi di conferma o errore
- Gestire errori di duplicazione (email unica)

## 🔧 Requisiti

1. Form HTML con i seguenti campi:
   - Nome (obbligatorio)
   - Cognome (obbligatorio)
   - Email (obbligatorio, formato valido, unica)
   - Data di nascita (opzionale)
   - Città (opzionale)
   - Corso (obbligatorio)

2. Validazione lato server:
   - Verificare campi obbligatori
   - Validare formato email
   - Sanitizzare input per sicurezza

3. Inserimento nel database usando prepared statements

4. Feedback all'utente:
   - Messaggio di successo con ID nuovo studente
   - Messaggi di errore specifici per ogni problema
   - Mantenere dati nel form in caso di errore

## 💻 File da Creare

- `index.php` - Form e logica di elaborazione

## 📚 Funzioni PHP da Usare

- `$_SERVER['REQUEST_METHOD']` - Verifica metodo HTTP
- `$_POST['campo']` - Riceve dati form
- `filter_var()` - Valida email
- `mysqli_prepare()` - Prepara statement
- `mysqli_stmt_bind_param()` - Associa parametri
- `mysqli_insert_id()` - Ottiene ID inserito

## 🎨 Output Atteso

Un form con campi di input e, dopo invio:
- ✅ "Studente inserito con successo! ID: #6"
- oppure ❌ messaggi di errore specifici

## 💡 Suggerimenti

1. Usa `$_SERVER['REQUEST_METHOD'] === 'POST'` per distinguere visualizzazione da elaborazione
2. Crea un array `$errori = []` per collezionare tutti gli errori
3. Mostra errori solo se l'array non è vuoto
4. Usa `htmlspecialchars()` per mostrare i valori nel form
5. Considera l'uso di `mysqli_real_escape_string()` o prepared statements

## 🚀 Bonus (Opzionale)

- Aggiungi un campo per selezionare il corso da un dropdown popolato dal database
- Implementa controllo età minima (es. 16 anni)
- Aggiungi conferma JavaScript prima dell'invio
- Dopo inserimento, redirect alla pagina dettagli del nuovo studente
- Aggiungi campo per caricare una foto profilo

## 📖 Query SQL di Riferimento

```sql
INSERT INTO studenti (nome, cognome, email, data_nascita, citta, corso) 
VALUES (?, ?, ?, ?, ?, ?);
```

## ✅ Test

1. Avvia il server:
```bash
cd giorno-02/esercizio-01
php -S localhost:8000
```

2. Test da eseguire:
   - Invia form vuoto → Deve mostrare errori campi obbligatori
   - Invia con email non valida → Deve mostrare errore formato email
   - Invia con email già esistente → Deve mostrare errore duplicato
   - Invia con tutti i dati validi → Deve inserire e confermare
   - Verifica in database che il record sia stato inserito

## ⚠️ Sicurezza

```php
// ✅ SEMPRE validare e sanitizzare
$nome = trim($_POST['nome']);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

// ✅ SEMPRE usare prepared statements
$stmt = mysqli_prepare($conn, "INSERT INTO studenti (nome, email) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $nome, $email);
```
