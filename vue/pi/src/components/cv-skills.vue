<template>
    <div>
        <div class="box box-primary" data-toggle="modal" data-target="#cv-skills-modal">
            <div class="box-header">
                <strong><i class="fa fa-star margin-r-5"></i> Habilidades Técnicas</strong>
                <button class="btn btn-default fa fa-edit btn-xs pull-right"
                        data-toggle="modal" data-target="#modal-cv-skill">
                </button>

                <skill v-if="entity" v-for="skill in entity" :skill="skill"/>

            </div>

            <modal :modalId="mp.id" :title="mp.title" :modalSize="'modal-lg'">
                <FormSkills></FormSkills>
            </modal>
        </div>
    </div>


</template>

<script>
  import skill from './skill.vue'
  import view from './utils/view'
  import modal from './utils/modal.vue'
  import FormSkills from "./form/form-skills.vue";

  export default {
    name: 'cv-skills',
    mixins: [view],
    components: {
      FormSkills,
      skill, modal},
    data() {
      return {
        mp: {
          id: 'modal-cv-skill',
          title: 'Habilidades'
        },
        entity: []
      }
    },
    methods: {
      showSkillModal: function () {
        $('#' + this.mp.id).modal("show");
      },
    }
  }
</script>
