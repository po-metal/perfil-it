import axios from 'axios'
import qs from 'qs'

export default {
  data: function () {
    return {
      h: {
        loading: false,
        isSaved: true,
        submitInProgress: false
      }
    }
  },
  computed: {
    submitValue: function () {
      return (this.h.isSaved) ? 'Ok' : 'Guardar'
    },
    submitClass: function () {
      return (this.h.isSaved) ? 'btn-success' : 'btn-primary fa fa-save'
    }
  },
  methods: {
    unsaved: function () {
      this.h.isSaved = false
    },
    save: function () {
      this.errors = ''
      this.h.submitInProgress = true
      axios.post(
        this.url.save, qs.stringify(this.postParams)
      ).then((response) => {
        if (response.data.status) {
          this.h.isSaved = true
          this.populate(response.data.data)
        } else {
          this.errors = response.data.errors
        }
        this.h.submitInProgress = false
      }).catch((error) => {
        this.errors = error.response.data.errors
        this.h.submitInProgress = false
      })
    },
    del: function () {
      this.errors = ''
      this.h.submitInProgress = true
      axios.post(
        this.url.delete, qs.stringify(this.deleteParams)
      ).then((response) => {
        if (response.data.status) {
          this.onDelete()
        }
        this.h.submitInProgress = false
      }).catch((error) => {
        console.log(error)
        this.errors = error.response.data.errors
        this.h.submitInProgress = false
      })
    },
    loadProps: function () {
      axios.get(
        this.url.get,
        {
          headers: {
            accept: 'application/json'
          }
        }).then(
        (response) => {
          this.populate(response.data)
          this.h.loading = true
        })
    },
  }
}
