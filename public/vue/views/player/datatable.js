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
    deleteMe: function(id) {
      alert("Delete " + id);
    },
  },
  data: {
    columns: ['firstname', 'lastname', 'position', 'teamAbbr', 'owner', 'status'],
    options: {
      headings: {
        firstname: 'First',
        lastname: 'Last',
        position: "POS",
        teamAbbr: "NFL",
        status: 'Status',
        edit: 'Edit',
        delete: 'Delete'
      },
      templates: {
        edit: function(row) {
          return `<a href='#!/${row.id}/edit'><i class='glyphicon glyphicon-edit'></i></a>`
        },
        delete: function(row) {
          return `<a href='javascript:void(0);' @click='$parent.deleteMe(${row.id})'><i class='glyphicon glyphicon-erase'></i></a>`

        }
      },
    },
    tableData: vue_model['players'],
  }
});