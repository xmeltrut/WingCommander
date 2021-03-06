<?php
/**
 * Wing Commander is a Mustache wrapper for Flight
 *
 * @author Chris Worfolk <chris@worfolk.co.uk>
 *
 * For full copyright and licence information, please view the LICENCE
 * file that was distributed with this source code.
 */

class WingCommander extends Mustache_Engine
{
    /**
     * Path to template files
     */
    private $templatePath = './templates';

    /**
     * Template extension
     */
    private $templateExtension = 'html';

    /**
     * Variables to parse in
     */
    private $vars = array();

    /**
     * Initialise the template engine
     *
     * @param array $options Mustache options
     */
    public static function init ($options = array())
    {
        Flight::map("render", function($template, $data, $toVar = false){
            Flight::view()->render($template, $data, $toVar);
        });

        Flight::register('view', get_called_class(), $options);
    }

    /**
     * Render a page
     *
     * @param string      $filename Filename
     * @param array       $vars     Variables
     * @param string|null $toVar    If specified, it will save as a variable rather than output
     *
     * @return void
     */
    public function render ($filename, $vars = array(), $toVar = null)
    {
        $templatePath = $this->templatePath . '/' . $filename . '.' . $this->templateExtension;

        if (file_exists($templatePath)) {

            $template = file_get_contents($templatePath);
            $output = parent::render($template, array_merge($this->vars, $vars));

            if ($toVar) {
                $this->set($toVar, $output);
            } else {
                echo $output;
            }

        } else {

            throw new Exception ("Template '$filename' could not be found.");

        }
    }

    /**
     * Set a variable
     *
     * @param string $name  Variable name
     * @maram mixed  $value Value
     *
     * @return boolean Success
     */
    public function set ($name, $value)
    {
        $this->vars[$name] = $value;
        return true;
    }

    /**
     * Set the template path
     *
     * @param string $path Path, no trailing slash
     *
     * @return boolean Success
     */
    public function setTemplatePath ($path)
    {
        $this->templatePath = $path;
        return true;
    }

    /**
     * Set the template extension
     *
     * @param string $extension Extension (i.e. mustache, html)
     *
     * @return boolean Success
     */
    public function setTemplateExtension ($extension)
    {
        $this->templateExtension = $extension;
        return true;
    }
}
