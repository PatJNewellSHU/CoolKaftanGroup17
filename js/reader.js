
 const scanner = new Html5QrcodeScanner('reader', {
    qrbox: {
    width: 250,
    height: 250,
    },
    fps: 20,
    });
    scanner.render(success, error);
    function success(decodedText, decodedResult) {
      window.location.href = window.location.href + "?result=" + Html5QrcodeScanner.decodedText + "&result2=" + decodedText;
      Html5QrcodeScanner.decodedText
    }

    //;
    //scanner.clear();
    //document.getElementById('reader').remove();
    //}
    function error(err) {
    console.error(err);
    }