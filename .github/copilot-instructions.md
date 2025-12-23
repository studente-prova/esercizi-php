# Istruzioni per AI Coding Agents

Questo repository contiene esercizi didattici di PHP con MySQLi procedurale per studenti.

## Contesto del Progetto

### Scopo
Repository educativo per insegnare PHP procedurale e MySQLi a studenti in ambiente laboratorio/casa.

### Ambienti di Sviluppo
1. **Laboratorio/Casa**: Windows con XAMPP (htdocs) + VSCode
2. **Online**: Altervista con caricamento FTP tramite VSCode

### Configurazione
- **File di configurazione**: `config/db_config.php` (UNICO file, nessun template/local/env)
- **Credenziali XAMPP**: user=`root`, password=`` (vuota)
- **Credenziali Altervista**: user=`username`, database=`my_username`

## Linee Guida per Modifiche

### Priorità
1. **Semplicità**: Il codice deve essere comprensibile per principianti
2. **Didattica**: Privilegiare chiarezza su efficienza
3. **PHP Procedurale**: NO OOP, NO framework, solo PHP procedurale
4. **MySQLi**: Usare MySQLi (NO PDO) in stile procedurale

### Struttura File
```
esercizi-php/
├── index.html              # Home navigabile
├── docs/
│   └── index.html          # Documentazione HTML (NON markdown)
├── config/
│   └── db_config.php       # UNICO file configurazione
├── database/
│   └── schema.sql          # Schema database
├── giorno-XX/              # Esercizi organizzati per giorno
│   └── esercizio-XX/
│       ├── README.md       # Descrizione esercizio
│       └── index.php       # Codice esercizio
└── utils/
    └── functions.php       # Funzioni comuni
```

### Convenzioni Codice

#### PHP
- Stile: **Procedurale** (no classi, no namespace)
- Funzioni: `snake_case`
- Variabili: `snake_case` o `camelCase` (consistente)
- Costanti: `UPPER_SNAKE_CASE`
- Commenti: **Italiano**
- Indentazione: 4 spazi

#### Database
- MySQLi procedurale (NO PDO)
- Sempre prepared statements per sicurezza
- Funzioni helper: `connetti_database()`, `chiudi_database()`
- Charset: UTF-8 (utf8mb4)

#### HTML/CSS
- HTML5 semantico
- CSS inline o in `<style>` per semplicità
- Form con validazione lato server
- Responsive design base

### Cosa NON Fare
❌ Non usare framework (Laravel, Symfony, ecc.)
❌ Non usare Composer o package manager
❌ Non usare OOP avanzata
❌ Non usare PDO
❌ Non creare file .env o sistemi di config complessi
❌ Non usare JavaScript framework (Vue, React, ecc.)
❌ Non modificare la struttura principale senza necessità

### Cosa Fare
✅ Codice PHP procedurale semplice e chiaro
✅ MySQLi con prepared statements
✅ Commenti esplicativi in italiano
✅ Validazione input server-side
✅ Gestione errori appropriata
✅ HTML/CSS pulito e leggibile
✅ Documentazione HTML (non Markdown per guide principali)

## Documentazione

### Formato
- **Guide setup**: HTML (`docs/index.html`) per visualizzazione diretta in htdocs/Altervista
- **Esercizi**: Markdown (`README.md`) per ogni esercizio
- **Codice**: Commenti inline in italiano

### Aggiornamento Documentazione
Quando modifichi configurazione o workflow:
1. Aggiorna `docs/index.html` (non creare nuovi .md)
2. Aggiorna `README.md` con riferimenti alla guida HTML
3. Mantieni coerenza tra tutte le guide

## Testing

### Ambienti di Test
1. XAMPP su Windows (ambiente target principale)
2. PHP built-in server per test rapidi
3. Altervista per test deployment

### Verifica Modifiche
Quando aggiungi/modifichi esercizi:
1. Testa su XAMPP Windows con credenziali default
2. Verifica che `config/db_config.php` funzioni
3. Controlla che non ci siano dipendenze da librerie esterne
4. Verifica encoding UTF-8 per caratteri accentati
5. Testa form e validazione input

## Sicurezza

### Best Practices da Rispettare
- Prepared statements per tutte le query con input utente
- Escape output con `htmlspecialchars()`
- Validazione server-side sempre
- Password hashing con `password_hash()`
- Session management sicuro

### Note
- Il file `config/db_config.php` è nel repository per scopi didattici
- Contiene credenziali di esempio (root/vuoto per XAMPP)
- Studenti devono modificarlo con le proprie credenziali

## Risorse

### Link Utili
- [PHP Manual (IT)](https://www.php.net/manual/it/)
- [MySQLi Reference](https://www.php.net/manual/it/book.mysqli.php)
- [XAMPP Download](https://www.apachefriends.org/it/)
- [Altervista](https://it.altervista.org/)

### Repository
- GitHub: `studente-prova/esercizi-php`
- Documentazione: Apri `index.html` o `docs/index.html` nel browser

## Changelog

### Come Mantenere Aggiornato
Quando fai modifiche significative:
1. Aggiorna questa documentazione
2. Aggiorna `docs/index.html` se cambia setup/workflow
3. Aggiungi note nella PR description
4. Mantieni il README.md principale aggiornato

---

**Ultimo aggiornamento**: 2025-12-23
**Configurazione**: File unico `config/db_config.php`
**Documentazione**: HTML in `docs/index.html`
