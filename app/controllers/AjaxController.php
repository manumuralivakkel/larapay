<?php

class AjaxController extends \BaseController {

    public function checkusername($email) {

        echo Input::post('email');
        die();
        $user = User::where('email', '=', Input::get('email'))->first();
        $html = (!empty($user)) ? "<span style='color:red;'>User already exists</span>" : "";
        return $html;
    }

}
