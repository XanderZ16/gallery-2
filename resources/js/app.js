import './bootstrap';
import Alpine from 'alpinejs'
import intersect from '@alpinejs/intersect'
import lottie from 'lottie-web';

document.addEventListener('DOMContentLoaded', function() {
    lottie.loadAnimation({
        container: document.getElementById('lottie-container'),
        path: '/lottie/animation.lottie',
        renderer: 'svg',
        loop: true,
        autoplay: true,
    });
});


window.Alpine = Alpine
Alpine.plugin(intersect)

Alpine.start()
