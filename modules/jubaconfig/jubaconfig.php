<?php
/**
* 2007-2019 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2019 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/



if (!defined('_PS_VERSION_')) {
    exit;
}

class Jubaconfig extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'jubaconfig';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Jose Bellido';
        $this->need_instance = 1;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Juba Config');
        $this->description = $this->l('Modulo de configuración para la importación masiva de datos de JUBA');

        $this->confirmUninstall = $this->l('');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        Configuration::updateValue('JUBACONFIG_LIVE_MODE', false);

        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('backOfficeHeader');
    }

    public function uninstall()
    {
        Configuration::deleteByName('JUBACONFIG_LIVE_MODE');

        return parent::uninstall();
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        /**
         * If values have been submitted in the form, process.
         */
        if (((bool)Tools::isSubmit('submitJubaconfigModule')) == true) {
            $this->postProcess();
        }

        $this->context->smarty->assign('module_dir', $this->_path);

        $output = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

        return $output.$this->renderForm();
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitJubaconfigModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * Create the structure of your form.
     */
    protected function getConfigForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                'title' => $this->l('Settings'),
                'icon' => 'icon-cogs',
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {

    }

    protected static function copyImg($id_entity, $id_image = null, $url = '', $entity = 'products', $regenerate = true)
    {
        $tmpfile = tempnam(_PS_TMP_IMG_DIR_, 'ps_import');
        $watermark_types = explode(',', Configuration::get('WATERMARK_TYPES'));

        switch ($entity) {
            default:
            case 'products':
                $image_obj = new Image($id_image);
                $path = $image_obj->getPathForCreation();
                break;
            case 'categories':
                $path = _PS_CAT_IMG_DIR_ . (int) $id_entity;
                break;
            case 'manufacturers':
                $path = _PS_MANU_IMG_DIR_ . (int) $id_entity;
                break;
            case 'suppliers':
                $path = _PS_SUPP_IMG_DIR_ . (int) $id_entity;
                break;
            case 'stores':
                $path = _PS_STORE_IMG_DIR_ . (int) $id_entity;
                break;
        }

        $url = urldecode(trim($url));
        $parced_url = parse_url($url);

        if (isset($parced_url['path'])) {
            $uri = ltrim($parced_url['path'], '/');
            $parts = explode('/', $uri);
            foreach ($parts as &$part) {
                $part = rawurlencode($part);
            }
            unset($part);
            $parced_url['path'] = '/' . implode('/', $parts);
        }

        if (isset($parced_url['query'])) {
            $query_parts = array();
            parse_str($parced_url['query'], $query_parts);
            $parced_url['query'] = http_build_query($query_parts);
        }

        if (!function_exists('http_build_url')) {
            require_once _PS_TOOL_DIR_ . 'http_build_url/http_build_url.php';
        }

        $url = http_build_url('', $parced_url);

        $orig_tmpfile = $tmpfile;

        if (Tools::copy($url, $tmpfile)) {
            // Evaluate the memory required to resize the image: if it's too much, you can't resize it.
            if (!ImageManager::checkImageMemoryLimit($tmpfile)) {
                @unlink($tmpfile);

                return false;
            }

            $tgt_width = $tgt_height = 0;
            $src_width = $src_height = 0;
            $error = 0;
            ImageManager::resize($tmpfile, $path . '.jpg', null, null, 'jpg', false, $error, $tgt_width, $tgt_height, 5, $src_width, $src_height);
            $images_types = ImageType::getImagesTypes($entity, true);

            if ($regenerate) {
                $previous_path = null;
                $path_infos = array();
                $path_infos[] = array($tgt_width, $tgt_height, $path . '.jpg');
                foreach ($images_types as $image_type) {
                    $tmpfile = self::get_best_path($image_type['width'], $image_type['height'], $path_infos);

                    if (ImageManager::resize(
                        $tmpfile,
                        $path . '-' . stripslashes($image_type['name']) . '.jpg',
                        $image_type['width'],
                        $image_type['height'],
                        'jpg',
                        false,
                        $error,
                        $tgt_width,
                        $tgt_height,
                        5,
                        $src_width,
                        $src_height
                    )) {
                        // the last image should not be added in the candidate list if it's bigger than the original image
                        if ($tgt_width <= $src_width && $tgt_height <= $src_height) {
                            $path_infos[] = array($tgt_width, $tgt_height, $path . '-' . stripslashes($image_type['name']) . '.jpg');
                        }
                        if ($entity == 'products') {
                            if (is_file(_PS_TMP_IMG_DIR_ . 'product_mini_' . (int) $id_entity . '.jpg')) {
                                unlink(_PS_TMP_IMG_DIR_ . 'product_mini_' . (int) $id_entity . '.jpg');
                            }
                            if (is_file(_PS_TMP_IMG_DIR_ . 'product_mini_' . (int) $id_entity . '_' . (int) Context::getContext()->shop->id . '.jpg')) {
                                unlink(_PS_TMP_IMG_DIR_ . 'product_mini_' . (int) $id_entity . '_' . (int) Context::getContext()->shop->id . '.jpg');
                            }
                        }
                    }
                    if (in_array($image_type['id_image_type'], $watermark_types)) {
                        Hook::exec('actionWatermark', array('id_image' => $id_image, 'id_product' => $id_entity));
                    }
                }
            }
        } else {
            @unlink($orig_tmpfile);

            return false;
        }
        unlink($orig_tmpfile);

        return true;
    }

    public function setImages($idsImage)
    {
        if (Db::getInstance()->execute('
			DELETE FROM `' . _DB_PREFIX_ . 'product_attribute_image`
			WHERE `id_product_attribute` = ' . (int) $this->id) === false) {
            return false;
        }

        if (is_array($idsImage) && count($idsImage)) {
            $sqlValues = array();

            foreach ($idsImage as $value) {
                $sqlValues[] = '(' . (int) $this->id . ', ' . (int) $value . ')';
            }

            if (is_array($sqlValues) && count($sqlValues)) {
                Db::getInstance()->execute('
					INSERT INTO `' . _DB_PREFIX_ . 'product_attribute_image` (`id_product_attribute`, `id_image`)
					VALUES ' . implode(',', $sqlValues)
                );
            }
        }

        return true;
    }

    /**
     * Save form data.
     */
    protected function postProcess()
    {

        $options = array(
            'login' => 'dewenir',
            'password' => 'Dew2015@nir'
        );

        $proxy = new SoapClient('https://dev2.jubappe.es/api/v2_soap/?wsdl', $options);
        $sessionId = $proxy->login('juanmanuel', 'd02dabc525ad4362f4b3be55ed5afc62');

        $attributes = new stdClass();
        $attributes->additional_attributes = array('juba_imagen_ficha');
        $products = $proxy->catalogProductList($sessionId);

        $count = 0;
        foreach ($products as $product){
            $productInfo = $proxy->catalogProductInfo($sessionId, $product->product_id ,NULL, $attributes);
            $referenceProduct = $productInfo->product_id;

            $row = Db::getInstance()->getRow('
                SELECT `id_product`
                FROM '._DB_PREFIX_.'product p
                WHERE p.`reference` = '.(int)($referenceProduct));

            if(!isset($row['id_product'])){

                $product = new Product();
                $product->name[1] = $productInfo->name;
                $product->reference = $productInfo->product_id;
                $product->description[1] = $productInfo->description;
                $product->description_short[1] = $productInfo->short_description;
                $product->active = 1;
                $product->condition = "new";
                $product->id_tax_rules_group = 1;
                $product->id_manufacturer = 3;
                $product->id_category_default = 49;
                $product->add();
                $product->save();

                $product->addToCategories(array(49));
                StockAvailable::setQuantity((int)$product->id, 0, $product->quantity);
                // Añadimos la imagen al producto

                $cover = true;
                $image_url = ($productInfo->additional_attributes[0]->value);
                $shops = Shop::getContextListShopID();

                //var_dump($image_url);
                //echo "<br>";

                $url = trim($image_url);
                $error = false;
                if (!empty($url)) {
                    $url = str_replace(' ', '%20', $url);

                    $image = new Image();
                    $image->id_product = (int) $product->id;
                    $image->position = Image::getHighestPosition($product->id) + 1;
                    $image->cover = true;

                    // file_exists doesn't work with HTTP protocol
                    if (($field_error = $image->validateFields(UNFRIENDLY_ERROR, true)) === true &&
                        ($lang_field_error = $image->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true && $image->add()) {
                        // associate image to selected shops
                        $image->associateTo($shops);
                        if (!Jubaconfig::copyImg($product->id, $image->id, $url, 'products', false)) {
                            $image->delete();
                        }
                    }

                    $image->save();

                    var_dump($image->id_image);
                    echo "<br>";
                    var_dump($image->id);
                    echo "<br>";
                    var_dump($image->id_product);
                    echo "<br>";


                }

                var_dump($product->getImages(1));
                echo "<br>";
                //$product->update();
                //$product->save();


            }

            else{
                $product = new Product($row['id_product']);
                $product->name[1] = $productInfo->name;
                $product->reference = $productInfo->product_id;
                $product->description[1] = $productInfo->description;
                $product->description_short[1] = $productInfo->short_description;
                $product->active = 1;
                $product->condition = "new";
                $product->id_tax_rules_group = 1;
                $product->id_manufacturer = 3;
                $product->id_category_default = 49;
                $product->update();
                $product->save();

            }

            $count = $count+1;
            if($count == 5){
                break;
            }

        }


        echo "<script>console.log('Done!')</script>";

    }



    /**
    * Add the CSS & JavaScript files you want to be loaded in the BO.
    */
    public function hookBackOfficeHeader()
    {
        if (Tools::getValue('module_name') == $this->name) {
            $this->context->controller->addJS($this->_path.'views/js/back.js');
            $this->context->controller->addCSS($this->_path.'views/css/back.css');
        }
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path.'/views/js/front.js');
        $this->context->controller->addCSS($this->_path.'/views/css/front.css');
    }
}
