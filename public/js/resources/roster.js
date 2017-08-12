/*

    Select a Player:
        Option 1: fill a empty starter location -> showEmptyStarterSlots()
        Option 2: add to end of bench -> showEndOfBenchSlot()
        Option 3: swap with another player (w/ requirements) -> showSwapSlots()

        Click on Selected Player:
            Return to Normal -> HideTargets()

        Click on Target:
            Perform the swap, -> makeSwap()
            Record swap -> storeSwap()

        On Swap:
            1. Swap Row Requirements
            2. Swap Rows

        Save()    
*/

var Roster = {

    moves: [],

    selected: null,

    onPlayerSelect: function(handle, event){
        this.setSelected(handle);
        (this.selected == null) ? this.hideTargets() : this.showTargets();
    },

    onTargetSelect: function(handle, event){
        target = this.getRow(handle);
        this.makeSwap(target);
        this.selected = null;
        this.hideTargets();
    },
    
    setSelected: function(handle){
        if(this.selected == null){
            this.selected = this.getRow(handle);
            $(this.selected.self).addClass('selected');
            this.handleYellow(handle);
            $(handle).html('Move');
        } else {
            this.selected = null;
            $('tr.selected').removeClass('selected');
        }
    },

    showTargets: function(){
        self = this;
        $("tr.roster-row").each(function(i, item){
            handle = $(this).find('a.handle')[0];
            row = self.createRowObject(this, handle);

            if($(this).hasClass('extra bench')){

                $(this).css('display', 'table-row');
                self.showHandle(handle);
            
            } else if($(this).hasClass('starter')) {
                
                if($(this).hasClass('filled')){
                
                    if(self.allowed(self.selected, row) && self.allowed(row, self.selected)) self.showHandle(handle);
                
                } else {
                
                    if(self.allowed(self.selected, row)) self.showHandle(handle);
                
                }

            } 
        });
    },
    
    hideTargets: function(){
        self = this;
        $("tr.roster-row").each(function(i, item){
            handle = $(this).find('a.handle')[0];
            row = self.createRowObject(this, handle);

            $(handle).removeClass("visible");
            
            if($(this).hasClass('extra')){
                
                $(this).css('display', 'none');

            } else if($(this).hasClass('filled')) {

                $(handle).html('Move/Select');
                $(handle).addClass('visible');
                self.handleGrey(handle);

            }
        });
    },

    makeSwap: function(target){

        this.storeSwap();
    },

    storeSwap: function(){

    },

    save: function(){

    },

    cancel: function(){

    },

    showHandle: function(handle){
        this.handleGreen(handle);
        $(handle).addClass("visible");
        $(handle).html("Here");
    },

    handleGreen: function(handle){
        $(handle).addClass('btn-success');
        $(handle).removeClass('btn-warning');
        $(handle).removeClass('btn-default');
    },

    handleYellow: function(handle){
        $(handle).removeClass('btn-success');
        $(handle).addClass('btn-warning');
        $(handle).removeClass('btn-default');
    },

    handleGrey: function(handle){
        $(handle).removeClass('btn-success');
        $(handle).removeClass('btn-warning');
        $(handle).addClass('btn-default');
    },

    getRow: function(handle){
        parent = $(handle).parents('tr')[0];
        return this.createRowObject(parent, handle);
    },

    createRowObject: function(tr, handle){
        row = {
            playerid: $(tr).data('playerid'),
            position: $(tr).data('position'),
            requirements: $(tr).data('requirements').split(","),
            handle: handle,
            self: tr
        }
        return row;
    },

    allowed: function(select, target){
        if(target.requirements == ""){
            return true;
        } else {
            return $.inArray(select.position, target.requirements) !== -1;
        }
    },

}