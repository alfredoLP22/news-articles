import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js'
import Articles from './components/Articles.vue'
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
    components,
    directives,
});

const app = createApp({
    components: {
        Articles
    },
}).use(vuetify)
app.mount('#app');
