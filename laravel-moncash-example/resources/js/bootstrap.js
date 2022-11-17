import _ from 'lodash';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import axios from 'axios';

window._ = _;


/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */


window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

window.Pusher = Pusher;

// window.Pusher.logToConsole = !import.meta.env.PROD;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});


window.Echo.channel(`payments`)
    .listen('.payment.processed', (e) => {
        console.log("🍐");

        openToastSuccess();
    });

function openToastSuccess(){
    const toatsr = document.querySelector('#toast-payment-success');

    console.log('🍅', toatsr);

    if(toatsr){

        const id  ='show-' + Date.now();

        toatsr.classList.remove('hidden');
        toatsr.classList.add(id);

        setTimeout(()=>{
            const d = document.querySelector('.' + id);

            if(d){
                toatsr.classList.add('hidden');
                toatsr.classList.remove(id);
            }
        }, 8000)
    }
}

window.addEventListener('click', openToastSuccess )
