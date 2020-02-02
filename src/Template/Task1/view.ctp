<h2></h2>

<head>
    <style>
        .container img {
            width: 100%;
            height: auto;
        }

        * {
            margin: 0;
            padding: 0;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
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


                <td style="max-width: 200px;">
                    <p>Description: <?php echo $products['description']; ?></p>
                </td>

                <td>
                    <p>Created: <?php echo $products['created']; ?></p>
                </td>



                <td>
                    <p>Modified: <?php echo $products['modified']; ?></p>
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
                                    endif;

                                    ?></td>

                <?php
                $id = $products['id'];
                echo $this->Form->create('Product', array('url' => array('action' => 'vote', $id), 'enctype' => 'multipart/form-data'));
                ?>

                <td class="shrink" style="width: 200px;">
                    <div class="rate" >

                        <input name="score" type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input name="score" type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input name="score" type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input name="score" type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input name="score" type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                </td>

                <td>
                    <?php
                    echo $this->Form->button(__('VOTE!'), ['type' => 'submit', 'class' => 'form=control btn btn-success'])
                    ?>
                </td>
                <?php

                echo $this->html->link('Back', ['action' => 'index'], ['class' => 'btn btn-primary']); ?>

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

</script>