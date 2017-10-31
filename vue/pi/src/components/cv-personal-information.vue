<template>
    <div v-if="h.loading">
        <div data-toggle="modal" :data-target="'#'+mp.id">
            <h4 class='profile-username text-center'>{{entity.name}} {{entity.lastname}}</h4>
            <div class='text-center padding5'>{{entity.years}} años</div>
        </div>

        <modal :modalId="mp.id" :title="mp.title" :isSaved="h.isSaved">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="form-cv-personal-information">
                        <form method="POST" name="CvPersonalInformationForm" v-on:submit.prevent="save">

                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="form-group" :class="{'has-error': errors.name}">
                                    <label class="control-label">Nombre</label>
                                    <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="fa fa-id-card-o"></i></span>
                                        <input type="text" name="name" class=" form-control" v-model="entity.name"
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
                                               v-model="entity.lastname" @keydown="unsaved"></div>
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
                                               v-model="entity.birthdate"></div>
                                </div>
                            </div>

                            <div class="input-hidden">
                                <input type="hidden" name="cv" value="1">
                            </div>

                            <div class="col-lg-12 col-xs-12">
                                <input type="submit" name="submitbtn" class="btn btn-primary"
                                       value="Submit" :disabled="h.submitInProgress">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </modal>
    </div>

</template>

<script>
  import fe from './utils/form-error.vue'
  import modal from './utils/modal.vue'
  import crud from './utils/crud'

  export default {
    name: 'cv-personal-information',
    props: [],
    components: {
      fe, modal
    },
    mixins: [crud],
    data: function () {
      return {
        mp: {
          id: 'modal-cv-personal-information',
          title: 'Información Personal'
        },
        errors: [],
        entity: {
          name: 'Nombre',
          lastname: 'Apellido',
          birthdate: '',
          years: ''
        },
        url: {
          get: '/pi/cv-personal-information/get',
          save: '/pi/cv-personal-information/save'
        }
      }
    },
    methods: {
      populate: function (data) {
        this.entity.name = data.name
        this.entity.lastname = data.lastname
        this.entity.birthdate = data.birthdate
        this.entity.years = data.years
      }
    },
    computed: {
      postParams: function () {
        return {
          name: this.entity.name,
          lastname: this.entity.lastname,
          birthdate: this.entity.birthdate
        }
      }
    }
  }
</script>