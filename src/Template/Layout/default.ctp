<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>: 
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?php echo $this->Html->css('bootstrap.min') ?>
    <?php echo $this->Html->script('jquery-3.1.0') ?>
    <?php echo $this->Html->script('bootstrap') ?>

    <?php //echo $this->Html->css('base.css') ?>
    <?php //echo $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <!-- <nav class="top-bar expanded" data-topbar role="navigation"> -->
    <!-- <ul class="title-area large-3 medium-4 columns"> -->
    <!-- <li class="name"> -->
    <!-- <h1><a href=""><?= $this->fetch('title') ?></a></h1> -->
    <!-- </li> -->
    <!-- </ul> -->
    <!-- <div class="top-bar-section"> -->
    <!-- <ul class="right"> -->
    <!-- <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li> -->
    <!-- <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li> -->
    <!-- </ul> -->
    <!-- </div> -->
    <!-- </nav> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">ArcaPay Project</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

           
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix" style="margin:40px">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>

</html>