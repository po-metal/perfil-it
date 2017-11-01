<template>
    <div class="box box-primary">
        <div class="box-header">
            <strong><i class="fa fa-suitcase margin-r-5"></i> Experiencia </strong>
            <button class="btn btn-default fa fa-plus-square btn-xs pull-right" onclick="cv.cv_experience.add()"
                    data-toggle="modal" data-target="#cv-experience-modal">
            </button>


        </div>
        <div class="panel-body ">

            <experience v-if="experiences"  v-for="exp in experiences" :exp="exp" />

        </div>
    </div>
</template>

<script>
  import experience from './experience.vue'

  export default {
    name: 'cv-experiences',
    componentes: [experience],
    data() {
      return {
        experiences: []
      }
    }
  }
</script>
