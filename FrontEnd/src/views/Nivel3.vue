<template>
<div>
  <ul class="nav nav-tabs" id="mytab2" role="tablist2">
    <li class="nav-item col-lg-4 text-center">
      <a class="nav-link active" id="level3-tab" data-toggle="tab" href="#a" role="tab" aria-controls="level3" aria-selected="true" style="border-radius: 50px">LETRAS</a>
    </li>
    <li class="nav-item col-lg-4 text-center">
      <a class="nav-link " id="leve3-tab" data-toggle="tab" href="#b" role="tab" aria-controls="leve3" aria-selected="false" style="border-radius: 50px">SÍLABAS</a>
    </li>
    <li class="nav-item col-lg-4 text-center">
      <a class="nav-link " id="lev3-tab" data-toggle="tab" href="#c" role="tab" aria-controls="lev3" aria-selected="false" style="border-radius: 50px">PALABRAS</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent2">
    <!-- letras -->
    <div  class="tab-pane fade show active mt-5" id="a" role="tabpanel" aria-labelledby="level3-tab">
      <vs-row>
        <vs-col vs-type="flex" vs-justify="center" vs-align="center">
          <div class="card m-3" style="border-radius: 50px" v-for="(tr,index) in letras.preguntas" :key="index">
            <vs-row>
              <vs-col vs-justify="flex center" w="4" style="margin: 15px;">
                <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="float: left;margin-left: 780px;border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(tr.audio)">
                  <vs-tooltip circle>
                    <i class="fas fa-volume-up fa-2x"></i>
                    <template #tooltip>
                        Escuchar
                    </template>
                  </vs-tooltip>
                </vs-button>
              </vs-col>
              <vs-col vs-justify=" flex center" style="float: left;margin-left: 390px;margin-bottom: 20px">
                <div class="content-inputs ">
                  <vs-input state="success"  placeholder="Escribir" style="float: left;margin-left: 210px"></vs-input>
                  <vs-button color="primary" style="float: left;margin-left: 190px;margin-bottom: 20px;--vs-color: 25, 91, 10;border-radius: 50px;width: 40px;height: 40px;" type="gradient" @click.prevent="sonido(tr.audio)">
                    <vs-tooltip circl>
                      <i class="fas fa-check fa-2x"></i>
                      <template #tooltip>
                        Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </div>
              </vs-col>
            </vs-row>
          </div>
        </vs-col>
      </vs-row>
    </div>
    <!-- silabas -->
    <div  class="tab-pane fade show  mt-5" id="b" role="tabpanel" aria-labelledby="leve3-tab">
      <vs-row>
        <vs-col vs-type="flex" vs-justify="center" vs-align="center">
          <div class="card m-3" style="border-radius: 50px" v-for="(tr,index) in silabas.preguntas" :key="index">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px; ">
                <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="float: right;margin-right: 523px;border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(tr.audio)">
                  <vs-tooltip circle>
                    <i class="fas fa-volume-up fa-2x"></i>
                    <template #tooltip>
                        Escuchar
                    </template>
                  </vs-tooltip>
                </vs-button>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success"   placeholder="Escribir" style=";margin-left: 100px"></vs-input>
                  <vs-button color="primary" style="float: right;margin-right: 50px;margin-bottom: 20px;--vs-color: 25, 91, 10;border-radius: 50px;width: 40px;height: 40px;" type="gradient" @click.prevent="sonido(tr.audio)">
                    <vs-tooltip circl>
                      <i class="fas fa-check fa-2x"></i>
                      <template #tooltip>
                        Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </div>
              </vs-col>
            </vs-row>
          </div>
        </vs-col>
      </vs-row>
    </div>
    <!-- palabra -->
    <div  class="tab-pane fade show  mt-5" id="c" role="tabpanel" aria-labelledby="lev3-tab">
      <vs-row>
        <vs-col vs-type="flex" vs-justify="center" vs-align="center" v-for="(tr,index) in palabras.preguntas" :key="index">
          <div class="card m-3" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px;">
                <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="float: right;margin-right: 520px;border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(tr.audio)">
                  <vs-tooltip circle>
                    <i class="fas fa-volume-up fa-2x"></i>
                    <template #tooltip>
                        Escuchar
                    </template>
                  </vs-tooltip>
                </vs-button>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success"   placeholder="Escribir" style=";margin-left: 100px"></vs-input>
                  <vs-button color="primary" style="float: right;margin-right: 50px;margin-bottom: 20px;--vs-color: 25, 91, 10;border-radius: 50px;width: 40px;height: 40px;" type="gradient" @click.prevent="sonido(tr.audio)">
                    <vs-tooltip circl>
                      <i class="fas fa-check fa-2x"></i>
                      <template #tooltip>
                        Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </div>
              </vs-col>
            </vs-row>
          </div>
        </vs-col>
      </vs-row>
    </div>
  </div>
</div>
</template>
<script src="archivos/voz.js"></script>
<script>
const $ = require('jquery');
export default {
  data(){
    return{
      letras:{
        preguntas:[
          {
            audio:"s",
          },
          {
            audio:"r",
          },
          {
            audio:"t",
          },
          {
            audio:"l",
          },
          {
            audio:"f",
          },
        ]
      },
      silabas:{
        preguntas:[
          {
            audio:"con",
          },
          {
            audio:"tu",
          },
          {
            audio:"que",
          },
          {
            audio:"ya",
          },
          {
            audio:"un",
          },
          {
            audio:"in",
          },
          {
            audio:"im",
          },
          {
            audio:"si",
          },
        ]
      },
      palabras:{
        preguntas:[
          {
            audio:"Cafetería",
          },
          {
            audio:"Jinete",
          },
          {
            audio:"Naranja",
          },
          {
            audio:"Presentador",
          },
          {
            audio:"Ballena",
          },
          {
            audio:"Sandía",
          },
          {
            audio:"Árboles",
          },
          {
            audio:"Tablero",
          },
        ]
      },
      value:""
    }
  },
  methods:{
    sonido(palabra){    
      responsiveVoice.speak(palabra, "Spanish Latin American Female");
      //var voicelist = responsiveVoice.getVoices();
      //console.log(voicelist);
    }
  }
}
</script>