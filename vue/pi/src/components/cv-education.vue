<template>
  <div v-if="loading">
      <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
              <i class="fa fa-graduation-cap"></i><b> Nivel Academico</b><a class="pull-right">
             {{ education }}
             {{ state }}
          </a>
          </li>
      </ul>
      <modal :modalId="modalId" :title="modalTitle" :isSaved="isSaved">
          <div class="row">

          </div>
      </modal>
  </div>
</template>

<script>
  import crud from './utils/crud'

export default {
  name: 'cv-education',
  mixins: [crud],
  data () {
    return {
      loading: false,
      isSaved: true,
      submitInProgress: false,
      modalId: 'modal-cv-education',
      modalTitle: 'Educación',
      education: '',
      educationState: '',
      title: '',
      state: '',
      url: {
        get:  '/pi/cv-education/get',
        save: '/pi/cv-education/save'
      }
    }
  },
  methods: {
    populate: function (data) {
      this.education = data.education
      this.educationState = data.educationState
      this.title = data.title
    },
    mounted: function () {
      this.loadProps()
    }
  },
  computed: {
    postParams: function(){
      return {
        education: this.education,
        educationState: this.educationState,
        title: this.title
      }
    }
  }

}
</script>
