document.addEventListener('DOMContentLoaded', function () {
    const themeToggle = document.querySelector('.theme-controller');
    const sidebar = document.getElementById('sidebar');

    // Check stored theme preference
    const storedTheme = localStorage.getItem('theme');
    if (storedTheme) {
        document.documentElement.setAttribute('data-theme', storedTheme);
        themeToggle.checked = storedTheme === 'dark';
        // Apply the theme to the sidebar
        applyTheme(storedTheme);
    }

    // Listen for the toggle change event
    themeToggle.addEventListener('change', function () {
        const theme = themeToggle.checked ? 'dark' : 'cupcake';
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        // Apply the theme to the sidebar
        applyTheme(theme);
    });

    function applyTheme(theme) {
        if (theme === 'dark') {
            sidebar.classList.add('bg-[#191919', 'shadow-2xl');
            sidebar.classList.remove('bg-[#FFF7F1]');
        } else {
            sidebar.classList.add('bg-[#FFF7F1]');
            sidebar.classList.remove('bg-[#191919', 'shadow-2xl');
        }
    }
});

