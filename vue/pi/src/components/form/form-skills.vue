<template>
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-search"></i></div>
                <input  id="searchinput" class="form-control" autocomplete="off" type="search" placeholder="Buscar..." />
            </div>
        </div>
        <div id="searchlist" class="skill-panel">
            <div v-if="skillList" v-for="category in skillList">
                <fskill v-if="category" v-for="skill in category" :skill="skill"/>

            </div>

        </div>


    </div>
</template>


<script>
  import axios from 'axios'
  import fskill from './form-skill-item.vue'
  import blf from 'bootstrap-list-filter'

  export default {
    name: 'form-skills',
    components: {fskill},
    data() {
      return {
        errors: [],
        skillList: [],
        url: {
          skillList: '/pi/cv-skill/list'
        }
      }
    },
    methods: {
      loadSkills: function () {
        axios.get(
          this.url.skillList,
          {
            headers: {
              accept: 'application/json'
            }
          }).then(
          (response) => {
            this.skillList = response.data
          }) .catch((error) => {
            this.errors = error.response.data.errors
        })
      }
    },
    created: function () {
      this.loadSkills()
      console.log(this.$refs.searchlist)
      this.$refs.searchlist.btsListFilter('#searchinput', {itemChild: 'span'})
    }
  }
</script>
