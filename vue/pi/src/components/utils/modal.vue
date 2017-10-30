<template>

    <div :id="modalId" class="modal fade " :class="[ modalClass ? modalClass : '' ]" tabindex="-1" role="dialog">
        <div class="modal-dialog" :class="[ modalSize ? modalSize : 'modal-sm' ]" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ title }}
                    <unsaved :isSaved="isSaved"></unsaved>
                </h4>
            </div>

            <div class="modal-body">
                <slot></slot>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
  import unsaved from './unsaved.vue'

  export default {
    name: 'modal',
    props: ['modalId', 'modalClass', 'modalSize', 'title', 'isSaved'],
    components: {
      unsaved
    },
    data: function () {
      return {

      }
    }
  }
</script>
