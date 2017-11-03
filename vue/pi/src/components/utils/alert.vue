<template>
    <div  class="alert alert-dismissible" :class="type" >
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{msg}}
    </div>
</template>

<script>
export default {
  name: 'alert',
  props: [ 'type', 'msg'
  ]
}
</script>
