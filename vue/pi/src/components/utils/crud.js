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
  created: function () {
    this.initProps()
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
