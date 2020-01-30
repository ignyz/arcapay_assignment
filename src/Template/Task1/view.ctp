<h2></h2>

<head>
    <style>
        /* resize images */
        .container img {
            width:100%;
            height: auto;
        }
    </style>
</head>

<body>
    <fieldset>


        <legend>View product</legend>
        <div class="form-group">
            <div class="col-lg-10">
                <p>Name: <?php echo $products->name; ?></p>
            </div>
        </div>

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