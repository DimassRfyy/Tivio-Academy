document.addEventListener('DOMContentLoaded', function() {
    const dropdownOpener = document.getElementById('dropdown-opener');
    const dropdown = document.getElementById('dropdown');

    dropdownOpener.addEventListener('click', function(event) {
        dropdown.classList.toggle('hidden');
        event.stopPropagation();
    });

    document.addEventListener('click', function(event) {
        if (!dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
});