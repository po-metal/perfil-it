<template>
    <div id="app">
        <h1>APP ROOT</h1>
        <router-view></router-view>
    </div>
</template>

<script type="text/babel">
  import axios from 'axios'

  export default {
    name: 'app',
    methods: {
      login: () => {
        var serverURLLogin = 'http://perfilit.int/user/loginjson'
        var params = {'_username': 'admin', '_password': 'admin.123'}

        axios.post(serverURLLogin, params).then((response) => {
          console.log(response.data)
          this.loadSkills()
        })
      },
      loadSkills: () => {
        var serverURL = 'http://perfilit.int/pi/cv-skill/load'
        var config = {
          url: serverURL,
          method: 'get',
          responseType: 'json',
          data: {},
          headers: {
            accept: 'application/json'
          }
        }
        axios.request(config).then(function (response) {
          console.log(response)
        })
      }
    },
    mounted: function () {
      this.login()
    }
  }
</script>

<style>
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }
</style>