<h2></h2>
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


    <?php echo $this->html->link('Back', ['action' => 'index'], ['class' => 'btn btn-primary']); ?>
</fieldset>