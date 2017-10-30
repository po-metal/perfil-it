<template>
    <div>
        <div data-toggle="modal" data-target="#modal-cv-personal-information">
            <h4 class='profile-username text-center'>{{name}} {{lastname}}</h4>
            <div class='text-center padding5'>{{years}} años</div>
        </div>

        <modal :modalId="modalId" :title="modalTitle" :isSaved="isSaved">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="form-cv-personal-information">
                        <form method="POST" name="CvPersonalInformationForm" v-on:submit.prevent="save"
                              action="/pi/cv-personal-information/main" id="CvPersonalInformationForm">

                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="form-group" :class="{'has-error': errors.name}">
                                    <label class="control-label">Nombre</label>
                                    <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="fa fa-id-card-o"></i></span>
                                        <input type="text" name="name" class=" form-control" v-model="name"
                                               @keydown="unsaved">
                                    </div>
                                    <fe :errors="errors.name">
                                    </fe>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="form-group" :class="{'has-error': errors.lastname}">
                                    <label class="control-label">Apellido</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                        <input type="text" name="lastname" class=" form-control"
                                               v-model="lastname" @keydown="unsaved"></div>
                                    <fe :errors="errors.lastname">
                                    </fe>

                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Fecha de Nacimiento</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                                        <input type="date" name="birthdate" class=" form-control"
                                               v-model="birthdate"></div>
                                </div>
                            </div>

                            <div class="input-hidden">
                                <input type="hidden" name="cv" value="1">
                            </div>

                            <div class="col-lg-12 col-xs-12">
                                <input type="submit" name="submitbtn" class="btn btn-primary"
                                       value="Submit" :disabled="submitInProgress">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </modal>
    </div>

</template>

<script>
  import axios from 'axios'
  import qs from 'qs'
  import fe from './utils/form-error.vue'
  import modal from './utils/modal.vue'

  export default {
    name: 'cv-personal-information',
    props: [],
    data: function () {
      return {
        errors: [],
        isSaved: true,
        modalId: 'modal-cv-personal-information',
        modalTitle: 'Información Personal',
        name: 'Nombre',
        lastname: 'Apellido',
        birthdate: '',
        years: '',
        submitInProgress: false
      }
    },
    components: {
      fe, modal
    },
    methods: {
      unsaved: function () {
        this.isSaved = false
      },
      save: function () {
        this.errors = ''
        this.submitInProgress = true
        axios.post(
          '/pi/cv-personal-information/save', qs.stringify({
            name: this.name,
            lastname: this.lastname,
            birthdate: this.birthdate
          })
        ).then((response) => {
          if (response.data.status) {
            this.isSaved = true
            this.populate(response.data.data)
          } else {
            this.errors = response.data.errors
          }
          this.submitInProgress = false
        }).catch((error) => {
          this.errors = error.response.data.errors
          this.submitInProgress = false
        })
      },
      loadProps: function () {
        axios.get(
          '/pi/cv-personal-information/get',
          {
            headers: {
              accept: 'application/json'
            }
          }).then((response) => {
          this.populate(response.data)
        })
      },
      populate: function (data) {
        this.name = data.name
        this.lastname = data.lastname
        this.birthdate = data.birthdate
        this.years = data.years
      }
    },
    mounted: function () {
      this.loadProps()
    },
    computed: {}
  }
</script>