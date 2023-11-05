@vite([
    'resources/js/head.js',
    'resources/js/config.js',
    'resources/scss/app.scss',
    'resources/scss/icons.scss',
    ])

<style>
@media (max-width: 767px) {
    .c-form {
        width: 100%;
    }
}

@media (min-width: 768px) {
    .c-form {
        width: 65%;
        margin: 0 auto;
    }
}
@media (min-width: 920px) {
    .c-form {
        width: 50%;
        margin: 0 auto;
    }
}
</style>

