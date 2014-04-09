<?php
/**
 * @package Techotronic
 * @subpackage jQuery Colorbox
 *
 * @since 4.1
 * @author Arne Franken
 *
 * Object that handles all actions in the WordPress frontend
 */
class JQueryColorboxFrontend {

  /**
   * Constructor
   *
   * @since 4.1
   * @access public
   * @access static
   * @author Arne Franken
   *
   * @param string[] $colorboxSettings user settings
   */
  //public static function JQueryColorboxFrontend($colorboxSettings) {
  function JQueryColorboxFrontend($colorboxSettings) {

    $this->colorboxSettings = $colorboxSettings;

    //only add link to meta box if
    if ($this->isFalse('removeLinkFromMetaBox')) {
      add_action('wp_meta', array(& $this, 'renderMetaLink'));
    }

    if ($this->isTrue('autoColorbox')) {
      //write "colorbox-postID" to "img"-tags class attribute.
      //Priority = 100, hopefully the preg_replace is then executed after other plugins messed with the_content
      add_filter('the_content', array(& $this, 'addColorboxGroupIdToImages'), 100);
      add_filter('the_excerpt', array(& $this, 'addColorboxGroupIdToImages'), 100);
    }
    if ($this->isTrue('autoColorboxGalleries') || $this->isTrue('autoColorbox')) {
      add_filter('wp_get_attachment_image_attributes', array(& $this, 'wpPostThumbnailClassFilter'));
    }

    // enqueue JavaScript and CSS files in WordPress
    add_action('init', array(& $this, 'addJQueryJS'), 100);

    $this->addColorboxCSS();
    $this->addColorboxJS();
    $this->addColorboxWrapperJS();
    $this->addColorboxProperties();
  }

  // JQueryColorboxFrontend()


  /**
   * Renders plugin link in Meta widget
   *
   * @since 3.3
   * @access public
   * @author Arne Franken
   */
  //public function renderMetaLink() {
  function renderMetaLink() {
    ?>
  <li id="colorboxLink"><?php _e('Using', JQUERYCOLORBOX_TEXTDOMAIN);?>
    <a href="http://www.techotronic.de/plugins/jquery-colorbox/" target="_blank" title="<?php echo JQUERYCOLORBOX_NAME ?>"><?php echo JQUERYCOLORBOX_NAME ?></a>
  </li>
  <?php
  }

  // renderMetaLink()

  /**
   * Add Colorbox group Id to images.
   * function is called for every page or post rendering.
   *
   * ugly way to make the images Colorbox-ready by adding the necessary CSS class.
   * unfortunately, Wordpress does not offer a convenient way to get certain elements from the_content,
   * so I had to do this by regexp replacement...
   *
   * @since 1.0
   * @access public
   * @author Arne Franken
   *
   * @param  string $content post or page content
   * @return string replaced content or excerpt
   */
  //public function addColorboxGroupIdToImages($content) {
  function addColorboxGroupIdToImages($content) {
    global $post;
    // universal IMG-Tag pattern matches everything between "<img" and the closing "(/)>"
    // will be used to match all IMG-Tags in Content.
    $imgPattern = "/<img([^\>]*?)>/i";
    if (preg_match_all($imgPattern, $content, $imgTags)) {
      foreach ($imgTags[0] as $imgTag) {
        // only work on imgTags that do not already contain the string "colorbox-"
        if (!preg_match('/colorbox-/i', $imgTag)) {
          if (!preg_match('/class=/i', $imgTag)) {
            // imgTag does not contain class-attribute
            $pattern = $imgPattern;
            $replacement = '<img class="colorbox-' . $post->ID . '" $1>';
          }
          else {
            // imgTag already contains class-attribute
            $pattern = "/<img(.*?)class=('|\")([A-Za-z0-9 \/_\.\~\:-]*?)('|\")([^\>]*?)>/i";
            $replacement = '<img$1class=$2$3 colorbox-' . $post->ID . '$4$5>';
          }
          $replacedImgTag = preg_replace($pattern, $replacement, $imgTag);
          $content = str_replace($imgTag, $replacedImgTag, $content);
        }
      }
    }
    return $content;
  }

  // addColorboxGroupIdToImages()

  /**
   * Add colorbox-CSS-Class to WP Galleries
   *
   * If wp_get_attachment_image() is called, filters registered for the_content are not applied on the img-tag.
   * So we'll need to manipulate the class attribute separately.
   *
   * @since 2.0
   * @access public
   * @author Arne Franken
   *
   * @param  string[] $attribute class attribute of the attachment link
   * @return string[] replaced attributes
   */
  //public function wpPostThumbnailClassFilter($attribute) {
  function wpPostThumbnailClassFilter($attribute) {
    global $post;
    $attribute['class'] .= ' colorbox-' . $post->ID . ' ';
    return $attribute;
  }

