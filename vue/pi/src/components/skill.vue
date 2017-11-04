<template>
    <div :id="skill+entity.id" class="col-lg-6 col-md-6 col-sm-12 col-xs-12  btn-default skillPadding">
        <span class="col-lg-2 col-md-3 col-sm-4 text-center">
            <i class="fa" :class="getLevel"></i>
        </span>
        <span class="col-lg-10 col-md-9 col-sm-8 text-left">
            <i class="fa"> {{ entity.skill.name }}</i>
        </span>
    </div>
</template>

<script>
  export default {
    name: 'skill',
    props: ['skill'],
    data() {
      return {
        entity: {
          id: '',
          lvl: '',
          skill: {
            id: '',
            name: ''
          }
        }
      }
    },
    created: function () {
      this.entity = this.skill
    },
    computed: {
      getLevel: function () {
        switch (this.entity.lvl) {
          case 1:
            return 'fa-battery-1 text-warning';
            break
          case 2:
            return 'fa-battery-2 text-success';
            break
          case 3:
            return 'fa-battery-4 text-primary';
            break
          default:
            return '';

        }
      }
    }
  }
</script>
