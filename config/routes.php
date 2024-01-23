<?php
/**
 * Routenkonfiguration.
 *
 * In dieser Datei richten Sie Routen zu Ihren Controllern und deren Aktionen ein.
 * Routen sind ein sehr wichtiger Mechanismus, der es Ihnen ermöglicht, verschiedene URLs
 * mit ausgewählten Controllern und deren Aktionen (Funktionen) zu verbinden.
 *
 * Die Datei wird im Kontext der `Application::routes()` Methode geladen,
 * die eine Instanz von `RouteBuilder` namens `$routes` als Methodenargument erhält.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Urheberrecht (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Lizenziert unter der MIT-Lizenz
 * Für vollständige Urheberrechts- und Lizenzinformationen siehe die LICENSE.txt
 * Verteilungen von Dateien müssen den oben genannten Urheberrechtshinweis beibehalten.
 *
 * @copyright     Urheberrecht (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Projekt
 * @license       https://opensource.org/licenses/mit-license.php MIT-Lizenz
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * Diese Datei wird im Kontext der `Application`-Klasse geladen.
 * Daher können Sie `$this` verwenden, um bei Bedarf auf die Instanz der Anwendungsklasse zu verweisen.
 */
return function (RouteBuilder $routes): void {
    /*
     * Die Standardklasse für alle Routen
     *
     * Die folgenden Routenklassen werden mit CakePHP geliefert und sind geeignet,
     * als Standard festgelegt zu werden:
     *
     * - Route
     * - InflectedRoute
     * - DashedRoute
     *
     * Wird kein Aufruf an `Router::defaultRouteClass()` gemacht, wird die Klasse
     * `Route` (`Cake\Routing\Route\Route`) verwendet.
     *
     * Beachten Sie, dass `Route` keine Inflektionen bei URLs durchführt, was in
     * inkonsistenten URL-Cases resultieren kann, wenn `{plugin}`, `{controller}` und
     * `{action}` Marker verwendet werden.
     */
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        /*
         * Hier verbinden wir '/' (Basispfad) mit einem Controller namens 'Pages',
         * dessen Aktion 'display' genannt wird, und wir übergeben einen Parameter,
         * um die zu verwendende View-Datei auszuwählen (in diesem Fall templates/Pages/home.php)...
         */
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        /*
         * ...und verbinden den Rest der URLs des 'Pages'-Controllers.
         */
        $builder->connect('/pages/*', 'Pages::display');

        /*
         * Verbinden von Auffangrouten für alle Controller.
         *
         * Die Methode `fallbacks` ist eine Abkürzung für
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * Sie können diese Routen entfernen, sobald Sie die
         * Routen verbunden haben, die Sie in Ihrer Anwendung benötigen.
         */
        $builder->fallbacks();
    });

    // Hinzufügen einer benutzerdefinierten Route
    $routes->connect('/congratulations', ['controller' => 'Pages', 'action' => 'congratulations']);
    /*
     * Diese Zeile fügt eine neue Route hinzu. Wenn jemand '/congratulations' in der Browserleiste eingibt,
     * wird er zum 'congratulations'-Aktion des 'Pages'-Controllers weitergeleitet.
     * Dies ist nützlich für die Erstellung benutzerdefinierter URLs, die auf spezifische Aktionen in Controllern verweisen.
     */

    /*
     * Wenn Sie eine andere Reihe von Middleware benötigen oder gar keine,
     * öffnen Sie einen neuen Scope und definieren Sie dort Routen.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder): void {
     *     // Kein $builder->applyMiddleware() hier.
     *
     *     // Bestimmte Erweiterungen aus URLs parsen
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Verbinden Sie hier API-Aktionen.
     * });
     * ```
     */
};