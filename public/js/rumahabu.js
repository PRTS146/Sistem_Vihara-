document.addEventListener("DOMContentLoaded", function() {

// Define Data
const blocks = ['A', 'B', 'C', 'D', 'E']; 
let currentBlockIndex = 0;
let currentDinding = '1';
let slotsData = [];

const grid = document.getElementById('slotsContainer');
const prevBtn = document.getElementById('prevBlockBtn');
const nextBtn = document.getElementById('nextBlockBtn');
const headerLabel = document.getElementById('currentBlockLabel');
const sidebarLabel = document.getElementById('sidebarBlockLabel');
const dindingBtns = document.querySelectorAll('.dinding-btn');

const statusColors = {
    'Tersedia':       { bg: '#28a745', text: '#fff' },
    'Telah Diambil':  { bg: '#dc3545', text: '#fff' },
};

function fetchSlots() {
    const blok = blocks[currentBlockIndex];
    fetch(`/api/slots?blok=${blok}&dinding=${currentDinding}`)
        .then(res => res.json())
        .then(data => {
            slotsData = data;
            renderSlots();
        })
        .catch(err => {
            console.error('Failed to fetch slots:', err);
            slotsData = [];
            renderSlots();
        });
}

function renderSlots() {
    grid.innerHTML = '';
    let currentPrefix = blocks[currentBlockIndex];
    
    headerLabel.innerText = `- Blok ${currentPrefix}`;
    sidebarLabel.innerText = `Blok ${currentPrefix}`;

    if (slotsData.length === 0) {
        grid.innerHTML = '<p class="text-muted text-center w-100 py-4">Belum ada slot di blok ini.</p>';
    } else {
        slotsData.forEach(slot => {
            const btn = document.createElement('button');
            btn.type = 'button';
            
            const colors = statusColors[slot.slot_status] || { bg: '#6c757d', text: '#fff' };
            btn.className = 'btn slot-btn rounded-3 fw-bold shadow-sm';
            btn.style.backgroundColor = colors.bg;
            btn.style.color = colors.text;
            btn.style.border = 'none';
            
            btn.innerText = slot.slot_name;

            btn.title = `${slot.slot_name} - ${slot.slot_status}`;
            
            if (slot.slot_status === 'Tersedia') {
                btn.style.cursor = 'pointer';
                btn.classList.add('slot-hover-effect');
                
                btn.addEventListener('click', () => {
                    document.getElementById('selectedSlotName').innerText = `Slot ${slot.slot_name}`;

                    const noWaAdmin = "6281234567890";
                    const pesan = `Halo Admin, saya telah melakukan transfer untuk pemesanan Rumah Abu: *Slot ${slot.slot_name}*. Berikut saya lampirkan bukti pembayarannya. Mohon info kode klaimnya.`;
                    
                    document.getElementById('waAdminBtn').href = `https://wa.me/${noWaAdmin}?text=${encodeURIComponent(pesan)}`;

                    let modalElement = document.getElementById('rumahAbuModal');
                    let modalAbu = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                    modalAbu.show();
                });
            } else {

                btn.style.cursor = 'not-allowed';
                btn.addEventListener('click', () => {
                    alert(`Maaf, slot ${slot.slot_name} saat ini berstatus: ${slot.slot_status}`);
                });
            }

            grid.appendChild(btn);
        });
    }

    prevBtn.disabled = (currentBlockIndex === 0);
    nextBtn.disabled = (currentBlockIndex === blocks.length - 1);
}

prevBtn.addEventListener('click', () => {
    if (currentBlockIndex > 0) {
    currentBlockIndex--;
    fetchSlots();
    }
});

nextBtn.addEventListener('click', () => {
    if (currentBlockIndex < blocks.length - 1) {
    currentBlockIndex++;
    fetchSlots();
    }
});

dindingBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
    dindingBtns.forEach(b => {
        b.classList.remove('active');
        b.classList.remove('bg-success');
        b.classList.remove('border-success');
    });

    e.target.classList.add('active');
    e.target.classList.add('bg-success');
    e.target.classList.add('border-success');

    currentDinding = e.target.getAttribute('data-dinding');
    fetchSlots();
    });
});

fetchSlots();

dindingBtns[0].classList.add('bg-success', 'border-success');
});