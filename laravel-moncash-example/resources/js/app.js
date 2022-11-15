import './bootstrap';
import 'flowbite';

console.log('Welcome to 🏪BouTik by 🥝FruitsBytes');


const el = document.querySelector('body');

el.addEventListener('click', async (e) => {

    const copy = e.target.closest('.text-to-clipboard');
    if (copy) {
        console.log('----', copy.textContent)

        try {
            await navigator.clipboard.writeText(copy.textConten);

            const div = document.createElement('div');

            div.classList.add(
                'fixed',
                'bg-red-800',
                'text-red-100',
                'border-red-700',
                'rounded',
                'p-2'
            );

            div.textContent = 'Copied to clipboard!';

        } catch (e) {

        }

    }

});

