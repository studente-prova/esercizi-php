# Giorno 1 - Fondamenti PHP e MySQLi

Benvenuto al primo giorno di esercizi! Oggi imparerai le basi di PHP e come connetterti e interrogare un database MySQL usando MySQLi in modalità procedurale.

## 🎯 Obiettivi del Giorno

- Comprendere la sintassi base di PHP
- Stabilire connessione a un database MySQL
- Eseguire query SELECT
- Visualizzare dati in formato HTML

## 📚 Concetti Trattati

1. **Variabili e tipi di dati in PHP**
2. **Connessione al database con mysqli_connect()**
3. **Esecuzione query con mysqli_query()**
4. **Fetch dati con mysqli_fetch_assoc()**
5. **Chiusura connessione con mysqli_close()**

## 📋 Esercizi

### Esercizio 1: Prima Connessione
**Difficoltà**: ⭐ Facile

Crea un file PHP che si connette al database e visualizza un messaggio di conferma.

**Obiettivi**:
- Includere file di configurazione
- Stabilire connessione
- Gestire errori di connessione
- Chiudere connessione

[Vai all'esercizio →](./esercizio-01/)

---

### Esercizio 2: Lista Studenti
**Difficoltà**: ⭐⭐ Medio

Visualizza l'elenco completo degli studenti presenti nel database in una tabella HTML.

**Obiettivi**:
- Eseguire query SELECT
- Iterare sui risultati
- Formattare output in HTML
- Gestire risultati vuoti

[Vai all'esercizio →](./esercizio-02/)

---

### Esercizio 3: Dettagli Studente
**Difficoltà**: ⭐⭐ Medio

Mostra i dettagli di uno studente specifico basandosi su un parametro GET.

**Obiettivi**:
- Ricevere parametri GET
- Query con clausola WHERE
- Sanitizzazione input
- Gestione record non trovato

[Vai all'esercizio →](./esercizio-03/)

---

## 💡 Suggerimenti

1. **Controlla sempre gli errori**: Usa `mysqli_error()` per debug
2. **Chiudi le connessioni**: Sempre chiudere con `mysqli_close()`
3. **Sanitizza input**: Usa `htmlspecialchars()` per output HTML
4. **Testa il database**: Verifica che i dati di esempio siano presenti

## 🔗 Risorse Utili

- [Documentazione mysqli_connect](https://www.php.net/manual/it/function.mysqli-connect.php)
- [Documentazione mysqli_query](https://www.php.net/manual/it/mysqli.query.php)
- [Tutorial PHP/MySQL](https://www.php.net/manual/it/mysqli.quickstart.php)

## ✅ Checklist di Completamento

Dopo aver completato gli esercizi, dovresti essere in grado di:

- [ ] Connetterti a un database MySQL
- [ ] Eseguire una query SELECT
- [ ] Visualizzare dati in formato tabella HTML
- [ ] Gestire errori di connessione e query
- [ ] Passare parametri via URL (GET)
- [ ] Sanitizzare input e output

## 🚀 Prossimo Giorno

Nel **Giorno 2** imparerai le operazioni CRUD (Create, Read, Update, Delete) per gestire i dati nel database.
