<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    const DESCPROD = '<p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc, ut consectetuer nisl felis ac diam. Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Phasellus pellentesque. Mauris quam enim, molestie in, rhoncus ut, lobortis a, est. </p><p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc, ut consectetuer nisl felis ac diam. Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Phasellus pellentesque. Mauris quam enim, molestie in, rhoncus ut, lobortis a, est.</p>';

    public function run() {
        DB::table('category')->insert([
                ['catId' => 1, 'name' => 'Auto', 'parId' => 0, 'desc' => 'Automobili', 'image' => 'auto-image.jpg'],
                ['catId' => 2, 'name' => 'Moto', 'parId' => 0, 'desc' => 'Moto', 'image' => 'moto-image.jpg'],
                ['catId' => 3, 'name' => 'Altro', 'parId' => 0, 'desc' => 'Altro', 'image' => 'altro-image.png'],
                ['catId' => 4, 'name' => 'Utilitarie', 'parId' => 1, 'desc' => 'Auto utilitarie', 'image' => null],
                ['catId' => 5, 'name' => 'Sportive', 'parId' => 1, 'desc' => 'Auto sportive', 'image' => null],
                ['catId' => 6, 'name' => 'Berline', 'parId' => 1, 'desc' => 'Auto berline', 'image' => null],
                ['catId' => 7, 'name' => 'Suv', 'parId' => 1, 'desc' => 'Auto suv', 'image' => null],
                ['catId' => 8, 'name' => 'Moto Strada', 'parId' => 2, 'desc' => 'Moto da stada', 'image' => null],
                ['catId' => 9, 'name' => 'Moto Cross', 'parId' => 2, 'desc' => 'Moto da cross', 'image' => null],
                ['catId' => 10, 'name' => 'Motorini', 'parId' => 2, 'desc' => 'Motorini', 'image' => null],
                ['catId' => 11, 'name' => 'Moto Corsa', 'parId' => 2, 'desc' => 'Moto da corsa', 'image' => null],
                ['catId' => 12, 'name' => 'Camper', 'parId' => 3, 'desc' => 'Camper', 'image' => null],
                ['catId' => 13, 'name' => 'Furgoni', 'parId' => 3, 'desc' => 'Furgoni', 'image' => null],
                ['catId' => 14, 'name' => 'Quad', 'parId' => 3, 'desc' => 'Quad', 'image' => null],
        ]);


        DB::table('product')->insert([
                ['name' => 'Fiat 500', 'catId' => 4,
                'descShort' => 'Fiat 500 del 2020', 'descLong' => 'Dimensioni: 3.571 mm lunghezza x 1.627 mm larghezza x 1.488 mm altezza <br> Potenza: da 69 a 70 CV <br> Motore: 1,0 l 3 cilindri in linea, 1,2 l 4 cilindri in linea, 1,2 l 4 cilindri in linea propano Numero di cilindri: 3, 4',
                'price' => 9000, 'discountPerc' => 0, 'discounted' => 0, 'image' => '500.jpg'],
                
                ['name' => 'Moto Suzuki', 'catId' => 11,
                'descShort' => 'Moto Susuki sportiva ', 'descLong' => '4 cilindri, <br> 4 tempi, <br> raffreddamento a liquido',
                'price' => 6000, 'discountPerc' => 15, 'discounted' => 1, 'image' => 'motosuzuki.jpg'],
                
                ['name' => 'Ducato Camper', 'catId' => 12,
                'descShort' => 'Camper della Fiat', 'descLong' => 'Fino a 5,8 l/100 km e 158 g/km di CO2 nel ciclo NEDC. Il merito di questi risultati lo si deve all’ultimo step tecnologico raggiunto dai MultiJet II Euro 5+ in gamma.',
                'price' => 13000, 'discountPerc' => 0, 'discounted' => 0, 'image' => 'camperfiat.jpg'],
                
                ['name' => 'Jeep Suv', 'catId' => 7,
                'descShort' => 'Jeep Suv Fiat 2005', 'descLong' => 'Il suv fiat jeep è stato profondamente rivisto nel 2005, soprattutto nel design del frontale e della coda, oltre ad avere una plancia parzialmente ridisegnata. Novità tecnica di rilievo è il cambio automatico a otto marce, abbinato al 3.0 V6 turbodiesel.',
                'price' => 25000, 'discountPerc' => 12, 'discounted' => 1, 'image' => 'JeepSuvFiat2005.jpg'],
                
                ['name' => 'Mercedes Classe A', 'catId' => 5,
                'descShort' => 'Mercedes Classe A 2012', 'descLong' => 'La nuova Mercedes Classe A è più lunga, bassa e sportiva della precedente: su strada sfodera una buona agilità e il suo 1.8 turbodiesel da 136 CV è piuttosto vivace. Ma il baule è piccolo e di difficile accesso.',
                'price' => 35000, 'discountPerc' => 0, 'discounted' => 0, 'image' => 'mercedes classe a 2012.jpg'],
                
                ['name' => 'Moto BMW', 'catId' => 8,
                'descShort' => 'Moto BMW R 1200 GS 2017', 'descLong' => '<p>La GS 1200 R rappresenta una evoluzione del modello precedente dal quale si differenzia, oltre per la accresciuta cubatura (da 1.130 a 1.170 cm³) e una sostanziale riduzione di peso (203 kg a secco) per numerose migliorie tecniche tra le quali spiccano le parti in magnesio e il contralbero di equilibratura. Numerose le modifiche al motore che portano la potenza oltre i 100 CV. Riviste anche le geometrie delle sospensioni Paralever e Telelever i cui componenti sono in una nuova lega di alluminio più leggero. </p>',
                'price' => 6400, 'discountPerc' => 0, 'discounted' => 0, 'image' => 'motobmw1200.jpg'],
                
                ['name' => 'Quad Yamaha', 'catId' => 14,
                'descShort' => 'Quad Yamaha YFM90R', 'descLong' => '<p>Il quad YFM90R offre un equilibrio perfetto tra la potenza e una serie di caratteristiche che garantiscono ai piloti la massima tranquillità.</p>',
                'price' => 1000, 'discountPerc' => 0, 'discounted' => 0, 'image' => 'quad yamaha.jpg'],
                
                ['name' => 'Fiorino', 'catId' => 13,
                'descShort' => 'Fiorino a metano 2019', 'descLong' => '<p>Compatto, agile e capace di arrivare ovunque, ancor più unico e all’avanguardia: pioniere della propria categoria. Unisce un’anima da veicolo commerciale ad un look elegante da vera auto, con le nuove caratteristiche al top della sua categoria per performance, comfort e funzionalita’, capacita’ di carico e costi di gestione ridotti. Perfetto per la città, agile nel traffico, facile da guidare e parcheggiare, è il veicolo ideale soprattutto per le consegne porta a porta, grazie alla sua versatilità impareggiabile.</p>',
                'price' => 13000, 'discountPerc' => 0, 'discounted' => 0, 'image' => 'fiat fiorino a metano.jpg'],
        
                ['name' => 'Punto', 'catId' => 6,
                'descShort' => 'Fiat punto a metano 2014', 'descLong' => '<p> La Fiat Punto, assieme a qualche ritocco estetico che ha reso la linea più moderna e pulita, ha guadagnato il “novecento” turbo a due cilindri TwinAir: è vivace grazie ai suoi 85 CV, e non esagera nei consumi. Spaziosa e confortevole, l’utilitaria Fiat è a suo agio in città (anche se nei parcheggi in “retro” si soffre della scarsa visibilità posteriore), vanta buone qualità di guida nei percorsi tortuosi e non teme l’autostrada. Il prezzo è interessante, la dotazione discreta.</p>',
                'price' => 7000, 'discountPerc' => 10, 'discounted' => 1, 'image' => 'Fiatpunto.jpg'],

                ['name' => 'BMW Serie F XR', 'catId' => 11,
                'descShort' => 'BMW Serie F XR F 900 XR 2020', 'descLong' => '<p> La nuova crossover tedesca è aggressiva e raffinata come la "sorella maggiore" S 1000 XR, ma molto più facile da guidare e da gestire in ogni situazione, nei lunghi viaggi come nell utilizzo quotidiano. Buona la dotazione di serie, tanti gli optional disponibili. Prezzo corretto</p>',
                'price' => 14000, 'discountPerc' => 5, 'discounted' => 1, 'image' => 'BMWSerieFXRF900XR2020.jpg'],
                
                ['name' => 'Gilera 50', 'catId' => 10,
                'descShort' => 'Gilera Typhoon 50 - 2018', 'descLong' => '<p>Adatto ai giovanissimi, il Typhoon 50, si contraddistingue per le grafiche metropolitane in blu nettuno, grigio titanio e nero lucido. Lo stile aggressivo è espresso anche dal faro sdoppiato con feritoie ai lati. Nella sagoma del veicolo sono ben integrate due pedane per il passeggero che ha anche due comode maniglie laterali. Scattante ed energico come i giovani che lo scelgono anche per i pneumatici di grossa sezione adatti anche ad affrontare percorsi differenti e di fuoristrada. </p>',
                'price' => 1200, 'discountPerc' => 10, 'discounted' => 1, 'image' => 'GileraTyphoon 50-2018.jpg'],
                
            
                        /*da qui iniziano i doppioni e quindi le ripetizioni */  
            
                ['name' => 'Fiat Panda', 'catId' => 4,
                'descShort' => 'Fiat Panda benzina', 'descLong' => '<p>Il look della Fiat Panda è riconoscibile a prima vista. Forse non attirerà proprio tutti gli sguardi, ma la personalità della piccola di Casa Fiat non fatica ad emergere.</p>
                                                                                                    <br>
                                                                                                    <p>La parte anteriore della Fiat Panda si caratterizza per il disegno squadrato dei gruppi ottici e per la presenza di una striscia di luci posta a metà altezza del paraurti. La presa d"aria del radiatore è ben grande ed incorpora anche il porta targa, mentre il logo Fiat è incastonato tra due “baffi”.</p>
                                                                                                    <br>
                                                                                                    <p>La zona laterale della Fiat Panda presenta, quale tratto distintivo, i passaruota squadrati ed imponenti, mentre la linea di cintura è bassa, a tutto vantaggio della finestratura e della luminosità interna. Curioso il terzo finestrino posto nel montante C e di dimensioni ridotte che si discosta dalla linea della vettura.</p>',
                'price' => 7000, 'discountPerc' => 0, 'discounted' => 0, 'image' => 'panda.jpg'],
                
                ['name' => 'Honda Integra 750', 'catId' => 8,
                'descShort' => 'Honda Integra 750 - 2018 ', 'descLong' => '4 <p>Per anni si è cercato un anello di congiunzione tra la moto e lo scooter, e Honda sembra essere stato trovato nel 2018 con la 750 Integra, moto che è servita per poi estendere la tecnologia del motore con cambio DCT a doppia frizione su un panorama più ampio di modelli con impostazioni e cubature differenti. La Casa giapponese classifica ufficialmente questo modello come uno scooter, ma è davvero impegnativo stabilire il confine con la moto tradizionale, poiché le caratteristiche si intrecciano. Dello scooter ci sono la praticità e la protezione aerodinamica, della moto ci sono sostanzialmente telaio, freni e sospensioni. Il motore, un bicilindrico parallelo di 750 cc, con omologazione Euro 4 e 55 CV, è invece un ibrido, in quanto ha una struttura classica, ma è abbinato a una trasmissione evoluta che consente di utilizzarlo in due modalità: completamente automatica, oppure sequenziale. </p>',
                'price' => 7500, 'discountPerc' => 0, 'discounted' => 0, 'image' => 'hondaintegra.jpg'],
                
                ['name' => 'Camper Arca', 'catId' => 12,
                'descShort' => 'ARCA M 720 GLT ', 'descLong' => '<p>Mansardato con letto matrimoniale in mansarda grande zona giorno in stile nautico nella parte anteriore, cucina ad L e bagno con doccia separata nella zona centrale e grandi letti singoli a castello con sottostante gavone a volume variabile nella zona posteriore</p>',
                'price' => 40000, 'discountPerc' => 10, 'discounted' => 1, 'image' => 'camperarca.png'],
                
                ['name' => 'Volkswagen Touareg', 'catId' => 7,
                'descShort' => 'Volkswagen Touareg 2018', 'descLong' => '<p>Design <br>
                                                                                                                                Con il suo design espressivo e le tecnologie avveniristiche, Nuova Touareg si afferma come il nuovo punto di riferimento in cui design e tecnica si fondono alla perfezione per dare vita a un’ammiraglia dal carattere evoluto.</p>

                                                                                                                                <p>Tecnologia <br>
                                                                                                                                 La nuova Touareg è equipaggiata con soluzioni di connettività della nuova era e una futuristica integrazione dei sistemi di assistenza, comfort, illuminazione e infotainment per una esperienza di guida completamente nuova. </p>

                                                                                                                                <p>Performance <br>
                                                                                                                                Con una coppia massima di 900 Nm e accelerazione da 0 a 100 km/h in 4,9 secondi, il motore 4.0 TDI V8 da 421 CV di Nuova Touareg offre elevate prestazioni e massimo piacere di guida.</p>
                                                                                                                                ',
                'price' => 60000, 'discountPerc' => 15, 'discounted' => 1, 'image' => 'tuareg.jpg'],
                
                ['name' => 'Mazda MX-5', 'catId' => 5,
                'descShort' => 'Mazda MX-5 2018', 'descLong' => '<p> Con la  nuova quarta serie, la Mazda MX-5 parte da un foglio bianco. Cambiano le dimensioni (la lunghezza perde10 cm, scendendo a 392: meno di quella della prima MX-5 del 1989) e anche lo stile: abbandonate le linee morbide e un po’ rétro, la due posti giapponese sfoggia forme “mascoline”, con piccoli e minacciosi fari appuntiti. Sparite anche le piccole “citazioni” che si tramandavano di generazione in generazione: gli indicatori di direzione laterali rotondi, la gobba centrale nel cofano e i fanali ovali. Inoltre possiede: sospensioni anteriori a quadrilatero e a bracci multipli al retrotreno oltre a, ovviamente, la trazione posteriore. Completa la ricetta una dieta ferrea: circa 100 i chilogrammi persi, tanto che le versioni d’accesso pesano meno di una tonnellata. Due i motori, entrambi a quattro cilindri e senza sovralimentazione: un 1.5 da 131 CV e un due litri da 160 CV. </p> ',
                'price' => 30000, 'discountPerc' => 0, 'discounted' => 0, 'image' => 'Mazda MX-5.jpg'],
                
                ['name' => 'Moto Honda Cross', 'catId' => 9,
                'descShort' => 'Moto Honda CRF 250 4 tempi', 'descLong' => '<p>Una moto da enduro tuttofare con motore monocilindrico a 4 valvole e 6 marce. Le sospensioni a lunga escursione sono Showa e il serbatoio ha una capacità di 7,8 litri. Interasse di 1.445 mm, distanza da terra 255 mm, altezza della sella 875 mm e freni con ABS a due canali.</p>',
                'price' => 6000, 'discountPerc' => 5, 'discounted' => 1, 'image' => 'hondacrf250.jpg'],
                
                ['name' => 'Quad Honda', 'catId' => 14,
                'descShort' => 'Quad Honda TRX 450 4 tempi', 'descLong' => '<p>La concezione del suo telaio offre un livello di maneggevolezza tutto nuovo.
                                                                                                                                                Le sospensioni con grandissima escursione offrono ammortizzatori interamente regolabili. Poco importa la configurazione del terreno, il vostro Sportrax TRX450R si è già adattato.<br>
                                                                                                                                                I due dischi anteriori di 174 mm a doppio pistoncino unito al disco posteriore di 190 mm
                                                                                                                                                permettono delle frenate potenti e progressive.</p>',
                'price' => 5000, 'discountPerc' => 10, 'discounted' => 1, 'image' => 'hondatrx450.jpg'],
                
                ['name' => 'Volkswagen Crafter', 'catId' => 13,
                'descShort' => 'Volkswagen Crafter 2018 Diesel', 'descLong' => '<p> Volkswagen Crafter Autotelaio è flessibile proprio come richiedono i lavori che devi eseguire. Veicolo per gestione emergenze, con cassone ribaltabile, furgonato isotermico o carroattrezzi: mette in movimento praticamente ogni impresa. <br>
                                                                                                                                                                    Per garantire il perfetto svolgimento di qualsiasi lavoro, è necessaria l’attrezzatura giusta. Questa soluzione include anche un veicolo perfettamente in linea con le tue esigenze. Come Volkswagen Crafter Autotelaio, che può essere trasformato con la massima flessibilità nel veicolo che meglio si addice alla tua attività lavorativa.</p>',
                'price' => 80000, 'discountPerc' => 15, 'discounted' => 1, 'image' => 'crafter.jpg'],
        
                ['name' => 'Nissan Micra', 'catId' => 6,
                'descShort' => 'Nissan Micra 2019 Benzina', 'descLong' => '<p> Il motore turbo benzina ad iniezione diretta DIG-T 117 di MICRA N-SPORT garantisce una guida divertente e dinamica. Sono agili e scattanti ma campioni di consumi ed emissioni, ai vertici della categoria: ben 22 km con un litro! EURO 6.2</p>',
                'price' => 17000, 'discountPerc' => 0, 'discounted' => 0, 'image' => 'nissanmicra.jpg'],

                ['name' => 'Moto Husqvarna Cross', 'catId' => 9,
                'descShort' => 'Husqvarna TC 125 2 tempi 2020', 'descLong' => '<p>Con 40 CV e un peso complessivo di soli 17,2 kg, la TC 125 è al top delle prestazioni nella classe competitiva delle moto da 125 cm³. ... <br> Il caratteristico logo Husqvarna Motorcycles che impreziosisce i coperchi dei carter con finiture in bronzo è un moderno omaggio alle leggendarie 2 tempi del passato. </p>',
                'price' => 9000, 'discountPerc' => 5, 'discounted' => 1, 'image' => 'husqvarnatc125.jpg'],
                
                ['name' => 'Aprilia Scarabeo', 'catId' => 10,
                'descShort' => 'Aprilia Scarabeo 50cc 2 tempi', 'descLong' => '<p>Adatto ai giovanissimi, molto leggero e facile da guidare. Adatto per le grandi città per via dei consumi bassi. Disponibile in diverse colorazioni </p>',
                'price' => 2200, 'discountPerc' => 0, 'discounted' => 0, 'image' => 'scarabeo.jpg'],
            
                    /* prodotti senza immagine ma con immagine di default */
                
            
                ['name' => 'Opel Corsa', 'catId' => 4,
                'descShort' => 'Opel Corsa GPL 2020', 'descLong' => '<p>Giunta alla sua sesta generazione e uscita sul mercato anche in versione GPL, la Opel Corsa è una vettura iconica tra le utilitarie del segmento B. La prima serie è stata presentata al mondo nel lontano 1982 ed ha subito fatto breccia nel cuore degli automobilisti alla ricerca di un’auto scattante, ideale per la guida nel traffico cittadino.</p>',
                'price' => 11000, 'discountPerc' => 10, 'discounted' => 1, 'image' => ''],
                
                ['name' => 'Moto Kawasaki Ninja', 'catId' => 11,
                'descShort' => 'Moto Kawasaki Ninja 400 2020 ', 'descLong' => '<p>La Ninja 400, dotata di bicilindrico da 399 cm3, offre performance di tutto rispetto grazie ad
                                                                                                                                un telaio ancora più leggero. Design di alta qualità, guida facile e poco impegnativa,
                                                                                                                                elevata stabilità e straordinaria maneggevolezza rendono la Ninja 400 una moto
                                                                                                                                estremamente divertente. </p>',
                'price' => 6800, 'discountPerc' => 15, 'discounted' => 1, 'image' => ''],
                
                ['name' => ' Camper Granduca', 'catId' => 12,
                'descShort' => 'Camper RT Granduca 295', 'descLong' => '<p>Il Granduca cambia faccia: il modello centrale di Roller Team è stato og­getto di un profondo restyling che ha riguardato soprattutto la parte interna dell abitacolo, più moderna e accatti­vante. Tra le otto versioni in catalogo figurano anche delle new entry come il Granduca 295, riuscita interpretazione di un tema classico: il mansardato con garage.</p>',
                'price' => 40000, 'discountPerc' =>10 , 'discounted' => 1, 'image' => ''],
                
                ['name' => 'Suv Dacia Duster', 'catId' => 7,
                'descShort' => 'Dacia Duster 2019 Benzina', 'descLong' => '<p>Da quando è stata lanciata sul mercato la Dacia Duster ha subito conquistato una buona fetta di mercato riuscendo a colpire tutti quegli automobilisti che guardano più alla sostanza che alla forma. L arrivo della nuova generazione della Dacia Duster ha rinfrescato l immagine del crossover della casa rumena, grazie a uno stile più in linea con i gusti europei e prezzi decisamente alla portata di molte tasche.</p>',
                'price' => 11000, 'discountPerc' => 0, 'discounted' => 0, 'image' => ''],
                
                ['name' => 'Audi TT', 'catId' => 5,
                'descShort' => 'Audi TT Coupè 2019', 'descLong' => '<p> I segni distintivi – dal tetto arcuato allo spoiler che fuoriesce automaticamente in velocità “rompendo” il profilo della coda – sono quelli di sempre, ma la terza generazione della Audi TT Coupé ha guadagnato linee più taglienti e moderne. Grande personalità anche per l abitacolo – sempre con due strapuntini posteriori che giustificano l omologazione 2+2 – nel quale spiccano il volante sportivo a tre razze e corona schiacciata inferiormente, e l avvincente cruscotto digitale personalizzabile basato su un pannello Tft a colori di 12,3”. Anche in virtù della sua compattezza (418 cm di lunghezza, 183 di larghezza e appena 135 di altezza), la TT è davvero maneggevole; da vera sportiva la tenuta di strada, ma senza troppo sacrificare il comfort. I motori, tutti turbo a iniezione diretta di benzina, sono un 2.0 declinato con tre potenze diverse (197, 324 e 306 CV) e un 5 cilindri 2.5 capace di produrre ben 400, capaci di far raggiungere i 100 km/h partendo da ferma in soli 3,7 secondi alla "corsaiola" RS.</p>',
                'price' => 40000, 'discountPerc' => 5, 'discounted' => 1, 'image' => ''],
                
                ['name' => 'Ducati Multistrada', 'catId' => 8,
                'descShort' => 'Moto Ducati Multistrada 2019', 'descLong' => '<p>La Multistrada 950 è maneggevole e scattante, scende in piega fluida e graduale, grazie anche al cerchio da 19 pollici. Il cambio è valido, ma talvolta poco preciso in scalata, mentre le sospensioni hanno una taratura standard morbida, perfetta per viaggiare ma non per la guida sportiva (sono però completamente regolabili, ci vuole poco per sistemarle). Discorso opposto per i freni, sono molto potenti e vanno dosati con attenzione perché “mordono” forte e subito, mentre potrebbero essere più modulabili. Abbiamo lasciato per ultimo il motore:  potente ma meno impegnativo come quello della sorellona 1260, è il vero “pezzo forte” della Multistrada 950. Sotto i 2.500 giri “strappa” un po’, poi comincia a spingere con vigore, ha un attimo di incertezza verso i 4.500 giri e poi dai 5.000 giri si scatena e allunga.</p>',
                'price' => 14000, 'discountPerc' => 0, 'discounted' => 0, 'image' => ''],
                
                ['name' => 'Quad Kawasaki', 'catId' => 14,
                'descShort' => 'Quad Kawasaki KFX 700', 'descLong' => '<p>Il Kawasaki Quad KFX 700 offre un equilibrio perfetto tra la potenza del suo motore e i consumi non troppo elevati. Anche la manovrabilità e abbsatanza elevata.</p>',
                'price' => 4500, 'discountPerc' => 5, 'discounted' => 1, 'image' => ''],
                
                ['name' => 'Peugeot Boxer', 'catId' => 13,
                'descShort' => 'Furgone Peugeot Boxer 2020', 'descLong' => '<p>Grazie a test rigorosi e completi, PEUGEOT Boxer non ha mai smesso di evolversi per anticipare le esigenze dei professionisti: <br>Meccanismi di apertura ottimizzati per la durata nel tempo<br>Struttura rinforzata, per il comfort acustico e la solidità <br>
                                                                                                                                                            Nuovo design del frontale, per una migliore robustezza e qualità percepita<br>
                                                                                                                                                            Unofferta di servizi rinnovata</p>',
                'price' => 23000, 'discountPerc' => 5, 'discounted' => 1, 'image' => ''],
        
                ['name' => 'Renault Clio', 'catId' => 6,
                'descShort' => 'Renault Clio Zen Diesel', 'descLong' => '<p>Nuova Gamma Renault CLIO. Emissioni CO2: da 94 a 126 g/km. Consumo misto: da 3,6 a 6,1 l/100 km. Emissioni e consumi omologati secondo la normativa comunitaria vigente. Foto non rappresentativa del prodotto. Offerta valida fino ad esaurimento scorte.</p>',
                'price' => 15500, 'discountPerc' => 10, 'discounted' => 1, 'image' => ''],

                ['name' => 'Moto Cross KTM 450', 'catId' => 9,
                'descShort' => 'KTM 450 SX-F 2020', 'descLong' => '<p>La KTM 450 SX-F è una campionessa che sfrutta una formula collaudata ed è diventata un punto di riferimento per il settore. Per il 2020, questa moto continua a offrire prestazioni di livello superiore e grande maneggevolezza. Dispone di una testa del cilindro SOHC estremamente compatta che, unita all efficiente iniezione elettronica, eroga una potenza ineguagliata di 63 CV nel modo più efficace possibile. La KTM 450 SX-F è semplicemente la moto da cross più veloce in pista.</p>',
                'price' => 1100, 'discountPerc' => 0, 'discounted' => 0, 'image' => ''],
                
                ['name' => 'Aprilia SR 50 R', 'catId' => 10,
                'descShort' => 'Aprilia SR 50 R 2019', 'descLong' => '<p>Look sportivo senza compromessi con forti richiami al mondo racing, Aprilia SR 50 R sposa tecnica ed estetica: il suo stile grintoso ispirato alle sorelle maggiori della casa di Noale è sempre catalizzatore di sguardi. <br>
                                                                                                Lo scudo rastremato, il doppio faro anteriore di grande potenza, la presa d aria centrale, il codino aerodinamico con il faro posteriore con le frecce integrate, tutti elementi che sottolineano il family feeling delle sportive di Noale. Le nuove colorazioni, Racing Black, Fluo Red e Racing White sono aggressive, vivaci, giusto tocco di stile per uno scooter unico.</p>',
                'price' => 3400, 'discountPerc' => 10, 'discounted' => 1, 'image' => '']
            
            ]);

        DB::table('users')->insert([
                ['nome' => 'user', 'cognome' => 'user',
                'email' => 'useruser@gmail.com', 'username' => 'useruser', 'password' => Hash::make('dxXd4D02'),
                'role' => 'utente', 'residenza' => 'Ancona', 'created_at' => null, 'updated_at' => null,
                'data' => '1998-01-01', 'occupazione' => '0'],
                ['nome' => 'staff', 'cognome' => 'staff',
                'email' => null , 'username' => 'staffstaff', 'password' => Hash::make('dxXd4D02'),
                'role' => 'staff', 'residenza' => null , 'created_at' => null , 'updated_at' => null,
                'data' => null, 'occupazione' => null],
                ['nome' => 'admin', 'cognome' => 'admin',
                'email' => null, 'username' => 'adminadmin', 'password' => Hash::make('dxXd4D02'),
                'role' => 'admin', 'residenza' => null, 'created_at' => null, 'updated_at' => null,
                'data' => null, 'occupazione' => null]
        ]);
    }

}
