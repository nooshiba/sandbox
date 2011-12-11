<?php
/**
 * ブートストラップクラスです。
 * （覚書：bootstrapでは、_initXXXメソッドは基本自動呼出しとなる。
 *   Zend_Applicationがbootstrap()を呼ぶとき、その引数にて選択型になる）
 * 
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected $_application;

    /**
     * コンストラクタ
     *
     * @param Zend_Application $application 
     */
    public function __construct($application)
    {
        parent::__construct($application);
        $this->_application = $application;

    }

    /**
     * ブートストラップを設定します
     *
     * @return なし
     */
    protected function _initAutoload()
    {
        require_once 'smarty/Smarty.class.php';
        $this->_application->getAutoloader()
                    ->unregisterNamespace(array('Zend_', 'ZendX_'))
                    ->setFallbackAutoloader(true);
    }

    /**
     * smartyをviewとして利用するための初期化処理です
     *
     * @return なし
     */
    protected function _initSmarty()
    {
        $view = null;
        $_SESSION = array();

        // FIXME: この処理はリソースプラグインにするべき。
        $option = $this->getOptions();
        if (isset($option['smarty'])) {
            $view =  new Pulse_View_Smarty($option['smarty']);

            $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
            $viewRenderer->setView($view)
                         ->setViewBasePathSpec($view->getEngine()->template_dir)
                         ->setViewScriptPathSpec(':controller/:action.:suffix')
                         ->setViewScriptPathNoControllerSpec(':action.:suffix')
                         ->setViewSuffix('tpl');
        }

        // ここで戻り値を返すことによって、リソースレジストリに登録される
        // （と思ったが、リソースにする意味は無い？検討すること。）
        return $view;
    }


    /**
     * Requestオブジェクトの初期化を行います
     *
     * @return なし
     */
    protected function _initRequest()
    {
        
        $this->bootstrap('FrontController');
        $front = $this->getResource('FrontController');
        // ここで、別のRequestオブジェクトを使う予定
        $request = new Zend_Controller_Request_Http();
        $front->setRequest($request);

        return $request;
    }
}
?>
