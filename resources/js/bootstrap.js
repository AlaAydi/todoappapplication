import axios from 'axios';
window.axios = axios;

globalThis.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
