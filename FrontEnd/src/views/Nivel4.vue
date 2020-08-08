<template>
<div>
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
      <vs-row>
        <vs-col vs-type="flex" vs-justify="center" vs-align="center" v-for="(tr,index) in oraciones.preguntas" :key="index">
          <div class="card m-3" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-type="flex" vs-justify="center" vs-align="center" style="margin: 30px">
                <div class="card-head text-center" style="margin-bottom: 12px">
                  <h2><span>{{tr.oracion}}</span></h2>
                </div>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="center content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: right;margin-right: 87px;margin-bottom: 35px"></vs-input>
                </div>
                <div class="container" style="position:absolute;bottom: 0px;display: block;">
                  <vs-button  style="float: right;margin-right: 80px;margin-bottom: 6px;--vs-color: 25, 91, 255;border-radius: 70px;width: 40px;height: 40px;">
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
    </div>
    <!-- frases -->
    <div  class="tab-pane fade show active mt-5" id="b" role="tabpanel" aria-labelledby="leve3-tab">
      <vs-row>
        <vs-col vs-type="flex" vs-justify="center" vs-align="center" v-for="(tr,index) in frases.preguntas" :key="index">
          <div class="card m-3" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-type="flex" vs-justify="center" vs-align="center" style="margin: 30px">
                <div class="card-head text-center" style="margin-bottom: 12px">
                  <h2><span>{{tr.oracion}}</span></h2>
                </div>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="center content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: right;margin-right: 87px;margin-bottom: 35px"></vs-input>
                </div>
                <div class="container" style="position:absolute;bottom: 0px;display: block;">
                  <vs-button  style="float: right;margin-right: 80px;margin-bottom: 6px;--vs-color: 25, 91, 255;border-radius: 70px;width: 40px;height: 40px;">
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
    </div>
    

  </div>
</div>
</template>

<script>
export default {
  data() {
    return {
      oraciones:{
        preguntas:[
          {
            oracion:"Yo abrí la boca para que el odontólogo la revisara."
          },
          {
            oracion:"Bárbara bendita, eres mujer entre las santas."
          },
          {
            oracion:"La Barbacoa estaba deliciosa."
          },
          {
            oracion:"La rosa es roja."
          },
          {
            oracion:"El pan es de Natalia."
          },
          {
            oracion:"Yo repaso un rato."
          },
          {
            oracion:"Zapatero a su zapato"
          },
          {
            oracion:"Mi mamá me ama."
          },
        ]
      },
      frases:{
        preguntas:[
          {
            oracion:"En la casa de la señora sofía, a la sombra de un peral me comí un pastel. Por la ventana apareció su sobrino, el de la cara redonda y le mandó un saludo para mi tia."
          },
          {
            oracion:"Lola es la hermana de Sara. Lola es una niña pequeña que le gusta jugar en la nieve, cada vez que nieva Lola se pone sus botas, su abrigo y sus orejeras y sale a jugar"
          },
          {
            oracion:"La gallina roja vive en una granaja, ella trabaja mucho, siembra y cosecha el trigo. Ella hace un pan muy rico. Cuando acaba su trabajo ella se come todo el pan."
          },
          {
            oracion:"Carlos es un mono muy divertido, le gusta comer bananas todo el dia. A carlos le gusta ser perezoso y hacer reir a sus amigos."
          },
          {
            oracion:"Miguel le gusta la playa, a Miguel lee muchas horas. Cuando viaja miguel a la playa siempre lo acompañan sus libros."
          },
        ]
      },
      value:""
    }
  },
}
</script>