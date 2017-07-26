vue_options = new Vue({
    el: '#tradecreate',
    data: {
        teams: [],
        items: [],
        tos: [],
        selection: {
            team: null,
            item: null,
        },
        ready: false,
        trade: {
            teams: [],
            items: [],
        },
    },
    methods: {

        getItemId: function(item) {
            return item.type + "-" + item.id;
        },
        
        selectTeam: function(event) {
            this.clearItems();
            this.clearTo();
            if(this.inputCheck(event)){
                this.selection.team = this.teams[event.target.selectedIndex-1];
                this.axiosGetItems();
            }
        },
        
        selectItem: function(event) {
            this.clearTo();
            if(this.inputCheck(event)){
                this.selection.item = this.items[event.target.selectedIndex-1];
                this.tos = this.teams;
            }
        },
        
        selectTo: function(event) {
            this.ready = this.inputCheck(event);
        },
        
        inputCheck: function(event) {
            return (event.target.selectedOptions[0].value == -1) ? false : true;
        },
        
        clearItems: function() {
            this.items = [];
        },
        
        clearTo: function() {
            this.ready = false;
            this.tos = [];
        },
        
        addToTrade: function() {
            if(this.ready){
                
                this.selection.team.items = [];
                this.selection.team.items.push(this.selection.item);
                this.trade.items.push(this.selection.item);
                this.trade.teams.push(this.selection.team);
                this.reset();
            }
        },
        
        removeFromTrade: function() {

        },
        
        reset: function() {
            this.clearItems();
            this.clearTo();
            this.axiosGetTeams();
        },

        axiosGetTeams: function() {
            this.teams = [];
            axios.get(routes['action.league.teams'])
                .then(response => {
                    this.teams = response.data
            });
        },

        axiosGetItems: function() {
            axios.get(routes['action.trade.items'], {
                params: {
                    team: this.selection.team.id
                }
            }).then(response => {
                    this.items = response.data;
            });
        },
    },
    created: function () {
        this.axiosGetTeams();
    }
});