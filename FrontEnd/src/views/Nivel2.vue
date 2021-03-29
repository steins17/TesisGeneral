<template> 
  <div>
    <div v-if="cargado">
      <div class="text-center centradv">
        <div class="preloader"></div>
      </div>
    </div>
    <div v-else-if="!cargado && user.rol!=1">
      <ul class="nav nav-tabs" id="myTab1" role="tablist1">
        <li class="nav-item col-lg-4 text-center">
          <a class="nav-link active" id="level2-tab" data-toggle="tab" href="#level2" role="tab" aria-controls="level2" aria-selected="true" style="border-radius: 50px">LETRAS</a>
        </li>
        <li class="nav-item col-lg-4 text-center" v-if="resultados.subnivel1 >= 7">
          <a class="nav-link" id="level-tab" data-toggle="tab" href="#level" role="tab" aria-controls="level" aria-selected="false" style="border-radius: 50px">SÍLABAS</a>
        </li>
        <li class="nav-item col-lg-4 text-center" v-if="resultados.subnivel2 >= 7">
          <a class="nav-link " id="p-tab" data-toggle="tab" href="#p" role="tab" aria-controls="p" aria-selected="false" style="border-radius: 50px">ORACIONES</a>
        </li>
      </ul> 
      <div class="tab-content" id="myTabContent1">
        <!-- Letras -->
        <div class="tab-pane fade show active mt-5" id="level2" role="tabpanel" aria-labelledby="level2-tab">
          <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                <vs-alert dark class="mb-3" :progress="alerta.progress" v-model="alerta.active" v-if="resultados.subnivel1 >= 7">
                  <template #title>
                    Calificación de la Unidad
                  </template>
                    Felicidades, obtuviste una calificación de {{(resultados.subnivel1).toFixed(2)}}/10, ya puedes ingresar al Sílabas de este nivel
                </vs-alert>
                <vs-alert class="mb-3">
                  <template #title>
                    Forma de uso
                  </template>
                  Dar click en el boton azul, escuchar la indicación y seleccionar la imagen correcta
                </vs-alert>
                <div class="card mb-3 p-3" style="border-radius: 50px" v-for="(tr,index) in letras.preguntas" :key="index">
                  <vs-row>
                    <vs-col vs-justify="flex-end">
                      <center>
                        <vs-button color="primary" style="postion: center" type="gradient" class="col-lg-4  p-3" @click.prevent="sonido(tr.audio)">
                          <vs-tooltip circl>
                            <i class="fas fa-volume-up fa-2x"></i>
                            <template #tooltip>
                              Escuchar
                            </template>
                          </vs-tooltip>
                        </vs-button>
                      </center>
                    </vs-col>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-4 container" v-for="(tr,index_hijo) in tr.respuestas" :key="index_hijo">
                        <div class="card-head text-center">
                          Mayúscula - Minúscula
                        </div>
                      <div class="card estilodecard mb-3 p-3" :class="{'seleccionado':tr.status}" @click="seleccionar_letras(index, tr, index_hijo)">
                        <img :src="'archivos/imagenes/nivel2/letras/'+tr.foto" class="w-100" style="border-radius: 50px"/>
                      </div><br>
                    </vs-col>
                  </vs-row>
                </div>
            </vs-col>
          </vs-row>
          <div class="container" style="bottom: 12px;display: block;">
            <vs-button  style="float: right;margin-bottom: 20px;--vs-color: 25, 91, 255;width: 100px;height: 100px;" @click="enviarletras()">
              <vs-tooltip circle>
                <i class="fas fa-check fa-2x"></i>
                <template #tooltip>
                  Verificar
                </template>
              </vs-tooltip>
            </vs-button>
          </div>
          <h1 style="display:none;">{{variable_seleccionado}}</h1>
        </div>
        <!-- silabas -->
        <div class="tab-pane fade show mt-5" id="level" role="tabpanel" aria-labelledby="level-tab" v-if="resultados.subnivel1 >= 7">
          <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                <vs-alert dark class="mb-3" :progress="alerta.progress" v-model="alerta.active" v-if="resultados.subnivel2 >= 7">
                  <template #title>
                    Calificación de la Unidad
                  </template>
                    Felicidades, obtuviste una calificación de {{(resultados.subnivel2).toFixed(2)}}/10, ya puedes ingresar a Oraciones de este nivel
                </vs-alert>
                <vs-alert class="mb-3">
                  <template #title>
                    Forma de uso
                  </template>
                  Dar click en el boton azul, escuchar la indicación y seleccionar la imagen correcta
                </vs-alert>
                <div class="card mb-3 p-3" style="border-radius: 50px" v-for="(tr,index) in silabas.preguntas" :key="index">
                  <vs-row>
                    <vs-col vs-justify="flex-end">
                      <center>
                        <vs-button color="primary" style="postion: center" type="gradient" class="col-lg-4  p-3" @click.prevent="sonido(tr.audio)">
                          <vs-tooltip circl>
                            <i class="fas fa-volume-up fa-2x"></i>
                            <template #tooltip>
                              Escuchar
                            </template>
                          </vs-tooltip>
                        </vs-button>
                      </center>
                    </vs-col>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-4 container" v-for="(tr,index_h) in tr.respuestas" :key="index_h">
                        <div class="card-head text-center">
                          Mayúscula - Minúscula
                        </div>
                      <div class="card estilodecard estilocard mb-3 p-3" :class="{'seleccionado':tr.status}" @click="seleccionar_silabas(index, tr, index_h)">
                        <img :src="'/archivos/imagenes/nivel2/silabas/'+tr.foto" class="w-100 " style="border-radius: 50px"/>
                      </div><br>
                    </vs-col>
                  </vs-row>
                </div>
            </vs-col>
          </vs-row>
          <div class="container" style=";bottom: 12px;display: block;">
            <vs-button  style="float: right;margin-bottom: 20px;--vs-color: 25, 91, 255;width: 100px;height: 100px;" @click="enviarsilabas()">
              <vs-tooltip circle>
                <i class="fas fa-check fa-2x"></i>
                <template #tooltip>
                  Verificar
                </template>
              </vs-tooltip>
            </vs-button>
          </div>
        </div>
        <!-- oraciones -->
        <div class="tab-pane fade show  mt-5" id="p" role="tabpanel" aria-labelledby="p-tab" v-if="resultados.subnivel2 >= 7">
          <vs-row >
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
                Leer la oracion y separar de forma correcta, las tíldes influyen en la nota. (Al finalizar recargar la página para acceder al siguiente nivel) 
            </vs-alert>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-6 col-md-6 p-3" v-for="(tr,index) in oraciones.preguntas " :key="index">
              <div class="col-lg-12 mb-4 p-0">
                <div class="card card-ajuste mb-3 p-3" style="border-radius: 50px">
                  <img :src="'/archivos/imagenes/nivel2/oraciones/'+tr.foto" class="card-img-top" style="border-radius: 50px"  alt="Card image cap"/>
                  <div class="card-body">
                    <vs-row>
                      <vs-col vs-type="flex" vs-justify="center" vs-align="center" style="margin: 15px">
                        <div class="card-head text-center" style="position: center;margin-bottom: 20px">
                          <h2><span>{{tr.nombre}}</span></h2>
                        </div>
                        <div class="center content-inputs" v-for="(tr,index_2) in tr.respuestas" :key="index_2">
                        <vs-input color="#195bff" v-model="tr.respuesta_campo" label-placeholder="Escribir" class="w-100 mb-3 mt-5" @keyup="selec_oraciones(index, tr, index_2)"/>
                        </div>
                      </vs-col>
                    </vs-row>
                  </div>
                </div>
              </div>
            </vs-col>
          </vs-row>
          <div>
            <vs-button  style="float: right;margin-bottom: 20px;--vs-color: 25, 91, 255;width: 100px;height: 100px;" @click="enviaroraciones()">
              <vs-tooltip circle>
                <i class="fas fa-check fa-2x"></i>
                <template #tooltip>
                  Verificar
                </template>
              </vs-tooltip>
            </vs-button>
          </div>
        </div>
        <h1 style="display:none;">{{variable_seleccionado}}</h1>
      </div>
    </div>
    <div v-else>
      <ul class="nav nav-tabs" id="myTab1" role="tablist1">
        <li class="nav-item col-lg-4 text-center">
          <a class="nav-link active" id="level2-tab" data-toggle="tab" href="#level2" role="tab" aria-controls="level2" aria-selected="true" style="border-radius: 50px">LETRAS</a>
        </li>
        <li class="nav-item col-lg-4 text-center" >
          <a class="nav-link" id="level-tab" data-toggle="tab" href="#level" role="tab" aria-controls="level" aria-selected="false" style="border-radius: 50px">SÍLABAS</a>
        </li>
        <li class="nav-item col-lg-4 text-center" >
          <a class="nav-link " id="p-tab" data-toggle="tab" href="#p" role="tab" aria-controls="p" aria-selected="false" style="border-radius: 50px">ORACIONES</a>
        </li>
      </ul> 
      <div class="tab-content" id="myTabContent1">
        <!-- Letras -->
        <div class="tab-pane fade show active mt-5" id="level2" role="tabpanel" aria-labelledby="level2-tab">
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
                  <vs-th> Tipo </vs-th>
                  <vs-th> Estado </vs-th>
                  <vs-th> Respuesta Imagen </vs-th>
                  <vs-th> Link Imagen </vs-th>
                  <vs-th> Fecha Creado </vs-th>
                  <vs-th> Opciones </vs-th>
                </vs-tr>
              </template>
              <template #tbody v-if="lista">
                <vs-tr :key="i" v-for="(tr, i) in lista.letras" :data="tr">
                  <vs-td> {{ tr.audiosb }} </vs-td>
                  <vs-th v-if="tr.tipo==1">Correcto</vs-th><vs-th v-else>Incorrecto</vs-th>
                  <vs-th v-if="tr.estado==1" style="color:green">Activo</vs-th><vs-th v-else style="color:red">Inactivo</vs-th>
                  <vs-td><img :src="'/archivos/imagenes/nivel2/letras/'+tr.foto" style="width: 70px;height: 70px;"/></vs-td>
                  <vs-td>{{tr.foto}}</vs-td>
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
        <div class="tab-pane fade show mt-5" id="level" role="tabpanel" aria-labelledby="level-tab" >
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
                  <vs-th> Pregunta </vs-th>
                  <vs-th> Tipo </vs-th>
                  <vs-th> Estado </vs-th>
                  <vs-th> Respuesta Imagen </vs-th>
                  <vs-th> Link Imagen </vs-th>
                  <vs-th> Fecha Creado </vs-th>
                  <vs-th> Opciones </vs-th>
                </vs-tr>
              </template>
              <template #tbody v-if="lista">
                <vs-tr :key="i" v-for="(tr, i) in lista.silabas" :data="tr">
                  <vs-td> {{ tr.audiosb }} </vs-td>
                  <vs-th v-if="tr.tipo==1">Correcto</vs-th><vs-th v-else>Incorrecto</vs-th>
                  <vs-th v-if="tr.estado==1" style="color:green">Activo</vs-th><vs-th v-else style="color:red">Inactivo</vs-th>
                  <vs-td><img :src="'/archivos/imagenes/nivel2/silabas/'+tr.foto" style="width: 70px;height: 70px;"/></vs-td>
                  <vs-td>{{tr.foto}}</vs-td>
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
        <!-- oraciones -->
        <div class="tab-pane fade show  mt-5" id="p" role="tabpanel" aria-labelledby="p-tab" >
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
                  <vs-th> Pregunta </vs-th>
                  <vs-th> Respuesta </vs-th>
                  <vs-th> Estado </vs-th>
                  <vs-th> Imagen </vs-th>
                  <vs-th> Fecha Creado </vs-th>
                  <vs-th> Opciones </vs-th>
                </vs-tr>
              </template>
              <template #tbody v-if="lista">
                <vs-tr :key="i" v-for="(tr, i) in lista.oraciones" :data="tr">
                  <vs-td> {{ tr.nombre }} </vs-td>
                  <vs-td> {{ tr.valor_campo }} </vs-td>
                  <vs-th v-if="tr.estado==1" style="color:green">Activo</vs-th><vs-th v-else style="color:red">Inactivo</vs-th>
                  <vs-td><img :src="'/archivos/imagenes/nivel2/oraciones/'+tr.foto" style="width: 70px;height: 70px;"/></vs-td>
                  <vs-td>{{ tr.updated_at | fecha }}</vs-td>
                  <vs-td>
                    <i class="fas fa-toggle-on pointer eventsalto" style="color:green" @click="cambiar_estado(tr.id, 0)" v-if="tr.estado==1"></i>
                    <i class="fas fa-toggle-off pointer eventsalto" style="color:red" @click="cambiar_estado(tr.id, 1)" v-else></i>
                    <i class="fas fa-edit ml-2 pointer eventsalto" @click="modal('editar1',tr,3)"></i>
                    <i class="fas fa-trash ml-2 pointer eventsalto" @click="eliminar_oraciones(tr.id_subnivel)"></i>
                  </vs-td>
                </vs-tr>
              </template>
            </vs-table>
          </div>
        </div>
      </div>
    </div>
    <!--Modal del módulo-->
    <vs-dialog v-model="datos_modal.activo">
        <template #header>
          <h4 class="not-margin">
            {{datos_modal.titulo}}
          </h4>
        </template>
        <div class="con-form" v-if="datos_modal.sb!=3">
          <div class="row mb-4">
            <div class="col-lg-4">
                <div class="center content-inputs">
                  <vs-input
                    label="Palabra audio"
                    v-model="form.audio"
                    placeholder="Pregunta"
                  />
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8">
                <div class="center content-inputs">
                  <vs-input
                    type="file"
                    label="Respuesta imagen"
                    @change="recuperarimagenletras1"
                    ref="file"
                  />
                </div>
            </div>
            <div class="col-lg-4">
                <div class="center content-inputs mt-2">
                  <vs-select label="Tipo" v-model="form.preguntas[0].tipo">
                    <vs-option value="1" label="Correcto">Correcto</vs-option>
                    <vs-option value="0" label="Incorrecto">Incorrecto</vs-option>
                  </vs-select>
                </div>
            </div>
          </div>
          <div class="row" v-if="datos_modal.tipo==1">
            <div class="col-lg-8">
                <div class="center content-inputs">
                  <vs-input
                    type="file"
                    label="Respuesta imagen"
                    @click="index=index"
                    @change="recuperarimagenletras2"
                    ref="file"
                  />
                </div>
            </div>
            <div class="col-lg-4">
                <div class="center content-inputs mt-2">
                  <vs-select label="Tipo" v-model="form.preguntas[1].tipo">
                    <vs-option value="1" label="Correcto">Correcto</vs-option>
                    <vs-option value="0" label="Incorrecto">Incorrecto</vs-option>
                  </vs-select>
                </div>
            </div>
          </div>
        </div>
        <div class="con-form" v-else>
          <div class="row mb-4">
            <div class="col-lg-12 mb-3">
                <div class="center content-inputs">
                  <vs-input
                    label="Palabra Pregunta"
                    v-model="form_oraciones.pregunta"
                    placeholder="Pregunta"
                  />
                </div>
            </div>
            <div class="col-lg-12 mb-3">
                <div class="center content-inputs">
                  <vs-input
                    label="Palabra Respuesta"
                    v-model="form_oraciones.respuesta"
                    placeholder="Respuesta"
                  />
                </div>
            </div>
            <div class="col-lg-12">
                <div class="center content-inputs">
                  <vs-input
                    type="file"
                    @change="recuperarimagenoraciones"
                    label="Respuesta imagen"
                    ref="file"
                  />
                </div>
            </div>
          </div>
        </div>
        <template #footer>
          <div class="footer-dialog" v-if="datos_modal.sb==1">
            <vs-button @click.prevent="guardar_letras()" v-if="datos_modal.tipo==1">
              Agregar
            </vs-button>
            <vs-button @click="editar_letras()" v-else>
              Editar
            </vs-button>
          </div>
          <div class="footer-dialog" v-else-if="datos_modal.sb==2">
            <vs-button @click.prevent="guardar_silabas()" v-if="datos_modal.tipo==1">
              Agregar1
            </vs-button>
            <vs-button @click.prevent="editar_silabas()" v-else>
              Editar1
            </vs-button>
          </div>
          <div class="footer-dialog" v-else>
            <vs-button @click.stop="guardar_oraciones()" v-if="datos_modal.tipo==1">
              Agregar2
            </vs-button>
            <vs-button @click.prevent="editar_oraciones()" v-else>
              Editar2
            </vs-button>
          </div>
        </template>
    </vs-dialog>
  </div>
