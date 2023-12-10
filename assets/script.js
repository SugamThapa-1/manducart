document.addEventListener("DOMContentLoaded", function () {
    const paginationLinks = document.querySelectorAll('.page-link');

    paginationLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();

            paginationLinks.forEach(link => {
                link.classList.remove('active');
            });

            this.classList.add('active');
        });
    });
});
