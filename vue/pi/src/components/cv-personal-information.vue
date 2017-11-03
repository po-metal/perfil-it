<template>
    <div v-if="h.loading">
        <div data-toggle="modal" :data-target="'#'+mp.id">
            <h4 class='profile-username text-center'>{{entity.name}} {{entity.lastname}}</h4>
            <div class='text-center padding5'>{{entity.years}} años</div>
            <div class="pull-right"><i :class="entity.nationality.icon"></i></div>
        </div>

        <modal :modalId="mp.id" :title="mp.title" :isSaved="h.isSaved">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="form-cv-personal-information">
                        <form-personal-information v-model="entity" :countries="countries" :errors="errors"  @saveEmit="save"></form-personal-information>
                    </div>
                </div>

            </div>
        </modal>
    </div>

</template>

<script>
  import fe from './utils/form-error.vue'
  import modal from './utils/modal.vue'
  import axios from 'axios'
  import crud from './utils/crud'
  import formPersonalInformation from './form/form-personal-information.vue'

  export default {
    name: 'cv-personal-information',
    props: [],
    components: {
      fe, modal, formPersonalInformation
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
          years: '',
          nationality: {
            id: '',
            name: '',
            icon: ''
          }
        },
        url: {
          get: '/pi/cv-personal-information/get',
          save: '/pi/cv-personal-information/save',
          countryList: '/pi/country-api/list',
        },
        countries: [],
      }
    },
    methods: {
      populate: function (data) {
        this.entity.name = data.name
        this.entity.lastname = data.lastname
        this.entity.birthdate = data.birthdate
        this.entity.years = data.years
        if(data.nationality) {
          this.entity.nationality.id = data.nationality.id
          this.entity.nationality.name = data.nationality.name
          this.entity.nationality.icon = data.nationality.icon
        }
      },
      initProps: function () {
        this.populate(cvLoad.cvPersonalInformation)
        this.h.loading = true
      },
      loadCountries: function () {
        axios.get(
          this.url.countryList,
          {
            headers: {
              accept: 'application/json'
            }
          }).then(
          (response) => {
            this.countries = response.data
          })
      }
    },
    created: function(){
      this.loadCountries()
    },
    computed: {
      postParams: function () {
        return {
          name: this.entity.name,
          lastname: this.entity.lastname,
          birthdate: this.entity.birthdate,
          nationality: this.entity.nationality.id
        }
      }
    }
  }
</script>