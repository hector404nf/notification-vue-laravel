import './bootstrap';

import { createApp } from 'vue';

const app = createApp({});

import Posts from './components/Posts.vue';

app.component('posts', Posts);


app.mount('#app');
