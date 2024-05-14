<template>
    <div>
        <div class="product-card">
            <img class="image-product" :src="producto.imagen" alt="" />
            <div class="product-info">
                <div class="info">
                    <h2>{{ producto.nombre }}</h2>
                    <p v-if="currentLanguage == 'es'">{{ producto.descripcion_es }}</p>
                    <p v-else>{{ producto.descipcion_en }}</p>
                </div>
                <div class="precio-ctn">
                    <p class="precio">{{ producto.precio }}€</p>
                    <button
                        v-if="producto.desponibilidad"
                        @click="agregarAlCarrito()"
                        class="btn-add-cart"
                    >
                        {{ 
                            currentLanguage === 'es' ? 'Agregar al carrito' : 'Add to Cart' 
                        }}
                    </button>
                    <button
                        v-if="!producto.disponibilidad"
                        class="btn-add-cart btn-agotado"
                    >
                        {{ currentLanguage === 'es' ? 'Agotado' : 'Sold Out' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { defineProps, inject, ref} from 'vue';
    import $ from 'jquery';

    const currentLanguafe = inject('currentLanguage');
    const usuario_id = inject('usuario').value.id;
</script>