import './bootstrap';
import './employees';
import './pizzas';

// Recupero l'elemento form
const pizzaForm = document.getElementById('pizzaForm');

// Creo una variabile di riferimento all'input file
const pizzaImageInput = document.getElementById('pizza-image');

// Creo un listener per l'evento "submit" del form
pizzaForm.addEventListener('submit', event => {
    event.preventDefault(); // Evito il submit reale (solo come esempio)

    // Creo un oggetto FormData
    const formData = new FormData(pizzaForm);

    // Verifico se l'utente ha selezionato un'immagine
    if (!pizzaImageInput.files.length) {
        alert('Per favore seleziona un file!');
        return;
    }

    // A questo punto avresti una POST verso il tuo endpoint Laravel
    // fetch('/admin/pizzas', { ... })
    // Oppure, se preferisci, rimuovi event.preventDefault() e lascia
    // che il form venga inviato normalmente con la rotta corretta

    console.log('Invio i dati al server...', formData);
});
