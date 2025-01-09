document.addEventListener("DOMContentLoaded", function () {
    const deleteModal = document.getElementById('deleteModal');
    if (deleteModal) {
        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Bottone che ha aperto la modale
            const pizzaId = button.getAttribute('data-id'); // ID della pizza
            const deleteForm = document.getElementById('deleteForm');
            const action = `${window.location.origin}/admin/pizzas/${pizzaId}`;
            deleteForm.setAttribute('action', action);
        });
    }
});
