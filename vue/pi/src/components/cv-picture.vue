<template>
    <div v-if="h.loading">
        <div data-toggle="modal" :data-target="'#'+mp.id">


            <div v-if="entity.src">
                <img :src="entity.src" class="img-responsive img-circle img-thumbnail"/>
            </div>
            <div v-else>
                <img src="/img/user.jpg" style="width:100px" class="img-responsive img-circle img-thumbnail"/>
            </div>


        </div>
        <modal :modalId="mp.id" :title="mp.title" :isSaved="h.isSaved">
            <div class="row">
                <form method="post" name="CvPicture" id="CvPicture" class="form-horizontal" role="form"
                      v-on:submit.prevent="save" enctype="multipart/form-data">

                    <div class="col-lg-6 col-md-6 col-xs-6 col-lg-offset-3 col-md-offset-3 col-xs-offset-3">
                        <div v-if="entity.src">
                            <img :src="entity.src" class="img-responsive img-circle img-thumbnail"/>
                        </div>
                        <div v-else>
                            <img src="/img/user.jpg" style="width:100px"
                                 class="img-responsive img-circle img-thumbnail"/>
                        </div>
                    </div>
                    <br> <br>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
                            <div class="form-group">
                                <label class="control-label"></label>
                                <label class="btn btn-default fa fa-upload">
                                    <input type="file" name="picture" id="picture" class="hidden" @change="save">
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 text-center">
                            <div class="progress progress-striped active margin6">
                                <div id="cv-picture-bar" class="progress-bar progress-bar-warning " role="progressbar"
                                     :aria-valuenow="progressBar" :style="{width: progressBar + '%' }" aria-valuemin="1"
                                     aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </modal>
    </div>
</template>

<script>
  import axios from 'axios'
  import modal from './utils/modal.vue'
  import fe from './utils/form-error.vue'

  export default {
    name: 'cv-picture',
    components: {
      fe, modal
    },
    data: function () {
      return {
        h: {
          loading: false,
          isSaved: true,
          submitInProgress: false
        },
        mp: {
          id: 'modal-cv-picture',
          title: 'Imagen de perfil'
        },
        entity: {
          src: false
        },
        progressBar: 0,
        errors: []
      }
    },
    methods: {
      initProps: function () {
        this.populate(cvLoad.cvPicture)
        this.h.loading = true
      },
      save: function () {
        this.errors = []
        this.h.submitInProgress = true
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
            this.h.submitInProgress = false
            this.timerResetBar()
          })
          .catch((error) => {
            this.errors = error.response.data.errors
            this.h.submitInProgress = false
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
            this.h.loading = true
          })
      },
      populate: function (data) {
        this.entity.src = data.src
      }
    },
    created: function () {
      this.loadProps()
    }
  }
</script>
