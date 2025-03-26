document.addEventListener('DOMContentLoaded', function () {
    var dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    var dropdownMenus = document.querySelectorAll('.dropdown-menu');

    // Close all dropdown menus initially
    dropdownMenus.forEach(function (menu) {
        menu.style.display = 'none';
    });

    document.addEventListener('click', function (event) {
        dropdownToggles.forEach(function (toggle) {
            var menu = toggle.nextElementSibling;
            if (!toggle.contains(event.target)) {
                menu.style.display = 'none';
            } else {
                menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
            }
        });
    });
});
