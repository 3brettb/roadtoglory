var vue = new Vue({
    el: "#vue",
    data: {
        model: vue_model,
    },
    methods: {
        add: function(){
            self = this;
            axios.post(routes['action.player.add'], {
                player: this.model.player.id,
                drops: []
            }).then(response => {
                methods.axiosOnResponse(response);
            });
        },
        drop: function(){
            self = this;
            axios.post(routes['action.player.drop'], {
                player: this.model.player.id,
                drops: []
            }).then(response => {
                methods.axiosOnResponse(response);
            });
        },
        trade: function(){
            self = this;
            axios.post(routes['action.player.trade'], {
                player: this.model.player.id,
                drops: []
            }).then(response => {
                methods.axiosOnResponse(response);
            });
        },
    },
});