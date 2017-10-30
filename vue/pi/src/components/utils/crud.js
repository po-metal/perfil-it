import axios from 'axios'
import qs from 'qs'
export default {
  methods: {
    unsaved: function () {
      this.isSaved = false
    },
    save: function () {
      this.errors = ''
      this.submitInProgress = true
      axios.post(
        this.url.save, qs.stringify(this.postParams)
      ).then((response) => {
        if (response.data.status) {
          this.isSaved = true
          this.populate(response.data.data)
        } else {
          this.errors = response.data.errors
        }
        this.submitInProgress = false
      }).catch((error) => {
        this.errors = error.response.data.errors
        this.submitInProgress = false
      })
    },
    loadProps: function () {
      axios.get(
        this.url.get,
        {
          headers: {
            accept: 'application/json'
          }
        }).then((response) => {
        this.populate(response.data)
        this.loading = true
      })
    },
  }
}
