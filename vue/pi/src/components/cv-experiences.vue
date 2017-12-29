<template>
    <div>
        <div class="box box-primary">
            <div class="box-header">
                <strong><i class="fa fa-suitcase margin-r-5"></i> Experiencia </strong>
                <button class="btn btn-default fa fa-plus-square btn-xs pull-right" @click="addExp"
                        data-toggle="modal" data-target="#cv-experience-modal">
                </button>


            </div>
            <div class="panel-body ">

                <experience v-if="entity" v-for="(exp, index) in entity" :exp="exp" :index="index"
                            v-on:editExp="modExp"/>

            </div>
        </div>
        <modal :modalId="mp.id" :title="mp.title" :modalSize="'modal-lg'">
            <form-experience v-model="expForm" :index="indexForm" v-on:remove="removeExp"/>
        </modal>
    </div>
</template>

<script>
  import modal from './utils/modal.vue'
  import experience from './experience.vue'
  import view from './utils/view'
  import formExperience from './form/form-experience.vue'

  export default {
    name: 'cv-experiences',
    mixins: [view],
    components: {experience, modal, formExperience},
    data() {
      return {
        mp: {
          id: 'modal-cv-exp',
          title: 'Experiencia'
        },
        entity: [],
        blankExp: {
          id: '',
          company: '',
          job: {
            id: null,
            name: null
          },
          customJob: '',
          dateFrom: '',
          dateTo: '',
          currentJob: '',
          summary: '',
          description: ''
        },
        expForm: {},
        indexForm: ''
      }
    },
    created: function () {
      this.expForm = this.blankExp
    },
    methods: {
      addExp: function () {
        console.log('newExp')
        console.log(this.entity)
        this.expForm = Object.assign({}, this.blankExp);
        this.indexForm = this.entity.push(this.expForm) - 1;
        this.showExpModal()
      },
      modExp: function (index) {
        console.log('modExp')
        this.expForm = this.entity[index]
        this.indexForm = index
        this.showExpModal()
      },
      showExpModal: function () {
        $('#' + this.mp.id).modal("show");
      },
      hideExpModal: function () {
        $('#' + this.mp.id).modal("hide");
      },
      removeExp: function (index) {
        console.log("removeExp: " + index)
        this.entity.splice(index,1)
        this.hideExpModal()
      }
    }
  }
</script>
