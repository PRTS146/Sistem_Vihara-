document.addEventListener('DOMContentLoaded', function () {
    const step1 = document.getElementById('donationStep1');
    const step2 = document.getElementById('donationStep2');
    const btnContinue = document.getElementById('btnContinue');
    const btnBack = document.getElementById('btnBack');
    const anonCheck = document.getElementById('anonymousCheck');
    const nameInput = document.getElementById('donorName');

    // 1. Handle the "Anonymous" checkbox
    if(anonCheck) {
        anonCheck.addEventListener('change', function() {
          if (this.checked) {
            nameInput.value = ''; // Clear the name
            nameInput.disabled = true; // Lock the input
            nameInput.placeholder = 'Anonim';
          } else {
            nameInput.disabled = false; // Unlock the input
            nameInput.placeholder = 'Masukkan nama Anda';
          }
        });
    }

    // 2. Handle the "Continue" button
    if(btnContinue) {
        btnContinue.addEventListener('click', function() {
          step1.classList.add('d-none'); // Hide form
          step2.classList.remove('d-none'); // Show payment details
        });
    }

    // 3. Handle the "Back" button
    if(btnBack) {
        btnBack.addEventListener('click', function() {
          step2.classList.add('d-none'); // Hide payment details
          step1.classList.remove('d-none'); // Show form again
        });
    }
  });