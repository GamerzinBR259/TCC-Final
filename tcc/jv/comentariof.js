document.addEventListener('DOMContentLoaded', function () {
    var dataCampo = document.getElementById('data_publicacao');
    var dataAtual = new Date();
    var dataFormatada = dataAtual.toISOString().slice(0, 19).replace('T', ' '); // Formate a data como 'AAAA-MM-DD HH:mm:ss'

    dataCampo.value = dataFormatada;
});

