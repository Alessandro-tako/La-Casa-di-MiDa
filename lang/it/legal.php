<?PHP

return [
    'privacy_text' => <<<'HTML'
        <p><strong>Ultimo aggiornamento:</strong> 12 giugno 2025</p>

        <h2>1. Titolare del trattamento</h2>
        <p>Il titolare del trattamento è <strong>La Casa di MiDa di Damiano e Michela Bisceglie</strong>, con sede in Via Carlo Cattaneo 10, Roma. Per ogni richiesta in materia di privacy è possibile contattarci all’indirizzo email <a href="mailto:info@lacasadimida.it" class="link-gold">info@lacasadimida.it</a>.</p>

        <h2>2. Tipologie di dati raccolti</h2>
        <p>Raccogliamo le seguenti categorie di dati personali:</p>
        <ul>
            <li>Dati anagrafici (nome, cognome)</li>
            <li>Dati di contatto (email, indirizzo, telefono)</li>
            <li>Dati relativi alla prenotazione (camera, date di check-in/out, numero ospiti)</li>
            <li>Dati di pagamento (ID cliente Stripe, metodo di pagamento – <em>mai i dati della carta</em>)</li>
            <li>Dati tecnici (indirizzo IP, user agent, lingua preferita)</li>
            <li>Dati di navigazione e comportamento tramite cookie</li>
        </ul>

        <h2>3. Finalità del trattamento</h2>
        <p>I dati sono trattati per le seguenti finalità:</p>
        <ul>
            <li>Gestione delle prenotazioni e del soggiorno</li>
            <li>Adempimento degli obblighi fiscali e contabili</li>
            <li>Invio di comunicazioni pre/post soggiorno (es. conferme, promemoria, ringraziamenti)</li>
            <li>Sicurezza dei pagamenti tramite Stripe</li>
            <li>Analisi statistica del traffico (es. Google Analytics)</li>
            <li>Eventuali comunicazioni promozionali, solo con consenso esplicito</li>
        </ul>

        <h2>4. Base giuridica del trattamento</h2>
        <p>I dati sono trattati in base a:</p>
        <ul>
            <li>Contratto (gestione prenotazioni)</li>
            <li>Obbligo legale (fatturazione)</li>
            <li>Legittimo interesse (miglioramento dei servizi)</li>
            <li>Consenso (per finalità facoltative come marketing o cookie non tecnici)</li>
        </ul>

        <h2>5. Conservazione dei dati</h2>
        <p>I dati personali sono conservati per il tempo necessario a soddisfare le finalità per cui sono stati raccolti:</p>
        <ul>
            <li>Dati relativi a prenotazioni e fatturazione: fino a <strong>10 anni</strong> per obblighi fiscali</li>
            <li>Dati non più necessari vengono <strong>anonimizzati</strong> o cancellati in modo sicuro dopo 12-24 mesi dalla fine del soggiorno</li>
        </ul>

        <h2>6. Diritti dell’interessato</h2>
        <p>Puoi esercitare in qualsiasi momento i seguenti diritti:</p>
        <ul>
            <li>Accesso ai tuoi dati</li>
            <li>Rettifica o aggiornamento</li>
            <li>Cancellazione (diritto all'oblio)</li>
            <li>Limitazione o opposizione al trattamento</li>
            <li>Portabilità dei dati</li>
            <li>Reclamo al Garante per la protezione dei dati personali</li>
        </ul>
        <p>Per esercitare i tuoi diritti scrivi a <a href="mailto:info@lacasadimida.it" class="link-gold">info@lacasadimida.it</a>.</p>

        <h2>7. Sicurezza</h2>
        <p>I tuoi dati sono protetti da misure tecniche e organizzative adeguate contro accessi non autorizzati, perdita, alterazione o divulgazione.</p>

        <h2>8. Cookie e servizi di terze parti</h2>
        <p>Utilizziamo cookie tecnici e di terze parti (es. Stripe, Google Analytics). Per maggiori informazioni consulta la nostra <a href="/cookie-policy" class="link-gold">Cookie Policy</a>.</p>
    HTML,

    'cookie_text' => <<<'HTML'
        <p><strong>Ultimo aggiornamento:</strong> 12 giugno 2025</p>

        <h2>1. Cosa sono i cookie</h2>
        <p>I cookie sono piccoli file di testo memorizzati sul tuo dispositivo quando visiti un sito web. Consentono al sito di funzionare correttamente o di raccogliere informazioni sulla tua esperienza.</p>

        <h2>2. Tipologie di cookie utilizzati</h2>
        <ul>
            <li><strong>Cookie tecnici:</strong> essenziali per il funzionamento del sito. Non richiedono consenso.</li>
            <li><strong>Cookie analitici:</strong> ci aiutano a comprendere come gli utenti interagiscono con il sito (es. Google Analytics). Vengono raccolti in forma anonimizzata.</li>
            <li><strong>Cookie di profilazione di terze parti:</strong> usati da servizi come Stripe, Google Maps, ecc., per fornire funzionalità avanzate. Richiedono il tuo consenso.</li>
        </ul>

        <h2>3. Gestione del consenso</h2>
        <p>All’ingresso del sito viene mostrato un banner per la gestione del consenso ai cookie non essenziali. Puoi accettare o rifiutare i cookie facoltativi liberamente.</p>

        <h2>4. Come modificare le preferenze</h2>
        <p>Puoi modificare il consenso in qualsiasi momento cliccando su <strong>"Modifica preferenze cookie"</strong> nel footer del sito o eliminando i cookie tramite le impostazioni del browser.</p>

        <h2>5. Dettaglio dei cookie di terze parti</h2>
        <ul>
            <li><strong>Stripe:</strong> per l'elaborazione dei metodi di pagamento. <a href="https://stripe.com/it/privacy" target="_blank" class="link-gold">Leggi la privacy policy</a></li>
            <li><strong>Google Analytics:</strong> per statistiche anonime. <a href="https://policies.google.com/privacy?hl=it" target="_blank" class="link-gold">Leggi la privacy policy</a></li>
            <li><strong>Google Maps:</strong> per visualizzare la mappa della struttura. <a href="https://policies.google.com/privacy?hl=it" target="_blank" class="link-gold">Leggi la privacy policy</a></li>
        </ul>
    HTML,
];
