<template>
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-search"></i></div>
                <input  id="searchinput" class="form-control" autocomplete="off" type="search" placeholder="Buscar..." />
            </div>
        </div>
        <div id="searchlist" class="skill-panel">
            <skill v-if="entity" v-for="skill in entity" :skill="skill"/>
        </div>


    </div>
</template>


<script>
  import saveStatus from '../utils/save-status.vue'
  import axios from 'axios'

  export default {
    name: 'form-skills',
    props: ['value', 'isSaved'],
    mixins: [crud],
    components: {saveStatus},
    data() {
      return {
        errors: [],
        entity: [],
        h: {
          loading: false,
          isSaved: true,
          submitInProgress: false
        },
        url: {
          save: '/pi/cv-skill/save'
        }
      }
    },
    methods: {
      populate: function (data) {
        this.entity.src = data.src
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
