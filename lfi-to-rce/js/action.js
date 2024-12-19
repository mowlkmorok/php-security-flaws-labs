
// API Requests
function navigateTo(route, file) {
    fetch(`api.php?route=${route}&file=${file}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById('content').innerHTML = data;
        })
        .catch(error => {
            document.getElementById('content').innerHTML = `<h1>Erro: ${error}</h1>`;
        });
}
