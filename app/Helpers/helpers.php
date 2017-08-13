<?php

    // Add helper functions here

    function contained_in_ids($collection, $item)
    {
        foreach($collection as $look)
        {
            if($look->id == $item->id) return true;
        }
        return false;
    }