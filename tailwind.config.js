const defaultTheme = require('tailwindcss/defaultTheme');

const mainmenuH = parseInt(defaultTheme.spacing['28']);
const submenuH = parseInt(defaultTheme.spacing['20']);
const headerH = mainmenuH + submenuH;
const footerH = parseInt(defaultTheme.spacing['16']);
module.exports = {
  content: [
    "./dist/**/*.{html,php,json,js}",
  ],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        md: '0'
      }
    },
    extend: {
      spacing: {
        'mainmenu': `${mainmenuH}rem`,
        'submenu': `${submenuH}rem`,
        'footer': `${footerH}rem`,
        'header': `${headerH}rem`,
      },
      minHeight: {
        'main': `calc(100vh - ${mainmenuH}rem - ${submenuH}rem) - ${footerH}rem`,
        'header': `${headerH}rem`,
        'mainMenu': `${mainmenuH}rem`,
      },
      screens: {
        'xl': '1280px',
        '2xl': '1280px',
      },
      fontFamily: {
        'f-sans': ['var(--body-ff)', 'sans-serif'],
        'f-condensed': ['var(--condensed-ff)', 'sans-serif'],
        'f-head': ['var(--body-ff)', 'sans-serif'],
        'sans': ['var(--condensed-ff)', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        'fg-green': { DEFAULT: 'rgb(201, 214, 71)'},
        'fg-beige': { DEFAULT: 'rgb(253, 246, 221)'},
        'fg-orange': { DEFAULT: 'rgb(255, 140, 43)'},
        'fg-salmon': { DEFAULT: 'rgb(255, 180, 120)'},
        'fg-brown': { DEFAULT: 'rgb(95, 73, 38)'},
        'fg-eggplant': { DEFAULT: 'rgb(130, 73, 121)'},
        'fg-tile': { DEFAULT: 'rgb(174, 72, 72)'},
        'fg-red': { DEFAULT: 'var(--f-red)'},
        'fg-yellow': { DEFAULT: 'var(--f-yellow)'},
        'fg-blue': { DEFAULT: 'rgba(47, 110, 182, 1)'},
        'fg-blue-dark': { DEFAULT: 'rgba(77, 95, 163, 1)'},
        'fg-blue-light': { DEFAULT: 'rgba(192, 210, 253, 1)'},
        'brand-red': {
          DEFAULT: 'var(--brand-red)',
          'a': 'var(--brand-red-a)',
          '50': 'var(--bran-red-50)'
        },
        Footer: {
          DEFAULT: 'var(--FooterBg)',
          Bg: 'var(--FooterBg)',
          Cl: 'var(--FooterCl)',
          BtnBg: 'var(--FooterBtnBg)',
          BtnCl: 'var(--FooterBtnCl)',
        },
        QuickBuy: {
          DEFAULT: 'var(--QuickBuy-bg)',
          bg: 'var(--QuickBuy-bg)',
          cl: 'var(--QuickBuy-cl)',
          'bg-from': 'var(--QuickBuy-bg-from)',
          'bg-to': 'var(--QuickBuy-bg-to)',
          BuyBg: 'var(--QuickBuy-buy-bg)',
          BuyCl: 'var(--QuickBuy-buy-cl)',
          light: 'var(--QuickBuy-light)',
          dark: 'var(--QuickBuy-dark)',
        },
        Event: {
          DEFAULT: 'var(--EventBg)',
          bg: 'var(--EventBg)',
          cl: 'var(--EventCl)',
          dark: 'var(--EventDark)',
          light: 'var(--EventLight)',
        },
        brand: {
          DEFAULT: 'var(--brand-bg)',
          dark: 'var(--brand-dark)',
          light: 'var(--brand-light)',
          light2: 'var(--brand-light-2)',
          cl: 'var(--brand-cl)',
        },
        mainmenu: {
          '50': 'var(--mainmenu-bg-to)',
          DEFAULT: 'var(--mainmenu-bg)',
        },
        submenu: {
          bg: 'var(--submenuBg)',
          cl: 'var(--submenuCL)',
          HoBg: 'var(--submenuHoBg)',
          HoCl: 'var(--submenuHoCl)',
          red: 'var(--submenuRed)',
        },
        body: {
          cl: 'var(--body-cl)',
          bg: 'var(--body-bg)',
          DEFAULT: 'var(--body-bg)',
        },
        BuyTicket: {
          bg: 'var(--BuyTicket-bg)',
          cl: 'var(--BuyTicket-cl)',
        },
        buy: {
          DEFAULT: 'var(--buy-50)',
          '50': 'var(--buy-50)',
          '900': 'var(--buy-900)',
        },
        primary: {
          '50': 'var(--color-primary-superlight)',
          '100': 'var(--color-primary-light)',
          DEFAULT: 'var(--color-primary)',
          '900': 'var(--color-primary-dark)',
        },
        'primary-ho': {
          '50': 'var(--color-ho-primary-superlight)',
          '100': 'var(--color-ho-primary-light)',
          DEFAULT: 'var(--color-ho-primary)',
          '900': 'var(--color-ho-primary-dark)',
        },
        mm: {
          50: 'var(--mm-50)',
          DEFAULT: 'var(--mm-900)',
          900: 'var(--mm-900)',
        },
        'mm-ho': {
          50: 'var(--mm-ho-50)',
          DEFAULT: 'var(--mm-ho-900)',
          900: 'var(--mm-ho-900)',
        },
        'mm-so': {
          50: 'var(--mm-so-50)',
          DEFAULT: 'var(--mm-so-900)',
          900: 'var(--mm-so-900)',
        },
        'mm-so-ho': {
          50: 'var(--mm-so-ho-50)',
          DEFAULT: 'var(--mm-so-ho-900)',
          900: 'var(--mm-so-ho-900)',
        },
        sbm: {
          50: 'var(--sm-50)',
          DEFAULT: 'var(--sm-900)',
          900: 'var(--sm-900)',
        },
        'sbm-ho': {
          50: 'var(--sm-ho-50)',
          DEFAULT: 'var(--sm-ho-900)',
          900: 'var(--sm-ho-900)',
        },
      },
      backgroundImage: {
        'home': "url('/assets/img/bg-00-home_1920.jpg')",
        'home-sm': "url('/assets/img/bg-04-home_768.jpg')",
      },
      aspectRatio: {
        '4/3': '4 / 3',
        'poster-dsk': '6.68 / 10',
        trailer: '19.2 / 8.18',
        promo: '11 / 5',
        eventSliderMob: '107 / 60',
        slide: '12 / 5',
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    ({ addVariant }) => {
      addVariant('child', '& > *');
      addVariant('child-hover', '& > *:hover');
    }
  ],
};