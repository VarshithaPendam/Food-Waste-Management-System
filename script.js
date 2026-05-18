document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('donorTable');

    table.addEventListener('click', function (event) {
        const target = event.target;

        if (target.tagName === 'BUTTON') {
            const row = target.parentElement.parentElement;
            
            if (target.textContent === 'Accept') {
                row.classList.add('hidden-row');
                target.textContent = 'Reset';
                target.classList.remove('reset');
            } else if (target.textContent === 'Reset') {
                row.classList.remove('hidden-row');
                target.textContent = 'Accept';
                target.classList.add('reset');
            }
        }
    });
});
