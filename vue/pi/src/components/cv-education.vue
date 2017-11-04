<template>
    <section class="cursor-pointer box-highlight">
        <div data-toggle="modal" :data-target="'#'+dataTarget">
            <ul class="list-group list-group-unbordered" style="margin-bottom: 0; border-bottom: none">
                <li class="list-group-item">
                    <i class="fa fa-graduation-cap"></i><b> Nivel Academico</b><a class="pull-right">
                    {{ entity.education.name }} {{ entity.state.name }}
                </a>
                </li>
            </ul>
        </div>
    </section>
</template>

<script>
  import view from './utils/view'

  export default {
    name: 'cv-education',
    mixins: [view],
    data: function () {
      return {
        entity: {
          education: {
            id: '',
            name: ''
          },
          state: {
            id: '',
            name: ''
          },
          title: ''
        },
      }
    }
  }
</script>
