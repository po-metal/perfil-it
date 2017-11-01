<template>
  <div >
  </div>
</template>

<script>
export default {
  name: 'experience',
  props: ['exp'],
  data () {
    return {
      entity: {
        id: '',
        company: '',
        job: '',
        summary: '',
        description: '',
        from: '',
        to: '',
        currentJob: ''
      }
    }
  }
}
</script>
