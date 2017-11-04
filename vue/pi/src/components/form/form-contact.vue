<template>
    <form method="POST" name="CvContact" v-on:submit.prevent="save">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div id="form-group-Email">
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <saveStatus :isSaved="h.isSaved"></saveStatus>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-at"></i></span>
                        <input type="email" name="email" class=" form-control" v-model="entity.email"
                               @keydown="unsaved">
                    </div>
                    <fe :errors="errors.email"/>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-xs-12">
            <div id="form-group-Phone">
                <div class="form-group">
                    <label class="control-label">Teléfono</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" name="phone" class=" form-control" v-model="entity.phone" @keydown="unsaved">
                    </div>
                    <fe :errors="errors.phone"/>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-xs-12">
            <div id="form-group-Skype">
                <div class="form-group">
                    <label class="control-label">Skype</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-skype"></i></span>
                        <input type="text" name="skype" class=" form-control" v-model="entity.skype" @keydown="unsaved">
                    </div>
                    <fe :errors="errors.skype"/>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xs-12">
            <button name="submitbtn" class="btn" :class="submitClass" v-if="!h.isSaved"
                    :disabled="h.submitInProgress"> {{submitValue}}
            </button>
        </div>
    </form>
</template>


<script>
  import fe from '../utils/form-error.vue'
  import crud from '../utils/crud'
  import saveStatus from '../utils/save-status.vue'

  export default {
    name: 'form-contact',
    props: ['value', 'isSaved'],
    mixins: [crud],
    components: {fe, saveStatus},
    data() {
      return {
        errors: [],
        h: {
          loading: false,
          isSaved: true,
          submitInProgress: false
        },
        url: {
          get: '/pi/cv-contact/get',
          save: '/pi/cv-contact/save'
        },
        entity: {}
      }
    },
    methods: {
      populate: function (data) {
        this.entity.email = data.email
        this.entity.phone = data.phone
        this.entity.skype = data.skype
      }
    },
    created: function () {
      this.entity = this.value
    },
    computed: {
      postParams: function () {
        return {
          email: this.entity.email,
          phone: this.entity.phone,
          skype: this.entity.skype
        }
      }
    }
  }
</script>