  // wpPostThumbnailClassFilter()

  /**
   * Insert JavaScript with properties for Colorbox into WP Header
   *
   * @since 1.0
   * @access public
   * @author Arne Franken
   */
  //public function addColorboxProperties() {
  function addColorboxProperties() {
    /**
     * declare variables that are used in more than one function
     */
    $colorboxPropertyArray = array(
      'jQueryColorboxVersion' => JQUERYCOLORBOX_VERSION,
      'colorboxInline' => 'false',
      'colorboxIframe' => 'false',
      'colorboxGroupId' => '',
      'colorboxTitle' => '',
      'colorboxWidth' => 'false',
      'colorboxHeight' => 'false',
      'colorboxMaxWidth' => 'false',
      'colorboxMaxHeight' => 'false',
      'colorboxSlideshow' => !$this->colorboxSettings['slideshow'] ? 'false' : 'true',
      'colorboxSlideshowAuto' => $this->colorboxSettings['slideshowAuto'] ? 'true' : 'false',
      'colorboxScalePhotos' => $this->colorboxSettings['scalePhotos'] ? 'true' : 'false',
      'colorboxPreloading' => $this->colorboxSettings['preloading'] ? 'true' : 'false',
      'colorboxOverlayClose' => $this->colorboxSettings['overlayClose'] ? 'true' : 'false',
      'colorboxLoop' => !$this->colorboxSettings['disableLoop'] ? 'true' : 'false',
      'colorboxEscKey' => !$this->colorboxSettings['disableKeys'] ? 'true' : 'false',
      'colorboxArrowKey' => !$this->colorboxSettings['disableKeys'] ? 'true' : 'false',
      'colorboxScrolling' => !$this->colorboxSettings['displayScrollbar'] ? 'true' : 'false',
      'colorboxOpacity' => $this->colorboxSettings['opacity'],
      'colorboxTransition' => $this->colorboxSettings['transition'],
      'colorboxSpeed' => $this->colorboxSettings['speed'],
      'colorboxSlideshowSpeed' => $this->colorboxSettings['slideshowSpeed'],
      'colorboxClose' => __('close', JQUERYCOLORBOX_TEXTDOMAIN),
      'colorboxNext' => __('next', JQUERYCOLORBOX_TEXTDOMAIN),
      'colorboxPrevious' => __('previous', JQUERYCOLORBOX_TEXTDOMAIN),
      'colorboxSlideshowStart' => __('start slideshow', JQUERYCOLORBOX_TEXTDOMAIN),
      'colorboxSlideshowStop' => __('stop slideshow', JQUERYCOLORBOX_TEXTDOMAIN),
      'colorboxCurrent' => __('{current} of {total} images', JQUERYCOLORBOX_TEXTDOMAIN),
      'colorboxXhrError'=> __('This content failed to load.', JQUERYCOLORBOX_TEXTDOMAIN),
      'colorboxImgError'=> __('This image failed to load.', JQUERYCOLORBOX_TEXTDOMAIN),

      'colorboxImageMaxWidth' => $this->colorboxSettings['maxWidth'] == "false" ? 'false'
              : $this->colorboxSettings['maxWidthValue'] . $this->colorboxSettings['maxWidthUnit'],
      'colorboxImageMaxHeight' => $this->colorboxSettings['maxHeight'] == "false" ? 'false'
              : $this->colorboxSettings['maxHeightValue'] . $this->colorboxSettings['maxHeightUnit'],
      'colorboxImageHeight' => $this->colorboxSettings['height'] == "false" ? 'false'
              : $this->colorboxSettings['heightValue'] . $this->colorboxSettings['heightUnit'],
      'colorboxImageWidth' => $this->colorboxSettings['width'] == "false" ? 'false'
              : $this->colorboxSettings['widthValue'] . $this->colorboxSettings['widthUnit'],

      'colorboxLinkHeight' => $this->colorboxSettings['linkHeight'] == "false" ? 'false'
              : $this->colorboxSettings['linkHeightValue'] . $this->colorboxSettings['linkHeightUnit'],
      'colorboxLinkWidth' => $this->colorboxSettings['linkWidth'] == "false" ? 'false'
              : $this->colorboxSettings['linkWidthValue'] . $this->colorboxSettings['linkWidthUnit'],

      'colorboxInitialHeight' => $this->colorboxSettings['initialHeight'],
      'colorboxInitialWidth' => $this->colorboxSettings['initialWidth'],
      'autoColorboxJavaScript' => $this->colorboxSettings['autoColorboxJavaScript'],
      'autoHideFlash' => $this->colorboxSettings['autoHideFlash'],
      'autoColorbox' => $this->colorboxSettings['autoColorbox'],
      'autoColorboxGalleries' => $this->colorboxSettings['autoColorboxGalleries'],
      'addZoomOverlay' => $this->colorboxSettings['addZoomOverlay'],
      'useGoogleJQuery' => $this->colorboxSettings['useGoogleJQuery'],
      'colorboxAddClassToLinks' => $this->colorboxSettings['colorboxAddClassToLinks']
    );
    wp_localize_script('colorbox', 'jQueryColorboxSettingsArray', $colorboxPropertyArray);
  }

