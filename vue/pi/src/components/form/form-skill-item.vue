<template>
    <li :id="'skill_'+entity.id" class=" list-group-item">
        <label class="col-xs-6 text-right">{{entity.name}}</label>
        <span class="rating">
        <span ></span>
        <span  class="star" :class="getActive(3)"  @click="saveSkill(3)"></span>
        <span  class="star" :class="getActive(2)" @click="saveSkill(2)"></span>
        <span  class="star" :class="getActive(1)" @click="saveSkill(1)"></span>
        <span  class="trash fa fa-trash-o" @click="trashSkill"></span>
        </span>
    </li>

</template>


<script>
  import axios from 'axios'
  import qs from 'qs'

  export default {
    name: 'form-skills',
    props: ['skill'],
    created: function () {
      this.entity = this.skill
    },
    data() {
      return {
        entity: {
          id: "",
          name: "",
          lvl: 0
        },
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
        this.entity.id = data.id
        this.entity.name = data.name
        this.entity.lvl = data.lvl
      },
      getActive : function (lvl){
        if(this.entity.lvl == lvl){
          return "active"
        }
        return null
      },
      trashSkill: function (){

      },
      saveSkill: function (lvl) {
        this.entity.lvl = lvl
        this.errors = []
        this.h.submitInProgress = true
        axios.post(
          this.url.save,
          qs.stringify(this.postParams)
        )
          .then((response) => {
            if (response.data.status) {
              this.populate(response.data.data)
            } else {
              this.errors = response.data.errors
            }
            this.h.submitInProgress = false
          })
          .catch((error) => {
            this.errors = error.response.data.errors
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
      }
    }
  }
</script>
