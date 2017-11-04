<template>
    <div class="cursor-pointer box-highlight">
        <div data-toggle="modal" :data-target="'#'+dataTarget">
            <div v-if="entity.src">
                <img :src="entity.src" class="img-responsive img-circle img-thumbnail"/>
            </div>
            <div v-else>
                <img src="/img/user.jpg" style="width:100px" class="img-responsive img-circle img-thumbnail"/>
            </div>
        </div>
    </div>
</template>

<script>
  import view from './utils/view'

  export default {
    name: 'cv-picture',
    mixins: [view],
    data: function () {
      return {
        entity: {
          src: false
        }
      }
    }


  }
</script>
