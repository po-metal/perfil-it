<template>
    <div>
        <div class="box box-primary" data-toggle="modal" data-target="#cv-skills-modal">
            <div class="box-header">
                <strong><i class="fa fa-star margin-r-5"></i> Habilidades Técnicas</strong>
                <button class="btn btn-default fa fa-edit btn-xs pull-right"
                        data-toggle="modal" data-target="#modal-cv-skill">
                </button>
                <div class="clearfix"></div>

                <skill v-if="entity" v-for="skill in entity" :skill="skill"/>

            </div>

            <modal :modalId="mp.id" :title="mp.title" :modalSize="'modal-lg'">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-search"></i></div>
                            <input id="searchinput" class="form-control" autocomplete="off" type="search"
                                   placeholder="Buscar..." v-model="keyword" />
                        </div>
                    </div>
                    <div id="searchlist" class="skill-panel">
                        <div>
                            <FormSkill v-if="filteredByKeyword" v-for="skill in filteredByKeyword" :skill="skill"
                                       v-on:skillUpdate="refreshSkill"/>

                        </div>

                    </div>


                </div>
            </modal>
        </div>
    </div>


</template>

<script>
  import skill from './skill.vue'
  import view from './utils/view'
  import modal from './utils/modal.vue'
  import FormSkill from "./form/form-skill.vue";
  import axios from 'axios'

  export default {
    name: 'cv-skills',
    mixins: [view],
    components: {
      FormSkill,
      skill, modal
    },
    data() {
      return {
        keyword : "",
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
      this.loadSkills()
      //console.log(this.$refs.searchlist)
     // $('#searchlist').btsListFilter('#searchinput', {itemChild: 'span'})
    },
    computed: {
      getAll(){
        return this.skillList
      },
      filteredByAll() {
        return getByCategory(getByKeyword(this.skillList, this.keyword), this.category)
      },
      filteredByKeyword() {
        return getByKeyword(this.skillList, this.keyword)

      },
      filteredByCategory() {
        return getByCategory(this.skillList, this.category)
      }
    },
    methods: {
      showSkillModal: function () {
        $('#' + this.mp.id).modal("show");
      },
      refreshSkill: function (skill) {
        if (this.entity[skill.cvSkillId]) {
          if (skill.lvl == 0) {
            this.deleteSkill(skill.cvSkillId)
          } else {
            this.updateLvl(skill)
          }
        } else {
          this.addSkill(skill)
        }
      }
      ,
      deleteSkill: function (index) {
        this.$delete(this.entity, index)
      }
      ,
      updateLvl: function (sk) {
        this.entity[sk.cvSkillId].lvl = sk.lvl
      }
      ,
      addSkill: function (skill) {
        this.$set(this.entity, skill.cvSkillId, {
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

  function getByKeyword(list, keyword) {
    const search = keyword.trim()
    if (!search.length) return list
    return list.filter(item => item.name.toLowerCase().indexOf(search) > -1)
  }

  function getByCategory(list, category) {
    if (!category) return list
    return list.filter(item => item.category === category)
  }

</script>
