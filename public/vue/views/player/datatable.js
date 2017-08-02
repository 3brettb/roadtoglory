var vue = new Vue({
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

    move: function(){
        window.location = routes['player.move']+"/"+this.selected.id;
    },

    info: function() {
        window.open(routes['player.show']+"/"+this.selected.id, '_blank'); 
    },

    clear: function(event){
        $('.select-player:checked').prop('checked', false);
        $("tr.selected").removeClass('selected');
        this.selected = null;
    },
  },
  data: {
    selected: null,
    columns: ['select', 'firstname', 'lastname', 'position', 'teamAbbr', 'owner', 'status'],
    options: {
      headings: {
        firstname: 'First',
        lastname: 'Last',
        position: "POS",
        teamAbbr: "NFL",
        status: 'Status',
        select: '',
      },
      templates: {
        select: 'player-select',
      },
      filterable: [
        'firstname',
        'lastname',
        'position',
        'teamAbbr',
        'status',
        'owner',
      ],
      sortable: [
        'firstname',
        'lastname',
        'position',
        'teamAbbr',
        'status',
        'owner',
      ],
    },
    tableData: vue_model['players'],
  }
});