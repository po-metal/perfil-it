<template>
    <li :id="'skill_'+entity.id" class=" list-group-item">
        <label class="col-xs-6 text-right">{{entity.name}}</label>
        <span class="rating">
        <span ></span>
        <span  class="star" :class="getStar3"  @click="save(3)"></span>
        <span  class="star" :class="getStar2" onclick="cv.cv_skill.setSkill(<?php echo $skill->getId(); ?>,'<?php echo $skill->getName(); ?>',2)"></span>
        <span  class="star" :class="getStar1" onclick="cv.cv_skill.setSkill(<?php echo $skill->getId(); ?>,'<?php echo $skill->getName(); ?>',1)"></span>
        <span  class="trash fa fa-trash-o" onclick="cv.cv_skill.setSkill(<?php echo $skill->getId(); ?>,'<?php echo $skill->getName(); ?>',0)"></span>
        </span>
    </li>

</template>


<script>
  import saveStatus from '../utils/save-status.vue'
  import axios from 'axios'

  export default {
    name: 'form-skills',
    props: ['value', 'isSaved'],
    components: {saveStatus},
    data() {
      return {
        errors: [],
        entity: {
          id: "",
          name: "",
          lvl: ""
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
     getStar3 : function (){
        if(entity.lvl == 3){
          return "active"
        }
        return null
      },
      getStar2 : function (){
        if(entity.lvl == 2){
          return "active"
        }
        return null
      },
      getStar1 : function (){
        if(entity.lvl == 1){
          return "active"
        }
        return null
      }
    }
  }
</script>
