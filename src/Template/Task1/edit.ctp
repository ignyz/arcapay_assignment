<h2></h2>

<head>
    <style>
        .container img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<fieldset>
    <legend>Add product</legend>

    <div class="form-group">
        <div class="col-lg-10">
            <?php
            echo $this->Form->create("Products", array('url' => '/task1/edit/' . $id, 'enctype' => 'multipart/form-data'));

            //echo $this->Form->create('Product', array('url' => array('action' => 'edit'), 'enctype' => 'multipart/form-data'));
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
    <div class="form-group">
        <div class="col-lg-10">
            <?php echo $this->Form->input('photo', array('type' => 'file', 'id' => 'input', 'onchange' => 'file_changed()'), ['value' => $products['photo']]);
            ?>
        </div>
    </div>

    <?php echo $this->Form->button(__('Update Product'), ['type' => 'submit', 'class' => 'form=control btn btn-success']) ?>
    <?php echo $this->html->link('Back', ['action' => 'index'], ['class' => 'btn btn-primary']) ?>

    <div class="row">
        <div class="col-lg-4">
            <?php if ($products['photo'] != Null) {
                echo 'Old picture ';
                echo $this->Html->image('' . $products['photo']);
            } elseif ($products['photo'] == Null) ?>
        </div>
        <?php {
            echo 'New picture '; ?>
            <div class="col-lg-4">
                <img id=img ?>
            </div>
    </div>
<?php  } ?>


</fieldset>
<?php echo $this->Form->end(); ?>
<script>
    function file_changed() {
        var selectedFile = document.getElementById('input').files[0];
        var img = document.getElementById('img')

        var reader = new FileReader();
        reader.onload = function() {
            img.src = this.result
        }
        reader.readAsDataURL(selectedFile);
    }
</script>