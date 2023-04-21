<template>
    <table border="solid">
        <tr>
            <th>id</th>
            <th>Nombre</th>
        </tr>
        <tr v-for="ingrediente of ingredientes">
            <td>{{ ingrediente.id }}</td>
            <td>{{ ingrediente.nombre }}</td>
        </tr>
    </table>
</template>
<script lang="ts" setup>
import axios from "axios";
import { onMounted } from "vue";
import { ref } from "vue";

let ingredientes =ref();
onMounted(()=>{
    axios.get(route('ingredientes.index'))
    .then(response=>(ingredientes.value=response.data))
    
})

</script>