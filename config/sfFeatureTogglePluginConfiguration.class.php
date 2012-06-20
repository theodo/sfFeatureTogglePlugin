<?php
/**
 * @author Marek Kalnik <marekk@theodo.fr>
 */
class sfFeatureTogglePluginConfiguration extends sfPluginConfiguration
{
  public function setup()
  {
    if ($this->configuration instanceof sfApplicationConfiguration)
    {
      /**
       * Load features.yml parser
       */
      $configCache = $this->configuration->getConfigCache();
      $configCache->registerConfigHandler('config/features.yml', 'sfDefineEnvironmentConfigHandler',
        array('prefix' => 'feature_'));
      $configCache->checkConfig('config/features.yml');
    }
  }

  public function initialize()
  {
    if ($this->configuration instanceof sfApplicationConfiguration)
    {
      /**
       * Load features.yml
       */
      $configCache = $this->configuration->getConfigCache();
      include($configCache->checkConfig('config/features.yml'));
    }
  }
}
