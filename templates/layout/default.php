<?php

/**
 * CakePHP(tm) : Rapid Development PHP Framework (https://cakephp.org)
 * Urheberrecht (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Lizenziert unter der MIT Lizenz. Für vollständige Urheberrechts- und Lizenzinformationen, siehe LICENSE.txt
 *
 * @copyright     Urheberrecht (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Projekt
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT Lizenz
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: das Rapid Development PHP-Framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <!-- Setzt den Zeichensatz für die HTML-Seite -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Sorgt für eine responsive Darstellung auf Mobilgeräten -->

    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <!-- Setzt den Titel der Webseite -->

    <?= $this->Html->meta('icon') ?>
    <!-- Bindet das Favicon der Webseite ein -->

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
    <!-- Bindet CSS-Dateien ein. Hier können Sie Ihre eigene CSS-Datei hinzufügen, z.B. 'style.css' -->

    <?= $this->Html->css('style.css') ?>
    <!-- Bindet Ihre eigene CSS-Datei 'style.css' ein -->

    <?= $this->fetch('meta') ?>
    <!-- Fügt zusätzliche Meta-Tags ein, die in der View definiert wurden -->

    <?= $this->fetch('css') ?>
    <!-- Fügt zusätzliche CSS-Dateien ein, die in der View definiert wurden -->

    <?= $this->fetch('script') ?>
    <!-- Fügt JavaScript-Dateien ein, die in der View definiert wurden -->
</head>

<body>
    <nav class="top-nav">
        <!-- Navigationsleiste -->
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>PHP</a>
        </div>
        <div class="top-nav-links">
            <a target="_blank" rel="noopener" href="https://book.cakephp.org/5/">Dokumentation</a>
            <a target="_blank" rel="noopener" href="https://api.cakephp.org/">API</a>
        </div>
    </nav>
    <main class="main">
        <!-- Hauptteil der Webseite -->
        <div class="container">
            <?= $this->Flash->render() ?>
            <!-- Stellt Flash-Nachrichten dar -->
            <?= $this->fetch('content') ?>
            <!-- Hier wird der Inhalt der einzelnen Seiten eingefügt -->
        </div>
    </main>
    <footer>
    </footer>
    <!-- Fußzeile der Webseite -->
</body>

</html>