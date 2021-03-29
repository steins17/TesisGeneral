<template>
<div>
  <div v-if="cargado">
    <div class="text-center centradv">
      <div class="preloader"></div>
    </div>
  </div>
  <div v-else-if="!cargado && user.rol!=1">
    <ul class="nav nav-tabs" id="mytab3" role="tablist3">
      <li class="nav-item col-lg-6 text-center">
        <a class="nav-link active" id="level3-tab" data-toggle="tab" href="#a" role="tab" aria-controls="uno" aria-selected="true" style="border-radius: 50px">ORACIONES</a>
      </li>
      <li class="nav-item col-lg-6 text-center" v-if="resultados.subnivel1 >= 7">
        <a class="nav-link " id="leve3-tab" data-toggle="tab" href="#b" role="tab" aria-controls="dos" aria-selected="false" style="border-radius: 50px">FRASES</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent2">
      <!-- oraciones -->
      <div  class="tab-pane fade show active mt-5" id="a" role="tabpanel" aria-labelledby="level3-tab">
        <vs-row>
          <vs-col vs-type="flex" vs-justify="center" vs-align="center" >
            <vs-alert dark class="mb-3" :progress="alerta.progress" v-model="alerta.active" v-if="resultados.subnivel1 >= 7">
              <template #title>
                Calificación de la Unidad
              </template>
                Felicidades, obtuviste una calificación de {{(resultados.subnivel1).toFixed(2)}}/10, ya puedes ingresar a oraciones de este nivel
            </vs-alert>
            <vs-alert class="mb-3">
              <template #title>
                Forma de uso
              </template>
                Dar click en el botón azul, hablar y verificar si es correcto la oración.
            </vs-alert>
            <div class="card m-3" style="border-radius: 50px" v-for="(tr,index) in oraciones.preguntas" :key="index">
              <vs-row>
                <vs-col vs-type="flex" vs-justify="center" vs-align="center" style="margin: 30px">
                  <div class="card-head text-center" style="margin-bottom: 12px">
                    <h2><span>{{tr.nombre}}</span></h2>
                  </div>
                </vs-col>
                <vs-col vs-justify="flex"  class="container" w="6">
                  <div class="center content-inputs" v-for="(tr,index_hijo) in tr.respuestas" :key="index_hijo">
                    <vs-input color="#195bff"  v-model="tr.respuesta_campo" :class="'w-100 mb-3 mt-5 index'+index" style="margin-bottom: 35px" @click="seleccionar_oraciones(index, tr, index_hijo)"/>
                  </div>
                  <div class="container" style=";display: block;">
                    <vs-button  style="float: right;margin-right: 80px;margin-bottom: 20px;--vs-color: 25, 91, 255;border-radius: 70px;width: 40px;height: 40px;" @click="hablar(index)">
                      <vs-tooltip circle>
                        <i class="fas fa-microphone-alt fa-2x"></i>
                        <template #tooltip>
                          Hablar
                        </template>
                      </vs-tooltip>
                    </vs-button>
                  </div>
                </vs-col>
              </vs-row>
            </div>     
          </vs-col>
        </vs-row>
        <div >
          <vs-button color="primary"  style="float: right;margin-bottom: 20px;--vs-color: 25, 91, 255;width: 100px;height: 100px;" type="gradient" @click="enviaroraciones()">
            <vs-tooltip circl>
              <i class="fas fa-check fa-2x"></i>
              <template #tooltip>
                Verificar
              </template>
            </vs-tooltip>
          </vs-button>
        </div>
      </div>
      <!-- frases -->
      <div  class="tab-pane fade show mt-5" id="b" role="tabpanel" aria-labelledby="leve3-tab">
        <vs-row>
          <vs-col vs-type="flex" vs-justify="center" vs-align="center">
            <vs-alert dark class="mb-3" :progress="alerta.progress" v-model="alerta.active" v-if="resultados.subnivel2 >= 7">
              <template #title>
                Calificación de la Unidad
              </template>
                Felicidades, obtuviste una calificación de {{(resultados.subnivel2).toFixed(2)}}/10, ya has aprobado el curso
            </vs-alert>
            <vs-alert class="mb-3">
              <template #title>
                Forma de uso
              </template>
                Dar click en el botón azul, hablar y verificar si es correcto la oración.
            </vs-alert>
            <div class="card m-3" style="border-radius: 50px" v-for="(tr,index) in frases.preguntas" :key="index">
              <vs-row>
                <vs-col vs-type="flex" vs-justify="center" vs-align="center" style="margin: 30px">
                  <div class="card-head text-center" style="margin-bottom: 12px">
                    <h2><span>{{tr.nombre}}</span></h2>
                  </div>
                </vs-col>
                <vs-col vs-justify="flex" class="container" w="6">
                  <div class="center content-inputs" v-for="(tr,index_h) in tr.respuestas" :key="index_h">
                    <vs-input color="#195bff"  v-model="tr.respuesta_campo" :class="'w-100  mb-3 mt-5 index'+index"  placeholder="Escribir" style="margin-bottom: 35px" @click="seleccionar_frases(index, tr, index_h)"/>
                  </div>
                  <div class="container" style="bottom: 0px;display: block;">
                    <vs-button  style="float: right;margin-right: 80px;margin-bottom: 20px;--vs-color: 25, 91, 255;border-radius: 70px;width: 40px;height: 40px;" @click="hablarc(index)">
                      <vs-tooltip circle>
                        <i class="fas fa-microphone-alt fa-2x"></i>
                        <template #tooltip>
                          Hablar
                        </template>
                      </vs-tooltip>
                    </vs-button>
                  </div>
                </vs-col>
              </vs-row>
            </div>     
          </vs-col>
        </vs-row>
        <div >
          <vs-button color="primary"  style="float: right;margin-bottom: 20px;--vs-color: 25, 91, 255;width: 100px;height: 100px;" type="gradient" @click="enviarfrases()">
            <vs-tooltip circl>
              <i class="fas fa-check fa-2x"></i>
              <template #tooltip>
                Verificar
              </template>
            </vs-tooltip>
          </vs-button>
        </div>
      </div>
    </div>
  </div>
  <div v-else>
    <ul class="nav nav-tabs" id="mytab3" role="tablist3">
      <li class="nav-item col-lg-6 text-center">
        <a class="nav-link active" id="level3-tab" data-toggle="tab" href="#a" role="tab" aria-controls="uno" aria-selected="true" style="border-radius: 50px">ORACIONES</a>
      </li>
      <li class="nav-item col-lg-6 text-center">
        <a class="nav-link " id="leve3-tab" data-toggle="tab" href="#b" role="tab" aria-controls="dos" aria-selected="false" style="border-radius: 50px">FRASES</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent2">
      <!-- oraciones -->
      <div  class="tab-pane fade show active mt-5" id="a" role="tabpanel" aria-labelledby="level3-tab">
        <div class="col-lg-12 mb-3">
            <vs-row justify="flex-end">
              <vs-col w="1">
                <vs-button class="w-100" @click="modal('agregar',null,1)">Agregar</vs-button>
              </vs-col>
            </vs-row>
          </div>
          <div class="card mb-5">
            <vs-table>
              <template #thead>
                <vs-tr>
                  <vs-th> Pregunta </vs-th>
                  <vs-th> Respuesta </vs-th>
                  <vs-th> Estado </vs-th>
                  <vs-th> Fecha Creado </vs-th>
                  <vs-th> Opciones </vs-th>
                </vs-tr>
              </template>
              <template #tbody v-if="lista">
                <vs-tr :key="i" v-for="(tr, i) in lista.oraciones" :data="tr">
                  <vs-td> {{ tr.nombre }} </vs-td>
                  <vs-td> {{ tr.valor_campo }} </vs-td>
                  <vs-th v-if="tr.estado==1" style="color:green">Activo</vs-th><vs-th v-else style="color:red">Inactivo</vs-th>
                  <vs-td>{{ tr.updated_at | fecha }}</vs-td>
                  <vs-td>
                    <i class="fas fa-toggle-on pointer eventsalto" style="color:green" @click="cambiar_estado(tr.id, 0)" v-if="tr.estado==1"></i>
                    <i class="fas fa-toggle-off pointer eventsalto" style="color:red" @click="cambiar_estado(tr.id, 1)" v-else></i>
                    <i class="fas fa-edit ml-2 pointer eventsalto" @click="modal('editar', tr,1)"></i>
                    <i class="fas fa-trash ml-2 pointer eventsalto" @click="eliminar_oraciones(tr.id_subnivel)"></i>
                  </vs-td>
                </vs-tr>
              </template>
            </vs-table>
          </div>
      </div>
      <!-- frases -->
      <div  class="tab-pane fade show mt-5" id="b" role="tabpanel" aria-labelledby="leve3-tab">
        <div class="col-lg-12 mb-3">
            <vs-row justify="flex-end">
              <vs-col w="1">
                <vs-button class="w-100" @click="modal('agregar', null,2)">Agregar</vs-button>
              </vs-col>
            </vs-row>
          </div>
          <div class="card mb-5">
            <vs-table>
              <template #thead>
                <vs-tr>
                  <vs-th> Respuesta </vs-th>
                  <vs-th> Pregunta </vs-th>
                  <vs-th> Estado </vs-th>
                  <vs-th> Fecha Creado </vs-th>
                  <vs-th> Opciones </vs-th>
                </vs-tr>
              </template>
              <template #tbody v-if="lista">
                <vs-tr :key="i" v-for="(tr, i) in lista.frases" :data="tr">
                  <vs-td> {{ tr.nombre }} </vs-td>
                  <vs-td> {{ tr.valor_campo }} </vs-td>
                  <vs-th v-if="tr.estado==1" style="color:green">Activo</vs-th><vs-th v-else style="color:red">Inactivo</vs-th>
                  <vs-td>{{ tr.updated_at | fecha }}</vs-td>
                  <vs-td>
                    <i class="fas fa-toggle-on pointer eventsalto" style="color:green" @click="cambiar_estado(tr.id, 0)" v-if="tr.estado==1"></i>
                    <i class="fas fa-toggle-off pointer eventsalto" style="color:red" @click="cambiar_estado(tr.id, 1)" v-else></i>
                    <i class="fas fa-edit ml-2 pointer eventsalto" @click="modal('editar',tr,2)"></i>
                    <i class="fas fa-trash ml-2 pointer eventsalto" @click="eliminar_frases(tr.id_subnivel)"></i>
                  </vs-td>
                </vs-tr>
              </template>
            </vs-table>
          </div>
      </div>
    </div>
  </div>
  <vs-dialog v-model="datos_modal.activo">
        <template #header>
          <h4 class="not-margin">
            {{datos_modal.titulo}}
          </h4>
        </template>
        <div class="con-form">
          <div class="row mb-4">
            <div class="col-lg-12 mb-3">
                <div class="center content-inputs">
                  <vs-input
                    label="Palabra Pregunta"
                    v-model="form.pregunta"
                    placeholder="Pregunta"
                  />
                </div>
            </div>
            <div class="col-lg-12 mb-3">
                <div class="center content-inputs">
                  <vs-input
                    label="Palabra Respuesta"
                    v-model="form.respuesta"
                    placeholder="Respuesta"
                  />
                </div>
            </div>
          </div>
        </div>
        <template #footer>
          <div class="footer-dialog" v-if="datos_modal.sb==1">
            <vs-button block @click.prevent="guardar_oraciones()" v-if="datos_modal.tipo==1">
              Agregar
            </vs-button>
            <vs-button block @click.prevent="editar_oraciones()" v-else>
              Editar
            </vs-button>
          </div>
          <div class="footer-dialog" v-else-if="datos_modal.sb==2">
            <vs-button block @click.prevent="guardar_frases()" v-if="datos_modal.tipo==1">
              Agregar1
            </vs-button>
            <vs-button block @click.prevent="editar_frases()" v-else>
              Editar1
            </vs-button>
          </div>
        </template>
    </vs-dialog>
