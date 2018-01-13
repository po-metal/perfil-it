<template>
    <li :id="'skill_'+entity.id" class=" list-group-item" v-show="showByKeyword">
        <i v-if="submitInProgress" class="fa fa-circle-o-notch" aria-hidden="true"></i>
        <label class="col-xs-6 text-right">{{entity.name}}</label>
        <span class="rating">
        <span></span>
        <span class="star" :class="getActive(3)" @click="saveSkill(3)"></span>
        <span class="star" :class="getActive(2)" @click="saveSkill(2)"></span>
        <span class="star" :class="getActive(1)" @click="saveSkill(1)"></span>
        <span class="trash fa fa-trash-o" @click="saveSkill(0)"></span>
        </span>
    </li>

</template>


<script>
  import axios from 'axios'
  import qs from 'qs'

  export default {
    name: 'form-skill',
    props: ['skill','keyword'],
    created: function () {
      this.entity = this.skill
    },
    data() {
      return {
        entity: {
          id: "",
          name: "",
          lvl: 0,
          status: ""
        },
        h: {
          loading: false,
          isSaved: true,
          submitInProgress: false
        },
        url: {
          save: '/pi/cv-skill/save-skill'
        }
      }
    },
    methods: {
      populate: function (data) {
        this.entity.id = data.id
        this.entity.name = data.name
        this.entity.lvl = data.lvl
      },
      getActive: function (lvl) {
        if (this.entity.lvl == lvl) {
          return "active"
        }
        return null
      },
      saveSkill: function (lvl) {
        var prelvl = this.entity.lvl
        this.entity.lvl = lvl
        this.errors = []
        this.h.submitInProgress = true
        axios.post(
          this.url.save,
          qs.stringify(this.postParams)
        ).then((response) => {
          if (response.data.status) {
            this.entity.cvSkillId = response.data.cvSkillId
            this.$emit('skillUpdate', this.entity)
          } else {
            this.entity.lvl = prelvl
            this.errors = response.data.errors
          }
          this.h.submitInProgress = false
        }).catch((error) => {
          this.errors = error.response.data.errors
          this.entity.lvl = prelvl
          this.h.submitInProgress = false
        })
      }
    },
    computed: {
      postParams: function () {
        return {
          id: this.entity.id,
          lvl: this.entity.lvl
        }
      },
      showByKeyword: function(){
        return  this.entity.name.toLowerCase().indexOf(this.keyword.toLowerCase()) > -1
      }
    }
  }
</script>
