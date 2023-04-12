
 const scanner = new Html5QrcodeScanner('reader', {
    qrbox: {
    width: 250,
    height: 250,
    },
    fps: 20,
    });//creates reader and its size and how many times it checks for barcode
    scanner.render(success, error);//upon searching for barcodes if one found calls passed success funciton if no terror function
    function success(result) {
      //success function has some kind of result object passe din we cant quite figure out 
      document.getElementById('result').innerHTML = `      
      <h2>Success!</h2>
      <p id="scanned">${result}</p>
      ;`//replaces html of reader with the success and the barcode number that wokrs here for some reason
      scanner.clear();
      document.getElementById('reader').remove();//clear and remove scanner part of html so just success html
      }
    function error(err) {
    console.error(err);//error function if barcode not deteceted
    }