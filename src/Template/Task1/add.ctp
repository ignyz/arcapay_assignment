<h2></h2>
<fieldset>
    <legend>Add product</legend>

    <div class="form-group">
        <div class="col-lg-10">
            <?php echo $this->Form->input('name', ['class' => 'form-control', 'Placeholder' => 'Name']); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-10">
            <?php echo $this->Form->input('price', ['class' => 'form-control', 'Placeholder' => 'Price']); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-10">
            <?php echo $this->Form->textarea('description', ['class' => 'form-control', 'Placeholder' => 'Description']); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10">
            <?php echo $this->Form->input('modified', ['class' => 'form-control', 'Placeholder' => 'Modified']); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10">
            <?php echo $this->Form->input('created', ['class' => 'form-control', 'Placeholder' => 'Created']); ?>
        </div>
    </div>
    <!-- <div class="form-group"> -->
    <!-- <label for="exampleInputFile">File input</label> -->
    <!-- <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp"> -->
    <!-- <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small> -->
    <!-- </div> -->
    <?php echo $this->Form->button(__('Add Product'), ['class' => 'btn btn-primary']); ?>
    <?php echo $this->html->link('Back', ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
</fieldset>
<?php echo $this->Form->end(); ?>