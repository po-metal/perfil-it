<template>
    <span class="text-danger fa fa-save" v-if="!isSaved" ></span>
</template>

<script>
export default {
  name: 'unsaved',
  props: [ 'isSaved'
  ]
}
</script>
