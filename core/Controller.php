<?php 
/*
* @AUTHOR : WAJID ALI JAVID KHAN
* @Created: 19 July 2025
* @Description : The base controller handles rendering views, workarea, and loading common components.
*/
require_once __DIR__.'/../public/library/language.php';
class Controller {
	
	/*
    * @function render
    * @description Render the main workarea view with optional data
    * @param string $view
    * @param array $data
    **/
    public function render($view, $data = array()) {
        extract($data); // Make $data keys available as variables
        require_once "app/views/{$view}.php"; // workarea or any custom view
    } //End render
	
	 /**
     * Render the main workarea view with optional data.
     * 
     * @param string $view View filename (without extension)
     * @param array $data  Associative array of data for placeholders
    public function render($view, $data = array()) {
		// Load template content
		$template = file_get_contents("app/views/{$view}.php");

		// Replace VAL and OPT placeholders
		foreach ($data as $key => $value) {
			// Escape all values (except raw HTML for OPT)
			$safeValue = (substr($key, 0, 3) === 'OPT') ? $value : htmlspecialchars($value, ENT_QUOTES);

			// Replace input value="VALkey"
			$template = preg_replace('/value=["\']VAL'.preg_quote($key, '/').'["\']/i','value="'.$safeValue.'"',$template);

			// Replace <textarea>VALkey</textarea>
			$template = preg_replace('/<textarea([^>]*)>VAL' . preg_quote($key, '/') . '<\/textarea>/i','<textarea$1>'.$safeValue.'</textarea>',$template);

			// Replace select placeholders like OPTClassList
			if (substr($key, 0, 3) === 'OPT') {
				$template = preg_replace('/OPT'.preg_quote($key, '/').'/i',$value,$template);
			}

			// Fallback: Replace generic VALkey elsewhere
			$template = preg_replace(
				'/VAL' . preg_quote($key, '/') . '/i',
				$safeValue,
				$template
			);
		}//end if.


		// Handle translation placeholders like LNG<FieldName>
		preg_match_all('/LNG([a-zA-Z0-9_]+)/', $template, $matches);
		foreach ($matches[0] as $match) {
			$field = str_replace('LNG', '', $match);
			$translation = LANG::data($field) ?? 'Value Missing';
			$template = str_replace($match, $translation, $template);
		}

		// Output final rendered view
		echo $template;
	}//closed render func*/

    /*
    * @function headers
    * @description Load top header
    **/
    public static function headers() {
        require_once "app/views/layouts/header.php";
    } //End headers

	/*
    * @function headers
    * @description Load head links
    **/	
	public static function head() {
        require_once "app/views/layouts/head.php";
    }//End head

    /*
    * @function footers
    * @description Load footer file
    **/
    public static function footers() {
        require_once "app/views/layouts/footer.php";
    } //End footers

    /*
     *@function navigation
     *@description Load sidebar/navigation file
    **/
    public static function navigation() {
        require_once "app/views/layouts/navigation.php";
    } //End navigation

    /*
    * @function dashboard
    * @description Load default dashboard (can be overridden by render())
    **/
    public static function dashboard() {
        require_once "app/views/dashboard.php";
    } //End dashboard

    /*
    * @function layout
    * @description Load full layout with header, navigation, footer, and dynamic workarea
    * @param string $view
    * @param array $data
    **/	
	 public function layout($view = 'dashboard', $data = []) {
        ?>
		<!DOCTYPE html>
		<html lang="en">
			<?php self::head(); ?>
			<body>
				<?php self::headers(); ?>
                <?php self::navigation(); ?>
				<div id="main" class="main main-cls-<?php echo strtolower($_COOKIE['_LANG_']); ?>">
					<?php $this->render($view, $data); ?>			
				</div>
				<?php self::footers(); ?>
			</body>
		</html>
        <?php
    }//End layout.

} //End class
?>