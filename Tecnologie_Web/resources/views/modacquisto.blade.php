@extends ('layout.public')

@section ('title','Modalità Acquisto')

@section('content')
<div style="padding: 20px">
    <p>
        Per effettuare l’acquisto occorre seguire attentamente la procedura online. UNIAuto si riserva il diritto di rifiutare o annullare un ordine, 
        in caso di dubbi sulla veridicità - dati anagrafici incompleti o incongruenti, inadempienze di pagamento già manifestate in precedenti acquisti,
        dubbia autenticità della carta di credito - oppure in caso di indisponibilità dei prodotti. 
        La comunicazione di rifiuto o annullamento dell’ordine (tramite e-mail) può non essere tempestiva e avvenire anche a seguito di successivo contatto da parte del cliente.
    </p>
</div>
<div id="acquisto" style="padding: 20px">
    <ul>
        <li>
            <p>
                Aggiungere al carrello della spesa il prodotto desiderato. È possibile selezionare la quantità del prodotto da aggiungere al carrello e le eventuali opzioni dello stesso dalla scheda
                dettagliata del prodotto. L'operazione di aggiunta al carrello mostrerà in automatico lo stato del carrello stesso.
            </p>
        </li>
        <li>
            <p>
                Una volta terminata la scelta dei prodotti da acquistare recarsi alla pagina del carrello stesso.
            </p>
        </li>
        <li>
            <p>
                Se il cliente non risulta ancora registrato occorre registrarsi.
            </p>
        </li>
        <li>
            <p>
                Effettua il login con Utente e Password inseriti durante la registrazione.
            </p>
        </li>
        <li>
            <p>
                Inserisci le informazioni necessarie per la spedizione e 
                seleziona la modalità di pagamento: E' possibile pagare con carta di credito o PayPal (pagamento anticipato online - per l’Italia).
            </p>
        </li>
        <li>
            <p>
                Infine, leggi il riepilogo del tuo acquisto e clicca su “Acquista”.
            </p>
        </li>
        <li>
            <p>
                Al termine dell’acquisto, riceverai una e-mail contenente i dati identificativi del tuo ordine e la conferma che esso è stato recepito correttamente.
            </p>
        </li>
    </ul>
</div>
@endsection
