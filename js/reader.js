let scanResult = ""


 const scanner = new Html5QrcodeScanner('reader', {
    qrbox: {
    width: 250,
    height: 250,
    },
    fps: 20,
    });
    scanner.render(success, error);
    function success(result) {
      scanResult = result.toString()
      document.getElementById('result').innerHTML = `      
      <h2>Success!</h2>
      <p id="scanned">${result}</p>
      ;`
      window.location.href = window.location.href + `?result=${scanResult}`
      scanner.clear();
      document.getElementById('reader').remove();
      }
    function error(err) {
    console.error(err);
    }