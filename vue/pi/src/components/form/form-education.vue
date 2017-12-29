<template>
    <form method="POST" name="CvEducation" v-on:submit.prevent="save">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label class="control-label">Educación</label>
                <saveStatus :isSaved="h.isSaved"></saveStatus>
                <select name="education" class=" form-control" v-model="entity.education.id" @change="unsaved">
                    <option value=""></option>
                    <option value="1">Primario</option>
                    <option value="2">Secundario</option>
                    <option value="3">Terciario</option>
                    <option value="4">Universitario</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label class="control-label">Estado</label>
                <select name="state" class=" form-control" v-model="entity.state.id" @change="unsaved">
                    <option value=""></option>
                    <option value="1">En Curso</option>
                    <option value="2">Incompleto</option>
                    <option value="3">Completo</option>
                </select>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label class="control-label">Título (Opcional)</label>
                <input type="text" name="title" class=" form-control" v-model="entity.title" @keydown="unsaved">
                <p class="help-block">Ej: Ingeniero,
                    Licenciado, DBA, Programador, Consultor, Especialista IT, Etc
                </p>
            </div>
        </div>

        <div class="col-lg-12 col-xs-12">
            <button name="submitbtn" class="btn" :class="submitClass" v-if="!h.isSaved"
                    :disabled="h.submitInProgress"> {{submitValue}}
            </button>
        </div>
    </form>
</template>


<script>
  import fe from '../utils/form-error.vue'
  import crud from '../utils/crud'
  import saveStatus from '../utils/save-status.vue'

  export default {
    name: 'form-education',
    props: ['value', 'isSaved'],
    mixins: [crud],
    components: {fe, saveStatus},
    data() {
      return {
        errors: [],
        h: {
          loading: false,
          isSaved: true,
          submitInProgress: false
        },
        url: {
          get: '/pi/cv-education/get',
          save: '/pi/cv-education/save'
        },
        entity: {}
      }
    },
    methods: {
      populate: function (data) {
        this.entity.education.id = data.education.id
        this.entity.education.name = data.education.name
        this.entity.state.id = data.state.id
        this.entity.state.name = data.state.name
        this.entity.title = data.title
      }
    },
    created: function () {
      this.entity = this.value
    },
    computed: {
      postParams: function () {
        return {
          education: this.entity.education.id,
          state: this.entity.state.id,
          title: this.entity.title
        }
      }
    }
  }
</script>
