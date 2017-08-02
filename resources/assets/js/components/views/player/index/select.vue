<template>
    <input type="checkbox" class='select-player' @click='select'/>
</template>

<script>
    export default {
        props: [
            'data'
        ],
        methods: {
            select: function(event) {
                let id = this.data.id;
                console.log('Clicked: ' + id);

                // Current
                var checked = $(event.target).prop('checked');
                var selected = $(event.target.parentElement.parentElement.parentElement).hasClass('selected');
                
                // Clear
                $('.select-player:checked').prop('checked', false);
                $("tr.selected").removeClass('selected');
                
                // Toggle
                if(!selected){
                    $(event.target.parentElement.parentElement.parentElement).addClass('selected');
                    this.$parent.$parent.selected = this.data;
                }
                else{
                    this.$parent.$parent.selected = null;
                }
                $(event.target).prop('checked', checked);

            },
        },
    }

    
</script>