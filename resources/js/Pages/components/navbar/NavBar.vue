<script lang="ts" setup>
import './navbar.scss'

import { onMounted } from "vue";
import { ref } from "vue";
let clicado = ref(false);
let width = ref(document.documentElement.clientWidth);
let clicar = () => {
    clicado.value = !clicado.value;
};
let getDimension = () => {
    width.value = document.documentElement.clientWidth;
};

window.addEventListener("resize", () => {
    getDimension();
    if (width.value > 720) {
        clicado.value = false;
    }
});
</script>
<template >
    
        <nav class="navbar">
            <div class="navbar-left">
                <a href="/"
                    ><div class="navbar-logo"><span class="navbar-logo2">FITNESS</span>APP</div></a
                >
            </div>
            <div
                :class="
                    clicado && width < 720
                        ? 'menu-bars-contenido-clicado'
                        : 'menu-bars-contenido'
                "
            >
                <div class="navbar-bars" id="barsMenu" @click="clicar">
                    <span
                        :class="clicado ? 'active-menu-bars-linea1' : ''"
                    ></span>
                    <span
                        :class="clicado ? 'active-menu-bars-linea2' : ''"
                    ></span>
                    <span
                        :class="clicado ? 'active-menu-bars-linea3' : ''"
                    ></span>
                </div>
                <div
                    class="navbar-right"
                    :class="
                        clicado && width < 720
                            ? 'navbar-horizontal'
                            : 'navbar-right'
                    "
                >
                    <a  class="navbar-links">
                        Recetas
                    </a>
                    <a  class="navbar-links">
                        Hola2
                    </a>
                    <a class="navbar-links">
                        Hola3
                    </a>
                    <a  class="navbar-links">
                        <img src="../../../Images/usuario.png" width="40px">
                    </a>
                    
                </div>
            </div>
        </nav>
    
</template>
