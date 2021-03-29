<template>
<div>
  <div v-if="cargado">
    <div class="text-center centradv">
      <div class="preloader"></div>
    </div>
  </div>
  <div v-else-if="!cargado && user.rol!=1">
    <ul class="nav nav-tabs" id="mytab2" role="tablist2">
      <li class="nav-item col-lg-4 text-center">
        <a class="nav-link active" id="level3-tab" data-toggle="tab" href="#a" role="tab" aria-controls="level3" aria-selected="true" style="border-radius: 50px">LETRAS</a>
      </li>
      <li class="nav-item col-lg-4 text-center" v-if="resultados.subnivel1 >= 7">
        <a class="nav-link " id="leve3-tab" data-toggle="tab" href="#b" role="tab" aria-controls="leve3" aria-selected="false" style="border-radius: 50px">SÍLABAS</a>
      </li>
      <li class="nav-item col-lg-4 text-center" v-if="resultados.subnivel2 >= 7">
        <a class="nav-link " id="lev3-tab" data-toggle="tab" href="#c" role="tab" aria-controls="lev3" aria-selected="false" style="border-radius: 50px">PALABRAS</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent2">
      <!-- letras -->
      <div  class="tab-pane fade show active mt-5" id="a" role="tabpanel" aria-labelledby="level3-tab">
        <vs-row>
          <vs-alert dark class="mb-3" :progress="alerta.progress" v-model="alerta.active" >
            <template #title>
              Calificación de la Unidad
            </template>
              Felicidades, obtuviste una calificación de {{(resultados.subnivel1).toFixed(2)}}/10, ya puedes ingresar al Sílabas de este nivel
          </vs-alert>
          <vs-alert class="mb-3">
            <template #title>
              Forma de uso
            </template>
              Dar click en el botón negro, escuchar la instrucción y escribir.
          </vs-alert>
          <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-4 col-md-6 p-0"  v-for="(tr,index) in letras.preguntas" :key="index">
            <div class="col-lg-12 mb-4"  >
              <div class="card m-3" style="border-radius: 50px">
                <img :src="'/archivos/imagenes/nivel3/'+tr.foto" class="card-img-top" style="border-radius: 50px"  alt="Card image cap"/>
                <div class="card-body">
                  <vs-row vs-justify="flex-end" style=";bottom: 10px;">
                    <vs-button color="dark" type="gradient" style="margin: 15px;border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(tr.audio)">
                      <vs-tooltip circle>
                        <i class="fas fa-volume-up fa-2x"></i>
                        <template #tooltip>
                            Escuchar
                        </template>
                      </vs-tooltip>
                    </vs-button>
                    <div v-for="(tr,index_hijo) in tr.respuestas" :key="index_hijo">
                      <vs-input color="#195bff" v-model="tr.respuesta_campo" class="w-100  mb-3 mt-5"  placeholder="Escribir" style="margin-bottom: 20px" @keyup="seleccionar_letras(index, tr, index_hijo)"></vs-input>
                    </div>
                  </vs-row>
                </div>
              </div>
            </div>
          </vs-col>
        </vs-row>
        <div class="content-inputs " >
          <vs-button color="primary"  style="float: right;margin-bottom: 20px;width: 100px;height: 100px;" type="gradient" @click="enviarletras()">
            <vs-tooltip circl>
              <i class="fas fa-check fa-2x"></i>
              <template #tooltip>
                Verificar
              </template>
            </vs-tooltip>
          </vs-button>
        </div>
      </div>
      <!-- silabas -->
      <div  class="tab-pane fade show  mt-5" id="b" role="tabpanel" aria-labelledby="leve3-tab" v-if="resultados.subnivel1 >= 7">
        <vs-row>
          <vs-alert dark class="mb-3" :progress="alerta.progress" v-model="alerta.active" >
            <template #title>
              Calificación de la Unidad
            </template>
              Felicidades, obtuviste una calificación de {{(resultados.subnivel2).toFixed(2)}}/10, ya puedes ingresar al Sílabas de este nivel
          </vs-alert>
          <vs-alert class="mb-3">
            <template #title>
              Forma de uso
            </template>
              Dar click en el botón negro, escuchar la instrucción y escribir.
          </vs-alert>
          <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-4 col-md-6 p-0" v-for="(tr,index) in silabas.preguntas" :key="index">
            <div class="col-lg-12 mb-4" >
              <div class="card m-3 " style="border-radius: 50px" >
                <img :src="'/archivos/imagenes/nivel3/'+tr.foto" class="card-img-top" style="border-radius: 50px"  alt="Card image cap"/>
                <div class="card-body" >
                  <vs-row vs-justify="flex-end" style="bottom: 0px">
                    <vs-button color="dark" type="gradient" style="margin: 15px;border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(tr.audio)">
                      <vs-tooltip circle>
                        <i class="fas fa-volume-up fa-2x"></i>
                        <template #tooltip>
                            Escuchar
                        </template>
                      </vs-tooltip>
                    </vs-button>
                    <div v-for="(tr,index_h) in tr.respuestas" :key="index_h">
                      <vs-input color="#195bff" v-model="tr.respuesta_campo" class="w-100  mb-3 mt-5"  placeholder="Escribir" style="margin-bottom: 20px" @keyup="seleccionar_silabas(index, tr, index_h)"/>
                    </div>
                  </vs-row>
                </div>
              </div>
            </div>
          </vs-col>
        </vs-row>
        <div class="content-inputs">
          <vs-button color="primary"  style="float: right;margin-bottom: 20px;--vs-color: 25, 91, 255;width: 100px;height: 100px;" type="gradient" @click="enviarsilabas()">
            <vs-tooltip circl>
              <i class="fas fa-check fa-2x"></i>
              <template #tooltip>
                Verificar
              </template>
            </vs-tooltip>
          </vs-button>
          </div>
      </div>
      <!-- palabra -->
      <div  class="tab-pane fade show  mt-5" id="c" role="tabpanel" aria-labelledby="lev3-tab" v-if="resultados.subnivel2 >= 7">
        <vs-row>
          <vs-alert dark class="mb-3" :progress="alerta.progress" v-model="alerta.active" v-if="resultados.subnivel3 >= 7">
            <template #title>
              Calificación de la Unidad
            </template>
              Felicidades, obtuviste una calificación de {{(resultados.subnivel3).toFixed(2)}}/10, ya puedes ingresar al siguiente nivel
          </vs-alert>
          <vs-alert class="mb-3">
            <template #title>
              Forma de uso
            </template>
              Dar click en el botón negro, escuchar la instrucción y escribir, las tíldes influyen en la nota. (Al finalizar recargar la página para acceder al siguiente nivel)
          </vs-alert>
          <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-4 col-md-6 p-0" v-for="(tr,index) in palabras.preguntas" :key="index">
            <div class="col-lg-12">
              <div class="card m-3 " style="border-radius: 50px">
                <img :src="'/archivos/imagenes/nivel3/'+tr.foto" class="card-img-top" style="border-radius: 50px"  alt="Card image cap"/>
                <div class="card-body" >
                  <vs-row vs-justify="flex-end" style="bottom: 0px;">
                    <vs-button color="dark" type="gradient" style="margin: 15px;border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(tr.audio)">
                      <vs-tooltip circle>
                        <i class="fas fa-volume-up fa-2x"></i>
                        <template #tooltip>
                            Escuchar
                        </template>
                      </vs-tooltip>
                    </vs-button>
                    <div v-for="(tr,index_hi) in tr.respuestas" :key="index_hi">
                      <vs-input color="#195bff" v-model="tr.respuesta_campo" class="w-100  mb-3 mt-5"  placeholder="Escribir" style="margin-bottom: 20px" @keyup="seleccionar_palabras(index, tr, index_hi)"/>
                    </div> 
                  </vs-row>  
                </div>
              </div>
            </div>
          </vs-col>
        </vs-row>
        <div >
          <vs-button color="primary"  style="float: right;margin-bottom: 20px;--vs-color: 25, 91, 255;width: 100px;height: 100px;" type="gradient" @click="enviarpalabras()">
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
    <ul class="nav nav-tabs" id="mytab2" role="tablist2">
      <li class="nav-item col-lg-4 text-center">
        <a class="nav-link active" id="level3-tab" data-toggle="tab" href="#a" role="tab" aria-controls="level3" aria-selected="true" style="border-radius: 50px">LETRAS</a>
      </li>
      <li class="nav-item col-lg-4 text-center" >
        <a class="nav-link " id="leve3-tab" data-toggle="tab" href="#b" role="tab" aria-controls="leve3" aria-selected="false" style="border-radius: 50px">SÍLABAS</a>
      </li>
      <li class="nav-item col-lg-4 text-center" >
        <a class="nav-link " id="lev3-tab" data-toggle="tab" href="#c" role="tab" aria-controls="lev3" aria-selected="false" style="border-radius: 50px">PALABRAS</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent2">
      <!-- letras -->
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
                <vs-th> Audio </vs-th>
                <vs-th> Pregunta </vs-th>
                <vs-th> Estado </vs-th>
                <vs-th> Imagen </vs-th>
                <vs-th> Fecha Creado </vs-th>
                <vs-th> Opciones </vs-th>
              </vs-tr>
            </template>
            <template #tbody v-if="lista">
              <vs-tr :key="i" v-for="(tr, i) in lista.letras" :data="tr">
                <vs-td> {{ tr.audio }} </vs-td>
                <vs-td> {{ tr.valor_campo }} </vs-td>
                <vs-th v-if="tr.estado==1" style="color:green">Activo</vs-th><vs-th v-else style="color:red">Inactivo</vs-th>
                <vs-td><img :src="'/archivos/imagenes/nivel3/'+tr.fotosb" style="width: 70px;height: 70px;"/></vs-td>
                <vs-td>{{ tr.updated_at | fecha }}</vs-td>
                <vs-td>
                  <i class="fas fa-toggle-on pointer eventsalto" style="color:green" @click="cambiar_estado(tr.id, 0)" v-if="tr.estado==1"></i>
                  <i class="fas fa-toggle-off pointer eventsalto" style="color:red" @click="cambiar_estado(tr.id, 1)" v-else></i>
                  <i class="fas fa-edit ml-2 pointer eventsalto" @click="modal('editar',tr,1)"></i>
                  <i class="fas fa-trash ml-2 pointer eventsalto" @click="eliminar_letras(tr.id_subnivel)"></i>
                </vs-td>
              </vs-tr>
            </template>
          </vs-table>
        </div>
      </div>
      <!-- silabas -->
      <div  class="tab-pane fade show  mt-5" id="b" role="tabpanel" aria-labelledby="leve3-tab">
       <div class="col-lg-12 mb-3">
            <vs-row justify="flex-end">
              <vs-col w="1">
                <vs-button class="w-100" @click="modal('agregar',null,2)">Agregar</vs-button>
              </vs-col>
            </vs-row>
          </div>
          <div class="card mb-5">
            <vs-table>
              <template #thead>
                <vs-tr>
                  <vs-th> Audio </vs-th>
                  <vs-th> Pregunta </vs-th>
                  <vs-th> Estado </vs-th>
                  <vs-th> Imagen </vs-th>
                  <vs-th> Fecha Creado </vs-th>
                  <vs-th> Opciones </vs-th>
                </vs-tr>
              </template>
              <template #tbody v-if="lista">
                <vs-tr :key="i" v-for="(tr, i) in lista.silabas" :data="tr">
                  <vs-td> {{ tr.audio }} </vs-td>
                  <vs-td> {{ tr.valor_campo }} </vs-td>
                  <vs-th v-if="tr.estado==1" style="color:green">Activo</vs-th><vs-th v-else style="color:red">Inactivo</vs-th>
                  <vs-td><img :src="'/archivos/imagenes/nivel3/'+tr.fotosb" style="width: 70px;height: 70px;"/></vs-td>
                  <vs-td>{{ tr.updated_at | fecha }}</vs-td>
                  <vs-td>
                    <i class="fas fa-toggle-on pointer eventsalto" style="color:green" @click="cambiar_estado(tr.id, 0)" v-if="tr.estado==1"></i>
                    <i class="fas fa-toggle-off pointer eventsalto" style="color:red" @click="cambiar_estado(tr.id, 1)" v-else></i>
                    <i class="fas fa-edit ml-2 pointer eventsalto" @click="modal('editar',tr,2)"></i>
                    <i class="fas fa-trash ml-2 pointer eventsalto" @click="eliminar_silabas(tr.id_subnivel)"></i>
                  </vs-td>
                </vs-tr>
              </template>
            </vs-table>
          </div>
      </div>
      <!-- palabra -->
      <div  class="tab-pane fade show  mt-5" id="c" role="tabpanel" aria-labelledby="lev3-tab">
        <div class="col-lg-12 mb-3">
            <vs-row justify="flex-end">
              <vs-col w="1">
                <vs-button class="w-100" @click="modal('agregar',null,3)">Agregar</vs-button>
              </vs-col>
            </vs-row>
          </div>
          <div class="card mb-5">
            <vs-table>
              <template #thead>
                <vs-tr>
                  <vs-th> Audio </vs-th>
                  <vs-th> Pregunta </vs-th>
                  <vs-th> Estado </vs-th>
                  <vs-th> Imagen </vs-th>
                  <vs-th> Fecha Creado </vs-th>
                  <vs-th> Opciones </vs-th>
                </vs-tr>
              </template>
              <template #tbody v-if="lista">
                <vs-tr :key="i" v-for="(tr, i) in lista.palabras" :data="tr">
                  <vs-td> {{ tr.audio }} </vs-td>
                  <vs-td> {{ tr.valor_campo }} </vs-td>
                  <vs-th v-if="tr.estado==1" style="color:green">Activo</vs-th><vs-th v-else style="color:red">Inactivo</vs-th>
                  <vs-td><img :src="'/archivos/imagenes/nivel3/'+tr.fotosb" style="width: 70px;height: 70px;"/></vs-td>
                  <vs-td>{{ tr.updated_at | fecha }}</vs-td>
                  <vs-td>
                    <i class="fas fa-toggle-on pointer eventsalto" style="color:green" @click="cambiar_estado(tr.id, 0)" v-if="tr.estado==1"></i>
                    <i class="fas fa-toggle-off pointer eventsalto" style="color:red" @click="cambiar_estado(tr.id, 1)" v-else></i>
                    <i class="fas fa-edit ml-2 pointer eventsalto" @click="modal('editar',tr,3)"></i>
                    <i class="fas fa-trash ml-2 pointer eventsalto" @click="eliminar_palabras(tr.id_subnivel)"></i>
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
        <div class="col-lg-12">
            <div class="center content-inputs">
              <vs-input
                type="file"
                @change="recuperarimagen"
                label="Respuesta imagen"
                ref="file"
              />
            </div>
        </div>
      </div>
    </div>
    <template #footer>
          <div class="footer-dialog" v-if="datos_modal.sb==1">
            <vs-button block @click="guardar_l()" v-if="datos_modal.tipo==1">
              Agregar
            </vs-button>
            <vs-button block @click="editar_l()" v-else>
              Editar
            </vs-button>
          </div>
          <div class="footer-dialog" v-else-if="datos_modal.sb==2">
            <vs-button block @click="guardar_s()" v-if="datos_modal.tipo==1">
              Agregar1
            </vs-button>
            <vs-button block @click="editar_s()" v-else>
              Editar1
            </vs-button>
          </div>
          <div class="footer-dialog" v-else>
            <vs-button block @click="guardar_p()" v-if="datos_modal.tipo==1">
              Agregar2
            </vs-button>
            <vs-button block @click="editar_p()" v-else>
              Editar2
            </vs-button>
          </div>
        </template>
  </vs-dialog>