</template>

<script>
import Api from "../apis/Nivel2";
import store from "../store/store";
import moment from "moment";
moment.locale("es");

export default {
  data() {
    return {
      baseURL: "http://localhost:8000/api",
      letras:{
        preguntas:[],
      },
      silabas:{
        preguntas:[],
      },
      oraciones:{
        preguntas:[],
      },
      seleccionado:null,  
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
        id:null,
        nombre:'',
        audio:'',
        foto:'',
        preguntas:[
          {
            foto:'',
            tipo:1,
            valor_campo:''
          },
          {
            foto:'',
            tipo:0,
            valor_campo:''
          }
        ]
      },
      form_oraciones:{
        pregunta:'',
        respuesta:'',
        imagen:'',
      },
      index:0,
    };
  },
  filters: {
    fecha(data) {
        return moment(data).format("LL");
    },
  },
  methods: {
    llamarpreguntas(){
      Api.llamarpreguntas().then(({data}) => {
        // console.log(data);
        var valores = [ {letras:0,valor:0}, {silabas:0,valor:0}, {oraciones:0,valor:0} ];
        data.subnivel.forEach((el,index) => {
          if(el.subnivel==1 && el.estado==1) this.letras.preguntas.push({audio:el.audio, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          if(el.subnivel==2 && el.estado==1) this.silabas.preguntas.push({audio:el.audio, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          if(el.subnivel==3 && el.estado==1) this.oraciones.preguntas.push({nombre:el.nombre,foto:el.foto, subnivel:el.subnivel, nivel:el.nivel, id:el.id});
          data.preguntas.forEach((pr,index1) => {
            if(el.id==pr.id_subnivel && el.subnivel==1){
              if(index!=valores[0].letras) valores[0].letras = index, valores[0].valor++;;
              if(!this.letras.preguntas[valores[0].valor].respuestas) this.letras.preguntas[valores[0].valor].respuestas = [];
              this.letras.preguntas[valores[0].valor].respuestas.push(pr);
            };
            if(el.id==pr.id_subnivel && el.subnivel==2){  
              if(index!=valores[1].silabas) valores[1].silabas = index, valores[1].valor++;
              if(!this.silabas.preguntas[valores[1].valor-1].respuestas) this.silabas.preguntas[valores[1].valor-1].respuestas = [];
              this.silabas.preguntas[valores[1].valor-1].respuestas.push(pr); 
            }
            if(el.id==pr.id_subnivel && el.subnivel==3){  
              if(index!=valores[2].oraciones) valores[2].oraciones = index, valores[2].valor++;
              if(!this.oraciones.preguntas[valores[2].valor-1].respuestas) this.oraciones.preguntas[valores[2].valor-1].respuestas = [];
              this.oraciones.preguntas[valores[2].valor-1].respuestas.push(pr); 
            }
          });
        });
        this.cargado=false;
      });
    },
    sonido(palabra){    
      responsiveVoice.speak(palabra, "Spanish Latin American Female");
    },
    seleccionar_letras(index, tr, index_hijo){
      if(this.variable_seleccionado.length==0){
        this.letras.preguntas.forEach(el => {
          this.variable_seleccionado.push({});
        });
      } 

      this.letras.preguntas[index].respuestas.forEach(hijo => {
        hijo.status = false;
      });

      this.letras.preguntas[index].respuestas[index_hijo].status = true;
      this.variable_seleccionado.splice(index,1,tr);
    },
    seleccionar_silabas(index, tr, index_h){
      if(this.variable_seleccionado.length==0){
        this.silabas.preguntas.forEach(el => {
          this.variable_seleccionado.push({})
        })
      }
      this.silabas.preguntas[index].respuestas.forEach(hijo => {
        hijo.status= false
      })
      this.silabas.preguntas[index].respuestas[index_h].status = true;
      this.variable_seleccionado.splice(index, 1, tr)
    },
    selec_oraciones(index, tr, index_2){
      if(this.variable_seleccionado.length==0){
        this.oraciones.preguntas.forEach(el => {
          this.variable_seleccionado.push({})
        })
      }
      this.oraciones.preguntas[index].respuestas[index_2];
      this.variable_seleccionado.splice(index,1,tr)
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
    enviaroraciones(){
      if(this.variable_seleccionado.length<=0){
        this.$vs.notification({
          square: true,
          progress: 'auto',
          color:'danger',
          title: 'Debes responder',
          text: 'Debes escribir la respuesta'
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
          this.form.audio = data.audiosb;
          this.form.id = data.id_subnivel;
          this.form.id_pregunta = data.id;
          break;
        }
        case 'editar1': {
          this.datos_modal = {
            activo:true,
            tipo:2,
            titulo:"Editar Registro",
            sb:sb
          };
          this.form_oraciones.pregunta = data.nombre;
          this.form_oraciones.respuesta = data.valor_campo;
          this.form.audio = data.audiosb;
          this.form.id = data.id_subnivel;
          this.form.id_pregunta = data.id;
          break;
        }
      }
    },
    agregar_objeto(){
      this.form.preguntas.push( {foto:'', tipo:1} );
    },
    guardar_letras(){
        let formData = new FormData();
        formData.append("audio", this.form.audio);
        formData.append("foto1", this.form.preguntas[0].foto);
        formData.append("tipo1", this.form.preguntas[0].tipo);
        formData.append("foto2", this.form.preguntas[1].foto);
        formData.append("tipo2", this.form.preguntas[1].tipo);
        // console.log(this.form);
        Api.guardar(formData, {headers: { 'Content-Type': 'multipart/form-data'},} ).then(({data}) => {
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'success',
            title: 'Guardaro exitosamente',
            text: 'Registro guardado exitosamente'
          });
          this.listar();
          this.datos_modal.activo = false;
          this.form();
        }).catch( error => {
          console.log(error);
        });
    },
    guardar_silabas(){
        let formData = new FormData();
        formData.append("audio", this.form.audio);
        formData.append("foto1", this.form.preguntas[0].foto);
        formData.append("tipo1", this.form.preguntas[0].tipo);
        formData.append("foto2", this.form.preguntas[1].foto);
        formData.append("tipo2", this.form.preguntas[1].tipo);
        Api.guardar_s(formData, {headers: { 'Content-Type': 'multipart/form-data'},} ).then(({data}) => {
          console.log(data);
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'success',
            title: 'Guardaro exitosamente',
            text: 'Registro guardado exitosamente'
          });
          this.listar();
          this.form();
          this.datos_modal.activo = false;
        }).catch( error => {
          console.log(error);
        });
    },
    guardar_oraciones(){
        let formData = new FormData();
        formData.append("pregunta", this.form_oraciones.pregunta);
        formData.append("respuesta", this.form_oraciones.respuesta);
        formData.append("imagen", this.form_oraciones.imagen);
        Api.guardar_oraciones(formData).then(({data}) => {
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'success',
            title: 'Guardaro exitosamente',
            text: 'Registro guardado exitosamente'
          });
          this.listar();
          this.form_oraciones();
          this.datos_modal.activo = false;
        }).catch( error => {
          console.log(error);
        });
    },
    recuperarimagenletras1(event){
      this.form.preguntas[0].foto = event.target.files[0];
    },
    recuperarimagenletras2(event){
      this.form.preguntas[1].foto = event.target.files[0];
    },
    recuperarimagensilabas1(event){
      this.form.preguntas[1].foto = event.target.files[0];
    },
    recuperarimagensilabas2(event){
      this.form.preguntas[1].foto = event.target.files[0];
    },
    recuperarimagenoraciones(event){
      this.form_oraciones.imagen = event.target.files[0];
    },
    forms(){
      this.form = {
        id:null,
        nombre:'',
        audio:'',
        foto:'',
        preguntas:[
          {
            foto:'',
            tipo:1,
            valor_campo:''
          },
          {
            foto:'',
            tipo:0,
            valor_campo:''
          }
        ]
      };
    },
    editar_letras(){
        let formData = new FormData();
        formData.append("audio", this.form.audio);
        formData.append("id", this.form.id);
        formData.append("id_pregunta", this.form.id_pregunta);
        formData.append("foto1", this.form.preguntas[0].foto);
        formData.append("tipo1", this.form.preguntas[0].tipo);
        // console.log(this.form);
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
        });
    },
    editar_silabas(id){
        let formData = new FormData();
        formData.append("audio", this.form.audio);
        formData.append("id", this.form.id);
        formData.append("id_pregunta", this.form.id_pregunta);
        formData.append("foto1", this.form.preguntas[0].foto);
        formData.append("tipo1", this.form.preguntas[0].tipo);
        formData.append("foto2", this.form.preguntas[1].foto);
        formData.append("tipo2", this.form.preguntas[1].tipo);
        // console.log(this.form);
        Api.editar_s(formData, {headers: { 'Content-Type': 'multipart/form-data'},} ).then(({data}) => {
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
        });
    },
    editar_oraciones(id){
        let formData = new FormData();
        formData.append("id", this.form.id);
        formData.append("id_pregunta", this.form.id_pregunta);
        formData.append("pregunta", this.form_oraciones.pregunta);
        formData.append("respuesta", this.form_oraciones.respuesta);
        formData.append("imagen", this.form_oraciones.imagen);
        Api.editar_o(formData).then(({data}) => {
          this.$vs.notification({
            square: true,
            progress: 'auto',
            color:'success',
            title: 'Modificación exitosa',
            text: 'Registro modificado exitosamente'
          });
          this.listar();
          this.datos_modal.activo = false;
          this.forms();
        }).catch( error => {
          console.log(error);
        });
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
    }
  },
  mounted() {
    this.llamarpreguntas();
    this.llamarresultados();
    this.usuario();
    this.listar();
  },
};
</script>
<style>
  .estilodecard{
    border-radius: 50px;
    cursor:pointer;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
  }
  .estilodecard:hover{
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
    -moz-transform: scale(1.01);
    -webkit-transform: scale(1.01);
    -o-transform: scale(1.01);
    -ms-transform: scale(1.01);
    transform: scale(1.01);
  }
  .seleccionado{
    border: 2px solid #195bff;
  }
  .card-ajuste{
    display: block;
    text-align: center;
  }
  .card-ajuste img{
    width: 200px;
    height: 250px;
  }

  .estilocard img{
    width: 200px;
    height: 300px;
  }
  .w-100 input{
    width: 100%!important;
  }
</style>
