const buttons = document.querySelectorAll('.btn'); 

buttons.forEach((btn) => {
  btn.addEventListener('click', () => {
        const originalContent = btn.innerHTML;
        const originalWidth = btn.offsetWidth;
        btn.innerHTML = '<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>';
        btn.style.width = `${originalWidth}px`;

        setTimeout(() => {
            btn.innerHTML = originalContent;
            btn.style.width = '';
          }, 3000);   
    });
});

const toast = document.getElementById('messageToast');
if(toast)
{
    const toastBootstrap = window.bootstrap.Toast.getOrCreateInstance(toast);
    toastBootstrap.show();
}