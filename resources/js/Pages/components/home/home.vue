<template>
    <Layout>
        <!-- <table border="solid">
        <tr>
            <th>id</th>
            <th>Nombre</th>
        </tr>
        <tr v-for="ingrediente of ingredientes">
            <td>{{ ingrediente.id }}</td>
            <td>{{ ingrediente.nombre }}</td>
        </tr>
    </table> -->
    <img v-if="width>768" src="../../../Images/fotoInicio2.jpg" class="imagen-inicio" alt="">
    <img v-else src="../../../Images/fotoInicio2-movil2.jpg" class="imagen-inicio">
    </Layout>
    
</template>
<script lang="ts" setup>
import axios from "axios";
import { onMounted } from "vue";
import { ref } from "vue";
import Layout from '../../Layout.vue';
import "./home.scss"

let ingredientes =ref();
onMounted(()=>{
    axios.get(route('ingredientes.index'))
    .then(response=>(ingredientes.value=response.data))
    
})
let width = ref(document.documentElement.clientWidth);
let getDimension = () => {
    width.value = document.documentElement.clientWidth;
};

window.addEventListener("resize", () => {
    getDimension();
    
});
</script>