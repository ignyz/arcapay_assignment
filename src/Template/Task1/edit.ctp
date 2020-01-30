<h2></h2>
<fieldset>
    <legend>Add product</legend>

    <div class="form-group">
        <div class="col-lg-10">
            <?php echo $this->Form->create("Products", array('url' => '/task1/edit/'.$id));
            echo $this->Form->input('name', ['value' => $products->name, 'class' => 'form-control']); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-10">
            <?php echo $this->Form->input('price', ['value' => $products->price, 'class' => 'form-control']); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-10">
            <?php echo $this->Form->textarea('description', ['value' => $products->description, 'class' => 'form-control']); ?>
        </div>
    </div>

    <!-- <div class="form-group"> -->
    <!-- <label for="exampleInputFile">File input</label> -->
    <!-- <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp"> -->
    <!-- <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small> -->
    <!-- </div> -->
    <?php echo $this->Form->button(__('Update Product'), ['class' => 'btn btn-success']); ?>
    <?php echo $this->html->link('Back', ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
</fieldset>
<?php echo $this->Form->end(); ?>