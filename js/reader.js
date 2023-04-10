
 const scanner = new Html5QrcodeScanner('reader', {
    qrbox: {
    width: 250,
    height: 250,
    },
    fps: 20,
    });
    scanner.render(success, error);
    function success(decodedText, decodedResult) {
      window.location.href = window.location.href + "?" + decodedResult + "&" + decodedText;
    }

    //;
    //scanner.clear();
    //document.getElementById('reader').remove();
    //}
    function error(err) {
    console.error(err);
    }