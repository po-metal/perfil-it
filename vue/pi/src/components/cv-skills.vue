<template>
    <div>
        <div class="box box-primary" data-toggle="modal" data-target="#cv-skills-modal">
            <div class="box-header">
                <strong><i class="fa fa-star margin-r-5"></i> Habilidades Técnicas</strong>
                <button class="btn btn-default fa fa-edit btn-xs pull-right"
                        data-toggle="modal" data-target="#modal-cv-skill">
                </button>
            </div>
            <div class="box-body ">
                <skill v-if="entity" v-for="skill in entity" :skill="skill"/>

            </div>

            <modal :modalId="mp.id" :title="mp.title" :modalSize="'modal-lg'">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Explorador de Habilidades</h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                    <input  id="searchinput" class="form-control" autocomplete="off" type="search" placeholder="Buscar..." />
                                </div>
                            </div>
                            <div id="searchlist" class="skill-panel">
                                ...
                                ...
                            </div>
                        </div>
                    </div>
                </div>
            </modal>
        </div>
    </div>


</template>

<script>
  import skill from './skill.vue'
  import view from './utils/view'
  import modal from './utils/modal.vue'

  export default {
    name: 'cv-skills',
    mixins: [view],
    components: {skill, modal},
    data() {
      return {
        mp: {
          id: 'modal-cv-skill',
          title: 'Experiencia'
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
