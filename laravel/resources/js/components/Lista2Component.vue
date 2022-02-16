<template>
<b-list-group>
  <b-list-group-item href="#">Administracion</b-list-group-item>
  <b-list-group-item href="/usuarios" variant="primary">Usuarios</b-list-group-item>
   <b-list-group-item href="/proyectos" variant="primary">Proyectos</b-list-group-item>
  
</b-list-group>
  
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>