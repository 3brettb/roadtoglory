vue = new Vue({
    el: '#trade_create',
    data: {
        teams: [],
        items: [],
        tos: [],
        selection: {
            team: null,
            item: null,
            to: null,
        },
        ready: false,
        trade: {
            ids: [],
            teams: {},
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
                this.getItems();
            }
            else{
                this.selection.team = null;
            }
        },
        
        selectItem: function(event) {
            this.clearTo();
            if(this.inputCheck(event)){
                this.selection.item = this.items[event.target.selectedIndex-1];
                this.getTos();
            }
            else{
                this.selection.item = null;
            }
        },
        
        selectTo: function(event) {
            this.ready = this.inputCheck(event);
            if(this.ready){
                this.selection.to = this.tos[event.target.selectedIndex-1];
            }
            else{
                this.selection.to = null;
            }
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
                this.selection.item.to = this.selection.to;
                this.selection.item.from = this.selection.team;
                if(!this.trade.ids.includes(this.selection.to.id.toString())){
                    this.trade.ids.push(this.selection.to.id.toString());
                    this.trade.teams[this.selection.to.id] = {
                        team: this.selection.to,
                        items: []
                    };
                }
                this.trade.teams[this.selection.to.id].items.push(this.selection.item);
                this.trade.items.push(this.getItemId(this.selection.item));
                this.reset();
            }
        },
        
        removeFromTrade: function(itemid, teamid) {
            team = vue.trade.teams[teamid];
            team.items.forEach(function(item, index){
                if(vue.getItemId(item) == itemid){
                    team.items.splice(index, 1);
                    return;
                }
            });
            vue.trade.items.forEach(function(item, index){
                if(item == itemid){
                    vue.trade.items.splice(index, 1);
                    return;
                }
            });
            if(team.items.length == 0){
                vue.trade.ids.forEach(function(item, index){
                    if(item == teamid){
                        vue.trade.ids.splice(index, 1);
                        return;
                    }
                });
                vue.trade.teams[teamid] = undefined;
            }
            this.reset();
        },
        
        reset: function() {
            this.clearItems();
            this.clearTo();
            this.getTeams();
            this.selection = {
                team: null,
                item: null,
                to: null,
            };
            temp = this.trade.ids;
            this.trade.ids = [];
            temp.forEach(function(item, index){
                vue.trade.ids.push(item);
            });
        },

        getTos: function(){
            self = this;
            this.tos = [];
            this.teams.forEach(function(team, index){
                if(team.id != self.selection.team.id){
                    self.tos.push(team);
                }
            });
        },

        getTeams: function() {
            this.teams = [];
            axios.get(routes['action.league.teams'])
                .then(response => {
                    this.teams = response.data
            });
        },

        getItems: function() {
            self = this;
            axios.get(routes['action.trade.items'], {
                params: {
                    team: this.selection.team.id
                }
            }).then(response => {
                self.items = [];
                items = response.data;
                items.forEach(function(item, index){
                    if(!self.trade.items.includes(self.getItemId(item))){
                        self.items.push(item);
                    }
                });
            });
        },

        clear: function() {
            this.teams = [];
            this.items = [];
            this.tos = [];
            this.selection = {
                team: null,
                item: null,
                to: null,
            };
            this.ready = false;
            this.trade = {
                ids: [],
                teams: {},
                items: [],
            };
            this.reset();
        },

        send: function() {
            axios.post(routes['action.trade.send'], {
                trade: JSON.stringify(this.trade)
            }).then(response => {
                if(response.data.hasError){
                    alert(response.data.message);
                }
                else if(response.data.hasRedirect){
                    if (confirm(response.data.message) == true) {
                        window.location = response.data.redirect; 
                    } else {
                        window.location = response.data.redirect; 
                    }  
                }
            });
        },
    },
    created: function () {
        this.getTeams();
    }
});