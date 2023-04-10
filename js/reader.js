
 const scanner = new Html5QrcodeScanner('reader', {
    qrbox: {
    width: 250,
    height: 250,
    },
    fps: 20,
    });
    scanner.render(success, error);
    function success(decodedText, decodedResult) {

    document.getElementById('result').innerHTML = `
    <h2>Success!</h2>
    <p>${decodedText}</p>
    `;
    window.location.href = window.location.href + `?result=${JSON.stringify(decodedText)}`
    scanner.clear();
    document.getElementById('reader').remove();
    }
    function error(err) {
    console.error(err);
    }