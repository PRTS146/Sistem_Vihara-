document.addEventListener("DOMContentLoaded", function() {

// Define Data
const blocks = ['A', 'B', 'C', 'D', 'E']; 
let currentBlockIndex = 0; // Starts at 'A'
let currentDinding = 1;    // Starts at 'Dinding 1'

// Get DOM Elements
const grid = document.getElementById('slotsContainer');
const prevBtn = document.getElementById('prevBlockBtn');
const nextBtn = document.getElementById('nextBlockBtn');
const headerLabel = document.getElementById('currentBlockLabel');
const sidebarLabel = document.getElementById('sidebarBlockLabel');
const dindingBtns = document.querySelectorAll('.dinding-btn');

// Function to build the grid
function renderSlots() {
    grid.innerHTML = '';
    let currentPrefix = blocks[currentBlockIndex];
    
    // Update Text Labels
    headerLabel.innerText = `- Blok ${currentPrefix}`;
    sidebarLabel.innerText = `Blok ${currentPrefix}`;

    // Generate 64 buttons (8x8 Grid)
    for (let i = 1; i <= 64; i++) {
    const btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'btn slot-btn rounded-3 fw-bold text-dark shadow-sm'; 
    
    // Format: {Block}{Number}.{Dinding} -> e.g., A1.1, B23.2
    btn.innerText = `${currentPrefix}${i}.${currentDinding}`; 
    
    grid.appendChild(btn);
    }

    // Toggle Previous/Next Button States
    prevBtn.disabled = (currentBlockIndex === 0);
    nextBtn.disabled = (currentBlockIndex === blocks.length - 1);
}

// --- Event Listeners for BLOCK Navigation ---
prevBtn.addEventListener('click', () => {
    if (currentBlockIndex > 0) {
    currentBlockIndex--;
    renderSlots();
    }
});

nextBtn.addEventListener('click', () => {
    if (currentBlockIndex < blocks.length - 1) {
    currentBlockIndex++;
    renderSlots();
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
    e.target.classList.add('bg-success'); // Custom green active state
    e.target.classList.add('border-success');

    // Update state and re-render grid
    currentDinding = e.target.getAttribute('data-dinding');
    renderSlots();
    });
});

// Load initial state
renderSlots();

// Ensure the first button starts with the custom green active state
dindingBtns[0].classList.add('bg-success', 'border-success');
});

