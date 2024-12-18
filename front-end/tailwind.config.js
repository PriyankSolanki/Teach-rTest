/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/**/*.{js,ts,jsx,tsx,mdx}",
    "./pages/**/*.{js,ts,jsx,tsx,mdx}",
    "./components/**/*.{js,ts,jsx,tsx,mdx}",
 
    // Or if using `src` directory:
    "./src/**/*.{js,ts,jsx,tsx,mdx}",
  ],
  theme: {
    extend: {  
      fontFamily: {
      sans: ['Nunito', 'Helvetica Neue', 'Helvetica', 'Arial', 'sans-serif'],
    },
    colors: {
      primary: "#219cff", 
      secondary : "#ff724f"
    },
  },
  },
  plugins: [],
}

