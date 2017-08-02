<?php 
    if(!isset($color)){
        switch($status){
            case "Online": 
            case "Live":
            case "Active":
            case "Open":
            case "Approved":
            case "Processed":
            case "Accepted":
            case "ACT":
            case "Healthy":
                $labelcolor = "label-success"; break;
            case "Away":
            case "Paused":
            case "Pending":
            case "UFA":
                $labelcolor = "label-warning"; break;
            case "Offline":
            case "Inactive":
            case "Closed":
            case "Final":
            case "Vetoed":
            case "Rejected":
            case "Denied":
            case "CUT":
            case "Injured Reserve":
                $labelcolor = "label-danger"; break;
            case "Upcoming":
            case "Waiting":
            default:
                $labelcolor = "label-default"; break;
        }
    }
    else {
        switch($color){
            case "Green":
                $labelcolor = "label-success"; break;
            case "Yellow":
                $labelcolor = "label-warning"; break;
            case "Red":
                $labelcolor = "label-danger"; break;
            case "Grey":
            default:
                $labelcolor = "label-default"; break;
        }
    }
?>
<span class="label {{$labelcolor or 'label-default'}} {{$class or ''}}">{{$status}}</span>