<template>
    <section v-if="h.loading" >
        <div data-toggle="modal" :data-target="'#'+mp.id">
        <ul class="list-group list-group-unbordered" style="margin-bottom: 0; border-bottom: none">
            <li class="list-group-item">
                <i class="fa fa-graduation-cap"></i><b> Nivel Academico</b><a class="pull-right">
                {{ entity.education.name }} {{ entity.state.name }}
            </a>
            </li>
        </ul>
        </div>
        <modal :modalId="mp.id" :title="mp.title" :isSaved="h.isSaved">
            <div class="row">
                <form method="POST" name="CvEducation" v-on:submit.prevent="save" class="form-vertical">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">Educación</label>
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
                            <select name="educationState" class=" form-control" v-model="entity.state.id" @change="unsaved">
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
                        <input type="submit" name="submitbtn" class="btn btn-primary" value="Submit"
                               :disabled="h.submitInProgress">
                    </div>
                </form>

            </div>
        </modal>
    </section>
</template>

<script>
  import fe from './utils/form-error.vue'
  import modal from './utils/modal.vue'
  import crud from './utils/crud'

  export default {
    name: 'cv-education',
    mixins: [crud],
    components: {
      fe, modal
    },
    data: function () {
      return {
        mp: {
          id: 'modal-cv-education',
          title: 'Educación'
        },
        entity: {
          education: {
            id: '',
            name: ''
          },
          state: {
            id: '',
            name: ''
          },
          title: ''
        },
        url: {
          get: '/pi/cv-education/get',
          save: '/pi/cv-education/save'
        }
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
    computed: {
      postParams: function () {
        return {
          education: this.entity.education.id,
          educationState: this.entity.state.id,
          title: this.entity.title
        }
      }
    }

  }
</script>
