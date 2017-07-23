<?php 
    switch($status){
        case "Online": 
        case "Live":
        case "Active":
        case "Open":
            $textcolor = "text-success"; break;
        case "Away":
        case "Paused":
        case "Pending":
            $textcolor = "text-warning"; break;
        case "Offline":
        case "Inactive":
        case "Closed":
        default:
            $textcolor = "text-danger"; break;
    }
?>
<span class="{{$class or ''}}">
    <i class="fa fa-circle {{$textcolor}}"></i> {{$status}}
</span>