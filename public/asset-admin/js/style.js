var dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(function(dropdown) {
    dropdown.addEventListener('click', function(event) {
        event.stopPropagation();
    });
});
