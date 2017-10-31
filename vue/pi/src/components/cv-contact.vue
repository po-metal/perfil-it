<template>
    <section>
        <div data-toggle="modal" :data-target="'#'+mp.id">
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
        <modal :modalId="mp.id" :title="mp.title" :isSaved="h.isSaved">
            <div class="row">
                <form method="POST" name="CvContact" v-on:submit.prevent="save" class="form-vertical">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div id="form-group-Email">
                            <label class="control-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                <input type="email" name="email" class=" form-control" v-model="entity.email" @keydown="unsaved">
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
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-xs-12">
                        <input type="submit" name="submitbtn" class="btn btn-primary" value="Submit"   :disabled="h.submitInProgress">
                    </div>
                </form>
            </div>
        </modal>
    </section>
</template>

<script>
  import fe from './utils/form-error.vue'
  import modal from './utils/modal.vue'
  import crud from './utils/crud'

  export default {
    name: 'cv-contact',
    props: [],
    mixins: [crud],
    components: {
      fe, modal
    },
    data: function () {
      return {
        errors: [],
        mp: {
          id: 'modal-cv-contact',
          title: 'Información de Contacto'
        },
        entity: {
          email: '',
          phone: '',
          skype: ''
        },
        url: {
          get: '/pi/cv-contact/get',
          save: '/pi/cv-contact/save'
        }
      }
    },
    methods: {
      populate: function (data) {
        this.entity.email = data.email
        this.entity.phone = data.phone
        this.entity.skype = data.skype
      }
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

