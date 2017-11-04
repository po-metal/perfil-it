<template>
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

        <div class="clearfix"></div>
        <br>
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
                <div class="form-group">
                    <label class="control-label"></label>
                    <label class="btn btn-default fa fa-upload">
                        <input type="file" name="picture" id="picture" class="hidden" @change="save">
                    </label>
                    <fe :errors="errors.picture"/>
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
</template>


<script>
  import fe from '../utils/form-error.vue'
  import crud from '../utils/crud'
  import saveStatus from '../utils/save-status.vue'
  import axios from 'axios'

  export default {
    name: 'form-picture',
    props: ['value', 'isSaved'],
    mixins: [crud],
    components: {fe, saveStatus},
    data() {
      return {
        errors: [],
        h: {
          loading: false,
          isSaved: true,
          submitInProgress: false
        },
        url: {
          get: '/pi/cv-picture/get',
          save: '/pi/cv-picture/save'
        },
        progressBar: 0,
        entity: {
          src: false
        }
      }
    },
    methods: {
      populate: function (data) {
        this.entity.src = data.src
      },
      getFormData: function () {
        var formData = new FormData()
        var imagefile = document.querySelector('#picture')
        formData.append('picture', imagefile.files[0])
        return formData
      },
      getConfig: function () {
        return {
          headers: {
            'content-type': 'multipart/form-data'
          },
          onUploadProgress: (progressEvent) => {
            this.progressBar = Math.round((progressEvent.loaded * 100) / progressEvent.total)
          }
        }
      },
      save: function () {
        this.errors = []
        this.h.submitInProgress = true
        axios.post(
          this.url.save,
          this.getFormData(),
          this.getConfig()
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
      }
    },
    created: function () {
      this.entity = this.value
    },
    computed: {
      postParams: function () {
        return {
          src: this.entity.src
        }
      }
    }
  }
</script>
