const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                roboto:['Roboto'],
                gill:['gill-sans-mt'],

            },
            colors:{
                'azul-primario':'#18529D',
                'azul-secundario':'#007BFF',
                'azul-terciario':'#0D47A1',
                'color-icon':'#2196F3',
                'verde-primario':'#28AD56',
                'negro-primario':'#000000',
                'blanco-primario':'#FFFFFF',
                'background2':'#ECEFF1',
                'background-sidebar':'#EDF0F5',
                'color-sidebar-opciones':'#979DAA',
                'rojo-primario':'#F9614D',
                'rojo-secundario':'#F44336',
                'azul-royal':'#00296b',
                'azul-royal-hover':'#18458C',
            }
        },
    },

    container:{
        center:true,
    },

    plugins: [require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('flowbite/plugin'),
    ],
};
