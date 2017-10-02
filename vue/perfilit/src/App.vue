<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'app',
  mounted: function () {
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
      console.log(response.data)
    })
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
