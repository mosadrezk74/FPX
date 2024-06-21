<?php

namespace App\Trait;

trait GeneralTrait
{
    public function getCurrentLang()
    {
        return app()->getLocale();
    }

    public function returnError($errNum, $msg)
    {
        return response()->json([
            'status' => false,
            'errNum' => $errNum,
            'msg' => $msg
        ]);
    }

    public function returnSuccessMessage($msg = "", $errNum = "S000")
    {
        return [
            'status' => true,
            'errNum' => $errNum,
            'msg' => $msg
        ];
    }


    public function returnData($key, $value, $msg = "")
    {
        return response()->json([
            'status' => true,
            'errNum' => "S000",
            'msg' => $msg,
            $key => $value
        ]);
    }


    public function returnValidationError($code = "E001", $validator)
    {
        return $this->returnError($code, $validator->errors()->first());
    }


    public function returnCodeAccordingToInput($validator)
    {
        $inputs = array_keys($validator->errors()->toArray());
        return $this->getErrorCode($inputs[0]);
    }



    public function getErrorCode($input)
    {
        switch ($input) {
            case "name":
                return 'E0011';
            case "password":
                return 'E002';
            case "mobile":
                return 'E003';
            case "id_number":
                return 'E004';
            case "birth_date":
                return 'E005';
            case "agreement":
                return 'E006';
            case "email":
                return 'E007';
            case "city_id":
                return 'E008';
            case "insurance_company_id":
                return 'E009';
            case "activation_code":
                return 'E010';
            case "longitude":
                return 'E011';
            case "latitude":
                return 'E012';
            case "id":
                return 'E013';
            case "promocode":
                return 'E014';
            case "doctor_id":
                return 'E015';
            case "payment_method":
            case "payment_method_id":
                return 'E016';
            case "day_date":
                return 'E017';
            case "specification_id":
                return 'E018';
            case "importance":
                return 'E019';
            case "type":
                return 'E020';
            case "message":
                return 'E021';
            case "reservation_no":
                return 'E022';
            case "reason":
                return 'E023';
            case "branch_no":
                return 'E024';
            case "name_en":
                return 'E025';
            case "name_ar":
                return 'E026';
            case "gender":
                return 'E027';
            case "nickname_en":
                return 'E028';
            case "nickname_ar":
                return 'E029';
            case "rate":
                return 'E030';
            case "price":
                return 'E031';
            case "information_en":
                return 'E032';
            case "information_ar":
                return 'E033';
            case "street":
                return 'E034';
            case "branch_id":
                return 'E035';
            case "insurance_companies":
                return 'E036';
            case "photo":
                return 'E037';
            case "logo":
                return 'E038';
            case "working_days":
                return 'E039';
            case "reservation_period":
                return 'E041';
            case "nationality_id":
                return 'E042';
            case "commercial_no":
                return 'E043';
            case "nickname_id":
                return 'E044';
            case "reservation_id":
                return 'E045';
            case "attachments":
                return 'E046';
            case "summary":
                return 'E047';
            case "user_id":
                return 'E048';
            case "mobile_id":
                return 'E049';
            case "paid":
                return 'E050';
            case "use_insurance":
                return 'E051';
            case "doctor_rate":
                return 'E052';
            case "provider_rate":
                return 'E053';
            case "message_id":
                return 'E054';
            case "hide":
                return 'E055';
            case "checkoutId":
                return 'E056';
            default:
                return "";
        }
    }
}