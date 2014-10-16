<?php
$arr = array(
    // array (
    //     'id' => 1,
    //     'loa' => 109,
    //     'dock' => '.d005-2-3',
    //     'row' => 1
    // ),
    array (
        'id' => 1,
        'loa' => 122,
        'dock' => '.d001-1-1',
        'row' => 1
    ),
    array (
        'id' => 2,
        'loa' => 100,
        'dock' => '.d001-1-2',
        'row' => 1
    ),
    array (
        'id' => 3,
        'loa' => 115,
        'dock' => '.d005-1-1',
        'type' => 'v-bg',
        'row' => 1
    ),
    array (
        'id' => 4,
        'loa' => 300,
        'dock' => '.d005-1-1',
        'row' => 2
    ),
    array (
        'id' => 5,
        'loa' => 115,
        'dock' => '.d005-1-2',
        'row' => 3
    ),
    array (
        'id' => 6,
        'loa' => 150,
        'dock' => '.d005-1-3',
        'row' => 1
    ),
    array (
        'id' => 6,
        'loa' => 150,
        'dock' => '.d005-1-3',
        'row' => 2
    ),
    // array (
    //     'id' => 1,
    //     'loa' => 109,
    //     'dock' => '.d005-2-3',
    //     'row' => 1
    // ),
    // array (
    //     'id' => 2,
    //     'loa' => 122,
    //     'dock' => '.d005-2-3',
    //     'row' => 3
    // ),
    // array (
    //     'id' => 3,
    //     'loa' => 115,
    //     'dock' => '.d005-1-1',
    //     'row' => 1
    // ),
    // array (
    //     'id' => 4,
    //     'loa' => 300,
    //     'dock' => '.d005-1-1',
    //     'row' => 2
    // ),
    // array (
    //     'id' => 5,
    //     'loa' => 115,
    //     'dock' => '.d005-1-4',
    //     'row' => 1
    // ),
    // array (
    //     'id' => 6,
    //     'loa' => 150,
    //     'dock' => '.d001-1-1',
    //     'row' => 1
    // )
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>dock</title>
</head>
<body>

    <div class="dock-container">
        <img src="http://rekayasadermaga.files.wordpress.com/2011/02/bird-view1.jpg" class="dock-map">

        <div class="dock d005-1-1" data-stack="up"></div>
        <div class="dock d005-1-2" data-stack="up"></div>
        <div class="dock d005-1-3" data-stack="down"></div>
        <!-- <div class="dock d005-2-1" data-stack="up"></div> -->
        <!-- <div class="dock d005-2-2" data-stack="up"></div> -->
        <!-- <div class="dock d005-2-3" data-stack="up"></div> -->
        <!-- <div class="dock d003-1-1" data-stack="up"></div> -->
        <div class="dock d001-1-1" data-stack="left"></div>
        <div class="dock d001-1-2" data-stack="right"></div>
        <!-- <div class="dock d005-1-4" data-stack="down"></div> -->
    </div>

    <style>

        .dock-container {
            width: 800px;
            height: 630px;
            position: relative;
            background-color: #005;
            overflow: hidden;
        }

        .dock {
            position: absolute;
            /*border: 1px solid #fff;*/
        }

        .vessel {
            position: absolute;
            height: 40px;
            background-color: rgba(255,255,0,.5);
            border: 1px solid red;
        }

        .vessel.v-bg {
            border-radius: 0!important;
        }

        .vessel-id {
            /*border: 1px solid red;*/
            width: 100%;
            display: block;
            line-height: 40px;
            text-align: center;
            color: lime;
        }

        .d005-1-1 {
            width: 100px;
            height: 1000px;
            transform: rotate(-7deg);
            top: -690px;
            left: -10px;
        }

        .d005-1-1 .vessel {
            border-radius: 0 20px 20px 0;
        }

        .d005-1-2 {
            width: 100px;
            height: 1000px;
            transform: rotate(-7deg);
            top: -702px;
            left: 91px;
        }

        .d005-1-2 .vessel {
            border-radius: 20px 0 0 20px ;
        }

        .d005-1-3 {
            width: 100px;
            height: 1000px;
            transform: rotate(-7deg);
            top: 341px;
            left: 118px;
        }

        /*

        .d005-1-4 {
            width: 100px;
            height: 10px;
            transform: rotate(-13deg);
            top: 206px;
            left: 203px;
        }

        .d005-2-1 {
            width: 100px;
            height: 32px;
            top: 270px;
            left: 318px;
        }

        .d005-2-2 {
            width: 250px;
            height: 32px;
            top: 270px;
            left: 419px;
        }

        .d005-2-3 {
            width: 50px;
            height: 32px;
            top: 270px;
            left: 670px;
        }

        .d003-1-1 {
            width: 38px;
            height: 19px;
            top: 270px;
            left: 740px;
        }

        */

        .d001-1-1 {
            width: 1000px;
            height: 122px;
            top: 500px;
            left: -710px;
        }

        .d001-1-2 {
            width: 1000px;
            height: 122px;
            top: 500px;
            left: 320px;
        }
    </style>

<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">

var Lineupdock = function(el, options) {
    this.$el = $(el);
    this.options = options;
};

Lineupdock.prototype = {
    add: function(vessel) {
        var $dock = $(vessel.dock);
        var $vesselEl = $('<div class="vessel"><span class="vessel-id">' + vessel.id + '</span></div>');

        if (vessel.type === 'v-bg') {
            $vesselEl.addClass('v-bg');
        }

        switch($dock.data('stack')) {
            case 'up':
                $vesselEl.css({
                    height: 40,
                    bottom: (vessel.row - 1) * 50,
                    width: vessel.loa
                });
                break;
            case 'down':
                $vesselEl.css({
                    height: 40,
                    top: (vessel.row - 1) * 50,
                    width: vessel.loa
                });
                break;
            case 'left':
                $vesselEl.css({
                    height: vessel.loa,
                    right: (vessel.row - 1) * 50,
                    width: 40
                });
                break;
            case 'right':
                $vesselEl.css({
                    height: vessel.loa,
                    left: (vessel.row - 1) * 50,
                    width: 40
                });
                break;
        }
        $dock.append($vesselEl);

        // var $dock = $(vessel.dock),
        //     $vesselEl = $('<div class="vessel"></div>'),
        //     gap = $dock.data('gap') || this.options.gap,
        //     vesselWidth = this.options.width;

        // var transform = ' ';
        // if ($dock.css('transform') != 'none') {
        //     transform += $dock.css('transform') + ' ';
        //     // $vesselEl.css('transform', $dock.css('transform'));
        // }

        // switch($dock.data('stack')) {
        //     case 'up':
        //         $vesselEl.css('left', $dock.position().left);
        //         $vesselEl.css('top', $dock.position().top - (gap * (vessel.row - 1)) - $dock.height() - 20);
        //         $vesselEl.css('width', vessel.loa);
        //         $vesselEl.css('height', vesselWidth);
        //         break;
        //     case 'down':
        //         var x = $dock.position().top;
        //         var y = $dock.position().left;
        //         // transform += 'translateX(' + x + 'px) translateY(' + y + 'px) ';
        //         $vesselEl.css('left', $dock.position().left);
        //         $vesselEl.css('top', $dock.position().top);
        //         $vesselEl.css('width', vessel.loa);
        //         $vesselEl.css('height', vesselWidth);
        //         break;
        //     case 'left':
        //         $vesselEl.css('left', $dock.position().left - (gap * vessel.row));
        //         $vesselEl.css('top', $dock.position().top);
        //         $vesselEl.css('height', vessel.loa);
        //         $vesselEl.css('width', vesselWidth);
        //         break;
        //     case 'right':
        //         $vesselEl.css('left', $dock.position().left + (gap * (vessel.row - 1)) + $dock.width() + 10);
        //         $vesselEl.css('top', $dock.position().top);
        //         $vesselEl.css('height', vessel.loa);
        //         $vesselEl.css('width', vesselWidth);
        //         break;
        // }

        // if (transform) {
        //     $vesselEl.css('transform', transform);
        // }

        // $vesselEl.html('<div style="text-align: center; line-height: 40px;">' + vessel.id + '</div>');

        // this.$el.append($vesselEl);
    }
};

$.fn.lineupdock = function(options) {
    var o = new Lineupdock(this, options);
    $(this).data('lineupdock', o);
    return o;
};

$(function() {
    var lineup = $('.kapal-group').lineupdock({
        gap: 50,
        width: 40,
    });

    var vessels = <?php echo json_encode($arr) ?>;
    for(var i = 0; i < vessels.length; i++) {
        lineup.add(vessels[i]);
    }
});

</script>

</body>
</html>

<!-- <div style="border:1px solid red; width: 200px; height: 40px;position: absolute;bottom: 0;"></div> -->