<template>
    <section>
        <alert type="alert-danger" msg="Hola"></alert>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <cv-picture></cv-picture>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <cv-personal-information></cv-personal-information>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <cv-education></cv-education>
                            <cv-contact></cv-contact>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <cv-experience></cv-experience>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <cv-skills></cv-skills>
        </div>
    </section>
</template>

<script>
  import cvPersonalInformation from './cv-personal-information.vue'
  import cvPicture from './cv-picture.vue'
  import cvEducation from './cv-education.vue'
  import cvContact from './cv-contact.vue'
  import cvExperience from './cv-experiences.vue'
  import cvSkills from './cv-skills.vue'
  import alert from './utils/alert.vue'

  export default {
    name: 'cv',
    components: {
      cvPersonalInformation, cvPicture, cvEducation, cvContact, cvExperience, cvSkills, alert
    },
    mounted: function () {
      console.log(cvLoad)
    }

  }
</script>
