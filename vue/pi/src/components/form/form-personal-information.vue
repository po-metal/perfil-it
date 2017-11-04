<template>
        <form method="POST" name="CvPersonalInformationForm" v-on:submit.prevent="save">

            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="form-group" :class="{'has-error': errors.name}">
                    <label class="control-label">Nombre</label>  <saveStatus :isSaved="h.isSaved"></saveStatus>
                    <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="fa fa-id-card-o"></i></span>
                        <input type="text" name="name" class=" form-control" v-model="entity.name"
                               @keydown="unsaved">
                    </div>
                    <fe :errors="errors.name"/>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="form-group" :class="{'has-error': errors.lastname}">
                    <label class="control-label">Apellido</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                        <input type="text" name="lastname" class=" form-control"
                               v-model="entity.lastname" @keydown="unsaved">
                    </div>
                    <fe :errors="errors.lastname"/>

                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Fecha de Nacimiento</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                        <input type="date" name="birthdate" class=" form-control"
                               v-model="entity.birthdate">
                    </div>
                    <fe :errors="errors.birthdate"/>
                </div>

            </div>


            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Nacionalidad</label>

                    <select name="nationality" class=" form-control" v-model="entity.nationality.id"
                            @change="unsaved">
                        <option value=""></option>
                        <slot v-for="(value, key, index) in countries">
                            <option :value="key">{{value}}</option>
                        </slot>

                    </select>

                    <fe :errors="errors.nationality"/>
                </div>

            </div>

            <div class="col-lg-12 col-xs-12">
                <button  name="submitbtn" class="btn" :class="submitClass" v-if="!h.isSaved"
                          :disabled="h.submitInProgress"> {{submitValue}}</button>
            </div>
        </form>
    </template>



<script>
  import fe from '../utils/form-error.vue'
  import crud from '../utils/crud'
  import saveStatus from '../utils/save-status.vue'
  import axios from 'axios'

  export default {
    name: 'form-personal-information',
    props: ['value', 'isSaved'],
    mixins: [crud],
    components: {fe,saveStatus},
    data() {
      return {
        errors: [],
        h: {
          loading: false,
          isSaved: true,
          submitInProgress: false
        },
        url: {
          get: '/pi/cv-personal-information/get',
          save: '/pi/cv-personal-information/save',
          countryList: '/pi/country-api/list',
        },
        countries: [],
        entity: {}
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
      this.entity = this.value
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
