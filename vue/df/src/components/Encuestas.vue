<template>
    <div id="encuestas" class="box">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 box-body">
            <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
                Titulo = {{ encuesta.titulo }}
            </div>
            <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
                Tiempo = {{ encuesta.tiempo }} minutos
            </div>
            <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
                Version = {{ encuesta.version }}
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 pull-left">
                <ul>
                    <li v-for="item in encuesta.preguntas">
                        {{ item.pregunta }}
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 pull-right">

            </div>

        </div>
    </div>
</template>

<script>
export default {
  name: 'encuestas',
  data() {
    return {
      encuesta: {
        titulo: 'Un Examen',
        tiempo: 20,
        version: 13,
        preguntas: [
          {
            id: 1,
            pregunta: 'Una pregunta',
            respuestas: [
              {id: 1, respuesta: 'respuesta 1', value: false},
              {id: 2, respuesta: 'respuesta 2', value: false,}
            ]
          }
        ]
      }
    }
  }
}
</script>


