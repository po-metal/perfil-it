<template>
    <section v-if="errors" >
        <span class="help-block" v-for="(error, index) in errors">
            {{error}}
        </span>
    </section>
</template>

<script>
  export default {
    props: ['errors']
  }
</script>