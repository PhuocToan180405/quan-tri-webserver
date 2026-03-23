/**
 * Tailwind CSS CDN — Unified Configuration
 *
 * Merges color palettes from all layouts:
 *   - app.blade.php : primary
 *   - admin.blade.php: brand (red), sidebar (admin-specific)
 *   - client.blade.php: brand (indigo), accent (emerald), sidebar (client-specific)
 *
 * Because all three layouts share the same CDN instance, we include
 * every palette here so any layout can use any token.
 */
tailwind.config = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
            },
            colors: {
                /* Auth / public pages (app layout) */
                primary: {
                    50:  '#eef2ff',
                    100: '#e0e7ff',
                    200: '#c7d2fe',
                    300: '#a5b4fc',
                    400: '#818cf8',
                    500: '#6366f1',
                    600: '#4f46e5',
                    700: '#4338ca',
                    800: '#3730a3',
                    900: '#312e81',
                },
                /* Admin branding (red) */
                brand: {
                    50:  '#fef2f2',
                    100: '#fee2e2',
                    200: '#fecaca',
                    300: '#fca5a5',
                    400: '#f87171',
                    500: '#ef4444',
                    600: '#dc2626',
                    700: '#b91c1c',
                    800: '#991b1b',
                    900: '#7f1d1d',
                },
                /* Client accent (emerald) */
                accent: {
                    50:  '#ecfdf5',
                    100: '#d1fae5',
                    200: '#a7f3d0',
                    300: '#6ee7b7',
                    400: '#34d399',
                    500: '#10b981',
                    600: '#059669',
                    700: '#047857',
                    800: '#065f46',
                    900: '#064e3b',
                },
                /* Sidebar tokens */
                sidebar: {
                    DEFAULT: '#0f172a',
                    hover:   '#1e293b',
                    active:  '#1e3a5f',
                    border:  '#1e293b',
                    text:    '#94a3b8',
                    heading: '#64748b',
                },
                /* Dark palette (shared) */
                dark: {
                    50:  '#f8fafc',
                    100: '#f1f5f9',
                    200: '#e2e8f0',
                    300: '#cbd5e1',
                    400: '#94a3b8',
                    500: '#64748b',
                    600: '#475569',
                    700: '#334155',
                    800: '#1e293b',
                    900: '#0f172a',
                    950: '#020617',
                },
            },
        },
    },
};
