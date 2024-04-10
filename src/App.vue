<script lang="js" setup>
    import NavBar from './components/NavBar.vue';
    import Contenedor from './components/miContainer.vue';
    import { ref, provide } from 'vue';

const ShowContent = ref({ 
  contenido: 'About Us', 
});

function changeContent(contenido){
  ShowContent.value = contenido;
  console.log("El contenido de la web cambio: ", ShowContent.value.contenido);
}

const currentLenguage = ref('en');

function toggleLenguage(){
  currentLenguage.value = currentLenguage.value === 'es' ? 'en' : 'es';
}
provide('ShowContent', ShowContent);
provide('currentLenguage', currentLenguage);

</script>


<template>
    <NavBar
        id="navbar"
        :currentLanguage="currentLanguage"
        :productos="productos"
        @toggleLenguage="toggleLenguage"
        @changeContent="changeContent"
        :ShowContent="ShowContent"
    />
    <Contenedor
        id="contenedor"
        :ShowContent="ShowContent"
        :currentLanguage="currentLanguage"
    />
</template>





<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
