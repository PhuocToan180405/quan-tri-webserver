/**
 * Main JavaScript — Global Functions
 * Shared across all layouts (app, admin, client)
 */

document.addEventListener('DOMContentLoaded', function () {

    /* ------------------------------------------------------------------ */
    /*  Toggle Sidebar (mobile)                                           */
    /* ------------------------------------------------------------------ */
    window.toggleSidebar = function () {
        var sidebar = document.getElementById('sidebar');
        var overlay = document.getElementById('sidebar-overlay');
        if (sidebar) sidebar.classList.toggle('-translate-x-full');
        if (overlay) overlay.classList.toggle('hidden');
    };

    /* ------------------------------------------------------------------ */
    /*  Toggle User Dropdown                                              */
    /* ------------------------------------------------------------------ */
    window.toggleDropdown = function () {
        var dropdown = document.getElementById('user-dropdown');
        if (dropdown) dropdown.classList.toggle('hidden');
    };

    /* ------------------------------------------------------------------ */
    /*  Close dropdown on outside click                                   */
    /* ------------------------------------------------------------------ */
    document.addEventListener('click', function (e) {
        var btn      = document.getElementById('user-menu-btn');
        var dropdown = document.getElementById('user-dropdown');
        if (btn && dropdown && !btn.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });

    /* ------------------------------------------------------------------ */
    /*  Auto-hide flash messages after 5 seconds                          */
    /* ------------------------------------------------------------------ */
    setTimeout(function () {
        ['flash-success', 'flash-error', 'flash-validation'].forEach(function (id) {
            var el = document.getElementById(id);
            if (el) {
                el.style.transition = 'opacity 0.5s';
                el.style.opacity    = '0';
                setTimeout(function () { el.remove(); }, 500);
            }
        });
    }, 5000);

});
