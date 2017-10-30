(function () {


  var vm = new Vue({
    el: "#app",
    components: {
      'cv': Cv
    },
    data: {},
    computed: {},
    methods: {},
    filters: {
      upper: function (value) {
        return value.toUpperCase();
      }
    },
    mounted: function () {
    }
  });

})();