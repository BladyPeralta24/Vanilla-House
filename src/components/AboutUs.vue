<template>
    <section class="about">
        <div class="about-img">
            <img src="../assets/img/logos/logo3.png" alt="Vanilla House" />
        </div>
        <div class="about-text">
            <h1>{{ text.welcome[currentLanguage] }}</h1>
            <p>{{ text.description[currentLanguage] }}</p>
            <p>{{ text.discover[currentLanguage] }}</p>
        </div>
    </section>
</template>

<script setup>
    import { inject, ref } from 'vue';

    const currentLanguage = inject('currentLanguage');

    const text =ref({
        welcome: {
            en: 'Welcome to Vanilla House',
            es: 'Bienvenido a Vanilla House'
        },
        description: {
            en: 'We are a company that sells classic Vinyl records from the 70s to the present day. With a wide variety of musical styles, from all possible eras.',
            es: 'Somos una empresa que se dedica a la venta de los discos de Vinilo clásicos de los años 70 hasta la actualidad. Con un amplio de variedad de estilos musicales, de todas las épocas posibles.'
        },
        discover: {
            en: 'Discover our collection and find the perfect record for you.',
            es: 'Descubre nuestra colección y encuentra el disco perfecto para ti.'
        }
    });
</script>

<style>
    h1{
        margin: 0;
        color: black;
    }
    .about{
        display: flex;
        justify-content: space-around;
        align-items: center;
        gap: 40px;
        height: 35vh;
    }

    .about-img img{
        width: 100%;
    }

    .about-text{
        max-width: 600px;
        color: black;
    }
</style>