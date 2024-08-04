document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('dechetForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var form = event.target;
        var formData = new FormData(form);

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
            document.getElementById('response').innerText = data;
            form.reset();
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
            document.getElementById('response').innerText = 'Erreur : ' + error.message;
        });
    });

    document.getElementById('viewEntries').addEventListener('click', function() {
        fetch('server.php?action=view')
        .then(response => response.json())
        .then(data => {
            let entriesDiv = document.getElementById('entries');
            entriesDiv.innerHTML = '';
            data.forEach(entry => {
                let entryDiv = document.createElement('div');
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
                    let id = this.getAttribute('data-id');
                    if (confirm('Voulez-vous vraiment supprimer cette entrée ?')) {
                        fetch(`server.php?action=delete&id=${id}`)
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById('response').innerText = data;
                            this.parentElement.remove();
                        })
                        .catch(error => {
                            console.error('There was a problem with the fetch operation:', error);
                            document.getElementById('response').innerText = 'Erreur : ' + error.message;
                        });
                    }
                });
            });
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
            document.getElementById('response').innerText = 'Erreur : ' + error.message;
        });
    });
});