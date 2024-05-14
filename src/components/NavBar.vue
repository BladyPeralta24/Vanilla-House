<template>
    <nav class="navbar-contenedor">
        <img class="logo" src="../assets/img/logos/logo3.png">
        <div class="items">
            <button 
                v-if="ShowContent.contenido != 'home'"
                class="item home" 
                @click="callChangeContent({ contenido: 'home'})" 
            >
                {{ idioma.home }}
            </button>

            <div class="item-products">
                <button class="">{{ idioma.products }}</button>
                <div class="dropdown products">
                    <button
                        v-for="producto in productos"
                        :key="producto.id"
                        class="product"
                        :value="producto.id"
                        @click="
                            callChangeContent({ contenido: 'producto', id: producto.id })
                        "
                    >
                        {{ producto.nombre }}
                    </button>
                </div>
            </div>
            <button class="item" @click="callChangeContent({ contenido: 'aboutUs'})">
                {{ idioma.aboutUs }}
            </button>
            <button class="item boton-idioma" @click="callToggleLenguage">
                <img v-if="currentLanguage === 'es'" :src="idioma.language" alt="es" />
                <img v-else :src="idioma.language" alt="en" />
            </button>
            <button class="item" @click="callChangeContent({ contenido: 'cart' })">
                <img src="../assets/img/logos/carrito.png" alt="cart"> {{ idioma.cart }}
            </button>
            <button
                v-if="islogged"
                class="item"
                @click="callChangeContent({ contenido: 'perfil' })"    
            >
                <img src="../assets/img/logos/cuenta.png" alt="perfil"> {{ usuario.nombre }}
            </button>
            <button
                v-else
                class="item"
                @click="callChangeContent({ contenido: 'logIn' })"
            >
                <img src="../assets/img/logos/cuenta.png" alt="perfil"> {{ idioma.loggin }}
            </button>
        </div>
    </nav>
</template>

<script lang="js" setup>
    import { inject, ref } from 'vue';
    import $ from 'jquery';

    const props = defineProps({
        productos: {
            type: Array,
            required: true,
        },
        ShowContent: {
            type: Object,
        },
        currentLenguage:{
            type: String,
        },
    });

    $(document).ready(function (){
        $('.product').click(function (){
            let product = $(this).val();
        });
    });

    const languageText = {
        english:{
            home: 'Home',
            products: 'Products',
            aboutUs: 'About Us',
            cart: 'Cart',
            language: '/src/assets/en.png',
            perfil: 'My profile',
            loggin: 'Log in',
        },
        spanish:{
            home: 'Inicio',
            products: 'Productos',
            aboutUs: 'Sobre Nosotros',
            cart: 'Carrito',
            language: '/src/assets/es.png',
            perfil: 'Mi perfil',
            loggin: 'Iniciar Sesión',
        },
    };

    const idioma = ref(
        props.currentLenguage === 'es'
            ? languageText.spanish
            : languageText.english
    );

    const emit = defineEmits(['changeContent', 'toggleLenguage']);
    function callToggleLenguage(){
        // Call the function passed from the parent component
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
    const islogged = inject('islogged');
    const usuario = inject('usuario');
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