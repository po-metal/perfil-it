<template>
    <div>

        <form method="POST" name="CvExperience" v-on:submit.prevent="save" class="form-vertical" id="CvExperience">

            <div class="clearfix"></div>

            <div class="input-hidden">
                <input type="hidden" name="id" v-model="entity.id">
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Compañia</label>
                    <saveStatus :isSaved="h.isSaved"></saveStatus>
                    <input type="text" name="company" class=" form-control" value="" v-model="entity.company"
                           @keydown="unsaved">
                    <fe :errors="errors.company"/>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Cargo/Posición</label>
                    <Autocomplete ref="cj"
                                  :init-value="entity.customJob"
                                  name="customJob"
                                  id="customJob"
                                  :min="3"
                                  :debounce="250"
                                  :classes="{ wrapper: 'form-wrapper', input: 'form-control', list: 'data-list', item: 'data-list-item' }"
                                  url="/pi/job-ac/search"
                                  anchor="name"
                                  label=""
                                  :on-select="onSelectJob"
                                  :on-input="onInputtJob"
                    ></Autocomplete>
                    <fe :errors="errors.customJob"/>
                </div>
            </div>
            <div class="clearfix"></div>


            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Desde</label>
                    <input type="date" name="dateFrom" class=" form-control" v-model="entity.dateFrom"
                           @keydown="unsaved"
                           @change="unsaved">
                    <fe :errors="errors.dateFrom"/>
                </div>
                <div class="form-group">

                    <input type="checkbox" name="currentJob" autocomplete="off" v-model="entity.currentJob"
                           @keydown="unsaved" @change="unsaved">
                    Actualmente trabajo aquí
                    <fe :errors="errors.currentJob"/>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Hasta</label>
                    <input type="date" name="dateTo" class=" form-control" v-model="entity.dateTo" @keydown="unsaved"
                           @change="unsaved">
                    <fe :errors="errors.dateTo"/>
                </div>
            </div>

            <div class="clearfix"></div>
            <div id="form-group-summary">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label class="control-label">Resumen Breve (160 Caracteres)</label>
                        <input type="text" name="summary" class=" form-control" v-model="entity.summary"
                               @keydown="unsaved"
                               @change="unsaved">
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
                        <textarea name="description" class=" form-control" v-model="entity.description"
                                  @keydown="unsaved"
                                  @change="unsaved"></textarea>
                        <fe :errors="errors.description"/>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>


            <div class="col-lg-12 col-xs-12">
                <button name="submitbtn" class="btn" :class="submitClass" v-if="!h.isSaved"
                        :disabled="h.submitInProgress"> {{submitValue}}
                </button>


            </div>
        </form>
        <div class="pull-right">
            <button name="delete" class="btn text-danger fa fa-trash" @click="del" :disabled="h.submitInProgress">
            </button>
        </div>
    </div>
</template>

<script>
  import fe from '../utils/form-error.vue'
  import crud from '../utils/crud'
  import saveStatus from '../utils/save-status.vue'
  import Autocomplete from 'vue2-autocomplete-js';

  export default {
    name: 'form-experience',
    mixins: [crud],
    components: {
      saveStatus, fe, Autocomplete
    },
    props: ['value', 'isSaved', 'index'],
    data() {
      return {
        errors: [],
        h: {
          loading: false,
          isSaved: true,
          submitInProgress: false
        },
        url: {
          get: '/pi/cv-experience/get',
          save: '/pi/cv-experience/save',
          delete: '/pi/cv-experience/delete'
        },
        entity: {
          id: '',
          company: '',
          job: '',
          customJob: 'Initial',
          dateFrom: '',
          dateTo: '',
          currentJob: '',
          summary: '',
          description: ''
        }
      }
    },
    methods: {
      onSelectJob: function(obj){
        this.entity.customJob = obj.name
        this.unsaved()
      },
      onInputtJob: function(obj){
        this.entity.customJob = obj
        this.unsaved()
      },
      populate: function (data) {
        this.entity.id = data.id
        this.entity.company = data.company
        this.entity.customJob = data.job.name
        this.entity.dateFrom = data.dateFrom
        this.entity.dateTo = data.dateTo
        this.entity.currentJob = data.currentJob
        this.entity.summary = data.summary
        this.entity.description = data.description
        this.entity.time = data.time
      },
      onDelete: function () {
        this.$emit('remove', this.index)

      }
    },
    created: function () {
      this.entity = this.value
      },
    watch: {
      value: function (newVal, oldVal) { // watch it
        this.entity = newVal
        this.$refs.cj.type = this.entity.customJob
      }
    },
    computed: {
      postParams: function () {
        return {
          id: this.entity.id,
          company: this.entity.company,
          customJob: this.entity.customJob,
          dateFrom: this.entity.dateFrom,
          dateTo: this.entity.dateTo,
          currentJob: this.getCurrentJob,
          summary: this.entity.summary,
          description: this.entity.description,
        }
      },
      getCurrentJob: function () {
        return this.entity.currentJob | 0
      },
      deleteParams: function () {
        return {
          id: this.entity.id
        }
      }
    }
  }
</script>
