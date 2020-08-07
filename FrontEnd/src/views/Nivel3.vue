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
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
                </div>
              </vs-col>
            </vs-row>
          </div>
          <div style="margin: 30px"></div>
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
                </div>
              </vs-col>
            </vs-row>
          </div>
          <div style="margin: 30px"></div>
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
                </div>
              </vs-col>
            </vs-row>
          </div>
          <div style="margin: 30px"></div>
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
                </div>
              </vs-col>
            </vs-row>
          </div>
          <div style="margin: 30px"></div>
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
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
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
                </div>
              </vs-col>
            </vs-row>
          </div>
          <div style="margin: 30px"></div>
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
                </div>
              </vs-col>
            </vs-row>
          </div>
          <div style="margin: 30px"></div>
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
                </div>
              </vs-col>
            </vs-row>
          </div>
          <div style="margin: 30px"></div>
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
                </div>
              </vs-col>
            </vs-row>
          </div>
          <div style="margin: 30px"></div>
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
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
        <vs-col vs-type="flex" vs-justify="center" vs-align="center">
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
                </div>
              </vs-col>
            </vs-row>
          </div>
          <div style="margin: 30px"></div>
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
                </div>
              </vs-col>
            </vs-row>
          </div>
          <div style="margin: 30px"></div>
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
                </div>
              </vs-col>
            </vs-row>
          </div>
          <div style="margin: 30px"></div>
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
                </div>
              </vs-col>
            </vs-row>
          </div>
          <div style="margin: 30px"></div>
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
                </div>
              </vs-col>
            </vs-row>
          </div>
          <div style="margin: 30px"></div>
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
                </div>
              </vs-col>
            </vs-row>
          </div>
          <div style="margin: 30px"></div>
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
                </div>
              </vs-col>
            </vs-row>
          </div>
          <div style="margin: 30px"></div>
          <div class="card" style="border-radius: 50px">
            <vs-row>
              <vs-col vs-justify="flex" style="margin: 15px">
                <center style="margin-bottom: 12px">
                  <vs-button color="dark" type="gradient" class="col-lg-4 p-3" style="border-radius:;width: 90px;height: 90px;" @click.prevent="sonido(valores)">
                    <vs-tooltip circle>
                      <i class="fas fa-volumen-up fa-2x"></i>
                      <template #tooltip>
                          Escuchar
                      </template>
                    </vs-tooltip>
                  </vs-button>
                </center>
              </vs-col>
              <vs-col vs-justify="flex" class="container" w="4">
                <div class="content-inputs">
                  <vs-input state="success" success v-model="value" placeholder="Escribir" style="float: left;margin-left: 100px;margin-bottom: 35px"></vs-input>
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
      valores:['hola']
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