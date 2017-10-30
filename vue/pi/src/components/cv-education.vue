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
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
                  <form method="post" name="CvPicture" id="CvPicture" class="form-horizontal" role="form"
                        v-on:submit.prevent="save" enctype="multipart/form-data">
                      <div class="col-lg-12 col-md-12 col-xs-12">
                          <div class="form-group">
                              <label class="control-label"></label>
                              <label class="btn btn-default fa fa-upload">
                                  <input type="file" name="picture" id="picture" class="hidden" @change="save">
                              </label>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 text-center">
                  <div class="progress progress-striped active margin6">
                      <div id="cv-picture-bar" class="progress-bar progress-bar-warning " role="progressbar"
                           :aria-valuenow="progressBar" :style="{width: progressBar + '%' }" aria-valuemin="1" aria-valuemax="100">
                      </div>
                  </div>
              </div>
          </div>
      </modal>
  </div>
</template>

<script>
export default {
  name: 'cv-education',
  data () {
    return {
      loading: false,
      isSaved: true,
      submitInProgress: false,
      modalId: 'modal-cv-education',
      modalTitle: 'Educación',
      education: '',
      state: ''
    }
  },
  methods: {
    unsaved: function () {
      this.isSaved = false
    },
    save: function () {
      this.errors = ''
      this.submitInProgress = true
      axios.post(
        '/pi/cv-education/save', qs.stringify({
          education: this.education,
          educationState: this.educationState,
          title: this.title
        })
      ).then((response) => {
        if (response.data.status) {
          this.isSaved = true
          this.populate(response.data.data)
        } else {
          this.errors = response.data.errors
        }
        this.submitInProgress = false
      }).catch((error) => {
        this.errors = error.response.data.errors
        this.submitInProgress = false
      })
    },
    loadProps: function () {
      axios.get(
        '/pi/cv-education/get',
        {
          headers: {
            accept: 'application/json'
          }
        })
        .then((response) => {
          this.populate(response.data)
          this.loading = true
        })
    },
    populate: function (data) {
      this.education = data.education
      this.state = data.state
    },
    mounted: function () {
      this.loadProps()
    }
  }

}
</script>
