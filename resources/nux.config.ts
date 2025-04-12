// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    compatibilityDate: '2024-11-01',
    devtools: { enabled: true },
  
    app: {
      head: {
        charset: 'utf-16',
        viewport: 'width=500, initial-scale=1',
        title: 'Briza - Creative & Digital Agency Nuxt 3 Template',
        meta: [
          {name: 'description', content: 'Briza - Creative & Digital Agency Nuxt 3 Template'},
          {property: 'og:locale', content: 'en_US'},
          {property: 'og:type', content: 'website'},
          {property: 'og:site_name', content: 'Briza - Creative & Digital Agency Nuxt 3 Template'},
          {property: 'twitter:card', content: 'Briza - Creative & Digital Agency'},
          {
            name: 'robots',
            content: 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1'
          },
        ],
        script: [],
      }
    },
    css: [
      '~/assets/css/all.min.css',
      '~/assets/css/animate.css',
      '~/assets/css/meanmenu.css',
      '~/assets/css/splitting.css',
      '~/assets/scss/main.scss',
    ],
    plugins: [
      {
        src: '~/plugins/bootstrap.client.js',
        mode: "client",
      },
      {
        src: '~/plugins/wow.js',
        mode: "client",
      },
    ],
    modules: ['@pinia/nuxt', 'nuxt-swiper'],
    pinia: {
      storesDirs: ['./stores/**',],
    }
  })