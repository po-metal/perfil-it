<template>
        <form method="POST" name="CvPersonalInformationForm" v-on:submit.prevent="saveForm">

            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="form-group" :class="{'has-error': errors.name}">
                    <label class="control-label">Nombre</label>
                    <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="fa fa-id-card-o"></i></span>
                        <input type="text" name="name" class=" form-control" v-model="dataEntity.name"
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
                               v-model="dataEntity.lastname" @keydown="unsaved">
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
                               v-model="dataEntity.birthdate">
                    </div>
                    <fe :errors="errors.birthdate"/>
                </div>

            </div>


            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Nacionalidad</label>

                    <select name="nationality" class=" form-control" v-model="dataEntity.nationality.id"
                            @change="unsaved">
                        <option value=""></option>
                        <slot v-for="(value, key, index) in countries">
                            <option :value="key">{{value}}</option>
                        </slot>

                    </select>

                    <fe :errors="errors.nationality"/>
                </div>

            </div>

            <div class="input-hidden">
                <input type="hidden" name="cv" value="1">
            </div>

            <div class="col-lg-12 col-xs-12">
                <button  name="submitbtn" class="btn" :class="submitClass" v-if="!h.isSaved"
                          :disabled="h.submitInProgress"> {{submitValue}}</button>
            </div>
        </form>
    </template>



<script>
  import fe from '../utils/form-error.vue'

  export default {
    name: 'form-personal-information',
    props: ['value', 'countries', 'errors'],
    components: {fe},
    data() {
      return {
        h: {
          loading: false,
          isSaved: true,
          submitInProgress: false
        },
        dataEntity: {}
      }
    },
    created: function () {
      this.dataEntity = this.value
    },
    computed: {
      submitValue: function () {
        return (this.h.isSaved) ? 'Ok' : 'Guardar'
      },
      submitClass: function () {
        return (this.h.isSaved) ? 'btn-success' : 'btn-primary fa fa-save'
      },
    },
    methods: {
      saveForm: function () {
        this.$emit('saveEmit', this.dataEntity)
        //To review
        this.h.isSaved = true
      },
      unsaved: function () {
        this.h.isSaved = false
      }
    }
  }
</script>
