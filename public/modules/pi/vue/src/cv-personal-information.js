var CvPersonalInformation = {
  template: "<h4 class='profile-username text-center'>{{name}} {{lastname}}</h4><div class='text-center padding5'>{{years}} años</div>",
  props: ['cv', 'name', 'lastname', 'birthdate', 'years'],
  methods: {
    loadProps: function () {
      var self = this;
      $.get('/pi/cv-personal-information/get', function (data) {
        self.populate(data);
      });
    },
    populate: function (data) {
      this.name = data.name;
      this.lastname = data.lastname;
    }
  },
  mounted: function () {
    this.loadProps();
  }
}


var CvPersonalInformationForm = {

}