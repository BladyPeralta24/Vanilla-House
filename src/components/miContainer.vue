<script lang="js" setup>
    import AboutUs from './AboutUs.vue';
    import { defineProps } from 'vue';
    defineProps({
        showContent: {
            type: Object,
        },
        currentLenguage:{
            type: Object,
        },
    });

    /* const emit = defineEmits(['changeContent']); */
</script>

<template>
    <div>
        <AboutUs
            id="aboutUs"
            v-if="showContent.contenido === 'aboutUs'"
            :currentLenguage="currentLenguage"
        />
    </div>
</template>

<style scoped></style>