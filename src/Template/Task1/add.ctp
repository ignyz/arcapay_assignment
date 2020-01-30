<h2></h2>
<fieldset>
    <legend>Add product</legend>

    <div class="form-group">
        <div class="col-lg-10">
            <?php
            echo $this->Form->create('Product', array('url' => array('action' => 'add'), 'enctype' => 'multipart/form-data'));
            //echo $this->Form->create('Product', array('url' => array('action' => 'add'), 'enctype' => 'multipart/form-data'));
            //echo $this->Form->create("Product", array('url' => '/task1/add'));
            echo $this->Form->input('name', ['class' => 'form-control', 'Placeholder' => 'Name']); ?>
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

    <?php echo $this->Form->input('photo', array('type' => 'file')); ?>

    <?php
    echo $this->Form->button(__('Add Product'), ['type' => 'submit', 'class' => 'form=control btn btn-primary']);
    ?>
    <?php echo $this->html->link('Back', ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
</fieldset>
<?php echo $this->Form->end(); ?>