import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import Web3 from 'web3/dist/web3.min.js'
window.Web3 = Web3;

document.onreadystatechange = () => {
    const metaMaskLoginButton = document.getElementById("metamask-login");
    if (metaMaskLoginButton != null) {
        metaMaskLoginButton.onclick = async (event) => {
            if (!window.ethereum) {
                console.error('Metamask not exist');
                return;
            }

            const web3 = new Web3(window.ethereum);

            const signatureUrl = metaMaskLoginButton.getAttribute("data-signature-url");
            const authenticateUrl = metaMaskLoginButton.getAttribute("data-authenticate-url");
            const redirectUrl = metaMaskLoginButton.getAttribute("data-redirect-url");

            const message = (await axios.get(signatureUrl)).data;
            const [ address ] = await web3.eth.requestAccounts();

            const signature = await web3.eth.personal.sign(message, address);

            try {
                const { status } = await axios.post(authenticateUrl, {
                    'address': address,
                    'signature': signature,
                });
                if (status == 200) {
                    window.location = redirectUrl;
                }
            } catch (e) {
                console.error(e);
            }
        }
    }
}

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faUserSecret)

createInertiaApp({
  resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .component('font-awesome-icon', FontAwesomeIcon)
      .use(plugin)
      .mount(el)
  },
});

import { InertiaProgress } from '@inertiajs/progress'

InertiaProgress.init()
