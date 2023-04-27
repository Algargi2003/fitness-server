<template>
    <div class="card" :class="props.valor=='recetas' ? 'card-recetas':
    props.valor=='rutinas' ? 'card-rutinas':
    props.valor=='alimentos' ? 'card-alimentos':
    props.valor=='calcular' ? 'card-calcular':
    props.valor=='productos' ? 'card-productos':
    props.valor=='blog' ? 'card-blog':''">
    {{ props.valor.toUpperCase() }}
    </div>
</template>
<script lang="ts" setup>
import axios from "axios";
import { onMounted } from "vue";
import { ref } from "vue";
import { PropType } from "vue";
import "./card.scss"
//pasar por prop si es receta, rutina etc...
const props = defineProps({
    valor: String
})
//estilo: foto de fondo con capa traslúcida amarillo clarito y texto centrado amarillo
</script>   