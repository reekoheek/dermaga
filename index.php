<?php
$arr = array(
    array (
        'id' => 1,
        'loa' => 109,
        'dock' => '.d005-2-3',
        'row' => 1
    ),
    array (
        'id' => 2,
        'loa' => 122,
        'dock' => '.d005-2-3',
        'row' => 3
    ),
    array (
        'id' => 3,
        'loa' => 115,
        'dock' => '.d005-1-1',
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
        'dock' => '.d005-1-4',
        'row' => 1
    ),
    array (
        'id' => 6,
        'loa' => 150,
        'dock' => '.d001-1-1',
        'row' => 1
    ),
    array (
        'id' => 1,
        'loa' => 109,
        'dock' => '.d005-2-3',
        'row' => 1
    ),
    array (
        'id' => 2,
        'loa' => 122,
        'dock' => '.d005-2-3',
        'row' => 3
    ),
    array (
        'id' => 3,
        'loa' => 115,
        'dock' => '.d005-1-1',
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
        'dock' => '.d005-1-4',
        'row' => 1
    ),
    array (
        'id' => 6,
        'loa' => 150,
        'dock' => '.d001-1-1',
        'row' => 1
    )
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dermaga</title>
</head>
<body>

    <div class="dermaga-container">
        <img src="http://rekayasadermaga.files.wordpress.com/2011/02/bird-view1.jpg" class="dermaga-map">

        <div class="dermaga-layout">
            <div class="dermaga d005-1-1" data-gap="60" data-stack="up"></div>
            <div class="dermaga d005-1-2" data-gap="60" data-stack="up"></div>
            <div class="dermaga d005-1-3" data-gap="60" data-stack="down"></div>
            <div class="dermaga d005-2-1" data-gap="50" data-stack="up"></div>
            <div class="dermaga d005-2-2" data-gap="50" data-stack="up"></div>
            <div class="dermaga d005-2-3" data-gap="50" data-stack="down"></div>
            <div class="dermaga d003-1-1" data-gap="50" data-stack="up"></div>
            <div class="dermaga d001-1-1" data-gap="50" data-stack="right"></div>

            <div class="dermaga d005-1-4" data-gap="60" data-stack="down"></div>
        </div>


        <div class="kapal-group">
            <!-- <div class="kapal k1"></div> -->
            <!-- <div class="kapal k2"></div> -->
        </div>
    </div>

    <style>

        .dermaga-container {
            width: 800px;
            height: 630px;
            position: relative;
            background-color: #005;
        }

        .dermaga-map {
            width: 800px;
            height: 630px;
            position: absolute;
            top: 0;
            left: 0;
        }

        .dermaga {
            position: absolute;
            background-color: grey;
        }

        .vessel {
            position: absolute;
            height: 40px;
            background-color: rgba(255,255,0,.5);
        }

        .d005-1-1 {
            width: 100px;
            height: 44px;
            transform: rotate(-7deg);
            top: 300px;
            left: 20px;
        }

        .d005-1-2 {
            width: 100px;
            height: 44px;
            transform: rotate(-7deg);
            top: 288px;
            left: 120px;
        }

        .d005-1-3 {
            width: 100px;
            height: 44px;
            transform: rotate(-7deg);
            top: 276px;
            left: 220px;
        }

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

        .d001-1-1 {
            width: 18px;
            height: 122px;
            top: 500px;
            left: 320px;
        }

        ./*k1 {
            width: 109px;
            top: 220px;
            left: 670px;
        }

        .k2 {
            width: 122px;
            top: 170px;
            left: 670px;
        }*/
    </style>

<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">

var LineupDermaga = function(el, options) {
    this.$el = $(el);
    this.options = options;
};

LineupDermaga.prototype = {
    add: function(vessel) {
        var $dock = $(vessel.dock),
            $vesselEl = $('<div class="vessel"></div>'),
            gap = $dock.data('gap') || this.options.gap,
            vesselWidth = this.options.width;

        var transform = ' ';
        if ($dock.css('transform') != 'none') {
            transform += $dock.css('transform') + ' ';
            // $vesselEl.css('transform', $dock.css('transform'));
        }

        switch($dock.data('stack')) {
            case 'up':
                $vesselEl.css('left', $dock.position().left);
                $vesselEl.css('top', $dock.position().top - (gap * (vessel.row - 1)) - $dock.height() - 20);
                $vesselEl.css('width', vessel.loa);
                $vesselEl.css('height', vesselWidth);
                break;
            case 'down':
                var x = $dock.position().top;
                var y = $dock.position().left;
                // transform += 'translateX(' + x + 'px) translateY(' + y + 'px) ';
                $vesselEl.css('left', $dock.position().left);
                $vesselEl.css('top', $dock.position().top);
                $vesselEl.css('width', vessel.loa);
                $vesselEl.css('height', vesselWidth);
                break;
            case 'left':
                $vesselEl.css('left', $dock.position().left - (gap * vessel.row));
                $vesselEl.css('top', $dock.position().top);
                $vesselEl.css('height', vessel.loa);
                $vesselEl.css('width', vesselWidth);
                break;
            case 'right':
                $vesselEl.css('left', $dock.position().left + (gap * (vessel.row - 1)) + $dock.width() + 10);
                $vesselEl.css('top', $dock.position().top);
                $vesselEl.css('height', vessel.loa);
                $vesselEl.css('width', vesselWidth);
                break;
        }

        if (transform) {
            $vesselEl.css('transform', transform);
        }

        $vesselEl.html('<div style="text-align: center; line-height: 40px;">' + vessel.id + '</div>');

        this.$el.append($vesselEl);
    }
};

$.fn.lineupDermaga = function(options) {
    var o = new LineupDermaga(this, options);
    $(this).data('lineupDermaga', o);
    return o;
};

$(function() {
    var lineup = $('.kapal-group').lineupDermaga({
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