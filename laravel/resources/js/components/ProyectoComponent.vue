<template>
  <div>
       <form @submit.prevent="agregar">
            <!-- {{ csrf_field() }} -->

            <div class="form-group">
                <label for="name">Nombre</label>
                <input v-model="proyecto.name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Descripcion</label>
                <input v-model="proyecto.description" type="text"  class="form-control" >
            </div>
                <div class="form-group">
                <label for="date">Fecha inicio</label>
                <input type="date" v-model="proyecto.start" :min="min" :max="max" class="form-control" >
                <!-- <p>Value: '{{  old('start', date ('y-m-sd')) }}'</p> -->
            </div>

            <div class="form-group">
                <button  class="btn btn-primary" type="submit">Registrar proyecto</button>
            </div>
         </form>


  </div>
</template>

<script>
export default {
  data() {
      const now = new Date()
      const today = new Date(now.getFullYear(), now.getMonth(), now.getDate())
      // 15th two months prior
      const minDate = new Date(today)
      minDate.setMonth(minDate.getMonth() - 2)
      minDate.setDate(15)
      // 15th in two months
      const maxDate = new Date(today)
      maxDate.setMonth(maxDate.getMonth() + 2)
      maxDate.setDate(15)
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      proyectos: [],
      proyecto: {name: '', description: '', start: ''},
      start: '',
        min: minDate,
        max: maxDate
    }
  },
  created(){
    axios.get('/proyectos').then(res=>{
      this.proyectos = res.data;
    })
  },
  methods:{
    agregar(){
      if(this.proyecto.name.trim() === '' || this.proyecto.description.trim() === '' || this.proyecto.start.trim() === ''){
        alert('Debes completar todos los campos antes de guardar');
        return;
      }
      const proyectoNuevo = this.proyecto;
      this.proyecto = {nombre: '', descripcion: ''};
      axios.post('/proyectos', proyectoNuevo)
        .then((res) =>{
          const proyectoServidor = res.data;
          this.proyectos.push(proyectoServidor);
        })
    },




  }
}
</script>