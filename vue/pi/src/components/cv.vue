<template>
    <section >
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="row" >
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <cv-picture :propEntity="cv.cvPicture"
                                        :dataTarget="mp.cvPicture.id" />
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <cv-personal-information :propEntity="cv.cvPersonalInformation"
                                                     :dataTarget="mp.cvPersonalInformation.id"/>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <cv-education :propEntity="cv.cvEducation" :dataTarget="mp.cvEducation.id" />
                            <cv-contact :propEntity="cv.cvContact" :dataTarget="mp.cvContact.id"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <cv-experience :propEntity="cv.cvExperiences"></cv-experience>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <cv-skills :propEntity="cv.cvSkills"></cv-skills>
        </div>

        <div class="clearfix"></div>

        <modal :modalId="mp.cvPersonalInformation.id" :title="mp.cvPersonalInformation.title">
            <form-personal-information v-model="cv.cvPersonalInformation"></form-personal-information>
        </modal>

        <modal :modalId="mp.cvContact.id" :title="mp.cvContact.title">
            <form-contact v-model="cv.cvContact"/>
        </modal>

        <modal :modalId="mp.cvEducation.id" :title="mp.cvEducation.title">
            <form-education v-model="cv.cvEducation"/>
        </modal>


        <modal :modalId="mp.cvPicture.id" :title="mp.cvPicture.title">
            <form-picture v-model="cv.cvPicture"/>
        </modal>

    </section>
</template>

<script>
  import modal from './utils/modal.vue'
  import alert from './utils/alert.vue'
  import cvPersonalInformation from './cv-personal-information.vue'
  import cvPicture from './cv-picture.vue'
  import cvEducation from './cv-education.vue'
  import cvContact from './cv-contact.vue'
  import cvExperience from './cv-experiences.vue'
  import cvSkills from './cv-skills.vue'
  import formPersonalInformation from './form/form-personal-information.vue'
  import formContact from './form/form-contact.vue'
  import formEducation from './form/form-education.vue'
  import formPicture from './form/form-picture.vue'

  export default {
    name: 'cv',
    components: {
      modal,
      alert,
      cvPersonalInformation,
      cvPicture,
      cvEducation,
      cvContact,
      cvExperience,
      cvSkills,
      formPersonalInformation,
      formEducation,
      formContact,
      formPicture
    },
    data: function () {
      return {
        mp: {
          cvPersonalInformation: {
            id: 'modal-cv-pi',
            title: 'Información Personal'
          },
          cvPicture: {
            id: 'modal-cv-picture',
            title: 'Imagen de CV'
          },
          cvContact: {
            id: 'modal-cv-c',
            title: 'Información de Contacto'
          },
          cvEducation: {
            id: 'modal-cv-e',
            title: 'Educación'
          }
        },
        cv: {
          cvPersonalInformation: {
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
          cvPicture: {
            src: ""
          },
          cvContact: {
            email: '',
            phone: '',
            skype: ''
          },
          cvEducation: {
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
          cvExperiences: [],
          cvSkills: []
        }
      }
    },
    methods: {
      populate: function (data) {
        this.cv.cvPersonalInformation = data.cvPersonalInformation
        this.cv.cvEducation = data.cvEducation
        this.cv.cvPicture = data.cvPicture
        this.cv.cvContact = data.cvContact
        this.cv.cvExperiences = data.cvExperiences
        this.cv.cvSkills = data.cvSkills
      }
    }
    ,
    created: function () {
      console.log(cvLoad)
      this.populate(cvLoad)
    }
  }
</script>
