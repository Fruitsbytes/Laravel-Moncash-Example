import './bootstrap';


window.addEventListener('beforeunload', function (e) {
    console.log('🍋');
    e.target.querySelectorAll('fieldset').forEach((value, key) => {
        value.disabled = true;
    })
});

(function () {
    console.log('🧃');
})();
