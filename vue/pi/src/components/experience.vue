<template>
    <div :id="exp+this.id">
        <div class="box box-default box-cv" @click="editJob()">
            <div class="box-header">
                <strong> {{ theJob }}</strong> en <a href="#" target="blank">{{ entity.company }}</a>

                <span class="pull-right">{{ entity.time }}</span>
            </div>
            <div class="box-body ">
                {{ entity.summary }}
            </div>

        </div>
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
        job: {
          id: '',
          name: ''
        },
        customJob: '',
        summary: '',
        description: '',
        dateFrom: '',
        dateTo: '',
        currentJob: '',
        time: '',
      }
    }
  },
  methods: {
    editJob: function () {
      this.$emit('editJob',this.entity.id)
    }
  },
  computed: {
    theJob: function () {
      if(this.entity.job != null && this.entity.job.id != null){
        return this.entity.job.name
      }else{
        return this.entity.customJob
      }
    }
  },
  created: function () {
    this.entity = this.exp
  }
}
</script>
