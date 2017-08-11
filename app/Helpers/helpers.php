<?php

    // Add helper functions here

    function contained_in($collection, $item)
    {
        foreach($collection as $look)
        {
            if($look == $item) return true;
        }
        return false;
    }