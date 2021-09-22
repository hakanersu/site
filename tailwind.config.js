module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: 'class', // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                mavi: {
                    500: 'rgb(100, 186, 255)'
                },
                siyah: {
                    900: 'rgb(26, 26, 26)',
                    800: 'rgb(51, 51, 51)'
                },
                beyaz: {
                    300: 'rgb(212, 212, 212)'
                }
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
    ],
}
