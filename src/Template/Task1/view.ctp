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

    <fieldset>


        <legend>View product</legend>
        <table class="table table-striped table-hover">
            <tr>

                <td>
                    <p>Name: <?php echo $products['name']; ?></p>
                </td>


                <td>
                    <p>Price: <?php echo $products['price']; ?></p>
                </td>


                <td>
                    <p>Description: <?php echo $products['description']; ?></p>
                </td>




                <td>
                    <p>Created: <?php echo $products['created']; ?></p>
                </td>



                <td>
                    <p>Modified: <?php echo $products['modified']; ?></p>
                </td>
                <td>
                    <form action='rate' method='POST'>
                        <select name='rating'>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <input type='hidden' value='$id' name='id'>

                        <input type='submit' value='Rate!'>
                    </form>
                </td>


                <td>Score: &#11088;<?php $cnt = 0;
                                    $sum = 0;
                                    foreach ($products['product_ratings'] as $rating) :
                                        $cnt++;
                                        $sum = $sum  + $rating['score'];
                                    endforeach;
                                    if ($cnt != 0) :
                                        echo number_format($sum / $cnt, 1);
                                    else :
                                        echo " -";
                                    endif;  ?></td>
                <td><?php
                    //$this->loadHelper('JsHelper');
                    // $this->Html->event(
                    //     'click',
                    //     $this->Html->request(
                    //         array('action' => 'vote', $products['id']), //this is effectively www.yourdomain.com/posts/vote/1 (if the post_id is 1)
                    //         array('async' => true, 'update' => '#content')
                    //     )
                    // );

                    ?>
                <td>
                    <?php echo $this->Form->input('score', ['class' => 'form-control', 'Placeholder' => 'Score']); ?>
                </td>
                <td><?php echo $this->Form->button(
                        __('VOTE!'),
                        array('action' => 'vote', $products['id']),
                        ['type' => 'submit', 'class' => 'form=control btn btn-success']
                    ) ?>
                </td>



                <div class="form-group">
                    <div class="col-lg-10">
                        <?php echo $this->Form->input('score', ['class' => 'form-control', 'Placeholder' => 'Score']); ?>
                    </div>
                </div>

                <?php
                echo $this->Form->button(__('Add Product'), ['type' => 'submit', 'class' => 'form=control btn btn-primary']);
                ?>














                <?php echo $this->html->link('Back', ['action' => 'index'], ['class' => 'btn btn-primary']); ?>

                <div class="form-group">
                    <div class="col-lg-4">
                        <?php if ($products['photo'] != Null) {
                            echo $this->Html->image('' . $products['photo']);
                        } ?>
                    </div>
                </div>
            <tr>
        </table>
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