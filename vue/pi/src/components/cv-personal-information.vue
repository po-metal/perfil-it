<template>
    <div class="cursor-pointer box-highlight">
        <div data-toggle="modal" :data-target="'#'+dataTarget">
            <h4 class='profile-username text-center'>{{entity.name}} {{entity.lastname}}</h4>
            <div class='text-center padding5'>{{entity.years}} años</div>
            <div class="pull-right"><i :class="entity.nationality.icon"></i></div>
        </div>
    </div>
</template>

<script>
  import view from './utils/view'

  export default {
    name: 'cv-personal-information',
    mixins: [view],
    data: function () {
      return {
        errors: [],
        entity: {
          name: 'Nombre',
          lastname: 'Apellido',
          birthdate: '',
          years: '',
          nationality: {
            id: '',
            name: '',
            icon: ''
          }
        }
      }
    }

  }
</script>