  // addColorboxProperties()

  /**
   * Insert JavaScript into WP Header
   *
   * @since 4.1
   * @access public
   * @author Arne Franken
   */
  //public function addColorboxWrapperJS() {
  function addColorboxWrapperJS() {
    if ($this->isTrue('debugMode')) {
      $jqueryColorboxWrapperJavaScriptPath = "js/jquery-colorbox-wrapper.js";
    }
    else {
      $jqueryColorboxWrapperJavaScriptPath = "js/jquery-colorbox-wrapper-min.js";
    }
    wp_enqueue_script('colorbox-wrapper', JQUERYCOLORBOX_PLUGIN_URL . '/' . $jqueryColorboxWrapperJavaScriptPath, array('colorbox'), JQUERYCOLORBOX_VERSION, $this->colorboxSettings['javascriptInFooter']);
  }

  // addColorboxWrapperJS()

  /**
   * Insert JavaScript into WP Header
   *
   * @since 4.1
   * @access public
   * @author Arne Franken
   */
  //public function addColorboxJS() {
  function addColorboxJS() {
    if ($this->isTrue('debugMode')) {
      $jqueryColorboxJavaScriptPath = "js/jquery.colorbox.js";
    }
    else {
      $jqueryColorboxJavaScriptPath = "js/jquery.colorbox-min.js";
    }
    wp_enqueue_script('colorbox', JQUERYCOLORBOX_PLUGIN_URL . '/' . $jqueryColorboxJavaScriptPath, array('jquery'), COLORBOXLIBRARY_VERSION, $this->colorboxSettings['javascriptInFooter']);
  }

  // addColorboxJS()

  /**
   * Enqueue jQuery JavaScript Library into WP Header
   *
   * @since 4.4
   * @access public
   * @author Arne Franken
   */
  //public function addJQueryJS() {
  function addJQueryJS() {
    if ($this->isTrue('useGoogleJQuery')) {
      if ($this->isTrue('debugMode')) {
        $jQueryLibraryUrl = "http://code.jquery.com/jquery-".JQUERYLIBRARY_VERSION.".js";
      }
      else {
        $jQueryLibraryUrl = "http://code.jquery.com/jquery-".JQUERYLIBRARY_VERSION.".min.js";
      }

      wp_deregister_script('jquery');
      wp_register_script('jquery', $jQueryLibraryUrl, false, JQUERYLIBRARY_VERSION, true);
    }
    //enqueues WP's jQuery library if useGoogleJQuery==false
    wp_enqueue_script('jquery');
  }

  // addJQueryJS()

  /**
   * Insert CSS into WP Header
   *
   * @since 4.4
   * @access public
   * @author Arne Franken
   */
  //public function addColorboxCSS() {
  function addColorboxCSS() {

    wp_register_style('colorbox-' . $this->colorboxSettings['colorboxTheme'], JQUERYCOLORBOX_PLUGIN_URL . '/' . 'themes/' . $this->colorboxSettings['colorboxTheme'] . '/colorbox.css', array(), JQUERYCOLORBOX_VERSION, 'screen');
    wp_enqueue_style('colorbox-' . $this->colorboxSettings['colorboxTheme']);

    if ($this->isTrue('addZoomOverlay')) {
      wp_register_style( 'colorbox-css', JQUERYCOLORBOX_PLUGIN_URL . '/css/jquery-colorbox-zoom.css' , false, COLORBOXLIBRARY_VERSION );
      wp_enqueue_style( 'colorbox-css' );
    }
  }

  // addColorboxCSS()


  //====================================================================================================================


  /**
   * Returns true if the option exists and is set to 'true'
   *
   * @since 4.5
   * @access private
   * @author Arne Franken
   *
   * @param $optionName String the option to check
   *
   * @return bool
   */
  //private function isTrue($optionName) {
  function isTrue($optionName) {
    return isset($this->colorboxSettings[$optionName]) && $this->colorboxSettings[$optionName];
  }

  //isTrue()

  /**
   * Returns true if the option exists and is set to 'false'
   *
   * @since 4.5
   * @access private
   * @author Arne Franken
   *
   * @param $optionName String the option to check
   *
   * @return bool
   */
  //private function isFalse($optionName) {
  function isFalse($optionName) {
    return isset($this->colorboxSettings[$optionName]) && !$this->colorboxSettings[$optionName];
  }

  //isFalse()

}

// class JQueryColorboxFrontend()
?>