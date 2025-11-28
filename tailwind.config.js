/** @type {import('tailwindcss').Config} */
export default {
  
  // ESTA É A PARTE MAIS IMPORTANTE
  content: [
    // Diz ao Tailwind para "assistir" a todos os ficheiros Blade
    "./resources/**/*.blade.php", 
    // Também assiste aos ficheiros de JavaScript
    "./resources/**/*.js",
  ],
  // FIM DA PARTE IMPORTANTE

  theme: {
    extend: {},
  },
  plugins: [],
}