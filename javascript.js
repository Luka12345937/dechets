document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('dechetForm');
    const viewEntriesButton = document.getElementById('viewEntries');
    const entriesDiv = document.getElementById('entries');
    const responseDiv = document.getElementById('response');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(form);

        fetch('server.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.text();
        })
        .then(data => {
            responseDiv.innerText = data;
            form.reset();
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
            responseDiv.innerText = 'Erreur : ' + error.message;
        });
    });

    viewEntriesButton.addEventListener('click', function() {
        fetch('server.php?action=view')
        .then(response => response.json())
        .then(data => {
            entriesDiv.innerHTML = '';
            data.forEach(entry => {
                const entryDiv = document.createElement('div');
                entryDiv.classList.add('entry');
                entryDiv.innerHTML = `
                    <p>Type de Déchet: ${entry.type_dechet}</p>
                    <p>Quantité: ${entry.quantite}</p>
                    <p>Date de Collecte: ${entry.date_collecte}</p>
                    <button class="deleteEntry" data-id="${entry.id}">Supprimer</button>
                `;
                entriesDiv.appendChild(entryDiv);
            });

            document.querySelectorAll('.deleteEntry').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    if (confirm('Voulez-vous vraiment supprimer cette entrée ?')) {
                        fetch(`server.php?action=delete&id=${id}`)
                        .then(response => response.text())
                        .then(data => {
                            responseDiv.innerText = data;
                            this.parentElement.remove();
                        })
                        .catch(error => {
                            console.error('There was a problem with the fetch operation:', error);
                            responseDiv.innerText = 'Erreur : ' + error.message;
                        });
                    }
                });
            });
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
            responseDiv.innerText = 'Erreur : ' + error.message;
        });
    });
});