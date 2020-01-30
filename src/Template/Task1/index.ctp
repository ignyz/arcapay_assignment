<h2>Task 1</h2>
<h3>Intro</h3>
<p>
    Connect to database. Run miggrations and seeds.
</p>
<p>
    Create a web app with:
    <ul>
        <li>Product list (CRUD)</li>
        <li>Option to upload photo to selected product</li>
        <li>Option to Rate product from 1 to 5. Show average score.</li>
        <li>Export all products as csv or xml</li>
    </ul>
</p>
<p style="font-family:georgia,garamond,serif;font-size:16px;font-style:italic;">
    <?php echo $this->Flash->render('message'); ?>
</p>
<br>
<?php echo $this->Html->link('Add New Product', ['action' => 'add'], ['class' => 'btn btn-primary']); ?>
<br>
<div class="row">


    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Modified</th>
                <th scope="col">Created</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?php echo $product->id; ?></td>
                        <td><?php echo $product->name; ?></td>
                        <td><?php echo $product->price; ?></td>
                        <td><?php echo $product->description; ?></td>
                        <td><?php echo $product->modified; ?></td>
                        <td><?php echo $product->created; ?></td>
                        <td><?php echo $this->html->link('View', ['action' => 'view', $product->id], ['class' => 'btn btn-primary']) ?>
                            <?php echo $this->html->link('Edit', ['action' => 'edit', $product->id], ['class' => 'btn btn-success']) ?>
                            <?= $this->Form->postLink(
                                'Delete',
                                ['action' => 'delete', $product->id],
                                ['class' => 'btn btn-danger'],
                                ['confirm' => 'Are you sure?']
                            ); ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <td>No products found</td>
            <?php endif; ?>
        </tbody>
    </table>
    <?php


    echo $this->Html->link('export', array(
        'controller' => 'Task1',
        'action' => 'export',
        'ext' => 'csv'
    )); ?>
</div>