</div>

</template>
<script>
import Api from "../apis/Nivel3";
import store from "../store/store";
import moment from "moment";
moment.locale("es");
export default {
  data(){
    return{
      baseURL: "http://localhost:8000/api",
      letras:{
        preguntas:[],
      },
      silabas:{
        preguntas:[]
      },
      palabras:{
        preguntas:[]
      },
      variable_seleccionado:[],
      resultados:{
        subnivel1:0,
        subnivel2:0,
        subnivel3:0
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
        imagen:'',
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
  methods:{
    llamarpreguntas(){
      Api.llamarpreguntas().then(({data}) => {
        var valores = [ {letras:0,valor:0}, {silabas:0,valor:0}, {palabras:0,valor:0} ];
        data.subnivel.forEach((el,index) => {
          if(el.subnivel==1 && el.estado==1) this.letras.preguntas.push({audio:el.audio,foto:el.foto, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          if(el.subnivel==2 && el.estado==1) this.silabas.preguntas.push({audio:el.audio,foto:el.foto, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          if(el.subnivel==3 && el.estado==1) this.palabras.preguntas.push({audio:el.audio,foto:el.foto, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          data.preguntas.forEach((pr,index) => {
            if(el.id==pr.id_subnivel && el.subnivel==1){
              // if(index!=valores[0].letras) valores[0].letras = index, valores[0].valor++;
              // if(typeof this.letras.preguntas[valores[0].valor]!== 'undefined'){ 
              //   if(!this.letras.preguntas[valores[0].valor].respuestas){ 
              //     this.letras.preguntas[valores[0].valor].respuestas = [];
              //     this.letras.preguntas[valores[0].valor].respuestas.push(pr);
              //   }
              // }
              if(index!=valores[0].letras) valores[0].letras = index, valores[0].valor++;
              if(!this.letras.preguntas[valores[0].valor].respuestas) this.letras.preguntas[valores[0].valor].respuestas = [];
              this.letras.preguntas[valores[0].valor].respuestas.push(pr); 
            };
            if(el.id==pr.id_subnivel && el.subnivel==2){  
              if(index!=valores[1].silabas) valores[1].silabas = index, valores[1].valor++;
              if(!this.silabas.preguntas[valores[1].valor-1].respuestas) this.silabas.preguntas[valores[1].valor-1].respuestas = [];
              this.silabas.preguntas[valores[1].valor-1].respuestas.push(pr); 
            }
            if(el.id==pr.id_subnivel && el.subnivel==3){  
              if(index!=valores[2].palabras) valores[2].palabras = index, valores[2].valor++;
              if(!this.palabras.preguntas[valores[2].valor-1].respuestas) this.palabras.preguntas[valores[2].valor-1].respuestas = [];
              this.palabras.preguntas[valores[2].valor-1].respuestas.push(pr); 
            }
          });
        });
        this.cargado=false;
      });
    },
    sonido(palabra){    
      responsiveVoice.speak(palabra, "Spanish Latin American Female");
      //var voicelist = responsiveVoice.getVoices();
      //console.log(voicelist);
    },
    seleccionar_letras(index, tr, index_hijo){
      if(this.variable_seleccionado.length==0){
        this.letras.preguntas.forEach(el => {
          this.variable_seleccionado.push({});
        });
      } 
      this.letras.preguntas[index].respuestas[index_hijo];
      this.variable_seleccionado.splice(index,1,tr);
    },
    seleccionar_silabas(index, tr, index_h){
      if(this.variable_seleccionado.length==0){
        this.silabas.preguntas.forEach(el => {
          this.variable_seleccionado.push({});
        });
      } 
      this.silabas.preguntas[index].respuestas[index_h];
      this.variable_seleccionado.splice(index,1,tr);
    },
    seleccionar_palabras(index, tr, index_hi){
      if(this.variable_seleccionado.length==0){
        this.palabras.preguntas.forEach(el => {
          this.variable_seleccionado.push({});
        });
      } 
      this.palabras.preguntas[index].respuestas[index_hi];
      this.variable_seleccionado.splice(index,1,tr);
    },
    enviarletras(){
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
      Api.enviarletras(this.variable_seleccionado).then( ({data}) => {
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
    enviarsilabas(){
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
      Api.enviarsilabas(this.variable_seleccionado).then( ({data}) => {
        var resultado = data[0].suma * 10 / data[0].total;
        this.resultados.subnivel2 = resultado;
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
    enviarpalabras(){
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
      Api.enviarpalabras(this.variable_seleccionado).then( ({data}) => {
        var resultado = data[0].suma * 10 / data[0].total;
        this.resultados.subnivel3 = resultado;
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
          subnivel3: (data.subnivel3[0].suma * 10) / data.subnivel3[0].total
        }
      });
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
        // console.log(data);
        this.lista = data;
      }).catch( error => {
        console.log(error);
      });
    },
    modal(tipo, data, sb){
      switch(tipo){
        case 'agregar': {
          this.datos_modal = {
            activo:true,
            tipo:1,
            titulo:"Agergar Registro",
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
          this.form.pregunta = data.audio;
          this.form.respuesta = data.valor_campo;
          break;
        }
      }
    },
    agregar_objeto(){
      this.form.preguntas.push( {foto:'', tipo:''} );
    },
    guardar_l(){
        let formData = new FormData();
        formData.append("pregunta", this.form.pregunta);
        formData.append("respuesta", this.form.respuesta);
        formData.append("imagen", this.form.imagen);
        Api.guardar_l(formData).then(({data}) => {
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'success',
            title: 'Guardaro exitosamente',
            text: 'Registro guardado exitosamente'
          });
          this.listar();
          this.datos_modal.activo = false;
        }).catch( error => {
          console.log(error);
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'danger',
            title: 'Error al guardar',
            text: 'Sorry, registro no guargado'
          });
        });
    },
    guardar_s(){
        let formData = new FormData();
        formData.append("pregunta", this.form.pregunta);
        formData.append("respuesta", this.form.respuesta);
        formData.append("imagen", this.form.imagen);
        Api.guardar_s(formData).then(({data}) => {
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'success',
            title: 'Guardaro exitosamente',
            text: 'Registro guardado exitosamente'
          });
          this.listar();
          this.datos_modal.activo = false;
        }).catch( error => {
          console.log(error);
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'danger',
            title: 'Error al guardar',
            text: 'Sorry, registro no guargado'
          });
        });
    },
    guardar_p(){
        let formData = new FormData();
        formData.append("pregunta", this.form.pregunta);
        formData.append("respuesta", this.form.respuesta);
        formData.append("imagen", this.form.imagen);
        Api.guardar_p(formData).then(({data}) => {
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'success',
            title: 'Guardaro exitosamente',
            text: 'Registro guardado exitosamente'
          });
          this.listar();
          this.datos_modal.activo = false;
        }).catch( error => {
          console.log(error);
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'danger',
            title: 'Error al guardar',
            text: 'Sorry, registro no guargado'
          });
        });
    },
    forms(){
      this.form = {
        id:null,
        audio:'',
        foto:'',
        pregunta:[
          {
            foto:'',
            tipo:1,
            valor_campo:''
          }
        ]
      };
    },
    editar_l(){
        let formData = new FormData();
        formData.append("id", this.form.id);
        formData.append("id_pregunta", this.form.id_pregunta);
        formData.append("pregunta", this.form.pregunta);
        formData.append("respuesta", this.form.respuesta);
        formData.append("imagen", this.form.imagen);
        Api.editar_l(formData).then(({data}) => {
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'success',
            title: 'Editado exitosamente',
            text: 'Registro editado exitosamente'
          });
          this.listar();
          this.datos_modal.activo = false;
          this.forms();
        }).catch( error => {
          console.log(error);
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'danger',
            title: 'Error al actualizar',
            text: 'Registro no editado'
          });
        });
    },
    editar_s(){
        let formData = new FormData();
        formData.append("id", this.form.id);
        formData.append("id_pregunta", this.form.id_pregunta);
        formData.append("pregunta", this.form.pregunta);
        formData.append("respuesta", this.form.respuesta);
        formData.append("imagen", this.form.imagen);
        Api.editar_l(formData).then(({data}) => {
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'success',
            title: 'Editado exitosamente',
            text: 'Registro editado exitosamente'
          });
          this.listar();
          this.datos_modal.activo = false;
          this.forms();
        }).catch( error => {
          console.log(error);
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'danger',
            title: 'Error al actualizar',
            text: 'Registro no editado'
          });
        });
    },
    editar_p(){
        let formData = new FormData();
        formData.append("id", this.form.id);
        formData.append("id_pregunta", this.form.id_pregunta);
        formData.append("pregunta", this.form.pregunta);
        formData.append("respuesta", this.form.respuesta);
        formData.append("imagen", this.form.imagen);
        Api.editar_p(formData).then(({data}) => {
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
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'danger',
            title: 'Error al actualizar',
            text: 'Registro no editado'
          });
        });
    },
    recuperarimagen(event){
      this.form.imagen = event.target.files[0];
    },
    eliminar_letras(id){
      Api.eliminar_letras(id).then(({data}) => {
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
    eliminar_silabas(id){
      Api.eliminar_silabas(id).then(({data}) => {
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
    eliminar_palabras(id){
      Api.eliminar_letras(id).then(({data}) => {
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

<style >
  .w-100 input{
    width: 100%!important;
  }
</style>
