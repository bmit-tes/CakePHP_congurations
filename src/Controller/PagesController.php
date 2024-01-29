<?php
   
    declare(strict_types=1);
   
    /**
     * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
     * Urheberrecht (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
     *
     * Lizenziert unter der MIT-Lizenz
     * Für vollständige Urheberrechts- und Lizenzinformationen siehe die LICENSE.txt
     * Verteilungen von Dateien müssen den oben genannten Urheberrechtshinweis beibehalten.
     *
     * @copyright     Urheberrecht (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
     * @link          https://cakephp.org CakePHP(tm) Projekt
     * @since         0.2.9
     * @license       https://opensource.org/licenses/mit-license.php MIT-Lizenz
     */
   
    namespace App\Controller;
   
    use Cake\Core\Configure;
    use Cake\Http\Exception\ForbiddenException;
    use Cake\Http\Exception\NotFoundException;
    use Cake\Http\Response;
    use Cake\View\Exception\MissingTemplateException;
   
    /**
     * Statischer Inhaltscontroller
     *
     * Dieser Controller rendert Ansichten aus den Templates/Pages/
     *
     * @link https://book.cakephp.org/4/de/controllers/pages-controller.html
     */
    class PagesController extends AppController
    {
        /**
         * Zeigt eine Ansicht an
         *
         * @param string ...$path Pfadsegmente.
         * @return \Cake\Http\Response|null
         * @throws \Cake\Http\Exception\ForbiddenException Bei einem Versuch der Pfadmanipulation.
         * @throws \Cake\View\Exception\MissingTemplateException Wenn die Ansichtsdatei nicht
         *   gefunden werden konnte und sich im Debug-Modus befindet.
         * @throws \Cake\Http\Exception\NotFoundException Wenn die Ansichtsdatei nicht
         *   gefunden werden konnte und sich nicht im Debug-Modus befindet.
         * @throws \Cake\View\Exception\MissingTemplateException Im Debug-Modus.
         */
        public function display(string ...$path): ?Response
        {
            if (!$path) {
                return $this->redirect('/');
            }
            if (in_array('..', $path, true) || in_array('.', $path, true)) {
                throw new ForbiddenException();
            }
            $page = $subpage = null;
   
            if (!empty($path[0])) {
                $page = $path[0];
            }
            if (!empty($path[1])) {
                $subpage = $path[1];
            }
            $this->set(compact('page', 'subpage'));
   
            try {
                return $this->render(implode('/', $path));
            } catch (MissingTemplateException $exception) {
                if (Configure::read('debug')) {
                    throw $exception;
                }
                throw new NotFoundException();
            }
        }
   
        /**
         * Gratulationsmethode
         *
         * Diese Methode fügt eine neue Aktion namens 'congratulations' zum Controller hinzu.
         * Sie können diese Methode verwenden, um eine personalisierte Begrüßungsseite in Ihrer
         * CakePHP-Anwendung zu erstellen.
         */
        public function congratulations()
        {
            // Setzt eine Variable 'name' mit dem Wert '<Ihr Name>'.
            // Diese Variable kann in der dazugehörigen Ansichtsdatei verwendet werden.
            // Ersetzen Sie '<Ihr Name>' durch Ihren tatsächlichen Namen, bevor Sie die Anwendung ausführen.
            $this->set('name', 'Sabina Teleskumar');
        }
    }