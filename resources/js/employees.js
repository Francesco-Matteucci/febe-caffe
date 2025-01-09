document.addEventListener("DOMContentLoaded", function () {
    const deleteModal = document.getElementById('deleteModal');
    if (deleteModal) {
        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Bottone che ha aperto la modale
            const employeeId = button.getAttribute('data-id'); // ID del dipendente
            const deleteForm = document.getElementById('deleteForm');
            const action = `${window.location.origin}/admin/employees/${employeeId}`;
            deleteForm.setAttribute('action', action);
        });
    }
});
