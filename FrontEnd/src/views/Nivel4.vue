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
                <div class="container" style="position:absolute;display: block;">
                  <vs-button  style="float: right;margin-right: 80px;margin-bottom: 20px;--vs-color: 25, 91, 255;border-radius: 70px;width: 40px;height: 40px;">
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
    <div  class="tab-pane fade show mt-5" id="b" role="tabpanel" aria-labelledby="leve3-tab">
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
                  <vs-button  style="float: right;margin-right: 80px;margin-bottom: 20px;--vs-color: 25, 91, 255;border-radius: 70px;width: 40px;height: 40px;">
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
            id:"1",
            oracion:"Yo abrí la boca para que el odontólogo la revisara.",
            respuesta:"Yo abrí la boca para que el odontólogo la revisara"
          },
          {
            id:"2",
            oracion:"Bárbara bendita, eres mujer entre las santas.",
            respuesta:"Bárbara bendita, eres mujer entre las santas"
          },
          {
            id:"3",
            oracion:"La Barbacoa estaba deliciosa.",
            respuesta:"La Barbacoa estaba deliciosa"
          },
          {
            id:"4",
            oracion:"La rosa es roja.",
            respuesta:"La rosa es roja"
          },
          {
            id:"5",
            oracion:"El pan es de Natalia.",
            respuesta:"El pan es de Natalia"
          },
          {
            id:"6",
            oracion:"Yo repaso un rato.",
            respuesta:"Yo repaso un rato"
          },
          {
            id:"7",
            oracion:"Zapatero a su zapato.",
            respuesta:"Zapatero a su zapato"
          },
          {
            id:"8",
            oracion:"Mi mamá me ama.",
            respuesta:"Mi mamá me ama"
          },
        ]
      },
      frases:{
        preguntas:[
          {
            id:"1",
            oracion:"En la casa de la señora sofía, a la sombra de un peral me comí un pastel. Por la ventana apareció su sobrino, el de la cara redonda y le mandó un saludo para mi tía.",
            respuesta:"En la casa de la señora sofía, a la sombra de un peral me comí un pastel. Por la ventana apareció su sobrino, el de la cara redonda y le mandó un saludo para mi tía." 
          },
          {
            id:"2",
            oracion:"Lola es la hermana de Sara. Lola es una niña pequeña que le gusta jugar en la nieve, cada vez que nieva Lola se pone sus botas, su abrigo, sus orejeras y sale a jugar.",
            respuesta:"Lola es la hermana de Sara. Lola es una niña pequeña que le gusta jugar en la nieve, cada vez que nieva Lola se pone sus botas, su abrigo, sus orejeras y sale a jugar." 
          },
          {
            id:"3",
            oracion:"La gallina roja vive en una granja, ella trabaja mucho, siembra y cosecha el trigo. Ella hace un pan muy rico. Cuando acaba su trabajo ella se come todo el pan.",
            respuesta:"La gallina roja vive en una granja, ella trabaja mucho, siembra y cosecha el trigo. Ella hace un pan muy rico. Cuando acaba su trabajo ella se come todo el pan." 
          },
          {
            id:"4",
            oracion:"Carlos es un mono muy divertido, le gusta comer bananas todo el día. A carlos le gusta ser perezoso y hacer reir a sus amigos.",
            respuesta:"Carlos es un mono muy divertido, le gusta comer bananas todo el día. A carlos le gusta ser perezoso y hacer reir a sus amigos." 
          },
          {
            id:"5",
            oracion:"Miguel le gusta la playa, a Miguel lee muchas horas. Cuando viaja miguel a la playa siempre lo acompañan sus libros.",
            respuesta:"Miguel le gusta la playa, a Miguel lee muchas horas. Cuando viaja miguel a la playa siempre lo acompañan sus libros." 
          },
        ]
      },
      value:""
    }
  },
}
</script>