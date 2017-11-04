<template>
    <div class="box box-primary" data-toggle="modal" data-target="#cv-skills-modal">
        <div class="box-header">
            <strong><i class="fa fa-star margin-r-5"></i> Habilidades Técnicas</strong>
        </div>
        <div class="box-body ">
            <skill v-if="entity"  v-for="skill in entity" :skill="skill" />

        </div>

    </div>
</template>

<script>
  import skill from './skill.vue'
  import view from './utils/view'

export default {
  name: 'cv-skills',
  mixins: [view],
  components: {skill},
  data() {
    return {
      entity: []
    }
  },
}
</script>
