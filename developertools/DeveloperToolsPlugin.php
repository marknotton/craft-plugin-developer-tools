<?php
namespace Craft;

class DeveloperToolsPlugin extends BasePlugin {

  public function getName() {
    return Craft::t('Craft Developer Tools');
  }

  public function getVersion() {
    return '0.1';
  }

  public function getSchemaVersion() {
    return '0.1';
  }

  public function getDescription() {
    return 'Adds a number of tools to help developers';
  }

  public function getDeveloper() {
    return 'Yello Studio';
  }

  public function getDeveloperUrl() {
    return 'http://yellostudio.co.uk';
  }

  public function getReleaseFeedUrl() {
    return 'https://raw.githubusercontent.com/marknotton/craft-plugin-developer-tools/master/developer-tools/releases.json';
  }

  public function init() {
    parent::init();
    if (craft()->request->isCpRequest() && craft()->userSession->isLoggedIn() && craft()->userSession->isAdmin() && !craft()->request->isAjaxRequest()) {
      // Add CSS
      craft()->templates->includeCssFile(UrlHelper::getResourceUrl('developertools/style.css'));
      // Add Javascript
      craft()->templates->includeJsFile(UrlHelper::getResourceUrl('developertools/script.js'));
    }
  }
}
