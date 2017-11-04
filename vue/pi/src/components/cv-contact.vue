<template>
    <section class="cursor-pointer box-highlight">
        <div data-toggle="modal" :data-target="'#'+dataTarget">
            <ul class="list-group list-group-unbordered" style="margin-bottom: 0;">
                <li class="list-group-item">
                    <i class="fa fa-at"></i><b> Email</b>
                    <a class="pull-right">
                        {{entity.email}}
                    </a>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-phone"></i><b> Tel</b>
                    <a class="pull-right">
                        {{entity.phone}}
                    </a>
                </li>
                <li class="list-group-item" v-if="entity.skype">
                    <i class="fa fa-skype"></i> <b> Skype</b>
                    <a class="pull-right">
                        {{ entity.skype }}
                    </a>
                </li>
            </ul>
        </div>
    </section>
</template>

<script>
  import view from './utils/view'
  export default {
    name: 'cv-contact',
    mixins: [view],
    data: function () {
      return {
        entity: {
          email: '',
          phone: '',
          skype: ''
        }
      }
    }
  }
</script>

