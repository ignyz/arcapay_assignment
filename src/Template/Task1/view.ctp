<h2></h2>

<head>
    <style>
        .container img {
            width: 100%;
            height: auto;
        }

        .rate_widget {
            border: 1px solid #CCC;
            overflow: visible;
            padding: 10px;
            position: relative;
            width: 180px;
            height: 32px;
        }

        .ratings_stars {
            background: url('../../../arcapay_assignment\\webroot\\img\\star_empty.png') no-repeat;
            float: left;
            height: 28px;
            padding: 2px;
            width: 32px;
        }

        .ratings_vote {
            background: url('star_full.png') no-repeat;
        }

        .ratings_over {
            background: url('star_highlight.png') no-repeat;
        }

        .total_votes {
            background: #eaeaea;
            top: 58px;
            left: 0;
            padding: 5px;
            position: absolute;
        }

        .movie_choice {
            font: 10px verdana, sans-serif;
            margin: 0 auto 40px auto;
            width: 180px;
        }
    </style>
</head>

<body>
    <div class='movie_choice'>
        <div id="r2" class="rate_widget">
            <div class="star_1 ratings_stars"></div>
            <div class="star_2 ratings_stars"></div>
            <div class="star_3 ratings_stars"></div>
            <div class="star_4 ratings_stars"></div>
            <div class="star_5 ratings_stars"></div>
            <div class="total_votes">vote data</div>
        </div>
    </div>
    <fieldset>


        <legend>View product</legend>
        <div class="form-group">
            <div class="col-lg-10">
                <p>Name: <?php echo $products->name; ?></p>
            </div>
        </div>

        <br>
        <div class="form-group">
            <div class="col-lg-10">
                <p>Price: <?php echo $products->price; ?></p>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10">
                <p>Description: <?php echo $products->description; ?></p>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-4">
                <p>Created: <?php echo $products->created; ?></p>
            </div>
        </div>


        <div class="form-group">
            <div class="col-lg-4">
                <p>Modified: <?php echo $products->modified; ?></p>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-4">
                <?php echo $this->html->link('Back', ['action' => 'index'], ['class' => 'btn btn-primary']); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-4">
                <?php if ($products['photo'] != Null) {
                    echo $this->Html->image('' . $products['photo']);
                } ?>
            </div>
        </div>
    </fieldset>
</body>
<script>
    $('.ratings_stars').hover(
        // Handles the mouseover
        function() {
            $(this).prevAll().andSelf().addClass('ratings_over');
            $(this).nextAll().removeClass('ratings_vote');
        },
        // Handles the mouseout
        function() {
            $(this).prevAll().andSelf().removeClass('ratings_over');
            set_votes($(this).parent());
        }
    );
    $('.rate_widget').each(function(i) {
        var widget = this;
        var out_data = {
            widget_id: $(widget).attr('id'),
            fetch: 1
        };
        $.post(
            'ratings.php',
            out_data,
            function(INFO) {
                $(widget).data('fsr', INFO);
                set_votes(widget);
            },
            'json'
        );
    });
    $('.ratings_stars').bind('click', function() {
        var star = this;
        var widget = $(this).parent();

        var clicked_data = {
            clicked_on: $(star).attr('class'),
            widget_id: widget.attr('id')
        };
        $.post(
            'ratings.php',
            clicked_data,
            function(INFO) {
                widget.data('fsr', INFO);
                set_votes(widget);
            },
            'json'
        );
    });

    function set_votes(widget) {

        var avg = $(widget).data('fsr').whole_avg;
        var votes = $(widget).data('fsr').number_votes;
        var exact = $(widget).data('fsr').dec_avg;

        $(widget).find('.star_' + avg).prevAll().andSelf().addClass('ratings_vote');
        $(widget).find('.star_' + avg).nextAll().removeClass('ratings_vote');
        $(widget).find('.total_votes').text(votes + ' votes recorded (' + exact + ' rating)');
    }
</script>