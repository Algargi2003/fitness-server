<template>
    <Layout>
        <img
            src="../../../Images/fotoGimnasio.jpg"
            alt="foto Gimnasio"
            class="home-foto"
        />
        <div class="home-info1">
            <div class="home-info1-titulo">REGÍSTRATE AHORA</div>
            <div class="home-info1-texto">
                Y obtén acceso a la mejor plataforma fitness, donde podrás
                obtener una dieta adecuada para tí, y una rutina de ejercicios
            </div>
        </div>
        <video autoplay muted loop class="home-video">
            <source src="../../../videos/videoInicio.mp4" />
        </video>
        <div class="home-info2">
            <div class="home-info2-titulo">CATEGORÍAS</div>
            <div class="home-info2-cards">
                <Card :valor="'recetas'"></Card>
                <Card :valor="'rutinas'"></Card>
                <Card :valor="'alimentos'"></Card>
                <Card :valor="'calcular'"></Card>
                <Card :valor="'productos'"></Card>
                <Card :valor="'blog'"></Card>
            </div>
        </div>
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

        <!-- <img v-else src="../../../Images/fotoInicio2-movil2.jpg" class="imagen-inicio"> -->
    </Layout>
</template>
<script lang="ts" setup>
import axios from "axios";
import { onMounted } from "vue";
import { ref } from "vue";
import Layout from "../../Layout.vue";
import Card from "../card/card.vue";
import "./home.scss";

let ingredientes = ref();
onMounted(() => {
    axios
        .get(route("ingredientes.index"))
        .then((response) => (ingredientes.value = response.data));
});
let width = ref(document.documentElement.clientWidth);
let getDimension = () => {
    width.value = document.documentElement.clientWidth;
};

window.addEventListener("resize", () => {
    getDimension();
});
</script>
