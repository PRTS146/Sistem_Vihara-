document.addEventListener('DOMContentLoaded', function () {
  if (localStorage.getItem('dyslexia') === 'on')   document.body.classList.add('dyslexia-mode');
  if (localStorage.getItem('colorblind') === 'on') document.body.classList.add('colorblind-mode');
  if (localStorage.getItem('largetext') === 'on')  document.body.classList.add('large-text-mode');
  updateA11y();
});

function toggleDyslexia() {
  document.body.classList.toggle('dyslexia-mode');
  localStorage.setItem('dyslexia', document.body.classList.contains('dyslexia-mode') ? 'on' : 'off');
  updateA11y();
}

function toggleColorblind() {
  document.body.classList.toggle('colorblind-mode');
  localStorage.setItem('colorblind', document.body.classList.contains('colorblind-mode') ? 'on' : 'off');
  updateA11y();
}

function toggleLargeText() {
  document.body.classList.toggle('large-text-mode');
  localStorage.setItem('largetext', document.body.classList.contains('large-text-mode') ? 'on' : 'off');
  updateA11y();
}

function updateA11y() {
  document.getElementById('btn-dyslexia').classList.toggle('active', document.body.classList.contains('dyslexia-mode'));
  document.getElementById('btn-colorblind').classList.toggle('active', document.body.classList.contains('colorblind-mode'));
  document.getElementById('btn-largetext').classList.toggle('active', document.body.classList.contains('large-text-mode'));
}