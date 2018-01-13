<template>
    <div>
        <div class="box box-primary" data-toggle="modal" data-target="#cv-skills-modal">
            <div class="box-header">
                <strong><i class="fa fa-star margin-r-5"></i> Habilidades Técnicas</strong>
                <button class="btn btn-default fa fa-edit btn-xs pull-right"
                        data-toggle="modal" data-target="#modal-cv-skill">
                </button>
                <div class="clearfix"></div>

                <skill v-if="entity" v-for="skill in entity" :skill="skill" :key="skill.id"/>

            </div>

            <modal :modalId="mp.id" :title="mp.title" :modalSize="'modal-lg'">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-search"></i></div>
                            <input id="searchinput" class="form-control" autocomplete="off" type="search"
                                   placeholder="Buscar..." v-model="keyword"/>
                        </div>
                    </div>
                    <div id="searchlist" class="skill-panel">
                        <div>
                            <FormSkill v-for="skill in skillList" :skill="skill" :keyword="keyword"
                                       v-on:skillUpdate="skillUpdate"/>

                        </div>

                    </div>


                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12">
                    <skillLegend></skillLegend>
                </div>
            </modal>
        </div>
    </div>


</template>

<script>
  import skillLegend from './cv-skills-legend.vue'
  import skill from './skill.vue'
  import modal from './utils/modal.vue'
  import FormSkill from "./form/form-skill.vue";
  import axios from 'axios'
  import _ from 'lodash'

  export default {
    name: 'cv-skills',
    props: ['propEntity'],
    components: {
      skillLegend,
      FormSkill,
      skill, modal
    },
    data() {
      return {
        keyword: "",
        mp: {
          id: 'modal-cv-skill',
          title: 'Habilidades'
        },
        url: {
          skillList: '/pi/cv-skill/list'
        },
        entity: [],
        skillList: []
      }
    },
    created: function () {
      this.entity = this.propEntity
      this.loadSkills()
    },
    computed: {
      sortedEntity() {
        return _.orderBy(this.entity, 'lvl', 'desc')
      }
    },
    methods: {
      findSkill: function (cvSkillId) {
        for (var i = 0; i < this.entity.length; i++) {
          if (this.entity[i].id == cvSkillId) {
            return i
          }
        }
        return false
      },
      showSkillModal: function () {
        $('#' + this.mp.id).modal("show");
      },
      skillUpdate: function (skill) {
        var index = this.findSkill(skill.cvSkillId)
        if (index) {
          if (skill.lvl == 0) {
            this.deleteSkill(index)
          } else {
            this.updateLvl(index, skill)
          }
        } else {
          this.addSkill(skill)
        }
      }
      ,
      deleteSkill: function (index) {
        console.log(this.entity[index])
        this.entity.splice(index, 1)
      }
      ,
      updateLvl: function (index, sk) {
        this.entity[index].lvl = sk.lvl
      }
      ,
      addSkill: function (skill) {
        this.entity.push({
          id: skill.cvSkillId,
          lvl: skill.lvl,
          skill: {id: skill.id, name: skill.name}
        })
      }
      ,
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
          }).catch((error) => {
          this.errors = error.response.data.errors
        })
      }
    }
  }


</script>
