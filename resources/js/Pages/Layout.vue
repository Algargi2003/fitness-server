<template>
    
    <NavBar></NavBar>
    <main>
        
        <slot>
        </slot> 
        
    </main>
    <!-- <Footer></Footer> -->
    
</template>
<script lang="ts" setup>
import NavBar from './components/navbar/NavBar.vue';

import "./scss/layout.scss"
</script>