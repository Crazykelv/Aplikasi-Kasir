document.getElementById('ham-menu').addEventListener('click', () => {
    document.getElementById('ham-nav').classList.toggle('hidden');
});

document.getElementById('img-container').addEventListener('mouseover', function() {
    document.getElementById('hover-image').classList.remove('hidden');
});

document.getElementById('img-container').addEventListener('mouseout', function() {
    document.getElementById('hover-image').classList.add('hidden');
});

document.getElementById('cancelBtn').addEventListener('click', () => {
    document.getElementById('paymentBtn').classList.add('hidden');
    document.getElementById('historyBtn').classList.remove('hidden');
});

document.getElementById('goPayment').addEventListener('click', () => {
    document.getElementById('paymentBtn').classList.remove('hidden');
    document.getElementById('historyBtn').classList.add('hidden');
});

document.getElementById('katalogBtn').addEventListener('click', () => {
    document.getElementById('rightRow').classList.toggle('hidden');
    document.getElementById('cancelBtn').classList.toggle('hidden');
    document.getElementById('goPayment').classList.toggle('hidden');
});