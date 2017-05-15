<?php

class WebController extends Controller {

    public function actionQuote() {
        $this->layout = "/";
        $this->render('getQuote');
    }

    public function actiongetQuote() {
        echo json_encode(Quotes::get()[0]);
    }

    public function actionTranslate($text) {
        echo json_encode([
            Translator::doRequest($text),
            Translator::alterRequest($text)
        ]);
    }

    public function actionIndex() {
        $this->render('index');
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
