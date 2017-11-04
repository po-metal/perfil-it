<template>
    <form method="POST" name="CvExperience" v-on:submit.prevent="save" class="form-vertical">

        <div class="clearfix"></div>
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label class="control-label">Compañia</label>
                <saveStatus :isSaved="h.isSaved"></saveStatus>
                <input type="text" name="company" class=" form-control" value="">
                <fe :errors="errors.company"/>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label class="control-label">Cargo (Normalizado por Perfil IT)</label>
                <select name="job" class=" form-control">
                    <option value=""></option>
                    <option value="1">Operador de Soporte Tecnico</option>
                    <option value="2">Implementador</option>
                    <option value="3">Lider de Proyecto</option>
                    <option value="4">Programador</option>
                </select>

                <fe :errors="errors.job"/>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label class="control-label">Cargo (Personalizado)</label>
                <input type="text" name="customJob" class=" form-control" value="">
                <fe :errors="errors.customJob"/>
            </div>
        </div>
        <div class="clearfix"></div>


        <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label class="control-label">Desde</label>
                <input type="date" name="dateFrom" class=" form-control" value="">
                <fe :errors="errors.dateFrom"/>
            </div>
            <div class="form-group">
                <input type="hidden" name="currentJob" value="0">
                <input type="checkbox" name="currentJob" autocomplete="off" value="1">
                Actualmente trabajo aquí
                <fe :errors="errors.currentJob"/>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label class="control-label">Hasta</label>
                <input type="date" name="dateTo" class=" form-control" value="">
                <fe :errors="errors.dateTo"/>
            </div>
        </div>

        <div class="clearfix"></div>
        <div id="form-group-summary">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Resumen Breve (160 Caracteres)</label>
                    <input type="text" name="summary" class=" form-control" value="">
                    <fe :errors="errors.summary"/>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="clearfix"></div>
        <div id="form-group-desc">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Descripción detallada (1000 Caraceteres)</label>
                    <textarea name="description" class=" form-control"></textarea>
                    <fe :errors="errors.description"/>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>


        <div class="input-hidden">
            <input type="hidden" name="id" value="">
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
    name: 'form-experience',
    mixins: [crud],
    props: ['value', 'isSaved'],
    data() {
      return {
        h: {
          loading: false,
          isSaved: true,
          submitInProgress: false
        },
        url: {
          get: '/pi/cv-contact/get',
          save: '/pi/cv-contact/save'
        },
        entity: {}
      }
    },
    methods: {
      populate: function (data) {
        this.entity.id = data.id
        this.entity.company = data.company
        this.entity.job = data.job
        this.entity.customJob = data.customJob
        this.entity.dateFrom = data.dateFrom
        this.entity.dateTo = data.dateTo
        this.entity.currentJob = data.currentJob
        this.entity.summary = data.summary
        this.entity.description = data.description
      }
    },
    created: function () {
      this.entity = this.value
    },
    computed: {
      postParams: function () {
        return {
          id: this.entity.id
          company: this.entity.company,
          job: this.entity.job,
          customJob: this.entity.customJob
          dateFrom: this.entity.dateFrom,
          dateTo: this.entity.dateTo,
          currentJob: this.entity.currentJob,
          summary: this.entity.summary,
          description: this.entity.description,
        }
      }
    }
  }
</script>
