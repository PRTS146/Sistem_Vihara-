document.addEventListener("DOMContentLoaded", function() {

// Define Data
const blocks = ['A', 'B', 'C', 'D', 'E']; 
let currentBlockIndex = 0; // Starts at 'A'
let currentDinding = '1';  // Starts at 'Dinding 1'
let slotsData = [];        // Will be populated from API

// Get DOM Elements
const grid = document.getElementById('slotsContainer');
const prevBtn = document.getElementById('prevBlockBtn');
const nextBtn = document.getElementById('nextBlockBtn');
const headerLabel = document.getElementById('currentBlockLabel');
const sidebarLabel = document.getElementById('sidebarBlockLabel');
const dindingBtns = document.querySelectorAll('.dinding-btn');

// Status-to-color mapping
const statusColors = {
    'Tersedia':       { bg: '#28a745', text: '#fff' },       // green
    'Booking':        { bg: '#ffc107', text: '#333' },       // yellow
    'Telah Diambil':  { bg: '#dc3545', text: '#fff' },       // red
};

// Fetch slots from internal API
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

// Function to build the grid
function renderSlots() {
    grid.innerHTML = '';
    let currentPrefix = blocks[currentBlockIndex];
    
    // Update Text Labels
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
            btn.title = `${slot.slot_name} - ${slot.slot_status} (${slot.slot_level})`;
            
            grid.appendChild(btn);
        });
    }

    // Toggle Previous/Next Button States
    prevBtn.disabled = (currentBlockIndex === 0);
    nextBtn.disabled = (currentBlockIndex === blocks.length - 1);
}

// --- Event Listeners for BLOCK Navigation ---
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

// --- Event Listeners for DINDING (Sidebar) Selection ---
dindingBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
    // Remove 'active' class from all buttons
    dindingBtns.forEach(b => {
        b.classList.remove('active');
        b.classList.remove('bg-success');
        b.classList.remove('border-success');
    });
    
    // Add 'active' class to clicked button
    e.target.classList.add('active');
    e.target.classList.add('bg-success');
    e.target.classList.add('border-success');

    // Update state and fetch new data
    currentDinding = e.target.getAttribute('data-dinding');
    fetchSlots();
    });
});

// Load initial state from API
fetchSlots();

// Ensure the first button starts with the custom green active state
dindingBtns[0].classList.add('bg-success', 'border-success');
});
