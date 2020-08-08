<template>
  <div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item col-lg-4 text-center">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="border-radius: 50px">LETRAS DEL ABECEDARIO</a>
      </li>
      <li class="nav-item col-lg-4 text-center">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" style="border-radius: 50px">COMPARACIÓN DE LETRAS</a>
      </li>
      <li class="nav-item col-lg-4 text-center">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" style="border-radius: 50px">Sílabas</a>
      </li>
    </ul> 
    <div class="tab-content" id="myTabContent">
      <!-- letras -->
      <div class="tab-pane fade show active mt-5" id="home" role="tabpanel" aria-labelledby="home-tab">
        <vs-row>
          <vs-col vs-type="flex" vs-justify="center" vs-align="center" class="col-lg-4 col-md-6 p-0" v-for="(tr,index) in valores" :key="index">
            <div class="col-lg-12 mb-4">
              <div class="card" style="border-radius: 50px">
                <img :src="'archivos/imagenes/ejercicios/'+tr+'.png'" class="w-100" style="border-radius: 50px"/>
                <div class="card-head text-center">
                  Mayúscula - Minúscula
                </div>
                <vs-row vs-justify="flex-end" style="position:absolute;bottom: 0px;display: block;">
                  <vs-button color="primary" type="gradient" style="float: right;margin-right: -12px;margin-bottom: -10px;--vs-color: 25, 91, 255;border-radius: 89px;width: 40px;height: 40px;" @click.prevent="sonido(tr)">
                    <vs-tooltip circle>
                      <i class="fas fa-volume-up fa-2x"></i>
                      <template #tooltip>
                        Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </vs-row>
              </div>
            </div>
          </vs-col>
        </vs-row>
      </div>
      <!-- comparacion letras -->
      <div class="tab-pane fade mt-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <vs-row>
          <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="6" v-for="(tr,index) in comparacion" :key="index">
            <div class="col-lg-12 mb-4">
              <div class="card" style="border-radius: 50px">
                <img :src="'archivos/imagenes/ejercicios/'+tr+'.png'" class="w-100" style="border-radius: 50px"/>
                <div class="card-head text-center">
                  Mayúscula - Minúscula
                </div>
                <vs-row vs-justify="flex-end" style="position:absolute;bottom: 0px;display: block;">
                  <vs-button color="primary" type="gradient" style="float: right;margin-right: -12px;margin-bottom: -10px;--vs-color: 25, 91, 255;border-radius: 89px;width: 40px;height: 40px;" @click.prevent="sonido(tr)">
                    <vs-tooltip circle>
                      <i class="fas fa-volume-up fa-2x"></i>
                      <template #tooltip>
                        Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </vs-row>
              </div>
            </div>
          </vs-col>
        </vs-row>
      </div>
      <!-- silabas -->
      <div class="tab-pane fade mt-5" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <vs-row>
          <vs-col vs-type="flex" vs-justify="" vs-align="" w="6" v-for="(tr,index) in silabas.preguntas" :key="index">
            <div class="col-lg-12 mb-4">
              <div class="card m-3" style="border-radius: 50px" v-for="(tr,index) in tr.respuestas" :key="index">
                <img :src="'archivos/imagenes/silabas/'+tr+'.png'" class="w-100" style="border-radius: 50px"/>
                <vs-row vs-justify="flex-end" style="position:absolute;bottom: 0px;display: block;">
                  <vs-button color="primary" type="gradient" style="float: right;margin-right: -12px;margin-bottom: -10px;--vs-color: 25, 91, 255;border-radius: 89px;width: 40px;height: 40px;" @click.prevent="sonido(tr)">
                    <vs-tooltip circle>
                      <i class="fas fa-volume-up fa-2x"></i>
                      <template #tooltip>
                        Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </vs-row>
              </div>
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
  data() {
    return {
      valores: ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u','v','w','x','y','z'],
      comparacion: ['b','d','p','q','m','n','s','z'],
      silabas:{
        preguntas:[
          { 
            respuestas:['la','le','li','lo','lu',]
          },
          {
            respuestas:['al','el','il','ol','ul',]
          },
          {
            respuestas:['da','de','di','do','du',]
          },
          {
            respuestas:['ad','ed','id','od','ud',]
          },
          {
            respuestas:['ma','me','mi','mo','mu',]
          },
          {
            respuestas:['am','em','im','om','um',]
          },
          {
            respuestas:['na','ne','ni','no','nu',]
          },
          {
            respuestas:['an','en','in','on','un',]
          },
          {
            respuestas:['pa','pe','pi','po','pu',]
          },
          {
            respuestas:['ap','ep','ip','op','up',]
          },
          {
            respuestas:['ra','re','ri','ro','ru',]
          },
          {
            respuestas:['ar','er','ir','or','ur',]
          },
          {
            respuestas:['sa','se','si','so','su',]
          },
          {
            respuestas:['as','es','is','os','us',]
          },
        ]
      }
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