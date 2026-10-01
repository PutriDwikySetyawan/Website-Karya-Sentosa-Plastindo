document.addEventListener('DOMContentLoaded', function () {
    // Filter produk di beranda
    const buttons = document.querySelectorAll('#productFilter button');
    const items = document.querySelectorAll('.product-col');

    buttons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            buttons.forEach(function (b) { b.classList.remove('active'); });
            btn.classList.add('active');
            const f = btn.dataset.filter;
            items.forEach(function (el) {
                el.style.display = (f === 'all' || el.dataset.category === f) ? '' : 'none';
            });
        });
    });

    // Scroll halus ke anchor
    document.querySelectorAll('a[href*="#"]').forEach(function (a) {
        a.addEventListener('click', function (e) {
            const url = new URL(a.href, location.href);
            if (url.pathname === location.pathname && url.hash) {
                const target = document.querySelector(url.hash);
                if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth' }); }
            }
        });
    });
});