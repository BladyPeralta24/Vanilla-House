<template>
    <nav class="navbar-contenedor">
        <img class="logo" src="../assets/img/logos/logo3.png">
        <div class="items">
            <button class="item" @click="callChangeContent({ contenido: 'aboutUs'})" >
                {{ idioma.aboutUs }}
            </button>
            <button class="item boton-idioma" @click="callToggleLenguage" >
                <img v-if="currentLenguage === 'es'" :src="idioma.language" alt="es">
                <img v-else :src="idioma.language" alt="en">
            </button>
        </div>
    </nav>
</template>

<script lang="js" setup>
    import { ref, defineProps, defineEmits } from 'vue';

    const props = defineProps({
        showContent: {
            type: Object,
        },
        currentLenguage:{
            type: String,
        },
    });

    const languageText = {
        english:{
            aboutUs: 'About Us',
            language: '/src/assets/en.png',
        },
        spanish:{
            aboutUs: 'Sobre Nosotros',
            language: '/src/assets/es.png',
        },
    };

    const idioma = ref(
        props.currentLenguage === 'es'
            ? languageText.spanish
            : languageText.english
    );

    const emit = defineEmits(['changeContent', 'toggleLenguage']);
    function callToggleLenguage(){
        emit('toggleLenguage');
        if(props.currentLenguage === 'es'){
            idioma.value = languageText.english;
        } else {
            idioma.value = languageText.spanish;
        }

        console.log("Se cambio ek idioma a: ", props.currentLenguage);
    }
    function callChangeContent(contenido){
        // Call the function passed from the parent component
        emit('changeContent', contenido);
    }
</script>

<style scoped>
    .logo{
        width: 40%;
    }

    .items{
        display: flex;
        height: 40px;
        gap: 5%;
        width: 100%;
        margin-left: 5%;
    }

    .boton-idioma{
        margin-left: auto;
    }

    .item{
        display: flex;
        background-color: transparent;
        color: black;
        cursor: pointer;
        height: 100%;
        min-width: fit-content;
        align-items: center;
        gap: 5px;
    }
    .item:hover{
        text-decoration: underline;
    }
    .navbar-contenedor{
        display: flex;
        align-items: center;
        background-color: white;
        width: calc(100% - 8rem);
        height: 80px;
        padding: 1rem 4rem;
    }
    .item img{
        height: 30px;
    }
    nav div{
        height: 100%;
    }
    nav div img{
        height: 100%;
    }
    button{
        background-color: transparent;
        border: none;
        color: black;
        cursor: pointer;
    }
</style>