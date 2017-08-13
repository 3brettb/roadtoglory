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

    hasChange: false,

    hasSelected: false,

    selected: null,

    onPlayerSelect: function(handle, event){
        this.toggleSelected(handle);
        (this.selected == null) ? this.hideTargets() : this.showTargets();
    },

    onTargetSelect: function(handle, event){
        target = this.getRow(handle);
        this.makeSwap(target);
        this.toggleSelected(handle);
        this.hideTargets();
    },
    
    toggleSelected: function(handle){
        if(this.selected == null){
            this.selected = this.getRow(handle);
            $(this.selected.self).addClass('selected');
            this.handleYellow(handle);
            $(handle).html('Move');
            this.hasSelected = true;
        } else {
            this.selected = null;
            this.hasSelected = false;
            $('tr.selected').removeClass('selected');
        }
    },

    showTargets: function(){
        self = this;
        $("tr.roster-row").each(function(i, item){
            handle = $(this).find('a.handle')[0];
            row = self.createRowObject(this, handle);

            if($(this).hasClass('extra')){

                $(this).css('display', 'table-row');
                self.showHandle(handle);
            
            } else if($(this).hasClass('filled')) {

                if(self.allowed(self.selected, row) && self.allowed(row, self.selected)) self.showHandle(handle);

            } else {
                
                if(self.allowed(self.selected, row)) self.showHandle(handle);

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
                $(handle).removeClass('target');
                $(handle).addClass('open');
                self.handleGrey(handle);

            }
        });
    },

    makeSwap: function(target){
        temp_tgt = target.self;
        temp_sel = this.selected.self;
        if($(temp_tgt).hasClass('extra')){
            if($(temp_sel).data('table') == 'starter'){
                newTarget = this.getNewTarget(temp_tgt);
                this.normalSwap(newTarget, temp_sel);
            } else {
                $(temp_sel).insertBefore($(temp_tgt));
            }
        } else if(
            $(temp_tgt).data('table') == 'starter' && 
            !$(temp_tgt).hasClass('filled') && 
            $(temp_sel).data('table') != 'starter'){
                this.normalSwap(temp_tgt, temp_sel);
                $(temp_tgt).remove();
        } else {
            this.normalSwap(temp_tgt, temp_sel);
        }
        this.hasChange = true;
    },

    normalSwap: function(a, b){
        tgt_data = $.extend({}, $(a).data());
        sel_data = $.extend({}, $(b).data());

        tgt_slot = this.getSlot(a);
        sel_slot = this.getSlot(b);

        // Swap Data and Slot Properties
        $(a).data('pid', sel_data.pid);
        $(b).data('pid', tgt_data.pid);
        $(a).data('requirements', sel_data.requirements);
        $(b).data('requirements', tgt_data.requirements);
        $(a).data('table', sel_data.table);
        $(b).data('table', tgt_data.table);
        this.swap(tgt_slot, sel_slot);
        
        // Swap Rows
        this.swap(b, a);
    },

    save: function(){
        list = [];
        $("tr.roster-row").each(function(i, item){
            data = $(item).data();
            list.push(data);
        });
        sendUpdate(list);
    },

    cancel: function(){
        window.location.reload();
    },

    drop: function(){
        console.log('attempt drop player');
    },

    showHandle: function(handle){
        this.handleGreen(handle);
        $(handle).addClass("visible");
        $(handle).addClass("target");
        $(handle).removeClass("open");
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

    getSlot: function(tr){
        return $(tr).find('td.slot')[0];
    },

    getNewTarget: function(initial){
        temp = $(initial).clone().insertBefore(initial);
        $(temp).removeClass('extra');
        $(temp).addClass('empty');
        $(temp).attr('style', '');
        handle = $(temp).find('a.handle')[0];
        $(handle).removeClass('target');
        $(handle).attr('style', 'padding: 2px 7px;');
        $(handle).on('click', function(event){ handleOnClick(this, event) });
        return temp;
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

    swap: function(a, b){
        temp = $(a).clone();
        $(temp).insertAfter($(a));
        $(a).insertAfter($(b));
        $(b).insertAfter($(temp));
        $(temp).remove();
    },

}