<template>
    <div>
        <div data-toggle="modal" data-target="#modal-cv-picture">


            <div v-if="src">
                <img :src="src" class="img-responsive img-circle img-thumbnail"/>
            </div>
            <div v-else>
                <img src="/img/user.jpg" style="width:100px" class="img-responsive img-circle img-thumbnail"/>
            </div>


        </div>
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
  import axios from 'axios'
  import qs from 'qs'
  import modal from './utils/modal.vue'
  import fe from './utils/form-error.vue'

  export default {
    name: 'cv-picture',
    components: {
      fe, modal
    },
    data: function () {
      return {
        src: false,
        isSaved: true,
        submitInProgress: false,
        modalId: 'modal-cv-picture',
        modalTitle: 'Imagen de perfil',
        progressBar: 0
      }
    },
    methods: {
      save: function () {
        this.errors = ''
        this.submitInProgress = true
        var formData = new FormData()
        var imagefile = document.querySelector('#picture')
        formData.append('picture', imagefile.files[0])
        var config = {
          headers: {
            'content-type': 'multipart/form-data'
          },
          onUploadProgress: (progressEvent) => {
            this.progressBar = Math.round((progressEvent.loaded * 100) / progressEvent.total)
          }
        }
        axios.post(
          '/pi/cv-picture/save',
          formData,
          config
        )
          .then((response) => {
            if (response.data.status) {
              this.populate(response.data.data)
            } else {
              this.errors = response.data.errors
            }
            this.submitInProgress = false
            this.timerResetBar()
          })
          .catch((error) => {
            this.errors = error.response.data.errors
            this.submitInProgress = false
            this.timerResetBar()
          })
      },
      timerResetBar: function () {
        setTimeout(() => {
          this.progressBar = 0
        }, 1000)
      },
      loadProps: function () {
        axios.get(
          '/pi/cv-picture/get',
          {
            headers: {
              accept: 'application/json'
            }
          })
          .then((response) => {
            this.populate(response.data)
          })
      },
      populate: function (data) {
        this.src = data.src
      }
    },
    mounted: function () {
      this.loadProps()
    }
  }
</script>
