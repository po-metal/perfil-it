<template>
    <div :id="exp+this.id" @click="editExp" class="cursor-pointer">
        <div class="box box-default box-cv" >
            <div class="box-header">
                <strong> {{ entity.customJob }}</strong> en <a  target="blank">{{ entity.company }}</a>

                <span class="pull-right">{{ entity.time }}</span>
            </div>
            <div class="box-body" >
                {{entity.summary}}
            </div>

        </div>
    </div>
</template>

<script>
export default {
  name: 'experience',
  props: ['exp', 'index'],
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
    editExp: function () {
      this.$emit('editExp', this.index)
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
