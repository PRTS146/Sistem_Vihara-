document.addEventListener('DOMContentLoaded', function () {
    const donateModal = document.getElementById('donateModal');

    if (donateModal) {
        donateModal.addEventListener('show.bs.modal', function (event) {
            const triggerElement = event.relatedTarget;
            
            const campaignName = triggerElement.getAttribute('data-campaign') || 'Dana Public Vihara';
            
            const purposeText = document.getElementById('donationPurpose');
            if (purposeText) {
                purposeText.textContent = campaignName;
            }
        });
    }
});

function showManualInfo() {
    const dot = document.getElementById('notifDot');
    if (dot) {
        dot.style.display = 'none';
    }

    if (typeof Swal !== 'undefined') {
        Swal.fire({
            icon: 'info',
            title: 'Proses Pengecekan Manual',
            html: 'Setelah Anda melakukan transfer atau scan QRIS, admin kami akan <b>mengecek mutasi rekening Vihara</b> secara berkala.<br><br>Tidak perlu melakukan konfirmasi ulang secara manual. Dana yang masuk akan otomatis dicatat ke dalam sistem oleh admin. Terima kasih atas kebaikan Anda! 🙏',
            confirmButtonText: 'Mengerti',
            confirmButtonColor: '#3e3e3e'
        });
    } else {
        alert('Setelah transfer, admin akan mengecek mutasi secara manual. Tidak perlu konfirmasi ulang. Terima kasih!');
    }
}