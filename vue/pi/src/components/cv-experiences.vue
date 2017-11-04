<template>
    <div class="box box-primary">
        <div class="box-header">
            <strong><i class="fa fa-suitcase margin-r-5"></i> Experiencia </strong>
            <button class="btn btn-default fa fa-plus-square btn-xs pull-right" @click="addJob"
                    data-toggle="modal" data-target="#cv-experience-modal">
            </button>


        </div>
        <div class="panel-body ">

            <experience v-if="entity"  v-for="exp in entity" :exp="exp" :editJob="editJob(id)" />

        </div>
    </div>
</template>

<script>
  import experience from './experience.vue'
  import view from './utils/view'
  export default {
    name: 'cv-experiences',
    mixins: [view],
    components: {experience},
    data() {
      return {
        entity: []
      }
    },
    methods: {
      addJob: function (){

      },
      editJob: function (id){
        console.log(id)
      }
    }
  }
</script>