</div>
</template>

<script>
import Api from "../apis/Nivel4";
import store from "../store/store";
import moment from "moment";
export default {
  data() {
    return {
      oraciones:{
        preguntas:[]
      },
      frases:{
        preguntas:[]
      },
      variable_seleccionado:[],
      resultados:{
        subnivel1:0,
        subnivel2:0,
      },
      alerta: {
        active: true,
        time: 6000,
        progress: 0
      },
      cargado:true,
      user:{rol:0},
      lista:null,
      datos_modal:{
        activo:false,
        tipo:0,
        titulo:"",
        sb:null,
      },
      form:{
        pregunta:'',
        respuesta:'',
        id:null,
        id_pregunta:null
      }
    }
  },
  filters: {
    fecha(data) {
        return moment(data).format("LL");
    },
  },
  methods: {
    llamarpreguntas(){
      Api.llamarpreguntas().then(({data}) => {
        var valores = [ {oraciones:0,valor:0}, {frases:0,valor:0}];
        data.subnivel.forEach((el,index) => {
          if(el.subnivel==1 && el.estado==1) this.oraciones.preguntas.push({nombre:el.nombre, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          if(el.subnivel==2 && el.estado==1) this.frases.preguntas.push({nombre:el.nombre, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          data.preguntas.forEach(pr => {
            if(el.id==pr.id_subnivel && el.subnivel==1){  
              if(index!=valores[0].oraciones) valores[0].oraciones = index, valores[0].valor++;
              if(!this.oraciones.preguntas[valores[0].valor].respuestas) this.oraciones.preguntas[valores[0].valor].respuestas = [];
              this.oraciones.preguntas[valores[0].valor].respuestas.push(pr);
            }
            if(el.id==pr.id_subnivel && el.subnivel==2){  
              if(index!=valores[1].frases) valores[1].frases = index, valores[1].valor++;
              if(!this.frases.preguntas[valores[1].valor-1].respuestas) this.frases.preguntas[valores[1].valor-1].respuestas = [];
              this.frases.preguntas[valores[1].valor-1].respuestas.push(pr);
            }
          });
        });
        this.cargado=false;
      });
    },
    seleccionar_oraciones(index, tr, index_hijo){
      if(this.variable_seleccionado.length==0){
        this.oraciones.preguntas.forEach(el => {
          this.variable_seleccionado.push({});
        });
      } 
      this.oraciones.preguntas[index].respuestas[index_hijo];
      this.variable_seleccionado.splice(index,1,tr);
    },
    seleccionar_frases(index, tr, index_h){
      if(this.variable_seleccionado.length==0){
        this.frases.preguntas.forEach(el => {
          this.variable_seleccionado.push({});
        });
      } 
      this.frases.preguntas[index].respuestas[index_h];
      this.variable_seleccionado.splice(index,1,tr);
    },
    enviaroraciones(){
      if(this.variable_seleccionado.length<=0){
        this.$vs.notification({
          square: true,
          progress: 'auto',
          color:'danger',
          title: 'Debes responder',
          text: 'Debes seleccionar una de las respuestas'
        });
      }
      for(var i=0; i<this.variable_seleccionado.length; i++){
        if($.isEmptyObject(this.variable_seleccionado[i])){
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'danger',
            title: 'Debes responder',
            text: 'Debes seleccionar una de las respuestas'
          });
          return;
        }
      }
      Api.enviaroraciones(this.variable_seleccionado).then( ({data}) => {
        var resultado = data[0].suma * 10 / data[0].total;
        this.resultados.subnivel1 = resultado;
        this.$vs.notification({
          square: true,
          progress: 'auto',
          color:'primary',
          position:'top-center',
          title: `obtuviste un total de ${resultado}/10`,
          text: `obtuviste un total de ${data[0].suma} aciertos de ${data[0].total} preguntas`
        });
      }).catch( error => {
        console.log(error);
      });
    },
    enviarfrases(){
      if(this.variable_seleccionado.length<=0){
        this.$vs.notification({
          square: true,
          progress: 'auto',
          color:'danger',
          title: 'Debes responder',
          text: 'Debes seleccionar una de las respuestas'
        });
      }
      for(var i=0; i<this.variable_seleccionado.length; i++){
        if($.isEmptyObject(this.variable_seleccionado[i])){
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'danger',
            title: 'Debes responder',
            text: 'Debes seleccionar una de las respuestas'
          });
          return;
        }
      }
      Api.enviarfrases(this.variable_seleccionado).then( ({data}) => {
        var resultado = data[0].suma * 10 / data[0].total;
        this.$vs.notification({
          square: true,
          progress: 'auto',
          color:'primary',
          position:'top-center',
          title: `obtuviste un total de ${resultado}/10`,
          text: `obtuviste un total de ${data[0].suma} aciertos de ${data[0].total} preguntas`
        });
      }).catch( error => {
        console.log(error);
      });
    },
    llamarresultados(){
      Api.llamarresultados().then(({data}) =>{
        this.resultados = {
          subnivel1: (data.subnivel1[0].suma * 10) / data.subnivel1[0].total,
          subnivel2: (data.subnivel2[0].suma * 10) / data.subnivel2[0].total,
        }
      });
    },
    hablar(index){
      let rec;
        if (!("webkitSpeechRecognition" in window)) {
          alert("disculpas, no puedes usar la API");
        } else {
          rec = new webkitSpeechRecognition();
          rec.lang = "es-AR";
          rec.continuous = true;
          rec.interim = true;
          rec.addEventListener("result",iniciar);
        }
        let me = this;
        function iniciar(event){
          for (let i = event.resultIndex; i < event.results.length; i++){
            me.oraciones.preguntas[index].respuestas[0].respuesta_campo = event.results[i][0].transcript;
            $('.index'+index).children('div').children('input').val(event.results[i][0].transcript);
          }
        }
      rec.start();
      setTimeout(() => {
        return;
      }, 10000);
    },
    hablarc(index){
      let rec;
        if (!("webkitSpeechRecognition" in window)) {
          alert("disculpas, no puedes usar la API");
        } else {
          rec = new webkitSpeechRecognition();
          rec.lang = "es-ES";
          rec.continuous = true;
          rec.interim = true;
          rec.addEventListener("result",iniciar);
        }
        let me = this;
        function iniciar(event){
          for (let i = event.resultIndex; i < event.results.length; i++){
            me.frases.preguntas[index].respuestas[0].respuesta_campo = event.results[i][0].transcript;
            $('.index'+index).children('div').children('input').val(event.results[i][0].transcript);
          }
        }
      rec.start();
      setTimeout(() => {
        return;
      }, 3000);
    },
    usuario(){
      if(localStorage.getItem("token")){
        store.dispatch('recuperauser').then((value) => {
          this.user = value;
        });
      }
    },
    //administrador
    listar(){
      Api.listar().then( ({data}) => {
        this.lista = data;
      }).catch( error => {
        console.log(error);
      });
    },
    forms(){
      this.form ={
        id:null,
        nombre:'',
      }
    },
    modal(tipo, data, sb){
      switch(tipo){
        case 'agregar': {
          this.datos_modal = {
            activo:true,
            tipo:1,
            titulo:"Agregar Registro",
            sb:sb
          };
          
          break;
        }
        case 'editar': {
          this.datos_modal = {
            activo:true,
            tipo:2,
            titulo:"Editar Registro",
            sb:sb
          };
          this.form.id = data.id_subnivel;
          this.form.id_pregunta = data.id;
          this.form.pregunta = data.nombre;
          this.form.respuesta = data.valor_campo;
          break;
        }
      }
    },
    agregar_objeto(){
      this.form.preguntas.push( {valor_campo:'',} );
    },
    guardar_oraciones(){
        let formData = new FormData();
        formData.append("pregunta", this.form.pregunta);
        formData.append("respuesta", this.form.respuesta);
        Api.guardar_oraciones(formData).then(({data}) => {
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'success',
            title: 'Guardaro exitosamente',
            text: 'Registro guardado exitosamente'
          });
          this.listar();
          this.forms();
          this.datos_modal.activo = false;
        }).catch( error => {
          console.log(error);
        });
    },
    guardar_frases(){
        let formData = new FormData();
        formData.append("pregunta", this.form.pregunta);
        formData.append("respuesta", this.form.respuesta);
        Api.guardar_frases(formData).then(({data}) => {
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'success',
            title: 'Guardaro exitosamente',
            text: 'Registro guardado exitosamente'
          });
          this.listar();
          this.forms();
          this.datos_modal.activo = false;
        }).catch( error => {
          console.log(error);
        });
    },
    editar_oraciones(){
      let formData = new FormData();
      formData.append("id", this.form.id);
        formData.append("id_pregunta", this.form.id_pregunta);
        formData.append("pregunta", this.form.pregunta);
        formData.append("respuesta", this.form.respuesta);
        Api.editar_oraciones(formData).then(({data}) => {
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'success',
            title: 'Guardaro exitosamente',
            text: 'Registro guardado exitosamente'
          });
          this.listar();
          this.datos_modal.activo = false;
          this.forms();
        }).catch( error => {
          console.log(error);
        });
    },
    editar_frases(){
      let formData = new FormData();
      formData.append("id", this.form.id);
        formData.append("id_pregunta", this.form.id_pregunta);
        formData.append("pregunta", this.form.pregunta);
        formData.append("respuesta", this.form.respuesta);
        Api.editar_frases(formData).then(({data}) => {
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'success',
            title: 'Guardaro exitosamente',
            text: 'Registro guardado exitosamente'
          });
          this.listar();
          this.forms();
          this.datos_modal.activo = false;
        }).catch( error => {
          console.log(error);
        });
    },
    eliminar_oraciones(id){
      Api.eliminar_oraciones(id).then(({data}) => {
        this.$vs.notification({
          square: true,
          progress: 'auto',
          color:'success',
          title: 'Dato Borrado',
          text: 'Dato borrado exitosamente'
        });
        this.listar();
      })
    },
    eliminar_frases(id){
      Api.eliminar_frases(id).then(({data}) => {
        this.$vs.notification({
          square: true,
          progress: 'auto',
          color:'success',
          title: 'Dato Borrado',
          text: 'Dato borrado exitosamente'
        });
        this.listar();
      })
    },
    cambiar_estado(id, estado){
      var form = {id:id, estado:estado}
      Api.cambiar_estado(form).then(({data}) => {
        this.$vs.notification({
          square: true,
          progress: 'auto',
          color:'success',
          title: 'Estado Actualizado',
          text: 'Estado Actualizado exitosamente'
        });
        this.listar();
      })
    },
  },
  mounted() {
    this.llamarpreguntas();
    this.llamarresultados();
    this.usuario();
    this.listar();
  },
}
</script>
<style>
  .w-100 input{
    width: 100%!important;
  }
  
</style>
