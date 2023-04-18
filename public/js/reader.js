options = {
  qrbox: {
      width: 250,
      height: 250,
  },
  fps: 20,
}

const scanner = new Html5QrcodeScanner('reader', options);
scanner.render(success, error);

function success(result) {
  var res = document.getElementById('result');
  var box = document.getElementById("box");

  res.classList.add("found");
  res.innerHTML = `      
   <h2>Success!</h2>
   <p id="scanned">Retrieving details...</p>`

  var selectedBoxOption = box.options[box.selectedIndex].value;
  scanner.pause(true);

  location.href = location.origin + '/staff?scan=' + result + '&box=' + selectedBoxOption;
}

function error(err) {
  console.error(err);
}