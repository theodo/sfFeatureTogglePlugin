<?php
/**
 * This function begins feature_toggle. If feature is disabled it adds hmlt code to hide the content.
 *
 * @author Marek Kalnik <marekk@theodo.fr>
 * @since  2011-08-12
 * @param  String $feature_name Functionality name in feature_%name%_enabled (true ou false)
 * @param  Boolean $keep_slot Keep html slot (default: true)
 *                            True  : visibility : hidden
 *                            False : display : none
 */
function feature_toggle($feature_name, $keep_slot = true)
{
  if (feature_is_hidden($feature_name))
  {
    $tag = '<div class="feature-toggle" style="';
    $tag .= $keep_slot ? 'visibility: hidden' : 'display: none';
    $tag .= ';">';

    echo $tag;
  }
}

/**
 * Close feature toggle tag
 *
 * @see    feature_toggle
 */
function end_feature_toggle($feature_name)
{
  if (feature_is_hidden($feature_name))
  {
    echo '</div>';
  }
}

function feature_is_hidden($feature_name)
{

  return !sfConfig::get('feature_'.$feature_name.'_enabled', true);
}
