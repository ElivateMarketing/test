import preset from './vendor/filament/support/tailwind.config.preset'
import typography from '@tailwindcss/typography';
import forms from '@tailwindcss/forms';
import aspectRatio from '@tailwindcss/aspect-ratio';

/** @type {import('tailwindcss').Config} */
export default {
  presets: [preset],
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    './app/Filament/**/*.php',
    './resources/views/filament/**/*.blade.php',
    './vendor/filament/**/*.blade.php',
    "./vendor/filament/**/*.php", // Filament PHP files
    "./app/Filament/**/*.php", // Custom Filament components
  ],

  theme: {
    extend: {},
  },
  plugins: [
    typography,
    forms,
    aspectRatio,
  ],
}