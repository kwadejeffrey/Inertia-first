import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import Layout from './Shared/Layout.vue'

// createInertiaApp({
//   resolve: name =>  resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
//   setup({ el, App, props, plugin }) {
//     createApp({ render: () => h(App, props) })
//       .use(plugin)
//       .mount(el)
//   },
// })

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    // return pages[`./Pages/${name}.vue`]
    let page =  pages[`./Pages/${name}.vue`]
    // page.default.layout = page.default.layout || Layout
    // page.default.layout = page.default.layout || Layout
    if(page.default.layout === undefined){
      page.default.layout = Layout
    }
    return page
  },
  title: title => `${title} | My App`,
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Head',Head)
      .component('Link',Link)
      .mount(el)
  },
})

InertiaProgress.init({
  showSpinner: true
})