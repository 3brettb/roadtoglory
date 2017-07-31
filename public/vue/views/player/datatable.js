// Vue.use(VueTables.client, {
//   compileTemplates: true,
//   //highlightMatches: true,
//   //pagination: {
//   // dropdown:true
//   // chunk:5
//   // },
//   filterByColumn: true,
//   texts: {
//     filter: "Search:"
//   },
//   datepickerOptions: {
//     showDropdowns: true
//   }
//   //skin:''
// });

new Vue({
  el: "#people",
  ready: function() {
    this.$on('vue-tables.row-click', function(row) {
      console.log(row);
    });
  },
  methods: {
    calcAge: function(birthDate) {
    	return birthDate.fromNow('years')
    },
    deleteMe: function(id) {
      alert("Delete " + id);
    },
  },
  data: {
    columns: ['name', 'pet', 'birth_date'],
    options: {
      dateColumns: ['birth_date'],
      headings: {
        name: 'Name',
        birth_date: 'Birth Date',
        age: 'Age',
        edit: 'Edit',
        delete: 'Delete'
      },
      templates: {
        age: function(row) {
          return this.calcAge(row.birth_date);
        },
        edit: function(row) {
          return `<a href='#!/${row.id}/edit'><i class='glyphicon glyphicon-edit'></i></a>`
        },
        delete: function(row) {
          return `<a href='javascript:void(0);' @click='$parent.deleteMe(${row.id})'><i class='glyphicon glyphicon-erase'></i></a>`

        }
      },
      listColumns: {
        pet: [{
          id: '0',
          text: 'Guinea Pig'
        }, {
          id: '1',
          text: 'Dog'
        }, {
          id: '2',
          text: 'Cat'
        }, {
          id: '3',
          text: 'Goldfish'
        }, {
          id: '4',
          text: 'Hamster'
        }]
      },
        //  orderBy: {
        //        column:'age',
        //        ascending:false
        //    }
    },
    tableData: [{
      id: "1",
      name: "Sidney Brakus",
      pet: randomOption(),

      birth_date: randomDate(new Date(1925, 0, 1), new Date(2012, 0, 1))

    }, {
      id: "2",
      name: "Jovan Koepp",
      pet: randomOption(),

      birth_date: randomDate(new Date(1925, 0, 1), new Date(2012, 0, 1))

    }, {
      id: "3",
      name: "Shanie McCullough PhD",
      pet: randomOption(),

      birth_date: randomDate(new Date(1925, 0, 1), new Date(2012, 0, 1))

    }, {
      id: "99",
      name: "Miss Leda Krajcik",
      pet: randomOption(),

      birth_date: randomDate(new Date(1925, 0, 1), new Date(2012, 0, 1))
    }, {
      id: "100",
      name: "Deshawn Hodkiewicz",
      pet: randomOption(),

      birth_date: randomDate(new Date(1925, 0, 1), new Date(2012, 0, 1))
    }],
  }
});

// Courtesy of Tomasz Nurkiewicz (http://stackoverflow.com/questions/9035627/elegant-method-to-generate-array-of-random-dates-within-two-dates)

function randomDate(start, end) {
  return Date.now();
}

function randomOption() {
  return Math.floor(Math.random() * 5);
}